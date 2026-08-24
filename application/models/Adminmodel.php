<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminmodel extends CI_Model
{
    public function deleteRecord($recordId, $tableName = '')
    {
        $userId = $this->session->userdata('userid');

        $sql = "UPDATE $tableName SET delete_status = 1, updated_by = '" . $userId . "', updated_at = NOW() WHERE id =" . $recordId;
        $this->db->query($sql);
    }

    public function deletePurchaseRecord($recordId, $tableName = '')
    {
        $userId = $this->session->userdata('userid');

        // Secure the table name to prevent SQL injection
        $allowedTables = ['purchase_order', 'other_table']; // Add any other allowed tables here
        if (!in_array($tableName, $allowedTables)) {
            throw new Exception('Invalid table name provided.');
        }

        // Prepare SQL statement
        $sql = "UPDATE $tableName T1 LEFT JOIN estimation_bill EB ON EB.po_id = T1.id SET T1.delete_status = 1, T1.updated_by = '$userId', T1.updated_at = NOW(), EB.delete_status = 1, EB.updated_by = '$userId', EB.updated_at = NOW() WHERE T1.id = ?";

        // Execute the SQL with parameterized query to avoid SQL injection
        $this->db->query($sql, [$recordId]);
    }

    public function deleteRetentionMoneyRecord($recordId)
    {
        $userId = $this->session->userdata('userid');

        // Prepare SQL statements
        $sql1 = "UPDATE retention_money SET delete_status = 1, updated_by = '" . $userId . "', updated_at = NOW() WHERE estimation_id = ?";
        $sql2 = "UPDATE estimation_bill SET delete_status = 1, updated_by = '" . $userId . "', updated_at = NOW() WHERE id = ?";

        // Execute the first query with parameterized query to avoid SQL injection
        $this->db->query($sql1, [$recordId]);

        // Execute the second query with parameterized query to avoid SQL injection
        $this->db->query($sql2, [$recordId]);
    }


    public function deletePartyPaymentRecord($partyPaymentId, $partyPaymentTable, $partyPaymentReceivedId, $partyPaymentReceivedTable)
    {
        // Validate table names to prevent SQL injection
        $validPaymentTables = ['party_payment', 'other_valid_table1']; // Add your valid payment tables
        $validReceivedTables = ['party_payment_received', 'other_valid_table2']; // Add your valid received tables

        if (!in_array($partyPaymentTable, $validPaymentTables) || 
            !in_array($partyPaymentReceivedTable, $validReceivedTables)) {
            throw new Exception("Invalid table name provided.");
        }

        // Start transaction
        $this->db->trans_start();

        // Update `status` in party payment table securely
        $this->db->set('status', 'unpaid')
                ->where('id', $partyPaymentId)
                ->update($partyPaymentTable);

        // Update `delete_status` in party payment received table securely
        $this->db->set('delete_status', 1)
                ->where('id', $partyPaymentReceivedId)
                ->update($partyPaymentReceivedTable);

        // Complete transaction
        $this->db->trans_complete();

        // Check transaction status
        if ($this->db->trans_status() === FALSE) {
            throw new Exception("Failed to delete party payment record.");
        }
    }

    public function completePurchaseRecord($recordId, $tableName = '')
    {
        // Secure the table name to prevent SQL injection
        $allowedTables = ['purchase_order', 'other_table']; // Add any other allowed tables here
        if (!in_array($tableName, $allowedTables)) {
            throw new Exception('Invalid table name provided.');
        }

        // Prepare SQL statement
        $sql = "UPDATE $tableName T1 LEFT JOIN estimation_bill EB ON EB.po_id = T1.id SET T1.status = 'completed', EB.po_status = 'completed' WHERE T1.id = ?";

        // Execute the SQL with parameterized query to avoid SQL injection
        $this->db->query($sql, [$recordId]);
    }

    public function deleteLeaveRecord($recordId)
    {
        $userId = $this->session->userdata('userid');

        $this->db->trans_start();

        $this->db->query("UPDATE `employee_leave` SET delete_status = 1, updated_by = ?, updated_at = NOW() WHERE id = ?", [$userId, $recordId]);
        $this->db->query("DELETE FROM `employee_leave_detail` WHERE leave_id = ?", [$recordId]);

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    // Get Logged User Information 
    public function getUserInfo()
    {
        $userId = $this->session->userdata('userid');
        
        $sql = "SELECT * FROM login_permission WHERE delete_status = 0 AND status = 'active' AND id = '".$userId."'";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function checkOldPassword($userid, $oldPassword)
    {
        $mdOldPassword = md5($oldPassword);

        $sql = "SELECT * FROM login_permission WHERE password = '" . $mdOldPassword . "' AND delete_status = 0 AND employee_id = $userid";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    // update Password
    public function passwordUpdate($userId, $newPassword)
    {
        $userPass = md5($newPassword);

        $data = array(
            'password' => $userPass,
            'updated_by' => $userId,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('employee_id', $userId);
        $this->db->update('login_permission', $data);
    }

    // Get Permission List 
    public function getPermissionList($pageStatus)
    {
        if ($pageStatus) {
            $where = "status = '$pageStatus' AND";
        }

        $sql = "SELECT * FROM login_permission WHERE $where delete_status = 0 AND is_admin = 0 ORDER BY employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Get Permission Information 
    public function getPermissionInfo($permissionId)
    {
        $sql = "SELECT * FROM login_permission WHERE id = '".$permissionId."'";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Login Code
    public function checkLoginCode($token, $mobileNumber)
    {
        $sql = "SELECT * FROM login_permission WHERE delete_status = 0 AND token = '" . $token . "' OR mobile_number = '" . $mobileNumber . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Permission Form
    public function savePermissionData($permissionId, $token, $loginCode, $name, $mobileNumber, $password, $permissionsString, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($permissionId > 0) {
            $data = array(
                'login_code' => $loginCode,
                'employee_name' => $name,
                'mobile_number' => $mobileNumber,
                'permission' => $permissionsString,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $permissionId);
            $this->db->update('login_permission', $data);
        } else {
            $data = array(
                'token' => $token,
                'login_code' => $loginCode,
                'employee_name' => $name,
                'mobile_number' => $mobileNumber,
                'password' => md5($password),
                'permission' => $permissionsString,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('login_permission', $data);
            $this->db->insert_id();
        }
    }

    //File Manage List
    public function getFileManageList()
    {
        $sql = "SELECT * FROM file_manage WHERE delete_status = 0 ORDER BY id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //File Manage Info
    public function getFileManageInfo($fileManageId)
    {
        $sql = "SELECT * FROM file_manage WHERE id = $fileManageId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save File Manage Form
    public function saveFileManageData($fileManageId, $fileName, $fileURL, $fileDoc_img, $remarks)
    {
        $userId = $this->session->userdata('userid');

        if ($fileManageId > 0) {
            $data = array(
                'file_name' => $fileName,
                'file_url' => $fileURL,
                'file_doc' => $fileDoc_img,
                'remarks' => $remarks,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $fileManageId);
            $this->db->update('file_manage', $data);
        } else {
            $data = array(
                'file_name' => $fileName,
                'file_url' => $fileURL,
                'file_doc' => $fileDoc_img,
                'remarks' => $remarks,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('file_manage', $data);
            $this->db->insert_id();
        }
    }
    
    // Month List
    public function getMonthEventList($year = '')
    {
        if ($year) {
            $where = " AND LOWER(DATE_FORMAT(date, '%Y')) = '$year'";
        } else {
            $where = "";
        }

        $sql = "SELECT *, LOWER(DATE_FORMAT(date, '%Y')) as year, LOWER(DATE_FORMAT(date, '%M')) as month FROM yearly_plan WHERE delete_status = 0 $where GROUP BY LOWER(DATE_FORMAT(date, '%M')) ORDER BY FIELD(LOWER(DATE_FORMAT(date, '%M')), 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'cctober', 'november', 'december')";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Yearly Plan List
    public function getYearlyPlanList($year = '', $month = '')
    {
        if ($year) {
            $where = "LOWER(DATE_FORMAT(date, '%Y')) = '$year' AND";
        } else {
            $where = "";
        }

        if ($month) {
            $whereMonth = "LOWER(DATE_FORMAT(date, '%M')) = '$month' AND";
        } else {
            $whereMonth = "";
        }

        $sql = "SELECT *, DATE_FORMAT(date, '%d - %m - %Y') AS dateFormat FROM yearly_plan WHERE $where $whereMonth delete_status = 0 ORDER BY id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Get Active Yearly Plans for a specific year
    public function getActiveYearlyPlans($year)
    {
        $sql = "SELECT *, DATE_FORMAT(date, '%d - %m - %Y') AS dateFormat FROM yearly_plan WHERE LOWER(DATE_FORMAT(date, '%Y')) = '$year' AND delete_status = 0 AND status != 'inactive' ORDER BY date ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Yearly Plan Info
    public function getYearlyPlanInfo($eventId)
    {
        $sql = "SELECT *, LOWER(DATE_FORMAT(date, '%Y')) as year, LOWER(DATE_FORMAT(date, '%M')) as month FROM yearly_plan WHERE id = $eventId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Yearly Plan Data Form
    public function saveYearlyPlanData($eventId, $date, $title, $description, $status, $planType)
    {
        $userId = $this->session->userdata('userid');

        if ($eventId > 0) {
            $data = array(
                'date' => $date,
                'title' => $title,
                'description' => $description,
                'status' => $status,
                'plan_type' => $planType,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $eventId);
            $this->db->update('yearly_plan', $data);
        } else {
            $data = array(
                'date' => $date,
                'title' => $title,
                'description' => $description,
                'status' => $status,
                'plan_type' => $planType,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('yearly_plan', $data);
            $this->db->insert_id();
        }
    }

    // Duplicate repeated events from previous year to target year
    public function duplicateRepeatedEventsForYear($targetYear)
    {
        $previousYear = (int)$targetYear - 1;
        
        // Find all repeated events from previous year
        $sql = "SELECT * FROM yearly_plan WHERE plan_type = 'repeated' AND delete_status = 0 AND LOWER(DATE_FORMAT(date, '%Y')) = '$previousYear'";
        $events = $this->db->query($sql)->result();
        
        $count = 0;
        foreach ($events as $event) {
            // Calculate new date
            $newDate = date('Y-m-d', strtotime('+1 year', strtotime($event->date)));
            
            // Check if already exists to prevent duplicate runs
            $checkSql = "SELECT id FROM yearly_plan WHERE title = ? AND date = ? AND delete_status = 0";
            $exists = $this->db->query($checkSql, array($event->title, $newDate))->num_rows();
            
            if ($exists == 0) {
                $data = array(
                    'date' => $newDate,
                    'title' => $event->title,
                    'description' => $event->description,
                    'status' => 'not_completed', // reset status
                    'plan_type' => 'repeated',
                    'created_by' => $event->created_by,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('yearly_plan', $data);
                $count++;
            }
        }
        return $count;
    }
    
    // Branch List
    public function getBranchRecentVisitList()
    {
        $sql = "SELECT BV.id, MB.id AS branch_id, MB.branch, MB.zone, DATE_FORMAT(MAX(BV.date), '%d - %m - %Y') AS visit_dateFormat FROM branch_visit BV LEFT JOIN master_branch MB ON BV.branch_id = MB.id WHERE BV.delete_status = 0 GROUP BY BV.branch_id";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Visit List
    public function getBranchVisitList($branchId = '')
    {
        if ($branchId) {
            $where = "branch_id = '$branchId' AND";
        } else {
            $where = "";
        }

        $sql = "SELECT *, DATE_FORMAT(date, '%d - %m - %Y') AS dateFormat FROM branch_visit WHERE $where delete_status = 0 ORDER BY date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Branch Visit Info
    public function getBranchVisitInfo($visitId)
    {
        $sql = "SELECT BV.*, MB.id AS branch_id, MB.zone FROM branch_visit BV LEFT JOIN master_branch MB ON MB.id = BV.branch_id WHERE BV.id = $visitId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Add Branch Visit Data Form
    public function saveAddBranchVisitData($branchVisitId, $visitDate, $branchId, $branchVisitArrayData)
    {
        $userId = $this->session->userdata('userid');

        if (!empty($branchVisitArrayData)) {
            foreach ($branchVisitArrayData as $row) {
                // Insert new record
                $insertData = array(
                    'date' => $visitDate,
                    'branch_id' => $branchId,
                    'title' => $row->title,
                    'remark' => $row->remark,
                    'status' => $row->status,
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('branch_visit', $insertData);
                $insertId = $this->db->insert_id(); // Get the last inserted ID
            }

            return isset($insertId) ? $insertId : null;
        }
    }

    //Save Edit Branch Visit Data Form
    public function saveEditBranchVisitData($branchVisitId, $visitDate, $branchId, $visitTitle, $visitRemark, $visitStatus)
    {
        $userId = $this->session->userdata('userid');

        $data = array(
            'date' => $visitDate,
            'branch_id' => $branchId,
            'title' => $visitTitle,
            'remark' => $visitRemark,
            'status' => $visitStatus,
            'updated_by' => $userId,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', (int) $branchVisitId);
        $this->db->update('branch_visit', $data);
    }
    
    public function tableChangeStatus($recordId, $tableName, $statusValue)
    {
        $userId = $this->session->userdata('userid');

        $sql = "UPDATE $tableName SET status = '" . $statusValue . "', updated_by = '" . $userId . "', updated_at = NOW() WHERE id =" . $recordId;

        $this->db->query($sql);
    }
    
    public function allEmployeeStatusChange($recordId, $statusValue)
    {
        $userId = $this->session->userdata('userid');

        $data = [
            'status'     => $statusValue,
            'updated_by' => $userId,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->db->update('employee', $data, ['id' => $recordId]);
        $this->db->update('login_permission', $data, ['employee_id' => $recordId]);
        $this->db->update('attendance_employee', $data, ['employee_id' => $recordId]);
    }
}
?>