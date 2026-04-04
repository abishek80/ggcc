<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Outletmodel extends CI_Model
{
    //Outlet List
    public function outletList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND O.status = '$pageStatus'";
        }

        $sql = "SELECT O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch FROM outlet O INNER JOIN login_permission LP ON LP.employee_id = O.created_by INNER JOIN master_branch B ON B.id = O.branch WHERE O.delete_status = 0 $where ORDER BY O.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Outlet Report List
    public function outletReportList($pageStatus='', $branch_id = '')
    {
        if ($branch_id) {
            $where = "AND O.branch = '$branch_id' AND O.status = '$pageStatus'";
        }

        $sql = "SELECT O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch FROM outlet O INNER JOIN login_permission LP ON LP.employee_id = O.created_by INNER JOIN master_branch B ON B.id = O.branch WHERE O.delete_status = 0 $where ORDER BY O.id DESC";

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

    public function getDropdownOutletInfo($outletName = '')
    {
        if ($outletName > '') {
            $where = "WHERE id = " . $outletName . " AND status = 'active' AND delete_status = 0 ORDER BY outlet_name ASC";
        }else{
            $where = '';
        }
        
        $sql ="SELECT * FROM outlet $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Outlet Info
    public function getOutletInfo($outletId)
    {
        $sql = "SELECT O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch FROM outlet O INNER JOIN login_permission LP ON LP.employee_id = O.created_by INNER JOIN master_branch B ON B.id = O.branch WHERE O.delete_status = 0 AND O.id = $outletId";

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

    //Save Outlet Form
    public function saveOutletData($outletId, $token, $zone, $branch, $outletType, $customerId, $outletName, $outletLocation, $contactName, $contactNumber, $earthingChamber, $checkingDate, $renewalDate, $cvt, $stabilizer, $yardPole, $stp, $canopyLight, $pump, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('outlet');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($outletId > 0) {
            $data = array(
                'zone' => $zone,
                'branch' => $branch,
                'outlet_type' => $outletType,
                'customer_id' => $customerId,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'contact_name' => $contactName,
                'contact_number' => $contactNumber,
                'earthing_chamber' => $earthingChamber,
                'checking_date' => $checkingDate,
                'renewal_date' => $renewalDate,
                'cvt' => $cvt,
                'stabilizer' => $stabilizer,
                'stp' => $stp,
                'yard_pole' => $yardPole,
                'canopy_light' => $canopyLight,
                'pump' => $pump,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $outletId);
            $this->db->update('outlet', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'zone' => $zone,
                'branch' => $branch,
                'outlet_type' => $outletType,
                'customer_id' => $customerId,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'contact_name' => $contactName,
                'contact_number' => $contactNumber,
                'earthing_chamber' => $earthingChamber,
                'checking_date' => $checkingDate,
                'renewal_date' => $renewalDate,
                'cvt' => $cvt,
                'stabilizer' => $stabilizer,
                'stp' => $stp,
                'yard_pole' => $yardPole,
                'canopy_light' => $canopyLight,
                'pump' => $pump,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('outlet', $data);
            $this->db->insert_id();
        }
    }


    //Branch Project List
    public function getAllBranchProjectList()
    {
        $sql = "SELECT B.zone, B.branch, B.id AS branch_id, COUNT(BP.id) AS overall_project_count, SUM(CASE WHEN BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_overall_project_count, SUM(CASE WHEN BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_overall_project_count, SUM(CASE WHEN BP.project_status = 'not_started' AND BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_notstarted_project_count, SUM(CASE WHEN BP.project_status = 'not_started' AND BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_notstarted_project_count, SUM(CASE WHEN BP.project_status = 'ongoing' AND BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_ongoing_project_count, SUM(CASE WHEN BP.project_status = 'ongoing' AND BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_ongoing_project_count, SUM(CASE WHEN BP.project_status = 'completed' AND BP.project_category = 'hpcl' THEN 1 ELSE 0 END) AS hpcl_completed_project_count, SUM(CASE WHEN BP.project_status = 'completed' AND BP.project_category = 'private' THEN 1 ELSE 0 END) AS private_completed_project_count FROM branch_project BP INNER JOIN master_branch B ON B.id = BP.branch_id WHERE BP.delete_status = 0 GROUP BY B.zone, B.branch ORDER BY B.branch ASC;";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Project List
    public function getProjectCategoryList($projectCategory = '', $branchId = '')
    {
        $whereProjectCategory = '';
        $whereBranchId = '';

        if ($projectCategory) {
            $whereProjectCategory = "AND BP.project_category = '$projectCategory'";
        }

        if ($branchId) {
            $whereBranchId = "AND BP.branch_id = '$branchId'";
        }

        $sql = "SELECT BP.project_type, COUNT(BP.id) AS overall_project_count, SUM(CASE WHEN BP.project_status = 'not_started' THEN 1 ELSE 0 END) AS notstarted_project_count, SUM(CASE WHEN BP.project_status = 'ongoing' THEN 1 ELSE 0 END) AS ongoing_project_count, SUM(CASE WHEN BP.project_status = 'completed' THEN 1 ELSE 0 END) AS completed_project_count, MPT.project_type AS project_type_name, MPT.id AS project_type_id FROM branch_project BP LEFT JOIN master_project_type MPT ON MPT.id = BP.project_type WHERE BP.delete_status = 0 $whereBranchId $whereProjectCategory GROUP BY BP.project_type";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Project List
    public function getBranchProjectList($projectCategory = '', $branchId = '', $projectType = '')
    {
        if ($projectCategory) {
            $whereProjectCategory = "AND BP.project_category = '$projectCategory'";
        }
        if ($branchId) {
            $whereBranchId = "AND BP.branch_id = '$branchId'";
        }
        if ($projectType) {
            $whereProjectType = "AND BP.project_type = '$projectType'";
        }

        $sql = "SELECT BP.*, DATE_FORMAT(BP.date, '%d-%m-%Y') AS projectDateFormat, DATE_FORMAT(BP.completed_date, '%d-%m-%Y') AS projectCompletedDateFormat, E.employee_name, MD.designation AS employee_designation, B.branch AS branch_name, B.id AS branch_id, B.zone, MPT.project_type AS project_type_name FROM branch_project BP LEFT JOIN master_project_type MPT ON MPT.id = BP.project_type LEFT JOIN employee E ON E.id = BP.employee_id LEFT JOIN master_designation MD ON MD.id = E.designation LEFT JOIN master_branch B ON B.id = BP.branch_id WHERE BP.delete_status = 0 $whereProjectCategory $whereBranchId $whereProjectType";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Branch Project Info
    public function getBranchProjectInfo($branchProjectId)
    {
        $sql = "SELECT BP.*, B.zone, B.branch, MPT.project_type AS project_type_name, E.employee_name, MD.designation AS employee_designation, DATE_FORMAT(BP.date, '%d - %m - %Y') AS project_dateFormat, DATE_FORMAT(BP.completed_date, '%d - %m - %Y') AS completed_dateFormat, MPT.id AS project_type_id FROM branch_project BP INNER JOIN master_branch B ON B.id = BP.branch_id LEFT JOIN employee E ON E.id = BP.employee_id LEFT JOIN master_project_type MPT ON MPT.id = BP.project_type LEFT JOIN master_designation MD ON MD.id = E.designation WHERE BP.id = $branchProjectId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Branch Project Form
    public function saveBranchProjectData($branchProjectId, $branchId, $projectCategory, $projectType, $projectDate, $outletName, $outletLocation, $employeeName, $projectStatus, $completedDate)
    {
        $userId = $this->session->userdata('userid');

        if ($branchProjectId > 0) {
            $data = array(
                'branch_id' => $branchId,
                'project_category' => $projectCategory,
                'project_type' => $projectType,
                'date' => $projectDate,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'completed_date' => $completedDate,
                'employee_id' => $employeeName,
                'project_status' => $projectStatus,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $branchProjectId);
            $this->db->update('branch_project', $data);
        } else {
            $data = array(
                'branch_id' => $branchId,
                'project_category' => $projectCategory,
                'project_type' => $projectType,
                'date' => $projectDate,
                'outlet_name' => $outletName,
                'outlet_location' => $outletLocation,
                'completed_date' => $completedDate,
                'employee_id' => $employeeName,
                'project_status' => $projectStatus,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('branch_project', $data);
            $this->db->insert_id();
        }
    }
    
    //Branch Project Completed Form
    public function saveBranchProjectCompletedForm($branchProjectId, $completedDate)
    {
        if ($branchProjectId > 0) {
            $data = array(
                'completed_date' => $completedDate,
                'project_status' => 'completed'
            );
            $this->db->where('id', (int) $branchProjectId);
            $this->db->update('branch_project', $data);
        }
    }

    // Server Side Outlet List
    public function get_outlets_server_side($postData, $pageStatus = '')
    {
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Custom Filter
        $branchId = $postData['branchId'];

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (O.outlet_name like '%" . $searchValue . "%' or O.outlet_location like '%" . $searchValue . "%' or O.customer_id like '%" . $searchValue . "%' or O.contact_name like '%" . $searchValue . "%' or O.contact_number like '%" . $searchValue . "%' or B.branch like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('outlet O');
        $this->db->where('O.delete_status', 0);
        if ($pageStatus) {
            $this->db->where('O.status', $pageStatus);
        }
        $query = $this->db->get();
        $records = $query->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of records with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('outlet O');
        $this->db->join('master_branch B', 'B.id = O.branch', 'inner');
        $this->db->where('O.delete_status', 0);
        if ($pageStatus) {
            $this->db->where('O.status', $pageStatus);
        }
        if ($branchId != '') {
            $this->db->where('O.branch', $branchId);
        }
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $query = $this->db->get();
        $records = $query->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select("O.*, DATE_FORMAT(O.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(O.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(O.checking_date, '%d - %m - %Y') AS checking_dateFormat, LP.employee_name, B.branch AS branch_name");
        $this->db->from('outlet O');
        $this->db->join('login_permission LP', 'LP.employee_id = O.created_by', 'inner');
        $this->db->join('master_branch B', 'B.id = O.branch', 'inner');
        $this->db->where('O.delete_status', 0);
        if ($pageStatus) {
            $this->db->where('O.status', $pageStatus);
        }
        if ($branchId != '') {
            $this->db->where('O.branch', $branchId);
        }
        if ($searchQuery != '') {
            $this->db->where($searchQuery);
        }
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $query = $this->db->get();
        $data = $query->result();

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
}
?>