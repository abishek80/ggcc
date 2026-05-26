<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vehiclemodel');
        $this->load->model('purchasemodel');
        $this->load->library('common');
    }

    /**
     * Monthly Trigger Email
     */
    public function monthlyTriggerEmail()
    {
        // Allow CLI OR secure URL access
        if (!is_cli()) {
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
            'email_template/vehicle_renewal_template',
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
        if (!is_cli()) {
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

        // Initialize lists for each alert category
        $data['poExpiry60'] = [];
        $data['poExpiry30'] = [];
        $data['poExpiry15'] = [];
        $data['poExpiry3']  = [];

        $data['poBalance10000'] = [];
        $data['poBalance5000']  = [];
        $data['poBalance1000']  = [];

        foreach ($purchaseOrderList as $row)
        {
            $validityEndDate = $row->validity_end;
            $balanceAmount   = $row->balance_amount;
            
            $PoRemainingDate = floor((strtotime($validityEndDate) - strtotime($today)) / (60*60*24));
            $row->PoRemainingDate = $PoRemainingDate;

            // =========================
            // 📅 Purchase Order DATE BASED (EXACT DAY)
            // =========================
            if ($PoRemainingDate == 60) {
                $data['poExpiry60'][] = $row;
            } elseif ($PoRemainingDate == 30) {
                $data['poExpiry30'][] = $row;
            } elseif ($PoRemainingDate == 15) {
                $data['poExpiry15'][] = $row;
            } elseif ($PoRemainingDate == 3) {
                $data['poExpiry3'][] = $row;
            }

            // =========================
            // 💰 BALANCE AMOUNT BASED (SAFE RANGE)
            // =========================
            if ($balanceAmount <= 1000) {
                $data['poBalance1000'][] = $row;
            } elseif ($balanceAmount <= 5000 && $balanceAmount > 1000) {
                $data['poBalance5000'][] = $row;
            } elseif ($balanceAmount <= 10000 && $balanceAmount > 5000) {
                $data['poBalance10000'][] = $row;
            }
        }

        // Check if there is anything to alert
        if (
            empty($data['poExpiry60']) &&
            empty($data['poExpiry30']) &&
            empty($data['poExpiry15']) &&
            empty($data['poExpiry3']) &&
            empty($data['poBalance10000']) &&
            empty($data['poBalance5000']) &&
            empty($data['poBalance1000'])
        ) {
            echo "No PO alerts to send today.";
            return;
        }

        $emails = [
            'antonyabishek80@gmail.com'
        ];

        $subject = "Daily Purchase Order Alerts - Expiries & Low Balances";

        $message = $this->load->view(
            'email_template/purchase_order_template',
            $data,
            TRUE
        );

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        echo "Daily PO alerts processed and sent.";
    }
    
    public function sendBulkPOEmail($emails, $subject, $data)
    {
        $message = $this->load->view(
            'email_template/purchase_order_template',
            $data,
            TRUE
        );

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }
    }
}