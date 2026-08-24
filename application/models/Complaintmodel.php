<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Complaintmodel extends CI_Model
{
    //Complaint List
    public function complaintList($pageStatus = '', $limit = '')
    {
      $empName = $this->session->userdata('username');

      $userPermission = json_decode($this->session->userdata('permission'), true);

      if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
        $whereUser = "";
      } else {
        $whereUser = "AND C.assign_to = '$empName'";
      }
    
      if ($pageStatus) {
        $where = "AND C.status = '$pageStatus'";
      } else {
        $where = "";
      }
      if ($limit) {
        $listLimit = "LIMIT $limit";
      } else {
        $listLimit = "";
      }

      $sql = "SELECT C.*, B.branch AS branch_name, DATE_FORMAT(C.date, '%d - %m - %Y') AS complaint_date, C.assign_to AS assign_toName FROM complaint C INNER JOIN master_branch B ON B.id = C.branch WHERE C.delete_status = 0 $where $whereUser ORDER BY C.date DESC $listLimit"; 
      $res = $this->db->query($sql);
      return $res->result();
    }

    //Employee Complaint List
    public function employeeComplaintList($empName = '')
    {
        if ($empName) {
            $where = "AND C.assign_to = '$empName'";
        }

        $sql = "SELECT C.*, B.branch AS branch_name, DATE_FORMAT(C.date, '%d - %m - %Y') AS complaint_date, C.assign_to AS assign_toName FROM complaint C INNER JOIN master_branch B ON B.id = C.branch WHERE C.delete_status = 0 $where ORDER BY C.date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Complaint ReportList
    public function complaintReportList($branchId = '', $workType = '')
    {
        if ($branchId) {
            $where = "AND C.branch = '$branchId'";
        } else {
          $where = "";
        }

        if ($workType) {
            $where1 = "AND C.work_type = '$workType'";
        } else {
          $where1 = "";
        }

        $sql = "SELECT C.*, B.branch AS branch_name, DATE_FORMAT(C.date, '%d - %m - %Y') AS complaint_date, C.assign_to AS assign_toName FROM complaint C INNER JOIN master_branch B ON B.id = C.branch WHERE C.delete_status = 0 $where $where1 ORDER BY C.date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Complaint Info
    public function getComplaintInfo($complaintId)
    {
        $sql = "SELECT C.*, DATE_FORMAT(C.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(C.checking_date, '%d - %m - %Y') AS checking_dateFormat, DATE_FORMAT(C.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(C.date, '%d - %m - %Y') AS dateFormat, LP.employee_name, C.assign_to AS assign_to_name, B.branch AS branch_name FROM complaint C LEFT JOIN login_permission LP ON LP.employee_id = C.created_by LEFT JOIN master_branch B ON B.id = C.branch WHERE C.delete_status = 0 AND C.id = $complaintId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getComplaintImageList($complaintId, $type)
    {
        $sql = "SELECT * FROM before_after_images WHERE complaint_id = ? AND type = ?";

        $res = $this->db->query($sql, [$complaintId, $type]);
        return $res->result_array();
    }

    // Fetch ALL image types in a single query (used by ZIP download to avoid cached result mismatch)
    public function getAllComplaintImages($complaintId)
    {
        $sql = "SELECT * FROM before_after_images WHERE complaint_id = ? ORDER BY type, id ASC";
        $res = $this->db->query($sql, [$complaintId]);
        return $res->result_array();
    }

    //Complaint Edit
    public function getComplaintEdit($complaintId)
    {
        $sql = "SELECT C.*, DATE_FORMAT(C.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(C.date, '%d - %m - %Y') AS dateFormat, LP.employee_name, C.assign_to AS assign_to_name, B.branch AS branch_name, O.token AS outlet_token FROM complaint C LEFT JOIN login_permission LP ON LP.employee_id = C.created_by LEFT JOIN master_branch B ON B.id = C.branch LEFT JOIN outlet O ON O.id = C.outlet_id WHERE C.delete_status = 0 AND C.id = $complaintId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Complaint Form
    public function saveComplaintData($date, $complaintId, $outletId, $token, $zone, $branch, $complainterName, $complainterNumber, $workType, $assignTo, $outletName, $outletLocation, $contactName, $contactNumber, $oldOutletName, $oldOutletLocation, $oldContactName, $oldContactNumber, $description, $alreadyExists)
    {
        $userId = $this->session->userdata('userid');

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
          $outletName = '';
        }
        if (empty($outletLocation)) {
          $outletLocation = '';
        }
        if (empty($contactName)) {
          $contactName = '';
        }
        if (empty($contactNumber)) {
          $contactNumber = '';
        }
        if (empty($oldOutletName)) {
          $oldOutletName = '';
        }
        if (empty($oldOutletLocation)) {
          $oldOutletLocation = '';
        }
        if (empty($oldContactName)) {
          $oldContactName = '';
        }
        if (empty($oldContactNumber)) {
          $oldContactNumber = '';
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
                'updated_by' => $userId,
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
                'created_by' => $userId,
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

    //Save Complaint Edit Form
    public function saveComplaintEditData($date, $complaintId, $outletId, $token, $zone, $branch, $complainterName, $complainterNumber, $workType, $assignTo, $outletName, $outletLocation, $contactName, $contactNumber, $oldOutletName, $oldOutletLocation, $oldContactName, $oldContactNumber, $description, $alreadyExists, $status, $remarks, $checkingDate, $renewalDate, $jobReport_img, $earthingReport_img)
    {
        $userId = $this->session->userdata('userid');

        if ($complaintId > 0) {
            if (empty($outletName)) {
              $outletName = '';
            }
            if (empty($outletLocation)) {
              $outletLocation = '';
            }
            if (empty($contactName)) {
              $contactName = '';
            }
            if (empty($contactNumber)) {
              $contactNumber = '';
            }
            if (empty($oldOutletName)) {
              $oldOutletName = '';
            }
            if (empty($oldOutletLocation)) {
              $oldOutletLocation = '';
            }
            if (empty($oldContactName)) {
              $oldContactName = '';
            }
            if (empty($oldContactNumber)) {
              $oldContactNumber = '';
            }
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
                'status' => $status,
                'job_remarks' => $remarks,
                'checking_date' => $checkingDate,
                'renewal_date' => $renewalDate,
                'job_report' => $jobReport_img,
                'earthing_report' => $earthingReport_img,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $complaintId);
            $this->db->update('complaint', $data);
            $outletData = array(
              'updated_by' => $userId,
              'updated_at' => date('Y-m-d H:i:s'),
          );
          
          // Conditionally add fields if the variables are set
          if ($outletName) {
              $outletData['outlet_name'] = $outletName;
          }
          if ($outletLocation) {
              $outletData['outlet_location'] = $outletLocation;
          }
          if ($contactName) {
              $outletData['contact_name'] = $contactName;
          }
          if ($contactNumber) {
              $outletData['contact_number'] = $contactNumber;
          }
          if ($oldOutletName) {
              $outletData['outlet_name'] = $oldOutletName;
          }
          if ($oldOutletLocation) {
              $outletData['outlet_location'] = $oldOutletLocation;
          }
          if ($oldContactName) {
              $outletData['contact_name'] = $oldContactName;
          }
          if ($oldContactNumber) {
              $outletData['contact_number'] = $oldContactNumber;
          }
          
          // Perform the update
          $this->db->where('id', (int)$outletId);
          $this->db->update('outlet', $outletData);          
        }
    }

    //Work Confirmed Form
    public function saveWorkConfirmedForm($complaintId)
    {
        if ($complaintId > 0) {
            $data = array(
                'status' => 'inprogress'
            );
            $this->db->where('id', (int) $complaintId);
            $this->db->update('complaint', $data);
        }
    }

    //Save Complaint Report Form
    public function saveComplaintReportForm($complaintId, $outletId, $remarks, $jobReport_img, $checkingDate, $renewalDate, $earthingReport_img, $job_report_letter, $before_image, $after_image)
    {
        $userId = $this->session->userdata('userid');

        if ($complaintId > 0) {
            $data = array(
                'job_remarks' => $remarks,
                'job_report' => $jobReport_img,
                'checking_date' => $checkingDate,
                'renewal_date' => $renewalDate,
                'earthing_report' => $earthingReport_img,
                'status' => 'completed',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $complaintId);
            $this->db->update('complaint', $data);
      
            if (!empty($before_image)){
              foreach ($before_image as $value) {
                $sql = "INSERT INTO before_after_images(`complaint_id`,`imagepath`, `type`, `created_by`, `created_at`) VALUES ('".$complaintId."', '".$value."', 'before', '".$userId."', '".date('Y-m-d H:i:s')."')";
                $this->db->query($sql);
              }
            }
      
            if (!empty($after_image)){
              foreach ($after_image as $value) {
                $sql = "INSERT INTO before_after_images(`complaint_id`,`imagepath`, `type`, `created_by`, `created_at`) VALUES ('".$complaintId."', '".$value."', 'after', '".$userId."', '".date('Y-m-d H:i:s')."')";
                $this->db->query($sql);
              }
            }
            
            if (!empty($job_report_letter)){
              foreach ($job_report_letter as $value) {
                $sql = "INSERT INTO before_after_images(`complaint_id`,`imagepath`, `type`, `created_by`, `created_at`) VALUES ('".$complaintId."', '".$value."', 'job_report_letter', '".$userId."', '".date('Y-m-d H:i:s')."')";
                $this->db->query($sql);
              }
            }
        }
        if ($outletId && $checkingDate && $renewalDate) {
          $data = array(
              'checking_date' => $checkingDate,
              'renewal_date' => $renewalDate,
          );
          $this->db->where('id', (int) $outletId);
          $this->db->update('outlet', $data);
        }
    }

    public function get_complaints_server_side($postData, $pageStatus = '', $activeYear = '') {
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
      $workType = $postData['workType'];

      ## Financial Year Filter
      $yearQuery = "";
      if($activeYear != ''){
          $yearParts = explode('-', $activeYear);
          $startYear = "20" . $yearParts[0];
          $endYear = "20" . $yearParts[1];
          $startDate = $startYear . "-04-01 00:00:00";
          $endDate = $endYear . "-03-31 23:59:59";
          $yearQuery = " AND (`C`.`date` BETWEEN '".$this->db->escape_str($startDate)."' AND '".$this->db->escape_str($endDate)."') ";
      }

      ## Search 
      $searchQuery = "";
      if($searchValue != ''){
          $searchQuery = " AND (C.sno like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.work_type like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.assign_to like '%".$this->db->escape_like_str($searchValue)."%' or 
              B.branch like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.outlet_name like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.old_outlet_name like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.description like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.complainter_name like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.complainter_number like '%".$this->db->escape_like_str($searchValue)."%' or 
              C.status like '%".$this->db->escape_like_str($searchValue)."%') ";
      }

      ## Status Filter
      $statusQuery = "";
      if($pageStatus != '' && $pageStatus != 'all'){
          $statusQuery = " AND C.status = '".$this->db->escape_str($pageStatus)."' ";
      }

      ## Branch Filter
      if($branchId != '') {
          $statusQuery .= " AND C.branch = '".$this->db->escape_str($branchId)."' ";
      }

      ## Work Category Filter
      if($workType != '') {
          $statusQuery .= " AND C.work_type = '".$this->db->escape_str($workType)."' ";
      }

      ## User Permission Filter
      $empName = $this->session->userdata('username');
      $userPermission = json_decode($this->session->userdata('permission'), true);
      $userQuery = "";
      if(!(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission))) {
          $userQuery = " AND C.assign_to = '".$this->db->escape_str($empName)."' ";
      }

      ## Total number of records without filtering
      $this->db->select('count(*) as allcount');
      $this->db->from('complaint C');
      $this->db->where('C.delete_status', 0);
      if($pageStatus != '' && $pageStatus != 'all') $this->db->where('C.status', $pageStatus);
      if($activeYear != '') {
          $yearParts = explode('-', $activeYear);
          $this->db->where('C.date >=', "20" . $yearParts[0] . "-04-01 00:00:00");
          $this->db->where('C.date <=', "20" . $yearParts[1] . "-03-31 23:59:59");
      }
      if(!(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission))) $this->db->where('C.assign_to', $empName);
      $records = $this->db->get()->result();
      $totalRecords = $records[0]->allcount;

      ## Total number of record with filtering
      $sqlCount = "SELECT count(*) as allcount FROM complaint C INNER JOIN master_branch B ON B.id = C.branch WHERE C.delete_status = 0 $statusQuery $userQuery $searchQuery $yearQuery";
      $records = $this->db->query($sqlCount)->result();
      $totalRecordwithFilter = $records[0]->allcount;

      ## Fetch records
      $sortingMapping = array(
          'sno' => 'C.id',
          'complaint_date' => 'C.date',
          'work_type' => 'C.work_type',
          'assign_toName' => 'C.assign_to',
          'branch_name' => 'B.branch',
          'outlet_display_name' => 'C.outlet_name',
          'description' => 'C.description',
          'complainter_name' => 'C.complainter_name',
          'status' => 'C.status'
      );
      
      $sortColumn = isset($sortingMapping[$columnName]) ? $sortingMapping[$columnName] : 'C.date';

      $sql = "SELECT C.*, B.branch AS branch_name, DATE_FORMAT(C.date, '%d - %m - %Y') AS complaint_date, C.assign_to AS assign_toName,
                      (
                          (SELECT COUNT(*) FROM before_after_images BAI WHERE BAI.complaint_id = C.id)
                          + IF(C.job_report IS NOT NULL AND C.job_report != '', 1, 0)
                          + IF(C.earthing_report IS NOT NULL AND C.earthing_report != '', 1, 0)
                      ) AS has_files
              FROM complaint C 
              INNER JOIN master_branch B ON B.id = C.branch 
              WHERE C.delete_status = 0 $statusQuery $userQuery $searchQuery $yearQuery
              ORDER BY ".$sortColumn." ".$this->db->escape_str($columnSortOrder)." 
              LIMIT ".$this->db->escape_str($start).", ".$this->db->escape_str($rowperpage);
      $res = $this->db->query($sql);
      $data = $res->result();

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