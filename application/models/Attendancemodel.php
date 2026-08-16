<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Attendancemodel extends CI_Model
    {
        //Check Employee Attendance List
        public function getCheckEmployeeAttendanceList($employeeId='')
        {
            if ($employeeId) {
                $where = " AND employee_id = $employeeId";
            } else {
                $where = "";
            }
            
            $sql = "SELECT employee_id FROM employee_attendance WHERE delete_status = 0 $where";
            
            $res = $this->db->query($sql);
            return $res->result();
        }

        // Employee Attendance List
        public function getEmployeeAttendanceList($year = '', $month = '')
        {
            $wherePresent = $whereLeave = $whereOT = '';

            if ($year) {
                $wherePresent .= " AND YEAR(EA.present_date) = '$year'";
                $whereLeave .= " AND YEAR(ELD.leave_date) = '$year'";
                $whereOT .= " AND YEAR(EOT.ot_date) = '$year'";
            }

            if ($month) {
                $wherePresent .= " AND MONTHNAME(EA.present_date) = '$month'";
                $whereLeave .= " AND MONTHNAME(ELD.leave_date) = '$month'";
                $whereOT .= " AND MONTHNAME(EOT.ot_date) = '$month'";
            }

            $subPresent = $subLeave = $subOT = '';
            if ($year) {
                $subPresent .= " AND YEAR(present_date) = '$year'";
                $subLeave .= " AND YEAR(leave_date) = '$year'";
                $subOT .= " AND YEAR(ot_date) = '$year'";
            }
            if ($month) {
                $subPresent .= " AND MONTHNAME(present_date) = '$month'";
                $subLeave .= " AND MONTHNAME(leave_date) = '$month'";
                $subOT .= " AND MONTHNAME(ot_date) = '$month'";
            }

            $sql = "SELECT E.id AS employee_id, E.employee_name, MD.designation, 
                    COUNT(DISTINCT EA.id) AS present_count, 
                    COUNT(DISTINCT ELD.id) AS leave_count, 
                    (SELECT COALESCE(SUM(CASE 
                        WHEN ot_type = 'Half Day' THEN 0.5 
                        WHEN ot_type = 'Full Day' THEN 1 
                        ELSE 1 
                    END), 0) FROM employee_ot WHERE employee_id = E.id AND delete_status = 0 " . str_replace('EOT.', '', $whereOT) . ") AS ot_count 
                    FROM employee E 
                    LEFT JOIN employee_attendance EA ON EA.employee_id = E.id AND EA.delete_status = 0 $wherePresent 
                    LEFT JOIN employee_leave_detail ELD ON ELD.employee_id = E.id AND ELD.delete_status = 0 $whereLeave 
                    INNER JOIN master_designation MD ON MD.id = E.designation 
                    WHERE E.delete_status = 0 
                    AND (
                        E.id IN (
                            SELECT employee_id 
                            FROM attendance_employee 
                            WHERE status = 'active' 
                            AND delete_status = 0
                        )
                        OR E.id IN (
                            SELECT employee_id 
                            FROM employee_attendance 
                            WHERE delete_status = 0 
                            $subPresent
                        )
                        OR E.id IN (
                            SELECT employee_id 
                            FROM employee_leave 
                            WHERE delete_status = 0 
                            $subLeave
                        )
                        OR E.id IN (
                            SELECT employee_id 
                            FROM employee_leave_detail 
                            WHERE delete_status = 0 
                            $subLeave
                        )
                        OR E.id IN (
                            SELECT employee_id 
                            FROM employee_ot 
                            WHERE delete_status = 0 
                            $subOT
                        )
                    )
                    GROUP BY E.id 
                    ORDER BY E.employee_name ASC";

            $res = $this->db->query($sql);
            return $res->result();
        }

        public function getEmployeeAttendanceGrid($year = '', $month = '')
        {
            $employees = $this->getEmployeeAttendanceList($year, $month);

            if (!$year || !$month) {
                return $employees;
            }

            $monthNum = date('m', strtotime("1 $month $year"));
            $startDate = "$year-$monthNum-01";
            $endDate = date('Y-m-t', strtotime($startDate));

            $attSql = "SELECT employee_id, present_date, 'P' as status FROM employee_attendance WHERE delete_status = 0 AND present_date BETWEEN ? AND ?";
            $attendanceData = $this->db->query($attSql, [$startDate, $endDate])->result();

            $leaveSql = "SELECT employee_id, leave_date as present_date, 'A' as status FROM employee_leave_detail WHERE delete_status = 0 AND leave_date BETWEEN ? AND ?";
            $leaveData = $this->db->query($leaveSql, [$startDate, $endDate])->result();

            $otSql = "SELECT employee_id, ot_date as present_date, CASE WHEN ot_type = 'Half Day' THEN 'Half OT' WHEN ot_type = 'Full Day' THEN 'Full OT' ELSE 'OT' END as status FROM employee_ot WHERE delete_status = 0 AND ot_date BETWEEN ? AND ?";
            $otData = $this->db->query($otSql, [$startDate, $endDate])->result();

            $mergedData = array_merge($attendanceData, $leaveData, $otData);

            $dailyData = [];
            foreach ($mergedData as $att) {
                $day = date('j', strtotime($att->present_date));
                if (isset($dailyData[$att->employee_id][$day])) {
                    if (strpos($dailyData[$att->employee_id][$day], $att->status) === false) {
                        $dailyData[$att->employee_id][$day] .= '/' . $att->status;
                    }
                } else {
                    $dailyData[$att->employee_id][$day] = $att->status;
                }
            }

            foreach ($employees as &$emp) {
                $emp->daily_attendance = isset($dailyData[$emp->employee_id]) ? $dailyData[$emp->employee_id] : [];
            }

            return $employees;
        }

        //Employee Present List
        public function getEmployeePresentList($year = '', $month = '', $employeeId = '')
        {
            $userId = $this->session->userdata('userid');
            $userPermission = json_decode($this->session->userdata('permission'), true);
            
            if ($employeeId) {
                $employeeWhere = "AND EA.employee_id = '$employeeId'";
            } elseif(in_array('attendance_management', $userPermission)) {
                $employeeWhere = "";
            } else {
                $employeeWhere = "";
            }

            if ($month) {
                $monthWhere = "AND LOWER(DATE_FORMAT(EA.present_date, '%M')) = '$month'";
            }

            if ($year) {
                $yearWhere = "AND DATE_FORMAT(EA.present_date, '%Y') = '$year'";
            }
    
            $sql = "SELECT EA.*, E.employee_name, DATE_FORMAT(EA.present_date, '%d - %m - %Y') AS present_dateFormat, EA.*, E.id as employee_id, MD.designation FROM employee_attendance EA INNER JOIN employee E ON E.id = EA.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EA.delete_status = 0 $employeeWhere $monthWhere $yearWhere ORDER BY EA.present_date DESC";

            $res = $this->db->query($sql);
            return $res->result();
        }

        public function getAttendanceEmployeeList($attendanceDate = '', $zoneName = '')
        {
            $zoneFilter = "";
            $dateFilterAttendance = "";
            $dateFilterLeave = "";

            if ($zoneName != '') {
                $zoneFilter = " AND E.zone = '" . $zoneName . "'";
            }

            if ($attendanceDate != '') {
                $dateFilterAttendance = " AND EA.present_date = '" . $attendanceDate . "'";
                $dateFilterLeave = " AND EOT.leave_date = '" . $attendanceDate . "'";
            }

            $sql = "SELECT AE.*, MD.designation FROM attendance_employee AE INNER JOIN employee E ON E.id = AE.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE AE.delete_status = 0 AND AE.status = 'active' $zoneFilter AND NOT EXISTS (SELECT 1 FROM employee_attendance EA WHERE EA.employee_id = AE.id $dateFilterAttendance AND EA.delete_status = 0) AND NOT EXISTS (SELECT 1 FROM employee_leave_detail EOT WHERE EOT.employee_id = AE.id $dateFilterLeave AND EOT.delete_status = 0) ORDER BY AE.employee_name ASC ";

            $res = $this->db->query($sql);
            return $res->result();
        }

        public function getEmployeeAttendanceDropdown($zone = '', $branch = '')
        {
            if ($zone > '' && $branch > '') {
                $where = "WHERE AE.zone = '" . $zone . "' AND AE.branch = " . $branch . " AND AE.status = 'active' AND AE.delete_status = 0 ORDER BY E.employee_name ASC";
            }else{
                $where = '';
            }
            
            $sql ="SELECT AE.*, E.employee_name FROM attendance_employee AE INNER JOIN employee E ON E.id = AE.employee_id $where";

            $res = $this->db->query($sql);
            return $res->result();
        }

        public function saveEmployeeAttendanceData($attendanceId, $presentDate, $employeeId, $attendanceType)
        {
            // Check if employeeId or attendanceType is empty and return false if so
            if (empty($attendanceType)) {
                return false;
            }

            $userId = $this->session->userdata('userid');
            $currentDateTime = date('Y-m-d H:i:s');

            $this->db->trans_start();

            $this->db->where('employee_id', (int) $employeeId);
            $this->db->where('present_date', $presentDate);
            $this->db->delete('employee_attendance');

            if($attendanceType == 'present') {
                $itemPresentData = array(
                    'present_date' => $presentDate,
                    'employee_id' => $employeeId,
                    'updated_by' => $userId,
                    'updated_at' => $currentDateTime
                );

                // If new attendance, use created_by & created_at instead of updated_by
                if ($attendanceId == 0) {
                    $itemPresentData['created_by'] = $userId;
                    $itemPresentData['created_at'] = $currentDateTime;
                }

                $this->db->insert('employee_attendance', $itemPresentData);
            } elseif($attendanceType == 'absent') {

                $this->db->where('employee_id', (int) $employeeId);
                $this->db->where('leave_date', $presentDate);
                $this->db->delete('employee_leave_detail');
                
                $this->db->where('employee_id', (int) $employeeId);
                $this->db->where('leave_date', $presentDate);
                $this->db->delete('employee_leave');

                // Insert new leave record
                $leaveData = array(
                    'branch_id' => '13',
                    'employee_id' => $employeeId,
                    'leave_date' => $presentDate,
                    'joining_date' => $presentDate,
                    'reason' => 'Personal Leave',
                    'leave_count' => '1',
                    'status' => 'approved',
                    'join_status' => 'not_join',
                    'leave_count' => '1',
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('employee_leave', $leaveData);
                $leaveEntryId = $this->db->insert_id();

                $leaveDetailData = array(
                    'leave_id' => $leaveEntryId,
                    'employee_id' => $employeeId,
                    'leave_date' => $presentDate,
                    'reason' => 'Personal Leave',
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('employee_leave_detail', $leaveDetailData);
            }

            $this->db->trans_complete();

            return $this->db->trans_status();
        }

        // Employee attendance Backup
        // public function saveEmployeeAttendanceData($attendanceId, $presentDate, $branchId, $workPlace, $employeeAttendanceArrayData)
        // {
        //     $userId = $this->session->userdata('userid');
        //     $currentDateTime = date('Y-m-d H:i:s');

        //     $this->db->trans_start();

        //     if (!empty($employeeAttendanceArrayData)) {
        //         foreach ($employeeAttendanceArrayData as $item) {
        //             // If attendanceId exists, delete old record before inserting a new one
        //             if ($attendanceId > 0) {
        //                 $this->db->where('employee_id', (int) $item->employeeId);
        //                 $this->db->where('present_date', $presentDate);
        //                 $this->db->delete('employee_attendance');
        //             }

        //             if($item->attendanceType == 'present') {
        //                 $itemPresentData = array(
        //                     'present_date' => $presentDate,
        //                     'branch_id' => $branchId,
        //                     'employee_id' => $item->employeeId,
        //                     'work_place' => $workPlace,
        //                     'updated_by' => $userId,
        //                     'updated_at' => $currentDateTime
        //                 );
    
        //                 // If new attendance, use created_by & created_at instead of updated_by
        //                 if ($attendanceId == 0) {
        //                     $itemPresentData['created_by'] = $userId;
        //                     $itemPresentData['created_at'] = $currentDateTime;
        //                 }
    
        //                 $this->db->insert('employee_attendance', $itemPresentData);
        //             } elseif($item->attendanceType == 'absent') {

        //                 // Insert new leave record
        //                 $leaveData = array(
        //                     'branch_id' => $branchId,
        //                     'employee_id' => $item->employeeId,
        //                     'leave_date' => $presentDate,
        //                     'joining_date' => $presentDate,
        //                     'reason' => 'Personal Leave',
        //                     'leave_count' => '1',
        //                     'created_by' => $userId,
        //                     'created_at' => date('Y-m-d H:i:s')
        //                 );
        //                 $this->db->insert('employee_leave', $leaveData);
        //                 $leaveEntryId = $this->db->insert_id();

        //                 $leaveDetailData = array(
        //                     'leave_id' => $leaveEntryId,
        //                     'employee_id' => $item->employeeId,
        //                     'leave_date' => $presentDate,
        //                     'reason' => 'Personal Leave',
        //                     'created_by' => $userId,
        //                     'created_at' => date('Y-m-d H:i:s')
        //                 );
        //                 $this->db->insert('employee_leave_detail', $leaveDetailData);
        //             }
        //         }
        //     }

        //     $this->db->trans_complete();

        //     return $this->db->trans_status();
        // }

        //Employee Leave List
        public function getEmployeeLeaveList($pageStatus = '', $year = '', $month = '', $employeeId = '')
        {
            if ($pageStatus) {
                $where = "AND status = '$pageStatus'";
            }

            if ($employeeId) {
                $employeeWhere = "AND ELD.employee_id = '$employeeId'";
            }

            if ($month) {
                $monthWhere = "AND LOWER(DATE_FORMAT(ELD.leave_date, '%M')) = '$month'";
            }

            if ($year) {
                $yearWhere = "AND DATE_FORMAT(ELD.leave_date, '%Y') = '$year'";
            }
    
            $sql = "SELECT ELD.*, EL.status, MB.branch, MB.zone, DATE_FORMAT(ELD.leave_date, '%d - %m - %Y') AS leave_dateFormat FROM employee_leave_detail ELD INNER JOIN employee_leave EL ON EL.id = ELD.leave_id INNER JOIN master_branch MB ON MB.id = EL.branch_id WHERE ELD.delete_status = 0 $monthWhere $yearWhere $where $employeeWhere GROUP BY ELD.leave_date ORDER BY ELD.leave_date DESC, ELD.id DESC";
            
            $res = $this->db->query($sql);
            return $res->result();
        }

        // Leave List
        public function getLeaveList($pageStatus = '', $year = '', $month = '', $employeeId = '')
        {
            $userId = $this->session->userdata('userid');
            $userPermission = json_decode($this->session->userdata('permission'), true);
            
            if ($employeeId) {
                $employeeWhere = "AND EL.employee_id = '$employeeId'";
            } elseif(in_array('attendance_management', $userPermission)) {
                $employeeWhere = "";
            } else {
                $employeeWhere = "";
            }

            if ($pageStatus) {
                $where = "AND EL.status = '$pageStatus'";
            }

            if ($month) {
                $monthWhere = "AND LOWER(DATE_FORMAT(EL.leave_date, '%M')) = '$month'";
            }

            if ($year) {
                $yearWhere = "AND DATE_FORMAT(EL.leave_date, '%Y') = '$year'";
            }
    
            $sql = "SELECT EL.*, MB.branch, MB.zone, MD1.designation AS replace_member_designation, MD.designation, DATE_FORMAT(EL.leave_date, '%d - %m - %Y') AS leave_dateFormat, DATE_FORMAT(EL.joining_date, '%d - %m - %Y') AS joining_dateFormat, DATE_FORMAT(EL.return_joining_date, '%d - %m - %Y') AS return_joining_dateFormat, E.employee_name, E1.employee_name AS replacement_name FROM employee_leave EL LEFT JOIN master_branch MB ON MB.id = EL.branch_id LEFT JOIN employee E ON E.id = EL.employee_id LEFT JOIN employee E1 ON E1.id = EL.replacement_name LEFT JOIN master_designation MD ON MD.id = E.designation LEFT JOIN master_designation MD1 ON MD1.id = E1.designation WHERE EL.delete_status = 0 $monthWhere $yearWhere $where $employeeWhere ORDER BY EL.leave_date DESC, EL.id DESC";
            
            $res = $this->db->query($sql);
            return $res->result();
        }
    
        //Employee Leave Info
        public function getEmployeeLeaveInfo($leaveId)
        {
            $sql = "SELECT EL.*, MB.zone, MD.designation FROM employee_leave EL INNER JOIN master_branch MB ON MB.id = EL.branch_id INNER JOIN employee E ON E.id = EL.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EL.delete_status = 0 AND EL.id = $leaveId";
            
            $res = $this->db->query($sql);
            return $res->result();
        }
    
        // Check Employee Leave
        public function checkEmployeeLeave($employeeName, $leaveDate, $joiningDate)
        {
            $sql = "SELECT * FROM employee_leave_detail WHERE delete_status = 0 AND employee_id = ? AND leave_date BETWEEN ? AND ?";
            
            $res = $this->db->query($sql, [$employeeName, $leaveDate, $joiningDate]);
            return $res->num_rows();
        }

    
        //Save Employee Leave Form
        public function saveEmployeeLeaveData($leaveId, $branchId, $employeeName, $leaveDate, $joiningDate, $leaveCount, $reason, $replacementName, $returnJoiningDate, $extraLeaveCount, $status, $joinStatus)
        {
            $userId = $this->session->userdata('userid');
            
            // Convert dates to Y-m-d format
            $leaveDateObj = DateTime::createFromFormat('Y-m-d', $leaveDate);
            $joiningDateObj = DateTime::createFromFormat('Y-m-d', $joiningDate);
            
            if (!$leaveDateObj || !$joiningDateObj) {
                return false; // Invalid date format
            }

            $leaveDate = $leaveDateObj->format('Y-m-d');
            $joiningDate = $joiningDateObj->format('Y-m-d');

            // Calculate leave count
            $leaveCount = $joiningDateObj->diff($leaveDateObj)->days + 1;

            if ($leaveId > 0) {
                // Update existing leave record
                $data = array(
                    'branch_id' => $branchId,
                    'employee_id' => $employeeName,
                    'leave_date' => $leaveDate,
                    'joining_date' => $joiningDate,
                    'reason' => $reason,
                    'replacement_name' => $replacementName,
                    'leave_count' => $leaveCount,
                    'return_joining_date' => $returnJoiningDate,
                    'extra_leave_count' => $extraLeaveCount,
                    'status' => $status,
                    'join_status' => $joinStatus,
                    'updated_by' => $userId,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', (int) $leaveId);
                $this->db->update('employee_leave', $data);

                // Remove old leave details and insert new ones
                $this->db->where('leave_id', $leaveId);
                $this->db->delete('employee_leave_detail');

                $this->insertLeaveDetails($leaveId, $employeeName, $leaveDateObj, $joiningDateObj, $reason, $userId);
            } else {
                // Insert new leave record
                $data = array(
                    'branch_id' => $branchId,
                    'employee_id' => $employeeName,
                    'leave_date' => $leaveDate,
                    'joining_date' => $joiningDate,
                    'reason' => $reason,
                    'replacement_name' => $replacementName,
                    'leave_count' => $leaveCount,
                    'return_joining_date' => $returnJoiningDate,
                    'extra_leave_count' => $extraLeaveCount,
                    'status' => $status,
                    'join_status' => $joinStatus,
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('employee_leave', $data);
                $leaveEntryId = $this->db->insert_id();

                $this->insertLeaveDetails($leaveEntryId, $employeeName, $leaveDateObj, $joiningDateObj, $reason, $userId);
            }
        }

        // Function to insert individual leave dates into employee_leave_detail
        private function insertLeaveDetails($leaveId, $employeeName, $leaveDateObj, $joiningDateObj, $reason, $userId)
        {
            $interval = new DateInterval('P1D'); // 1-day interval
            $dateRange = new DatePeriod($leaveDateObj, $interval, $joiningDateObj->modify('+1 day'));

            foreach ($dateRange as $date) {
                $leaveDetailData = array(
                    'leave_id' => $leaveId,
                    'employee_id' => $employeeName,
                    'leave_date' => $date->format('Y-m-d'),
                    'reason' => $reason,
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('employee_leave_detail', $leaveDetailData);
            }
        }

        //Employee OT List
        public function getEmployeeOTList($pageStatus = '', $year = '', $month = '', $employeeId = '')
        {
            $userId = $this->session->userdata('userid');
            $userPermission = json_decode($this->session->userdata('permission'), true);
            
            if ($employeeId) {
                $employeeWhere = "AND EOT.employee_id = '$employeeId'";
            } elseif(in_array('attendance_management', $userPermission)) {
                $employeeWhere = "";
            } else {
                $employeeWhere = "";
            }

            if ($pageStatus) {
                $where = "AND EOT.status = '$pageStatus'";
            }

            if ($month) {
                $monthWhere = "AND LOWER(DATE_FORMAT(EOT.ot_date, '%M')) = '$month'";
            }

            if ($year) {
                $yearWhere = "AND DATE_FORMAT(EOT.ot_date, '%Y') = '$year'";
            }
    
            $sql = "SELECT EOT.*, MB.branch, MB.zone, E.employee_name, MD.designation, DATE_FORMAT(EOT.ot_date, '%d - %m - %Y') AS ot_dateFormat FROM employee_ot EOT INNER JOIN master_branch MB ON MB.id = EOT.branch_id INNER JOIN employee E ON E.id = EOT.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EOT.delete_status = 0 $monthWhere $yearWhere $where $employeeWhere GROUP BY EOT.id ORDER BY EOT.ot_date DESC";
            
            $res = $this->db->query($sql);
            return $res->result();
        }
    
        //Employee OT Info
        public function getEmployeeOTInfo($otId)
        {
            $sql = "SELECT EOT.*, MB.zone, MD.designation FROM employee_ot EOT INNER JOIN master_branch MB ON MB.id = EOT.branch_id INNER JOIN employee E ON E.id = EOT.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EOT.delete_status = 0 AND EOT.id = $otId";
            
            $res = $this->db->query($sql);
            return $res->result();
        }

        //Employee OT List Items
        public function getEmployeeOTItems($otId)
        {
            $sql = "SELECT E.id as employee_id, E.employee_name, MD.designation as employee_designation FROM employee_ot EOT INNER JOIN employee E ON E.id = EOT.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EOT.delete_status = 0 AND EOT.id = $otId";
            
            $res = $this->db->query($sql);
            return $res->result();
        }
        
        //Save Employee OT Form
        public function saveEmployeeOTData($otId, $branchId, $otDate, $workPlace, $timeZone, $otType, $status, $employeeOTArrayData)
        {
            $userId = $this->session->userdata('userid');

            if (!empty($employeeOTArrayData)) {
                foreach ($employeeOTArrayData as $row) {

                    if ($otId > 0) {
                        $data = array(
                            'branch_id' => $branchId,
                            'employee_id' => $row->employeeId,
                            'ot_date' => $otDate,
                            'work_place' => $workPlace,
                            'time_zone' => $timeZone,
                            'ot_type' => $otType,
                            'status' => $status,
                            'updated_by' => $userId,
                            'updated_at' => date('Y-m-d H:i:s')
                        );
                        $this->db->where('id', (int) $otId);
                        $this->db->update('employee_ot', $data);
                    } else {
                        $data = array(
                            'branch_id' => $branchId,
                            'employee_id' => $row->employeeId,
                            'ot_date' => $otDate,
                            'work_place' => $workPlace,
                            'time_zone' => $timeZone,
                            'ot_type' => $otType,
                            'status' => $status,
                            'created_by' => $userId,
                            'created_at' => date('Y-m-d H:i:s')
                        );
                        $this->db->insert('employee_ot', $data);
                        $this->db->insert_id();
                    }
                }
            }
        }

        //Attendance Month List
        public function getAttendanceMonthList($year='', $employeeId='')
        {
            if($employeeId) {
                $whereEmployeeId = " AND employee_id = $employeeId ";
            }

            if($year) {
                $whereYear = " AND DATE_FORMAT(present_date, '%Y') = '$year' ";
            }

            $sql = "SELECT *, LOWER(DATE_FORMAT(present_date, '%M')) AS month FROM employee_attendance WHERE delete_status = 0 $whereEmployeeId $whereYear GROUP BY DATE_FORMAT(present_date, '%M') ORDER BY FIELD(DATE_FORMAT(present_date, '%M'), 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'cctober', 'november', 'december')";
            
            $res = $this->db->query($sql);
            return $res->result();
        }

        //Present Month List
        public function getPresentMonthList($year='')
        {
            if($year) {
                $whereYear = " AND DATE_FORMAT(present_date, '%Y') = '$year' ";
            }

            $sql = "SELECT *, LOWER(DATE_FORMAT(present_date, '%M')) AS month FROM employee_attendance WHERE delete_status = 0 $whereYear GROUP BY DATE_FORMAT(present_date, '%M') ORDER BY FIELD(DATE_FORMAT(present_date, '%M'), 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'cctober', 'november', 'december')";
            
            $res = $this->db->query($sql);
            return $res->result();
        }



        // Attendance Master List
        public function attendanceEmployeeList($pageStatus = '')
        {
            if ($pageStatus) {
                $where = "AND MI.status = '$pageStatus'";
            }

            $sql = "SELECT MI.*, DATE_FORMAT(MI.created_at, '%d/%m/%Y %h:%i %p') AS created_at, MB.branch FROM attendance_employee MI INNER JOIN master_branch MB ON MB.id = MI.branch WHERE MI.delete_status = 0 $where ORDER BY MI.employee_name ASC";

            $res = $this->db->query($sql);
            return $res->result();
        }

        // Attendance Master Info
        public function getAttendanceEmployeeInfo($attendanceEmployeeId)
        {
            $sql = "SELECT * FROM attendance_employee WHERE delete_status = 0 AND id = $attendanceEmployeeId";

            $res = $this->db->query($sql);
            return $res->result();
        }

        // Check Attendance Master
        public function checkAttendanceEmployee($branch, $employeeId)
        {
            $sql = "SELECT * FROM attendance_employee WHERE delete_status = 0 AND branch = '" . $branch . "' AND employee_id = '" . $employeeId . "'";

            $res = $this->db->query($sql);
            return $res->num_rows();
        }

        // Save Attendance Master Form
        public function saveAttendanceEmployeeData($attendanceEmployeeId, $zone, $branch, $employeeId, $employeeName, $status)
        {
            $userId = $this->session->userdata('userid');

            if ($attendanceEmployeeId > 0) {
                $data = array(
                    'zone' => $zone,
                    'branch' => $branch,
                    'employee_id' => $employeeId,
                    'employee_name' => $employeeName,
                    'status' => $status,
                    'updated_by' => $userId,
                    'updated_at' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', (int) $attendanceEmployeeId);
                $this->db->update('attendance_employee', $data);
            } else {
                $data = array(
                    'zone' => $zone,
                    'branch' => $branch,
                    'employee_name' => $employeeName,
                    'status' => $status,
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('attendance_employee', $data);
                $this->db->insert_id();
            }
        }
        // Get employees by zone and their attendance for a specific month
        public function getMonthlyAttendanceGridData($zone, $month, $year)
        {
            // First get all employees for the zone
            $sql = "SELECT AE.employee_id, AE.employee_name, MD.designation 
                    FROM attendance_employee AE 
                    INNER JOIN employee E ON E.id = AE.employee_id 
                    INNER JOIN master_designation MD ON MD.id = E.designation 
                    WHERE AE.delete_status = 0 AND AE.status = 'active' AND AE.zone = ? 
                    ORDER BY AE.employee_name ASC";
            $res = $this->db->query($sql, [$zone]);
            $employees = $res->result();

            // Then get attendance for this month
            $startDate = "$year-$month-01";
            $endDate = date('Y-m-t', strtotime($startDate));

            // Present days
            $attSql = "SELECT employee_id, present_date, 'present' as status 
                       FROM employee_attendance 
                       WHERE delete_status = 0 
                       AND present_date BETWEEN ? AND ?";
            $attRes = $this->db->query($attSql, [$startDate, $endDate]);
            $attendanceData = $attRes->result();

            // Leave days (which covers absent as well)
            $leaveSql = "SELECT employee_id, leave_date as present_date, 'absent' as status 
                         FROM employee_leave_detail 
                         WHERE delete_status = 0 
                         AND leave_date BETWEEN ? AND ?";
            $leaveRes = $this->db->query($leaveSql, [$startDate, $endDate]);
            $leaveData = $leaveRes->result();

            // OT days
            $otSql = "SELECT employee_id, ot_date as present_date, 
                             CASE WHEN ot_type = 'Full Day' THEN 'full_day_ot' 
                                  WHEN ot_type = 'Half Day' THEN 'half_day_ot' 
                                  ELSE 'full_day_ot' 
                             END as status 
                      FROM employee_ot 
                      WHERE delete_status = 0 
                      AND ot_date BETWEEN ? AND ?";
            $otRes = $this->db->query($otSql, [$startDate, $endDate]);
            $otData = $otRes->result();

            $mergedData = array_merge($attendanceData, $leaveData, $otData);

            // Group by employee and date
            $gridData = [];
            foreach ($employees as $emp) {
                $gridData[$emp->employee_id] = [
                    'employee_name' => $emp->employee_name,
                    'designation' => $emp->designation,
                    'attendance' => []
                ];
            }

            foreach ($mergedData as $att) {
                if (isset($gridData[$att->employee_id])) {
                    $day = date('j', strtotime($att->present_date));
                    $gridData[$att->employee_id]['attendance'][$day] = $att->status;
                }
            }

            return $gridData;
        }

        // Save mass attendance grid data
        public function saveMonthlyAttendanceGrid($year, $month, $zone, $attendanceData)
        {
            $userId = $this->session->userdata('userid');
            $currentDateTime = date('Y-m-d H:i:s');
            
            $startDate = "$year-$month-01";
            $daysInMonth = date('t', strtotime($startDate));

            $this->db->trans_start();

            // We iterate through all employees and days.
            foreach ($attendanceData as $empId => $days) {
                for ($d = 1; $d <= $daysInMonth; $d++) {
                    $dateStr = sprintf("%04d-%02d-%02d", $year, $month, $d);
                    $status = isset($days[$d]) ? $days[$d] : '';

                    // Delete existing present and leave for this date and employee
                    $this->db->where('employee_id', (int) $empId);
                    $this->db->where('present_date', $dateStr);
                    $this->db->delete('employee_attendance');

                    $this->db->where('employee_id', (int) $empId);
                    $this->db->where('leave_date', $dateStr);
                    $this->db->delete('employee_leave_detail');

                    // Delete from employee_leave where leave_date matches and employee_id matches
                    $this->db->where('employee_id', (int) $empId);
                    $this->db->where('leave_date', $dateStr);
                    $this->db->delete('employee_leave');

                    // Delete from employee_ot where ot_date matches and employee_id matches
                    $this->db->where('employee_id', (int) $empId);
                    $this->db->where('ot_date', $dateStr);
                    $this->db->delete('employee_ot');

                    // If present, insert into employee_attendance
                    if ($status === 'present') {
                        $this->db->insert('employee_attendance', [
                            'present_date' => $dateStr,
                            'employee_id' => $empId,
                            'created_by' => $userId,
                            'created_at' => $currentDateTime,
                            'updated_by' => $userId,
                            'updated_at' => $currentDateTime
                        ]);
                    } 
                    // If absent or leave, insert into employee_leave and detail
                    else if ($status === 'absent' || $status === 'leave') {
                        $leaveData = array(
                            'branch_id' => '13', // Default branch id fallback, matching their original code logic
                            'employee_id' => $empId,
                            'leave_date' => $dateStr,
                            'joining_date' => $dateStr,
                            'reason' => 'Personal Leave',
                            'leave_count' => '1',
                            'status' => 'approved',
                            'join_status' => 'not_join',
                            'created_by' => $userId,
                            'created_at' => $currentDateTime
                        );
                        $this->db->insert('employee_leave', $leaveData);
                        $leaveEntryId = $this->db->insert_id();

                        $leaveDetailData = array(
                            'leave_id' => $leaveEntryId,
                            'employee_id' => $empId,
                            'leave_date' => $dateStr,
                            'reason' => 'Personal Leave',
                            'created_by' => $userId,
                            'created_at' => $currentDateTime
                        );
                        $this->db->insert('employee_leave_detail', $leaveDetailData);
                    }
                    // If full day OT or half day OT, insert into employee_ot
                    else if ($status === 'full_day_ot' || $status === 'half_day_ot') {
                        $branchId = '13';
                        $branchQuery = $this->db->select('branch')->where('employee_id', $empId)->get('attendance_employee')->row();
                        if ($branchQuery) {
                            $branchId = $branchQuery->branch;
                        }

                        $otType = ($status === 'full_day_ot') ? 'Full Day' : 'Half Day';
                        $this->db->insert('employee_ot', [
                            'branch_id' => $branchId,
                            'employee_id' => $empId,
                            'ot_date' => $dateStr,
                            'work_place' => 'Office',
                            'time_zone' => 'General',
                            'ot_type' => $otType,
                            'status' => 'approved',
                            'delete_status' => 0,
                            'created_by' => $userId,
                            'created_at' => $currentDateTime,
                            'updated_by' => $userId,
                            'updated_at' => $currentDateTime
                        ]);
                    }
                }
            }

            $this->db->trans_complete();
            return $this->db->trans_status();
        }
    }
?>