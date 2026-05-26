<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library('common');
      $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
      $this->output->set_header('Pragma: no-cache');
      if (($this->session->userdata('userid') == null) || ($this->session->userdata('userid') == "")) {
        redirect(base_url() . 'login');
      }
  
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    }
    
    public function index($activeYear = '', $pageStatus = '')
    {
      $activeYear = trim($activeYear, '/');
      $pageStatus = trim($pageStatus, '/');

      if ($activeYear && !preg_match('/^\d{2}-\d{2}$/', $activeYear)) {
          $pageStatus = $activeYear;
          $activeYear = '';
      }

      // Calculate current financial year
      $currentMonth = date('m');
      $currentYear = date('Y');
      if ($currentMonth < 4) {
          $fStart = $currentYear - 1;
          $fEnd = $currentYear;
      } else {
          $fStart = $currentYear;
          $fEnd = $currentYear + 1;
      }
      
      $data['fyYears'] = [
          substr($fStart, 2) . '-' . substr($fEnd, 2),
          substr($fStart - 1, 2) . '-' . substr($fEnd - 1, 2)
      ];

      if ($activeYear == '') {
          $activeYear = $data['fyYears'][0];
      }

      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
        $data["menu_status"] = 'complaint';
        $data['activeLink'] = $pageStatus;
        $data['activeYear'] = $activeYear;

        $data['complaintList'] = $this->complaintmodel->complaintList($pageStatus, '');
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        
        $this->load->view('settings/header', $data);
        $this->load->view('complaint/complaint-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function complaint_list($activeYear = '', $pageStatus = '')
    {
      $activeYear = trim($activeYear, '/');
      $pageStatus = trim($pageStatus, '/');

      if ($activeYear && !preg_match('/^\d{2}-\d{2}$/', $activeYear)) {
          // If first param is status, shift it
          $pageStatus = $activeYear;
          $activeYear = '';
      }

      // Calculate current financial year
      $currentMonth = date('m');
      $currentYear = date('Y');
      if ($currentMonth < 4) {
          $fStart = $currentYear - 1;
          $fEnd = $currentYear;
      } else {
          $fStart = $currentYear;
          $fEnd = $currentYear + 1;
      }
      
      $data['fyYears'] = [
          substr($fStart, 2) . '-' . substr($fEnd, 2),
          substr($fStart - 1, 2) . '-' . substr($fEnd - 1, 2)
      ];

      if ($activeYear == '') {
          $activeYear = $data['fyYears'][0];
      }

      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'complaint';
        $data['activeLink'] = $pageStatus;
        $data['activeYear'] = $activeYear;

        $empName = $this->session->userdata('username');
        $employeeId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($employeeId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($employeeId);

        $data['complaintList'] = $this->complaintmodel->complaintList($pageStatus, '');
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        
        $this->load->view('settings/header', $data);
        $this->load->view('complaint/complaint-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function complaint_report($branchId='', $workType='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
        $data["menu_status"] = 'complaint';
        
        $data['branchId'] = $branchId;
        $data['workType'] = $workType;
        $data['complaintList'] = $this->complaintmodel->complaintReportList($branchId, $workType);
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

        $this->load->view('settings/header', $data);
        $this->load->view('complaint/complaint-report', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function complaint_add()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'complaint';

        $data['formTitle'] = "Add Complaint";

        $empName = $this->session->userdata('username');
        $employeeId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($employeeId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($employeeId);

        $this->load->view('settings/header', $data);
        $this->load->view('complaint/complaint-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function job_report($complaintId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
        $data["menu_status"] = 'complaint';

        $data['formTitle'] = "Job Report Form";
        
        $complaintData = $this->complaintmodel->getComplaintEdit($complaintId);
        foreach ($complaintData as $row) {
          $data['complaintId'] = $row->id;
          $data['outletId'] = $row->outlet_id;
          $data['workType'] = $row->work_type;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('complaint/complaint-complete', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function complaint_edit($complaintId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
        $data["menu_status"] = 'complaint';

        $data['formTitle'] = "Edit Complaint";
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $complaintData = $this->complaintmodel->getComplaintEdit($complaintId);
        foreach ($complaintData as $row) {
          $data['complaintId'] = $row->id;
          $data['outletId'] = $row->outlet_id;
          $data['outletToken'] = $row->outlet_token;
          $data['complaintCode'] = $row->sno;
          $data['complaintDate'] = $row->date;
          $data['zone'] = $row->zone;
          $data['branchId'] = $row->branch;
          $data['complainterName'] = $row->complainter_name;
          $data['complainterNumber'] = $row->complainter_number;
          $data['workType'] = $row->work_type;
          $data['assignTo'] = $row->assign_to;
          $data['outletName'] = $row->outlet_name;
          $data['outletLocation'] = $row->outlet_location;
          $data['contactName'] = $row->contact_name;
          $data['contactNumber'] = $row->contact_number;
          $data['oldOutletName'] = $row->old_outlet_name;
          $data['oldOutletLocation'] = $row->old_outlet_location;
          $data['oldContactName'] = $row->old_contact_name;
          $data['oldContactNumber'] = $row->old_contact_number;
          $data['description'] = $row->description;
          $data['status'] = $row->status;
          $data["jobRemarks"] = $row->job_remarks;
          $data["checkingDate"] = $row->checking_date;
          $data["renewalDate"] = $row->renewal_date;
          $data["jobReport"] = $row->job_report;
          $data["earthingReport"] = $row->earthing_report;
          $data['createdBy'] = $row->employee_name;
          $data['createdAt'] = $row->created_at;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('complaint/complaint-edit', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function getComplaintDetail()
    {
      $complaintId = $this->input->post('complaintId');

      $data['jobReportLetters'] = $this->complaintmodel->getComplaintImageList($complaintId, 'job_report_letter');
      $data['beforeImages'] = $this->complaintmodel->getComplaintImageList($complaintId, 'before');
      $data['afterImages'] = $this->complaintmodel->getComplaintImageList($complaintId, 'after');
      
      $complaintDetail = $this->complaintmodel->getComplaintInfo($complaintId);
      foreach ($complaintDetail as $row) {
        $data['complaintId'] = $row->id;
        $data['complaintCode'] = $row->sno;
        $data['complaintDate'] = $row->dateFormat;
        $data['zone'] = $row->zone;
        $data['branchName'] = $row->branch_name;
        $data['complainterName'] = $row->complainter_name;
        $data['complainterNumber'] = $row->complainter_number;
        $data['outletName'] = $row->outlet_name;
        $data['outletLocation'] = $row->outlet_location;
        $data['contactName'] = $row->contact_name;
        $data['contactNumber'] = $row->contact_number;
        $data['oldOutletName'] = $row->old_outlet_name;
        $data['oldOutletLocation'] = $row->old_outlet_location;
        $data['oldContactName'] = $row->old_contact_name;
        $data['oldContactNumber'] = $row->old_contact_number;
        $data['description'] = $row->description;
        $data['workType'] = $row->work_type;
        $data['assignToName'] = $row->assign_to_name;
        $data['jobReport'] = $row->job_report;
        $data['jobRemarks'] = $row->job_remarks;
        $data['earthingReport'] = $row->earthing_report;
        $data['checkingDate'] = $row->checking_dateFormat;
        $data['renewalDate'] = $row->renewal_dateFormat;
        $data['status'] = $row->status;
        $data['createdBy'] = $row->employee_name;
        $data['createdAt'] = $row->created_at;
      }
      echo json_encode($data);
    }

    //Complaint Save Form
    public function complaintFormSave()
    {
      $complaintId = $this->input->post('complaint_id');
      $outletId = $this->input->post('outlet_id');
      $token = $this->input->post('token');
      $date = $this->input->post('date');
      $zone = $this->input->post('zone');
      $branch = $this->input->post('branch');
      $complainterName = $this->input->post('complainter_name');
      $complainterNumber = $this->input->post('complainter_number');
      $workType = $this->input->post('work_type');
      $assignTo = $this->input->post('assign_to');
      $outletName = $this->input->post('outlet_name');
      $outletLocation = $this->input->post('outlet_location');
      $contactName = $this->input->post('contact_name');
      $contactNumber = $this->input->post('contact_number');
      $oldOutletName = $this->input->post('old_outlet_name');
      $oldOutletLocation = $this->input->post('old_outlet_location');
      $oldContactName = $this->input->post('old_contact_name');
      $oldContactNumber = $this->input->post('old_contact_number');
      $description = $this->input->post('description');
      $alreadyExists = ($this->input->post('already_exists') == 'on') ? 1 : 0;

      if ($alreadyExists == 1) {
        if ($outletId < 0 || $outletId == '') {
          $checkExists = $this->outletmodel->checkOutlet($token, $branch);
          if ($checkExists > 0) {
            $data["isError"] = TRUE;
            $data["message"] = "Outlet Name Already Exists";
            echo json_encode($data);
            return;
          }
        }
      }
      
      $this->complaintmodel->saveComplaintData($date, $complaintId, $outletId, $token, $zone, $branch, $complainterName, $complainterNumber, $workType, $assignTo, $outletName, $outletLocation, $contactName, $contactNumber, $oldOutletName, $oldOutletLocation, $oldContactName, $oldContactNumber, $description, $alreadyExists);
      
      $data["isError"] = FALSE;
      if ($complaintId > 0) {
        $data["message"] = "Complaint Updated";
      } else {
        $data["message"] = "Complaint Created";
      }

      echo json_encode($data);
      return;
    }

    //Complaint Edit Save Form
    public function complaintEditFormSave()
    {
      $complaintId = $this->input->post('complaint_id');
      $outletId = $this->input->post('outlet_id');
      $token = $this->input->post('token');
      $date = $this->input->post('date');
      $zone = $this->input->post('zone');
      $branch = $this->input->post('branch');
      $complainterName = $this->input->post('complainter_name');
      $complainterNumber = $this->input->post('complainter_number');
      $workType = $this->input->post('work_type');
      $assignTo = $this->input->post('assign_to');
      $outletName = $this->input->post('outlet_name');
      $outletLocation = $this->input->post('outlet_location');
      $contactName = $this->input->post('contact_name');
      $contactNumber = $this->input->post('contact_number');
      $oldOutletName = $this->input->post('old_outlet_name');
      $oldOutletLocation = $this->input->post('old_outlet_location');
      $oldContactName = $this->input->post('old_contact_name');
      $oldContactNumber = $this->input->post('old_contact_number');
      $description = $this->input->post('description');
      $status = $this->input->post('status');
      $remarks = $this->input->post('remarks');
      $checkingDate = $this->input->post('checking_date');
      $renewalDate = $this->input->post('renewal_date');
      
      $alterLetterImage = $this->input->post('alter_job_report');
      $alterEarthingReport = $this->input->post('alter_earthing_report');

      $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
      $letterUploadDir = './uploads/job_letter/';
      $earthingReportUploadDir = './uploads/earthing_report/';

      // Complaint Report
      if (isset($_FILES['job_report'])) {
        $filesArray = $_FILES['job_report'];
        $uploadedFiles['job_report'] = $this->common->fileUpload($filesArray, $letterUploadDir, $allowTypes);
      }
      // Earthing Report
      if (isset($_FILES['earthing_report'])) {
        $filesArray = $_FILES['earthing_report'];
        $uploadedFiles['earthing_report'] = $this->common->fileUpload($filesArray, $earthingReportUploadDir, $allowTypes);
      }

      $jobReport_img = $uploadedFiles['job_report'][0];
      $earthingReport_img = $uploadedFiles['earthing_report'][0];

      if ($_FILES["job_report"]["name"] == FALSE) {
        $jobReport_img = $alterLetterImage;
      }
      if ($_FILES["earthing_report"]["name"] == FALSE) {
        $earthingReport_img = $alterEarthingReport;
      }

      if ($outletId < 0 || $outletId == '') {
        $checkExists = $this->outletmodel->checkOutlet($token, $branch);
        if ($checkExists > 0) {
          $data["isError"] = TRUE;
          $data["message"] = "Outlet Name Already Exists";
          echo json_encode($data);
          return;
        }
      }
      
      $this->complaintmodel->saveComplaintEditData($date, $complaintId, $outletId, $token, $zone, $branch, $complainterName, $complainterNumber, $workType, $assignTo, $outletName, $outletLocation, $contactName, $contactNumber, $oldOutletName, $oldOutletLocation, $oldContactName, $oldContactNumber, $description, $alreadyExists, $status, $remarks, $checkingDate, $renewalDate, $jobReport_img, $earthingReport_img);
      
      $data["isError"] = FALSE;
      if ($complaintId > 0) {
        $data["message"] = "Complaint Updated";
      } else {
        $data["message"] = "Complaint Created";
      }

      echo json_encode($data);
      return;
    }

    //Work Confirmed Save Form
    public function workConfirmedFormSave()
    {
      $complaintId = $this->input->post('complaintId');

      $this->complaintmodel->saveWorkConfirmedForm($complaintId);
      
      $data["isError"] = FALSE;
      if ($complaintId > 0) {
        $data["message"] = "Work Started";
      } else {
        $data["message"] = "Work Started";
      }

      echo json_encode($data);
      return;
    }

    //Complaint Report Save Form
    public function saveComplaintReport()
    {
      $complaintId = $this->input->post('complaint_id');
      $outletId = $this->input->post('outlet_id');
      $remarks = $this->input->post('remarks');
      $checkingDate = $this->input->post('checking_date');
      $renewalDate = $this->input->post('renewal_date');
      
      $alterLetterImage = $this->input->post('alter_job_report');
      $alterEarthingReport = $this->input->post('alter_earthing_report');

      $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
      $letterUploadDir = './uploads/job_letter/';
      $earthingReportUploadDir = './uploads/earthing_report/';

      $job_report_letter        = ''; 
      $jobReportLetterDir      = './uploads/job_letter/';
      $before_image    = ''; 
      $beforeUploadDir      = './uploads/before_image/';
      $after_image    = ''; 
      $afterUploadDir      = './uploads/after_image/';


      if (!empty($_FILES['job_report_letters']['name']))
      {
        $jobReportLetters = ''; 
        $jobReportLetterDir = './uploads/job_letter/';
        $filesArry = $_FILES["job_report_letters"]; 

        foreach ($filesArry['name'] as $key => $val) {
          $fileName = basename($filesArry['name'][$key]);  
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);  
          $date = date("dmY-His"); // Adds timestamp
      
          if (in_array($fileType, $allowTypes)) {
            // Append timestamp and unique ID to prevent filename conflicts
            $newFileName = $date . "_" . $fileName;
            $targetFilePath = $jobReportLetterDir . $newFileName;
    
            if (move_uploaded_file($filesArry["tmp_name"][$key], $targetFilePath)) {
              $jobReportLetters .= "uploads/job_letter/" . $newFileName . ','; 
            } else {
              $uploadStatus = 0; 
              $response['message'] = 'Sorry, there was an error uploading your file.';
            }
          } else {
            $uploadStatus = 0; 
            $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.'; 
          }
        }      
        $job_report_letter = array_filter(explode(",",$jobReportLetters));
      }

      if (!empty($_FILES['before_images']['name']))
      {
        $beforeImages = ''; 
        $beforeUploadDir = './uploads/before_image/';
        $filesArry = $_FILES["before_images"]; 

        foreach ($filesArry['name'] as $key => $val) {
          $fileName = basename($filesArry['name'][$key]);  
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);  
          $date = date("dmY-His"); // Adds timestamp
      
          if (in_array($fileType, $allowTypes)) {
            // Append timestamp and unique ID to prevent filename conflicts
            $newFileName = $date . "_" . $fileName;
            $targetFilePath = $beforeUploadDir . $newFileName;
    
            if (move_uploaded_file($filesArry["tmp_name"][$key], $targetFilePath)) {
              $beforeImages .= "uploads/before_image/" . $newFileName . ','; 
            } else {
              $uploadStatus = 0; 
              $response['message'] = 'Sorry, there was an error uploading your file.';
            }
          } else {
            $uploadStatus = 0; 
            $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.'; 
          }
        }      
        $before_image = array_filter(explode(",",$beforeImages));
      }

      if (!empty($_FILES['after_images']['name']))
      {
        $afterImages = ''; 
        $afterUploadDir = './uploads/after_image/';
        $filesArry = $_FILES["after_images"]; 

        foreach ($filesArry['name'] as $key => $val) {
          $fileName = basename($filesArry['name'][$key]);  
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION);  
          $date = date("dmY-His");
      
          if (in_array($fileType, $allowTypes)) {
            // Append timestamp before file extension
            $newFileName = $date . "_" . $fileName;
            $targetFilePath = $afterUploadDir . $newFileName;
    
            if (move_uploaded_file($filesArry["tmp_name"][$key], $targetFilePath)) {
              $afterImages .= "uploads/after_image/" . $newFileName . ','; 
            } else {
              $uploadStatus = 0; 
              $response['message'] = 'Sorry, there was an error uploading your file.';
            }
          } else {
            $uploadStatus = 0; 
            $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.'; 
          }
        }
        $after_image = array_filter(explode(",",$afterImages));
      }

      // Complaint Report
      if (isset($_FILES['job_report'])) {
        $filesArray = $_FILES['job_report'];
        $uploadedFiles['job_report'] = $this->common->fileUpload($filesArray, $letterUploadDir, $allowTypes);
      }
      // Earthing Report
      if (isset($_FILES['earthing_report'])) {
        $filesArray = $_FILES['earthing_report'];
        $uploadedFiles['earthing_report'] = $this->common->fileUpload($filesArray, $earthingReportUploadDir, $allowTypes);
      }

      $jobReport_img = $uploadedFiles['job_report'][0];
      $earthingReport_img = $uploadedFiles['earthing_report'][0];

      if ($_FILES["job_report"]["name"] == FALSE) {
        $jobReport_img = $alterLetterImage;
      }
      if ($_FILES["earthing_report"]["name"] == FALSE) {
        $earthingReport_img = $alterEarthingReport;
      }

      $this->complaintmodel->saveComplaintReportForm($complaintId, $outletId, $remarks, $jobReport_img, $checkingDate, $renewalDate, $earthingReport_img, $job_report_letter, $before_image, $after_image);
      
      $data["isError"] = FALSE;
      if ($complaintId > 0) {
        $data["message"] = "Job Report Submitted";
      } else {
        $data["message"] = "Job Report Submitted";
      }

      echo json_encode($data);
      return;
    }
    public function complaint_list_json($activeYear = '', $pageStatus = '')
    {
        if ($activeYear && !preg_match('/^\d{2}-\d{2}$/', $activeYear)) {
            $pageStatus = $activeYear;
            $activeYear = '';
        }
        $postData = $this->input->post();
        $data = $this->complaintmodel->get_complaints_server_side($postData, $pageStatus, $activeYear); 
        echo json_encode($data);
    }
}
