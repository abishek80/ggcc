<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loginmodel extends CI_Model
{
    // Login Checking
    public function checkLogin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('login_permission');
        $this->db->where("(mobile_number = '$username' OR login_code = '$username')");
        $this->db->where('delete_status', 0);
        $this->db->where('status', 'active');
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        $res = $query->result();
        $rows = $query->num_rows();
        $login_id = '';

        $status = '';
        if (!empty($res)) {
            foreach ($res as $row) {
                $status = $row->status;

                if ($status == 'active') {
                    $userData = array(
                        'userid' => $row->id,
                        'empid' => $row->employee_id,
                        'logincode' => $row->login_code,
                        'username' => $row->employee_name,
                        'mobile' => $row->mobile_number,
                        'permission' => $row->permission,
                        'loggedin' => TRUE,
                        'is_admin' => $row->is_admin
                    );
                    $this->session->set_userdata($userData);
                }

                $login_id = $row->id;
            }
        }
        $resArr["rowCount"] = $rows;
        $resArr["status"] = $status;
        $resArr["login_id"] = $login_id;
        return $resArr;
    }

    public function branchDropdownList($zone = '')
    {
        if ($zone > '') {
            $where = "WHERE zone = '" . $zone. "' AND status = 'active' AND delete_status = 0 ORDER BY branch ASC";
        }else{
            $where = '';
        }
        
        $sql ="SELECT id, zone, branch, status FROM master_branch $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function outletDropdownList($zone = '', $branch = '')
    {
        if ($zone > '' && $branch > '') {
            $where = "WHERE zone = '" . $zone . "' AND branch = '" . $branch . "' AND status = 'active' AND delete_status = 0 ORDER BY outlet_name ASC";
        }else{
            $where = '';
        }
        
        $sql ="SELECT * FROM outlet $where";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    public function getEmployeeInchargeDropdown($zone = '', $branch = '')
    {
        if ($zone > '' && $branch > '') {
            $where = "WHERE MI.zone = '" . $zone . "' AND MI.branch = " . $branch . " AND MI.status = 'active' AND MI.delete_status = 0 ORDER BY E.employee_name ASC";
        }else{
            $where = '';
        }
        
        $sql ="SELECT MI.*, E.employee_name FROM master_incharge MI INNER JOIN employee E ON E.id = MI.employee $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getDropdownOutletInfo($outletName = '')
    {
        if ($outletName > '') {
            $where = "WHERE id = " . $outletName . " AND status = 'active' AND delete_status = 0";
        }else{
            $where = '';
        }
        
        $sql ="SELECT * FROM outlet $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Outlet
    public function checkOutlet($token, $branch)
    {
        $sql = "SELECT * FROM outlet WHERE delete_status = 0 AND token = '" . $token . "' AND branch = '" . $branch . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Complaint Form
    public function saveComplaintData($date, $complaintId, $outletId, $token, $zone, $branch, $complainterName, $complainterNumber, $workType, $assignTo, $outletName, $outletLocation, $contactName, $contactNumber, $oldOutletName, $oldOutletLocation, $oldContactName, $oldContactNumber, $description, $alreadyExists)
    {
        $year = date('y');

        // Get the max id from the 'complaint' table
        $this->db->select_max('id');
        $query = $this->db->get('complaint');
        $result = $query->row_array();
        $maxID = isset($result['id']) ? $result['id'] : 0;
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber = $year . '/' . $miNumberId;
        
        // Get the max id from the 'outlet' table
        $this->db->select_max('id');
        $outlet_query = $this->db->get('outlet');
        $outlet_result = $outlet_query->row_array();
        $outlet_maxID = isset($outlet_result['id']) ? $outlet_result['id'] : 0;
        $maxOutletId = sprintf($outlet_maxID + 1);
        $outletNumberId = sprintf("%05d", $outlet_maxID + 1);
        $snoNumber = $year . '/' . $outletNumberId;
    
        // Get the max id from the 'Outlet' table
        if (empty($outletId)) {
            $outletId = $maxOutletId;
        }

        if (empty($outletName)) {
            $outletName= '';
        }
        if (empty($outletLocation)) {
            $outletLocation= '';
        }
        if (empty($contactName)) {
            $contactName= '';
        }
        if (empty($contactNumber)) {
            $contactNumber= '';
        }
        if (empty($oldOutletName)) {
            $oldOutletName= '';
        }
        if (empty($oldOutletLocation)) {
            $oldOutletLocation= '';
        }
        if (empty($oldContactName)) {
            $oldContactName= '';
        }
        if (empty($oldContactNumber)) {
            $oldContactNumber= '';
        }
        
        if ($complaintId > 0) {
            $data = array(
                'date' => $date,
                'zone' => $zone,
                'branch' => $branch,
                'complainter_name' => $complainterName,
                'complainter_number' => $complainterNumber,
                'work_type' => $workType,
                'assign_to' => $assignTo,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'contact_name' => $contactName,
                'contact_number' => $contactNumber,
                'outlet_id' => $outletId,
                'old_outlet_name' => $oldOutletName,
                'old_outlet_location' => $oldOutletLocation,
                'old_contact_name' => $oldContactName,
                'old_contact_number' => $oldContactNumber,
                'description' => $description,
                'outlet_exists' => $alreadyExists,
                'updated_by' => 0,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $complaintId);
            $this->db->update('complaint', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'date' => $date,
                'zone' => $zone,
                'branch' => $branch,
                'complainter_name' => $complainterName,
                'complainter_number' => $complainterNumber,
                'work_type' => $workType,
                'assign_to' => $assignTo,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'contact_name' => $contactName,
                'contact_number' => $contactNumber,
                'outlet_id' => $outletId,
                'old_outlet_name' => $oldOutletName,
                'old_outlet_location' => $oldOutletLocation,
                'old_contact_name' => $oldContactName,
                'old_contact_number' => $oldContactNumber,
                'description' => $description,
                'status' => 'not_started',
                'outlet_exists' => $alreadyExists,
                'created_by' => 2,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('complaint', $data);
            $this->db->insert_id();
        }

        if ($alreadyExists == 1) {
          $outletData = array(
            'sno' => $snoNumber,
            'token' => $token,
            'zone' => $zone,
            'branch' => $branch,
            'outlet_name' => $outletName,
            'outlet_location' => $outletLocation,
            'contact_name' => $contactName,
            'contact_number' => $contactNumber,
            'status' => 'active',
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s')
          );
          $this->db->insert('outlet', $outletData);
          $this->db->insert_id();
        }
    }
}
?>