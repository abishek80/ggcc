<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
    
    public function selectBranchDropdown()
    {
        $zone 	= $this->input->post('zone');
        $data 	= $this->mastermodel->branchDropdownList($zone);
        echo json_encode($data); 
    }

    public function selectEmployeeInchargeDropdown()
    {
        $zone 	    = $this->input->post('zone');
        $branch     = $this->input->post('branch');
        $data 	    = $this->mastermodel->getEmployeeInchargeDropdown($zone, $branch);
        echo json_encode($data); 
    }
    
    public function pettycash_title_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'pettycash_title';
            $data['activeLink'] = $pageStatus;

            $data['pettycashTitleList'] = $this->mastermodel->pettycashTitleList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/pettycash_title/pettycash-title-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function pettycash_title_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'pettycash_title';

            $data['formTitle'] = "Add Pettycash Title";

            $this->load->view('settings/header', $data);
            $this->load->view('master/pettycash_title/pettycash-title-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function pettycash_title_edit($pettycashTitleId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'pettycash_title';
            
            $data['formTitle'] = "Edit Pettycash Title";

            $pettycashTitleInfo = $this->mastermodel->getPettycashTitleInfo($pettycashTitleId);
            foreach ($pettycashTitleInfo as $row) {
                $data['pettycashTitleId'] = $row->id;
                $data['pettycashTitleToken'] = $row->token;
                $data['pettycashTitle'] = $row->title;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/pettycash_title/pettycash-title-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Pettycash Title Save Form //
    public function pettycashTitleFormSave()
    {
        $pettycashTitleId = $this->input->post('pettycash_title_id');
        $token = $this->input->post('token');
        $pettycashTitle = $this->input->post('pettycash_title');
        $status = $this->input->post('status');

        if ($pettycashTitleId < 0 || $pettycashTitleId == '') {
            $checkExists = $this->mastermodel->checkPettycashTitle($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Pettycash Title Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->savePettycashTitleData($pettycashTitleId, $token, $pettycashTitle, $status);
        
        $data["isError"] = FALSE;
        if ($pettycashTitleId > 0) {
            $data["message"] = "Pettycash Title Updated";
        } else {
            $data["message"] = "Pettycash Title Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function thirdparty_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'thirdparty';
            $data['activeLink'] = $pageStatus;

            $data['thirdpartyList'] = $this->mastermodel->thirdpartyList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/thirdparty/thirdparty-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function thirdparty_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'thirdparty';

            $data['formTitle'] = "Add Thirdparty Name";

            $this->load->view('settings/header', $data);
            $this->load->view('master/thirdparty/thirdparty-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function getThirdpartyInfo()
    {
        $thirdpartyName 	= $this->input->post('thirdpartyName');
        $data 	= $this->mastermodel->getThirdpartyDetail($thirdpartyName);
        echo json_encode($data); 
    }

    public function thirdparty_edit($thirdpartyId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'thirdparty';
            
            $data['formTitle'] = "Edit Thirdparty Name";

            $thirdpartyInfo = $this->mastermodel->getThirdpartyInfo($thirdpartyId);
            foreach ($thirdpartyInfo as $row) {
                $data['thirdpartyId'] = $row->id;
                $data['thirdpartyToken'] = $row->token;
                $data['thirdpartyName'] = $row->thirdparty_name;
                $data['thirdpartyRemarks'] = $row->remarks;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/thirdparty/thirdparty-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Thirdparty Save Form //
    public function thirdpartyFormSave()
    {
        $thirdpartyId = $this->input->post('thirdparty_id');
        $token = $this->input->post('token');
        $thirdpartyName = $this->input->post('thirdparty_name');
        $thirdpartyRemarks = $this->input->post('thirdparty_remarks');
        $status = $this->input->post('status');

        if ($thirdpartyId < 0 || $thirdpartyId == '') {
            $checkExists = $this->mastermodel->checkThirdparty($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Thirdparty Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveThirdpartyData($thirdpartyId, $token, $thirdpartyName, $thirdpartyRemarks, $status);
        
        $data["isError"] = FALSE;
        if ($thirdpartyId > 0) {
            $data["message"] = "Thirdparty Updated";
        } else {
            $data["message"] = "Thirdparty Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function material_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'material';
            $data['activeLink'] = $pageStatus;

            $data['materialList'] = $this->mastermodel->materialList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/stock_material/stock-material-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function material_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'material';

            $data['formTitle'] = "Add Stock Material";

            $this->load->view('settings/header', $data);
            $this->load->view('master/stock_material/stock-material-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function material_edit($materialId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'material';
            
            $data['formTitle'] = "Edit Stock Material";

            $materialInfo = $this->mastermodel->getMaterialInfo($materialId);
            foreach ($materialInfo as $row) {
                $data['materialId'] = $row->id;
                $data['materialToken'] = $row->token;
                $data['materialCode'] = $row->material_code;
                $data['materialName'] = $row->material_name;
                $data['materialCategory'] = $row->category;
                $data['materialType'] = $row->type;
                $data['entryType'] = $row->entry_type;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/stock_material/stock-material-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Material Save Form //
    public function materialFormSave()
    {
        $materialId = $this->input->post('material_id');
        $token = $this->input->post('token');
        $materialCode = $this->input->post('material_code');
        $materialName = $this->input->post('material_name');
        $materialCategory = $this->input->post('material_category');
        $materialType = $this->input->post('material_type');
        $entryType = $this->input->post('entry_type');
        $status = $this->input->post('status');

        if ($materialId < 0 || $materialId == '') {
            $checkExists = $this->mastermodel->checkMaterial($token, $materialCategory, $materialType, $entryType);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Material Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveMaterialData($materialId, $token, $materialCode, $materialName, $materialCategory, $materialType, $entryType, $status);
        
        $data["isError"] = FALSE;
        if ($materialId > 0) {
            $data["message"] = "Material Updated";
        } else {
            $data["message"] = "Material Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function assets_tools_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'assets_tools';
            $data['activeLink'] = $pageStatus;

            $data['assetsToolsList'] = $this->mastermodel->assetsToolsList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/assets_tools/assets-tools-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function assets_tools_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'assets_tools';

            $data['formTitle'] = "Add Assets & Tools";

            $this->load->view('settings/header', $data);
            $this->load->view('master/assets_tools/assets-tools-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function assets_tools_edit($assetsId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'assets_tools';
            
            $data['formTitle'] = "Edit Assets & Tools";

            $assetsToolsInfo = $this->mastermodel->getAssetsToolsInfo($assetsId);
            foreach ($assetsToolsInfo as $row) {
                $data['assetsToolsId'] = $row->id;
                $data['assetsToolsToken'] = $row->token;
                $data['assetsToolsName'] = $row->name;
                $data['assetsToolsType'] = $row->type;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/assets_tools/assets-tools-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Assets & Tools Save Form //
    public function assetsToolsFormSave()
    {
        $assetsToolsId = $this->input->post('assets_tools_id');
        $token = $this->input->post('token');
        $assetsToolsName = $this->input->post('assets_tools_name');
        $assetsToolsType = $this->input->post('assets_tools_type');
        $status = $this->input->post('status');

        if ($assetsToolsId < 0 || $assetsToolsId == '') {
            $checkExists = $this->mastermodel->checkAssetsTools($token, $assetsToolsType);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Assets & Tools Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveAssetsToolsData($assetsToolsId, $token, $assetsToolsName, $assetsToolsType, $status);
        
        $data["isError"] = FALSE;
        if ($assetsToolsId > 0) {
            $data["message"] = "Assets & Tools Updated";
        } else {
            $data["message"] = "Assets & Tools Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function party_name_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'party_name';
            $data['activeLink'] = $pageStatus;

            $data['partyNameList'] = $this->mastermodel->partyNameList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/party_name/party-name-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function party_name_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'party_name';

            $data['formTitle'] = "Add Party Name";

            $this->load->view('settings/header', $data);
            $this->load->view('master/party_name/party-name-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function party_name_edit($partyNameId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'party_name';

            $data['formTitle'] = "Edit Party Name";

            $partyNameInfo = $this->mastermodel->getPartyNameInfo($partyNameId);
            foreach ($partyNameInfo as $row) {
                $data['partyNameId'] = $row->id;
                $data['partyNameToken'] = $row->token;
                $data['companyName'] = $row->company_name;
                $data['partyName'] = $row->party_name;
                $data['email'] = $row->email;
                $data['mobileNumber'] = $row->mobile_number;
                $data['msmeValue'] = $row->msme;
                $data['msmeNumber'] = $row->msme_number;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/party_name/party-name-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Party Name Save Form //
    public function partyNameFormSave()
    {
        $partyNameId = $this->input->post('party_name_id');
        $token = $this->input->post('token');
        $companyName = $this->input->post('company_name');
        $partyName = $this->input->post('party_name');
        $email = $this->input->post('email');
        $mobileNumber = $this->input->post('mobile_number');
        $msme = $this->input->post('msme');
        $msmeNumber = $this->input->post('msme_number');
        $status = $this->input->post('status');

        if ($partyNameId < 0 || $partyNameId == '') {
            $checkExists = $this->mastermodel->checkPartyName($companyName, $token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Party Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->savePartyNameData($partyNameId, $token, $companyName, $partyName, $email, $mobileNumber, $msme, $msmeNumber, $status);
        
        $data["isError"] = FALSE;
        if ($partyNameId > 0) {
            $data["message"] = "Party Name Updated";
        } else {
            $data["message"] = "Party Name Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function vendor_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'vendor';
            $data['activeLink'] = $pageStatus;

            $data['vendorList'] = $this->mastermodel->vendorList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/vendor/vendor-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vendor_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'vendor';

            $data['formTitle'] = "Add Vendor";

            $this->load->view('settings/header', $data);
            $this->load->view('master/vendor/vendor-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function vendor_edit($vendorId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'vendor';
            
            $data['formTitle'] = "Edit Vendor";

            $vendorInfo = $this->mastermodel->getVendorInfo($vendorId);
            foreach ($vendorInfo as $row) {
                $data['vendorId'] = $row->id;
                $data['vendorToken'] = $row->token;
                $data['vendorName'] = $row->vendor_name;
                $data['vendorCode'] = $row->vendor_code;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/vendor/vendor-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Vendor Save Form //
    public function vendorFormSave()
    {
        $vendorId = $this->input->post('vendor_id');
        $token = $this->input->post('token');
        $vendorName = $this->input->post('vendor_name');
        $vendorCode = $this->input->post('vendor_code');
        $status = $this->input->post('status');

        if ($vendorId < 0 || $vendorId == '') {
            $checkExists = $this->mastermodel->checkVendor($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Vendor Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveVendorData($vendorId, $token, $vendorName, $vendorCode, $status);
        
        $data["isError"] = FALSE;
        if ($vendorId > 0) {
            $data["message"] = "Vendor Updated";
        } else {
            $data["message"] = "Vendor Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function pan_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'pan';
            $data['activeLink'] = $pageStatus;

            $data['panList'] = $this->mastermodel->panList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/pan/pan-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function pan_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'pan';

            $data['formTitle'] = "Add PAN Number";

            $this->load->view('settings/header', $data);
            $this->load->view('master/pan/pan-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function pan_edit($panId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'pan';
            
            $data['formTitle'] = "Edit PAN Number";

            $panInfo = $this->mastermodel->getPANInfo($panId);
            foreach ($panInfo as $row) {
                $data['panId'] = $row->id;
                $data['panToken'] = $row->token;
                $data['panNumber'] = $row->pan_number;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/pan/pan-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //PAN Save Form //
    public function panFormSave()
    {
        $panId = $this->input->post('pan_id');
        $token = $this->input->post('token');
        $panNumber = $this->input->post('pan_number');
        $status = $this->input->post('status');

        if ($panId < 0 || $panId == '') {
            $checkExists = $this->mastermodel->checkPAN($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "PAN Number Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->savePANData($panId, $token, $panNumber, $status);
        
        $data["isError"] = FALSE;
        if ($panId > 0) {
            $data["message"] = "PAN Updated";
        } else {
            $data["message"] = "PAN Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function gst_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'gst';
            $data['activeLink'] = $pageStatus;
            
            $data['gstList'] = $this->mastermodel->gstList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/gst/gst-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function gst_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'gst';

            $data['formTitle'] = "Add GST Number";

            $this->load->view('settings/header', $data);
            $this->load->view('master/gst/gst-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function gst_edit($gstId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'gst';

            $data['formTitle'] = "Edit GST Number";

            $gstInfo = $this->mastermodel->getGSTInfo($gstId);
            foreach ($gstInfo as $row) {
                $data['gstId'] = $row->id;
                $data['gstToken'] = $row->token;
                $data['gstNumber'] = $row->gst_number;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/gst/gst-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //GST Save Form //
    public function gstFormSave()
    {
        $gstId = $this->input->post('gst_id');
        $token = $this->input->post('token');
        $gstNumber = $this->input->post('gst_number');
        $status = $this->input->post('status');

        if ($gstId < 0 || $gstId == '') {
            $checkExists = $this->mastermodel->checkGST($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "GST Number Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveGSTData($gstId, $token, $gstNumber, $status);
        
        $data["isError"] = FALSE;
        if ($gstId > 0) {
            $data["message"] = "GST Updated";
        } else {
            $data["message"] = "GST Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function designation_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'designation';
            $data['activeLink'] = $pageStatus;
            
            $data['designationList'] = $this->mastermodel->designationList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/designation/designation-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function designation_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'designation';

            $data['formTitle'] = "Add Designation";

            $this->load->view('settings/header', $data);
            $this->load->view('master/designation/designation-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function designation_edit($designationId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'designation';
            
            $data['formTitle'] = "Edit Designation";

            $designationInfo = $this->mastermodel->getDesignationInfo($designationId);
            foreach ($designationInfo as $row) {
                $data['designationId'] = $row->id;
                $data['designationToken'] = $row->token;
                $data['designation'] = $row->designation;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/designation/designation-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Designation Save Form //
    public function designationFormSave()
    {
        $designationId = $this->input->post('designation_id');
        $token = $this->input->post('token');
        $designation = $this->input->post('designation');
        $status = $this->input->post('status');

        if ($designationId < 0 || $designationId == '') {
            $checkExists = $this->mastermodel->checkDesignation($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Designation Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveDesignationData($designationId, $token, $designation, $status);
        
        $data["isError"] = FALSE;
        if ($designationId > 0) {
            $data["message"] = "Designation Updated";
        } else {
            $data["message"] = "Designation Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function branch_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'branch';
            $data['activeLink'] = $pageStatus;

            $data['branchList'] = $this->mastermodel->branchList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/branch/branch-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function branch_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'branch';

            $data['formTitle'] = "Add Branch";

            $this->load->view('settings/header', $data);
            $this->load->view('master/branch/branch-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function branch_edit($branchId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'branch';

            $data['formTitle'] = "Edit Branch";

            $branchInfo = $this->mastermodel->getBranchInfo($branchId);
            foreach ($branchInfo as $row) {
                $data['branchId'] = $row->id;
                $data['branchToken'] = $row->token;
                $data['branchZone'] = $row->zone;
                $data['branch'] = $row->branch;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/branch/branch-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Branch Save Form //
    public function branchFormSave()
    {
        $branchId = $this->input->post('branch_id');
        $token = $this->input->post('token');
        $branchZone = $this->input->post('zone');
        $branch = $this->input->post('branch');
        $status = $this->input->post('status');

        if ($branchId < 0 || $branchId == '') {
            $checkExists = $this->mastermodel->checkBranch($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Branch Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveBranchData($branchId, $token, $branchZone, $branch, $status);
        
        $data["isError"] = FALSE;
        if ($branchId > 0) {
            $data["message"] = "Branch Updated";
        } else {
            $data["message"] = "Branch Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function incharge_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_open"] = 'access_control';
            $data["menu_status"] = 'incharge';
            $data['activeLink'] = $pageStatus;

            $data['inchargeList'] = $this->mastermodel->complaintInchargeList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/complaint_incharge/incharge-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function incharge_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_open"] = 'access_control';
            $data["menu_status"] = 'incharge';

            $data['formTitle'] = "Add Complaint Incharge";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

            $this->load->view('settings/header', $data);
            $this->load->view('master/complaint_incharge/incharge-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function incharge_edit($inchargeId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) {
            $data["menu_open"] = 'access_control';
            $data["menu_status"] = 'incharge';

            $data['formTitle'] = "Edit Complaint Incharge";
            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

            $inchargeInfo = $this->mastermodel->getComplaintInchargeInfo($inchargeId);
            foreach ($inchargeInfo as $row) {
                $data['inchargeId'] = $row->id;
                $data['inchargeZone'] = $row->zone;
                $data['inchargeBranch'] = $row->branch;
                $data['inchargeEmployee'] = $row->employee;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/complaint_incharge/incharge-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Complaint Incharge Save Form //
    public function inchargeFormSave()
    {
        $inchargeId = $this->input->post('incharge_id');
        $zone = $this->input->post('zone');
        $branch = $this->input->post('branch');
        $employee = $this->input->post('employee');
        $status = $this->input->post('status');

        if ($inchargeId < 0 || $inchargeId == '') {
            $checkExists = $this->mastermodel->checkIncharge($branch, $employee);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Incharge Employee Name Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveComplaintInchargeData($inchargeId, $zone, $branch, $employee, $status);
        
        $data["isError"] = FALSE;
        if ($inchargeId > 0) {
            $data["message"] = "Complaint Incharge Updated";
        } else {
            $data["message"] = "Complaint Incharge Created";
        }

        echo json_encode($data);
        return;
    }
    
    public function work_type_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'work_type';
            $data['activeLink'] = $pageStatus;

            $data['workTypeList'] = $this->mastermodel->workTypeList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/work_type/work-type-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function work_type_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'work_type';

            $data['formTitle'] = "Add Work Type";

            $this->load->view('settings/header', $data);
            $this->load->view('master/work_type/work-type-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function work_type_edit($workTypeId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'work_type';

            $data['formTitle'] = "Edit Work Type";

            $workTypeInfo = $this->mastermodel->getWorkTypeInfo($workTypeId);
            foreach ($workTypeInfo as $row) {
                $data['workTypeId'] = $row->id;
                $data['workTypeToken'] = $row->token;
                $data['workType'] = $row->work_type;
                $data['dayCount'] = $row->day_count;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/work_type/work-type-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Work Type Save Form //
    public function workTypeFormSave()
    {
        $workTypeId = $this->input->post('work_type_id');
        $token = $this->input->post('token');
        $workType = $this->input->post('work_type');
        $dayCount = $this->input->post('day_count');
        $status = $this->input->post('status');

        if ($workTypeId < 0 || $workTypeId == '') {
            $checkExists = $this->mastermodel->checkWorkType($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Work Type Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveWorkTypeData($workTypeId, $token, $workType, $dayCount, $status);
        
        $data["isError"] = FALSE;
        if ($workTypeId > 0) {
            $data["message"] = "Work Type Updated";
        } else {
            $data["message"] = "Work Type Created";
        }

        echo json_encode($data);
        return;
    }

    public function project_type_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'project_type';
            $data['activeLink'] = $pageStatus;

            $data['projectTypeList'] = $this->mastermodel->projectTypeList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/project_type/project-type-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function project_type_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'project_type';

            $data['formTitle'] = "Add Project Type";

            $this->load->view('settings/header', $data);
            $this->load->view('master/project_type/project-type-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function project_type_edit($projectTypeId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'project_type';

            $data['formTitle'] = "Edit Project Type";

            $projectTypeInfo = $this->mastermodel->getProjectTypeInfo($projectTypeId);
            foreach ($projectTypeInfo as $row) {
                $data['projectTypeId'] = $row->id;
                $data['projectTypeToken'] = $row->token;
                $data['projectType'] = $row->project_type;
                $data['dayCount'] = $row->day_count;
                $data['status'] = $row->status;
            }
            
            $this->load->view('settings/header', $data);
            $this->load->view('master/project_type/project-type-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    //Project Type Save Form //
    public function projectTypeFormSave()
    {
        $projectTypeId = $this->input->post('project_type_id');
        $token = $this->input->post('token');
        $projectType = $this->input->post('project_type');
        $status = $this->input->post('status');

        if ($projectTypeId < 0 || $projectTypeId == '') {
            $checkExists = $this->mastermodel->checkProjectType($token);
            if ($checkExists > 0) {
                $data["isError"] = TRUE;
                $data["message"] = "Project Type Already Exists";
                echo json_encode($data);
                return;
            }
        }

        $this->mastermodel->saveProjectTypeData($projectTypeId, $token, $projectType, $status);
        
        $data["isError"] = FALSE;
        if ($projectTypeId > 0) {
            $data["message"] = "Project Type Updated";
        } else {
            $data["message"] = "Project Type Created";
        }

        echo json_encode($data);
        return;
    }

    // Menu Control //
    public function menu_control()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'access_control';
            $data["menu_status"] = 'menu_control';

            $data['menuList'] = $this->mastermodel->getMenuControlList();

            $this->load->view('settings/header', $data);
            $this->load->view('master/menu_control/menu-control-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    // Update Menu Status AJAX //
    public function update_menu_status()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $menuKey = $this->input->post('menuKey');
            $status = $this->input->post('status');

            if ($this->mastermodel->updateMenuStatus($menuKey, $status)) {
                echo json_encode(['isError' => false, 'message' => 'Menu status updated successfully']);
            } else {
                echo json_encode(['isError' => true, 'message' => 'Failed to update menu status']);
            }
        } else {
            echo json_encode(['isError' => true, 'message' => 'No permission']);
        }
    }

    // Add Menu Control Item
    public function menu_control_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'access_control';
            $data["menu_status"] = 'menu_control';

            $data['formTitle'] = "Add Menu Item";
            $data['menuId'] = 0;
            $data['menuKey'] = '';
            $data['menuName'] = '';
            $data['parentKey'] = '';
            $data['displayOrder'] = 0;
            $data['status'] = 'enabled';

            $data['parentMenus'] = $this->db->select('menu_key, menu_name')
                                            ->where('parent_key', NULL)
                                            ->where('delete_status', 0)
                                            ->get('menu_control')
                                            ->result();

            $this->load->view('settings/header', $data);
            $this->load->view('master/menu_control/menu-control-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    // Edit Menu Control Item
    public function menu_control_edit($menuId)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'access_control';
            $data["menu_status"] = 'menu_control';

            $data['formTitle'] = "Edit Menu Item";

            $menuInfo = $this->mastermodel->getMenuControlInfo($menuId);
            foreach ($menuInfo as $row) {
                $data['menuId'] = $row->id;
                $data['menuKey'] = $row->menu_key;
                $data['menuName'] = $row->menu_name;
                $data['parentKey'] = $row->parent_key;
                $data['displayOrder'] = $row->display_order;
                $data['status'] = $row->status;
            }

            $data['parentMenus'] = $this->db->select('menu_key, menu_name')
                                            ->where('parent_key', NULL)
                                            ->where('delete_status', 0)
                                            ->where('id !=', $menuId)
                                            ->get('menu_control')
                                            ->result();

            $this->load->view('settings/header', $data);
            $this->load->view('master/menu_control/menu-control-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    // Save Menu Control Form
    public function menuControlFormSave()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $menuId = $this->input->post('menu_id');
            $menuKey = trim($this->input->post('menu_key'));
            $menuName = trim($this->input->post('menu_name'));
            $parentKey = $this->input->post('parent_key');
            $displayOrder = (int)$this->input->post('display_order');
            $status = $this->input->post('status');

            if ($menuId <= 0 || $menuId == '') {
                $checkExists = $this->mastermodel->checkMenuKeyExists($menuKey);
                if ($checkExists > 0) {
                    echo json_encode(["isError" => TRUE, "message" => "Menu Key Already Exists"]);
                    return;
                }
            }

            $this->mastermodel->saveMenuControlData($menuId, $menuKey, $menuName, $parentKey, $displayOrder, $status);
            
            echo json_encode([
                "isError" => FALSE,
                "message" => ($menuId > 0) ? "Menu Item Updated Successfully" : "Menu Item Created Successfully"
            ]);
            return;
        } else {
            echo json_encode(["isError" => TRUE, "message" => "No permission"]);
            return;
        }
    }


    // App Version Control List
    public function app_version_list($pageStatus = '')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'app_version';
            $data['activeLink'] = $pageStatus;

            $data['appVersionList'] = $this->mastermodel->appVersionList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/app_version/app-version-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    // App Version Control Add
    public function app_version_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'app_version';
            $data['formTitle'] = "Add App Version";

            $data['appVersionId'] = '';
            $data['platform'] = 'android';
            $data['latestVersion'] = '';
            $data['updateUrl'] = '';
            $data['releaseNotes'] = '';
            $data['isForce'] = '0';
            $data['status'] = 'active';

            $this->load->view('settings/header', $data);
            $this->load->view('master/app_version/app-version-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    // App Version Control Edit
    public function app_version_edit($id)
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'master';
            $data["menu_status"] = 'app_version';
            $data['formTitle'] = "Edit App Version";

            $info = $this->mastermodel->getAppVersionInfo($id);
            foreach ($info as $row) {
                $data['appVersionId'] = $row->id;
                $data['platform'] = $row->platform;
                $data['latestVersion'] = $row->latest_version;
                $data['updateUrl'] = $row->update_url;
                $data['releaseNotes'] = $row->release_notes;
                $data['isForce'] = $row->is_force;
                $data['status'] = $row->status;
            }

            $this->load->view('settings/header', $data);
            $this->load->view('master/app_version/app-version-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    // App Version Control Save Form
    public function appVersionFormSave()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $id = $this->input->post('app_version_id');
            $platform = $this->input->post('platform');
            $latest_version = trim($this->input->post('latest_version'));
            $update_url = trim($this->input->post('update_url'));
            $release_notes = trim($this->input->post('release_notes'));
            $is_force = $this->input->post('is_force');
            $status = $this->input->post('status');

            if ($latest_version == '' || $update_url == '') {
                echo json_encode(["isError" => TRUE, "message" => "Please fill all required fields"]);
                return;
            }

            $this->mastermodel->saveAppVersionData($id, $platform, $latest_version, $update_url, $release_notes, $is_force, $status);

            echo json_encode([
                "isError" => FALSE,
                "message" => ($id > 0) ? "Version Updated Successfully" : "Version Added Successfully"
            ]);
            return;
        } else {
            echo json_encode(["isError" => TRUE, "message" => "No permission"]);
            return;
        }
    }

    // App Notification Control
    public function app_notification_list($pageStatus='')
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'app_notification';
            $data["menu_status"] = 'app_notification';
            $data['activeLink'] = $pageStatus;

            $data['appNotificationList'] = $this->mastermodel->getAppNotificationList($pageStatus);

            $this->load->view('settings/header', $data);
            $this->load->view('master/app_notification/app-notification-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function app_notification_add()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data["menu_open"] = 'app_notification';
            $data["menu_status"] = 'app_notification';
            $data['formTitle'] = "Push Custom App Notification";

            $this->load->view('settings/header', $data);
            $this->load->view('master/app_notification/app-notification-add', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function appNotificationFormSave()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $title = trim($this->input->post('title'));
            $description = trim($this->input->post('description'));

            if ($title == '' || $description == '') {
                echo json_encode(["isError" => TRUE, "message" => "Title and Description are required"]);
                return;
            }

            $this->load->model('notificationmodel');
            $this->load->model('apimodel');

            // 1. Insert into database
            $notifId = $this->notificationmodel->createAppNotification([
                'title' => $title,
                'description' => $description,
                'notification_type' => 'custom',
                'target_employee_id' => null,
                'created_by' => $this->session->userdata('userid'),
            ]);

            // 2. Fetch all active FCM tokens and send push
            $tokens = $this->apimodel->getAllActiveFcmTokens();
            $sent = false;
            if (!empty($tokens)) {
                $sent = $this->notificationmodel->sendFcmNotification($title, $description, $tokens);
            }

            // 3. Mark notification as sent if tokens were processed
            if (!empty($tokens)) {
                $this->db->where('id', $notifId)->update('app_notifications', [
                    'sent_status' => 1,
                    'sent_at' => date('Y-m-d H:i:s'),
                ]);
            }

            echo json_encode([
                "isError" => FALSE,
                "message" => !empty($tokens) ? "Notification Pushed to " . count($tokens) . " device(s) & Saved Successfully" : "Notification saved in database, but no active device tokens found."
            ]);
            return;
        } else {
            echo json_encode(["isError" => TRUE, "message" => "No permission"]);
            return;
        }
    }

}
