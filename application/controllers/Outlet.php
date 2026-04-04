<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller {

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
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'outlet';
            $data['activeLink'] = $pageStatus;

            $data['outletList'] = $this->outletmodel->outletList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('outlet/outlet-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function outlet_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'outlet';
            $data['activeLink'] = $pageStatus;

            $data['outletList'] = $this->outletmodel->outletList($pageStatus);
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('outlet/outlet-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function outlet_list_json($pageStatus = '')
    {
        $postData = $this->input->post();
        $data = $this->outletmodel->get_outlets_server_side($postData, $pageStatus);
        echo json_encode($data);
    }

    public function outlet_report($pageStatus='', $branch_id='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'outlet';
            $data['activeLink'] = $pageStatus;

            $data['branchId'] = $branch_id;
            $data['outletReportList'] = $this->outletmodel->outletReportList($pageStatus, $branch_id);
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('outlet/outlet-report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function outlet_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'outlet';

            $data['formTitle'] = "Add Outlet";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('outlet/outlet-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function outlet_edit($outletId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'outlet';

            $data['formTitle'] = "Edit Outlet";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

            $outletInfo = $this->outletmodel->getOutletInfo($outletId);
            foreach ($outletInfo as $row) {
                $data['outletId'] = $row->id;
                $data['outletToken'] = $row->token;
                $data['zone'] = $row->zone;
                $data['branchId'] = $row->branch;
                $data['outletType'] = $row->outlet_type;
                $data['customerId'] = $row->customer_id;
                $data['outletName'] = $row->outlet_name;
                $data['outletLocation'] = $row->outlet_location;
                $data['contactName'] = $row->contact_name;
                $data['contactNumber'] = $row->contact_number;
                $data['earthingChamber'] = $row->earthing_chamber;
                $data['checkingDate'] = $row->checking_date;
                $data['renewalDate'] = $row->renewal_date;
                $data['yardPole'] = $row->yard_pole;
                $data['canopyLight'] = $row->canopy_light;
                $data['cvt'] = $row->cvt;
                $data['stabilizer'] = $row->stabilizer;
                $data['pump'] = $row->pump;
                $data['stp'] = $row->stp;
                $data['status'] = $row->status;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('outlet/outlet-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function selectOutletDropdown()
    {
        $zone 	= $this->input->post('zone');
        $branch 	= $this->input->post('branch');
        $data 	= $this->outletmodel->outletDropdownList($zone, $branch);
        echo json_encode($data); 
    }

    public function getDropdownOutletInfo()
    {
        $outletName 	= $this->input->post('outletName');
        $data 	= $this->outletmodel->getDropdownOutletInfo($outletName);
        echo json_encode($data); 
    }
    
    public function getOutletDetail()
    {
        $outletId = $this->input->post('outletId');
    
        $outletData = $this->outletmodel->getOutletInfo($outletId);
        foreach ($outletData as $row) {
            $data['outletSno'] = $row->sno;
            $data['zone'] = $row->zone;
            $data['branch'] = $row->branch;
            $data['outletType'] = $row->outlet_type;
            $data['customerId'] = $row->customer_id;
            $data['branchName'] = $row->branch_name;
            $data['outletName'] = $row->outlet_name;
            $data['outletLocation'] = $row->outlet_location;
            $data['contactName'] = $row->contact_name;
            $data['contactNumber'] = $row->contact_number;
            $data['earthingChamber'] = $row->earthing_chamber;
            $data['checkingDate'] = $row->checking_dateFormat;
            $data['renewalDate'] = $row->renewal_dateFormat;
            $data['yardPole'] = $row->yard_pole;
            $data['canopyLight'] = $row->canopy_light;
            $data['cvt'] = $row->cvt;
            $data['stabilizer'] = $row->stabilizer;
            $data['pump'] = $row->pump;
            $data['stp'] = $row->stp;
            $data['status'] = $row->status;
            $data['createdBy'] = $row->employee_name;
            $data['createdAt'] = $row->created_at;
        }
        echo json_encode($data);
    }

    //Outlet Save Form //
    public function outletFormSave()
    {
        $outletId = $this->input->post('outlet_id');
        $token = $this->input->post('token');
        $zone = $this->input->post('zone');
        $branch = $this->input->post('branch');
        $outletType = $this->input->post('outlet_type');
        $customerId = $this->input->post('customer_id');
        $outletName = $this->input->post('outlet_name');
        $outletLocation = $this->input->post('outlet_location');
        $contactName = $this->input->post('contact_name');
        $contactNumber = $this->input->post('contact_number');
        $earthingChamber = $this->input->post('earthing_chamber');
        $checkingDate = $this->input->post('checking_date');
        $renewalDate = $this->input->post('renewal_date');
        $cvt = $this->input->post('cvt');
        $stabilizer = $this->input->post('stabilizer');
        $yardPole = $this->input->post('yard_pole');
        $stp = $this->input->post('stp');
        $canopyLight = $this->input->post('canopy_light');
        $pump = $this->input->post('pump');
        $status = $this->input->post('status');

        if ($outletId < 0 || $outletId == '') {
            $checkExists = $this->outletmodel->checkOutlet($token, $branch);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Outlet Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->outletmodel->saveOutletData($outletId, $token, $zone, $branch, $outletType, $customerId, $outletName, $outletLocation, $contactName, $contactNumber, $earthingChamber, $checkingDate, $renewalDate, $cvt, $stabilizer, $yardPole, $stp, $canopyLight, $pump, $status);
        
        $data["isError"] = FALSE;
        if ($outletId > 0) {
            $data["message"] = "Outlet Updated";
        } else {
            $data["message"] = "Outlet Created";
        }

        echo json_encode($data);
        return;
    }

    public function branch_project_list()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'branch_project';

            $data['allBranchProjectList'] = $this->outletmodel->getAllBranchProjectList();

            $this->load->view('settings/header', $data);
            $this->load->view('branch_project/branch-project-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function branch_project_add($projectCategory = '', $branchId = '', $projectTypeId = '')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'branch_project';

            $data['formTitle'] = "Add Branch Project";
            $data['projectCategory'] = $projectCategory;
            $data['projectTypeId'] = $projectTypeId;
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
            $data['projectTypeDropdown'] = $this->mastermodel->getProjectTypeDropdown();

            if($branchId) {
                $branchInfo = $this->mastermodel->getBranchInfo($branchId);
                foreach ($branchInfo as $row) {
                    $data['branchId'] = $row->id;
                    $data['zone'] = $row->zone;
                }
            }

            $this->load->view('settings/header', $data);
            $this->load->view('branch_project/branch-project-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function branch_project_edit($branchProjectId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'branch_project';

            $data['formTitle'] = "Edit Branch Project";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();
            $data['projectTypeDropdown'] = $this->mastermodel->getProjectTypeDropdown();

            $branchProjectInfo = $this->outletmodel->getBranchProjectInfo($branchProjectId);
            foreach ($branchProjectInfo as $row) {
                $data['branchProjectId'] = $row->id;
                $data['zone'] = $row->zone;
                $data['branchId'] = $row->branch_id;
                $data['projectCategory'] = $row->project_category;
                $data['projectTypeId'] = $row->project_type;
                $data['projectDate'] = $row->date;
                $data['completedDate'] = $row->completed_date;
                $data['outletName'] = $row->outlet_name;
                $data['outletLocation'] = $row->outlet_location;
                $data['employeeId'] = $row->employee_id;
                $data['projectStatus'] = $row->project_status;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('branch_project/branch-project-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function branch_project_view($projectCategory, $branchId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'branch_project';

            $data['projectCategoryList'] = $this->outletmodel->getProjectCategoryList($projectCategory, $branchId);
            $data['projectCategory'] = $projectCategory;
            
            $branchInfo = $this->mastermodel->getBranchInfo($branchId);
            foreach ($branchInfo as $row) {
                $data['branchId'] = $row->id;
                $data['branchName'] = $row->branch;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('branch_project/branch-project-view', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function branch_project_detail($projectCategory, $branchId, $projectType)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_status"] = 'branch_project';

            $data['branchProjectList'] = $this->outletmodel->getBranchProjectList($projectCategory, $branchId, $projectType);
            $data['projectCategory'] = $projectCategory;
            $data['projectTypeId'] = $projectType;
            
            $projectTypeInfo = $this->mastermodel->getProjectTypeInfo($projectType);
            foreach ($projectTypeInfo as $row) {
                $data['projectTypeId'] = $row->id;
                $data['projectType'] = $row->project_type;
            }
            
            $branchInfo = $this->mastermodel->getBranchInfo($branchId);
            foreach ($branchInfo as $row) {
                $data['branchId'] = $row->id;
                $data['branchName'] = $row->branch;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('branch_project/branch-project-detail', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Branch Project Save Form //
    public function branchProjectFormSave()
    {
        $branchProjectId = $this->input->post('branch_project_id');
        $branchId = $this->input->post('branch');
        $projectCategory = $this->input->post('project_category');
        $projectType = $this->input->post('project_type');
        $projectDate = $this->input->post('project_date');
        $outletName = $this->input->post('outlet_name');
        $outletLocation = $this->input->post('outlet_location');
        $employeeName = $this->input->post('employee_name');
        $projectStatus = $this->input->post('project_status');
        $completedDate = $this->input->post('completed_date');

        $this->outletmodel->saveBranchProjectData($branchProjectId, $branchId, $projectCategory, $projectType, $projectDate, $outletName, $outletLocation, $employeeName, $projectStatus, $completedDate);

        $data["isError"] = FALSE;
        if ($branchProjectId > 0) {
            $data["message"] = "Branch Project Updated";
        } else {
            $data["message"] = "Branch Project Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function getBranchProjectDetail()
    {
        $branchProjectId = $this->input->post('branchProjectId');

        $branchProjectInfo = $this->outletmodel->getBranchProjectInfo($branchProjectId);
        foreach ($branchProjectInfo as $row) {
            $data['branchProjectId'] = $row->id;
            $data['zone'] = $row->zone;
            $data['branch'] = $row->branch;
            $data['projectCategory'] = $row->project_category;
            $data['projectType'] = $row->project_type_name;
            $data['projectDate'] = $row->date;
            $data['outletName'] = $row->outlet_name;
            $data['outletLocation'] = $row->outlet_location;
            $data['employeeName'] = $row->employee_name;
            $data['employeeDesignation'] = $row->employee_designation;
            $data['projectStatus'] = $row->project_status;
            $data['projectDate'] = $row->project_dateFormat;
            $data['completedDate'] = $row->completed_dateFormat;
        }
        echo json_encode($data);
    }
    
    //Branch Project Completed Save Form
    public function branchProjectCompletedFormSave()
    {
        $branchProjectId = $this->input->post('branchProjectId');
        $completedDate = $this->input->post('completedDate');
    
        $this->outletmodel->saveBranchProjectCompletedForm($branchProjectId, $completedDate);
        
        $data["isError"] = FALSE;
        if ($branchProjectId > 0) {
            $data["message"] = "Project Completed";
        } else {
            $data["message"] = "Project Completed";
        }
    
        echo json_encode($data);
        return;
    }
}