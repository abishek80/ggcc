<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employeemodel extends CI_Model
{
    //Employee List
    public function employeeList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND E.status = '$pageStatus'";
        }

        $sql = "SELECT E.*, B.branch AS branch_name, MD.designation FROM employee E INNER JOIN master_branch B ON B.id = E.branch INNER JOIN master_designation MD ON MD.id = E.designation WHERE E.delete_status = 0 $where AND E.is_admin = 0 ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Info
    public function getEmployeeInfo($employeeId = '')
    {
        if($employeeId) {
            $where = " AND E.id = $employeeId";
        }
        $sql = "SELECT E.id, E.employee_code, E.company_name, E.zone, E.branch, E.branch_location, E.employee_name, E.mobile_number, E.email, E.designation, E.education, E.house_no, E.street, E.city, E.district, E.pincode, E.profile_img, E.aadharcard_img, E.pancard_img, E.bankbook_img, E.licence_img, E.contact_name, E.contact_relative, E.contact_phone_number, E.contact_house_no, E.contact_street, E.contact_city, E.contact_district, E.contact_pincode, E.basic_pay, E.allowance_amount, E.pf_status, E.esi_status, E.esi_number, E.pf_number, E.pan_number, E.aadhar_number, E.mobile_recharge, E.dob, E.doj, E.password, E.permission, E.pf_amount, E.bank_name, E.bank_branch_name, E.account_number, E.ifsc_code, E.status, E.created_at, MD.designation, E.payslip_status, DATE_FORMAT(E.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(E.dob, '%d - %m - %Y') AS dobFormat, DATE_FORMAT(E.doj, '%d - %m - %Y') AS dojFormat, LP.employee_name AS created_by, B.branch AS branch_name FROM employee E LEFT JOIN master_branch B ON B.id = E.branch LEFT JOIN master_designation MD ON MD.id = E.designation LEFT JOIN login_permission LP ON LP.employee_id = E.created_by WHERE E.delete_status = 0 $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Employee
    public function checkEmployee($token)
    {
        $sql = "SELECT id, employee_name FROM employee WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Employee Form
    public function saveEmployeeData($employeeId, $token, $employeeCode, $employeePassword, $employeePermission, $companyName, $zone, $branch, $branchLocation, $employeeName, $employeeEmail, $employeeNumber, $employeeDesignation, $employeeEducation, $dob, $doj, $status, $houseNo, $street, $city, $district, $pincode, $contactName, $contactRelative, $contactPhoneNumber, $contactHouseNo, $contactStreet, $contactCity, $contactDistrict, $contactPincode, $payslipStatus, $employeeProfile_img, $employeeAadharcard_img, $employeePancard_img, $employeeBankbook_img, $employeeLicence_img, $basicPay, $allowanceAmount, $pfStatus, $esiStatus, $esiNumber, $pfNumber, $mobileRecharge, $pfAmount, $bankName, $bankBranchName, $accountNumber, $ifscCode, $panNumber, $aadharNumber)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('employee');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $empMaxId = sprintf($maxID + 1);
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($employeeId > 0) {
            $data = array(
                'employee_code' => $employeeCode,
                'company_name' => $companyName,
                'zone' => $zone,
                'branch' => $branch,
                'branch_location' => $branchLocation,
                'employee_name' => $employeeName,
                'email' => $employeeEmail,
                'mobile_number' => $employeeNumber,
                'designation' => $employeeDesignation,
                'education' => $employeeEducation,
                'profile_img' => $employeeProfile_img,
                'aadharcard_img' => $employeeAadharcard_img,
                'pancard_img' => $employeePancard_img,
                'bankbook_img' => $employeeBankbook_img,
                'licence_img' => $employeeLicence_img,
                'dob' => $dob,
                'doj' => $doj,
                'house_no' => $houseNo,
                'street' => $street,
                'city' => $city,
                'district' => $district,
                'pincode' => $pincode,
                'contact_name' => $contactName,
                'contact_relative' => $contactRelative,
                'contact_phone_number' => $contactPhoneNumber,
                'contact_house_no' => $contactHouseNo,
                'contact_street' => $contactStreet,
                'contact_city' => $contactCity,
                'contact_district' => $contactDistrict,
                'contact_pincode' => $contactPincode,
                'payslip_status' => $payslipStatus,
                'basic_pay' => $basicPay,
                'allowance_amount' => $allowanceAmount,
                'pf_status' => $pfStatus,
                'esi_status' => $esiStatus,
                'esi_number' => $esiNumber,
                'pf_number' => $pfNumber,
                'pan_number' => $panNumber,
                'aadhar_number' => $aadharNumber,
                'mobile_recharge' => $mobileRecharge,
                'pf_amount' => $pfAmount,
                'bank_name' => $bankName,
                'bank_branch_name' => $bankBranchName,
                'account_number' => $accountNumber,
                'ifsc_code' => $ifscCode,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $employeeId);
            $this->db->update('employee', $data);

            $permissionData = array(
                'login_code' => $employeeCode,
                'employee_name' => $employeeName,
                'mobile_number' => $employeeNumber,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('employee_id', $employeeId);
            $this->db->update('login_permission', $permissionData);

            $attendanceData = array(
                'zone' => $zone,
                'branch' => $branch,
                'employee_name' => $employeeName,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('employee_id', $employeeId);
            $this->db->update('attendance_employee', $attendanceData);
        } else {
            $data = array(
                'token' => $token,
                'sno' => $miNumber,
                'employee_code' => $employeeCode,
                'password' => md5($employeePassword),
                'permission' => $employeePermission,
                'company_name' => $companyName,
                'zone' => $zone,
                'branch' => $branch,
                'branch_location' => $branchLocation,
                'employee_name' => $employeeName,
                'email' => $employeeEmail,
                'mobile_number' => $employeeNumber,
                'designation' => $employeeDesignation,
                'education' => $employeeEducation,
                'profile_img' => $employeeProfile_img,
                'aadharcard_img' => $employeeAadharcard_img,
                'pancard_img' => $employeePancard_img,
                'bankbook_img' => $employeeBankbook_img,
                'licence_img' => $employeeLicence_img,
                'dob' => $dob,
                'doj' => $doj,
                'house_no' => $houseNo,
                'street' => $street,
                'city' => $city,
                'district' => $district,
                'pincode' => $pincode,
                'contact_name' => $contactName,
                'contact_relative' => $contactRelative,
                'contact_phone_number' => $contactPhoneNumber,
                'contact_house_no' => $contactHouseNo,
                'contact_street' => $contactStreet,
                'contact_city' => $contactCity,
                'contact_district' => $contactDistrict,
                'contact_pincode' => $contactPincode,
                'payslip_status' => $payslipStatus,
                'basic_pay' => $basicPay,
                'allowance_amount' => $allowanceAmount,
                'pf_status' => $pfStatus,
                'esi_status' => $esiStatus,
                'esi_number' => $esiNumber,
                'pf_number' => $pfNumber,
                'pan_number' => $panNumber,
                'aadhar_number' => $aadharNumber,
                'mobile_recharge' => $mobileRecharge,
                'pf_amount' => $pfAmount,
                'bank_name' => $bankName,
                'bank_branch_name' => $bankBranchName,
                'account_number' => $accountNumber,
                'ifsc_code' => $ifscCode,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('employee', $data);
            $this->db->insert_id();

            $permissionData = array(
                'token' => $token,
                'employee_id' => $empMaxId,
                'login_code' => $employeeCode,
                'employee_name' => $employeeName,
                'mobile_number' => $employeeNumber,
                'password' => md5($employeePassword),
                'permission' => '["' . $employeePermission . '"]',
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('login_permission', $permissionData);
            $this->db->insert_id();

            $attendanceData = array(
                'employee_id' => $empMaxId,
                'zone' => $zone,
                'branch' => $branch,
                'employee_name' => $employeeName,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('attendance_employee', $attendanceData);
            $this->db->insert_id();
        }
    }


    // Employee Performance List
    public function getPerformanceList()
    {
        // Build the base SQL query
        $sql = "SELECT EP.*, E.employee_name, MD.designation FROM employee_performance EP INNER JOIN employee E ON E.id = EP.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE E.delete_status = 0 GROUP BY EP.employee_id ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getEmployeeName($employeeName)
    {
        $this->db->select('E.id, E.employee_name as value, MD.designation');
        $this->db->from('employee E');
        $this->db->join('master_designation MD', 'E.designation = MD.id', 'left');
        $this->db->where('E.status', 'active');
        $this->db->where('E.delete_status', 0);
        $this->db->order_by('E.employee_name ASC');
        $this->db->like('E.employee_name', $employeeName);
        $query = $this->db->get();
        return $query->result_array();
    } 

    public function getAttendanceEmployeeName($employeeName, $zone = '', $branch = '')
    {
        $this->db->select('AE.id, AE.employee_name as value, MD.designation');
        $this->db->from('attendance_employee AE');
        $this->db->join('employee E', 'AE.employee_id = E.id', 'left');
        $this->db->join('master_designation MD', 'E.designation = MD.id', 'left');
        $this->db->where('AE.status', 'active');
        $this->db->where('AE.delete_status', 0);
        if ($zone != '') {
            $this->db->where('AE.zone', $zone);
        }
        if ($branch != '') {
            $this->db->where('AE.branch', $branch);
        }
        $this->db->order_by('AE.employee_name ASC');
        $this->db->like('AE.employee_name', $employeeName);
        $query = $this->db->get();

        return $query->result_array();
    } 

    //Employee Performance Info
    public function getEmployeePerformanceInfo($employeeId)
    {
        $sql = "SELECT EP.rating, EP.remarks, ME.employee_name, MD.Designation, DATE_FORMAT(EP.date, '%d - %m - %Y') AS performance_date FROM employee_performance EP INNER JOIN employee ME ON ME.id = EP.employee_id INNER JOIN master_designation MD ON MD.id = ME.designation WHERE EP.employee_id = $employeeId ORDER BY EP.date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function employeePerformanceSaveData($performanceId, $employeePerformanceArrayData)
    {
        $userId = $this->session->userdata('userid');
    
        if (!empty($employeePerformanceArrayData)) {
            foreach ($employeePerformanceArrayData as $row) {
                // Check if a record already exists for the employee on the same date
                $this->db->where('employee_id', $row->employeeId);
                $this->db->where('date', $row->performanceDate);
                $existingRecord = $this->db->get('employee_performance')->row();
    
                if ($existingRecord) {
                    // Update the existing record
                    $updateData = array(
                        'rating' => $row->performanceRatings,
                        'remarks' => $row->performanceRemarks,
                        'updated_by' => $userId,
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $this->db->where('id', $existingRecord->id);
                    $this->db->update('employee_performance', $updateData);
                } else {    
                    // Insert new record
                    $insertData = array(
                        'date' => $row->performanceDate,
                        'employee_id' => $row->employeeId,
                        'rating' => $row->performanceRatings,
                        'remarks' => $row->performanceRemarks,
                        'created_by' => $userId,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('employee_performance', $insertData);
                    $insertId = $this->db->insert_id(); // Get the last inserted ID
                }
            }

            return isset($insertId) ? $insertId : null;
        }
    }

    //Employee Payslip List
    public function getEmployeePayslipList($company_name='')
    {
        $sql = "SELECT E.*, MD.designation FROM employee E INNER JOIN master_designation MD ON MD.id = E.designation WHERE E.delete_status = 0 AND E.status = 'active' AND E.company_name = '$company_name' AND E.is_admin = 0 AND E.payslip_status = 'yes' ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //User Payslip List
    public function getUserPayslipList()
    {
        $empId = $this->session->userdata('empid');
        $sql = "SELECT * FROM employee_payslip WHERE delete_status = 0 AND employee_id = '" . $empId . "' ORDER BY year DESC, FIELD(month, 'January','February','March','April','May','June','July','August','September','October','November','December') DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getEmployeeSalaryInfo($employeeName = '')
    {
        if ($employeeName > '') {
            $where = "WHERE E.id = " . $employeeName;
        }else{
            $where = '';
        }
        
        $sql ="SELECT E.id, E.basic_pay, E.allowance_amount, E.mobile_recharge, E.pf_status, E.pf_amount, E.esi_status, (E.basic_pay + E.allowance_amount) AS oldSalaryAmount, MD.designation AS employeeDesignation FROM employee E INNER JOIN master_designation MD ON MD.id = E.designation $where AND E.status = 'active' AND E.delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Employee Payslip Form
    public function savePayslipData($payslipId, $employeeId, $year, $month, $dayCount, $presentCount, $absentCount, $basicPay, $monthBasicPay, $allowanceAmount, $monthAllowanceAmount, $otCount, $otAmount, $mobileRecharge, $travellingAmount, $incentiveAmount, $foodExpenses, $pfStatus, $pfAmount, $monthPfAmount, $esiStatus, $esiAmount, $advanceCash, $professionalTax, $totalEarning, $deductionAmount, $salaryAmount, $salaryInWord)
    {
        $userId = $this->session->userdata('userid');

        $snoYear        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('employee_payslip');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $snoYear . '/' . $miNumberId;

        // Retrieve employee details
        $employeeDetailsQuery = "SELECT E.employee_code, E.doj AS joining_date, E.employee_name, 
                                MD.designation, MB.branch, E.esi_number, E.pf_number, E.branch_location,
                                E.company_name, E.bank_name, E.account_number, 
                                E.ifsc_code, E.pan_number, E.email
                                FROM employee E 
                                LEFT JOIN master_designation MD ON MD.id = E.designation 
                                LEFT JOIN master_branch MB ON MB.id = E.branch 
                                WHERE E.id = ?";
        $employeeDetails = $this->db->query($employeeDetailsQuery, array($employeeId))->row_array();
        if ($payslipId > 0) {
            $data = array(
                'employee_id' => $employeeId,
                'year' => $year,
                'month' => $month,
                'day_count' => $dayCount,
                'present_count' => $presentCount,
                'absent_count' => $absentCount,
                'basic_pay' => $basicPay,
                'month_basic_pay' => $monthBasicPay,
                'allowance_amount' => $allowanceAmount,
                'month_allowance_amount' => $monthAllowanceAmount,
                'ot_count' => $otCount,
                'ot_amount' => $otAmount,
                'mobile_recharge' => $mobileRecharge,
                'travelling_amount' => $travellingAmount,
                'incentive_amount' => $incentiveAmount,
                'food_expenses' => $foodExpenses,
                'pf_status' => $pfStatus,
                'pf_amount' => $pfAmount,
                'month_pf_amount' => $monthPfAmount,
                'esi_status' => $esiStatus,
                'esi_amount' => $esiAmount,
                'advance_cash' => $advanceCash,
                'professional_tax' => $professionalTax,
                'total_earning' => $totalEarning,
                'deduction_amount' => $deductionAmount,
                'salary_amount' => $salaryAmount,
                'salary_in_word' => $salaryInWord,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $payslipId);
            $this->db->update('employee_payslip', $data);
        } else {
            $this->db->where('employee_id', $employeeId);
            $this->db->where('year', $year);
            $this->db->where('month', $month);
            $this->db->delete('employee_payslip');

            $data = array(
                'sno' => $miNumber,
                'employee_id' => $employeeId,
                'year' => $year,
                'month' => $month,
                'day_count' => $dayCount,
                'present_count' => $presentCount,
                'absent_count' => $absentCount,
                'basic_pay' => $basicPay,
                'month_basic_pay' => $monthBasicPay,
                'allowance_amount' => $allowanceAmount,
                'month_allowance_amount' => $monthAllowanceAmount,
                'ot_count' => $otCount,
                'ot_amount' => $otAmount,
                'mobile_recharge' => $mobileRecharge,
                'travelling_amount' => $travellingAmount,
                'incentive_amount' => $incentiveAmount,
                'food_expenses' => $foodExpenses,
                'pf_status' => $pfStatus,
                'pf_amount' => $pfAmount,
                'month_pf_amount' => $monthPfAmount,
                'esi_status' => $esiStatus,
                'esi_amount' => $esiAmount,
                'advance_cash' => $advanceCash,
                'professional_tax' => $professionalTax,
                'total_earning' => $totalEarning,
                'deduction_amount' => $deductionAmount,
                'salary_amount' => $salaryAmount,
                'salary_in_word' => $salaryInWord,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s'),
                
                // Employee details fields to save
                'employee_code' => $employeeDetails['employee_code'],
                'joining_date' => $employeeDetails['joining_date'],
                'employee_name' => $employeeDetails['employee_name'],
                'designation' => $employeeDetails['designation'],
                'branch_location' => $employeeDetails['branch_location'],
                'esi_number' => $employeeDetails['esi_number'],
                'pf_number' => $employeeDetails['pf_number'],
                'company_name' => $employeeDetails['company_name'],
                'bank_name' => $employeeDetails['bank_name'],
                'account_number' => $employeeDetails['account_number'],
                'ifsc_code' => $employeeDetails['ifsc_code'],
                'pan_number' => $employeeDetails['pan_number']
            );
            $this->db->insert('employee_payslip', $data);
            $this->db->insert_id();

            $this->emailmodel->sendPayslipEmail($year, $month, $employeeDetails['employee_name'], $employeeDetails['designation'], $employeeDetails['email']);

            $months = [
                "january" => "01",
                "february" => "02",
                "march" => "03",
                "april" => "04",
                "may" => "05",
                "june" => "06",
                "july" => "07",
                "august" => "08",
                "september" => "09",
                "october" => "10",
                "november" => "11",
                "december" => "12"
            ];
            
            $monthCount = $months[$month];

            $data = array(
                'employee_id' => $employeeId,
                'received_date' => $year . '-' . $monthCount . '-01',
                'received_amount' => $advanceCash,
                'type' => 'employee',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            
            // Check if the employee ID exists in advancecash_loan
            $exists = $this->db->where('employee_id', $employeeId)
                                ->where('delete_status', 0)
                                ->get('advancecash_loan')
                                ->num_rows() > 0;
            
            if ($exists) {
                $this->db->insert('advancecash_received', $data);
                $insertId = $this->db->insert_id();
            }
        }
    }

    //Employee Payslip List
    public function getPayslipList($year='')
    {
        if ($year) {
            $where = "EP.year = '$year' AND";
        } else {
            $where = '';
        }

        $sql = "SELECT E.id AS employee_id, E.employee_name, MD.designation, EP.month, EP.id AS payslipId FROM employee_payslip EP INNER JOIN employee E ON E.id = EP.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE $where EP.delete_status = 0 AND E.is_admin = 0 ORDER BY E.employee_name ASC";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        
        $payslipList = [];
        foreach ($result as $row) {
            $payslipList[$row['employee_id']]['employee_name'] = $row['employee_name'];
            $payslipList[$row['employee_id']]['designation'] = $row['designation'];
            $payslipList[$row['employee_id']]['payslip'][$row['month']] = $row['payslipId'];
        }

        return $payslipList;
    }

    //Employee Payslip Data
    public function getPayslipData($payslipId='')
    {
        $sql = "SELECT * FROM employee_payslip WHERE id = $payslipId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getEmployeePayslip($employeeName)
    {
        $this->db->select('E.id, E.employee_name as value, MD.designation, E.basic_pay, E.allowance_amount, E.mobile_recharge, E.pf_amount');
        $this->db->from('employee E');
        $this->db->join('master_designation MD', 'E.designation = MD.id', 'left');
        $this->db->where('E.is_admin = 0');
        $this->db->order_by('E.employee_name ASC');
        $this->db->like('E.employee_name', $employeeName);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Save Employee Payslip All Data
    public function saveEmployeePayslipAllData($payslipId, $month, $year, $employeeId, $basicPay, $allowanceAmount, $dayCount, $presentCount, $absentCount, $monthBasicPay, $monthAllowanceAmount, $otCount, $otAmount, $mobileRecharge, $travellingAmount, $incentiveAmount, $foodExpenses, $totalEarning, $pfStatus, $pfAmount, $monthPfAmount, $esiStatus, $esiAmount, $advanceCash, $professionalTax, $deductionAmount, $salaryAmount, $salaryInWord)
    {
        // Check if employeeId or salaryAmount is empty and return false if so
        if (empty($salaryAmount)) {
            return false;
        }
    
        $userId = $this->session->userdata('userid');

        $snoYear        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('employee_payslip');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $snoYear . '/' . $miNumberId;

        // Retrieve employee details
        $employeeDetailsQuery = "SELECT E.employee_code, E.doj AS joining_date, E.employee_name, MD.designation, MB.branch, E.esi_number, E.pf_number, E.branch_location, E.company_name, E.bank_name, E.account_number, E.ifsc_code, E.pan_number, E.email FROM employee E LEFT JOIN master_designation MD ON MD.id = E.designation LEFT JOIN master_branch MB ON MB.id = E.branch WHERE E.id = ?";
        $employeeDetails = $this->db->query($employeeDetailsQuery, array($employeeId))->row_array();
    
        // Prepare data for insertion
        $data = [
            'sno' => $miNumber,
            'month' => $month,
            'year' => $year,
            'employee_id' => $employeeId,
            'day_count' => $dayCount,
            'present_count' => $presentCount,
            'absent_count' => $absentCount,
            'basic_pay' => $basicPay,
            'month_basic_pay' => $monthBasicPay,
            'allowance_amount' => $allowanceAmount,
            'month_allowance_amount' => $monthAllowanceAmount,
            'ot_count' => $otCount,
            'ot_amount' => $otAmount,
            'mobile_recharge' => $mobileRecharge,
            'travelling_amount' => $travellingAmount,
            'incentive_amount' => $incentiveAmount,
            'food_expenses' => $foodExpenses,
            'pf_status' => $pfStatus,
            'pf_amount' => $pfAmount,
            'month_pf_amount' => $monthPfAmount,
            'esi_status' => $esiStatus,
            'esi_amount' => $esiAmount,
            'advance_cash' => $advanceCash,
            'professional_tax' => $professionalTax,
            'total_earning' => $totalEarning,
            'deduction_amount' => $deductionAmount,
            'salary_amount' => $salaryAmount,
            'salary_in_word' => $salaryInWord,
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
                
            // Employee details fields to save
            'employee_code' => $employeeDetails['employee_code'],
            'joining_date' => $employeeDetails['joining_date'],
            'employee_name' => $employeeDetails['employee_name'],
            'designation' => $employeeDetails['designation'],
            'branch_location' => $employeeDetails['branch_location'],
            'esi_number' => $employeeDetails['esi_number'],
            'pf_number' => $employeeDetails['pf_number'],
            'company_name' => $employeeDetails['company_name'],
            'bank_name' => $employeeDetails['bank_name'],
            'account_number' => $employeeDetails['account_number'],
            'ifsc_code' => $employeeDetails['ifsc_code'],
            'pan_number' => $employeeDetails['pan_number']
        ];
    
        // Remove existing entries for the given month, year, branch and employee_id
        $this->db->where('month', $month);
        $this->db->where('year', $year);
        $this->db->where('employee_id', $employeeId);
        $this->db->delete('employee_payslip');
    
        // Insert the new performance data
        $this->db->insert('employee_payslip', $data);

        $this->emailmodel->sendPayslipEmail($year, $month, $employeeDetails['employee_name'], $employeeDetails['designation'], $employeeDetails['email']);
    
        $months = [
            "january" => "01",
            "february" => "02",
            "march" => "03",
            "april" => "04",
            "may" => "05",
            "june" => "06",
            "july" => "07",
            "august" => "08",
            "september" => "09",
            "october" => "10",
            "november" => "11",
            "december" => "12"
        ];
        
        $monthCount = $months[$month];

        $data = array(
            'employee_id' => $employeeId,
            'received_date' => $year . '-' . $monthCount . '-01',
            'received_amount' => $advanceCash,
            'type' => 'employee',
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s')
        );
            
        // Check if the employee ID exists in advancecash_loan
        $exists = $this->db->where('employee_id', $employeeId)
                            ->where('delete_status', 0)
                            ->get('advancecash_loan')
                            ->num_rows() > 0;
        
        if ($exists) {
            $this->db->insert('advancecash_received', $data);
            $insertId = $this->db->insert_id();
        }
        return true;
    }

    //Salary Increment List
    public function getSalaryIncrementList()
    {
        $sql = "SELECT SI.*, E.id AS employee_id, DATE_FORMAT(SI.date, '%d - %m - %Y') AS last_increment_dateFormat, MD.designation, E.employee_name FROM salary_increment SI INNER JOIN employee E ON SI.employee_id = E.id INNER JOIN master_designation MD ON E.designation = MD.id WHERE SI.delete_status = 0 AND SI.date = (SELECT MAX(innerSI.date) FROM salary_increment innerSI WHERE innerSI.employee_id = SI.employee_id AND innerSI.delete_status = 0) GROUP BY E.employee_name, E.id ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Increment List
    public function getIncrementList($employeeId)
    {
        $sql = "SELECT *, DATE_FORMAT(date, '%d - %m - %Y') AS increment_dateFormat FROM salary_increment WHERE delete_status = 0 AND employee_id = $employeeId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Salary Increment Info
    public function getSalaryIncrementInfo($employeeId)
    {
        if (!$employeeId) {
            return [];
        }

        $sql = "SELECT E.id, E.employee_name, (E.basic_pay + E.allowance_amount) AS old_salary_amount, MD.designation FROM employee E INNER JOIN master_designation MD ON E.designation = MD.id WHERE E.id = ?";

        $res = $this->db->query($sql, [$employeeId]);
        return $res->result();
    }

    //Salary Increment Detail
    public function getSalaryIncrementDetail($salaryIncrementId)
    {
        $sql = "SELECT SI.*, MD.designation, E.id AS employee_id FROM salary_increment SI INNER JOIN employee E ON E.id = SI.employee_id INNER JOIN master_designation MD ON E.designation = MD.id WHERE SI.delete_status = 0 AND SI.id=$salaryIncrementId ORDER BY SI.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Salary Increment Form
    public function saveIncrementFormData($incrementId, $incrementDate, $employeeId, $oldSalaryAmount, $newSalaryAmount)
    {
        $userId = $this->session->userdata('userid');

        if ($incrementId > 0) {
            $data = array(
                'date' => $incrementDate,
                'employee_id' => $employeeId,
                'old_salary_amount' => $oldSalaryAmount,
                'new_salary_amount' => $newSalaryAmount,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $incrementId);
            $this->db->update('salary_increment', $data);
        } else {
            $data = array(
                'date' => $incrementDate,
                'employee_id' => $employeeId,
                'old_salary_amount' => $oldSalaryAmount,
                'new_salary_amount' => $newSalaryAmount,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('salary_increment', $data);
            $this->db->insert_id();
        }
    }

    //Employee Expenses List
    public function getEmployeeExpensesList($employeeId='')
    {
        if ($employeeId) {
            $where = " AND E.id=$employeeId";
        } else {
            $where = " GROUP BY E.employee_name";
        }

        $sql = "SELECT EE.*, SUM(CASE WHEN EE.status = 'disbursed' THEN EE.amount ELSE 0 END) AS disbursed_amount, SUM(CASE WHEN EE.status = 'expenses' THEN EE.amount ELSE 0 END) AS expenses_amount, (SUM(CASE WHEN EE.status = 'disbursed' THEN EE.amount ELSE 0 END) - SUM(CASE WHEN EE.status = 'expenses' THEN EE.amount ELSE 0 END)) AS balance_amount, MD.designation, E.id AS employee_id, E.employee_name FROM employee_expenses EE LEFT JOIN employee E ON E.id = EE.employee_id LEFT JOIN master_designation MD ON E.designation = MD.id WHERE EE.delete_status = 0 $where ORDER BY E.employee_name DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Employee Expenses List
    public function getCheckEmployeeExpensesList($employeeId='')
    {
        if ($employeeId) {
            $where = " AND employee_id = $employeeId";
        } else {
            $where = "";
        }

        $sql = "SELECT * FROM employee_expenses WHERE delete_status = 0 $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Expenses List
    public function getExpensesList($employeeId='', $status='')
    {
        $sql = "SELECT *, LOWER(DATE_FORMAT(date, '%M')) as month, DATE_FORMAT(date, '%Y') as year FROM employee_expenses WHERE delete_status = 0 AND status = '$status' AND employee_id = $employeeId ORDER BY date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Expenses Info
    public function getEmployeeExpensesInfo($employeeExpensesId)
    {
        $sql = "SELECT EE.id, LOWER(DATE_FORMAT(date, '%M')) as month, DATE_FORMAT(date, '%Y') as year, EE.date, EE.employee_id, EE.amount, EE.remarks, EE.status, MD.designation FROM employee_expenses EE INNER JOIN employee E ON E.id = EE.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EE.id = $employeeExpensesId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Expenses Detail
    public function getEmployeeExpensesDetail($employeeId)
    {
        if (!$employeeId) {
            return [];
        }

        $sql = "SELECT E.*, E.id AS employee_id, MD.designation FROM employee E INNER JOIN master_designation MD ON MD.id = E.designation WHERE E.id = ?";

        $res = $this->db->query($sql, [$employeeId]);
        return $res->result();
    }

    //Save Add Employee Expenses Form
    public function saveEmployeeExpensesData($expensesId, $date, $employeeName, $expensesArrayData, $status)
    {
        $userId = $this->session->userdata('userid');

        if (!empty($expensesArrayData)) {
            foreach ($expensesArrayData as $row) {
                // Insert new record
                $insertData = array(
                    'date' => $date,
                    'employee_id' => $employeeName,
                    'amount' => $row->amount,
                    'remarks' => $row->remarks,
                    'status' => $status,
                    'created_by' => $userId,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('employee_expenses', $insertData);
                $insertId = $this->db->insert_id(); // Get the last inserted ID
            }
            return isset($insertId) ? $insertId : null;
        }
    }

    //Save Edit Employee Expenses Form
    public function saveEditEmployeeExpensesData($expensesId, $date, $employeeName, $amount, $remarks, $status)
    {
        $userId = $this->session->userdata('userid');

        if ($expensesId > 0) {
            $data = array(
                'date' => $date,
                'employee_id' => $employeeName,
                'amount' => $amount,
                'remarks' => $remarks,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $expensesId);
            $this->db->update('employee_expenses', $data);
        } else {
            $data = array(
                'date' => $date,
                'employee_id' => $employeeName,
                'amount' => $amount,
                'remarks' => $remarks,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('employee_expenses', $data);
            $this->db->insert_id();
        }
    }

    //Employee Transfer List
    public function getEmployeeTransferList($employeeId='')
    {
        if ($employeeId) {
            $where = " AND E.id=$employeeId";
        } else {
            $where = " AND ET.date = (SELECT MAX(subET.date) FROM employee_transfer subET WHERE subET.employee_name = ET.employee_name AND subET.delete_status = 0)";
        }

        $sql = "SELECT ET.*, MD.designation, DATE_FORMAT(ET.date, '%d - %m - %Y') AS dateFormat, MB1.branch AS from_branch, MB2.branch AS to_branch, E.id AS employee_id, E.employee_name FROM employee_transfer ET LEFT JOIN employee E ON E.id = ET.employee_name LEFT JOIN master_designation MD ON E.designation = MD.id LEFT JOIN master_branch MB1 ON MB1.id = ET.from_branch LEFT JOIN master_branch MB2 ON MB2.id = ET.to_branch WHERE ET.delete_status = 0 $where ORDER BY E.employee_name DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Transfer List
    public function getTransferList($employeeId='')
    {
        $sql = "SELECT ET.*, DATE_FORMAT(ET.date, '%d - %m - %Y') AS dateFormat, DATE_FORMAT(ET.return_date, '%d - %m - %Y') AS return_dateFormat, MB1.branch AS from_branch, MB2.branch AS to_branch FROM employee_transfer ET INNER JOIN master_branch MB1 ON MB1.id = ET.from_branch INNER JOIN master_branch MB2 ON MB2.id = ET.to_branch WHERE ET.delete_status = 0 AND ET.employee_name = $employeeId ORDER BY ET.date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Transfer Info
    public function getEmployeeTransferInfo($employeeTransferId)
    {
        $sql = "SELECT ET.id, ET.date, ET.from_branch, ET.to_branch, ET.remarks, ET.return_date, ET.day_count, E.employee_name AS employee_name, E.id AS employee_id, MD.designation FROM employee_transfer ET INNER JOIN employee E ON E.id = ET.employee_name INNER JOIN master_designation MD ON MD.id = E.designation WHERE ET.id = $employeeTransferId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Transfer Detail
    public function getEmployeeTransferDetail($employeeId)
    {
        if (!$employeeId) {
            return [];
        }

        $sql = "SELECT E.*, E.id AS employee_id, MD.designation FROM employee E INNER JOIN master_designation MD ON MD.id = E.designation WHERE E.id = ?";

        $res = $this->db->query($sql, [$employeeId]);
        return $res->result();
    }

    //Save Employee Transfer Form
    public function saveEmployeeTransferData($transferId, $date, $employeeName, $fromBranch, $toBranch, $remarks, $returnDate, $dayCount)
    {
        $userId = $this->session->userdata('userid');

        if ($transferId > 0) {
            $data = array(
                'date' => $date,
                'employee_name' => $employeeName,
                'from_branch' => $fromBranch,
                'to_branch' => $toBranch,
                'remarks' => $remarks,
                'return_date' => $returnDate,
                'day_count' => $dayCount,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $transferId);
            $this->db->update('employee_transfer', $data);
        } else {
            $data = array(
                'date' => $date,
                'employee_name' => $employeeName,
                'from_branch' => $fromBranch,
                'to_branch' => $toBranch,
                'remarks' => $remarks,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('employee_transfer', $data);
            $this->db->insert_id();
        }
    }

    //Present Month List
    public function getWorkMonthList($year='')
    {
        if($year) {
            $whereYear = " AND DATE_FORMAT(report_date, '%Y') = '$year' ";
        }

        $sql = "SELECT *, LOWER(DATE_FORMAT(report_date, '%M')) AS month FROM employee_work_report WHERE delete_status = 0 $whereYear GROUP BY DATE_FORMAT(report_date, '%M') ORDER BY FIELD(DATE_FORMAT(report_date, '%M'), 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'cctober', 'november', 'december')";
        
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Work List
    public function employeeWorkList($empId = '', $year = '', $month = '')
    {
        if($empId) {
            $where = " AND EW.employee_id = '" . $empId . "'";
        } else {
            $where = '';
        }
        if($year) {
            $whereYear = " AND DATE_FORMAT(EWR.report_date, '%Y') = '$year'";
        } else {
            $whereYear = '';
        }
        if($month) {
            $whereMonth = " AND LOWER(DATE_FORMAT(EWR.report_date, '%M')) = '$month'";
        } else {
            $whereMonth = '';
        }

        $sql = "SELECT EW.id, E.employee_name, MWT.work_type, EWR.id AS work_report_id, EWR.submission_date, EWR.report_date, EWR.report_document, EWR.description FROM employee_work_report EWR LEFT JOIN employee_work EW ON EW.id = EWR.employee_work_id LEFT JOIN employee E ON E.id = EW.employee_id LEFT JOIN master_work_type MWT ON MWT.id = EW.work_type INNER JOIN ( SELECT EW.employee_id, MAX(EWR.report_date) AS max_report_date FROM employee_work_report EWR LEFT JOIN employee_work EW ON EW.id = EWR.employee_work_id WHERE EWR.delete_status = 0 GROUP BY EW.employee_id ) latest ON latest.employee_id = EW.employee_id AND latest.max_report_date = EWR.report_date WHERE EWR.delete_status = 0 $where $whereYear $whereMonth ORDER BY EWR.report_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Work Report List
    public function workReportList($employeeWorkId)
    {
        $sql = "SELECT EWR.*, DATE_FORMAT(EWR.report_date, '%d - %m - %Y') AS report_dateFormat, DATE_FORMAT(EWR.submission_date, '%d - %m - %Y') AS submission_dateFormat FROM employee_work_report EWR INNER JOIN employee E ON E.id = EWR.employee_work_id WHERE EWR.delete_status = 0 AND EWR.employee_work_id= $employeeWorkId ORDER BY EWR.report_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Employee Work Info
    public function getEmployeeWorkInfo($employeeWorkId = '')
    {
        if($employeeWorkId) {
            $where = " AND EW.id = $employeeWorkId";
        }

        $sql = "SELECT EW.id, EW.employee_id, MWT.day_count, E.employee_name, MWT.work_type FROM employee_work EW INNER JOIN employee E ON E.id = EW.employee_id INNER JOIN master_work_type MWT ON MWT.id = EW.work_type WHERE EW.delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Work ReportInfo
    public function getWorkReportInfo($workReportId)
    {
        $sql = "SELECT EWT.id, EWT.employee_work_id, EWT.report_date, EWT.submission_date, EWT.report_document, MWT.day_count, EWT.description, MWT.work_type, E.employee_name FROM employee_work_report EWT INNER JOIN employee_work EW ON EW.id = EWT.employee_work_id INNER JOIN master_work_type MWT ON MWT.id = EW.work_type INNER JOIN employee E ON E.id = EW.employee_id WHERE EWT.delete_status = 0 AND EWT.id = $workReportId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Employee Work
    public function checkEmployeeWork($employeeId, $workType)
    {
        $sql = "SELECT * FROM employee_work WHERE delete_status = 0 AND employee_id = '" . $employeeId . "' AND work_type = '" . $workType . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Check Work Report
    public function checkWorkReport($employeeWork, $reportDate)
    {
        $sql = "SELECT * FROM employee_work_report WHERE delete_status = 0 AND employee_work_id = '" . $employeeWork . "' AND report_date = '" . $reportDate . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    public function getEmployeeWorkTypeInfo($employeeWorkId = '')
    {
        if ($employeeWorkId > '') {
            $where = "WHERE EW.id = " . $employeeWorkId;
        }else{
            $where = '';
        }
        
        $sql ="SELECT MWT.day_count FROM employee_work EW INNER JOIN master_work_type MWT ON MWT.id = EW.work_type $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Employee Work Form
    public function saveEmployeeWorkData($employeeWorkId, $employeeId, $workType, $reportingDate)
    {
        $userId = $this->session->userdata('userid');

        if ($employeeWorkId > 0) {
            $data = array(
                'employee_id' => $employeeId,
                'work_type' => $workType,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $employeeWorkId);
            $this->db->update('employee_work', $data);

            
            $reportData = array(
                'employee_work_id' => $employeeWorkId,
                'report_date' => $reportingDate,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $workReportId);
            $this->db->update('employee_work_report', $reportData);
        } else {
            $data = array(
                'employee_id' => $employeeId,
                'work_type' => $workType,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('employee_work', $data);
            $employeeWork = $this->db->insert_id();

        
            $reportData = array(
                'employee_work_id' => $employeeWork,
                'report_date' => $reportingDate,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('employee_work_report', $reportData);
            $this->db->insert_id();
        }
    }

    // Save Work Report Form
    public function saveWorkReportData($workReportId, $employeeWork, $reportDate, $submissionDate, $nextReportDate, $workReport, $description)
    {
        $userId = $this->session->userdata('userid');

        if ($workReportId > 0) {

            // Update current report
            $updateData = array(
                'employee_work_id' => $employeeWork,
                'submission_date' => $submissionDate,
                'report_document' => $workReport,
                'description' => $description,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );

            $this->db->where('id', (int)$workReportId);
            $this->db->update('employee_work_report', $updateData);

            // Insert next report entry
            $insertData = array(
                'employee_work_id' => $employeeWork,
                'report_date' => $nextReportDate,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('employee_work_report', $insertData);
            return $this->db->insert_id();

        } else {

            // First time insert
            $insertData = array(
                'employee_work_id' => $employeeWork,
                'report_date' => $reportDate,
                'next_report_date' => $nextReportDate,
                'report_document' => $workReport,
                'description' => $description,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('employee_work_report', $insertData);
            return $this->db->insert_id();
        }
    }

    //Daily Task List
    public function dailyTaskList($empId = '')
    {
        $where = '';
        if ($empId) {
            $where = " AND DT.employee_id = '" . $empId . "'";
        }

        $sql = "SELECT E.id AS employee_id, E.employee_name, COUNT(DT.employee_id) AS task_count FROM daily_task DT INNER JOIN employee E ON E.id = DT.employee_id WHERE DT.delete_status = 0 $where GROUP BY E.employee_name ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Task List
    public function taskList($employeeId)
    {

        $sql = "SELECT DT.*, E.employee_name, DTD.description AS latest_description, DATE_FORMAT(DTD.task_date, '%d - %m - %Y') AS latest_task_dateFormat, DTD.task_date AS latest_task_date FROM daily_task DT INNER JOIN employee E ON E.id = DT.employee_id LEFT JOIN (SELECT D1.* FROM daily_task_detail D1 INNER JOIN (SELECT daily_task_id, MAX(task_date) AS max_task_date FROM daily_task_detail WHERE delete_status = 0 GROUP BY daily_task_id) D2 ON D1.daily_task_id = D2.daily_task_id AND D1.task_date = D2.max_task_date WHERE D1.delete_status = 0) DTD ON DT.id = DTD.daily_task_id WHERE DT.delete_status = 0 AND DT.employee_id = $employeeId ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Report List
    public function reportList($dailyTaskId)
    {
        $sql = "SELECT *, DATE_FORMAT(task_date, '%d - %m - %Y') AS task_dateFormat FROM daily_task_detail WHERE delete_status = 0 AND daily_task_id= $dailyTaskId ORDER BY task_date DESC";
        
        $res = $this->db->query($sql);
        return $res->result();
    }

    //Daily Task Info
    public function getDailyTaskInfo($dailyTaskId = '')
    {
        if($dailyTaskId) {
            $where = " AND DT.id = $dailyTaskId";
        }

        $sql = "SELECT DT.id, DT.employee_id, E.employee_name, DT.task_type FROM daily_task DT INNER JOIN employee E ON E.id = DT.employee_id WHERE DT.delete_status = 0 $where";
        
        $res = $this->db->query($sql);
        return $res->result();
    }

    // Task Info
    public function getTaskInfo($taskId)
    {
        $sql = "SELECT * FROM daily_task_detail WHERE id = $taskId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Daily Task
    public function checkDailyTask($employeeId, $taskType)
    {
        $sql = "SELECT * FROM daily_task WHERE delete_status = 0 AND employee_id = '" . $employeeId . "' AND task_type = '" . $taskType . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Check Task
    public function checkTask($dailyTaskType, $taskDate)
    {
        $sql = "SELECT * FROM daily_task_detail WHERE delete_status = 0 AND daily_task_id = '" . $dailyTaskType . "' AND task_date = '" . $taskDate . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    public function getDailyTaskData($dailyTaskId = '')
    {
        if ($dailyTaskId > '') {
            $where = "WHERE EW.id = " . $dailyTaskId;
        }else{
            $where = '';
        }
        
        $sql ="SELECT MWT.day_count FROM employee_work EW INNER JOIN master_work_type MWT ON MWT.id = EW.work_type $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Daily Task Form
    public function saveDailyTaskData($dailyTaskId, $employeeId, $taskType)
    {
        $userId = $this->session->userdata('userid');

        if ($dailyTaskId > 0) {
            $data = array(
                'employee_id' => $employeeId,
                'task_type' => $taskType,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $dailyTaskId);
            $this->db->update('daily_task', $data);
        } else {
            $data = array(
                'employee_id' => $employeeId,
                'task_type' => $taskType,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('daily_task', $data);
            $this->db->insert_id();
        }
    }

    //Save Task Form
    public function saveTaskData($taskId, $dailyTaskType, $taskDate, $description)
    {
        $userId = $this->session->userdata('userid');

        if ($taskId > 0) {
            $data = array(
                'daily_task_id' => $dailyTaskType,
                'task_date' => $taskDate,
                'description' => $description,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $taskId);
            $this->db->update('daily_task_detail', $data);
        } else {
            $data = array(
                'daily_task_id' => $dailyTaskType,
                'task_date' => $taskDate,
                'description' => $description,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('daily_task_detail', $data);
            $this->db->insert_id();
        }
    }

    public function getPendingWorkReportsForReminder($targetDate)
    {
        $sql = "SELECT 
                    ewr.id AS report_id,
                    ewr.report_date,
                    ew.id AS work_id,
                    mwt.work_type AS work_type_name,
                    e.id AS employee_id,
                    e.employee_name,
                    e.email AS employee_email
                FROM employee_work_report ewr
                INNER JOIN employee_work ew ON ew.id = ewr.employee_work_id
                INNER JOIN master_work_type mwt ON mwt.id = ew.work_type
                INNER JOIN employee e ON e.id = ew.employee_id
                WHERE ewr.delete_status = 0
                  AND ew.delete_status = 0
                  AND e.delete_status = 0
                  AND e.status = 'active'
                  AND ewr.submission_date = '0000-00-00'
                  AND ewr.reminder_sent = 0
                  AND ewr.report_date = ?";

        $res = $this->db->query($sql, array($targetDate));
        return $res->result();
    }

    public function updateWorkReportReminderFlag($reportId, $sent)
    {
        $this->db->where('id', (int) $reportId);
        $this->db->update('employee_work_report', array('reminder_sent' => (int) $sent));
    }
}
?>