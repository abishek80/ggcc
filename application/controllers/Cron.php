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
        $this->sendVehicleRenewalEmail();
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

        echo "Renewal emails sent successfully.";
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

        $isMonday = ($dayOfWeek === 1);
        $isPreview = (!is_cli() && $this->input->get('preview') == 1);

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
            $balanceAmount   = (float)$row->balance_amount;
            
            $PoRemainingDate = floor((strtotime($validityEndDate) - strtotime($today)) / (60*60*24));
            $row->PoRemainingDate = $PoRemainingDate;

            // =========================================================================
            // 📅 Purchase Order DATE BASED (Range matching on Monday/Preview, Exact on Tue-Sun)
            // =========================================================================
            if ($isMonday || $isPreview) {
                if ($PoRemainingDate > 30 && $PoRemainingDate <= 60) {
                    $data['poExpiry60'][] = $row;
                } elseif ($PoRemainingDate > 15 && $PoRemainingDate <= 30) {
                    $data['poExpiry30'][] = $row;
                } elseif ($PoRemainingDate > 3 && $PoRemainingDate <= 15) {
                    $data['poExpiry15'][] = $row;
                } elseif ($PoRemainingDate >= 0 && $PoRemainingDate <= 3) {
                    $data['poExpiry3'][] = $row;
                }
            } else {
                if ($PoRemainingDate == 60) {
                    $data['poExpiry60'][] = $row;
                } elseif ($PoRemainingDate == 30) {
                    $data['poExpiry30'][] = $row;
                } elseif ($PoRemainingDate == 15) {
                    $data['poExpiry15'][] = $row;
                } elseif ($PoRemainingDate == 3) {
                    $data['poExpiry3'][] = $row;
                }
            }

            // =========================================================================
            // 💰 BALANCE AMOUNT BASED (Range matching on Monday/Preview, First-Cross on Tue-Sun)
            // =========================================================================
            if ($isMonday || $isPreview) {
                // Compile the ranges for the Weekly Consolidated Digest
                if ($balanceAmount <= 1000) {
                    $data['poBalance1000'][] = $row;
                } elseif ($balanceAmount <= 5000 && $balanceAmount > 1000) {
                    $data['poBalance5000'][] = $row;
                } elseif ($balanceAmount <= 10000 && $balanceAmount > 5000) {
                    $data['poBalance10000'][] = $row;
                }

                // If Monday Weekly Digest, we update database flags so they are marked as notified
                if ($isMonday && !$isPreview) {
                    if ($balanceAmount <= 1000) {
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_1000_sent' => 1,
                            'bal_alert_5000_sent' => 1,
                            'bal_alert_10000_sent' => 1
                        ]);
                    } elseif ($balanceAmount <= 5000) {
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_1000_sent' => 0,
                            'bal_alert_5000_sent' => 1,
                            'bal_alert_10000_sent' => 1
                        ]);
                    } elseif ($balanceAmount <= 10000) {
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_1000_sent' => 0,
                            'bal_alert_5000_sent' => 0,
                            'bal_alert_10000_sent' => 1
                        ]);
                    } else {
                        // Reset all flags if balance goes back above 10,000 (Self-healing)
                        $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                            'bal_alert_1000_sent' => 0,
                            'bal_alert_5000_sent' => 0,
                            'bal_alert_10000_sent' => 0
                        ]);
                    }
                }
            } else {
                // Tuesday - Sunday Daily Critical Check (Trigger alert only when FIRST crossed)
                if ($balanceAmount <= 1000) {
                    if ($row->bal_alert_1000_sent == 0) {
                        $data['poBalance1000'][] = $row;
                    }
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_1000_sent' => 1,
                        'bal_alert_5000_sent' => 1,
                        'bal_alert_10000_sent' => 1
                    ]);
                } elseif ($balanceAmount <= 5000) {
                    if ($row->bal_alert_5000_sent == 0) {
                        $data['poBalance5000'][] = $row;
                    }
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_1000_sent' => 0,
                        'bal_alert_5000_sent' => 1,
                        'bal_alert_10000_sent' => 1
                    ]);
                } elseif ($balanceAmount <= 10000) {
                    if ($row->bal_alert_10000_sent == 0) {
                        $data['poBalance10000'][] = $row;
                    }
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_1000_sent' => 0,
                        'bal_alert_5000_sent' => 0,
                        'bal_alert_10000_sent' => 1
                    ]);
                } else {
                    // Reset all flags if balance goes back above 10,000 (Self-healing)
                    $this->purchasemodel->updateBalanceAlertFlags($row->id, [
                        'bal_alert_1000_sent' => 0,
                        'bal_alert_5000_sent' => 0,
                        'bal_alert_10000_sent' => 0
                    ]);
                }
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
            if ($isPreview) {
                // Pass dynamic info to template
                $data['emailTitle'] = "Weekly Purchase Order Digest";
                $data['emailSubtext'] = "Consolidated Expiries &amp; Low Balance Reminders";
                $data['introText'] = "Below is the consolidated weekly report of all active Purchase Orders flagged with upcoming expiries or low balances.";
                $data['currentDate'] = date('d F, Y', strtotime($today));
                $this->load->view('email_template/purchase_order_template', $data);
                return;
            }
            echo "No PO alerts to send today.";
            return;
        }

        // Customize email subject and content
        if ($isMonday) {
            $subject = "Weekly Purchase Order Consolidated Digest - " . date('d F, Y', strtotime($today));
            $data['emailTitle'] = "Weekly Purchase Order Digest";
            $data['emailSubtext'] = "Weekly Consolidated Expiries &amp; Low Balances";
            $data['introText'] = "Below is the consolidated weekly report of all active Purchase Orders flagged with upcoming expiries or low balances. Please review the status of these accounts.";
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

        echo $isMonday ? "Weekly PO digest processed and sent." : "Daily PO critical alerts processed and sent.";
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
}