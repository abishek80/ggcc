<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        if (($this->session->userdata('userid') != null) && ($this->session->userdata('userid') != "")) {
            redirect(base_url() . 'admin');
        }
    }

    public function index()
    {
        $this->load->view('settings/login');
    }

    public function admin_complaint()
    {
        $this->load->view('settings/complaint');
    }

    public function checkLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username != "" && $password != "") {
            $result     = $this->loginmodel->checkLogin($username, $password);
            $rowCount   = $result["rowCount"];
            $status     = $result["status"];
            $login_id   = $result["login_id"];

            if ($rowCount == 1 && $status == 'active') { // Check if login_id is not null
                $data["isError"] = FALSE;
                $data["message"] = "You Are Logged In Successfully.";
            } else {
                if ($status == 'inactive') {
                    $data["isError"] = TRUE;
                    $data["message"] = "Your Account Has Been Suspended By Admin. Please Contact Admin.";
                } else {
                    $data["isError"] = TRUE;
                    $data["message"] = "Login Code, Mobile No Or Password Is Not Matched.";
                }
            }
        } else {
            $data["isError"] = TRUE;
            $data["message"] = "Please Fill All Details.";
        }

        echo json_encode($data);
    }

    public function selectBranchDropdown()
    {
        $zone 	= $this->input->post('zone');
        $data 	= $this->loginmodel->branchDropdownList($zone);
        echo json_encode($data); 
    }

    public function selectOutletDropdown()
    {
        $zone 	    = $this->input->post('zone');
        $branch 	= $this->input->post('branch');
        $data 	    = $this->loginmodel->outletDropdownList($zone, $branch);
        echo json_encode($data); 
    }

    public function selectEmployeeInchargeDropdown()
    {
        $zone 	    = $this->input->post('zone');
        $branch 	= $this->input->post('branch');
        $data 	    = $this->loginmodel->getEmployeeInchargeDropdown($zone, $branch);
        echo json_encode($data); 
    }

    public function getDropdownOutletInfo()
    {
        $outletName 	= $this->input->post('outletName');
        $data 	        = $this->loginmodel->getDropdownOutletInfo($outletName);
        echo json_encode($data); 
    }

    //Complaint Save Form
    public function complaintFormSave()
    {
      $complaintId          = $this->input->post('complaint_id');
      $outletId             = $this->input->post('outlet_id');
      $token                = $this->input->post('token');
      $date                 = $this->input->post('date');
      $zone                 = $this->input->post('zone');
      $branch               = $this->input->post('branch');
      $complainterName      = $this->input->post('complainter_name');
      $complainterNumber    = $this->input->post('complainter_number');
      $workType             = $this->input->post('work_type');
      $assignTo             = $this->input->post('assign_to');
      $outletName           = $this->input->post('outlet_name');
      $outletLocation       = $this->input->post('outlet_location');
      $contactName          = $this->input->post('contact_name');
      $contactNumber        = $this->input->post('contact_number');
      $oldOutletName        = $this->input->post('old_outlet_name');
      $oldOutletLocation    = $this->input->post('old_outlet_location');
      $oldContactName       = $this->input->post('old_contact_name');
      $oldContactNumber     = $this->input->post('old_contact_number');
      $description          = $this->input->post('description');
      $alreadyExists        = ($this->input->post('already_exists') == 'on') ? 1 : 0;

      if ($alreadyExists == 1) {
        if ($outletId < 0 || $outletId == '') {
          $checkExists = $this->loginmodel->checkOutlet($token, $branch);
          if ($checkExists > 0) {
            $data["isError"] = TRUE;
            $data["message"] = "Outlet Name Already Exists";
            echo json_encode($data);
            return;
          }
        }
      }
      
      $this->loginmodel->saveComplaintData($date, $complaintId, $outletId, $token, $zone, $branch, $complainterName, $complainterNumber, $workType, $assignTo, $outletName, $outletLocation, $contactName, $contactNumber, $oldOutletName, $oldOutletLocation, $oldContactName, $oldContactNumber, $description, $alreadyExists);
      
      $data["isError"] = FALSE;
      if ($complaintId > 0) {
        $data["message"] = "Complaint Updated";
      } else {
        $data["message"] = "Complaint Created";
      }

      echo json_encode($data);
      return;
    }
}
?>