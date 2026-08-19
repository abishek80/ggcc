<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mastermodel extends CI_Model
{
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

    //Employee Dropdown
    public function getEmployeeDropdown()
    {
        $sql = "SELECT id, employee_name FROM employee WHERE delete_status = 0 AND status = 'active' AND is_admin = 0 ORDER BY employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Payslip Employee Dropdown
    public function getPayslipEmployeeDropdown()
    {
        $sql = "SELECT id, employee_name FROM employee WHERE delete_status = 0 AND status = 'active' AND is_admin = 0 AND payslip_status = 'yes' ORDER BY employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Dropdown
    public function getAttendanceEmployeeDropdown()
    {
        $sql = "SELECT id, employee_name FROM attendance_employee WHERE delete_status = 0 AND status = 'active' ORDER BY employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Work Type Dropdown
    public function getWorkTypeDropdown()
    {
        $sql = "SELECT id, work_type FROM master_work_type WHERE delete_status = 0 AND status = 'active' ORDER BY work_type ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Project Type Dropdown
    public function getProjectTypeDropdown()
    {
        $sql = "SELECT id, project_type FROM master_project_type WHERE delete_status = 0 AND status = 'active' ORDER BY project_type ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Work Dropdown
    public function getEmployeeWorkDropdown($empId = '')
    {
        $is_admin = $this->session->userdata('is_admin');

        if($empId && $is_admin == 0) {
            $where = " AND EW.employee_id = $empId";
        }

        $sql = "SELECT EW.*, E.employee_name, MWT.work_type FROM employee_work EW INNER JOIN employee E ON E.id = EW.employee_id INNER JOIN master_work_type MWT ON MWT.id = EW.work_type WHERE EW.delete_status = 0 $where ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Task Dropdown
    public function getDailyTaskDropdown($empId = '')
    {
        $is_admin = $this->session->userdata('is_admin');

        if($empId && $is_admin == 0) {
            $where = " AND DT.employee_id = $empId";
        }

        $sql = "SELECT DT.*, E.employee_name FROM daily_task DT INNER JOIN employee E ON E.id = DT.employee_id WHERE DT.delete_status = 0 $where ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Incharge Dropdown
    public function getInchargeDropdown()
    {
        $sql = "SELECT E.* FROM master_incharge MI INNER JOIN employee E ON E.id = MI.employee WHERE MI.delete_status = 0 AND MI.status = 'active' GROUP BY E.employee_name ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Thirdparty Dropdown
    public function getThirdpartyDropdown()
    {
        $sql = "SELECT * FROM master_thirdparty WHERE delete_status = 0 AND status = 'active' ORDER BY thirdparty_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Party Name Dropdown
    public function getPartyNameDropdown()
    {
        $sql = "SELECT * FROM master_party WHERE delete_status = 0 AND status = 'active' ORDER BY party_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vehicle Dropdown
    public function getVehicleDropdown()
    {
        $sql = "SELECT * FROM vehicle WHERE delete_status = 0 AND status = 'active' ORDER BY vehicle_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Dropdown
    public function getBranchDropdown()
    {
        $sql = "SELECT * FROM master_branch WHERE delete_status = 0 AND status = 'active' ORDER BY branch ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Assets & Tools Dropdown
    public function getAssetsToolsDropdown($pageStatus='')
    {
        if ($pageStatus) {
            $where = "AND type = '" . $pageStatus . "'";
        }else{
            $where = '';
        }

        $sql = "SELECT * FROM master_assets WHERE delete_status = 0 AND status = 'active' $where ORDER BY name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Designation Dropdown
    public function getDesignationDropdown()
    {
        $sql = "SELECT * FROM master_designation WHERE delete_status = 0 AND status = 'active' ORDER BY designation ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //GST Dropdown
    public function gstDropdown()
    {
        $sql = "SELECT * FROM master_gst WHERE delete_status = 0 AND status = 'active' ORDER BY gst_number ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vendor Code Dropdown
    public function vendorCodeDropdown()
    {
        $sql = "SELECT * FROM master_vendor WHERE delete_status = 0 AND status = 'active' ORDER BY vendor_code ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //PAN Dropdown
    public function panDropdown()
    {
        $sql = "SELECT * FROM master_pan WHERE delete_status = 0 AND status = 'active' ORDER BY pan_number ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Pettycash Title Dropdown
    public function pettycashTitleDropdown()
    {
        $sql = "SELECT * FROM master_pettycash WHERE delete_status = 0 AND status = 'active' ORDER BY title ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Purchase Order Number Dropdown
    public function getpoNumberDropdown($branchId='')
    {
        if (!empty($branchId)) {
            $where = " AND branch_id=$branchId";
        } else {
            $where = '';
        }

        $sql = "SELECT * FROM purchase_order WHERE delete_status = 0 $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Purchase Order Number Dropdown
    public function getMaterialDropdown($materialId='')
    {
        if (!empty($materialId)) {
            $where = " AND id=$materialId";
        } else {
            $where = '';
        }

        $sql = "SELECT * FROM master_material WHERE delete_status = 0 AND status = 'active' AND entry_type = 'monthly_entry' $where ORDER BY CAST(material_code AS UNSIGNED) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Pettycash Title List
    public function pettycashTitleList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MP.status = '$pageStatus'";
        }

        $sql = "SELECT MP.*, DATE_FORMAT(MP.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_pettycash MP INNER JOIN login_permission LP ON LP.employee_id = MP.created_by WHERE MP.delete_status = 0 $where ORDER BY MP.title ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Pettycash Title Info
    public function getPettycashTitleInfo($pettycashTitleId)
    {
        $sql = "SELECT * FROM master_pettycash WHERE delete_status = 0 AND id = $pettycashTitleId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check PettycashTitle
    public function checkPettycashTitle($token)
    {
        $sql = "SELECT * FROM master_pettycash WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Pettycash Title Form
    public function savePettycashTitleData($pettycashTitleId, $token, $pettycashTitle, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($pettycashTitleId > 0) {
            $data = array(
                'title' => $pettycashTitle,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $pettycashTitleId);
            $this->db->update('master_pettycash', $data);
        } else {
            $data = array(
                'token' => $token,
                'title' => $pettycashTitle,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_pettycash', $data);
            $this->db->insert_id();
        }
    }

    public function thirdpartyList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MT.status = '$pageStatus'";
        }

        $sql = "SELECT MT.*, DATE_FORMAT(MT.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_thirdparty MT INNER JOIN login_permission LP ON LP.employee_id = MT.created_by WHERE MT.delete_status = 0 $where ORDER BY MT.thirdparty_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Thirdparty Info
    public function getThirdpartyInfo($thirdpartyId)
    {
        $sql = "SELECT * FROM master_thirdparty WHERE delete_status = 0 AND id = $thirdpartyId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Thirdparty Detail
    public function getThirdpartyDetail($thirdpartyName = '')
    {
        if ($thirdpartyName > '') {
            $where = "WHERE id = " . $thirdpartyName;
        }else{
            $where = '';
        }
        
        $sql ="SELECT id AS thirdpartyId, remarks AS thirdpartyRemarks FROM master_thirdparty $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Thirdparty
    public function checkThirdparty($token)
    {
        $sql = "SELECT * FROM master_thirdparty WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Thirdparty Form
    public function saveThirdpartyData($thirdpartyId, $token, $thirdpartyName, $thirdpartyRemarks, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($thirdpartyId > 0) {
            $data = array(
                'thirdparty_name' => $thirdpartyName,
                'remarks' => $thirdpartyRemarks,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $thirdpartyId);
            $this->db->update('master_thirdparty', $data);
        } else {
            $data = array(
                'token' => $token,
                'thirdparty_name' => $thirdpartyName,
                'remarks' => $thirdpartyRemarks,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_thirdparty', $data);
            $this->db->insert_id();
        }
    }

    //Material List
    public function materialList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MM.status = '$pageStatus'";
        }

        $sql = "SELECT MM.*, DATE_FORMAT(MM.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_material MM INNER JOIN login_permission LP ON LP.employee_id = MM.created_by WHERE MM.delete_status = 0 $where ORDER BY CAST(MM.material_code AS UNSIGNED) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Material Info
    public function getMaterialInfo($materialId = '')
    {
        if($materialId) {
            $sql = "SELECT * FROM master_material WHERE delete_status = 0 AND id = $materialId";

            $res = $this->db->query($sql);  
            return $res->result();
        }
    }

    //Check Material
    public function checkMaterial($token, $materialCategory, $materialType, $entryType)
    {
        $sql = "SELECT * FROM master_material WHERE delete_status = 0 AND token = '" . $token . "' AND category = '" . $materialCategory . "' AND type = '" . $materialType . "' AND entry_type = '" . $entryType . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Material Form
    public function saveMaterialData($materialId, $token, $materialCode, $materialName, $materialCategory, $materialType, $entryType, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_material');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($materialId > 0) {
            $data = array(
                'material_code' => $materialCode,
                'material_name' => $materialName,
                'category' => $materialCategory,
                'type' => $materialType,
                'entry_type' => $entryType,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $materialId);
            $this->db->update('master_material', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'material_code' => $materialCode,
                'material_name' => $materialName,
                'category' => $materialCategory,
                'type' => $materialType,
                'entry_type' => $entryType,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_material', $data);
            $this->db->insert_id();
        }
    }

    //Assets & Tools List
    public function assetsToolsList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MA.status = '$pageStatus'";
        }

        $sql = "SELECT MA.*, DATE_FORMAT(MA.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_assets MA INNER JOIN login_permission LP ON LP.employee_id = MA.created_by WHERE MA.delete_status = 0 $where ORDER BY MA.type ASC, MA.name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Assets & Tools Info
    public function getAssetsToolsInfo($assetsToolsId)
    {
        $sql = "SELECT * FROM master_assets WHERE delete_status = 0 AND id = $assetsToolsId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Assets
    public function checkAssetsTools($token, $assetsToolsType)
    {
        $sql = "SELECT * FROM master_assets WHERE delete_status = 0 AND token = '" . $token . "' AND type = '" . $assetsToolsType . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Assets & Tools Form
    public function saveAssetsToolsData($assetsToolsId, $token, $assetsToolsName, $assetsToolsType, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($assetsToolsId > 0) {
            $data = array(
                'name' => $assetsToolsName,
                'type' => $assetsToolsType,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $assetsToolsId);
            $this->db->update('master_assets', $data);
        } else {
            $data = array(
                'token' => $token,
                'name' => $assetsToolsName,
                'type' => $assetsToolsType,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_assets', $data);
            $this->db->insert_id();
        }
    }

    //Party Name List
    public function partyNameList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MPT.status = '$pageStatus'";
        }

        $sql = "SELECT MPT.*, DATE_FORMAT(MPT.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_party MPT INNER JOIN login_permission LP ON LP.employee_id = MPT.created_by WHERE MPT.delete_status = 0 $where ORDER BY MPT.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Party Name Info
    public function getPartyNameInfo($partyNameId)
    {
        $sql = "SELECT * FROM master_party WHERE delete_status = 0 AND id = $partyNameId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Party Name
    public function checkPartyName($companyName, $token)
    {
        $sql = "SELECT * FROM master_party WHERE delete_status = 0 AND token = '" . $token . "' AND company_name = '" . $companyName . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Party Name Form
    public function savePartyNameData($partyNameId, $token, $companyName, $partyName, $email, $mobileNumber, $msme, $msmeNumber, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_party');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($partyNameId > 0) {
            $data = array(
                'company_name' => $companyName,
                'party_name' => $partyName,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'msme' => $msme,
                'msme_number' => $msmeNumber,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $partyNameId);
            $this->db->update('master_party', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'company_name' => $companyName,
                'party_name' => $partyName,
                'email' => $email,
                'mobile_number' => $mobileNumber,
                'msme' => $msme,
                'msme_number' => $msmeNumber,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_party', $data);
            $this->db->insert_id();
        }
    }

    //Vendor List
    public function vendorList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MV.status = '$pageStatus'";
        }

        $sql = "SELECT MV.*, DATE_FORMAT(MV.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_vendor MV INNER JOIN login_permission LP ON LP.employee_id = MV.created_by WHERE MV.delete_status = 0 $where ORDER BY MV.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vendor Info
    public function getVendorInfo($vendorId)
    {
        $sql = "SELECT * FROM master_vendor WHERE delete_status = 0 AND id = $vendorId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Vendor
    public function checkVendor($token)
    {
        $sql = "SELECT * FROM master_vendor WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Vendor Form
    public function saveVendorData($vendorId, $token, $vendorName, $vendorCode, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_vendor');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($vendorId > 0) {
            $data = array(
                'vendor_name' => $vendorName,
                'vendor_code' => $vendorCode,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $vendorId);
            $this->db->update('master_vendor', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'vendor_name' => $vendorName,
                'vendor_code' => $vendorCode,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_vendor', $data);
            $this->db->insert_id();
        }
    }

    //PAN List
    public function panList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MP.status = '$pageStatus'";
        }

        $sql = "SELECT MP.*, DATE_FORMAT(MP.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_pan MP INNER JOIN login_permission LP ON LP.employee_id = MP.created_by WHERE MP.delete_status = 0 $where ORDER BY MP.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //PAN Info
    public function getPANInfo($panId)
    {
        $sql = "SELECT * FROM master_pan WHERE delete_status = 0 AND id = $panId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check PAN
    public function checkPAN($token)
    {
        $sql = "SELECT * FROM master_pan WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save PAN Form
    public function savePANData($panId, $token, $panNumber, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_pan');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($panId > 0) {
            $data = array(
                'pan_number' => $panNumber,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $panId);
            $this->db->update('master_pan', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'pan_number' => $panNumber,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_pan', $data);
            $this->db->insert_id();
        }
    }

    //GST List
    public function gstList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MG.status = '$pageStatus'";
        }

        $sql = "SELECT MG.*, DATE_FORMAT(MG.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_gst MG INNER JOIN login_permission LP ON LP.employee_id = MG.created_by WHERE MG.delete_status = 0 $where ORDER BY MG.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //GST Info
    public function getGSTInfo($gstId)
    {
        $sql = "SELECT * FROM master_gst WHERE delete_status = 0 AND id = $gstId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check GST
    public function checkGST($token)
    {
        $sql = "SELECT * FROM master_gst WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save GST Form
    public function saveGSTData($gstId, $token, $gstNumber, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_gst');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($gstId > 0) {
            $data = array(
                'gst_number' => $gstNumber,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $gstId);
            $this->db->update('master_gst', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'gst_number' => $gstNumber,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_gst', $data);
            $this->db->insert_id();
        }
    }

    //Designation List
    public function designationList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MD.status = '$pageStatus'";
        }

        $sql = "SELECT MD.*, DATE_FORMAT(MD.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_designation MD INNER JOIN login_permission LP ON LP.employee_id = MD.created_by WHERE MD.delete_status = 0 $where ORDER BY MD.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Designation Info
    public function getDesignationInfo($designationId)
    {
        $sql = "SELECT * FROM master_designation WHERE delete_status = 0 AND id = $designationId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Designation
    public function checkDesignation($token)
    {
        $sql = "SELECT * FROM master_designation WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Designation Form
    public function saveDesignationData($designationId, $token, $designation, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_designation');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($designationId > 0) {
            $data = array(
                'designation' => $designation,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $designationId);
            $this->db->update('master_designation', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'designation' => $designation,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_designation', $data);
            $this->db->insert_id();
        }
    }

    //Branch List
    public function branchList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MB.status = '$pageStatus'";
        }

        $sql = "SELECT MB.*, DATE_FORMAT(MB.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_branch MB INNER JOIN login_permission LP ON LP.employee_id = MB.created_by WHERE MB.delete_status = 0 $where ORDER BY MB.branch ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Info
    public function getBranchInfo($branchId = '')
    {
        if($branchId) {
            $where = " AND id = $branchId";
        } else {
            $where = "";
        }
        $sql = "SELECT * FROM master_branch WHERE delete_status = 0 $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Branch
    public function checkBranch($token)
    {
        $sql = "SELECT * FROM master_branch WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Branch Form
    public function saveBranchData($branchId, $token, $branchZone, $branch, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_branch');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($branchId > 0) {
            $data = array(
                'zone' => $branchZone,
                'branch' => $branch,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $branchId);
            $this->db->update('master_branch', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'zone' => $branchZone,
                'branch' => $branch,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_branch', $data);
            $this->db->insert_id();
        }
    }

    //Complaint Incharge List
    public function complaintInchargeList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MI.status = '$pageStatus'";
        }

        $sql = "SELECT MI.*, DATE_FORMAT(MI.created_at, '%d/%m/%Y %h:%i %p') AS created_at, MB.branch, LP.employee_name AS created_by, E.employee_name FROM master_incharge MI INNER JOIN employee E ON E.id = MI.employee INNER JOIN login_permission LP ON LP.employee_id = MI.created_by INNER JOIN master_branch MB ON MB.id = MI.branch WHERE MI.delete_status = 0 $where ORDER BY MI.employee ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Complaint Incharge Info
    public function getComplaintInchargeInfo($inchargeId)
    {
        $sql = "SELECT * FROM master_incharge WHERE delete_status = 0 AND id = $inchargeId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Incharge
    public function checkIncharge($branch, $employee)
    {
        $sql = "SELECT * FROM master_incharge WHERE delete_status = 0 AND branch = '" . $branch . "' AND employee = '" . $employee . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Complaint Incharge Form
    public function saveComplaintInchargeData($inchargeId, $zone, $branch, $employee, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('master_incharge');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($inchargeId > 0) {
            $data = array(
                'zone' => $zone,
                'branch' => $branch,
                'employee' => $employee,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $inchargeId);
            $this->db->update('master_incharge', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'zone' => $zone,
                'branch' => $branch,
                'employee' => $employee,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_incharge', $data);
            $this->db->insert_id();
        }
    }

    //Work Type List
    public function workTypeList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MWT.status = '$pageStatus'";
        }

        $sql = "SELECT MWT.*, DATE_FORMAT(MWT.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_work_type MWT INNER JOIN login_permission LP ON LP.employee_id = MWT.created_by WHERE MWT.delete_status = 0 $where ORDER BY MWT.work_type ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Work Type Info
    public function getWorkTypeInfo($workTypeId)
    {
        $sql = "SELECT * FROM master_work_type WHERE delete_status = 0 AND id = $workTypeId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Work Type
    public function checkWorkType($token)
    {
        $sql = "SELECT * FROM master_work_type WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Work Type Form
    public function saveWorkTypeData($workTypeId, $token, $workType, $dayCount, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($workTypeId > 0) {
            $data = array(
                'work_type' => $workType,
                'day_count' => $dayCount,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $workTypeId);
            $this->db->update('master_work_type', $data);
        } else {
            $data = array(
                'token' => $token,
                'work_type' => $workType,
                'day_count' => $dayCount,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_work_type', $data);
            $this->db->insert_id();
        }
    }

    //Project Type List
    public function projectTypeList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND MWT.status = '$pageStatus'";
        }

        $sql = "SELECT MWT.*, DATE_FORMAT(MWT.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name FROM master_project_type MWT INNER JOIN login_permission LP ON LP.employee_id = MWT.created_by WHERE MWT.delete_status = 0 $where ORDER BY MWT.project_type ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Project Type Info
    public function getProjectTypeInfo($projectTypeId)
    {
        $sql = "SELECT * FROM master_project_type WHERE delete_status = 0 AND id = $projectTypeId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Project Type
    public function checkProjectType($token)
    {
        $sql = "SELECT * FROM master_project_type WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Project Type Form
    public function saveProjectTypeData($projectTypeId, $token, $projectType, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($projectTypeId > 0) {
            $data = array(
                'project_type' => $projectType,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $projectTypeId);
            $this->db->update('master_project_type', $data);
        } else {
            $data = array(
                'token' => $token,
                'project_type' => $projectType,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('master_project_type', $data);
            $this->db->insert_id();
        }
    }

    // Menu Control List
    public function getMenuControlList()
    {
        $sql = "SELECT * FROM menu_control WHERE delete_status = 0 ORDER BY display_order ASC";
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Update Menu Status
    public function updateMenuStatus($menuKey, $status)
    {
        $data = array('status' => $status);
        $this->db->where('menu_key', $menuKey);
        return $this->db->update('menu_control', $data);
    }

    // Menu Control Info
    public function getMenuControlInfo($menuId)
    {
        $sql = "SELECT * FROM menu_control WHERE delete_status = 0 AND id = " . (int)$menuId;
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Save Menu Control Data
    public function saveMenuControlData($menuId, $menuKey, $menuName, $parentKey, $displayOrder, $status)
    {
        $userId = $this->session->userdata('userid');
        if ($parentKey == '') {
            $parentKey = NULL;
        }

        if ($menuId > 0) {
            $data = array(
                'menu_key' => $menuKey,
                'menu_name' => $menuName,
                'parent_key' => $parentKey,
                'display_order' => $displayOrder,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $menuId);
            $this->db->update('menu_control', $data);
        } else {
            $data = array(
                'menu_key' => $menuKey,
                'menu_name' => $menuName,
                'parent_key' => $parentKey,
                'display_order' => $displayOrder,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('menu_control', $data);
            return $this->db->insert_id();
        }
    }

    // Check Menu Key Exists
    public function checkMenuKeyExists($menuKey)
    {
        $sql = "SELECT COUNT(*) AS cnt FROM menu_control WHERE delete_status = 0 AND menu_key = " . $this->db->escape($menuKey);
        $res = $this->db->query($sql);
        $row = $res->row();
        return $row->cnt;
    }
}
?>