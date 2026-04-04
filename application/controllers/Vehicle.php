<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

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
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle';
            $data['activeLink'] = $pageStatus;

            $data['vehicleList'] = $this->vehiclemodel->vehicleList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vehicle_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle';
            $data['activeLink'] = $pageStatus;

            $data['vehicleList'] = $this->vehiclemodel->vehicleList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vehicle_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle';
            
            $data['formTitle'] = "Add Vehicle";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vehicle_edit($vehicleId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle';

            $data['formTitle'] = "Edit Vehicle";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            
            $vehicleInfo = $this->vehiclemodel->getVehicleInfo($vehicleId);
            foreach ($vehicleInfo as $row) {
                $data['vehicleId'] = $row->id;
                $data['vehicleToken'] = $row->token;
                $data['zone'] = $row->zone;
                $data['branchId'] = $row->branch;
                $data['vehicleType'] = $row->vehicle_type;
                $data['fuelType'] = $row->fuel_type;
                $data['vehicleName'] = $row->vehicle_name;
                $data['ownerName'] = $row->owner_name;
                $data['vehicleNumber'] = $row->vehicle_number;
                $data['vehiclePhoto'] = $row->vehicle_photo;
                $data['vehicleRC'] = $row->vehicle_rc;
                $data['vehicleInsurance'] = $row->vehicle_insurance;
                $data['renewalDate'] = $row->renewal_date;
                $data['fcRenewalDate'] = $row->fc_renewal_date;
                $data['pucRenewalDate'] = $row->puc_renewal_date;
                $data['vehicleFC'] = $row->vehicle_fc_img;
                $data['vehiclePUC'] = $row->vehicle_puc_img;
                $data['status'] = $row->status;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
  
    public function vehicle_service($vehicleId = '')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle_service';
            
            $data['vehicleId'] = $vehicleId;
            $data['vehicleServiceList'] = $this->vehiclemodel->getVehicleServiceList($vehicleId);
            
            $vehicleData = $this->vehiclemodel->getVehicleInfo($vehicleId);
            foreach ($vehicleData as $row) {
                $data['vehicleSno'] = $row->sno;
                $data['vahicleZone'] = $row->zone;
                $data['branch'] = $row->branch;
                $data['branchName'] = $row->branch_name;
                $data['vehicleType'] = $row->vehicle_type;
                $data['fuelType'] = $row->fuel_type;
                $data['vehicleName'] = $row->vehicle_name;
                $data['ownerName'] = $row->owner_name;
                $data['vehicleNumber'] = $row->vehicle_number;
                $data['vehiclePhoto'] = $row->vehicle_photo;
                $data['vehicleRC'] = $row->vehicle_rc;
                $data['vehicleInsurance'] = $row->vehicle_insurance;
                $data['renewalDate'] = $row->renewal_dateFormat;
                $data['fcRenewalDate'] = $row->fc_renewal_dateFormat;
                $data['pucRenewalDate'] = $row->puc_renewal_dateFormat;
                $data['vehicleFC'] = $row->vehicle_fc_img;
                $data['vehiclePUC'] = $row->vehicle_puc_img;
                $data['status'] = $row->status;
                $data['method'] = $row->method;
                $data['createdBy'] = $row->employee_name;
                $data['createdAt'] = $row->created_at;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-view', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vehicle_service_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
        $data["menu_status"] = 'vehicle_service';
        
        $data['allVehicleServiceList'] = $this->vehiclemodel->getVehicleServiceList();
  
        $this->load->view('settings/header', $data);
        $this->load->view('vehicle/vehicle-service-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function vehicle_service_add($vehicleId = '')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle_service';

            $data['vehicleId'] = $vehicleId;
            $data['formTitle'] = "Add Vehicle Service";
            
            $data['vehicleDropdown'] = $this->mastermodel->getVehicleDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-service-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vehicle_service_edit($serviceId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data["menu_status"] = 'vehicle_service';
            
            $data['formTitle'] = "Edit Vehicle Service";
            $data['vehicleDropdown'] = $this->mastermodel->getVehicleDropdown();

            $vehicleServiceInfo = $this->vehiclemodel->getVehicleServiceInfo($serviceId);
            foreach ($vehicleServiceInfo as $row) {
                $data['serviceId'] = $row->id;
                $data['vehicleId'] = $row->vehicle_id;
                $data['serviceDate'] = $row->service_date;
                $data['nextServiceDate'] = $row->next_service_date;
                $data['serviceCategory'] = $row->service_category;
                $data['serviceKM'] = $row->service_km;
                $data['serviceCost'] = $row->service_cost;
                $data['serviceBill'] = $row->service_bill;
                $data['description'] = $row->description;
                $data['status'] = $row->status;
                $data['method'] = $row->method;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('vehicle/vehicle-service-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }
  
    public function getVehicleDetail()
    {
        $vehicleId = $this->input->post('vehicleId');
    
        $vehicleData = $this->vehiclemodel->getVehicleInfo($vehicleId);
        $vehicleLastServiceData = $this->vehiclemodel->getVehicleLastServiceInfo($vehicleId);
        
        foreach ($vehicleData as $row) {
            $data['vehicleSno'] = $row->sno;
            $data['vahicleZone'] = $row->zone;
            $data['branch'] = $row->branch;
            $data['branchName'] = $row->branch_name;
            $data['vehicleType'] = $row->vehicle_type;
            $data['fuelType'] = $row->fuel_type;
            $data['vehicleName'] = $row->vehicle_name;
            $data['ownerName'] = $row->owner_name;
            $data['vehicleNumber'] = $row->vehicle_number;
            $data['vehiclePhoto'] = $row->vehicle_photo;
            $data['vehicleRC'] = $row->vehicle_rc;
            $data['vehicleInsurance'] = $row->vehicle_insurance;
            $data['renewalDate'] = $row->renewal_dateFormat;
            $data['fcRenewalDate'] = $row->fc_renewal_dateFormat;
            $data['pucRenewalDate'] = $row->puc_renewal_dateFormat;
            $data['vehicleFC'] = $row->vehicle_fc_img;
            $data['vehiclePUC'] = $row->vehicle_puc_img;
            $data['status'] = $row->status;
            $data['createdBy'] = $row->employee_name;
            $data['createdAt'] = $row->created_at;
        }
        
        foreach ($vehicleLastServiceData as $row) {
            $data['serviceDate'] = $row->service_dateFormat;
            $data['endServiceDate'] = $row->next_service_dateFormat;
            $data['serviceCategory'] = $row->service_category;
            $data['serviceKilometer'] = $row->service_km;
            $data['serviceCost'] = $row->service_cost;
            $data['serviceBill'] = $row->service_bill;
            $data['serviceDesc'] = $row->description;
            $data['servicePayment'] = $row->status;
            $data['serviceStatus'] = $row->method;
        }
        echo json_encode($data);
    }
  
    public function getVehicleServiceDetail()
    {
        $serviceId = $this->input->post('serviceId');
    
        $serviceData = $this->vehiclemodel->getVehicleServiceInfo($serviceId);
        
        foreach ($serviceData as $row) {
            $data['vehicleZone'] = $row->zone;
            $data['vehicleBrach'] = $row->branch;
            $data['vehicleName'] = $row->vehicle_name;
            $data['vehicleNumber'] = $row->vehicle_number;
            $data['serviceDate'] = $row->service_dateFormat;
            $data['nextServiceDate'] = $row->next_service_dateFormat;
            $data['serviceCategory'] = $row->service_category;
            $data['serviceKM'] = $row->service_km;
            $data['serviceCost'] = $row->service_cost;
            $data['serviceBill'] = $row->service_bill;
            $data['description'] = $row->description;
            $data['status'] = $row->status;
            $data['method'] = $row->method;
            $data['createdBy'] = $row->employee_name;
            $data['createdAt'] = $row->created_at;
        }
        echo json_encode($data);
    }

    //Vehicle Save Form //
    public function vehicleFormSave()
    {
        $vehicleId = $this->input->post('vehicle_id');
        $token = $this->input->post('token');
        $zone = $this->input->post('zone');
        $branch = $this->input->post('branch');
        $vehicleType = $this->input->post('vehicle_type');
        $fuelType = $this->input->post('fuel_type');
        $vehicleName = $this->input->post('vehicle_name');
        $vehicleNumber = $this->input->post('vehicle_number');
        $ownerName = $this->input->post('owner_name');
        $vehiclePhoto = $this->input->post('vehicle_photo');
        $vehicleRC = $this->input->post('vehicle_rc');
        $vehicleInsurance = $this->input->post('vehicle_insurance');
        $renewalDate = $this->input->post('renewal_date');
        $fcRenewalDate = $this->input->post('fc_renewal_date');
        $pucRenewalDate = $this->input->post('puc_renewal_date');
        $vehicleFc = $this->input->post('vehicle_fc');
        $vehiclePuc = $this->input->post('vehicle_puc');
        $status = $this->input->post('status');

        $alterVehiclePhoto = $this->input->post('alter_vehicle_photo');
        $alterVehicleRC = $this->input->post('alter_vehicle_rc');
        $alterVehicleInsurance = $this->input->post('alter_vehicle_insurance');
        $alterVehicleFc = $this->input->post('alter_vehicle_fc');
        $alterVehiclePuc = $this->input->post('alter_vehicle_puc');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
        $photoUploadDir = './uploads/vehicle_photo/';
        $rcUploadDir = './uploads/vehicle_rc/';
        $insuranceUploadDir = './uploads/vehicle_insurance/';
        $fcUploadDir = './uploads/vehicle_fc/';
        $pucUploadDir = './uploads/vehicle_puc/';

        // Vehicle Photo
        if (isset($_FILES['vehicle_photo'])) {
            $filesArray = $_FILES['vehicle_photo'];
            $uploadedFiles['vehicle_photo'] = $this->common->fileUpload($filesArray, $photoUploadDir, $allowTypes);
        }

        // Vehicle RC Book
        if (isset($_FILES['vehicle_rc'])) {
            $filesArray = $_FILES['vehicle_rc'];
            $uploadedFiles['vehicle_rc'] = $this->common->fileUpload($filesArray, $rcUploadDir, $allowTypes);
        }

        // Vehicle Insurance
        if (isset($_FILES['vehicle_insurance'])) {
            $filesArray = $_FILES['vehicle_insurance'];
            $uploadedFiles['vehicle_insurance'] = $this->common->fileUpload($filesArray, $insuranceUploadDir, $allowTypes);
        }

        // Vehicle FC
        if (isset($_FILES['vehicle_fc'])) {
            $filesArray = $_FILES['vehicle_fc'];
            $uploadedFiles['vehicle_fc'] = $this->common->fileUpload($filesArray, $fcUploadDir, $allowTypes);
        }

        // Vehicle PUC
        if (isset($_FILES['vehicle_puc'])) {
            $filesArray = $_FILES['vehicle_puc'];
            $uploadedFiles['vehicle_puc'] = $this->common->fileUpload($filesArray, $pucUploadDir, $allowTypes);
        }
        
        $vehiclePhoto_img = $uploadedFiles['vehicle_photo'][0];
        $vehicleRC_img = $uploadedFiles['vehicle_rc'][0];
        $vehicleInsurance_img = $uploadedFiles['vehicle_insurance'][0];
        $vehicleFc_img = $uploadedFiles['vehicle_fc'][0];
        $vehiclePuc_img = $uploadedFiles['vehicle_puc'][0];
        
        if ($_FILES["vehicle_photo"]["name"] == FALSE) {
            $vehiclePhoto_img = $alterVehiclePhoto;
        }
        if ($_FILES["vehicle_rc"]["name"] == FALSE) {
            $vehicleRC_img = $alterVehicleRC;
        }
        if ($_FILES["vehicle_insurance"]["name"] == FALSE) {
            $vehicleInsurance_img = $alterVehicleInsurance;
        }
        if ($_FILES["vehicle_fc"]["name"] == FALSE) {
            $vehicleFc_img = $alterVehicleFc;
        }
        if ($_FILES["vehicle_puc"]["name"] == FALSE) {
            $vehiclePuc_img = $alterVehiclePuc;
        }

        if ($vehicleId < 0 || $vehicleId == '') {
            $checkExists = $this->vehiclemodel->checkVehicle($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Vehicle Number Already Exists";
                echo json_encode($data);
                return;
            }
        }
        
        $this->vehiclemodel-> saveVehicleData($vehicleId, $token, $zone, $branch, $vehicleType, $fuelType, $vehicleName, $vehicleNumber, $ownerName, $vehiclePhoto_img, $vehicleRC_img, $vehicleInsurance_img, $fcRenewalDate, $pucRenewalDate, $vehicleFc_img, $vehiclePuc_img, $renewalDate, $status);
        
        $data["isError"] = FALSE;
        if ($vehicleId > 0) {
            $data["message"] = "Vehicle Updated";
        } else {
            $data["message"] = "Vehicle Created";
        }

        echo json_encode($data);
        return;
    }

    //Vehicle Service Save Form //
    public function vehicleServiceFormSave()
    {
        $vehicleId = $this->input->post('vehicle_id');
        $serviceId = $this->input->post('service_id');
        $serviceDate = $this->input->post('service_date');
        $nextServiceDate = $this->input->post('next_service_date');
        $serviceCategory = $this->input->post('service_category');
        $serviceKM = $this->input->post('service_km');
        $serviceCost = $this->input->post('service_cost');
        $serviceBill = $this->input->post('service_bill');
        $description = $this->input->post('description');
        $status = $this->input->post('status');
        $method = $this->input->post('method');

        $alterServiceBill = $this->input->post('alter_service_bill');
        
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
        $billUploadDir = './uploads/service_bill/';

        // Service Bill Photo
        if (isset($_FILES['service_bill'])) {
            $filesArray = $_FILES['service_bill'];
            $uploadedFiles['service_bill'] = $this->common->fileUpload($filesArray, $billUploadDir, $allowTypes);
        }
        
        $serviceBill_img = $uploadedFiles['service_bill'][0];
        
        if ($_FILES["service_bill"]["name"] == FALSE) {
            $serviceBill_img = $alterServiceBill;
        }

        $this->vehiclemodel->saveVehicleServiceData($vehicleId, $serviceId, $serviceDate, $nextServiceDate, $serviceCategory, $serviceKM, $serviceCost, $description, $serviceBill_img, $status, $method);
        
        $data["isError"] = FALSE;
        if ($serviceId > 0) {
            $data["message"] = "Service Bill Updated";
        } else {
            $data["message"] = "Service Bill Created";
        }

        echo json_encode($data);
        return;
    }
  
    public function fuel_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
        $data["menu_status"] = 'vehicle_fuel';
        
        $data['vehicleFuelList'] = $this->vehiclemodel->getVehicleFuelList();
  
        $this->load->view('settings/header', $data);
        $this->load->view('vehicle_fuel/fuel_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function fuel_view($vehicleId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
        $data["menu_status"] = 'vehicle_fuel';
  
        $data['fuelList'] = $this->vehiclemodel->getFuelList($vehicleId);
        $vehicleFuelInfo = $this->vehiclemodel->getVehicleFuelInfo($vehicleId);
        foreach ($vehicleFuelInfo as $row) {
          $data['vehicleId'] = $row->id;
          $data['vehicleName'] = $row->vehicle_name;
          $data['vehicleNumber'] = $row->vehicle_number;
          $data['vehicleFuelType'] = $row->fuel_type;
          $data['overallFuelAmount'] = $row->overall_amount;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('vehicle_fuel/fuel_view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function fuel_add($vehicleId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
        $data["menu_status"] = 'vehicle_fuel';
  
        $data['formTitle'] = "Add Vehicle Fuel";
        
        $data['vehicleDropdown'] = $this->mastermodel->getVehicleDropdown();
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $vehicleFuelInfo = $this->vehiclemodel->getVehicleFuelInfo($vehicleId);
        foreach ($vehicleFuelInfo as $row) {
          $data['vehicleId'] = $row->id;
          $data['fuelType'] = $row->fuel_type;
        }
  
        $this->load->view('settings/header', $data);
        $this->load->view('vehicle_fuel/fuel_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function fuel_edit($vehicleFuelId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
        $data["menu_status"] = 'vehicle_fuel';
  
        $data['formTitle'] = "Edit Vehicle Fuel";
        $data['vehicleDropdown'] = $this->mastermodel->getVehicleDropdown();
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

        $vehicleFuelDetail = $this->vehiclemodel->getVehicleFuelDetail($vehicleFuelId);
        foreach ($vehicleFuelDetail as $row) {
          $data['vehicleFuelId'] = $row->id;
          $data['vehicleId'] = $row->vehicle_id;
          $data['branchId'] = $row->branch;
          $data['employeeId'] = $row->driver_name;
          $data['fuelType'] = $row->fuel_type;
          $data['fuelDate'] = $row->filling_date;
          $data['vehicleKM'] = $row->vehicle_km;
          $data['literQty'] = $row->liter_qty;
          $data['amountPerLiter'] = $row->amount_per_liter;
          $data['fuelAmount'] = $row->amount;
          $data['fuelRemarks'] = $row->remarks;
        }
  
        $this->load->view('settings/header', $data);
        $this->load->view('vehicle_fuel/fuel_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function getVehicleData()
    {
        $vehicleName 	= $this->input->post('vehicleName');
        $data 	= $this->vehiclemodel->getVehicleInfo($vehicleName);
        echo json_encode($data); 
    }

    //Vehicle Fuel Save Form //
    public function vehicleFuelFormSave()
    {
        $fuelId = $this->input->post('fuel_id');
        $fuelDate = $this->input->post('fuel_date');
        $branch = $this->input->post('branch');
        $driverName = $this->input->post('driver_name');
        $vehicleName = $this->input->post('vehicle_name');
        $vehicleKM = $this->input->post('vehicle_km');
        $fuelAmount = $this->input->post('fuel_amount');
        $literQty = $this->input->post('liter_qty');
        $amountPerLiter = $this->input->post('amount_per_liter');

        $this->vehiclemodel->saveVehicleFuelFormData($fuelId, $fuelDate, $branch, $driverName, $vehicleName, $vehicleKM, $fuelAmount, $literQty, $amountPerLiter);
        
        $data["isError"] = FALSE;
        if ($fuelId > 0) {
            $data["message"] = "Vehicle Fuel Updated";
        } else {
            $data["message"] = "Vehicle Fuel Created";
        }

        echo json_encode($data);
        return;
    }
}