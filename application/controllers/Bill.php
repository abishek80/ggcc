<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

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
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_open"] = 'party_payment';
      $data["menu_status"] = 'party_' . $companyName;

      $data['allPartyPaymentList'] = $this->billmodel->getAllPartyPaymentList($companyName);

      $partyPaymentTotalValue = $this->billmodel->getPartyPaymentTotalValue($companyName);
      foreach ($partyPaymentTotalValue as $row) {
        $data['purchaseAmount'] = $row->purchase_amount;
        $data['paidAmount'] = $row->paid_amount;
        $data['balanceAmount'] = $row->balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('party_payment/party-payment-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }
  
  public function party_payment_list($companyName = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_open"] = 'party_payment';
      $data["menu_status"] = 'party_' . $companyName;
      
      $data["companyName"] = $companyName;
      $data['allPartyPaymentList'] = $this->billmodel->getAllPartyPaymentList($companyName);

      $partyPaymentTotalValue = $this->billmodel->getPartyPaymentTotalValue($companyName);
      foreach ($partyPaymentTotalValue as $row) {
        $data['purchaseAmount'] = $row->purchase_amount;
        $data['paidAmount'] = $row->paid_amount;
        $data['balanceAmount'] = $row->balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('party_payment/party-payment-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function party_payment_view($companyName='', $partyId='', $partyZone='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_open"] = 'party_payment';
      $data["menu_status"] = 'party_' . $companyName;

      $data['unpaidBillList'] = $this->billmodel->getUnpaidBillList($companyName, $partyId, $partyZone);
      $data['paidBillList'] = $this->billmodel->getPaidBillList($companyName, $partyId, $partyZone);

      $partyNameDetail = $this->billmodel->partyNameListData($partyId);
      foreach ($partyNameDetail as $row) {
        $data['partyId'] = $row->id;
        $data['companyName'] = $row->company_name;
        $data['partyName'] = $row->party_name;
        $data['msme'] = $row->msme;
        $data['partyZone'] = $partyZone;
      }

      $partyPaymentDetail = $this->billmodel->getPartyDetail($companyName, $partyId, $partyZone, 'unpaid');
      foreach ($partyPaymentDetail as $row) {
        $data['purchaseUnpaidAmount'] = $row->purchase_amount;
        $data['paidUnpaidAmount'] = $row->paid_amount;
        $data['balanceUnpaidAmount'] = $row->balance_amount;
      }

      $partyPaymentDetail = $this->billmodel->getPartyDetail($companyName, $partyId, $partyZone, 'paid');
      foreach ($partyPaymentDetail as $row) {
        $data['purchasePaidAmount'] = $row->purchase_amount;
        $data['paidPaidAmount'] = $row->paid_amount;
        $data['balancePaidAmount'] = $row->balance_amount;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('party_payment/party-payment-view', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function party_payment_report($partyPaymentId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_open"] = 'party_payment';

      $data['paymentReportList'] = $this->billmodel->getPaymentReportList($partyPaymentId);

      $partyPurchaseDetail = $this->billmodel->getPartyPurchaseDetail($partyPaymentId);
      foreach ($partyPurchaseDetail as $row) {
        $data['partyPaymentId'] = $row->id;
        $data['companyName'] = $row->company_name;
        $data['partyId'] = $row->party_id;
        $data['partyName'] = $row->party_name;
        $data['purchaseZone'] = $row->purchase_zone;
        $data['purchaseDate'] = $row->purchase_dateFormat;
        $data['purchaseValidityendDate'] = $row->validityend_dateFormat;
        $data['purchaseNumber'] = $row->purchase_number;
        $data['purchaseBill'] = $row->purchase_bill;
        $data['purchaseAmount'] = $row->purchase_amount;
        $data['paidAmount'] = $row->paid_amount;
        $data['purchaseAmount'] = $row->purchase_amount;
        $data['balanceAmount'] = $row->balance_amount;
        $data['status'] = $row->status;
      }

      $data["menu_status"] = 'party_' . $partyPurchaseDetail[0]->company_name;

      $this->load->view('settings/header', $data);
      $this->load->view('party_payment/party-payment-report', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function party_payment_add($companyName='', $partyId='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_open"] = 'party_payment';
      $data["menu_status"] = 'party_' . $companyName;

      $data['formTitle'] = "Add Party Payment";
      $data['companyName'] = $companyName;
      $data['partyId'] = $partyId;
      
      $partyNameInfo = $this->mastermodel->getPartyNameInfo($partyId);
      foreach ($partyNameInfo as $row) {
          $data['partyNameId'] = $row->id;
          $data['partyNameToken'] = $row->token;
          $data['companyName'] = $row->company_name;
          $data['partyName'] = $row->party_name;
          $data['msmeValue'] = $row->msme;
          $data['status'] = $row->status;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('party_payment/party-payment-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function party_payment_edit($partyPaymentId)
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_open"] = 'party_payment';
      $data["menu_status"] = 'party_' . $companyName;

      $data['formTitle'] = "Edit Party Payment";
      $data['companyName'] = $companyName;
      $data['partyId'] = $partyId;
      $data['partyNameDropdown'] = $this->mastermodel->getPartyNameDropdown();

      $partyPurchaseDetail = $this->billmodel->getPartyPurchaseDetail($partyPaymentId);
      foreach ($partyPurchaseDetail as $row) {
        $data['partyPaymentId'] = $row->id;
        $data['companyName'] = $row->company_name;
        $data['partyId'] = $row->party_id;
        $data['partyName'] = $row->party_name;
        $data['purchaseZone'] = $row->purchase_zone;
        $data['purchaseDate'] = $row->purchase_date;
        $data['purchaseValidityendDate'] = $row->validityend_date;
        $data['purchaseNumber'] = $row->purchase_number;
        $data['purchaseAmount'] = $row->purchase_amount;
        $data['purchaseBill'] = $row->purchase_bill;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('party_payment/party-payment-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function getPartyPaymentDetail()
  {
    $partyPaymentId = $this->input->post('partyPaymentId');
    
    $partyPurchaseDetail = $this->billmodel->getPartyPurchaseDetail($partyPaymentId);
    foreach ($partyPurchaseDetail as $row) {
      $data['partyPaymentId'] = $row->id;
      $data['companyName'] = $row->company_name;
      $data['partyId'] = $row->party_id;
      $data['partyName'] = $row->party_name;
      $data['purchaseZone'] = $row->purchase_zone;
      $data['purchaseDate'] = $row->purchase_dateFormat;
      $data['purchaseValidityendDate'] = $row->validityend_dateFormat;
      $data['purchaseNumber'] = $row->purchase_number;
      $data['purchaseBill'] = $row->purchase_bill;
      $data['purchaseAmount'] = $row->purchase_amount;
      $data['paidAmount'] = $row->paid_amount;
      $data['purchaseAmount'] = $row->purchase_amount;
      $data['balanceAmount'] = $row->balance_amount;
      $data['status'] = $row->status;
    }
    echo json_encode($data);
  }

  public function partyPaymentSaveForm()
  {
    $partyPaymentId = $this->input->post('party_payment_id');
    $partyId = $this->input->post('party_id');
    $companyName = $this->input->post('company_name');
    $partyName = $this->input->post('party_name');
    $purchaseZone = $this->input->post('purchase_zone');
    $purchaseDate = $this->input->post('purchase_date');
    $purchaseValidityendDate = $this->input->post('purchase_validityend_date');
    $purchaseNumber = $this->input->post('purchase_number');
    $purchaseAmount = $this->input->post('purchase_amount');

    $alterPurchasebill = $this->input->post('alter_purchase_bill');
    
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx', 'xls', 'xlsx');

    $purchaseBillUploadDir = './uploads/purchase_bill/';

    // Purchase Document
    if (isset($_FILES['purchase_bill'])) {
      $filesArray = $_FILES['purchase_bill'];
      $uploadedFiles['purchase_bill'] = $this->common->fileUpload($filesArray, $purchaseBillUploadDir, $allowTypes);
    }

    $purchaseBill_img = $uploadedFiles['purchase_bill'][0];

    if ($_FILES["purchase_bill"]["name"] == FALSE) {
      $purchaseBill_img = $alterPurchasebill;
    }

    if ($partyPaymentId < 0 || $partyPaymentId == '') {
      $checkExists = $this->billmodel->checkPurchaseNumber($purchaseNumber);
      if ($checkExists > 0) {
        $data["isError"] = TRUE;
        $data["message"] = "Purchase Number Already Exists";
        echo json_encode($data);
        return;
      }
    }

    $this->billmodel->partyPurchaseSaveData($partyPaymentId, $partyId, $companyName, $partyName, $purchaseZone, $purchaseDate, $purchaseValidityendDate, $purchaseNumber, $purchaseAmount, $purchaseBill_img);

    $data["isError"] = FALSE;
    if ($partyPaymentId > 0) {
      $data["message"] = "Updated Successfully";
    } else {
      $data["message"] = "Created Successfully";
    }
    echo json_encode($data);
    return;
  }

  //Payment Save Form
  public function partyPaymentFormSave()
  {
    $partyPaymentId = $this->input->post('party_payment_id');
    $partyId = $this->input->post('party_id');
    $paymentDate = $this->input->post('payment_date');
    $paymentAmount = $this->input->post('payment_amount');
    $paymentMethod = $this->input->post('payment_method');

    if ($partyPaymentId) {
      $checkPaymentData = $this->billmodel->checkPurchaseBalanceAmount($partyPaymentId);
      
      if (!empty($checkPaymentData)) {
        $paidAmount = $checkPaymentData[0]->paid_amount;
        $balanceAmount = $checkPaymentData[0]->balance_amount;
        $purchaseAmount = $checkPaymentData[0]->purchase_amount;
        $newBalance = $paidAmount + $paymentAmount;

        if ($newBalance == $purchaseAmount) {
          $this->billmodel->savePartyPaymentForm($partyPaymentId, $partyId, $paymentDate, $paymentAmount, $paymentMethod, 'paid');
        } else {
          $this->billmodel->savePartyPaymentForm($partyPaymentId, $partyId, $paymentDate, $paymentAmount, $paymentMethod, 'unpaid');
        }
      } else {
        print_r('No data found for partyPaymentId: ' . $partyPaymentId);
      }
    }
  
    $data["isError"] = FALSE;
    $data["message"] = "Payment Sended";

    echo json_encode($data);
    return;
  }
  
  public function pettycash_list($year='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      if ($year == '') {
        $year = date('Y');
      }
      $data["menu_status"] = 'petty_cash';
      $data["activeLink"] = $year;
      $data["yearList"] = [date('Y'), (date('Y') - 1)];
      
      $data['pettycashBranchList'] = $this->billmodel->getPettycashBranchList($year);

      $this->load->view('settings/header', $data);
      $this->load->view('pettycash/pettycash_list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function pettycash_view($year='', $branch='', $month='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_status"] = 'petty_cash';
      $data["year"] = $year;
      $data["month"] = $month;
      $data["branchId"] = $branch;

      $branchInfo = $this->mastermodel->getBranchInfo($branch);
      foreach ($branchInfo as $row) {
          $data['branchName'] = $row->branch;
      }

      $data['pettycashMonthList'] = $this->billmodel->getPettycashMonthList($year, $branch);
      $data['pettycashList'] = $this->billmodel->getPettycashList($year, $branch, $month);

      $this->load->view('settings/header', $data);
      $this->load->view('pettycash/pettycash_view', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function pettycash_add($year='', $branch='', $month='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_status"] = 'petty_cash';
      $data["year"] = $year;
      $data["month"] = $month;
      $data["branchId"] = $branch;

      $data['formTitle'] = "Add Petty Cash";
      
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['pettycashTitleDropdown'] = $this->mastermodel->pettycashTitleDropdown();

      $this->load->view('settings/header', $data);
      $this->load->view('pettycash/pettycash_add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function pettycash_edit($pettycashId)
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('account_management', $userPermission)) {
      $data["menu_status"] = 'petty_cash';

      $data['formTitle'] = "Edit Petty Cash";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['pettycashTitleDropdown'] = $this->mastermodel->pettycashTitleDropdown();

      $pattycashInfo = $this->billmodel->getPettycashInfo($pettycashId);
      foreach ($pattycashInfo as $row) {
        $data['pettycashId'] = $row->id;
        $data['year'] = $row->year;
        $data['month'] = $row->month;
        $data['branchId'] = $row->branch;
        $data['paidDate'] = $row->paid_date;
        $data['titleId'] = $row->title;
        $data['amount'] = $row->amount;
        $data['remarks'] = $row->remarks;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('pettycash/pettycash_add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  //Petty Cash Save Form //
  public function pettycashFormSave()
  {
      $pettycashId = $this->input->post('pettycash_id');
      $pettycashDate = $this->input->post('pettycash_date');
      $branch = $this->input->post('branch');
      $pettycashTitle = $this->input->post('pettycash_title');
      $pettycashAmount = $this->input->post('pettycash_amount');
      $remarks = $this->input->post('remarks');

      $this->billmodel->savePettycashFormData($pettycashId, $pettycashDate, $branch, $pettycashTitle, $pettycashAmount, $remarks);
      
      $data["isError"] = FALSE;
      if ($pettycashId > 0) {
          $data["message"] = "Petty Cash Updated";
      } else {
          $data["message"] = "Petty Cash Created";
      }

      echo json_encode($data);
      return;
  }
}