<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

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

    public function current_stock_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'current-stock';
    
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['currentStockList'] = $this->stockmodel->getCurrentStockList();
    
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/current-stock-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function current_stock_report($branchId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'current-stock';
    
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['branchCurrentStockList'] = $this->stockmodel->getBranchCurrentStockList($branchId);

        $branchInfo = $this->mastermodel->getBranchInfo($branchId);
        foreach ($branchInfo as $row) {
          $data['branchName'] = $row->branch;
        }
    
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/current-stock-report', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function current_stock_transaction($materialId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'current-stock';

        $data['stockTransactionList'] = $this->stockmodel->getStockTransactionList($materialId);

        $overallStockTransaction = $this->stockmodel->getCurrentStockMaterialInfo($materialId);
        foreach ($overallStockTransaction as $row) {
          $data['overallStockinQty'] = $row->available_stockin;
          $data['overallStockoutQty'] = $row->available_stockout;
          $data['overallAvailableQty'] = $row->balance_stock;
        }

        $materialInfo = $this->mastermodel->getMaterialInfo($materialId);
        foreach ($materialInfo as $row) {
          $data['materialCode'] = $row->material_code;
          $data['materialName'] = $row->material_name;
          $data['materialType'] = $row->type;
          $data['materialCategory'] = $row->category;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/current-stock-transaction', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function branch_stock_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'branch-stock';
    
        $data['materialBranchList'] = $this->stockmodel->getMaterialBranchList();
        $data['materialStockList'] = $this->stockmodel->getMaterialStockByBranch();
        $data['branchMaterialCountList'] = $this->stockmodel->getBranchMaterialCountList();
    
        $this->load->view('settings/header_link', $data);
        $this->load->view('stockreport/branch-stock-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function stock_in_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'stock-in';
    
        $data['stockInList'] = $this->stockmodel->getStockInList();
    
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/stock-in/stock-in-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function getMaterialNameList()
    {
      $materialCode = $this->input->post('material_code');
      $data = $this->stockmodel->getMaterialName($materialCode);
      echo json_encode($data);
    }

    public function getStockinMaterialNameList()
    {
      $materialCode = $this->input->post('material_code');
      $fromBranchId = $this->input->post('from_branch_id');
      $data = $this->stockmodel->getStockinMaterialName($materialCode, $fromBranchId);
      echo json_encode($data);
    }

    public function getCurrentStockReportDetail()
    {
      $materialId = $this->input->post('materialId');

      $data['stockMaterialData'] = $this->stockmodel->getCurrentStockMaterialInfo($materialId);

      $stockMaterialData = $this->mastermodel->getMaterialInfo($materialId);
      foreach ($stockMaterialData as $row) {
        $data['materialName'] = $row->material_name;
        $data['materialCategory'] = $row->category;
        $data['materialtype'] = $row->type;
      }
      
      echo json_encode($data);
    }
  
    public function stock_in_add()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'stock-in';

        $data["formTitle"] = 'Add Stock Inward';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
    
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/stock-in/stock-in-form', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function stock_in_edit($stockInId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'stock-in';

        $data["formTitle"] = 'Edit Stock Inward';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['stockInMaterialItems'] = $this->stockmodel->getStockInMaterialItems($stockInId);

        $stockInDetail = $this->stockmodel->getStockInInfo($stockInId);
        foreach ($stockInDetail as $row) {
          $data['stockInId'] = $row->id;
          $data['stockInDate'] = $row->date;
          $data['zone'] = $row->zone;
          $data['fromBranchId'] = $row->from_branch;
          $data['getinFrom'] = $row->method;
          $data['materialId'] = $row->material_id;
          $data['materialName'] = $row->material_name;
          $data['materialCategory'] = $row->category;
          $data['materialType'] = $row->type;
          $data['materialQuantity'] = $row->quantity;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/stock-in/stock-in-form', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    //Stock Inward Save Form //
    public function stockInForm()
    {
        $stockInId = $this->input->post('stockin_id');
        $stockInDate = $this->input->post('stockin_date');
        $zone = $this->input->post('zone');
        $fromBranchId = $this->input->post('from_branch_id');
        $getinFrom = $this->input->post('getin_from');
  
        $stockInArrayData = json_decode($this->input->post('stockInDataArray'));

        $this->stockmodel->saveStockInData($stockInId, $stockInDate, $zone, $fromBranchId, $getinFrom, $stockInArrayData);
        
        $data["isError"] = FALSE;
        if ($stockInId > 0) {
            $data["message"] = "Stock Inward Updated";
        } else {
            $data["message"] = "Stock Inward Created";
        }
  
        echo json_encode($data);
        return;
    }
    
    public function stock_out_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'stock-out';
    
        $data['stockOutList'] = $this->stockmodel->getStockOutList();
    
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/stock-out/stock-out-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function stock_out_add()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'stock-out';

        $data["formTitle"] = 'Add Stock Outward';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/stock-out/stock-out-form', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function stock_out_edit($stockOutId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'stock-out';

        $data["formTitle"] = 'Edit Stock Outward';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['stockOutMaterialItems'] = $this->stockmodel->getStockOutMaterialItems($stockOutId);
        
        $stockOutDetail = $this->stockmodel->getStockOutInfo($stockOutId);
        foreach ($stockOutDetail as $row) {
          $data['stockOutId'] = $row->id;
          $data['stockOutDate'] = $row->date;
          $data['zone'] = $row->zone;
          $data['fromBranchId'] = $row->from_branch;
          $data['usedTo'] = $row->method;
          $data['outletName'] = $row->outlet_name;
          $data['toBranchId'] = $row->to_branch;
          $data['materialId'] = $row->material_id;
          $data['materialName'] = $row->material_name;
          $data['materialCategory'] = $row->category;
          $data['materialType'] = $row->type;
          $data['materialQuantity'] = $row->quantity;
        }
          
        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/stock-out/stock-out-form', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    //Stock Outward Save Form //
    public function stockOutForm()
    {
        $stockOutId = $this->input->post('stockout_id');
        $stockOutDate = $this->input->post('stockout_date');
        $zone = $this->input->post('zone');
        $fromBranchId = $this->input->post('from_branch_id');
        $usedTo = $this->input->post('used_to');
        $outletName = $this->input->post('outlet_name');
        $toBranchId = $this->input->post('to_brand_id');

        $stockOutArrayData = json_decode($this->input->post('stockOutDataArray'));
  
        $this->stockmodel->saveStockOutData($stockOutId, $stockOutDate, $zone, $fromBranchId, $usedTo, $outletName, $toBranchId, $stockOutArrayData);
        
        $data["isError"] = FALSE;
        if ($stockOutId > 0) {
            $data["message"] = "Stock Outward Updated";
        } else {
            $data["message"] = "Stock Outward Created";
        }
  
        echo json_encode($data);
        return;
    }

    public function index($year='', $month='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'month-stock';
        
        $data['month'] = $month;
        $data['year'] = $year;
        $data['formTitle'] = "Month Stock Report";
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['stockreportList'] = $this->stockmodel->getStockReports($year, $month);

        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/month-stock/month-stock-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function month_stock_list($year='', $month='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'month-stock';

        $data['month'] = $month;
        $data['year'] = $year;
        $data['formTitle'] = "Month Stock Report";
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['stockreportList'] = $this->stockmodel->getStockReports($year, $month);

        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/month-stock/month-stock-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function month_stock_add($year='', $month = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'month-stock';

        $data['month'] = $month;
        $data['year'] = $year;
        $data['formTitle'] = "Add Stock Report";
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['monthMaterialList'] = $this->stockmodel->monthMaterialList();

        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/month-stock/month-stock-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function getStockReportDetail()
    {
      $materialId = $this->input->post('materialId');
      $month = $this->input->post('month');
      $year = $this->input->post('year');

      $data['stockMaterialData'] = $this->stockmodel->getStockMaterialInfo($materialId, $year, $month);

      $stockMaterialData = $this->stockmodel->getStockMaterialInfo($materialId, $year, $month);
      foreach ($stockMaterialData as $row) {
        $data['materialName'] = $row->material_name;
        $data['month'] = $row->month;
        $data['year'] = $row->year;
      }
      
      echo json_encode($data);
    }

    public function month_stock_view($year='', $month='', $branchId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'stock-report';
        $data["menu_status"] = 'month-stock';

        if($branchId) { 
          $branchId = $branchId;
        } else {
          $branchId = '6';
        }
        $data['month'] = $month;
        $data['year'] = $year;
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['allStockreportList'] = $this->stockmodel->getAllStockReports($year, $month, $branchId);

        $branchInfo = $this->mastermodel->getBranchInfo($branchId);
        foreach ($branchInfo as $row) {
            $data['branchId'] = $row->id;
            $data['branchToken'] = $row->token;
            $data['branchName'] = $row->branch;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('stockreport/month-stock/month-stock-view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    //Stock Report Save Form //
    public function stockreportFormSave()
    {
      $stockreportId = $this->input->post('stockreport_id');
      $branch = $this->input->post('branch');
      $month = $this->input->post('month');
      $year = $this->input->post('year');
      $materialIds = $this->input->post('material_id');
      $materialCounts = $this->input->post('material_count');

      // Loop through each Stock Report and save Material data
      foreach ($materialIds as $index => $materialId) {
          $materialCount = isset($materialCounts[$index]) ? $materialCounts[$index] : '';
          $this->stockmodel->saveStockreportData($stockreportId, $branch, $month, $year, $materialId, $materialCount);
      }
      
      $data["isError"] = FALSE;
      if ($stockreportId > 0) {
          $data["message"] = "Stock Report Updated";
      } else {
          $data["message"] = "Stock Report Created";
      }

      echo json_encode($data);
      return;
    }

    public function material_shipping_list($pageStatus = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material-shipping';
        $data["activeLink"] = $pageStatus;
    
        $data['materialShippingList'] = $this->stockmodel->getMaterialShippingList($pageStatus);
    
        $this->load->view('settings/header', $data);
        $this->load->view('material-shipping/shipping-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function material_shipping_add()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material-shipping';

        $data["formTitle"] = 'Add Material Shipping';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
    
        $this->load->view('settings/header', $data);
        $this->load->view('material-shipping/shipping-form', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function material_shipping_edit($shippingId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material-shipping';

        $data["formTitle"] = 'Edit Material Shipping';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

        $materialShippingDetail = $this->stockmodel->getMaterialShippingInfo($shippingId);
        foreach ($materialShippingDetail as $row) {
          $data['materialShippingId'] = $row->id;
          $data['shippingDate'] = $row->shipping_date;
          $data['fromLocation'] = $row->from_location;
          $data['toLocation'] = $row->to_location;
          $data['materialName'] = $row->material_name;
          $data['senderName'] = $row->sender_name;
          $data['senderNumber'] = $row->sender_number;
          $data['receiverName'] = $row->receiver_name;
          $data['receivedDate'] = $row->received_date;
          $data['receiverNumber'] = $row->receiver_number;
          $data['billCopy'] = $row->bill_copy;
          $data['lrCopy'] = $row->lr_copy;
          $data['shippingType'] = $row->shipping_type;
          $data['status'] = $row->status;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('material-shipping/shipping-form', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function getMaterialShippingDetail()
    {
      $shippingId = $this->input->post('shippingId');
  
      $materialShippingData = $this->stockmodel->getMaterialShippingInfo($shippingId);
      foreach ($materialShippingData as $row) {
        $data['shippingId'] = $row->id;
        $data['shippingDate'] = $row->shipping_dateFormat;
        $data['expectedDate'] = $row->expected_dateFormat;
        $data['fromLocation'] = $row->from_branch;
        $data['toLocation'] = $row->to_branch;
        $data['materialName'] = $row->material_name;
        $data['senderName'] = $row->sender_name;
        $data['senderNumber'] = $row->sender_number;
        $data['receiverName'] = $row->receiver_name;
        $data['receiverNumber'] = $row->receiver_number;
        $data['receivedDate'] = $row->received_dateFormat;
        $data['billCopy'] = $row->bill_copy;
        $data['lrCopy'] = $row->lr_copy;
        $data['shippingType'] = $row->shipping_type;
        $data['status'] = $row->status;
        $data['createdBy'] = $row->employee_name;
        $data['createdAt'] = $row->created_at;
      }
      echo json_encode($data);
    }

    //Material Shipping Save Form //
    public function materialShippingFormSave()
    {
      $materialShippingId = $this->input->post('material_shipping_id');
      $shippingDate = $this->input->post('shipping_date');
      $shippingType = $this->input->post('shipping_type');
      $fromLocation = $this->input->post('from_location');
      $toLocation = $this->input->post('to_location');
      $materialName = $this->input->post('material_name');
      $senderName = $this->input->post('sender_name');
      $senderNumber = $this->input->post('sender_number');
      $receiverName = $this->input->post('receiver_name');
      $receiverNumber = $this->input->post('receiver_number');
      $receivedDate = $this->input->post('received_date');
      $status = $this->input->post('status');
      
      $alterLRCopy = $this->input->post('alter_lr_copy');
      $alterLRCopy = $this->input->post('alter_bill_copy');
      
      $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
  
      $lrCopyUploadDir = './uploads/lr_copy/';
      $billCopyUploadDir = './uploads/bill_copy/';
  
      // lrCopy Document
      if (isset($_FILES['lr_copy'])) {
        $filesArray = $_FILES['lr_copy'];
        $uploadedFiles['lr_copy'] = $this->common->fileUpload($filesArray, $lrCopyUploadDir, $allowTypes);
      }
      // billCopy Document
      if (isset($_FILES['bill_copy'])) {
        $filesArray = $_FILES['bill_copy'];
        $uploadedFiles['bill_copy'] = $this->common->fileUpload($filesArray, $billCopyUploadDir, $allowTypes);
      }

      $lrCopy_img = $uploadedFiles['lr_copy'][0];
      $billCopy_img = $uploadedFiles['bill_copy'][0];

      if ($_FILES["lr_copy"]["name"] == FALSE) {
        $lrCopy_img = $alterLRCopy;
      }

      if ($_FILES["bill_copy"]["name"] == FALSE) {
        $billCopy_img = $alterLRCopy;
      }

      $this->stockmodel->saveMaterialShippingData($materialShippingId, $shippingDate, $shippingType, $fromLocation, $toLocation, $materialName, $senderName, $senderNumber, $receiverName, $receiverNumber, $receivedDate, $billCopy_img, $status, $lrCopy_img);
      
      $data["isError"] = FALSE;
      if ($materialShippingId > 0) {
        $data["message"] = "Material Shipping Updated";
      } else {
        $data["message"] = "Material Shipping Created";
      }

      echo json_encode($data);
      return;
    }
    
    //Material Shipping Received Save Form
    public function materialReceivedFormSave()
    {
      $shippingId = $this->input->post('shippingId');
      $receivedDate = $this->input->post('receivedDate');
  
      $this->stockmodel->saveMaterialReceivedForm($shippingId, $receivedDate);
      
      $data["isError"] = FALSE;
      if ($shippingId > 0) {
        $data["message"] = "Material Received";
      } else {
        $data["message"] = "Material Received";
      }
  
      echo json_encode($data);
      return;
    }
    
    public function asset_list($pageStatus = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'asset-management';
        $data["menu_status"] = $pageStatus;
        
        $data["assetType"] = $pageStatus;
        $data['assetManagementBranchList'] = $this->stockmodel->getAssetManagementBranchList($pageStatus);
    
        $this->load->view('settings/header', $data);
        $this->load->view('asset_management/asset-list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function asset_add($materialType = '', $branchId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'asset-management';
        $data["menu_status"] = $materialType;
        
        $data["branchId"] = $branchId;
        $data["materialType"] = $materialType;
        $data["formTitle"] = 'Add ';
        
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['assetsToolsDropdown'] = $this->mastermodel->getAssetsToolsDropdown($materialType);
    
        $this->load->view('settings/header', $data);
        $this->load->view('asset_management/asset-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function asset_edit($assetManagementId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'asset-management';

        $data["formTitle"] = 'Edit ';
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
        $data['assetsToolsDropdown'] = $this->mastermodel->getAssetsToolsDropdown($pageStatus);

        $assetManagementDetail = $this->stockmodel->getAssetManagementInfo($assetManagementId);
        foreach ($assetManagementDetail as $row) {
          $data['assetManagementId'] = $row->id;
          $data['branchId'] = $row->branch_id;
          $data['materialName'] = $row->material_name;
          $data['materialCount'] = $row->material_count;
          $data['materialType'] = $row->material_type;
          $data['menu_status'] = $row->material_type;
        }

        $this->load->view('settings/header', $data);
        $this->load->view('asset_management/asset-add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function asset_view($assetType = '', $branchId = '')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_open"] = 'asset-management';
        $data["menu_status"] = $assetType;

        $data["assetType"] = $assetType;
        $data['assetsToolsList'] = $this->stockmodel->getAssetsToolsList($assetType, $branchId);

        $branchInfo = $this->mastermodel->getBranchInfo($branchId);
        foreach ($branchInfo as $row) {
            $data['branchId'] = $row->id;
            $data['branchName'] = $row->branch;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('asset_management/asset-view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
    
    public function getAssetsDetail()
    {
      $branchId = $this->input->post('branchId');
      $assetType = $this->input->post('assetType');

      $data['assetsToolsList'] = $this->stockmodel->getAssetsToolsList($assetType, $branchId);
      
      $branchDetail = $this->mastermodel->getBranchInfo($branchId);
      foreach ($branchDetail as $row) {
        $data['zone'] = $row->zone;
        $data['branchName'] = $row->branch;
      }
      echo json_encode($data);
    }

    //Asset Management Save Form //
    public function assetManagementFormSave()
    {
      $assetManagementId = $this->input->post('asset_management_id');
      $branch = $this->input->post('branch');
      $materialName = $this->input->post('material_name');
      $materialCount = $this->input->post('material_count');
      $materialType = $this->input->post('material_type');
      
      $this->stockmodel->saveAssetManagementData($assetManagementId, $branch, $materialName, $materialType, $materialCount);
      
      $data["isError"] = FALSE;
      if ($assetManagementId > 0) {
        $data["message"] = "Asset Management Updated";
      } else {
        $data["message"] = "Asset Management Created";
      }

      echo json_encode($data);
      return;
    }

    public function material_price_list()
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material_price';
        
        $data['materialVendorList'] = $this->stockmodel->getMaterialVendorList();
  
        $this->load->view('settings/header', $data);
        $this->load->view('material-price/material_price_list', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function material_price_view($materialId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material_price';
  
        $data['materialPriceList'] = $this->stockmodel->getMaterialPriceList($materialId);

        $materialInfo = $this->mastermodel->getMaterialInfo($materialId);
        foreach ($materialInfo as $row) {
          $data['materialId'] = $row->id;
          $data['materialCode'] = $row->material_code;
          $data['materialName'] = $row->material_name;
          $data['materialCategory'] = $row->category;
          $data['materialType'] = $row->type;
        }
        
        $this->load->view('settings/header', $data);
        $this->load->view('material-price/material_price_view', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }
  
    public function material_price_add($materialId='')
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material_price';
  
        $data['formTitle'] = "Add Material Price";
        
        $data['materialDropdown'] = $this->mastermodel->getMaterialDropdown();
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

        $materialInfo = $this->mastermodel->getMaterialInfo($materialId);
        foreach ($materialInfo as $row) {
          $data['materialId'] = $row->id;
          $data['materialCategory'] = $row->category;
          $data['materialType'] = $row->type;
        }
  
        $this->load->view('settings/header', $data);
        $this->load->view('material-price/material_price_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function material_price_edit($materialPriceId)
    {
      $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
      if (in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) {
        $data["menu_status"] = 'material_price';
  
        $data['formTitle'] = "Edit Material Price";
        $data['materialDropdown'] = $this->mastermodel->getMaterialDropdown();
        $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

        $materialPriceDetail = $this->stockmodel->getMaterialPriceDetail($materialPriceId);
        foreach ($materialPriceDetail as $row) {
          $data['materialPriceId'] = $row->id;
          $data['branchId'] = $row->branch;
          $data['date'] = $row->date;
          $data['materialId'] = $row->material_id;
          $data['materialCategory'] = $row->material_category;
          $data['materialType'] = $row->material_type;
          $data['vendorName'] = $row->vendor_name;
          $data['amount'] = $row->amount;
          $data['remarks'] = $row->remarks;
        }
  
        $this->load->view('settings/header', $data);
        $this->load->view('material-price/material_price_add', $data);
        $this->load->view('settings/footer');
      } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
      }
    }

    public function getMaterialData()
    {
        $materialId 	= $this->input->post('materialName');
        $data 	= $this->mastermodel->getMaterialInfo($materialId);
        echo json_encode($data); 
    }

    //Material Fuel Save Form //
    public function materialPriceFormSave()
    {
      $materialPriceId = $this->input->post('material_price_id');
      $date = $this->input->post('date');
      $branch = $this->input->post('branch');
      $materialId = $this->input->post('material_id');
      $vendorName = $this->input->post('vendor_name');
      $amount = $this->input->post('amount');
      $remarks = $this->input->post('remarks');

      $this->stockmodel->saveMaterialPriceFormData($materialPriceId, $date, $branch, $materialId, $vendorName, $amount, $remarks);
      
      $data["isError"] = FALSE;
      if ($materialPriceId > 0) {
          $data["message"] = "Material Price Updated";
      } else {
          $data["message"] = "Material Price Created";
      }

      echo json_encode($data);
      return;
    }
}