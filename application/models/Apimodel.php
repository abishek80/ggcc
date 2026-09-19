<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apimodel extends CI_Model
{
    // ─── Token Management ────────────────────────────────────────────

    /**
     * Generate and store a new bearer token for a login_permission user
     */
    public function generateToken($loginId, $employeeId)
    {
        // Carry over any previously registered FCM token for this login,
        // otherwise it gets wiped every time the session token is rotated
        // (login expires every 6 hours), silently dropping the device from
        // all future push notifications until the app re-registers it.
        $existing = $this->db->select('fcm_token')
                              ->where('login_id', $loginId)
                              ->where('fcm_token IS NOT NULL')
                              ->where('fcm_token !=', '')
                              ->get('api_tokens')->row();
        $existingFcmToken = $existing ? $existing->fcm_token : null;

        // Remove old tokens for this user
        $this->db->where('login_id', $loginId)->delete('api_tokens');

        $token      = bin2hex(random_bytes(32)); // 64-char secure token
        $expiresAt  = date('Y-m-d H:i:s', strtotime('+6 hours'));
        $now        = date('Y-m-d H:i:s');

        $this->db->insert('api_tokens', [
            'login_id'    => $loginId,
            'employee_id' => $employeeId,
            'token'       => $token,
            'fcm_token'   => $existingFcmToken,
            'created_at'  => $now,
            'expires_at'  => $expiresAt,
        ]);

        return [
            'token'      => $token,
            'expires_at' => $expiresAt,
        ];
    }

    /**
     * Validate a bearer token — returns user row or false
     */
    public function validateToken($token)
    {
        $sql = "SELECT AT.*, LP.employee_name, LP.mobile_number, LP.login_code, LP.permission, LP.is_admin, MD.designation, E.profile_img
                FROM api_tokens AT
                INNER JOIN login_permission LP ON LP.id = AT.login_id
                LEFT JOIN employee E ON E.id = LP.employee_id
                LEFT JOIN master_designation MD ON MD.id = E.designation
                WHERE AT.token = ?
                  AND AT.expires_at > NOW()
                  AND LP.status = 'active'
                  AND LP.delete_status = 0
                LIMIT 1";

        $res = $this->db->query($sql, [$token])->row();
        return $res ?: false;
    }

    /**
     * Delete a token (logout)
     */
    public function revokeToken($token)
    {
        $this->db->where('token', $token)->delete('api_tokens');
    }

    /**
     * Store/update FCM device token for a login user
     */
    public function updateFcmToken($loginId, $fcmToken)
    {
        $this->db->where('login_id', $loginId)
                 ->update('api_tokens', ['fcm_token' => $fcmToken]);
    }

    /**
     * Get all active FCM tokens for broadcasting (Only for Active Employees)
     */
    public function getAllActiveFcmTokens()
    {
        $sql = "SELECT DISTINCT AT.fcm_token 
                FROM api_tokens AT
                INNER JOIN login_permission LP ON LP.id = AT.login_id
                LEFT JOIN employee E ON (
                    (AT.employee_id IS NOT NULL AND AT.employee_id > 0 AND E.id = AT.employee_id)
                    OR (LP.employee_id IS NOT NULL AND LP.employee_id > 0 AND E.id = LP.employee_id)
                    OR (LP.login_code IS NOT NULL AND LP.login_code != '' AND E.employee_code = LP.login_code)
                    OR (LP.mobile_number IS NOT NULL AND LP.mobile_number != '' AND E.mobile_number = LP.mobile_number)
                )
                WHERE AT.fcm_token IS NOT NULL 
                  AND AT.fcm_token != '' 
                  AND LP.status = 'active'
                  AND LP.delete_status = 0
                  AND (E.id IS NULL OR (E.status = 'active' AND E.delete_status = 0))";
        $results = $this->db->query($sql)->result();
        return array_map(function($row) { return $row->fcm_token; }, $results);
    }

    /**
     * Count active, non-deleted logins eligible for push (regardless of
     * whether they currently have a registered FCM token). Used purely for
     * debug logging so we can tell "eligible active users" apart from
     * "valid FCM token count" when a broadcast is sent.
     */
    public function getActiveEligibleLoginCount()
    {
        $this->db->where('status', 'active')->where('delete_status', 0);
        return $this->db->count_all_results('login_permission');
    }

    /**
     * Clear a specific FCM token after Firebase reports it as
     * invalid/unregistered, so it isn't retried on every future broadcast.
     */
    public function clearInvalidFcmToken($fcmToken)
    {
        if (empty($fcmToken)) return;
        $this->db->where('fcm_token', $fcmToken)->update('api_tokens', ['fcm_token' => null]);
    }

    /**
     * Get FCM token(s) for a specific employee (Only if Active)
     */
    public function getFcmTokensByEmployeeId($employeeId)
    {
        $sql = "SELECT DISTINCT AT.fcm_token 
                FROM api_tokens AT
                INNER JOIN employee E ON E.id = ?
                INNER JOIN login_permission LP ON LP.id = AT.login_id
                WHERE (AT.employee_id = E.id OR LP.employee_id = E.id OR LP.login_code = E.employee_code OR LP.mobile_number = E.mobile_number)
                  AND AT.fcm_token IS NOT NULL 
                  AND AT.fcm_token != '' 
                  AND E.status = 'active'
                  AND E.delete_status = 0
                  AND LP.status = 'active'
                  AND LP.delete_status = 0";
        $results = $this->db->query($sql, [(int)$employeeId])->result();
        return array_map(function($row) { return $row->fcm_token; }, $results);
    }

}

?>
