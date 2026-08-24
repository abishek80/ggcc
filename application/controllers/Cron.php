<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vehiclemodel');
        $this->load->model('purchasemodel');
        $this->load->model('adminmodel');
        $this->load->library('common');
    }

    /**
     * Yearly Trigger Email
     */
    public function yearlyTriggerEmail()
    {
        // Allow CLI OR secure URL access
        if (!is_cli()) {
            $token = $this->input->get('token');
            if ($token !== '9aX7kP2LmQ8tR4Yw') {
                show_error('Unauthorized Access', 403);
            }
        }
        
        $currentYear = date('Y');
        $count = $this->adminmodel->duplicateRepeatedEventsForYear($currentYear);
        
        // Fetch all active events for the current year
        $activePlans = $this->adminmodel->getActiveYearlyPlans($currentYear);
        
        // Group by month
        $groupedPlans = [];
        foreach ($activePlans as $plan) {
            $month = strtolower(date('F', strtotime($plan->date)));
            $groupedPlans[$month][] = $plan;
        }

        $data['year'] = $currentYear;
        $data['groupedPlans'] = $groupedPlans;

        $emails = [
            'drajan76@rediffmail.com',
            'antonyabishek80@gmail.com'
        ];

        $subject = "Overall Active Yearly Plans - $currentYear";
        $message = $this->load->view('email_template/yearly_plan_template', $data, TRUE);

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }
        
        echo "Yearly repeated events have been duplicated. Yearly digest email sent for $currentYear. (Duplicated: $count events)<br>";
        
        // Also trigger the yearly security amount email
        $this->sendSecurityYearlyEmail();
    }

    /**
     * Monthly Trigger Email
     */
    public function monthlyTriggerEmail()
    {
        $this->sendVehicleRenewalEmail();
        $this->sendRetentionMoneyEmail();
        $this->sendSecurityMonthlyEmail();
    }

    /**
     * Daily Trigger Email
     */
    public function dailyTriggerEmail($simDate = null, $simDay = null)
    {
        $this->sendPurchaseOrderEmail($simDate, $simDay);
        $this->sendEmployeeWorkReminderEmail($simDate);
    }
    
    public function sendVehicleRenewalEmail()
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

        // If nothing to send â€” stop execution
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

        // Preview mode: render to browser and exit
        if ($this->input->get('preview') == 1) {
            echo $message;
            return;
        }

        // Multiple recipients
        $emails = [
            'drajan76@rediffmail.com',
            'antonyabishek80@gmail.com'
        ];

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        // Insert Notifications
        $this->load->model('notificationmodel');
        $this->_addVehicleNotifications($data['insuranceRenewalList'], 'Vehicle Insurance Renewal Due');
        $this->_addVehicleNotifications($data['fcRenewalList'], 'Vehicle FC Renewal Due');
        $this->_addVehicleNotifications($data['pucRenewalList'], 'Vehicle PUC Renewal Due');

        echo "Renewal emails sent successfully.<br>";
    }

    public function sendRetentionMoneyEmail()
    {
        // Allow CLI OR secure URL access
        if (!is_cli()) {
            $token = $this->input->get('token');
            if ($token !== '9aX7kP2LmQ8tR4Yw') {
                show_error('Unauthorized Access', 403);
            }
        }

        $pendingRetentions = $this->purchasemodel->getPendingRetentionList();
        
        if (empty($pendingRetentions)) {
            echo "No pending retention money found for this month.<br>";
            return;
        }

        $groupedRetentions = [];
        foreach ($pendingRetentions as $retention) {
            $zone = $retention->zone ? $retention->zone : 'Unassigned Zone';
            $branchName = $retention->branch_name ? $retention->branch_name : 'Unassigned Branch';
            $branchGroup = $zone . ' Zone & ' . $branchName;
            $groupedRetentions[$branchGroup][] = $retention;
        }

        $data['monthText'] = date('F');
        $data['year'] = date('Y');
        $data['groupedRetentions'] = $groupedRetentions;

        $subject = "Retention Money Reminder - " . $data['monthText'] . " " . $data['year'];
        
        $message = $this->load->view('email_template/retention_reminder_template', $data, TRUE);

        $emails = [
            'antonyabishek80@gmail.com'
        ];

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        // Insert Notifications
        $this->load->model('notificationmodel');
        $this->_addRetentionNotifications($pendingRetentions, 'Retention Money Due');

        echo "Retention Money emails sent successfully.<br>";
    }

    public function sendSecurityYearlyEmail()
    {
        $year = date('Y');
        $securityAmounts = $this->purchasemodel->getPendingSecurityAmountListForCron($year);
        
        if (empty($securityAmounts)) {
            echo "No pending security amounts found for $year.<br>";
            return;
        }

        $groupedSecurity = [];
        foreach ($securityAmounts as $item) {
            $zone = $item->zone ? $item->zone : 'Unassigned Zone';
            $branchName = $item->branch_name ? $item->branch_name : 'Unassigned Branch';
            $branchGroup = $zone . ' Zone & ' . $branchName;
            $groupedSecurity[$branchGroup][] = $item;
        }

        $data['year'] = $year;
        $data['groupedSecurity'] = $groupedSecurity;

        $subject = "Yearly Security Amount Reminder - " . $year;
        
        $message = $this->load->view('email_template/security_yearly_template', $data, TRUE);

        $emails = [
            'antonyabishek80@gmail.com'
        ];

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        // Insert Notifications
        $this->load->model('notificationmodel');
        $this->_addSecurityNotifications($securityAmounts, 'Yearly Security Amount Reminder');

        echo "Yearly Security Amount emails sent successfully.<br>";
    }

    public function sendSecurityMonthlyEmail()
    {
        // Monthly trigger is meant to fetch records for the upcoming month
        $year = date('Y', strtotime('+1 month'));
        $month = date('m', strtotime('+1 month'));
        $monthText = date('F', strtotime('+1 month'));

        $securityAmounts = $this->purchasemodel->getPendingSecurityAmountListForCron($year, $month);
        
        if (empty($securityAmounts)) {
            echo "No pending security amounts found for $monthText $year.<br>";
            return;
        }

        $groupedSecurity = [];
        foreach ($securityAmounts as $item) {
            $zone = $item->zone ? $item->zone : 'Unassigned Zone';
            $branchName = $item->branch_name ? $item->branch_name : 'Unassigned Branch';
            $branchGroup = $zone . ' Zone & ' . $branchName;
            $groupedSecurity[$branchGroup][] = $item;
        }

        $data['year'] = $year;
        $data['monthText'] = $monthText;
        $data['groupedSecurity'] = $groupedSecurity;

        $subject = "Upcoming Monthly Security Amount Reminder - " . $monthText . " " . $year;
        
        $message = $this->load->view('email_template/security_monthly_template', $data, TRUE);

        $emails = [
            'antonyabishek80@gmail.com'
        ];

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        // Insert Notifications
        $this->load->model('notificationmodel');
        $this->_addSecurityNotifications($securityAmounts, 'Upcoming Security Amount Due');

        echo "Monthly Security Amount emails sent successfully.<br>";
    }

    public function sendPurchaseOrderEmail($simDate = null, $simDay = null)
    {
        // Allow CLI OR secure URL access
        if (!is_cli()) {
            $token = $this->input->get('token');
            if ($token !== '9aX7kP2LmQ8tR4Yw') {
                show_error('Unauthorized Access', 403);
            }
        }

        // Support simulated date/day for testing
        $today = date('Y-m-d');
        if ($simDate !== null) {
            $today = $simDate;
        } elseif (!is_cli() && $this->input->get('sim_date')) {
            $today = $this->input->get('sim_date');
        }

        $dayOfWeek = (int)date('N', strtotime($today));
        if ($simDay !== null) {
            $dayOfWeek = (int)$simDay;
        } elseif (!is_cli() && $this->input->get('sim_day')) {
            $dayOfWeek = (int)$this->input->get('sim_day');
        }

        $isMonthly = (date('j', strtotime($today)) == 1);
        $isPreview = (!is_cli() && $this->input->get('preview') == 1);

        $purchaseOrderList = $this->purchasemodel->getAllPurchaseOrdersList();

        if (empty($purchaseOrderList)) {
            echo "No Purchase Orders found.";
            return;
        }

        // Initialize lists for each alert category
        $data['poExpiry150'] = [];
        $data['poExpiry90'] = [];
        $data['poExpiry30'] = [];

        $data['poBalance500000'] = [];
        $data['poBalance300000'] = [];
        $data['poBalance100000'] = [];

        foreach ($purchaseOrderList as $row)
        {
            $validityEndDate = $row->validity_end;
            $balanceAmount   = (float)$row->balance_amount;
            
            $PoRemainingDate = floor((strtotime($validityEndDate) - strtotime($today)) / (60*60*24));
            $row->PoRemainingDate = $PoRemainingDate;

            // =========================================================================
            // ðŸ“… Purchase Order DATE BASED (Range matching on Monthly/Preview, Exact on other days)
            // =========================================================================
            if ($isMonthly || $isPreview) {
                if ($PoRemainingDate > 90 && $PoRemainingDate <= 150) {
                    $data['poExpiry150'][] = $row;
                } elseif ($PoRemainingDate > 30 && $PoRemainingDate <= 90) {
                    $data['poExpiry90'][] = $row;
                } elseif ($PoRemainingDate >= 0 && $PoRemainingDate <= 30) {
                    $data['poExpiry30'][] = $row;
                }
            } else {
                if ($PoRemainingDate == 150) {
                    $data['poExpiry150'][] = $row;
                } elseif ($PoRemainingDate == 90) {
                    $data['poExpiry90'][] = $row;
                } elseif ($PoRemainingDate == 30) {
                    $data['poExpiry30'][] = $row;
                }
            }

            // =========================================================================
            // ðŸ’° BALANCE AMOUNT BASED (Range matching on Monthly/Preview, First-Cross on other days)
            // =========================================================================
            if ($isMonthly || $isPreview) {
                // Compile the ranges for the Monthly Consolidated Digest
                if ($balanceAmount <= 100000) {
                    $data['poBalance100000'][] = $row;
                } elseif ($balanceAmount <= 300000 && $balanceAmount > 100000) {
                    $data['poBalance300000'][] = $row;
                } elseif ($balanceAmount <= 500000 && $balanceAmount > 300000) {
                    $data['poBalance500000'][] = $row;
                }

                // If Monthly Digest, we update database flags so they are marked as notified
                if ($isMonthly && !$isPreview) {
                    if ($balanceAmount <= 100000) {
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_100000_sent' => 1,
                            'bal_alert_300000_sent' => 1,
                            'bal_alert_500000_sent' => 1
                        ]);
                    } elseif ($balanceAmount <= 300000) {
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_100000_sent' => 0,
                            'bal_alert_300000_sent' => 1,
                            'bal_alert_500000_sent' => 1
                        ]);
                    } elseif ($balanceAmount <= 500000) {
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_100000_sent' => 0,
                            'bal_alert_300000_sent' => 0,
                            'bal_alert_500000_sent' => 1
                        ]);
                    } else {
                        // Reset all flags if balance goes back above 500000 (Self-healing)
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_100000_sent' => 0,
                            'bal_alert_300000_sent' => 0,
                            'bal_alert_500000_sent' => 0
                        ]);
                    }
                }
            } else {
                // Daily Critical Check (Trigger alert only when FIRST crossed)
                if ($balanceAmount <= 100000) {
                    if ($row->bal_alert_100000_sent == 0) {
                        $data['poBalance100000'][] = $row;
                    }
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_100000_sent' => 1,
                        'bal_alert_300000_sent' => 1,
                        'bal_alert_500000_sent' => 1
                    ]);
                } elseif ($balanceAmount <= 300000) {
                    if ($row->bal_alert_300000_sent == 0) {
                        $data['poBalance300000'][] = $row;
                    }
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_100000_sent' => 0,
                        'bal_alert_300000_sent' => 1,
                        'bal_alert_500000_sent' => 1
                    ]);
                } elseif ($balanceAmount <= 500000) {
                    if ($row->bal_alert_500000_sent == 0) {
                        $data['poBalance500000'][] = $row;
                    }
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_100000_sent' => 0,
                        'bal_alert_300000_sent' => 0,
                        'bal_alert_500000_sent' => 1
                    ]);
                } else {
                    // Reset all flags if balance goes back above 500000 (Self-healing)
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_100000_sent' => 0,
                        'bal_alert_300000_sent' => 0,
                        'bal_alert_500000_sent' => 0
                    ]);
                }
            }
        }

        // Check if there is anything to alert
        if (
            empty($data['poExpiry150']) &&
            empty($data['poExpiry90']) &&
            empty($data['poExpiry30']) &&
            empty($data['poBalance500000']) &&
            empty($data['poBalance300000']) &&
            empty($data['poBalance100000'])
        ) {
            if ($isPreview) {
                // Pass dynamic info to template
                $data['emailTitle'] = "Monthly Purchase Order Digest";
                $data['emailSubtext'] = "Consolidated Expiries &amp; Low Balance Reminders";
                $data['introText'] = "Below is the consolidated monthly report of all active Purchase Orders flagged with upcoming expiries or low balances.";
                $data['currentDate'] = date('d F, Y', strtotime($today));
                $this->load->view('email_template/purchase_order_template', $data);
                return;
            }
            echo "No PO alerts to send today.";
            return;
        }

        // Customize email subject and content
        if ($isMonthly) {
            $subject = "Monthly Purchase Order Consolidated Digest - " . date('d F, Y', strtotime($today));
            $data['emailTitle'] = "Monthly Purchase Order Digest";
            $data['emailSubtext'] = "Monthly Consolidated Expiries &amp; Low Balances";
            $data['introText'] = "Below is the consolidated monthly report of all active Purchase Orders flagged with upcoming expiries or low balances. Please review the status of these accounts.";
        } else {
            $subject = "Daily Purchase Order Critical Alerts - " . date('d F, Y', strtotime($today));
            $data['emailTitle'] = "Daily Purchase Order Critical Alerts";
            $data['emailSubtext'] = "Event-driven Expiry Milestones &amp; First-time Crossed Low Balances";
            $data['introText'] = "Below is a critical status alert for Purchase Orders that hit date expiry milestones or crossed balance limits today. Please take necessary actions.";
        }
        $data['currentDate'] = date('d F, Y', strtotime($today));

        if ($isPreview) {
            $this->load->view('email_template/purchase_order_template', $data);
            return;
        }

        $emails = [
            'drajan76@rediffmail.com',
            'antonyabishek80@gmail.com'
        ];

        $message = $this->load->view(
            'email_template/purchase_order_template',
            $data,
            TRUE
        );

        foreach ($emails as $email) {
            $this->common->email_data($email, $subject, $message);
        }

        // Insert Notifications for each alerted PO
        $this->load->model('notificationmodel');
        $this->_addNotifications($data['poExpiry150'], 'PO Expiry in 5 Months', 'purchase_order', 'expiry_alert');
        $this->_addNotifications($data['poExpiry90'], 'PO Expiry in 3 Months', 'purchase_order', 'expiry_alert');
        $this->_addNotifications($data['poExpiry30'], 'PO Expiry in 1 Month', 'purchase_order', 'expiry_alert');
        $this->_addNotifications($data['poBalance500000'], 'PO Balance Below ₹5,00,000', 'purchase_order', 'balance_alert');
        $this->_addNotifications($data['poBalance300000'], 'PO Balance Below ₹3,00,000', 'purchase_order', 'balance_alert');
        $this->_addNotifications($data['poBalance100000'], 'PO Balance Below ₹1,00,000', 'purchase_order', 'balance_alert');

        if (isset($isMonthly) && $isMonthly) {
            echo "Monthly PO digest processed and sent.";
        } else {
            echo "Daily PO critical alerts processed and sent.";
        }
    }

    public function sendEmployeeWorkReminderEmail($simDate = null)
    {
        // Allow CLI OR secure URL access
        if (!is_cli()) {
            $token = $this->input->get('token');
            if ($token !== '9aX7kP2LmQ8tR4Yw') {
                show_error('Unauthorized Access', 403);
            }
        }

        // Support simulated date for testing
        $today = date('Y-m-d');
        if ($simDate !== null) {
            $today = $simDate;
        } elseif (!is_cli() && $this->input->get('sim_date')) {
            $today = $this->input->get('sim_date');
        }

        // Target date is exactly 1 day after $today
        $targetDate = date('Y-m-d', strtotime($today . ' + 1 day'));

        $this->load->model('employeemodel');
        $pendingReports = $this->employeemodel->getPendingWorkReportsForReminder($targetDate);

        if (empty($pendingReports)) {
            echo "No pending work reports due on " . date('d/m/Y', strtotime($targetDate)) . " to remind.";
            return;
        }

        // Group pending reports by employee email
        $groupedReports = [];
        foreach ($pendingReports as $row) {
            $groupedReports[$row->employee_email][] = $row;
        }

        $isPreview = (!is_cli() && $this->input->get('preview') == 1);
        $emailsSent = 0;
        $totalReportsReminded = 0;

        foreach ($groupedReports as $email => $reports) {
            $employeeName = $reports[0]->employee_name;
            $isMultiple = (count($reports) > 1);

            $subject = $isMultiple 
                ? "Work Reports Reminder: Due Tomorrow (" . date('d/m/Y', strtotime($reports[0]->report_date)) . ")"
                : "Work Report Reminder: Due Tomorrow (" . date('d/m/Y', strtotime($reports[0]->report_date)) . ")";

            $data = [
                'employee_name' => $employeeName,
                'reports' => $reports
            ];

            $message = $this->load->view('email_template/employee_work_reminder_template', $data, TRUE);

            if ($isPreview) {
                echo $message;
                return; // Only preview the first employee's consolidated template
            }

            // Send consolidated email to employee
            $this->common->email_data($email, $subject, $message);

            // Update reminder_sent flag for all consolidated reports
            foreach ($reports as $row) {
                $this->employeemodel->updateWorkReportReminderFlag($row->report_id, 1);
                $totalReportsReminded++;
            }
            $emailsSent++;
        }

        echo "Successfully sent " . $emailsSent . " consolidated reminder email(s) alerting " . $totalReportsReminded . " pending report(s) due on " . date('d/m/Y', strtotime($targetDate)) . ".";
    }

    private function _addNotifications($list, $alertText, $moduleType, $notificationType) {
        if (empty($list)) return;
        foreach ($list as $item) {
            $msg = $alertText . ': ' . $item->po_title . ' (' . $item->purchase_order_no . ')';
            $this->notificationmodel->addNotification([
                'module_type' => $moduleType,
                'module_id' => $item->id,
                'notification_type' => $notificationType,
                'message' => $msg
            ]);
        }
    }

    private function _addVehicleNotifications($list, $alertText) {
        if (empty($list)) return;
        foreach ($list as $item) {
            $msg = $alertText . ': ' . $item->vehicle_name . ' (' . $item->vehicle_number . ')';
            $this->notificationmodel->addNotification([
                'module_type' => 'vehicle',
                'module_id' => $item->id,
                'notification_type' => 'renewal_alert',
                'message' => $msg
            ]);
        }
    }

    private function _addRetentionNotifications($list, $alertText) {
        if (empty($list)) return;
        foreach ($list as $item) {
            $msg = $alertText . ': ' . $item->po_title . ' (' . $item->purchase_order_no . ')';
            $this->notificationmodel->addNotification([
                'module_type' => 'purchase_order',
                'module_id' => $item->po_id,
                'notification_type' => 'retention_alert',
                'message' => $msg
            ]);
        }
    }

    private function _addSecurityNotifications($list, $alertText) {
        if (empty($list)) return;
        foreach ($list as $item) {
            $msg = $alertText . ': ' . $item->po_title . ' (' . $item->purchase_order_no . ')';
            $this->notificationmodel->addNotification([
                'module_type' => 'purchase_order',
                'module_id' => $item->id,
                'notification_type' => 'security_alert',
                'message' => $msg
            ]);
        }
    }
}