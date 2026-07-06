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
}
