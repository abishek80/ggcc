<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Billmodel extends CI_Model
{
    //Party Name Data
    public function partyNameListData($partyNameId='')
    {
        $sql = "SELECT * FROM master_party WHERE delete_status = 0 AND status = 'active' AND id = $partyNameId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Pettycash Month List
    public function getPettycashMonthList($year='', $branch='')
    {
        $sql = "SELECT *, LOWER(DATE_FORMAT(paid_date, '%M')) as month, DATE_FORMAT(paid_date, '%Y') as year, SUM(amount) AS amount FROM branch_pettycash WHERE delete_status = 0 AND DATE_FORMAT(paid_date, '%Y') = '$year' AND branch = '$branch' GROUP BY LOWER(DATE_FORMAT(paid_date, '%M')) ORDER BY FIELD(LOWER(DATE_FORMAT(paid_date, '%M')), 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'cctober', 'november', 'december')";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Pettycash List
    public function getPettycashList($year='', $branch='', $month='')
    {
        $sql = "SELECT BP.*, LOWER(DATE_FORMAT(BP.paid_date, '%M')) as month, DATE_FORMAT(BP.paid_date, '%Y') as year, DATE_FORMAT(BP.paid_date, '%d - %m - %Y') AS paid_dateFormat, MP.title AS pettycash_title FROM branch_pettycash BP INNER JOIN master_pettycash MP ON MP.id = BP.title WHERE BP.delete_status = 0 AND DATE_FORMAT(BP.paid_date, '%Y') = '$year' AND BP.branch = '$branch' AND LOWER(DATE_FORMAT(BP.paid_date, '%M')) = '$month'";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //All Party Payment Total Value List
    public function getPartyPaymentTotalValue($companyName = '', $fyStartDate = '', $fyEndDate = '', $financialYear = '')
    {
        $where = "PP.delete_status = 0";
        if (!empty($companyName)) { 
            $where .= " AND PP.company_name = '$companyName'";
        }
        
        if ($this->isCurrentFY($financialYear)) {
            $where .= " AND (
                (PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate')
                OR
                (PP.purchase_date < '$fyStartDate' AND PP.status = 'unpaid')
            )";
        } else {
            $where .= " AND PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }

        $sql = "SELECT COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) AS purchase_amount, COALESCE(ROUND(SUM(PPR.total_payment_amount), 2), 0.00) AS paid_amount, COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) - COALESCE(ROUND(SUM(PPR.total_payment_amount), 2), 0.00) AS balance_amount FROM party_payment PP LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS total_payment_amount FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PPR.party_payment_id = PP.id WHERE $where";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //All Party Purchase List
    public function getAllPartyPaymentList($companyName = '', $fyStartDate = '', $fyEndDate = '', $financialYear = '')
    {
        $wherePP = "WHERE delete_status = 0";
        if ($companyName != '') {
            $wherePP .= " AND company_name = '$companyName'";
        }

        if ($this->isCurrentFY($financialYear)) {
            $wherePP .= " AND (
                (purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate')
                OR
                (purchase_date < '$fyStartDate' AND status = 'unpaid')
            )";
        } else {
            $wherePP .= " AND purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }

        $whereMP = ($companyName != '') ? "AND MP.company_name = '$companyName'" : '';
        
        $sql = "SELECT MP.*, MP.msme as party_type, MP.party_name, MP.msme_number, COALESCE(SUM(PP.purchase_amount), 0.00) AS purchase_amount, COALESCE(SUM(PPR.total_payment_amount), 0.00) AS paid_amount, COALESCE(SUM(PP.purchase_amount), 0.00) - COALESCE(SUM(PPR.total_payment_amount), 0.00) AS balance_amount FROM master_party MP LEFT JOIN (SELECT * FROM party_payment $wherePP) PP ON PP.party_name = MP.party_name LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS total_payment_amount  FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PPR.party_payment_id = PP.id WHERE MP.status = 'active' AND MP.delete_status = 0 $whereMP GROUP BY MP.party_name ORDER BY MP.party_name ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //All Party Detail
    public function getPartyDetail($companyName = '', $partyId = '', $partyZone='', $status = '', $fyStartDate='', $fyEndDate='', $financialYear='')
    {
        $where = "PP.delete_status = 0";
        if ($partyId) $where .= " AND PP.party_id = '$partyId'";
        if ($companyName) $where .= " AND PP.company_name = '$companyName'";
        if ($partyZone) $where .= " AND PP.purchase_zone = '$partyZone'";
        if ($status) $where .= " AND PP.status = '$status'";

        if ($this->isCurrentFY($financialYear)) {
            $where .= " AND (
                (PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate')
                OR
                (PP.purchase_date < '$fyStartDate' AND PP.status = 'unpaid')
            )";
        } else {
            $where .= " AND PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }

        $sql = "SELECT COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) AS purchase_amount, COALESCE(ROUND(SUM(PPR.payment_amount), 2), 0.00) AS paid_amount, COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) - COALESCE(ROUND(SUM(PPR.payment_amount), 2), 0.00) AS balance_amount FROM party_payment PP LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS payment_amount FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PPR.party_payment_id = PP.id WHERE $where GROUP BY PP.party_id, PP.company_name";
        
        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Taxinvoice List
    public function getUnpaidBillList($companyName='', $partyId='', $partyZone='', $fyStartDate='', $fyEndDate='', $financialYear='')
    {
        $where = "PP.delete_status = 0 AND PP.status = 'unpaid'";

        if ($companyName) $where .= " AND PP.company_name = '$companyName'";
        if ($partyId) $where .= " AND PP.party_id = $partyId";
        if ($partyZone) $where .= " AND PP.purchase_zone = '$partyZone'";

        // CURRENT FY → include carry forward
        if ($this->isCurrentFY($financialYear)) {
            $where .= " AND (
                (PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate')
                OR
                (PP.purchase_date < '$fyStartDate' AND PP.status = 'unpaid')
            )";
        } else {
            // PREVIOUS FY
            $where .= " AND PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }

        $sql = "SELECT PP.*, 
            COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) AS purchase_amount, 
            COALESCE(ROUND(SUM(PPR.payment_amount), 2), 0.00) AS paid_amount, 
            COALESCE(ROUND(PP.purchase_amount - COALESCE(PPR.payment_amount, 0.00), 2), 0.00) AS balance_amount,
            DATE_FORMAT(PP.purchase_date, '%d - %m - %Y') AS purchase_dateFormat,
            DATE_FORMAT(validityend_date, '%d - %m - %Y') AS validityend_dateFormat
            FROM party_payment PP
            LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS payment_amount FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PPR.party_payment_id = PP.id
            WHERE $where
            GROUP BY PP.id
            ORDER BY PP.purchase_date DESC";

        return $this->db->query($sql)->result();
    }
    
    //Paid Bill List
    public function getPaidBillList($companyName='', $partyId='', $partyZone='', $fyStartDate='', $fyEndDate='', $financialYear='')
    {
        $where = "PP.delete_status = 0 AND PP.status = 'paid'";

        if ($companyName) $where .= " AND PP.company_name = '$companyName'";
        if ($partyId) $where .= " AND PP.party_id = $partyId";
        if ($partyZone) $where .= " AND PP.purchase_zone = '$partyZone'";

        // ONLY within FY (NO carry forward)
        $where .= " AND PP.purchase_date BETWEEN '$fyStartDate' AND '$fyEndDate'";

        $sql = "SELECT PP.*, 
            COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) AS purchase_amount, 
            COALESCE(ROUND(SUM(PPR.payment_amount), 2), 0.00) AS paid_amount, 
            COALESCE(ROUND(PP.purchase_amount - COALESCE(PPR.payment_amount, 0.00), 2), 0.00) AS balance_amount,
            DATE_FORMAT(PP.purchase_date, '%d - %m - %Y') AS purchase_dateFormat,
            DATE_FORMAT(validityend_date, '%d - %m - %Y') AS validityend_dateFormat
            FROM party_payment PP
            LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS payment_amount FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PPR.party_payment_id = PP.id
            WHERE $where
            GROUP BY PP.id
            ORDER BY PP.purchase_date DESC";

        return $this->db->query($sql)->result();
    }

    // Party Payment Report List
    public function getPaymentReportList($partyPaymentId = '') {
        $sql = "SELECT *, DATE_FORMAT(payment_date, '%d - %m - %Y') AS payment_dateFormat FROM party_payment_received WHERE party_payment_id = $partyPaymentId AND delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Purchase Order Detail
    public function getPartyPurchaseDetail($partyPaymentId = '')
    {
        $sql = "SELECT PP.*, COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) AS purchase_amount, COALESCE(ROUND(SUM(PPR.payment_amount), 2), 0.00) AS paid_amount, COALESCE(ROUND(PP.purchase_amount - COALESCE(PPR.payment_amount, 0.00), 2), 0.00) AS balance_amount, DATE_FORMAT(PP.purchase_date, '%d - %m - %Y') AS purchase_dateFormat, DATE_FORMAT(PP.validityend_date, '%d - %m - %Y') AS validityend_dateFormat FROM party_payment PP LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS payment_amount FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PP.id = PPR.party_payment_id WHERE PP.id = $partyPaymentId GROUP BY PP.id";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Po Number
    public function checkPurchaseNumber($purchaseNumber)
    {
        $sql = "SELECT * FROM party_payment WHERE delete_status = 0 AND purchase_number = '" . $purchaseNumber . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Check Po Number
    public function checkPurchaseBalanceAmount($partyPaymentId)
    {
        $sql = "SELECT PP.*, COALESCE(ROUND(SUM(PP.purchase_amount), 2), 0.00) AS purchase_amount, COALESCE(ROUND(SUM(PPR.payment_amount), 2), 0.00) AS paid_amount, COALESCE(ROUND(PP.purchase_amount - COALESCE(PPR.payment_amount, 0.00), 2), 0.00) AS balance_amount FROM party_payment PP LEFT JOIN (SELECT party_payment_id, SUM(payment_amount) AS payment_amount FROM party_payment_received WHERE delete_status = 0 GROUP BY party_payment_id) PPR ON PP.id = PPR.party_payment_id WHERE PP.delete_status = 0 AND PP.id = '" . $partyPaymentId . "'";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Save Purchase Order Data
    public function partyPurchaseSaveData($partyPaymentId, $partyId, $companyName, $partyName, $purchaseZone, $purchaseDate, $purchaseValidityendDate, $purchaseNumber, $purchaseAmount, $purchaseBill_img)
    {
        $userId = $this->session->userdata('userid');

        $year = date('y');
        $this->db->select_max('id');
        $query = $this->db->get('party_payment');
        $result = $query->row_array();
        $maxID = $result['id'];
        $serialNoId = sprintf("%05d", $maxID + 1);
        $serialNo = $year . '/' . $serialNoId;
    
        if ($partyPaymentId > 0) {
            $data = array(
                'purchase_zone' => $purchaseZone,
                'purchase_date' => $purchaseDate,
                'validityend_date' => $purchaseValidityendDate,
                'purchase_number' => $purchaseNumber,
                'purchase_amount' => $purchaseAmount,
                'purchase_bill' => $purchaseBill_img,
                'status' => 'unpaid',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
         );
            $this->db->where('id', (int) $partyPaymentId);
            $this->db->update('party_payment', $data);
        } else {
            $data = array(
                'sno' => $serialNo,
                'company_name' => $companyName,
                'party_name' => $partyName,
                'party_id' => $partyId,
                'purchase_zone' => $purchaseZone,
                'purchase_date' => $purchaseDate,
                'validityend_date' => $purchaseValidityendDate,
                'purchase_number' => $purchaseNumber,
                'purchase_amount' => $purchaseAmount,
                'purchase_bill' => $purchaseBill_img,
                'status' => 'unpaid',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
         );
            $this->db->insert('party_payment', $data);
            $this->db->insert_id();
        }
    }

    //Save Party Payment Form
    public function savePartyPaymentForm($partyPaymentId, $partyId, $paymentDate, $paymentAmount, $paymentMethod, $status)
    {
        $userId = $this->session->userdata('userid');

        $data = array(
            'party_payment_id' => $partyPaymentId,
            'party_id' => $partyId,
            'payment_date' => $paymentDate,
            'payment_amount' => $paymentAmount,
            'payment_method' => $paymentMethod,
            'status' => 'paid',
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s')
     );
        $this->db->insert('party_payment_received', $data);
        $this->db->insert_id();

        if ($status == 'paid') {
            $updateData = array(
                'status' => 'paid',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
         );
            $this->db->where('id', (int) $partyPaymentId);
            $this->db->update('party_payment', $updateData);
        }
    }

    //Pettycash Info
    public function getPettycashInfo($pettycashId)
    {
        $sql = "SELECT *, LOWER(DATE_FORMAT(paid_date, '%M')) as month, DATE_FORMAT(paid_date, '%Y') as year FROM branch_pettycash WHERE id=$pettycashId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Pettycash Branch List
    public function getPettycashBranchList($year = '')
    {
        // Prepare WHERE condition
        $where = $year ? "DATE_FORMAT(BP.paid_date, '%Y') = '$year' AND" : '';

        // Query to fetch data
        $sql = "SELECT MB.id AS branch_id, MB.branch, LOWER(DATE_FORMAT(BP.paid_date, '%M')) as month, SUM(BP.amount) AS pettycash_month_amount, BP.id AS pettycashId FROM branch_pettycash BP INNER JOIN master_branch MB ON MB.id = BP.branch WHERE $where BP.delete_status = 0 GROUP BY MB.id, LOWER(DATE_FORMAT(BP.paid_date, '%M')) ORDER BY MB.branch ASC";

        // Execute query
        $query = $this->db->query($sql);
        $result = $query->result_array();

        // Process results
        $pettycashList = [];
        foreach ($result as $row) {
            // Ensure branch_id and month are valid
            if (!empty($row['branch_id']) && !empty($row['month'])) {
                $pettycashList[$row['branch_id']]['branch'] = $row['branch'];
                $pettycashList[$row['branch_id']]['pettycash'][$row['month']] = $row['pettycash_month_amount'];
            }
        }

        return $pettycashList;
    }

    //Save Petty Cash Form
    public function savePettycashFormData($pettycashId, $pettycashDate, $branch, $pettycashTitle, $pettycashAmount, $remarks)
    {
        $userId = $this->session->userdata('userid');

        if ($pettycashId > 0) {
            $data = array(
                'paid_date' => $pettycashDate,
                'branch' => $branch,
                'title' => $pettycashTitle,
                'amount' => $pettycashAmount,
                'remarks' => $remarks,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $pettycashId);
            $this->db->update('branch_pettycash', $data);
        } else {
            $data = array(
                'paid_date' => $pettycashDate,
                'branch' => $branch,
                'title' => $pettycashTitle,
                'amount' => $pettycashAmount,
                'remarks' => $remarks,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('branch_pettycash', $data);
            $this->db->insert_id();
        }
    }

    private function isCurrentFY($financialYear)
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        if ($currentMonth >= 4) {
            $startYear = $currentYear;
            $endYear = $currentYear + 1;
        } else {
            $startYear = $currentYear - 1;
            $endYear = $currentYear;
        }

        $currentFY = $startYear . '-' . $endYear;

        return $financialYear == $currentFY;
    }
}
?>