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
        // Remove old tokens for this user
        $this->db->where('login_id', $loginId)->delete('api_tokens');

        $token      = bin2hex(random_bytes(32)); // 64-char secure token
        $expiresAt  = date('Y-m-d H:i:s', strtotime('+30 days'));
        $now        = date('Y-m-d H:i:s');

        $this->db->insert('api_tokens', [
            'login_id'    => $loginId,
            'employee_id' => $employeeId,
            'token'       => $token,
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
        $sql = "SELECT AT.*, LP.employee_name, LP.mobile_number, LP.login_code, LP.permission, LP.is_admin
                FROM api_tokens AT
                INNER JOIN login_permission LP ON LP.id = AT.login_id
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
}
?>
