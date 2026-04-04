<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

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
    
    public function index()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';

            $data['advancecashEmployeeList'] = $this->loanmodel->getAdvanceCashEmployeeList();

            $overallAdvancecashData = $this->loanmodel->getOverallAdvanceCashData();
            foreach ($overallAdvancecashData as $row) {
                $data['advancecashAmount'] = $row->overall_advancecash_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function advancecash_list()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';

            $data['advancecashEmployeeList'] = $this->loanmodel->getAdvanceCashEmployeeList();

            $overallAdvancecashData = $this->loanmodel->getOverallAdvanceCashData();
            foreach ($overallAdvancecashData as $row) {
                $data['advancecashAmount'] = $row->overall_advancecash_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function advancecash_add($employeeId = '')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';

            $data['formTitle'] = "Add Loan";
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
            if ($employeeId != '') {
                $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
                foreach ($employeeInfo as $row) {
                    $data['employeeId'] = $row->id;
                    $data['name'] = $row->employee_name;
                    $data['designation'] = $row->designation;
                }
            }

            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function advancecash_edit($advancecashId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';
            
            $data['formTitle'] = "Edit Employee Loan";
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

            $advancecashInfo = $this->loanmodel->getAdvancecashInfo($advancecashId);
            foreach ($advancecashInfo as $row) {
                $data['advancecashId'] = $row->id;
                $data['employeeId'] = $row->employee_id;
                $data['designation'] = $row->designation;
                $data['advancecashDate'] = $row->advancecash_date;
                $data['advancecashAmount'] = $row->advancecash_amount;
                $data['remarks'] = $row->remarks;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function advancecash_view($employeeId='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';

            $data['advancecashList'] = $this->loanmodel->getAdvancecashList($employeeId);
            $data['advancecashReceivedList'] = $this->loanmodel->getAdvancecashReceivedList($employeeId);

            $advancecashEmployeeData = $this->loanmodel->getAdvanceCashEmployeeList($employeeId);
            foreach ($advancecashEmployeeData as $row) {
                $data['employeeId'] = $row->employee_id;
                $data['employeeName'] = $row->employee_name;
                $data['designation'] = $row->designation;
                $data['advancecashAmount'] = $row->overall_advancecash_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-view', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function advancecash_received_add($employeeId='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';

            $data['formTitle'] = "Add Loan Received";
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
            $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
            foreach ($employeeInfo as $row) {
                $data['employeeId'] = $row->id;
                $data['name'] = $row->employee_name;
                $data['designation'] = $row->designation;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-received-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function advancecash_received_edit($advancecashReceivedId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';
            
            $data['formTitle'] = "Edit Employee Loan Received";
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

            $advancecashReceivedInfo = $this->loanmodel->getAdvancecashReceivedInfo($advancecashReceivedId);
            foreach ($advancecashReceivedInfo as $row) {
                $data['advancecashReceivedId'] = $row->id;
                $data['employeeId'] = $row->employee_id;
                $data['designation'] = $row->designation;
                $data['receivedDate'] = $row->received_date;
                $data['receivedAmount'] = $row->received_amount;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('employee-advancecash/advancecash-received-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function advancecash_report($employeeId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_status'] = 'advancecash_loan';
            
            $data['advancecashList'] = $this->loanmodel->getAdvancecashList($employeeId);
            $data['advancecashReceivedList'] = $this->loanmodel->getAdvancecashReceivedList($employeeId);

            $advancecashEmployeeData = $this->loanmodel->getAdvanceCashEmployeeList($employeeId);
            foreach ($advancecashEmployeeData as $row) {
                $data['employeeId'] = $row->employee_id;
                $data['employeeName'] = $row->employee_name;
                $data['designation'] = $row->designation;
                $data['advancecashAmount'] = $row->overall_advancecash_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }

            $this->load->view('settings/header_link', $data);
            $this->load->view('employee-advancecash/advancecash-report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Employee Loan Save Form
    public function advancecashFormSave()
    {
        $advancecashId = $this->input->post('advancecash_id');
        $employeeName = $this->input->post('employee_name');
        $advancecashDate = $this->input->post('advancecash_date');
        $advancecashAmount = $this->input->post('advancecash_amount');
        $remarks = $this->input->post('remarks');

        $this->loanmodel->saveAdvancecashData($advancecashId, $employeeName, $advancecashDate, $advancecashAmount, $remarks);
        
        $data["isError"] = FALSE;
        if ($advancecashId > 0) {
            $data["message"] = "Employee Loan Updated";
        } else {
            $data["message"] = "Employee Loan Created";
        }

        echo json_encode($data);
        return;
    }

    //Employee Loan Received Save Form
    public function advancecashReceivedFormSave()
    {
        $advancecashReceivedId = $this->input->post('advancecash_received_id');
        $employeeName = $this->input->post('employee_name');
        $receivedDate = $this->input->post('received_date');
        $receivedAmount = $this->input->post('received_amount');

        $this->loanmodel->saveAdvancecashReceivedData($advancecashReceivedId, $employeeName, $receivedDate, $receivedAmount);
        
        $data["isError"] = FALSE;
        if ($advancecashReceivedId > 0) {
            $data["message"] = "Employee Loan Received";
        } else {
            $data["message"] = "Employee Loan Received";
        }

        echo json_encode($data);
        return;
    }

    public function thirdparty_loan_list()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';

            $data['thirdpartyLoanList'] = $this->loanmodel->getThirdpartyLoanList();

            $overallLoanData = $this->loanmodel->getOverallThirdpartyLoanData();
            foreach ($overallLoanData as $row) {
                $data['loanAmount'] = $row->overall_loan_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function thirdparty_loan_add($thirdpartyId = '')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';

            $data['formTitle'] = "Add Thirdparty Loan";
            $data['thirdpartyDropdown'] = $this->mastermodel->getThirdpartyDropdown();
            if ($thirdpartyId != '') {
                $thirdpartyInfo = $this->mastermodel->getThirdpartyInfo($thirdpartyId);
                foreach ($thirdpartyInfo as $row) {
                    $data['thirdpartyId'] = $row->id;
                    $data['thirdpartyName'] = $row->thirdparty_name;
                    $data['thirdpartyRemarks'] = $row->remarks;
                }
            }

            $this->load->view('settings/header', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function thirdparty_loan_edit($thirdpartyLoanId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';
            
            $data['formTitle'] = "Edit Thirdparty Loan";
            $data['thirdpartyDropdown'] = $this->mastermodel->getThirdpartyDropdown();

            $loanInfo = $this->loanmodel->getThirdpartyLoanInfo($thirdpartyLoanId);
            foreach ($loanInfo as $row) {
                $data['thirdpartyLoanId'] = $row->id;
                $data['thirdpartyId'] = $row->thirdparty_id;
                $data['thirdpartyRemarks'] = $row->thirdparty_remarks;
                $data['thirdpartyLoanDate'] = $row->advancecash_date;
                $data['thirdpartyLoanAmount'] = $row->advancecash_amount;
                $data['remarks'] = $row->remarks;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function thirdparty_loan_view($thirdpartyId='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';

            $data['loanList'] = $this->loanmodel->getThirdpartyList($thirdpartyId);
            $data['loanReceivedList'] = $this->loanmodel->getThirdpartyLoanReceivedList($thirdpartyId);

            $thirdpartyLoanData = $this->loanmodel->getThirdpartyLoanList($thirdpartyId);
            foreach ($thirdpartyLoanData as $row) {
                $data['thirdpartyId'] = $row->thirdparty_id;
                $data['thirdpartyName'] = $row->thirdparty_name;
                $data['thirdpartyRemarks'] = $row->thirdparty_remarks;
                $data['loanAmount'] = $row->overall_loan_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-view', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function thirdparty_loan_received_add($thirdpartyId='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';

            $data['formTitle'] = "Add Loan Received";
            $data['thirdpartyDropdown'] = $this->mastermodel->getThirdpartyDropdown();
            $thirdpartyInfo = $this->mastermodel->getThirdpartyInfo($thirdpartyId);
            foreach ($thirdpartyInfo as $row) {
                $data['thirdpartyId'] = $row->id;
                $data['thirdpartyName'] = $row->thirdparty_name;
                $data['thirdpartyRemarks'] = $row->remarks;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-received-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
    
    public function thirdparty_loan_received_edit($thirdpartyLoanId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';
            
            $data['formTitle'] = "Edit Thirdparty Loan Received";
            $data['thirdpartyDropdown'] = $this->mastermodel->getThirdpartyDropdown();

            $thirdpartyLoanInfo = $this->loanmodel->getThirdpartyLoanReceivedInfo($thirdpartyLoanId);
            foreach ($thirdpartyLoanInfo as $row) {
                $data['thirdpartyloanReceivedId'] = $row->id;
                $data['thirdpartyId'] = $row->thirdparty_id;
                $data['thirdpartyRemarks'] = $row->thirdparty_remarks;
                $data['receivedDate'] = $row->received_date;
                $data['receivedAmount'] = $row->received_amount;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-received-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function thirdparty_loan_report($thirdpartyId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_status'] = 'thirdparty_loan';
            
            $data['loanList'] = $this->loanmodel->getThirdpartyList($thirdpartyId);
            $data['loanReceivedList'] = $this->loanmodel->getThirdpartyLoanReceivedList($thirdpartyId);

            $thirdpartyLoanData = $this->loanmodel->getThirdpartyLoanList($thirdpartyId);
            foreach ($thirdpartyLoanData as $row) {
                $data['thirdpartyId'] = $row->thirdparty_id;
                $data['thirdpartyName'] = $row->thirdparty_name;
                $data['thirdpartyRemarks'] = $row->thirdparty_remarks;
                $data['loanAmount'] = $row->overall_loan_amount;
                $data['receivedAmount'] = $row->overall_received_amount;
                $data['notreceivedAmount'] = $row->overall_notreceived_amount;
            }

            $this->load->view('settings/header_link', $data);
            $this->load->view('thirdparty-loan/thirdparty-loan-report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Thirdparty Loan Save Form
    public function thirdpartyLoanFormSave()
    {
        $loanId = $this->input->post('thirdparty_loan_id');
        $thirdpartyName = $this->input->post('thirdparty_name');
        $loanDate = $this->input->post('thirdparty_loan_date');
        $loanAmount = $this->input->post('thirdparty_loan_amount');
        $remarks = $this->input->post('remarks');

        $this->loanmodel->saveThirdpartyLoanData($loanId, $thirdpartyName, $loanDate, $loanAmount, $remarks);
        
        $data["isError"] = FALSE;
        if ($loanId > 0) {
            $data["message"] = "Thirdparty Loan Updated";
        } else {
            $data["message"] = "Thirdparty Loan Created";
        }

        echo json_encode($data);
        return;
    }

    //Thirdparty Loan Received Save Form
    public function thirdpartyLoanReceivedFormSave()
    {
        $loanReceivedId = $this->input->post('loan_received_id');
        $thirdpartyName = $this->input->post('thirdparty_name');
        $receivedDate = $this->input->post('received_date');
        $receivedAmount = $this->input->post('received_amount');

        $this->loanmodel->saveThirdpartyLoanReceivedData($loanReceivedId, $thirdpartyName, $receivedDate, $receivedAmount);
        
        $data["isError"] = FALSE;
        if ($loanReceivedId > 0) {
            $data["message"] = "Thirdparty Loan Received";
        } else {
            $data["message"] = "Thirdparty Loan Received";
        }

        echo json_encode($data);
        return;
    }
}
?>