<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

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
  
  public function index($companyName = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data["companyName"] = $companyName;
      $data['allBranchPurchaseOrderList'] = $this->purchasemodel->getAllBranchPurchaseOrderList($companyName);

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }
  
  public function po_list($companyName = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data["companyName"] = $companyName;
      $data['allBranchPurchaseOrderList'] = $this->purchasemodel->getAllBranchPurchaseOrderList($companyName);

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function po_view($companyName = '', $branchId = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data['companyName'] = $companyName;
      $data['purchaseOrderList'] = $this->purchasemodel->getPurchaseOrderList($companyName, $branchId);
      $data['completePurchaseOrderList'] = $this->purchasemodel->getCompletePurchaseOrderList($companyName, $branchId);

      $branchData = $this->purchasemodel->branchListData($branchId);
      foreach ($branchData as $row) {
        $data['branchId']=$row->id;
        $data['branchZone']=$row->zone;
        $data['branchName']=$row->branch;
      }

      $branchPoDetail = $this->purchasemodel->getBranchPoDetail($companyName, $branchId);
      foreach ($branchPoDetail as $row) {
        $data['overallPoAmount']=$row->overall_po_amount;
        $data['overallSecurityAmount']=$row->overall_security_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->balance_po_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-view', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function po_bill_add($companyName='', $branchId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data['formTitle'] = "Add Purchase Order";
      $data['companyName'] = $companyName;
      $data['gstDropdown'] = $this->mastermodel->gstDropdown();
      $data['vendorCodeDropdown'] = $this->mastermodel->vendorCodeDropdown();
      $data['panDropdown'] = $this->mastermodel->panDropdown();

      $branchData = $this->purchasemodel->branchListData($branchId);
      foreach ($branchData as $row) {
        $data['branchId']=$row->id;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-bill-add', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function po_bill_edit($poId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';

      $data['formTitle'] = "Edit Purchase Order";
      $data['gstDropdown'] = $this->mastermodel->gstDropdown();
      $data['vendorCodeDropdown'] = $this->mastermodel->vendorCodeDropdown();
      $data['panDropdown'] = $this->mastermodel->panDropdown();

      $purchaseOrderDetail = $this->purchasemodel->getPurchaseOrderDetail($poId);
      foreach ($purchaseOrderDetail as $row) {
        $data['poId'] = $row->id;
        $data['branchId'] = $row->branch_id;
        $data['poDate'] = $row->po_date;
        $data['companyName'] = $row->company_name;
        $data['validityEnd'] = $row->validity_end;
        $data['purchaseOrderNo'] = $row->purchase_order_no;
        $data['poTitle'] = $row->po_title;
        $data['purchaseOrderLetter'] = $row->po_letter;
        $data['securityAmount'] = $row->security_amount;
        $data['purchaseAmount'] = $row->po_amount;
        $data['gstNumber'] = $row->gst_number;
        $data['gstPercentage'] = $row->gst_percentage;
        $data['vendorCode'] = $row->vendor_code;
        $data['panNumber'] = $row->pan_number;
        $data['hpclGstNumber'] = $row->hpcl_gst_number;
        $data['hpclAddress'] = $row->hpcl_address;
        $data['securityAmountReceipt'] = $row->receipt_img;
        $data['securityAmountDD'] = $row->dd_img;
      }

      $companyName = $purchaseOrderDetail[0]->company_name;

      $data["menu_status"] = 'purchase_' . $companyName;

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-bill-add', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function po_detail($poId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';

      $data['estimationBillList'] = $this->purchasemodel->getEstimationBillList($poId);
      $data['taxinvoiceList'] = $this->purchasemodel->getTaxinvoiceAmountList($poId);
      $data['retentionList'] = $this->purchasemodel->getRetentionList($poId);

      $purchaseOrderDetail = $this->purchasemodel->getPurchaseOrderDetail($poId);
      foreach ($purchaseOrderDetail as $row) {
        $data['poId'] = $row->id;
        $data['purchaseSno'] = $row->sno;
        $data['branchId'] = $row->branch_id;
        $data['companyName'] = $row->company_name;
        $data['zone'] = $row->zone;
        $data['branchName'] = $row->branchName;
        $data['poDate'] = $row->po_dateFormat;
        $data['validityEnd'] = $row->validity_endFormat;
        $data['purchaseOrderNo'] = $row->purchase_order_no;
        $data['poTitle'] = $row->poTitle;
        $data['purchaseOrderLetter'] = $row->po_letter;
        $data['securityAmount'] = $row->security_amount;
        $data['gstNumber'] = $row->gstNumber;
        $data['gstPercentage'] = $row->gst_percentage;
        $data['vendorCode'] = $row->vendorCode;
        $data['panNumber'] = $row->panNumber;
        $data['hpclGstNumber'] = $row->hpcl_gst_number;
        $data['hpclAddress'] = $row->hpcl_address;
        $data['securityAmountReceiptImg'] = $row->receipt_img;
        $data['securityAmountDDImg'] = $row->dd_img;
        $data['poAmount'] = $row->po_amount;
        $data['estimationAmount'] = $row->estimation_amount;
        $data['taxinvoiceAmount'] = $row->taxinvoice_amount;
        $data['retentionAmount'] = $row->retention_amount;
        $data['balanceAmount'] = $row->balance_amount;
        $data['createdBy'] = $row->employee_name;
        $data['createdAt'] = $row->created_at;

        $data['overallReceivedAmount'] = $row->received_amount;
        $data['overallTDSAmount'] = $row->tds_amount;
        $data['overallWCTAmount'] = $row->wct_amount;
        $data['overallRetentionMoney'] = $row->retention_money;
        $data['overallHoldAmount'] = $row->hold_amount;
      }

      $companyName = $purchaseOrderDetail[0]->company_name;

      $data["menu_status"] = 'purchase_' . $companyName;

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-detail', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function po_report($poId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';

      $data['estimationBillList'] = $this->purchasemodel->getEstimationBillList($poId);
      $data['taxinvoiceList'] = $this->purchasemodel->getTaxinvoiceAmountList($poId);
      $data['retentionList'] = $this->purchasemodel->getRetentionList($poId);

      $purchaseOrderDetail = $this->purchasemodel->getPurchaseOrderDetail($poId);
      foreach ($purchaseOrderDetail as $row) {
        $data['poId'] = $row->id;
        $data['purchaseSno'] = $row->sno;
        $data['branchId'] = $row->branch_id;
        $data['companyName'] = $row->company_name;
        $data['zone'] = $row->zone;
        $data['branchName'] = $row->branchName;
        $data['poDate'] = $row->po_dateFormat;
        $data['validityEnd'] = $row->validity_endFormat;
        $data['purchaseOrderNo'] = $row->purchase_order_no;
        $data['poTitle'] = $row->poTitle;
        $data['purchaseOrderLetter'] = $row->po_letter;
        $data['securityAmount'] = $row->security_amount;
        $data['gstNumber'] = $row->gstNumber;
        $data['gstPercentage'] = $row->gst_percentage;
        $data['vendorCode'] = $row->vendorCode;
        $data['panNumber'] = $row->panNumber;
        $data['hpclGstNumber'] = $row->hpcl_gst_number;
        $data['hpclAddress'] = $row->hpcl_address;
        $data['securityAmountReceiptImg'] = $row->receipt_img;
        $data['securityAmountDDImg'] = $row->dd_img;
        $data['poAmount'] = $row->po_amount;
        $data['estimationAmount'] = $row->estimation_amount;
        $data['taxinvoiceAmount'] = $row->taxinvoice_amount;
        $data['retentionAmount'] = $row->retention_amount;
        $data['balanceAmount'] = $row->balance_amount;
        $data['createdBy'] = $row->employee_name;
        $data['createdAt'] = $row->created_at;
      }

      $companyName = $purchaseOrderDetail[0]->company_name;

      $data["menu_status"] = 'purchase_' . $companyName;

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/po-report', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function purchase_list($companyName = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data["companyName"] = $companyName;
      $data['purchaseOrderList'] = $this->purchasemodel->getPurchaseList($companyName);

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/purchase-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }
  
  public function estimation_list($companyName = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data["companyName"] = $companyName;
      $data['estimationList'] = $this->purchasemodel->getEstimationList($companyName);

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/estimation-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }
  
  public function taxinvoice_list($companyName = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';
      $data["menu_status"] = 'purchase_' . $companyName;

      $data["companyName"] = $companyName;
      $data['taxinvoiceList'] = $this->purchasemodel->getTaxinvoiceList($companyName);

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/taxinvoice-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function estimation_bill_add($poId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';

      $data['pageType'] = 'add';
      $data['formTitle'] = "Add Estimation Bill";

      $purchaseOrderDetail = $this->purchasemodel->getPurchaseOrderDetail($poId);
      foreach ($purchaseOrderDetail as $row) {
        $data['poId']=$row->id;
        $data['purchaseOrderNo']=$row->purchase_order_no;
        $data['branchId']=$row->branch_id;
        $data['companyName']=$row->company_name;
      }

      $companyName = $purchaseOrderDetail[0]->company_name;

      $data["menu_status"] = 'purchase_' . $companyName;

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/estimation-bill-add', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function estimation_bill_edit($estId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'purchase';

      $data['pageType'] = 'edit';
      $data['formTitle'] = "Edit Estimation Bill";

      $EstimationDetail = $this->purchasemodel->getEstimationDetail($estId);
      foreach ($EstimationDetail as $row) {
        $data['poId'] = $row->po_id;
        $data['estId'] = $row->id;
        $data['retentionId'] = $row->retention_id;
        $data['companyName'] = $row->company_name;
        $data['branchId'] = $row->branch_id;
        $data['estimationDate'] = $row->estimation_date;
        $data['estimationNumber'] = $row->estimation_number;
        $data['jobReport'] = $row->job_report;
        $data['purchaseOrderNo'] = $row->purchase_order_no;
        $data['estimationAmount'] = $row->estimation_amount;
        $data['invoiceDate'] = $row->taxinvoice_date;
        $data['callupNumber'] = $row->callup_number;
        $data['invoiceDoc'] = $row->taxinvoice_doc;
        $data['invoiceNumber'] = $row->taxinvoice_number;
        $data['netAmount'] = $row->net_amount;
        $data['invoiceAmount'] = $row->taxinvoice_amount;
        $data['receivedDate'] = $row->received_date;
        $data['retentionrDate'] = $row->retention_date;
        $data['receivedAmount'] = $row->received_amount;
        $data['tdsAmount'] = $row->tds_amount;
        $data['wctAmount'] = $row->wct_amount;
        $data['retentionAmount'] = $row->retention_amount;
        $data['holdAmount'] = $row->hold_amount;
        $data['amountReceivedBank'] = $row->bank_name;
        $data['retentionDoc'] = $row->retention_img;
        $data['status'] = $row->status;
      }

      $companyName = $EstimationDetail[0]->company_name;

      $data["menu_status"] = 'purchase_' . $companyName;

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/estimation-bill-add', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function getPurchaseDetail()
  {
    $poId = $this->input->post('purchaseId');
    
    $purchaseOrderDetail = $this->purchasemodel->getPurchaseOrderDetail($poId);
    foreach ($purchaseOrderDetail as $row) {
      $data['poId'] = $row->id;
      $data['purchaseSno'] = $row->sno;
      $data['branchId'] = $row->branch_id;
      $data['companyName'] = $row->company_name;
      $data['zone'] = $row->zone;
      $data['branchName'] = $row->branchName;
      $data['poDate'] = $row->po_dateFormat;
      $data['validityEnd'] = $row->validity_endFormat;
      $data['securityReceivedDate'] = $row->security_received_dateFormat;
      $data['purchaseOrderNo'] = $row->purchase_order_no;
      $data['poTitle'] = $row->poTitle;
      $data['purchaseOrderLetter'] = $row->po_letter;
      $data['securityAmount'] = $row->security_amount;
      $data['gstNumber'] = $row->gstNumber;
      $data['gstPercentage'] = $row->gst_percentage;
      $data['vendorCode'] = $row->vendorCode;
      $data['panNumber'] = $row->panNumber;
      $data['hpclGstNumber'] = $row->hpcl_gst_number;
      $data['hpclAddress'] = $row->hpcl_address;
      $data['securityAmountReceiptImg'] = $row->receipt_img;
      $data['securityAmountDDImg'] = $row->dd_img;
      $data['poAmount'] = $row->po_amount;
      $data['securityStatus'] = $row->security_status;
      $data['createdBy'] = $row->employee_name;
      $data['createdAt'] = $row->created_at;
    }
    echo json_encode($data);
  }

  public function getEstimationBillDetail()
  {
    $estimationId = $this->input->post('estimationId');
    
    $estimationDetail = $this->purchasemodel->getEstimationInfo($estimationId);
    foreach ($estimationDetail as $row) {
      $data['zone'] = $row->zone;
      $data['branchName'] = $row->branch_name;
      $data['estimationId'] = $row->id;
      $data['purchaseId'] = $row->po_id;
      $data['estimationDate'] = $row->estimation_dateFormat;
      $data['estimationNumber'] = $row->estimation_number;
      $data['estimationAmount'] = $row->estimation_amount;
      $data['estimationDoc'] = $row->job_report;
      $data['purchaseDate'] = $row->purchase_dateFormat;
      $data['validityEnd'] = $row->validity_endFormat;
      $data['purchaseTitle'] = $row->purchase_title;
      $data['purchaseNumber'] = $row->purchase_number;
      $data['purchaseAmount'] = $row->purchase_amount;
      $data['invoiceDate'] = $row->taxinvoice_date;
      $data['callupNumber'] = $row->callup_number;
      $data['netAmount'] = $row->net_amount;
      $data['invoiceNumber'] = $row->taxinvoice_number;
      $data['invoiceDoc'] = $row->taxinvoice_doc;
      $data['invoiceAmount'] = $row->taxinvoice_amount;
      $data['retentionId'] = $row->retention_id;
      $data['retentionStatus'] = $row->retention_status;
      $data['amountReceivedDate'] = $row->received_dateFormat;
      $data['retentionReceivedDate'] = $row->retention_received_dateFormat;
      $data['retentionDate'] = $row->retention_dateFormat;
      $data['receivedAmount'] = $row->received_amount;
      $data['TDSAmount'] = $row->tds_amount;
      $data['WCTAmount'] = $row->wct_amount;
      $data['retentionAmount'] = $row->retention_amount;
      $data['holdAmount'] = $row->hold_amount;
      $data['receivedBank'] = $row->bank_name;
      $data['retentionDocument'] = $row->retention_img;
      $data['status'] = $row->status;
      $data['securityStatus'] = $row->security_status;
    }
    echo json_encode($data);
  }

  //Taxinvoice Save Form
  public function taxinvoiceFormSave()
  {
    $estimationId = $this->input->post('estimation_id');
    $purchaseId = $this->input->post('purchase_id');
    $taxinvoiceDate = $this->input->post('invoice_date');
    $callupNumber = $this->input->post('callup_number');
    $taxinvoiceNumber = $this->input->post('invoice_number');
    $netAmount = $this->input->post('net_amount');
    $taxinvoiceAmount = $this->input->post('invoice_amount');

    $invoiceDoc = $this->input->post('alter_invoice_doc');
    
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');

    $invoiceDocDir = './uploads/invoice_doc/';

    // Security Amount Receipt
    if (isset($_FILES['invoice_doc'])) {
      $filesArray = $_FILES['invoice_doc'];
      $uploadedFiles['invoice_doc'] = $this->common->fileUpload($filesArray, $invoiceDocDir, $allowTypes);
    }

    $invoiceDoc_img = $uploadedFiles['invoice_doc'][0];

    if ($_FILES["invoice_doc"]["name"] == FALSE) {
      $invoiceDoc_img = $invoiceDoc;
    }

    if ($taxinvoiceNumber) {
      $checkExists = $this->purchasemodel->checkInvoiceNumber($taxinvoiceNumber);
      if ($checkExists > 0) {
        $data["isError"] = TRUE;
        $data["message"] = "Invoice Number Already Exists";
        echo json_encode($data);
        return;
      }
    }

    $this->purchasemodel->saveTaxinvoiceForm($estimationId, $purchaseId, $taxinvoiceDate, $callupNumber, $taxinvoiceNumber, $invoiceDoc_img, $netAmount, $taxinvoiceAmount);
    
    $data["isError"] = FALSE;
    if ($estimationId > 0) {
      $data["message"] = "Taxinvoice Created";
    } else {
      $data["message"] = "Taxinvoice Updated";
    }

    echo json_encode($data);
    return;
  }

  //Taxinvoice Amount Received Save Form
  public function taxAmountReceivedFormSave()
  {
    $retentionId = $this->input->post('retention_id');
    $estimationId = $this->input->post('estimation_id');
    $receivedDate = $this->input->post('received_date');
    $retentionDate = $this->input->post('retention_date');
    $receivedAmount = $this->input->post('received_amount');
    $tdsAmount = $this->input->post('tds_amount');
    $wctAmount = $this->input->post('wct_amount');
    $retentionAmount = $this->input->post('retention_amount');
    $holdAmount = $this->input->post('hold_amount');
    $bankName = $this->input->post('bank_name');

    $retentionDoc = $this->input->post('alter_retention_doc');
    
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');

    $retentionDocDir = './uploads/retention_doc/';

    // Security Amount Receipt
    if (isset($_FILES['retention_doc'])) {
      $filesArray = $_FILES['retention_doc'];
      $uploadedFiles['retention_doc'] = $this->common->fileUpload($filesArray, $retentionDocDir, $allowTypes);
    }

    $retentionDoc_img = $uploadedFiles['retention_doc'][0];

    if ($_FILES["retention_doc"]["name"] == FALSE) {
      $retentionDoc_img = $retentionDoc;
    }

    $this->purchasemodel->saveTaxAmountReceivedForm($retentionId, $estimationId, $receivedDate, $retentionDate, $receivedAmount, $tdsAmount, $wctAmount, $retentionAmount, $holdAmount, $bankName, $retentionDoc_img);
    
    $data["isError"] = FALSE;
    if ($retentionId > 0) {
      $data["message"] = "Tax Amount Received";
    } else {
      $data["message"] = "Tax Amount Updated";
    }

    echo json_encode($data);
    return;
  }

  public function purchaseOrderSaveForm()
  {
    $poId = $this->input->post('po_id');
    $branchId = $this->input->post('branch_id');
    $companyName = $this->input->post('company_name');
    $poDate = $this->input->post('po_date');
    $validityEnd = $this->input->post('validity_end');
    $purchaseOrderNo = $this->input->post('purchase_order_no');
    $poTitle = $this->input->post('po_title');
    $securityAmount = $this->input->post('security_amount');
    $purchaseAmount = $this->input->post('purchase_amount');
    $gstNumber = $this->input->post('gst_number');
    $gstPercentage = $this->input->post('gst_percentage');
    $vendorCode = $this->input->post('vendor_code');
    $panNumber = $this->input->post('pan_number');
    $hpclGstNumber = $this->input->post('hpcl_gst_number');
    $hpclAddress = $this->input->post('hpcl_address');

    $alterSecurityAmountReceipt = $this->input->post('alter_security_amount_receipt');
    $alterPurchaseOrderLetter = $this->input->post('alter_purchase_order_letter');
    $alterSecurityAmountDD = $this->input->post('alter_security_amount_dd');
    
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');

    $securityAmountReceiptUploadDir = './uploads/security_amount_receipt/';
    $purchaseOrderLetterUploadDir = './uploads/purchase_order_letter/';
    $securityAmountDDUploadDir = './uploads/security_amount_dd/';

    // Security Amount Receipt
    if (isset($_FILES['security_amount_receipt'])) {
      $filesArray = $_FILES['security_amount_receipt'];
      $uploadedFiles['security_amount_receipt'] = $this->common->fileUpload($filesArray, $securityAmountReceiptUploadDir, $allowTypes);
    }

    // purchase order letter
    if (isset($_FILES['purchase_order_letter'])) {
      $filesArray = $_FILES['purchase_order_letter'];
      $uploadedFiles['purchase_order_letter'] = $this->common->fileUpload($filesArray, $purchaseOrderLetterUploadDir, $allowTypes);
    }

    // Security Amount DD
    if (isset($_FILES['security_amount_dd'])) {
      $filesArray = $_FILES['security_amount_dd'];
      $uploadedFiles['security_amount_dd'] = $this->common->fileUpload($filesArray, $securityAmountDDUploadDir, $allowTypes);
    }

    $securityAmountReceipt_img = $uploadedFiles['security_amount_receipt'][0];
    $purchaseOrderLetter_img = $uploadedFiles['purchase_order_letter'][0];
    $securityAmountDD_img = $uploadedFiles['security_amount_dd'][0];

    if ($_FILES["security_amount_receipt"]["name"] == FALSE) {
      $securityAmountReceipt_img = $alterSecurityAmountReceipt;
    }
    if ($_FILES["purchase_order_letter"]["name"] == FALSE) {
      $purchaseOrderLetter_img = $alterPurchaseOrderLetter;
    }
    if ($_FILES["security_amount_dd"]["name"] == FALSE) {
      $securityAmountDD_img = $alterSecurityAmountDD;
    }

    if ($poId < 0 || $poId == '') {
      $checkExists = $this->purchasemodel->checkPoNumber($purchaseOrderNo);
      if ($checkExists > 0) {
        $data["isError"] = TRUE;
        $data["message"] = "Purchase Number Already Exists";
        echo json_encode($data);
        return;
      }
    }

    $this->purchasemodel->purchaseOrderSaveData($poId, $branchId, $companyName, $poDate, $validityEnd, $purchaseOrderNo, $poTitle, $securityAmount, $gstNumber, $gstPercentage, $vendorCode, $panNumber, $hpclGstNumber, $hpclAddress, $securityAmountReceipt_img, $purchaseOrderLetter_img, $securityAmountDD_img, $purchaseAmount);

    $data["isError"] = FALSE;
    if ($poId > 0) {
      $data["message"] = "Updated Successfully";
    } else {
      $data["message"] = "Created Successfully";
    }
    echo json_encode($data);
    return;
  }

  public function estimationSaveForm()
  {
    $estId = $this->input->post('est_id');
    $branchId = $this->input->post('branch_id');
    $companyName = $this->input->post('company_name');
    $purchaseOrderId = $this->input->post('purchase_id');
    $estimationDate = $this->input->post('estimation_date');
    $estimationNumber = $this->input->post('estimation_number');
    $estimationAmount = $this->input->post('estimation_amount');
    $invoiceDate = $this->input->post('invoice_date');
    $callupNumber = $this->input->post('callup_number');
    $invoiceNumber = $this->input->post('invoice_number');
    $netAmount = $this->input->post('net_amount');
    $invoiceAmount = $this->input->post('invoice_amount');
    $receivedDate = $this->input->post('received_date');
    $retentionDate = $this->input->post('retention_date');
    $receivedAmount = $this->input->post('received_amount');
    $tdsAmount = $this->input->post('tds_amount');
    $wctAmount = $this->input->post('wct_amount');
    $retentionAmount = $this->input->post('retention_amount');
    $holdAmount = $this->input->post('hold_amount');
    $bankName = $this->input->post('bank_name');
    $status = $this->input->post('status');

    $jobReport = $this->input->post('alter_job_report');
    $retentionDoc = $this->input->post('alter_retention_doc');
    $invoiceDoc = $this->input->post('alter_invoice_doc');
    
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');

    $jobReportDir = './uploads/job_report/';
    $retentionDocDir = './uploads/retention_doc/';
    $invoiceDocDir = './uploads/invoice_doc/';

    // Security Amount Receipt
    if (isset($_FILES['job_report'])) {
      $filesArray = $_FILES['job_report'];
      $uploadedFiles['job_report'] = $this->common->fileUpload($filesArray, $jobReportDir, $allowTypes);
    }
    // Security Amount Receipt
    if (isset($_FILES['retention_doc'])) {
      $filesArray = $_FILES['retention_doc'];
      $uploadedFiles['retention_doc'] = $this->common->fileUpload($filesArray, $retentionDocDir, $allowTypes);
    }
    // Security Amount Receipt
    if (isset($_FILES['invoice_doc'])) {
      $filesArray = $_FILES['invoice_doc'];
      $uploadedFiles['invoice_doc'] = $this->common->fileUpload($filesArray, $invoiceDocDir, $allowTypes);
    }

    $jobReport_img = $uploadedFiles['job_report'][0];
    $retentionDoc_img = $uploadedFiles['retention_doc'][0];
    $invoiceDoc_img = $uploadedFiles['invoice_doc'][0];

    if ($_FILES["job_report"]["name"] == FALSE) {
      $jobReport_img = $jobReport;
    }
    if ($_FILES["retention_doc"]["name"] == FALSE) {
      $retentionDoc_img = $retentionDoc;
    }
    if ($_FILES["invoice_doc"]["name"] == FALSE) {
      $invoiceDoc_img = $invoiceDoc;
    }

    if ($estId < 0 || $estId == '') {
      $checkExists = $this->purchasemodel->checkEstimationNumber($estimationNumber);
      if ($checkExists > 0) {
        $data["isError"] = TRUE;
        $data["message"] = "Estimation Number Already Exists";
        echo json_encode($data);
        return;
      }
    }

    $this->purchasemodel->estimationSaveData($estId, $branchId, $companyName, $purchaseOrderId, $estimationDate, $estimationNumber, $estimationAmount, $jobReport_img, $invoiceDate, $callupNumber, $invoiceNumber, $netAmount, $invoiceAmount, $receivedDate, $retentionDate, $receivedAmount, $tdsAmount, $wctAmount, $retentionAmount, $holdAmount, $bankName, $jobReport, $retentionDoc_img, $invoiceDoc_img, $status);

    $data["isError"] = FALSE;
    if ($estId > 0) {
      $data["message"] = "Updated Successfully";
    } else {
      $data["message"] = "Created Successfully";
    }
    echo json_encode($data);
    return;
  }

  public function retention_money_list($companyName='', $pageStatus='', $branchId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'retention';
      $data["menu_status"] = 'retention_' . $companyName;

      $data["activeLink"] = $pageStatus;
      $data["companyName"] = $companyName;
      $data['retentionMoneyList'] = $this->purchasemodel->getRetentionMoneyList($companyName, $pageStatus, $branchId);
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $retentionMoneyTotalValue = $this->purchasemodel->getRetentionMoneyTotalValue($companyName, $pageStatus, $branchId);
      foreach ($retentionMoneyTotalValue as $row) {
        $data['overallReceivedAmount'] = $row->overall_received_amount;
        $data['overallRetentionMoney'] = $row->overall_retention_amount;
        $data['overallTaxAmount'] = $row->overall_tax_amount;
        $data['overallHoldAmount'] = $row->overall_hold_amount;
      }

      if ($branchId != '') {
        $branchData = $this->purchasemodel->branchListData($branchId);
        foreach ($branchData as $row) {
          $data['branch']=$row->branch;
        }
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/retention-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  public function security_amount_list($companyName='', $pageStatus='', $branchId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) {
      $data["menu_open"] = 'security';
      $data["menu_status"] = 'security_' . $companyName;

      $data["activeLink"] = $pageStatus;
      $data["companyName"] = $companyName;
      $data['securityAmountList'] = $this->purchasemodel->getSecurityAmountList($companyName, $pageStatus, $branchId);
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

      $purchaseOrderTotalValue = $this->purchasemodel->getPurchaseOrderTotalValue($companyName);
      foreach ($purchaseOrderTotalValue as $row) {
        $data['overallPoAmount']=$row->overall_purchase_amount;
        $data['securityAmount']=$row->overall_security_amount;
        $data['overallTaxinvoiceAmount']=$row->overall_taxinvoice_amount;
        $data['overallEstimationAmount']=$row->overall_estimation_amount;
        $data['overallRetentionAmount']=$row->overall_retention_amount;
        $data['balancePoAmount']=$row->overall_balance_amount;
      }

      $securityAmountTotalValue = $this->purchasemodel->getSecurityAmountTotalValue($companyName, $pageStatus, $branchId);
      foreach ($securityAmountTotalValue as $row) {
        $data['overallSecurityAmount']=$row->overall_security_amount;
        $data['overallNotreceivedAmount']=$row->overall_notreceived_amount;
        $data['overallReceivedAmount']=$row->overall_received_amount;
        $data['overallBalanceAmount']=$row->overall_balance_amount;
      }

      if ($branchId != '') {
        $branchData = $this->purchasemodel->branchListData($branchId);
        foreach ($branchData as $row) {
          $data['branch']=$row->branch;
        }
      }

      $this->load->view('settings/header', $data);
      $this->load->view('purchase-order/security-list', $data);
      $this->load->view('settings/footer');
    } else {
        $this->load->view('settings/header_link');
        $this->load->view('settings/no_permission');
        $this->load->view('settings/footer');
    }
  }

  //Retention Money Received Save Form
  public function retentionReceivedFormSave()
  {
    $retentionId = $this->input->post('retention_id');
    $receivedDate = $this->input->post('retention_received_date');
    $this->purchasemodel->saveRetentionReceivedForm($retentionId, $receivedDate);
    
    $data["isError"] = FALSE;
    if ($retentionId > 0) {
      $data["message"] = "Retention Money Received";
    } else {
      $data["message"] = "Retention Money Received";
    }

    echo json_encode($data);
    return;
  }

  //Security Amount Received Save Form
  public function securityReceivedFormSave()
  {
    $purchaseId = $this->input->post('purchase_id');
    $receivedDate = $this->input->post('security_received_date');

    $this->purchasemodel->saveSecurityAmountReceivedForm($purchaseId, $receivedDate);
    
    $data["isError"] = FALSE;
    if ($purchaseId > 0) {
      $data["message"] = "Security Amount Received";
    } else {
      $data["message"] = "Security Amount Received";
    }

    echo json_encode($data);
    return;
  }
}