<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificationmodel extends CI_Model {

    /**
     * Add a new notification
     * 
     * @param array $data [module_type, module_id, notification_type, message]
     */
    public function addNotification($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['is_read'] = 0;
        $this->db->insert('system_notifications', $data);
        return $this->db->insert_id();
    }

    /**
     * Get unread notifications for the header dropdown
     * 
     * @param int $limit Maximum number of notifications to return
     * @return array
     */
    public function getUnreadNotifications($limit = 10) {
        $this->db->where('is_read', 0);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get('system_notifications')->result();
    }

    /**
     * Get count of unread notifications
     */
    public function getUnreadCount() {
        $this->db->where('is_read', 0);
        return $this->db->count_all_results('system_notifications');
    }

    /**
     * Get all notifications for the main list page
     */
    public function getAllNotifications() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('system_notifications')->result();
    }

    /**
     * Mark a specific notification as read, or all if $id is null
     */
    public function markAsRead($id = null) {
        $this->db->set('is_read', 1);
        if ($id) {
            $this->db->where('id', $id);
        } else {
            // Mark all as read
            $this->db->where('is_read', 0);
        }
        $this->db->update('system_notifications');
        return $this->db->affected_rows();
    }

    /**
     * Delete old read notifications (housekeeping)
     * Keeps the table small over time
     */
    public function deleteOldReadNotifications($daysOld = 30) {
        $date = date('Y-m-d H:i:s', strtotime("-$daysOld days"));
        $this->db->where('is_read', 1);
        $this->db->where('created_at <', $date);
        $this->db->delete('system_notifications');
    }
    /**
     * Generate upcoming/expiry notifications dynamically
     */
    public function generateUpcomingNotifications() {
        $this->load->model('purchasemodel');
        $this->load->model('vehiclemodel');
        $this->load->model('adminmodel');
        $this->load->model('employeemodel');

        $today = date('Y-m-d');
        $year = date('Y');
        $month = date('m');

        // 1. Purchase Orders (PO) Expiry and Balance
        $purchaseOrderList = $this->purchasemodel->getAllPurchaseOrdersList();
        if (!empty($purchaseOrderList)) {
            foreach ($purchaseOrderList as $row) {
                $validityEndDate = $row->validity_end;
                $balanceAmount   = (float)$row->balance_amount;
                
                $PoRemainingDate = floor((strtotime($validityEndDate) - strtotime($today)) / (60*60*24));
                
                // Expiry Alerts
                if ($PoRemainingDate >= 0 && $PoRemainingDate <= 30) {
                    $msg = 'PO Expiry in 1 Month: ' . $row->po_title . ' (' . $row->purchase_order_no . ')';
                    $this->_createUniqueNotification('purchase_order', $row->id, 'expiry_alert', $msg);
                } elseif ($PoRemainingDate > 30 && $PoRemainingDate <= 90) {
                    $msg = 'PO Expiry in 3 Months: ' . $row->po_title . ' (' . $row->purchase_order_no . ')';
                    $this->_createUniqueNotification('purchase_order', $row->id, 'expiry_alert', $msg);
                } elseif ($PoRemainingDate > 90 && $PoRemainingDate <= 150) {
                    $msg = 'PO Expiry in 5 Months: ' . $row->po_title . ' (' . $row->purchase_order_no . ')';
                    $this->_createUniqueNotification('purchase_order', $row->id, 'expiry_alert', $msg);
                }

                // Balance Alerts
                if ($balanceAmount <= 100000) {
                    $msg = 'PO Balance Below ₹1,00,000: ' . $row->po_title . ' (' . $row->purchase_order_no . ')';
                    $this->_createUniqueNotification('purchase_order', $row->id, 'balance_alert', $msg);
                } elseif ($balanceAmount <= 300000) {
                    $msg = 'PO Balance Below ₹3,00,000: ' . $row->po_title . ' (' . $row->purchase_order_no . ')';
                    $this->_createUniqueNotification('purchase_order', $row->id, 'balance_alert', $msg);
                } elseif ($balanceAmount <= 500000) {
                    $msg = 'PO Balance Below ₹5,00,000: ' . $row->po_title . ' (' . $row->purchase_order_no . ')';
                    $this->_createUniqueNotification('purchase_order', $row->id, 'balance_alert', $msg);
                }
            }
        }

        // 2. Vehicle Insurance, FC, PUC
        $insuranceList = $this->vehiclemodel->getVehicleRenewalList($year, $month, 'insurance');
        if (!empty($insuranceList)) {
            foreach ($insuranceList as $item) {
                $msg = 'Vehicle Insurance Renewal Due: ' . $item->vehicle_name . ' (' . $item->vehicle_number . ')';
                $this->_createUniqueNotification('vehicle', $item->id, 'renewal_alert', $msg);
            }
        }

        $fcList = $this->vehiclemodel->getVehicleRenewalList($year, $month, 'fc');
        if (!empty($fcList)) {
            foreach ($fcList as $item) {
                $msg = 'Vehicle FC Renewal Due: ' . $item->vehicle_name . ' (' . $item->vehicle_number . ')';
                $this->_createUniqueNotification('vehicle', $item->id, 'renewal_alert', $msg);
            }
        }

        $pucList = $this->vehiclemodel->getVehicleRenewalList($year, $month, 'puc');
        if (!empty($pucList)) {
            foreach ($pucList as $item) {
                $msg = 'Vehicle PUC Renewal Due: ' . $item->vehicle_name . ' (' . $item->vehicle_number . ')';
                $this->_createUniqueNotification('vehicle', $item->id, 'renewal_alert', $msg);
            }
        }

        // 3. Security Amount Reminder
        $securityAmountsYearly = $this->purchasemodel->getPendingSecurityAmountListForCron($year);
        if (!empty($securityAmountsYearly)) {
            foreach ($securityAmountsYearly as $item) {
                $msg = 'Yearly Security Amount Reminder: ' . $item->po_title . ' (' . $item->purchase_order_no . ')';
                $this->_createUniqueNotification('purchase_order', $item->id, 'security_alert', $msg);
            }
        }

        $nextYear = date('Y', strtotime('+1 month'));
        $nextMonth = date('m', strtotime('+1 month'));
        $securityAmountsMonthly = $this->purchasemodel->getPendingSecurityAmountListForCron($nextYear, $nextMonth);
        if (!empty($securityAmountsMonthly)) {
            foreach ($securityAmountsMonthly as $item) {
                $msg = 'Upcoming Security Amount Due: ' . $item->po_title . ' (' . $item->purchase_order_no . ')';
                $this->_createUniqueNotification('purchase_order', $item->id, 'security_alert', $msg);
            }
        }

        // 4. Retention Money Reminder
        $pendingRetentions = $this->purchasemodel->getPendingRetentionList();
        if (!empty($pendingRetentions)) {
            foreach ($pendingRetentions as $item) {
                $msg = 'Retention Money Due: ' . $item->po_title . ' (' . $item->purchase_order_no . ')';
                $this->_createUniqueNotification('purchase_order', $item->po_id, 'retention_alert', $msg);
            }
        }

        // 5. Yearly Plan
        $activePlans = $this->adminmodel->getActiveYearlyPlans($year);
        if (!empty($activePlans)) {
            foreach ($activePlans as $plan) {
                $planDate = $plan->date;
                $daysRemaining = floor((strtotime($planDate) - strtotime($today)) / (60*60*24));
                if ($daysRemaining >= 0 && $daysRemaining <= 30) {
                    $msg = 'Upcoming Yearly Plan: ' . $plan->title . ' on ' . date('d-m-Y', strtotime($planDate));
                    $this->_createUniqueNotification('yearly_plan', $plan->id, 'plan_alert', $msg);
                }
            }
        }

        // 6. Tasks
        $this->db->select("ewr.id AS report_id, ewr.report_date, mwt.work_type AS work_type_name, e.employee_name, e.id AS employee_id");
        $this->db->from("employee_work_report ewr");
        $this->db->join("employee_work ew", "ew.id = ewr.employee_work_id", "inner");
        $this->db->join("master_work_type mwt", "mwt.id = ew.work_type", "inner");
        $this->db->join("employee e", "e.id = ew.employee_id", "inner");
        $this->db->where("ewr.delete_status", 0);
        $this->db->where("ew.delete_status", 0);
        $this->db->where("e.delete_status", 0);
        $this->db->where("e.status", "active");
        $this->db->where("ewr.submission_date", "0000-00-00");
        $this->db->where("ewr.report_date <= ", $today);
        $pendingTasks = $this->db->get()->result();

        if (!empty($pendingTasks)) {
            foreach ($pendingTasks as $task) {
                $msg = 'Pending Task: ' . $task->employee_name . ' - ' . $task->work_type_name . ' (Due: ' . date('d-m-Y', strtotime($task->report_date)) . ')';
                $this->_createUniqueNotification('task', $task->employee_id, 'task_alert', $msg);
            }
        }
    }

    private function _createUniqueNotification($moduleType, $moduleId, $notificationType, $message) {
        $dateLimit = date('Y-m-d H:i:s', strtotime("-6 months"));
        $this->db->where('module_type', $moduleType);
        $this->db->where('module_id', $moduleId);
        $this->db->where('notification_type', $notificationType);
        $this->db->where('message', $message);
        $this->db->where('created_at >', $dateLimit);
        $count = $this->db->count_all_results('system_notifications');
        
        if ($count == 0) {
            $this->addNotification([
                'module_type' => $moduleType,
                'module_id' => $moduleId,
                'notification_type' => $notificationType,
                'message' => $message
            ]);
        }
    }
}
