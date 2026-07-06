<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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
    
    public function logout()
    {
        $userData = array();
        $this->session->set_userdata($userData);
        $this->session->sess_destroy();
        $this->load->helper('cookie');
        delete_cookie('ci_spacemanagement');
        redirect(base_url() . 'login');
    }
    
    public function index()
    {
        $empId = $this->session->userdata('empid');
        $empName = $this->session->userdata('username');
        
        $data['complaintList'] = $this->complaintmodel->complaintList();
        $data['allBranchPurchaseOrderList'] = $this->purchasemodel->getAllBranchPurchaseOrderList();
        $data['purchaseOrderList'] = $this->mastermodel->getpoNumberDropdown();
        $data['vehicleList'] = $this->vehiclemodel->vehicleList('active');
        $data['employeeList'] = $this->employeemodel->employeeList('active');
        $data['currentStockList'] = $this->stockmodel->getCurrentStockList();
        $data['ggccPartyPaymentList'] = $this->billmodel->getAllPartyPaymentList('ggcc');
        $data['brightPartyPaymentList'] = $this->billmodel->getAllPartyPaymentList('bright');
        $data['userPayslipList'] = $this->employeemodel->getUserPayslipList();

        $data['dailyTaskList'] = $this->employeemodel->dailyTaskList($empId);
        $data['employeeWorkList'] = $this->employeemodel->employeeWorkList($empId);

        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['userPermission'] = json_decode($this->session->userdata('permission'), true);
        
        $userInfo = $this->webmodel->getUserInfo();
        foreach ($userInfo as $row) {
            $data['username']     = $row->employee_name;
            $data['loginCode']    = $row->login_code;
            $data['mobile']       = $row->mobile_number;
            $data['permissions']   = $row->permission;
        }
        
        $partyPaymentTotalValue = $this->billmodel->getPartyPaymentTotalValue();
        foreach ($partyPaymentTotalValue as $row) {
          $data['purchaseAmount'] = $row->purchase_amount;
          $data['unpaidAmount'] = $row->unpaid_amount;
          $data['paidAmount'] = $row->paid_amount;
          $data['balanceAmount'] = $row->balance_amount;
        }
        
        $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue();
        foreach ($purchaseOrderTotalValue as $row) {
          $data['overallPoAmount']=$row->overall_purchase_amount;
          $data['securityAmount']=$row->overall_security_amount;
          $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
          $data['overallEstimationAmount']=$row->overall_estimation_amount;
          $data['overallRetentionAmount']=$row->overall_retention_amount;
          $data['balancePoAmount']=$row->overall_balance_amount;
        }

        $data['advancecashList'] = $this->loanmodel->getAdvancecashList($empId);
        $data['advancecashReceivedList'] = $this->loanmodel->getAdvancecashReceivedList($empId);

        $advancecashEmployeeData = $this->loanmodel->getAdvanceCashEmployeeList($empId);
        foreach ($advancecashEmployeeData as $row) {
          $data['employeeId'] = $row->employee_id;
          $data['employeeName'] = $row->employee_name;
          $data['designation'] = $row->designation;
          $data['advancecashAmount'] = $row->overall_advancecash_amount;
          $data['receivedAmount'] = $row->overall_received_amount;
          $data['notreceivedAmount'] = $row->overall_notreceived_amount;
        }

        $empId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $data["menu_status"] = 'dashboard';
        
        $this->load->view('settings/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('settings/footer');
    }

    public function error()
    {
        $this->load->view('settings/header_link', $data);
        $this->load->view('settings/error');
        $this->load->view('settings/footer');
    }

    public function access_denied()
    {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }

    public function change_password()
    {
        $data['menu_open'] = "settings";
        $data['menu_status'] = "change_password";

        $this->load->view('settings/header', $data);
        $this->load->view('settings/change_password');
        $this->load->view('settings/footer');
    }

    public function profile()
    {
        $data["menu_open"] = 'settings';
        $data["menu_status"] = 'profile';
        
        $userInfo = $this->webmodel->getUserInfo();
        foreach ($userInfo as $row) {
            $data['username']     = $row->employee_name;
            $data['loginCode']    = $row->login_code;
            $data['mobile']       = $row->mobile_number;
            $data['permissions']   = $row->permission;
        }
        
        $empId = $this->session->userdata('userid');

        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);
        
        $this->load->view('settings/header', $data);
        $this->load->view('settings/profile', $data);
        $this->load->view('settings/footer');
    }
    
    // Change Password Form 
    public function changePassword()
    {
        $userid       = $this->session->userdata('userid');
        $oldPassword   = $this->input->post('old_password');
        $newPassword   = $this->input->post('new_password');

        // Validate old password
        $checkExists = $this->webmodel->checkOldPassword($userid, $oldPassword);
        if (!$checkExists) {
            $data["isError"] = TRUE;
            $data["message"] = "Incorrect Old Password";
            echo json_encode($data);
            return;
        }

        if ($oldPassword !== $newPassword){
            $this->webmodel->passwordUpdate($userid, $newPassword);
            $data["isError"] = FALSE;
            $data["message"] = "Password Updated Successfully";
        }else{
            $data["isError"] = TRUE;
            $data["message"] = "New Password and Old Password Same";
        }
        echo json_encode($data);
        return;
    }

    // Record Delete
    public function deleteRecord()
    {
        $recordId = $this->input->post("fieldId");
        $tableName = $this->input->post("tableName");

        $this->webmodel->deleteRecord($recordId, $tableName);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Removed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not deleted";
        }

        echo json_encode($data);
    }

    // Purchase Record Delete
    public function deletePurchaseRecord()
    {
        $recordId = $this->input->post("fieldId");
        $tableName = $this->input->post("tableName");

        $this->webmodel->deletePurchaseRecord($recordId, $tableName);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Removed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not deleted";
        }

        echo json_encode($data);
    }

    // Retention Money Record Delete
    public function deleteRetentionMoneyRecord()
    {
        $recordId = $this->input->post("fieldId");

        $this->webmodel->deleteRetentionMoneyRecord($recordId);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Removed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not deleted";
        }

        echo json_encode($data);
    }

    // Party Payment Record Delete
    public function deletePartyPaymentRecord()
    {
        $partyPaymentId = $this->input->post("partyPaymentId");
        $partyPaymentTable = $this->input->post("partyPaymentTable");
        $partyPaymentReceivedId = $this->input->post("partyPaymentReceivedId");
        $partyPaymentReceivedTable = $this->input->post("partyPaymentReceivedTable");

        $this->webmodel->deletePartyPaymentRecord($partyPaymentId, $partyPaymentTable, $partyPaymentReceivedId, $partyPaymentReceivedTable);
        
        if ($partyPaymentReceivedId > 0 && $partyPaymentId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Removed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not deleted";
        }

        echo json_encode($data);
    }

    // Purchase Order Record Complete
    public function completePurchaseRecord()
    {
        $recordId = $this->input->post("fieldId");
        $tableName = $this->input->post("tableName");

        $this->webmodel->completePurchaseRecord($recordId, $tableName);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Move to Completed List.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not Move to Completed List";
        }

        echo json_encode($data);
    }

    // Delete Leave Record
    public function deleteLeaveRecord()
    {
        $recordId = $this->input->post("fieldId");

        $this->webmodel->deleteLeaveRecord($recordId);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Record Removed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Record not deleted";
        }

        echo json_encode($data);
    }

    // Change Status
    public function changeStatus()
    {
        $recordId = $this->input->post("fieldId");
        $tableName = $this->input->post("tableName");
        $statusValue = $this->input->post("statusValue");

        $this->webmodel->tableChangeStatus($recordId, $tableName, $statusValue);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Status Changed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Status Not Changed";
        }

        echo json_encode($data);
    }

    // Change Status
    public function changeAllEmployeeStatus()
    {
        $recordId = $this->input->post("fieldId");
        $statusValue = $this->input->post("statusValue");

        $this->webmodel->allEmployeeStatusChange($recordId, $statusValue);
        
        if ($recordId > 0) {
            $data["isError"] = FALSE;
            $data["message"] = "Status Changed Successfully.";
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Status Not Changed";
        }

        echo json_encode($data);
    }

    public function permission_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = "login_permission";
            $data['activeLink'] = $pageStatus;

            $data['permissionList'] = $this->webmodel->getPermissionList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('permission/permission-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function permission_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = "login_permission";
            $data['formTitle'] = "Add Login Permission";

            $this->load->view('settings/header', $data);
            $this->load->view('permission/permission-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function permission_edit($permissionId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = "login_permission";
            $data['formTitle'] = "Edit Login Permission";

            $permissionInfo = $this->webmodel->getPermissionInfo($permissionId);
            foreach ($permissionInfo as $row) {
                $data["permissionId"] = $row->id;
                $data["loginCode"] = $row->login_code;
                $data["name"] = $row->employee_name;
                $data["mobileNumber"] = $row->mobile_number;
                $data["password"] = $row->password;
                $data["permissions"] = isset($row->permission) ? json_decode($row->permission, true) : [];
                $data["status"] = $row->status;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('permission/permission-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Login Permission Save Form 
    public function permissionFormSave() {
        $permissionId = $this->input->post('permission_id');
        $token = $this->input->post('token');
        $loginCode = $this->input->post('login_code');
        $name = $this->input->post('name');
        $mobileNumber = $this->input->post('mobile_number');
        $password = $this->input->post('password');
        $permissions = $this->input->post('permission'); // This will be an array
        $status = $this->input->post('status');

        // Convert permission array to JSON or comma-separated string
        $permissionsString = !empty($permissions) ? json_encode($permissions) : '';

        if (empty($permissionId)) {
            $checkExists = $this->webmodel->checkLoginCode($token, $mobileNumber);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Login Code or Mobile Number Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->webmodel->savePermissionData($permissionId, $token, $loginCode, $name, $mobileNumber, $password, $permissionsString, $status);
        
        $data["isError"] = FALSE;
        $data["message"] = $permissionId ? "Login Permission Updated" : "Login Permission Created";
        echo json_encode($data);
    }
    
    public function file_manage_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_status"] = 'file_manage';
            $data['activeLink'] = $pageStatus;

            $data['fileManageList'] = $this->webmodel->getFileManageList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('file-manage/file-manage-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function file_manage_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_status"] = 'file_manage';

            $data['formTitle'] = "Add File Manage";

            $this->load->view('settings/header', $data);
            $this->load->view('file-manage/file-manage-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function file_manage_edit($fileManageId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_status"] = 'file_manage';

            $data['formTitle'] = "Edit File Manage";

            $fileManageInfo = $this->webmodel->getFileManageInfo($fileManageId);
            foreach ($fileManageInfo as $row) {
                $data['fileManageId'] = $row->id;
                $data['fileName'] = $row->file_name;
                $data['fileURL'] = $row->file_url;
                $data['fileDoc'] = $row->file_doc;
                $data['remarks'] = $row->remarks;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('file-manage/file-manage-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //File Manage Save Form //
    public function fileManageFormSave()
    {
        $fileManageId = $this->input->post('file_manage_id');
        $fileName = $this->input->post('file_name');
        $fileURL = $this->input->post('file_url');
        $remarks = $this->input->post('remarks');

        $fileDoc = $this->input->post('alter_file_doc');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
    
        $fileDocDir = './uploads/file_manage/';
    
        // Security Amount Receipt
        if (isset($_FILES['file_doc'])) {
          $filesArray = $_FILES['file_doc'];
          $uploadedFiles['file_doc'] = $this->common->fileUpload($filesArray, $fileDocDir, $allowTypes);
        }
    
        $fileDoc_img = $uploadedFiles['file_doc'][0];
    
        if ($_FILES["file_doc"]["name"] == FALSE) {
          $fileDoc_img = $fileDoc;
        }

        $this->webmodel->saveFileManageData($fileManageId, $fileName, $fileURL, $fileDoc_img, $remarks);
        
        $data["isError"] = FALSE;
        if ($fileManageId > 0) {
            $data["message"] = "File Manage Updated";
        } else {
            $data["message"] = "File Manage Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function event_list($year = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        if ($year == '') {
            $year = date('Y');
        }
        $data["menu_status"] = 'yearly_plan';
        
        $data["activeLink"] = $year;
        $data["yearList"] = [date('Y'), (date('Y') - 1)];
        $data['monthEventList'] = $this->webmodel->getMonthEventList($year);
    
        $this->load->view('settings/header', $data);
        $this->load->view('yearly_plan/event-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function event_add($year = '', $month = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'yearly_plan';
        
        $data["month"] = $month;
        $data["year"] = $year;
        $data["formTitle"] = 'Add Yearly Plan';
        $data["plan_type"] = 'once';
        
        $this->load->view('settings/header', $data);
        $this->load->view('yearly_plan/event-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function event_edit($eventId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'yearly_plan';

        $data["formTitle"] = 'Edit Yearly Plan';

        $yearlyPlanDetail = $this->webmodel->getYearlyPlanInfo($eventId);
        foreach ($yearlyPlanDetail as $row) {
          $data['eventId'] = $row->id;
          $data['year'] = $row->year;
          $data['month'] = $row->month;
          $data['date'] = $row->date;
          $data['title'] = $row->title;
          $data['description'] = $row->description;
          $data['plan_type'] = $row->plan_type;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('yearly_plan/event-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function event_view($year = '', $month = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'yearly_plan';

        $data["year"] = $year;
        $data["month"] = $month;
        $data['yearlyPlanList'] = $this->webmodel->getYearlyPlanList($year, $month);
        
        $this->load->view('settings/header', $data);
        $this->load->view('yearly_plan/event-view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function getYearlyPlanDetail()
    {
        $year = $this->input->post('year');
        $month = $this->input->post('month');

        $data['yearlyPlanList'] = $this->webmodel->getYearlyPlanList($year, $month);
        $data["year"] = $year;
        $data["month"] = $month;
        
        echo json_encode($data);
    }

    //Yearly Plan Save Form //
    public function yearlyPlanFormSave()
    {
      $eventId = $this->input->post('event_id');
      $date = $this->input->post('date');
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $status = $this->input->post('status');
      $planType = $this->input->post('plan_type') ? $this->input->post('plan_type') : 'once';
      
      $this->webmodel->saveYearlyPlanData($eventId, $date, $title, $description, $status, $planType);
      
      $data["isError"] = FALSE;
      if ($eventId > 0) {
        $data["message"] = "Yearly Plan Updated";
      } else {
        $data["message"] = "Yearly Plan Created";
      }

      echo json_encode($data);
      return;
    }

    public function branch_visit_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'branch_visit';
        
        $data['branchRecentVisitList'] = $this->webmodel->getBranchRecentVisitList();
    
        $this->load->view('settings/header', $data);
        $this->load->view('branch_visit/visit-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function branch_visit_add($branchId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'branch_visit';
        
        $data["branchId"] = $branchId;
        $data["formTitle"] = 'Add Branch Visit';

        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        if($branchId) {
          $branchInfo = $this->mastermodel->getBranchInfo($branchId);
          foreach ($branchInfo as $row) {
              $data['branchId'] = $row->id;
              $data['zone'] = $row->zone;
          }
        }

        $this->load->view('settings/header', $data);
        $this->load->view('branch_visit/visit-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function branch_visit_edit($visitId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'branch_visit';

        $data["formTitle"] = 'Edit Branch Visit';

        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

        $branchVisitDetail = $this->webmodel->getBranchVisitInfo($visitId);
        foreach ($branchVisitDetail as $row) {
          $data['visitId'] = $row->id;
          $data['zone'] = $row->zone;
          $data['branchId'] = $row->branch_id;
          $data['visitDate'] = $row->date;
          $data['visitTitle'] = $row->title;
          $data['visitRemark'] = $row->remark;
          $data['visitStatus'] = $row->status;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('branch_visit/visit-edit', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function branch_visit_view($branchId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission)) {
        $data["menu_status"] = 'branch_visit';

        $data["branchId"] = $branchId;
        $data['branchVisitList'] = $this->webmodel->getBranchVisitList($branchId);
          
        $branchInfo = $this->mastermodel->getBranchInfo($branchId);
        foreach ($branchInfo as $row) {
            $data['branchName'] = $row->branch;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('branch_visit/visit-view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    //Add Branch Visit Save Form //
    public function addBranchVisitFormSave()
    {
      $branchVisitId = $this->input->post('branch_visit_id');
      $visitDate = $this->input->post('date');
      $branchId = $this->input->post('branch_id');
      $branchVisitArrayData = json_decode($this->input->post('branchVisitDataArray'));
      
      $this->webmodel->saveAddBranchVisitData($branchVisitId, $visitDate, $branchId, $branchVisitArrayData);
      
      $data["isError"] = FALSE;
      if ($branchVisitId > 0) {
        $data["message"] = "Branch Visit Created";
      } else {
        $data["message"] = "Branch Visit Created";
      }

      echo json_encode($data);
      return;
    }
    
    //Edit Branch Visit Save Form //
    public function editBranchVisitFormSave()
    {
      $branchVisitId = $this->input->post('branch_visit_id');
      $visitDate = $this->input->post('date');
      $branchId = $this->input->post('branch_id');
      $visitTitle = $this->input->post('title');
      $visitRemark = $this->input->post('remark');
      $visitStatus = $this->input->post('status');

      $this->webmodel->saveEditBranchVisitData($branchVisitId, $visitDate, $branchId, $visitTitle, $visitRemark, $visitStatus);
      
      $data["isError"] = FALSE;
      if ($branchVisitId > 0) {
        $data["message"] = "Branch Visit Updated";
      } else {
        $data["message"] = "Branch Visit Updated";
      }

      echo json_encode($data);
      return;
    }
}