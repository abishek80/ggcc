<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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
    
    public function index($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['userPermission'] = $userPermission;
            $data['menu_status'] = 'employee';
            $data['activeLink'] = $pageStatus;

            $data['employeeList'] = $this->employeemodel->employeeList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('employee/employee-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function employee_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['userPermission'] = $userPermission;
            $data['menu_status'] = 'employee';
            $data['activeLink'] = $pageStatus;
            
            $data['employeeList'] = $this->employeemodel->employeeList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('employee/employee-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function employee_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee';

            $data['formTitle'] = "Add Employee";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['designationDropdown'] = $this->mastermodel->getDesignationDropdown();
            
            $this->load->view('settings/header', $data);
            $this->load->view('employee/employee-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function employee_edit($employeeId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee';

            $data['formTitle'] = "Edit Employee";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['designationDropdown'] = $this->mastermodel->getDesignationDropdown();
            
            $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
            foreach ($employeeInfo as $row) {
                $data['employeeToken'] = $row->token;
                $data['employeeId'] = $row->id;
                $data['code'] = $row->employee_code;
                $data['password'] = $row->password;
                $data['name'] = $row->employee_name;
                $data['permission'] = $row->permission;
                $data['companyName'] = $row->company_name;
                $data['zone'] = $row->zone;
                $data['branchId'] = $row->branch;
                $data['branchLocation'] = $row->branch_location;
                $data['email'] = $row->email;
                $data['phoneNumber'] = $row->mobile_number;
                $data['designation'] = $row->designation;
                $data['employeeEducation'] = $row->education;
                $data['dob'] = $row->dob;
                $data['doj'] = $row->doj;
                $data['status'] = $row->status;
                $data['profile'] = $row->profile_img;
                $data['aadharcard'] = $row->aadharcard_img;
                $data['pancard'] = $row->pancard_img;
                $data['bankbook'] = $row->bankbook_img;
                $data['licence'] = $row->licence_img;
                $data['houseNo'] = $row->house_no;
                $data['street'] = $row->street;
                $data['city'] = $row->city;
                $data['district'] = $row->district;
                $data['pincode'] = $row->pincode;
                $data['contactName'] = $row->contact_name;
                $data['contactRelative'] = $row->contact_relative;
                $data['contactPhoneNumber'] = $row->contact_phone_number;
                $data['contactHouseNo'] = $row->contact_house_no;
                $data['contactStreet'] = $row->contact_street;
                $data['contactCity'] = $row->contact_city;
                $data['contactDistrict'] = $row->contact_district;
                $data['contactPincode'] = $row->contact_pincode;
                $data['payslipStatus'] = $row->payslip_status;
                $data['basicPay'] = $row->basic_pay;
                $data['allowanceAmount'] = $row->allowance_amount;
                $data['pfStatus'] = $row->pf_status;
                $data['esiStatus'] = $row->esi_status;
                $data['esiNumber'] = $row->esi_number;
                $data['pfNumber'] = $row->pf_number;
                $data['panNumber'] = $row->pan_number;
                $data['aadharNumber'] = $row->aadhar_number;
                $data['mobileRecharge'] = $row->mobile_recharge;
                $data['pfAmount'] = $row->pf_amount;
                $data['bankName'] = $row->bank_name;
                $data['bankBranchName'] = $row->bank_branch_name;
                $data['accountNumber'] = $row->account_number;
                $data['ifscCode'] = $row->ifsc_code;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('employee/employee-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function getEmployeeDetail()
    {
        $employeeId = $this->input->post('employeeId');
    
        $employeeData = $this->employeemodel->getEmployeeInfo($employeeId);
        foreach ($employeeData as $row) {
            $data['employeeCode'] = $row->employee_code;
            $data['companyName'] = $row->company_name;
            $data['zone'] = $row->zone;
            $data['branch'] = $row->branch;
            $data['branchName'] = $row->branch_name;
            $data['branchLocation'] = $row->branch_location;
            $data['employeeName'] = $row->employee_name;
            $data['employeeNumber'] = $row->mobile_number;
            $data['employeeEmail'] = $row->email;
            $data['employeeDesignation'] = $row->designation;
            $data['employeeEducation'] = $row->education;
            $data['dob'] = $row->dobFormat;
            $data['doj'] = $row->dojFormat;
            $data['employeeHouseNo'] = $row->house_no;
            $data['employeeStreet'] = $row->street;
            $data['employeeCity'] = $row->city;
            $data['employeeDistrict'] = $row->district;
            $data['employeePincode'] = $row->pincode;
            $data['employeeProfile'] = $row->profile_img;
            $data['employeeAadharcard'] = $row->aadharcard_img;
            $data['employeePancard'] = $row->pancard_img;
            $data['employeeBankbook'] = $row->bankbook_img;
            $data['employeeLicence'] = $row->licence_img;
            $data['employeeContactName'] = $row->contact_name;
            $data['employeeRelativeType'] = $row->contact_relative;
            $data['employeeContactNumber'] = $row->contact_phone_number;
            $data['contactHouseNo'] = $row->contact_house_no;
            $data['contactStreet'] = $row->contact_street;
            $data['contactCity'] = $row->contact_city;
            $data['contactDistrict'] = $row->contact_district;
            $data['contactPincode'] = $row->contact_pincode;
            $data['payslipStatus'] = $row->payslip_status;
            $data['basicPay'] = $row->basic_pay;
            $data['allowanceAmount'] = $row->allowance_amount;
            $data['pfStatus'] = $row->pf_status;
            $data['esiStatus'] = $row->esi_status;
            $data['esiNumber'] = $row->esi_number;
            $data['pfNumber'] = $row->pf_number;
            $data['panNumber'] = $row->pan_number;
            $data['aadharNumber'] = $row->aadhar_number;
            $data['mobileRecharge'] = $row->mobile_recharge;
            $data['pfAmount'] = $row->pf_amount;
            $data['bankName'] = $row->bank_name;
            $data['bankBranchName'] = $row->bank_branch_name;
            $data['accountNumber'] = $row->account_number;
            $data['ifscCode'] = $row->ifsc_code;
            $data['status'] = $row->status;
            $data['createdBy'] = $row->created_by;
            $data['createdAt'] = $row->created_at;
        }
        echo json_encode($data);
    }

    //Employee Save Form //
    public function employeeFormSave()
    {
        $employeeId = $this->input->post('employee_id');
        $token = $this->input->post('token');
        $employeeCode = $this->input->post('employee_code');
        $employeePassword = $this->input->post('employee_password');
        $employeePermission = $this->input->post('employee_permission');
        $companyName = $this->input->post('company_name');
        $zone = $this->input->post('employee_zone');
        $branch = $this->input->post('branch');
        $branchLocation = $this->input->post('branch_location');
        $employeeName = $this->input->post('employee_name');
        $employeeEmail = $this->input->post('employee_email');
        $employeeNumber = $this->input->post('employee_number');
        $employeeDesignation = $this->input->post('employee_designation');
        $employeeEducation = $this->input->post('education');
        $dob = $this->input->post('dob');
        $doj = $this->input->post('doj');
        $houseNo = $this->input->post('house_no');
        $street = $this->input->post('street');
        $city = $this->input->post('city');
        $district = $this->input->post('district');
        $pincode = $this->input->post('pincode');
        $contactName = $this->input->post('contact_name');
        $contactRelative = $this->input->post('contact_relative');
        $contactPhoneNumber = $this->input->post('contact_phone_number');
        $contactHouseNo = $this->input->post('contact_house_no');
        $contactStreet = $this->input->post('contact_street');
        $contactCity = $this->input->post('contact_city');
        $contactDistrict = $this->input->post('contact_district');
        $contactPincode = $this->input->post('contact_pincode');
        $payslipStatus = $this->input->post('payslip_status');
        $basicPay = $this->input->post('basic_pay');
        $allowanceAmount = $this->input->post('allowance_amount');
        $pfStatus = $this->input->post('pf_status');
        $esiStatus = $this->input->post('esi_status');
        $esiNumber = $this->input->post('esi_number');
        $pfNumber = $this->input->post('pf_number');
        $panNumber = $this->input->post('pan_number');
        $aadharNumber = $this->input->post('aadhar_number');
        $mobileRecharge = $this->input->post('mobile_recharge');
        $pfAmount = $this->input->post('pf_amount');
        $bankName = $this->input->post('bank_name');
        $bankBranchName = $this->input->post('bank_branch_name');
        $accountNumber = $this->input->post('account_number');
        $ifscCode = $this->input->post('ifsc_code');
        $status = $this->input->post('status');

        $alterEmployeeProfile = $this->input->post('alter_employee_profile');
        $alterEmployeeAadharcard = $this->input->post('alter_employee_aadharcard');
        $alterEmployeePancard = $this->input->post('alter_employee_pancard');
        $alterEmployeeBankbook = $this->input->post('alter_employee_bankbook');
        $alterEmployeeLicence = $this->input->post('alter_employee_licence');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
        $profileUploadDir = './uploads/employee_profile/';
        $aadharcardUploadDir = './uploads/employee_aadharcard/';
        $pancardUploadDir = './uploads/employee_pancard/';
        $bankbookUploadDir = './uploads/employee_bankbook/';
        $licenceUploadDir = './uploads/employee_licence/';

        // Employee Profile
        if (isset($_FILES['employee_profile'])) {
            $filesArray = $_FILES['employee_profile'];
            $uploadedFiles['employee_profile'] = $this->common->fileUpload($filesArray, $profileUploadDir, $allowTypes);
        }

        // Employee Aadharcard
        if (isset($_FILES['employee_aadharcard'])) {
            $filesArray = $_FILES['employee_aadharcard'];
            $uploadedFiles['employee_aadharcard'] = $this->common->fileUpload($filesArray, $aadharcardUploadDir, $allowTypes);
        }

        // Employee Pancard
        if (isset($_FILES['employee_pancard'])) {
            $filesArray = $_FILES['employee_pancard'];
            $uploadedFiles['employee_pancard'] = $this->common->fileUpload($filesArray, $pancardUploadDir, $allowTypes);
        }

        // Employee Bankbook
        if (isset($_FILES['employee_bankbook'])) {
            $filesArray = $_FILES['employee_bankbook'];
            $uploadedFiles['employee_bankbook'] = $this->common->fileUpload($filesArray, $bankbookUploadDir, $allowTypes);
        }

        // Employee Licence
        if (isset($_FILES['employee_licence'])) {
            $filesArray = $_FILES['employee_licence'];
            $uploadedFiles['employee_licence'] = $this->common->fileUpload($filesArray, $licenceUploadDir, $allowTypes);
        }
        
        $employeeProfile_img = $uploadedFiles['employee_profile'][0];
        $employeeAadharcard_img = $uploadedFiles['employee_aadharcard'][0];
        $employeePancard_img = $uploadedFiles['employee_pancard'][0];
        $employeeBankbook_img = $uploadedFiles['employee_bankbook'][0];
        $employeeLicence_img = $uploadedFiles['employee_licence'][0];
        
        if ($_FILES["employee_profile"]["name"] == FALSE) {
            $employeeProfile_img = $alterEmployeeProfile;
        }
        if ($_FILES["employee_aadharcard"]["name"] == FALSE) {
            $employeeAadharcard_img = $alterEmployeeAadharcard;
        }
        if ($_FILES["employee_pancard"]["name"] == FALSE) {
            $employeePancard_img = $alterEmployeePancard;
        }
        if ($_FILES["employee_bankbook"]["name"] == FALSE) {
            $employeeBankbook_img = $alterEmployeeBankbook;
        }
        if ($_FILES["employee_licence"]["name"] == FALSE) {
            $employeeLicence_img = $alterEmployeeLicence;
        }

        if ($employeeId < 0 || $employeeId == '') {
            $checkExists = $this->employeemodel->checkEmployee($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Employee Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->employeemodel->saveEmployeeData($employeeId, $token, $employeeCode, $employeePassword, $employeePermission, $companyName, $zone, $branch, $branchLocation, $employeeName, $employeeEmail, $employeeNumber, $employeeDesignation, $employeeEducation, $dob, $doj, $status, $houseNo, $street, $city, $district, $pincode, $contactName, $contactRelative, $contactPhoneNumber, $contactHouseNo, $contactStreet, $contactCity, $contactDistrict, $contactPincode, $payslipStatus, $employeeProfile_img, $employeeAadharcard_img, $employeePancard_img, $employeeBankbook_img, $employeeLicence_img, $basicPay, $allowanceAmount, $pfStatus, $esiStatus, $esiNumber, $pfNumber, $mobileRecharge, $pfAmount, $bankName, $bankBranchName, $accountNumber, $ifscCode, $panNumber, $aadharNumber);
        
        $data["isError"] = FALSE;
        if ($employeeId > 0) {
            $data["message"] = "Employee Updated";
        } else {
            $data["message"] = "Employee Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function performance_list()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee_performance';

            $data['performanceList'] = $this->employeemodel->getPerformanceList();

            $this->load->view('settings/header', $data);
            $this->load->view('employee-performance/performance-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function performance_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee_performance';
            $data['formTitle'] = "Add Employee Performance";

            $this->load->view('settings/header', $data);
            $this->load->view('employee-performance/performance-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function getEmployeePerformanceDetail()
    {
      $employeeId = $this->input->post('employeeId');

      $employeePerformanceData = $data['employeePerformanceData'] = $this->employeemodel->getEmployeePerformanceInfo($employeeId);

      foreach ($employeePerformanceData as $row) {
        $data['employeeName'] = $row->employee_name;
      }
      
      echo json_encode($data);
    }

    public function getEmployeeNameList()
    {
      $employeeName = $this->input->post('employee_name');
      $data = $this->employeemodel->getEmployeeName($employeeName);
      echo json_encode($data);
    }

    public function getAttendanceEmployeeNameList()
    {
      $employeeName = $this->input->post('employee_name');
      $data = $this->employeemodel->getAttendanceEmployeeName($employeeName);
      echo json_encode($data);
    }

    public function employeePerformanceSaveForm()
    {
      $performanceId = $this->input->post('performance_id');
  
      $employeePerformanceArrayData = json_decode($this->input->post('employeePerformanceDataArray'));
      
      $this->employeemodel->employeePerformanceSaveData($performanceId, $employeePerformanceArrayData);
  
      $data["isError"] = FALSE;
      if ($performanceId > 0) {
          $data["message"] = "Employee Performance Updated";
      } else {
          $data["message"] = "Employee Performance Created";
      }
      echo json_encode($data);
      return;
    }

    public function payslip_list($year='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            if ($year == '') {
                $year = date('Y');
            }
            $data['menu_status'] = 'employee_payslip';
            $data['activeLink'] = $year;
            $data['yearList'] = [date('Y'), (date('Y') - 1), (date('Y') - 2)];

            $data['payslipList'] = $this->employeemodel->getPayslipList($year);
            
            $this->load->view('settings/header', $data);
            $this->load->view('employee-payslip/payslip-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function payslip_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee_payslip';
            
            $data['formTitle'] = "Add Salary Payslip";
            $data['employeeDropdown'] = $this->mastermodel->getPayslipEmployeeDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('employee-payslip/payslip-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function payslip_add_multi($company_name='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee_payslip';
            
            $data['formTitle'] = "Add Multi Salary Payslip";
            $data['employeePayslipList'] = $this->employeemodel->getEmployeePayslipList($company_name);

            $this->load->view('settings/header_link', $data);
            $this->load->view('employee-payslip/payslip-add-multi', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function payslip_view($payslipId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'employee_payslip';

            $payslipData = $this->employeemodel->getPayslipData($payslipId);
            foreach ($payslipData as $row) {
                $data['payslipId']=$row->id;
                $data['payslipYear']=$row->year;
                $data['payslipMonth']=$row->month;
                $data['employeeId']=$row->employee_code;
                $data['joiningDate']=$row->joining_date;
                $data['employeeName']=$row->employee_name;
                $data['employeeDesignation']=$row->designation;
                $data['companyName']=$row->company_name;
                $data['employeeBranch']=$row->branch_location;
                $data['employeeEsiNumber']=$row->esi_number;
                $data['employeePfNumber']=$row->pf_number;
                $data['employeeBank_name']=$row->bank_name;
                $data['employeeAccountNumber']=$row->account_number;
                $data['employeeIfscCode']=$row->ifsc_code;
                $data['employeePanNumber']=$row->pan_number;
                $data['employeePayableDays']=$row->day_count;
                $data['employeePresentDays']=$row->present_count;
                $data['employeeAbsentDays']=$row->absent_count;
                $data['employeeOtDays']=$row->ot_count;
                $data['basicPay']=$row->basic_pay;
                $data['presentBasicePay']=$row->month_basic_pay;
                $data['allowanceAmount']=$row->allowance_amount;
                $data['presentAllowanceAmount']=$row->month_allowance_amount;
                $data['overtimePay']=$row->ot_amount;
                $data['mobileRecharge']=$row->mobile_recharge;
                $data['travellingAmount']=$row->travelling_amount;
                $data['incentiveAmount']=$row->incentive_amount;
                $data['foodExpenses']=$row->food_expenses;
                $data['esiAmount']=$row->esi_amount;
                $data['basicPfAmount']=$row->pf_amount;
                $data['pfAmount']=$row->month_pf_amount;
                $data['advanceCash']=$row->advance_cash;
                $data['professionalTax']=$row->professional_tax;
                $data['totalEarning']=$row->total_earning;
                $data['deductionAmount']=$row->deduction_amount;
                $data['salaryAmount']=$row->salary_amount;
                $data['salaryInWord']=$row->salary_in_word;
            }

            $this->load->view('settings/header_link', $data);
            $this->load->view('employee-payslip/payslip-view', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function employeeSalaryInfo()
    {
        $employeeName 	= $this->input->post('employeeName');
        $data 	= $this->employeemodel->getEmployeeSalaryInfo($employeeName);
        echo json_encode($data); 
    }

    public function employeeInfo()
    {
        $employeeName 	= $this->input->post('employeeName');
        $data 	= $this->employeemodel->getEmployeeInfo($employeeName);
        echo json_encode($data); 
    }

    //Payslip Save Form //
    public function payslipFormSave()
    {
        $payslipId = $this->input->post('payslip_id');
        $employeeName = $this->input->post('employee_name');
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $dayCount = $this->input->post('day_count');
        $basicPay = $this->input->post('basic_pay');
        $monthBasicPay = $this->input->post('month_basic_pay');
        $allowanceAmount = $this->input->post('allowance_amount');
        $monthAllowanceAmount = $this->input->post('month_allowance_amount');
        $presentCount = $this->input->post('present_count');
        $absentCount = $this->input->post('absent_count');
        $otCount = $this->input->post('ot_count');
        $otAmount = $this->input->post('ot_amount');
        $mobileRecharge = $this->input->post('mobile_recharge');
        $travellingAmount = $this->input->post('travelling_amount');
        $incentiveAmount = $this->input->post('incentive_amount');
        $foodExpenses = $this->input->post('food_expenses');
        $totalEarning = $this->input->post('total_earning');
        $pfStatus = $this->input->post('pf_status');
        $pfAmount = $this->input->post('pf_amount');
        $monthPfAmount = $this->input->post('month_pf_amount');
        $esiStatus = $this->input->post('esi_status');
        $esiAmount = $this->input->post('esi_amount');
        $advanceCash = $this->input->post('advance_cash');
        $professionalTax = $this->input->post('professional_tax');
        $deductionAmount = $this->input->post('deduction_amount');
        $salaryAmount = $this->input->post('salary_amount');
        $salaryInWord = $this->input->post('salary_in_word');

        $this->employeemodel->savePayslipData($payslipId, $employeeName, $year, $month, $dayCount, $presentCount, $absentCount, $basicPay, $monthBasicPay, $allowanceAmount, $monthAllowanceAmount, $otCount, $otAmount, $mobileRecharge, $travellingAmount, $incentiveAmount, $foodExpenses, $pfStatus, $pfAmount, $monthPfAmount, $esiStatus, $esiAmount, $advanceCash, $professionalTax, $totalEarning, $deductionAmount, $salaryAmount, $salaryInWord);
        
        $data["isError"] = FALSE;
        if ($payslipId > 0) {
            $data["message"] = "Payslip Updated";
        } else {
            $data["message"] = "Payslip Created";
        }

        echo json_encode($data);
        return;
    }

    //Employee Payslip Save Form //
    public function employeePayslipSaveFunction()
    {
      $payslipId = $this->input->post('payslip_id');
      $month = $this->input->post('month');
      $year = $this->input->post('year');
      $employeeIds = $this->input->post('employee_id');
      $basicPays = $this->input->post('basic_pay');
      $allowanceAmounts = $this->input->post('allowance_amount');
      $dayCounts = $this->input->post('day_count');
      $presentCounts = $this->input->post('present_count');
      $absentCounts = $this->input->post('absent_count');
      $monthBasicPays = $this->input->post('month_basic_pay');
      $monthAllowanceAmounts = $this->input->post('month_allowance_amount');
      $otCounts = $this->input->post('ot_count');
      $otAmounts = $this->input->post('ot_amount');
      $mobileRecharges = $this->input->post('mobile_recharge');
      $travellingAmounts = $this->input->post('travelling_amount');
      $incentiveAmounts = $this->input->post('incentive_amount');
      $foodExpensess = $this->input->post('food_expenses');
      $totalEarnings = $this->input->post('total_earning');
      $pfStatuss = $this->input->post('pf_status');
      $pfAmounts = $this->input->post('pf_amount');
      $monthPfAmounts = $this->input->post('month_pf_amount');
      $esiStatuss = $this->input->post('esi_status');
      $esiAmounts = $this->input->post('esi_amount');
      $advanceCashs = $this->input->post('advance_cash');
      $professionalTaxs = $this->input->post('professional_tax');
      $deductionAmounts = $this->input->post('deduction_amount');
      $salaryAmounts = $this->input->post('salary_amount');
      $salaryInWords = $this->input->post('salary_in_word');

      // Loop through each Employee Payslip and save Material data
      foreach ($employeeIds as $index => $employeeId) {
          $basicPay = isset($basicPays[$index]) ? $basicPays[$index] : '';
          $allowanceAmount = isset($allowanceAmounts[$index]) ? $allowanceAmounts[$index] : '';
          $dayCount = isset($dayCounts[$index]) ? $dayCounts[$index] : '';
          $presentCount = isset($presentCounts[$index]) ? $presentCounts[$index] : '';
          $absentCount = isset($absentCounts[$index]) ? $absentCounts[$index] : '';
          $monthBasicPay = isset($monthBasicPays[$index]) ? $monthBasicPays[$index] : '';
          $monthAllowanceAmount = isset($monthAllowanceAmounts[$index]) ? $monthAllowanceAmounts[$index] : '';
          $otCount = isset($otCounts[$index]) ? $otCounts[$index] : '';
          $otAmount = isset($otAmounts[$index]) ? $otAmounts[$index] : '';
          $mobileRecharge = isset($mobileRecharges[$index]) ? $mobileRecharges[$index] : '';
          $travellingAmount = isset($travellingAmounts[$index]) ? $travellingAmounts[$index] : '';
          $incentiveAmount = isset($incentiveAmounts[$index]) ? $incentiveAmounts[$index] : '';
          $foodExpenses = isset($foodExpensess[$index]) ? $foodExpensess[$index] : '';
          $totalEarning = isset($totalEarnings[$index]) ? $totalEarnings[$index] : '';
          $pfStatus = isset($pfStatuss[$index]) ? $pfStatuss[$index] : '';
          $pfAmount = isset($pfAmounts[$index]) ? $pfAmounts[$index] : '';
          $monthPfAmount = isset($monthPfAmounts[$index]) ? $monthPfAmounts[$index] : '';
          $esiStatus = isset($esiStatuss[$index]) ? $esiStatuss[$index] : '';
          $esiAmount = isset($esiAmounts[$index]) ? $esiAmounts[$index] : '';
          $advanceCash = isset($advanceCashs[$index]) ? $advanceCashs[$index] : '';
          $professionalTax = isset($professionalTaxs[$index]) ? $professionalTaxs[$index] : '';
          $deductionAmount = isset($deductionAmounts[$index]) ? $deductionAmounts[$index] : '';
          $salaryAmount = isset($salaryAmounts[$index]) ? $salaryAmounts[$index] : '';
          $salaryInWord = isset($salaryInWords[$index]) ? $salaryInWords[$index] : '';
          $this->employeemodel->saveEmployeePayslipAllData($payslipId, $month, $year, $employeeId, $basicPay, $allowanceAmount, $dayCount, $presentCount, $absentCount, $monthBasicPay, $monthAllowanceAmount, $otCount, $otAmount, $mobileRecharge, $travellingAmount, $incentiveAmount, $foodExpenses, $totalEarning, $pfStatus, $pfAmount, $monthPfAmount, $esiStatus, $esiAmount, $advanceCash, $professionalTax, $deductionAmount, $salaryAmount, $salaryInWord);
      }
      
      $data["isError"] = FALSE;
      if ($payslipId > 0) {
          $data["message"] = "Employee Payslip Updated";
      } else {
          $data["message"] = "Employee Payslip Created";
      }

      echo json_encode($data);
      return;
    }
  
    public function increment_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'salary_increment';
        
        $data['salaryIncrementList'] = $this->employeemodel->getSalaryIncrementList();
  
        $this->load->view('settings/header', $data);
        $this->load->view('salary_increment/increment_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function increment_add($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'salary_increment';
  
        $data['formTitle'] = "Add Salary Increment";
        
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
  
        $salaryIncrementInfo = $this->employeemodel->getSalaryIncrementInfo($employeeId);
        foreach ($salaryIncrementInfo as $row) {
          $data['employeeId'] = $row->id;
          $data['employeeName'] = $row->employee_name;
          $data['designation'] = $row->designation;
          $data['oldSalaryAmount'] = $row->old_salary_amount;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('salary_increment/increment_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function increment_edit($salaryIncrementId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'salary_increment';
  
        $data['formTitle'] = "Edit Salary Increment";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $salaryIncrementDetail = $this->employeemodel->getSalaryIncrementDetail($salaryIncrementId);
        foreach ($salaryIncrementDetail as $row) {
            $data['incrementId'] = $row->id;
            $data['employeeId'] = $row->employee_id;
            $data['incrementDate'] = $row->date;
            $data['employeeName'] = $row->employee_name;
            $data['designation'] = $row->designation;
            $data['oldSalaryAmount'] = $row->old_salary_amount;
            $data['newSalaryAmount'] = $row->new_salary_amount;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('salary_increment/increment_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function increment_view($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'salary_increment';
  
        $data['incrementList'] = $this->employeemodel->getIncrementList($employeeId);
  
        $salaryIncrementInfo = $this->employeemodel->getEmployeeInfo($employeeId);
        foreach ($salaryIncrementInfo as $row) {
          $data['employeeId'] = $row->id;
          $data['employeeName'] = $row->employee_name;
          $data['designation'] = $row->designation;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('salary_increment/increment_view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    //Salary Increment Save Form //
    public function incrementFormSave()
    {
        $incrementId = $this->input->post('increment_id');
        $incrementDate = $this->input->post('increment_date');
        $employeeId = $this->input->post('employee_id');
        $oldSalaryAmount = $this->input->post('old_salary_amount');
        $newSalaryAmount = $this->input->post('new_salary_amount');

        $this->employeemodel->saveIncrementFormData($incrementId, $incrementDate, $employeeId, $oldSalaryAmount, $newSalaryAmount);
        
        $data["isError"] = FALSE;
        if ($incrementId > 0) {
            $data["message"] = "Salary Increment Updated";
        } else {
            $data["message"] = "Salary Increment Created";
        }

        echo json_encode($data);
        return;
    }

    public function expenses_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_expenses';
        
        $data['employeeExpensesList'] = $this->employeemodel->getEmployeeExpensesList();
  
        $this->load->view('settings/header', $data);
        $this->load->view('employee_expenses/expenses_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function disbursed_add($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_expenses';
  
        $data['formTitle'] = "Add ";
        
        $data['status'] = "disbursed";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
  
        $employeeExpensesDetail = $this->employeemodel->getEmployeeExpensesDetail($employeeId);
        foreach ($employeeExpensesDetail as $row) {
            $data['employeeId'] = $row->employee_id;
            $data['designation'] = $row->designation;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('employee_expenses/expenses_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function expenses_add($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'employee_expenses';
  
        $data['formTitle'] = "Add ";
        
        $data['status'] = "expenses";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
  
        $empName = $this->session->userdata('username');
        $empId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $employeeExpensesDetail = $this->employeemodel->getEmployeeExpensesDetail($employeeId);
        foreach ($employeeExpensesDetail as $row) {
          $data['employeeId'] = $row->employee_id;
          $data['designation'] = $row->designation;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('employee_expenses/expenses_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function expenses_edit($employeeExpensesId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_expenses';
  
        $data['formTitle'] = "Edit ";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $employeeExpensesInfo = $this->employeemodel->getEmployeeExpensesInfo($employeeExpensesId);
        foreach ($employeeExpensesInfo as $row) {
          $data['expensesId'] = $row->id;
          $data['date'] = $row->date;
          $data['employeeId'] = $row->employee_id;
          $data['designation'] = $row->designation;
          $data['amount'] = $row->amount;
          $data['remarks'] = $row->remarks;
          $data['status'] = $row->status;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('employee_expenses/expenses_edit', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function expenses_view($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'employee_expenses';
  
        $data['disbursedAmountList'] = $this->employeemodel->getExpensesList($employeeId, 'disbursed');
        $data['expensesAmountList'] = $this->employeemodel->getExpensesList($employeeId, 'expenses');

        $empName = $this->session->userdata('username');
        $empId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);
        
        $employeeExpensesListDetail = $this->employeemodel->getEmployeeExpensesList($employeeId);
        foreach ($employeeExpensesListDetail as $row) {
          $data['employeeId'] = $row->employee_id;
          $data['employeeName'] = $row->employee_name;
          $data['disbursedAmount'] = $row->disbursed_amount;
          $data['expensesAmount'] = $row->expenses_amount;
          $data['balanceAmount'] = $row->balance_amount;
        }
  
        $this->load->view('settings/header', $data);
        $this->load->view('employee_expenses/expenses_view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    //Employee Expenses Save Form //
    public function employeeExpensesSave()
    {
        $expensesId = $this->input->post('expenses_id');
        $date = $this->input->post('date');
        $employeeName = $this->input->post('employee_name');
        $status = $this->input->post('status');

        $expensesArrayData = json_decode($this->input->post('expensesDataArray'));

        $this->employeemodel->saveEmployeeExpensesData($expensesId, $date, $employeeName, $expensesArrayData, $status);
        
        $data["isError"] = FALSE;
        if ($expensesId > 0) {
            $data["message"] = "Data Updated";
        } else {
            $data["message"] = "Data Created";
        }

        echo json_encode($data);
        return;
    }

    //Employee Expenses Save Form //
    public function editEmployeeExpensesSave()
    {
        $expensesId = $this->input->post('expenses_id');
        $date = $this->input->post('date');
        $employeeName = $this->input->post('employee_name');
        $amount = $this->input->post('amount');
        $remarks = $this->input->post('remarks');
        $status = $this->input->post('status');

        $this->employeemodel->saveEditEmployeeExpensesData($expensesId, $date, $employeeName, $amount, $remarks, $status);
        
        $data["isError"] = FALSE;
        if ($expensesId > 0) {
            $data["message"] = "Data Updated";
        } else {
            $data["message"] = "Data Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function transfer_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_transfer';
        
        $data['employeeTransferList'] = $this->employeemodel->getEmployeeTransferList();
  
        $this->load->view('settings/header', $data);
        $this->load->view('employee_transfer/transfer_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function transfer_add($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_transfer';
  
        $data['formTitle'] = "Add ";
        
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
  
        $employeeTransferDetail = $this->employeemodel->getEmployeeTransferDetail($employeeId);
        foreach ($employeeTransferDetail as $row) {
            $data['employeeId'] = $row->employee_id;
            $data['designation'] = $row->designation;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('employee_transfer/transfer_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function transfer_edit($employeeTransferId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_transfer';
  
        $data['formTitle'] = "Edit ";
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $employeeTransferInfo = $this->employeemodel->getEmployeeTransferInfo($employeeTransferId);
        foreach ($employeeTransferInfo as $row) {
          $data['transferId'] = $row->id;
          $data['date'] = $row->date;
          $data['employeeId'] = $row->employee_id;
          $data['employeeName'] = $row->employee_name;
          $data['designation'] = $row->designation;
          $data['fromBranch'] = $row->from_branch;
          $data['toBranch'] = $row->to_branch;
          $data['remarks'] = $row->remarks;
          $data['returnDate'] = $row->return_date;
          $data['dayCount'] = $row->day_count;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('employee_transfer/transfer_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function transfer_view($employeeId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_transfer';
  
        $data['transferList'] = $this->employeemodel->getTransferList($employeeId);
        
        $employeeTransferListDetail = $this->employeemodel->getEmployeeTransferList($employeeId);
        foreach ($employeeTransferListDetail as $row) {
          $data['employeeId'] = $row->employee_id;
          $data['employeeName'] = $row->employee_name;
        }
  
        $this->load->view('settings/header', $data);
        $this->load->view('employee_transfer/transfer_view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    //Employee Transfer Save Form //
    public function employeeTransferSave()
    {
        $transferId = $this->input->post('transfer_id');
        $date = $this->input->post('date');
        $employeeName = $this->input->post('employee_name');
        $fromBranch = $this->input->post('from_branch');
        $toBranch = $this->input->post('to_branch');
        $remarks = $this->input->post('remarks');
        $returnDate = $this->input->post('return_date');
        $dayCount = $this->input->post('day_count');

        $this->employeemodel->saveEmployeeTransferData($transferId, $date, $employeeName, $fromBranch, $toBranch, $remarks, $returnDate, $dayCount);
        
        $data["isError"] = FALSE;
        if ($transferId > 0) {
            $data["message"] = "Employee Transfer Updated";
        } else {
            $data["message"] = "Employee Transfer Created";
        }

        echo json_encode($data);
        return;
    }
    
    //Employee Work
    public function work_list($year = '', $month = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_work';
        $data["year"] = $year;
        $data["month"] = $month;

        $data['workMonthList'] = $this->employeemodel->getWorkMonthList($year);
        $data['employeeWorkList'] = $this->employeemodel->employeeWorkList('', $year, $month);

        $this->load->view('settings/header', $data);
        $this->load->view('employee_work/work-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function employee_work_add($year = '', $month = '', $employeeId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_work';

        $data['formTitle'] = "Add Employee Work";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
        $data['workTypeDropdown'] = $this->mastermodel->getWorkTypeDropdown();

        $data['month'] = $month;
        $data['year'] = $year;

        if ($employeeId != '') {
          $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
          foreach ($employeeInfo as $row) {
            $data['employeeId'] = $row->id;
          }
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('employee_work/employee-work-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function employee_work_edit($employeeWorkId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'employee_work';

        $data['formTitle'] = "Edit Employee Work";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
        $data['workTypeDropdown'] = $this->mastermodel->getWorkTypeDropdown();

        $employeeWorkInfo = $this->employeemodel->getEmployeeWorkInfo($employeeWorkId);
        foreach ($employeeWorkInfo as $row) {
          $data['employeeWorkId'] = $row->id;
          $data['employeeId'] = $row->employee_id;
          $data['workType'] = $row->work_type;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('employee_work/employee-work-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    //Employee Work Save Form //
    public function addEmployeeWorkFormSave()
    {
      $employeeWorkId = $this->input->post('employee_work_id');
      $employeeId = $this->input->post('employee_id');
      $workType = $this->input->post('work_type');
      $reportingDate = $this->input->post('reporting_date');

      if ($employeeWorkId < 0 || $employeeWorkId == '') {
        $checkExists = $this->employeemodel->checkEmployeeWork($employeeId, $workType);
        if ($checkExists > 0) {
          $data["isError"] = TRUE;
          $data["message"] = "Employee Work Already Exists";
          echo json_encode($data);
          return;
        }
      }

      $this->employeemodel->saveEmployeeWorkData($employeeWorkId, $employeeId, $workType, $reportingDate);
      
      $data["isError"] = FALSE;
      if ($employeeWorkId > 0) {
        $data["message"] = "Employee Work Updated";
      } else {
        $data["message"] = "Employee Work Created";
      }

      echo json_encode($data);
      return;
    }

    public function work_report($employeeWorkId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'employee_work';

        $data['workReportList'] = $this->employeemodel->workReportList($employeeWorkId);

        $employeeWorkInfo = $this->employeemodel->getEmployeeWorkInfo($employeeWorkId);
        foreach ($employeeWorkInfo as $row) {
          $data['employeeWorkId'] = $row->id;
          $data['employeeId'] = $row->employee_id;
          $data['employeeName'] = $row->employee_name;
          $data['workType'] = $row->work_type;
        }

        $empName = $this->session->userdata('username');
        $empId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $this->load->view('settings/header', $data);
        $this->load->view('employee_work/work-report', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function work_report_add($employeeWorkId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'employee_work';

        $empId = $this->session->userdata('userid');
        $data["is_admin"] = $this->session->userdata('is_admin');
        $data['employeeWorkId'] = $employeeWorkId;
        $data['formTitle'] = "Add Work Report";
        $data['employeeWorkDropdown'] = $this->mastermodel->getEmployeeWorkDropdown($empId);

        $employeeWorkInfo = $this->employeemodel->getEmployeeWorkInfo($employeeWorkId);
        foreach ($employeeWorkInfo as $row) {
          $data['nextReportDayCount'] = $row->day_count;
        }

        $empName = $this->session->userdata('username');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $this->load->view('settings/header', $data);
        $this->load->view('employee_work/work-report-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function work_report_edit($workReportId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'employee_work';

        $data["empId"] = $empId = $this->session->userdata('userid');
        $data["is_admin"] = $this->session->userdata('is_admin');
        $data['formTitle'] = "Edit Work Report";
        $data['employeeWorkDropdown'] = $this->mastermodel->getEmployeeWorkDropdown();

        $workReportInfo = $this->employeemodel->getWorkReportInfo($workReportId);
        foreach ($workReportInfo as $row) {
          $data['workReportId'] = $row->id;
          $data['nextReportDayCount'] = $row->day_count;
          $data['employeeWorkId'] = $row->employee_work_id;
          $data['reportDate'] = $row->report_date;
          $data['submissionDate'] = $row->submission_date;
          $data['reportDoc'] = $row->report_document;
          $data['description'] = $row->description;
        }
          
        $empName = $this->session->userdata('username');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);
          
        $this->load->view('settings/header', $data);
        $this->load->view('employee_work/work-report-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function employeeWorkTypeInfo()
    {
        $employeeWorkId 	= $this->input->post('employeeWorkId');
        $data 	= $this->employeemodel->getEmployeeWorkTypeInfo($employeeWorkId);
        echo json_encode($data); 
    }
    
    public function getWorkReportDetail()
    {
      $workReportId = $this->input->post('workReportId');
      
      $partyPurchaseDetail = $this->employeemodel->getWorkReportInfo($workReportId);
      foreach ($partyPurchaseDetail as $row) {
        $data['workReportId'] = $row->id;
        $data['nextReportDayCount'] = $row->day_count;
        $data['employeeWorkId'] = $row->employee_work_id;
        $data['workType'] = $row->work_type;
        $data['employeeName'] = $row->employee_name;
        $data['reportDate'] = $row->report_date;
        $data['submissionDate'] = $row->submission_date;
        $data['reportDoc'] = $row->report_document;
        $data['description'] = $row->description;
      }
      echo json_encode($data);
    }

    //Work Report Save Form //
    public function addWorkReportFormSave()
    {
      $workReportId = $this->input->post('work_report_id');
      $employeeWork = $this->input->post('employee_work');
      $reportDate = $this->input->post('report_date');
      $submissionDate = $this->input->post('submission_date');
      $nextReportDate = $this->input->post('next_report_date');
      $description = $this->input->post('description');

      $workReportdoc = $this->input->post('alter_work_report');
    
      $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
  
      $workReportdocDir = './uploads/work_report/';
  
      // Security Amount Receipt
      if (isset($_FILES['work_report'])) {
        $filesArray = $_FILES['work_report'];
        $uploadedFiles['work_report'] = $this->common->fileUpload($filesArray, $workReportdocDir, $allowTypes);
      }
  
      $workReport = $uploadedFiles['work_report'][0];
  
      if ($_FILES["work_report"]["name"] == FALSE) {
        $workReport = $workReportdoc;
      }

      if ($workReportId < 0 || $workReportId == '') {
        $checkExists = $this->employeemodel->checkWorkReport($employeeWork, $reportDate);
        if ($checkExists > 0) {
          $data["isError"] = TRUE;
          $data["message"] = "Work Report Already Exists";
          echo json_encode($data);
          return;
        }
      }

      $this->employeemodel->saveWorkReportData($workReportId, $employeeWork, $reportDate, $submissionDate, $nextReportDate, $workReport, $description);
      
      $data["isError"] = FALSE;
      if ($workReportId > 0) {
        $data["message"] = "Work Report Updated";
      } else {
        $data["message"] = "Work Report Created";
      }

      echo json_encode($data);
      return;
    }
    
    //Daily Task
    public function daily_task()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'daily_task';

        $data['dailyTaskList'] = $this->employeemodel->dailyTaskList();

        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/daily_task_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function daily_task_add($employeeId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'daily_task';

        $data['formTitle'] = "Add Daily Task";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        if ($employeeId != '') {
          $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
          foreach ($employeeInfo as $row) {
            $data['employeeId'] = $row->id;
          }
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/daily_task_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function daily_task_edit($dailyTaskId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
        $data["menu_status"] = 'daily_task';

        $data['formTitle'] = "Edit Daily Task";
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $dailyTaskInfo = $this->employeemodel->getDailyTaskInfo($dailyTaskId);
        foreach ($dailyTaskInfo as $row) {
          $data['dailyTaskId'] = $row->id;
          $data['employeeId'] = $row->employee_id;
          $data['dailyTask'] = $row->daily_task;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/daily_task_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    //Daily Task Save Form //
    public function addDailyTaskFormSave()
    {
      $dailyTaskId = $this->input->post('daily_task_id');
      $employeeId = $this->input->post('employee_id');
      $taskType = $this->input->post('task_type');

      if ($dailyTaskId < 0 || $dailyTaskId == '') {
        $checkExists = $this->employeemodel->checkDailyTask($employeeId, $taskType);
        if ($checkExists > 0) {
          $data["isError"] = TRUE;
          $data["message"] = "Daily Task Already Exists";
          echo json_encode($data);
          return;
        }
      }

      $this->employeemodel->saveDailyTaskData($dailyTaskId, $employeeId, $taskType);
      
      $data["isError"] = FALSE;
      if ($dailyTaskId > 0) {
        $data["message"] = "Daily Task Updated";
      } else {
        $data["message"] = "Daily Task Created";
      }

      echo json_encode($data);
      return;
    }

    public function task_list($employeeId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'daily_task';

        $data['taskList'] = $this->employeemodel->taskList($employeeId);

        $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
        foreach ($employeeInfo as $row) {
          $data['employeeId'] = $row->id;
          $data['employeeName'] = $row->employee_name;
        }
          
        $empName = $this->session->userdata('username');
        $empId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/task_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function report_list($dailyTaskId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'daily_task';

        $data['reportList'] = $this->employeemodel->reportList($dailyTaskId);

        $dailyTaskInfo = $this->employeemodel->getDailyTaskInfo($dailyTaskId);
        foreach ($dailyTaskInfo as $row) {
          $data['dailyTaskId'] = $row->id;
          $data['employeeId'] = $row->employee_id;
          $data['employeeName'] = $row->employee_name;
          $data['workType'] = $row->task_type;
        }
          
        $empName = $this->session->userdata('username');
        $empId = $this->session->userdata('userid');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/report_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function task_add($dailyTaskId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'daily_task';
        
        $empId = $this->session->userdata('userid');
        $data["is_admin"] = $this->session->userdata('is_admin');
        $data['dailyTaskId'] = $dailyTaskId;
        $data['formTitle'] = "Add Task";
        $data['dailyTaskDropdown'] = $this->mastermodel->getDailyTaskDropdown($empId);
          
        $empName = $this->session->userdata('username');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/task_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function task_edit($taskId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('employee', $userPermission)) {
        $data["menu_status"] = 'daily_task';

        $data["empId"] = $empId = $this->session->userdata('userid');
        $data["is_admin"] = $this->session->userdata('is_admin');
        $data['formTitle'] = "Edit Task";
        $data['dailyTaskDropdown'] = $this->mastermodel->getDailyTaskDropdown($empId);

        $taskInfo = $this->employeemodel->getTaskInfo($taskId);
        foreach ($taskInfo as $row) {
          $data['taskId'] = $row->id;
          $data['dailyTaskId'] = $row->daily_task_id;
          $data['taskDate'] = $row->task_date;
          $data['description'] = $row->description;
        }
          
        $empName = $this->session->userdata('username');
        $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
        $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
        $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);
          
        $this->load->view('settings/header', $data);
        $this->load->view('daily_task/task_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function dailyTaskDate()
    {
        $dailyTaskId 	= $this->input->post('dailyTaskId');
        $data 	= $this->employeemodel->getDailyTaskData($dailyTaskId);
        echo json_encode($data); 
    }

    //Task Save Form //
    public function addTaskFormSave()
    {
      $taskId = $this->input->post('task_id');
      $dailyTaskType = $this->input->post('daily_task_type');
      $taskDate = $this->input->post('task_date');
      $description = $this->input->post('description');

      if ($taskId < 0 || $taskId == '') {
        $checkExists = $this->employeemodel->checkTask($dailyTaskType, $taskDate);
        if ($checkExists > 0) {
          $data["isError"] = TRUE;
          $data["message"] = "Task Already Exists";
          echo json_encode($data);
          return;
        }
      }

      $this->employeemodel->saveTaskData($taskId, $dailyTaskType, $taskDate, $description);
      
      $data["isError"] = FALSE;
      if ($taskId > 0) {
        $data["message"] = "Task Updated";
      } else {
        $data["message"] = "Task Created";
      }

      echo json_encode($data);
      return;
    }
}