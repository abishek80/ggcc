<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vehiclemodel');
        $this->load->model('purchasemodel');
        $this->load->model('Common_model','common');
    }

    /**
     * Monthly Trigger Email
     */
    public function monthlyTriggerEmail()
    {
        // Allow CLI OR secure URL access
        if (!$this->input->is_cli_request()) {
            $token = $this->input->get('token');
            if ($token !== '9aX7kP2LmQ8tR4Yw') {
                show_error('Unauthorized Access', 403);
            }
        }

        $year  = date('Y');
        $month = date('m');

        // Fetch data
        $data['insuranceRenewalList'] = $this->vehiclemodel->getVehicleRenewalList($year, $month, 'insurance');
        $data['fcRenewalList']        = $this->vehiclemodel->getVehicleRenewalList($year, $month, 'fc');
        $data['pucRenewalList']       = $this->vehiclemodel->getVehicleRenewalList($year, $month, 'puc');

        $data['retentionMoneyList']   = $this->purchasemodel->getRetentionMoneyReminderList($year, $month);

        // If nothing to send — stop execution
        if (
            empty($data['insuranceRenewalList']) &&
            empty($data['fcRenewalList']) &&
            empty($data['pucRenewalList'])
        ){
            echo "No renewals for this month.";
            return;
        }

        $data['monthText'] = date("F", mktime(0,0,0,$month,1));
        $data['year']      = $year;

        $subject = $data['monthText']." ".$year." - Upcoming Renewal List";

        $message = $this->load->view(
            'email_template/renewal_email_template',
            $data,
            TRUE
        );

        // Multiple recipients
        $emails = [
            'antonyabishek80@gmail.com'
        ];

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        echo "Renewal emails sent successfully.";
    }

    /**
     * Daily Trigger Email
     */
    public function dailyTriggerEmail()
    {
        // Allow CLI OR secure URL access
        if (!$this->input->is_cli_request()) {
            $token = $this->input->get('token');
            if ($token !== '9aX7kP2LmQ8tR4Yw') {
                show_error('Unauthorized Access', 403);
            }
        }

        $today = date('Y-m-d');

        $purchaseOrderList = $this->purchasemodel->getAllPurchaseOrdersList();

        if (empty($purchaseOrderList)) {
            echo "No Purchase Orders found.";
            return;
        }

        foreach ($purchaseOrderList as $row)
        {

            $poDate             = $data['poDate']            = $row->po_date;
            $validityEndDate    = $data['validityEndDate']   = $row->validity_end;
            $poDateFormat       = $data['poDateFormat']      = $row->po_dateFormat;
            $validityEndFormat  = $data['validityEndFormat'] = $row->validity_endFormat;
            $poNumber           = $data['poNumber']          = $row->purchase_order_no;
            $companyName        = $data['companyName']       = $row->company_name;
            $branchName         = $data['branchName']        = $row->branch_name;
            $zone               = $data['zone']              = $row->zone;
            $poTitle            = $data['poTitle']           = $row->po_title;
            $poAmount           = $data['poAmount']          = $row->po_amount;
            $balanceAmount      = $data['balanceAmount']     = $row->balance_amount;
            
            $PoRemainingDate = floor((strtotime($validityEndDate) - strtotime($today)) / (60*60*24));
            $data['PoRemainingDate'] = $PoRemainingDate;

            $emails = [
                'antonyabishek80@gmail.com'
            ];

            // =========================
            // 📅 Purchase OrderDATE BASED (EXACT DAY)
            // =========================
            if ($PoRemainingDate == 60) {
                $this->sendBulkPOEmail($emails, "PO Expiry in 60 Days", $data);
            }
            if ($PoRemainingDate == 30) {
                $this->sendBulkPOEmail($emails, "PO Expiry in 30 Days", $data);
            }
            if ($PoRemainingDate == 15) {
                $this->sendBulkPOEmail($emails, "PO Expiry in 15 Days", $data);
            }
            if ($PoRemainingDate == 3) {
                $this->sendBulkPOEmail($emails, "PO Expiry in 3 Days", $data);
            }


            // =========================
            // 💰 BALANCE AMOUNT BASED (SAFE RANGE)
            // =========================
            if ($balanceAmount <= 10000 && $balanceAmount > 5000) {
                $this->sendBulkPOEmail($emails, "Balance dropped below 10000", $data);
            }
            if ($balanceAmount <= 5000 && $balanceAmount > 1000) {
                $this->sendBulkPOEmail($emails, "Balance dropped below 5000", $data);
            }
            if ($balanceAmount <= 1000) {
                $this->sendBulkPOEmail($emails, "Balance dropped below 1000", $data);
            }
        }

        echo "Daily PO alerts processed.";
    }
    
    public function sendBulkPOEmail($emails, $subject, $data)
    {
        $message = $this->load->view(
            'email_template/purchase_order_email_template',
            $data,
            TRUE
        );

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }
    }
}