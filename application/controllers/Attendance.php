<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

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

  public function index($year = '', $month = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'attendance';
      $data["year"] = $year;
      $data["month"] = $month;

      $data['presentMonthList'] = $this->attendancemodel->getPresentMonthList($year);
      $data['employeeAttendanceList'] = $this->attendancemodel->getEmployeeAttendanceGrid($year, $month);
      $data['daysInMonth'] = ($year && $month) ? date('t', strtotime("1 $month $year")) : 0;

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/attendance-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function attendance_list($year = '', $month = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'attendance';
      $data["year"] = $year;
      $data["month"] = $month;

      $data['presentMonthList'] = $this->attendancemodel->getPresentMonthList($year);
      $data['employeeAttendanceList'] = $this->attendancemodel->getEmployeeAttendanceGrid($year, $month);
      $data['daysInMonth'] = ($year && $month) ? date('t', strtotime("1 $month $year")) : 0;

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/attendance-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function attendance_view($year = '', $month = '', $employeeId = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission) || in_array('employee', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'attendance';
      $data['year'] = $year;
      $data['month'] = $month;

      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $data['presentMonthList'] = $this->attendancemodel->getPresentMonthList($year);
      $data['employeePresentList'] = $this->attendancemodel->getEmployeePresentList($year, $month, $employeeId);
      $data['employeeLeaveList'] = $this->attendancemodel->getEmployeeLeaveList($pageStatus, $year, $month, $employeeId);
      $data['employeeOTList'] = $this->attendancemodel->getEmployeeOTList($pageStatus, $year, $month, $employeeId);
      
      $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
      foreach ($employeeInfo as $row) {
          $data['employeeId'] = $row->id;
          $data['employeeName'] = $row->employee_name;
          $data['designation'] = $row->designation;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/attendance-view', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function present_list($year = '', $month = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'present';
      $data["year"] = $year;
      $data["month"] = $month;
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $data['presentMonthList'] = $this->attendancemodel->getPresentMonthList($year);
      $data['employeePresentList'] = $this->attendancemodel->getEmployeePresentList($year, $month);

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/present/present-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function present_add($year = '', $month = '', $zone = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'present';
      $data["year"] = $year;
      $data["month"] = $month;
      $data["zone"] = $zone;
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['formTitle'] = "Add Employee Present";
      
      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $data['employeeList'] = $this->employeemodel->employeeList('active');

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/present/present-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function selectEmployeeAttendanceDropdown()
  {
    $zone 	    = $this->input->post('zone');
    $branch     = $this->input->post('branch');
    $data 	    = $this->attendancemodel->getEmployeeAttendanceDropdown($zone, $branch);
    echo json_encode($data); 
  }

  //Employee Attendance Save Form //
  public function employeeAttendanceSaveForm()
  {
      $attendanceId = $this->input->post('attendance_id');
      $presentDate = $this->input->post('present_date');
      $employeeIds = $this->input->post('employee_id');
      $attendanceTypes = $this->input->post('attendance_type');

      // Loop through each Stock Report and save Material data
      foreach ($employeeIds as $index => $employeeId) {
        $attendanceType = isset($attendanceTypes[$index]) ? $attendanceTypes[$index] : '';
        $this->attendancemodel->saveEmployeeAttendanceData($attendanceId, $presentDate, $employeeId, $attendanceType);
      }

      $data["isError"] = FALSE;
      if ($attendanceId > 0) {
          $data["message"] = "Employee Attendance Updated";
      } else {
          $data["message"] = "Employee Attendance Created";
      }

      echo json_encode($data);
      return;
  }
    
  public function attendanceEmployeeList()
  {
      $attendanceDate = $this->input->post('attendanceDate');
      $zoneName = $this->input->post('zoneName');
      $data = $this->attendancemodel->getAttendanceEmployeeList($attendanceDate, $zoneName);
      echo json_encode($data); // ✅ Output JSON once only
  }

  public function leave_list($pageStatus='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'leave';
      $data['activeLink'] = $pageStatus;
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $data['leaveList'] = $this->attendancemodel->getLeaveList($pageStatus);

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/leave/leave-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function leave_add($year = '', $month = '', $employeeId = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'leave';
      $data["year"] = $year;
      $data["month"] = $month;
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['formTitle'] = "Add Employee Leave";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['employeeDropdown'] = $this->mastermodel->getAttendanceEmployeeDropdown();

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      if ($employeeId != '') {
        $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
        foreach ($employeeInfo as $row) {
          $data['employeeId'] = $row->id;
          $data['name'] = $row->employee_name;
          $data['designation'] = $row->designation;
        }
      }
      
      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/leave/leave-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function leave_edit($leaveId)
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'leave';
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');
      
      $data['formTitle'] = "Edit Employee Leave";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $employeeLeaveInfo = $this->attendancemodel->getEmployeeLeaveInfo($leaveId);
      foreach ($employeeLeaveInfo as $row) {
        $data['leaveId'] = $row->id;
        $data['zone'] = $row->zone;
        $data['branchId'] = $row->branch_id;
        $data['employeeId'] = $row->employee_id;
        $data['designation'] = $row->designation;
        $data['leaveDate'] = $row->leave_date;
        $data['returnJoiningDate'] = $row->return_joining_date;
        $data['reason'] = $row->reason;
        $data['replacementName'] = $row->replacement_name;
        $data['leaveCount'] = $row->leave_count;
        $data['extraLeaveCount'] = $row->extra_leave_count;
        $data['joiningDate'] = $row->joining_date;
        $data['status'] = $row->status;
        $data['joinStatus'] = $row->join_status;
      }
        
      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/leave/leave-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  //Employee Leave Save Form //
  public function employeeLeaveFormSave()
  {
    $leaveId = $this->input->post('leave_id');
    $branchId = $this->input->post('branch_id');
    $employeeName = $this->input->post('employee_name');
    $leaveDate = $this->input->post('leave_date');
    $joiningDate = $this->input->post('joining_date');
    $reason = $this->input->post('reason');
    $replacementName = $this->input->post('replacement_name') ?? '';
    $leaveCount = $this->input->post('leave_count');
    $returnJoiningDate = $this->input->post('return_joining_date') ?? '';
    $extraLeaveCount = $this->input->post('extra_leave_count') ?? '';
    $joinStatus = $this->input->post('join_status') ?? '';
    $status = $this->input->post('status') ?? '';
    
    if ($leaveId < 0 || $leaveId == '') {
      $checkExists = $this->attendancemodel->checkEmployeeLeave($employeeName, $leaveDate, $joiningDate);
      if ($checkExists > 0) {
        $data["isError"] = TRUE;
        $data["message"] = "Date Already Exists";
        echo json_encode($data);
        return;
      }
    }

    $this->attendancemodel->saveEmployeeLeaveData($leaveId, $branchId, $employeeName, $leaveDate, $joiningDate, $leaveCount, $reason, $replacementName, $returnJoiningDate, $extraLeaveCount, $status, $joinStatus);
    
    $data["isError"] = FALSE;
    if ($leaveId > 0) {
      $data["message"] = "Employee Leave Updated";
    } else {
      $data["message"] = "Employee Leave Created";
    }

    echo json_encode($data);
    return;
  }

  public function ot_list($pageStatus='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'ot';
      $data['activeLink'] = $pageStatus;
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $data['employeeOTList'] = $this->attendancemodel->getEmployeeOTList($pageStatus);

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/ot/ot-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function ot_add($year = '', $month = '', $employeeId = '')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'ot';
      $data["year"] = $year;
      $data["month"] = $month;
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['formTitle'] = "Add Employee OT";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();

      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      if ($employeeId != '') {
        $employeeInfo = $this->employeemodel->getEmployeeInfo($employeeId);
        foreach ($employeeInfo as $row) {
          $data['employeeId'] = $row->id;
          $data['name'] = $row->employee_name;
          $data['designation'] = $row->designation;
        }
      }
      
      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/ot/ot-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function ot_edit($otId)
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'employee_attendance';
      $data["menu_status"] = 'ot';
      
      $empName = $this->session->userdata('username');
      $empId = $this->session->userdata('userid');

      $data['formTitle'] = "Edit Employee OT";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

      $data['employeeOTItems'] = $this->attendancemodel->getEmployeeOTItems($otId);
      
      $data['employeeComplaintList'] = $this->complaintmodel->employeeComplaintList($empName);
      $data['checkEmployeeExpensesList'] = $this->employeemodel->getCheckEmployeeExpensesList($empId);
      $data['checkEmployeeAttendanceList'] = $this->attendancemodel->getCheckEmployeeAttendanceList($empId);

      $employeeOTInfo = $this->attendancemodel->getEmployeeOTInfo($otId);
      foreach ($employeeOTInfo as $row) {
        $data['otId'] = $row->id;
        $data['zone'] = $row->zone;
        $data['branchId'] = $row->branch_id;
        $data['employeeId'] = $row->employee_id;
        $data['designation'] = $row->designation;
        $data['otDate'] = $row->ot_date;
        $data['workPlace'] = $row->work_place;
        $data['timeZone'] = $row->time_zone;
        $data['otType'] = $row->ot_type;
        $data['status'] = $row->status;
      }

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/ot/ot-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  //Employee OT Save Form //
  public function employeeOTFormSave()
  {
    $otId = $this->input->post('ot_id');
    $branchId = $this->input->post('branch_id');
    $otDate = $this->input->post('ot_date');
    $workPlace = $this->input->post('work_place');
    $timeZone = $this->input->post('time_zone');
    $otType = $this->input->post('ot_type');
    $status = $this->input->post('status') ?? '';

    $employeeOTArrayData = json_decode($this->input->post('employeeOTDataArray'));

    $this->attendancemodel->saveEmployeeOTData($otId, $branchId, $otDate, $workPlace, $timeZone, $otType, $status, $employeeOTArrayData);
    
    $data["isError"] = FALSE;
    if ($otId > 0) {
      $data["message"] = "Employee OT Updated";
    } else {
      $data["message"] = "Employee OT Created";
    }

    echo json_encode($data);
    return;
  }



  
  public function attendance_employee_list($pageStatus='')
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'access_control';
      $data["menu_status"] = 'attendance_employee';
      $data['activeLink'] = $pageStatus;

      $data['attendanceEmployeeList'] = $this->attendancemodel->attendanceEmployeeList($pageStatus);

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/attendance_employee/attendance-employee-list', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function attendance_employee_add()
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'access_control';
      $data["menu_status"] = 'attendance_employee';

      $data['formTitle'] = "Add Attendance Master";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/attendance_employee/attendance-employee-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  public function attendance_employee_edit($attendanceEmployeeId)
  {
    $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
    if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) {
      $data["menu_open"] = 'access_control';
      $data["menu_status"] = 'attendance_employee';

      $data['formTitle'] = "Edit Attendance Master";
      $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
      $data['employeeDropdown'] = $this->mastermodel->getEmployeeDropdown();

      $attendanceEmployeeInfo = $this->attendancemodel->getAttendanceEmployeeInfo($attendanceEmployeeId);
      foreach ($attendanceEmployeeInfo as $row) {
        $data['attendanceEmployeeId'] = $row->id;
        $data['zone'] = $row->zone;
        $data['branchId'] = $row->branch;
        $data['employeeId'] = $row->employee_id;
        $data['employeeName'] = $row->employee_name;
        $data['status'] = $row->status;
      }
      
      $this->load->view('settings/header', $data);
      $this->load->view('employee_attendance/attendance_employee/attendance-employee-add', $data);
      $this->load->view('settings/footer');
    } else {
      $this->load->view('settings/header_link');
      $this->load->view('settings/no_permission');
      $this->load->view('settings/footer');
    }
  }

  //Attendance Master Save Form //
  public function attendanceEmployeeFormSave()
  {
    $attendanceEmployeeId = $this->input->post('attendance_employee_id');
    $zone = $this->input->post('zone');
    $branch = $this->input->post('branch');
    $employeeId = $this->input->post('employee_id');
    $employeeName = $this->input->post('employee_name');
    $status = $this->input->post('status');

    if ($attendanceEmployeeId < 0 || $attendanceEmployeeId == '') {
      $checkExists = $this->attendancemodel->checkAttendanceEmployee($branch, $employeeId);
      if ($checkExists > 0) {
        $data["isError"] = TRUE;
        $data["message"] = "Attendance Employee Name Already Exists";
        echo json_encode($data);
        return;
      }
    }

    $this->attendancemodel->saveAttendanceEmployeeData($attendanceEmployeeId, $zone, $branch, $employeeId, $employeeName, $status);
    
    $data["isError"] = FALSE;
    if ($attendanceEmployeeId > 0) {
      $data["message"] = "Attendance Employee Updated";
    } else {
      $data["message"] = "Attendance Employee Created";
    }

    echo json_encode($data);
    return;
  }

  public function getMonthlyAttendanceGrid()
  {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $zone = $this->input->post('zone');

      $gridData = $this->attendancemodel->getMonthlyAttendanceGridData($zone, $month, $year);
      $daysInMonth = date('t', strtotime("$year-$month-01"));
      
      $thead = "<tr><th>Employee Name</th>";
      for($i = 1; $i <= $daysInMonth; $i++) {
          $dayOfWeek = date('w', strtotime("$year-$month-" . str_pad($i, 2, '0', STR_PAD_LEFT)));
          $weekendClass = ($dayOfWeek == 0 || $dayOfWeek == 6) ? ' class="weekend-col"' : '';
          $thead .= "<th$weekendClass>$i</th>";
      }
      $thead .= "</tr>";
      
      $tbody = "";
      if(empty($gridData)) {
          $tbody = "<tr><td colspan='".($daysInMonth + 1)."'>No employees found for this zone</td></tr>";
      } else {
          foreach($gridData as $empId => $data) {
              $tbody .= "<tr>";
              $tbody .= "<td class='text-start fw-bold'>".$data['employee_name']."<br><small class='text-muted'>".$data['designation']."</small></td>";
              
              for($i = 1; $i <= $daysInMonth; $i++) {
                  $status = isset($data['attendance'][$i]) ? $data['attendance'][$i] : '';
                  $tdClass = '';
                  $selectClass = 'att-select';
                  $dayOfWeek = date('w', strtotime("$year-$month-" . str_pad($i, 2, '0', STR_PAD_LEFT)));
                  if($dayOfWeek == 0 || $dayOfWeek == 6) $tdClass .= ' weekend-col';
                  if($status == 'present') $selectClass .= ' att-P';
                  else if($status == 'absent') $selectClass .= ' att-A';
                  else if($status == 'full_day_ot') $selectClass .= ' att-FOT';
                  else if($status == 'half_day_ot') $selectClass .= ' att-HOT';
                  
                  $tbody .= "<td class='$tdClass'>
                      <select name='attendance[$empId][$i]' class='$selectClass'>
                          <option value=''>-</option>
                          <option value='present' ".($status=='present' ? 'selected' : '').">P</option>
                          <option value='absent' ".($status=='absent' ? 'selected' : '').">A</option>
                          <option value='full_day_ot' ".($status=='full_day_ot' ? 'selected' : '').">FD_OT</option>
                          <option value='half_day_ot' ".($status=='half_day_ot' ? 'selected' : '').">HD_OT</option>
                      </select>
                  </td>";
              }
              $tbody .= "</tr>";
          }
      }
      
      echo json_encode([
          'status' => 'success',
          'thead' => $thead,
          'tbody' => $tbody
      ]);
  }
  
  public function saveMonthlyAttendanceGrid()
  {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $zone = $this->input->post('zone');
      $attendance = $this->input->post('attendance');
      
      if(!empty($attendance)) {
          $this->attendancemodel->saveMonthlyAttendanceGrid($year, $month, $zone, $attendance);
          echo json_encode(['isError' => false, 'message' => 'Attendance saved successfully']);
      } else {
          echo json_encode(['isError' => true, 'message' => 'No attendance data found to save']);
      }
  }
}
?>