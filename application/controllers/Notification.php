<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('notificationmodel');
        if (!is_cli()) {
            if (($this->session->userdata('userid') == null) || ($this->session->userdata('userid') == "")) {
                redirect(base_url() . 'login');
            }
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
    }

    /**
     * Display all notifications page
     */
    public function index()
    {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
            
            $data['title'] = "All Notifications";
            $data['menu_status'] = 'notification';
            $empName = $this->session->userdata('username');
            $empId = $this->session->userdata('userid');
        
            $data['menu_open'] = '';
            $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
            $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
            $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);
        
            // Generate upcoming/expiry alerts dynamically on-the-fly
            $this->notificationmodel->generateUpcomingNotifications();
            
            $data['notifications'] = $this->notificationmodel->getAllNotifications();
            
            $this->load->view('settings/header', $data);
            $this->load->view('notifications/notification-list', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    /**
     * AJAX endpoint to fetch unread notifications for header dropdown
     */
    public function get_unread_ajax()
    {
        // Generate upcoming/expiry alerts dynamically on-the-fly
        $this->notificationmodel->generateUpcomingNotifications();

        $limit = $this->input->post('limit') ? $this->input->post('limit') : 10;
        $notifications = $this->notificationmodel->getUnreadNotifications($limit);
        $count = $this->notificationmodel->getUnreadCount();
        
        echo json_encode([
            'status' => 'success',
            'count' => $count,
            'data' => $notifications
        ]);
    }

    /**
     * AJAX endpoint to mark notification(s) as read
     */
    public function mark_read_ajax()
    {
        $id = $this->input->post('id'); // if null, marks all as read
        $this->notificationmodel->markAsRead($id);
        
        echo json_encode(['status' => 'success']);
    }
}
