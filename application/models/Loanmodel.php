<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loanmodel extends CI_Model
{
    
    //Employee Loan Overall Data
    public function getOverallAdvanceCashData()
    {
        $sql = "SELECT COALESCE(ROUND(SUM(EA.advancecash_amount), 2), 0.00) AS overall_advancecash_amount, COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00) AS overall_received_amount, COALESCE(ROUND(SUM(EA.advancecash_amount), 2) - COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00), 0.00) AS overall_notreceived_amount FROM (SELECT employee_id, SUM(advancecash_amount) AS advancecash_amount FROM advancecash_loan WHERE delete_status = 0 AND type = 'employee' GROUP BY employee_id) EA LEFT JOIN (SELECT employee_id, SUM(received_amount) AS received_amount FROM advancecash_received WHERE delete_status = 0 AND type = 'employee' GROUP BY employee_id) AR ON EA.employee_id = AR.employee_id";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Employee Loan Employee List
    public function getAdvanceCashEmployeeList($employeeId = '')
    {
        if ($employeeId) {
            $where = "AND employee_id = $employeeId";
            $groupBy = ""; // No grouping by employee_id if a specific employee is selected
        } else {
            $where = "";
            $groupBy = "GROUP BY EA.employee_id"; // Group by employee_id when no specific employee is selected
        }
        
        $sql = "SELECT EA.employee_id, E.employee_name, MD.designation, COALESCE(ROUND(SUM(EA.advancecash_amount), 2), 0.00) AS overall_advancecash_amount, COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00) AS overall_received_amount, COALESCE(ROUND(SUM(EA.advancecash_amount), 2) - COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00), 0.00) AS overall_notreceived_amount FROM (SELECT employee_id, SUM(advancecash_amount) AS advancecash_amount FROM advancecash_loan WHERE delete_status = 0 AND type = 'employee' $where GROUP BY employee_id) EA LEFT JOIN (SELECT employee_id, SUM(received_amount) AS received_amount FROM advancecash_received WHERE delete_status = 0 AND type = 'employee' $where GROUP BY employee_id) AR ON EA.employee_id = AR.employee_id LEFT JOIN employee E ON E.id = EA.employee_id LEFT JOIN master_designation MD ON MD.id = E.designation $groupBy ORDER BY E.employee_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Employee Loan Taken List
    public function getAdvancecashList($employeeId='')
    {
        if ($employeeId) {
            $where = "AND EA.employee_id = $employeeId";
        } else {
            $where = '';
        }
        $sql = "SELECT EA.*, DATE_FORMAT(EA.advancecash_date, '%d - %m - %Y') AS advancecash_date FROM advancecash_loan EA WHERE EA.delete_status = 0 AND EA.type = 'employee' $where ORDER BY EA.advancecash_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Employee Loan Received List
    public function getAdvancecashReceivedList($employeeId='')
    {
        if ($employeeId) {
            $where = "AND AR.employee_id = $employeeId";
        } else {
            $where = '';
        }
        $sql = "SELECT AR.*, DATE_FORMAT(AR.received_date, '%d - %m - %Y') AS received_date FROM advancecash_received AR WHERE AR.delete_status = 0 AND AR.type = 'employee' $where ORDER BY AR.received_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Employee Loan List
    public function getAdvancecashInfo($advancecashId)
    {
        $sql = "SELECT EA.*, E.employee_name, MD.designation FROM advancecash_loan EA INNER JOIN employee E ON E.id = EA.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE EA.id = $advancecashId";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Employee Loan Received List
    public function getAdvancecashReceivedInfo($advancecashReceivedId)
    {
        $sql = "SELECT AR.*, E.employee_name, MD.designation FROM advancecash_received AR INNER JOIN employee E ON E.id = AR.employee_id INNER JOIN master_designation MD ON MD.id = E.designation WHERE AR.id = $advancecashReceivedId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Employee Loan Save Form
    public function saveAdvancecashData($advancecashId, $employeeName, $advancecashDate, $advancecashAmount, $remarks)
    {
        $userId = $this->session->userdata('userid');

        if ($advancecashId > 0) {
            $data = array(
                'employee_id' => $employeeName,
                'advancecash_date' => $advancecashDate,
                'advancecash_amount' => $advancecashAmount,
                'remarks' => $remarks,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $advancecashId);
            $this->db->update('advancecash_loan', $data);
        } else {
            $data = array(
                'employee_id' => $employeeName,
                'advancecash_date' => $advancecashDate,
                'advancecash_amount' => $advancecashAmount,
                'remarks' => $remarks,
                'type' => 'employee',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('advancecash_loan', $data);
            $this->db->insert_id();
        }
    }

    // Employee Loan Received Save Form
    public function saveAdvancecashReceivedData($advancecashReceivedId, $employeeName, $receivedDate, $receivedAmount)
    {
        $userId = $this->session->userdata('userid');

        if ($advancecashReceivedId > 0) {
            $data = array(
                'employee_id' => $employeeName,
                'received_date' => $receivedDate,
                'received_amount' => $receivedAmount,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $advancecashReceivedId);
            $this->db->update('advancecash_received', $data);
        } else {
            $data = array(
                'employee_id' => $employeeName,
                'received_date' => $receivedDate,
                'received_amount' => $receivedAmount,
                'type' => 'employee',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('advancecash_received', $data);
            $this->db->insert_id();
        }
    }
    












    //Thirdparty Loan Overall Data
    public function getOverallThirdpartyLoanData()
    {
        $sql = "SELECT COALESCE(ROUND(SUM(EA.advancecash_amount), 2), 0.00) AS overall_loan_amount, COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00) AS overall_received_amount, COALESCE(ROUND(SUM(EA.advancecash_amount), 2) - COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00), 0.00) AS overall_notreceived_amount FROM (SELECT employee_id, SUM(advancecash_amount) AS advancecash_amount FROM advancecash_loan WHERE delete_status = 0 AND type = 'thirdparty' GROUP BY employee_id) EA LEFT JOIN (SELECT employee_id, SUM(received_amount) AS received_amount FROM advancecash_received WHERE delete_status = 0 AND type = 'thirdparty' GROUP BY employee_id) AR ON EA.employee_id = AR.employee_id";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Thirdparty Loan Employee List
    public function getThirdpartyLoanList($thirdpartyId = '')
    {
        if ($thirdpartyId) {
            $where = "AND employee_id = $thirdpartyId";
            $groupBy = ""; // No grouping if a specific third-party ID is selected
        } else {
            $where = "";
            $groupBy = "GROUP BY EA.employee_id"; // Group by employee_id when no specific third-party is selected
        }
        
        $sql = "SELECT EA.employee_id, MT.thirdparty_name, MT.remarks AS thirdparty_remarks, MT.id AS thirdparty_id, COALESCE(ROUND(SUM(EA.advancecash_amount), 2), 0.00) AS overall_loan_amount, COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00) AS overall_received_amount, COALESCE(ROUND(SUM(EA.advancecash_amount), 2) - COALESCE(ROUND(SUM(AR.received_amount), 2), 0.00), 0.00) AS overall_notreceived_amount FROM (SELECT employee_id, SUM(advancecash_amount) AS advancecash_amount FROM advancecash_loan WHERE delete_status = 0 AND type = 'thirdparty' $where GROUP BY employee_id) EA LEFT JOIN (SELECT employee_id, SUM(received_amount) AS received_amount FROM advancecash_received WHERE delete_status = 0 AND type = 'thirdparty' $where GROUP BY employee_id) AR ON EA.employee_id = AR.employee_id LEFT JOIN master_thirdparty MT ON MT.id = EA.employee_id $groupBy ORDER BY MT.thirdparty_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Thirdparty Loan Taken List
    public function getThirdpartyList($thirdpartyId='')
    {
        if ($thirdpartyId) {
            $where = "AND EA.employee_id = $thirdpartyId";
        } else {
            $where = '';
        }
        $sql = "SELECT EA.*, DATE_FORMAT(EA.advancecash_date, '%d - %m - %Y') AS advancecash_date FROM advancecash_loan EA WHERE EA.delete_status = 0 AND EA.type = 'thirdparty' $where ORDER BY EA.advancecash_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Thirdparty Loan Received List
    public function getThirdpartyLoanReceivedList($thirdpartyId='')
    {
        if ($thirdpartyId) {
            $where = "AND AR.employee_id = $thirdpartyId";
        } else {
            $where = '';
        }
        $sql = "SELECT AR.*, DATE_FORMAT(AR.received_date, '%d - %m - %Y') AS received_date FROM advancecash_received AR WHERE AR.delete_status = 0 AND AR.type = 'thirdparty' $where ORDER BY AR.received_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Thirdparty Loan List
    public function getThirdpartyLoanInfo($thirdpartyLoanId)
    {
        $sql = "SELECT EA.*, MT.id AS thirdparty_id, MT.thirdparty_name, MT.remarks AS thirdparty_remarks FROM advancecash_loan EA INNER JOIN master_thirdparty MT ON MT.id = EA.employee_id WHERE EA.id = $thirdpartyLoanId";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Thirdparty Loan Received List
    public function getThirdpartyLoanReceivedInfo($advancecashReceivedId)
    {
        $sql = "SELECT AR.*, MT.id AS thirdparty_id, MT.thirdparty_name, MT.remarks AS thirdparty_remarks FROM advancecash_received AR INNER JOIN master_thirdparty MT ON MT.id = AR.employee_id WHERE AR.id = $advancecashReceivedId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Thirdparty Loan Save Form
    public function saveThirdpartyLoanData($loanId, $employeeName, $advancecashDate, $advancecashAmount, $remarks)
    {
        $userId = $this->session->userdata('userid');

        if ($loanId > 0) {
            $data = array(
                'employee_id' => $employeeName,
                'advancecash_date' => $advancecashDate,
                'advancecash_amount' => $advancecashAmount,
                'remarks' => $remarks,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $loanId);
            $this->db->update('advancecash_loan', $data);
        } else {
            $data = array(
                'employee_id' => $employeeName,
                'advancecash_date' => $advancecashDate,
                'advancecash_amount' => $advancecashAmount,
                'remarks' => $remarks,
                'type' => 'thirdparty',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('advancecash_loan', $data);
            $this->db->insert_id();
        }
    }

    // Thirdparty Loan Received Save Form
    public function saveThirdpartyLoanReceivedData($advancecashReceivedId, $employeeName, $receivedDate, $receivedAmount)
    {
        $userId = $this->session->userdata('userid');

        if ($advancecashReceivedId > 0) {
            $data = array(
                'employee_id' => $employeeName,
                'received_date' => $receivedDate,
                'received_amount' => $receivedAmount,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $advancecashReceivedId);
            $this->db->update('advancecash_received', $data);
        } else {
            $data = array(
                'employee_id' => $employeeName,
                'received_date' => $receivedDate,
                'received_amount' => $receivedAmount,
                'type' => 'thirdparty',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('advancecash_received', $data);
            $this->db->insert_id();
        }
    }
}
?>