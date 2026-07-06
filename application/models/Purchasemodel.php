<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchasemodel extends CI_Model
{
    //Branch Data
    public function branchListData($branchId='')
    {
        $sql = "SELECT * FROM master_branch WHERE delete_status = 0 AND status = 'active' AND id=$branchId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Brach Purchase Order and Estimation
    public function getBranchPoDetail($companyName='', $branchId='')
    {
        if ($companyName) {
            $where1 = "company_name = '$companyName' AND "; 
        } else {
            $where1 = "";
        }

        if ($branchId) {
            $where = "branch_id=$branchId AND";
        } else {
            $where = "";
        }

        $sql = "SELECT IFNULL(PO.overall_po_amount, 0.00) AS overall_po_amount, IFNULL(PO.overall_security_amount, 0.00) AS overall_security_amount, IFNULL(EB.overall_estimation_amount, 0.00) AS overall_estimation_amount, IFNULL(EB.overall_taxinvoice_amount, 0.00) AS overall_taxinvoice_amount,  IFNULL(EB.overall_retention_amount, 0.00) AS overall_retention_amount, ROUND((IFNULL(PO.overall_po_amount, 0.00) - (IFNULL(EB.overall_estimation_amount, 0.00) + IFNULL(EB.overall_taxinvoice_amount, 0.00) + IFNULL(EB.overall_retention_amount, 0.00))), 2) AS balance_po_amount FROM (SELECT ROUND(SUM(po_amount), 2) AS overall_po_amount, ROUND(SUM(security_amount), 2) AS overall_security_amount FROM purchase_order WHERE $where $where1 delete_status = 0 AND status = 'ongoing') PO LEFT JOIN (SELECT ROUND(SUM(CASE WHEN status = 'estimation' AND po_status = 'ongoing' THEN estimation_amount ELSE 0 END), 2) AS overall_estimation_amount, ROUND(SUM(CASE WHEN status = 'taxinvoice' AND po_status = 'ongoing' THEN taxinvoice_amount ELSE 0 END), 2) AS overall_taxinvoice_amount, ROUND(SUM(CASE WHEN status = 'retention' AND po_status = 'ongoing' THEN taxinvoice_amount ELSE 0 END), 2) AS overall_retention_amount FROM estimation_bill WHERE $where $where1 delete_status = 0) EB ON PO.overall_po_amount IS NOT NULL";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //All Purchase Order Total Value List
    public function getPurchaseOrderTotalValue($companyName = '')
    {
        if ($companyName != '') { 
            $where = "company_name = '$companyName' AND ";
        } else {
            $where = '';
        }

        $sql = "WITH PurchaseOrderSum AS (SELECT id, CAST(ROUND(SUM(po_amount), 2) AS DECIMAL(10, 2)) AS overall_purchase_amount, CAST(ROUND(SUM(security_amount), 2) AS DECIMAL(10, 2)) AS overall_security_amount FROM purchase_order WHERE $where delete_status = 0 AND status = 'ongoing' GROUP BY id), EstimationBillSum AS (SELECT po_id, CAST(ROUND(SUM(CASE WHEN status = 'estimation' AND po_status = 'ongoing' THEN estimation_amount ELSE 0 END), 2) AS DECIMAL(10, 2)) AS overall_estimation_amount, CAST(ROUND(SUM(CASE WHEN status = 'taxinvoice' AND po_status = 'ongoing' THEN taxinvoice_amount ELSE 0 END), 2) AS DECIMAL(10, 2)) AS overall_taxinvoice_amount, CAST(ROUND(SUM(CASE WHEN status = 'retention' THEN taxinvoice_amount ELSE 0 END), 2) AS DECIMAL(10, 2)) AS overall_retention_amount FROM estimation_bill WHERE $where delete_status = 0 GROUP BY po_id) SELECT SUM(POS.overall_purchase_amount) AS overall_purchase_amount, SUM(POS.overall_security_amount) AS overall_security_amount, SUM(COALESCE(EBS.overall_estimation_amount, 0)) AS overall_estimation_amount, SUM(COALESCE(EBS.overall_retention_amount, 0)) AS overall_retention_amount, SUM(COALESCE(EBS.overall_taxinvoice_amount, 0)) AS overall_taxinvoice_amount, SUM(POS.overall_purchase_amount - (COALESCE(EBS.overall_estimation_amount, 0) + COALESCE(EBS.overall_taxinvoice_amount, 0) + COALESCE(EBS.overall_retention_amount, 0))) AS overall_balance_amount FROM PurchaseOrderSum POS LEFT JOIN EstimationBillSum EBS ON POS.id = EBS.po_id";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //All Branch Purchase Order List
    public function getAllBranchPurchaseOrderList($companyName = '')
    {
        
        if ($companyName != '') { 
            $where = " AND company_name = '$companyName' ";
        } else {
            $where = '';
        }
        
        $sql = "SELECT MB.*, ROUND(COALESCE(PO.branch_po_amount, 0), 2) AS branch_po_amount, ROUND(COALESCE(PO.security_amount, 0), 2) AS security_amount, ROUND(COALESCE(EB.branch_estimation_amount, 0), 2) AS branch_estimation_amount, ROUND(COALESCE(EB_TAX.branch_taxinvoice_amount, 0), 2) AS branch_taxinvoice_amount, ROUND(COALESCE(EB_RETENTION.branch_retention_amount, 0), 2) AS branch_retention_amount, ROUND(COALESCE(PO.branch_po_amount, 0) - COALESCE(EB.branch_estimation_amount, 0) - COALESCE(EB_TAX.branch_taxinvoice_amount, 0) - COALESCE(EB_RETENTION.branch_retention_amount, 0), 2) AS branch_balance_po_amount FROM master_branch MB LEFT JOIN (SELECT branch_id, SUM(po_amount) AS branch_po_amount, SUM(security_amount) AS security_amount FROM purchase_order WHERE delete_status = 0 AND status = 'ongoing' $where GROUP BY branch_id) PO ON PO.branch_id = MB.id LEFT JOIN (SELECT branch_id, SUM(estimation_amount) AS branch_estimation_amount FROM estimation_bill WHERE status = 'estimation' AND delete_status = 0 AND po_status = 'ongoing' $where GROUP BY branch_id) EB ON EB.branch_id = MB.id LEFT JOIN (SELECT branch_id, SUM(taxinvoice_amount) AS branch_taxinvoice_amount FROM estimation_bill WHERE status = 'taxinvoice' AND delete_status = 0 $where GROUP BY branch_id) EB_TAX ON EB_TAX.branch_id = MB.id LEFT JOIN (SELECT branch_id, SUM(taxinvoice_amount) AS branch_retention_amount FROM estimation_bill WHERE status = 'retention' AND delete_status = 0 $where GROUP BY branch_id) EB_RETENTION ON EB_RETENTION.branch_id = MB.id WHERE MB.delete_status = 0 AND MB.status = 'active' ORDER BY MB.branch ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Purchase Order List
    public function getPurchaseOrderList($companyName='', $branchId='')
    {
        if ($companyName) {
            $where1 = "AND PO.company_name = '$companyName'"; 
        } else {
            $where1 = "";
        }

        if ($branchId) {
            $where = "AND PO.branch_id = $branchId"; 
        } else {
            $where = "";
        }

        $sql = "SELECT PO.*, PO.po_title AS poTitle, DATE_FORMAT(PO.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_dateFormat, DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat, ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.estimation_amount ELSE 0.00 END), 2) AS estimation_amount, ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS taxinvoice_amount, ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS retention_amount, ROUND((PO.po_amount - (ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.estimation_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2))), 2) AS balance_amount FROM purchase_order PO LEFT JOIN estimation_bill EB ON EB.po_id = PO.id WHERE PO.delete_status = 0 AND PO.status = 'ongoing' $where $where1 GROUP BY PO.id ORDER BY PO.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Purchase Order List
    public function getAllPurchaseOrdersList()
    {
        $sql = "SELECT PO.*, MB.branch AS branch_name, MB.zone, DATE_FORMAT(PO.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_dateFormat, DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat, ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.estimation_amount ELSE 0.00 END), 2) AS estimation_amount, ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS taxinvoice_amount, ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS retention_amount, ROUND((PO.po_amount - (ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.estimation_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2))), 2) AS balance_amount FROM purchase_order PO LEFT JOIN estimation_bill EB ON EB.po_id = PO.id LEFT JOIN master_branch MB ON MB.id = PO.branch_id WHERE PO.delete_status = 0 AND PO.status = 'ongoing' GROUP BY PO.id ORDER BY PO.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Purchase Order Complete List
    public function getCompletePurchaseOrderList($companyName='', $branchId='')
    {
        if ($companyName) {
            $where1 = "AND PO.company_name = '$companyName'"; 
        } else {
            $where1 = "";
        }

        if ($branchId) {
            $where = "AND PO.branch_id = $branchId"; 
        } else {
            $where = "";
        }

        $sql = "SELECT PO.*, PO.po_title AS poTitle, DATE_FORMAT(PO.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_dateFormat, DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat, ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'completed' THEN EB.estimation_amount ELSE 0.00 END), 2) AS estimation_amount, ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' OR EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'completed' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS taxinvoice_amount, ROUND((PO.po_amount - (ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'completed' THEN EB.estimation_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'completed' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'completed' THEN EB.taxinvoice_amount ELSE 0.00 END), 2))), 2) AS balance_amount FROM purchase_order PO LEFT JOIN estimation_bill EB ON EB.po_id = PO.id WHERE PO.delete_status = 0 AND PO.status = 'completed' $where $where1 GROUP BY PO.id ORDER BY PO.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Retention List
    public function getRetentionList($poId='')
    {
        if ($poId) {
            $where = "AND po_id = $poId"; 
        } else {
            $where = "";
        }

        $sql = "SELECT *, DATE_FORMAT(received_date, '%d - %m - %Y') AS received_dateFormat, DATE_FORMAT(retention_date, '%d - %m - %Y') AS retention_dateFormat FROM retention_money WHERE delete_status = 0 AND status = 'notreceived' $where ORDER BY id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Pending Retention List for Cron Email
    public function getPendingRetentionList()
    {
        $sql = "SELECT RM.*, MB.branch AS branch_name, MB.zone, PO.po_title, PO.purchase_order_no, 
                DATE_FORMAT(PO.po_date, '%d-%m-%Y') AS po_dateFormat, 
                EB.estimation_number, DATE_FORMAT(EB.estimation_date, '%d-%m-%Y') AS estimation_dateFormat, 
                DATE_FORMAT(RM.retention_date, '%d-%m-%Y') AS retention_dateFormat 
                FROM retention_money RM 
                LEFT JOIN master_branch MB ON MB.id = RM.branch_id 
                LEFT JOIN purchase_order PO ON PO.id = RM.po_id 
                LEFT JOIN estimation_bill EB ON EB.id = RM.estimation_id 
                WHERE RM.delete_status = 0 AND RM.status = 'notreceived' 
                AND RM.retention_date IS NOT NULL 
                AND RM.retention_date != '0000-00-00'
                AND RM.retention_date <= LAST_DAY(CURRENT_DATE) 
                ORDER BY MB.zone ASC, MB.branch ASC, RM.retention_date ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Pending Security Amount List for Cron Email
    public function getPendingSecurityAmountListForCron($year, $month = null)
    {
        $monthCondition = "";
        if ($month !== null) {
            $monthCondition = " AND MONTH(DATE_ADD(PO.validity_end, INTERVAL 1 YEAR)) = $month ";
        }

        $sql = "SELECT PO.*, MB.branch AS branch_name, MB.zone, 
                DATE_FORMAT(PO.po_date, '%d-%m-%Y') AS po_dateFormat, 
                DATE_FORMAT(PO.validity_end, '%d-%m-%Y') AS validity_endFormat, 
                DATE_FORMAT(DATE_ADD(PO.validity_end, INTERVAL 1 YEAR), '%d-%m-%Y') AS security_due_dateFormat 
                FROM purchase_order PO 
                LEFT JOIN master_branch MB ON MB.id = PO.branch_id 
                WHERE PO.delete_status = 0 AND PO.security_status != 'received' 
                AND PO.validity_end IS NOT NULL 
                AND PO.validity_end != '0000-00-00'
                AND YEAR(DATE_ADD(PO.validity_end, INTERVAL 1 YEAR)) = $year 
                $monthCondition 
                ORDER BY MB.zone ASC, MB.branch ASC, DATE_ADD(PO.validity_end, INTERVAL 1 YEAR) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Taxinvoice List
    public function getTaxinvoiceAmountList($poId='')
    {
        if ($poId) {
            $where = "AND EB.po_id = $poId"; 
        } else {
            $where = "";
        }

        $sql = "SELECT EB.*, PO.po_title AS poTitle, PO.purchase_order_no, DATE_FORMAT(EB.taxinvoice_date, '%d - %m - %Y') AS taxinvoice_date, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_date FROM estimation_bill EB LEFT JOIN purchase_order PO ON PO.id = EB.po_id WHERE EB.delete_status = 0 AND EB.status = 'taxinvoice' $where ORDER BY EB.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Estimation Bill List
    public function getEstimationBillList($poId='')
    {
        if ($poId) {
            $where = "AND EB.po_id = $poId"; 
        } else {
            $where = "";
        }

        $sql = "SELECT EB.*, PO.po_title AS poTitle, PO.purchase_order_no, DATE_FORMAT(EB.estimation_date, '%d - %m - %Y') AS estimation_date, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_date FROM estimation_bill EB LEFT JOIN purchase_order PO ON PO.id = EB.po_id WHERE EB.delete_status = 0 AND EB.status = 'estimation' $where ORDER BY EB.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Purchase Order Detail
    public function getPurchaseOrderDetail($poId = '')
    {
        $sql = "
        SELECT 
            PO.*,

            MV.vendor_code AS vendorCode,
            MB.branch AS branchName,
            MB.zone,
            PO.po_title AS poTitle,
            MP.pan_number AS panNumber,
            MG.gst_number AS gstNumber,
            LP.employee_name,

            DATE_FORMAT(PO.security_received_date, '%d - %m - %Y') AS security_received_dateFormat,
            DATE_FORMAT(PO.created_at, '%d/%m/%Y %h:%i %p') AS created_at,
            DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_dateFormat,
            DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat,

            ROUND(SUM(CASE 
                WHEN EB.status = 'estimation' AND EB.delete_status = 0 
                THEN EB.estimation_amount ELSE 0 END), 2) AS estimation_amount,

            ROUND(SUM(CASE 
                WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 
                THEN EB.taxinvoice_amount ELSE 0 END), 2) AS taxinvoice_amount,

            ROUND(SUM(CASE 
                WHEN EB.status = 'retention' AND EB.delete_status = 0 
                THEN EB.taxinvoice_amount ELSE 0 END), 2) AS retention_amount,

            /* ---- Retention Money Overall Totals ---- */
            IFNULL(RM.received_amount, 0) AS received_amount,
            IFNULL(RM.tds_amount, 0) AS tds_amount,
            IFNULL(RM.wct_amount, 0) AS wct_amount,
            IFNULL(RM.retention_money, 0) AS retention_money,
            IFNULL(RM.hold_amount, 0) AS hold_amount,

            ROUND(
                PO.po_amount - (
                    SUM(CASE 
                        WHEN EB.status = 'estimation' AND EB.delete_status = 0 
                        THEN EB.estimation_amount ELSE 0 END)
                    +
                    SUM(CASE 
                        WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 
                        THEN EB.taxinvoice_amount ELSE 0 END)
                    +
                    SUM(CASE 
                        WHEN EB.status = 'retention' AND EB.delete_status = 0 
                        THEN EB.taxinvoice_amount ELSE 0 END)
                ), 2
            ) AS balance_amount

        FROM purchase_order PO

        LEFT JOIN master_vendor MV ON MV.id = PO.vendor_code
        LEFT JOIN master_branch MB ON MB.id = PO.branch_id
        LEFT JOIN master_pan MP ON MP.id = PO.pan_number
        LEFT JOIN master_gst MG ON MG.id = PO.gst_number
        LEFT JOIN login_permission LP ON LP.employee_id = PO.created_by
        LEFT JOIN estimation_bill EB ON EB.po_id = PO.id

        /* ---- Aggregated Retention Money ---- */
        LEFT JOIN (
            SELECT 
                po_id,
                SUM(IFNULL(received_amount, 0)) AS received_amount,
                SUM(IFNULL(tds_amount, 0)) AS tds_amount,
                SUM(IFNULL(wct_amount, 0)) AS wct_amount,
                SUM(IFNULL(retention_amount, 0)) AS retention_money,
                SUM(IFNULL(hold_amount, 0)) AS hold_amount
            FROM retention_money
            WHERE delete_status = 0
            GROUP BY po_id
        ) RM ON RM.po_id = PO.id

        WHERE PO.delete_status = 0
        AND PO.id = $poId

        GROUP BY PO.id
        ";

        $res = $this->db->query($sql);
        return $res->result();
    }


    //Estimation Detail
    public function getEstimationDetail($estId='')
    {
        $sql = "SELECT EB.*, PO.purchase_order_no, PO.id AS po_id, RM.id AS retention_id, MB.id AS branch_id, MB.branch AS branch_name, PO.po_title, PO.gst_percentage, PO.hpcl_gst_number, PO.hpcl_address, RM.retention_date, RM.received_date, RM.received_amount, RM.retention_amount, RM.tds_amount, RM.wct_amount, RM.hold_amount, RM.bank_name, RM.retention_img FROM estimation_bill EB LEFT JOIN purchase_order PO ON PO.id = EB.po_id LEFT JOIN retention_money RM ON RM.estimation_id = EB.id LEFT JOIN master_branch MB ON MB.id = EB.branch_id WHERE EB.delete_status = 0 AND EB.id = $estId";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Check Po Number
    public function checkPoNumber($purchaseOrderNo='')
    {
        $sql = "SELECT * FROM purchase_order WHERE delete_status = 0 AND purchase_order_no = '" . $purchaseOrderNo . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Check Invoice Number
    public function checkInvoiceNumber($taxinvoiceNumber='')
    {
        $sql = "SELECT * FROM estimation_bill WHERE delete_status = 0 AND taxinvoice_number = '" . $taxinvoiceNumber . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    // Save Purchase Order Data
    public function purchaseOrderSaveData($poId, $branchId, $companyName, $poDate, $validityEnd, $purchaseOrderNo, $poTitle, $securityAmount, $gstNumber, $gstPercentage, $vendorCode, $panNumber, $hpclGstNumber, $hpclAddress, $securityAmountReceipt_img, $purchaseOrderLetter_img, $securityAmountDD_img, $purchaseAmount)
    {
        $userId = $this->session->userdata('userid');

        if (empty($gstNumber)) {
          $gstNumber = '';
        }
        if (empty($gstPercentage)) {
          $gstPercentage = '';
        }
        if (empty($vendorCode)) {
          $vendorCode = '';
        }
        if (empty($panNumber)) {
          $panNumber = '';
        }
        if (empty($hpclGstNumber)) {
          $hpclGstNumber = '';
        }
        if (empty($hpclAddress)) {
          $hpclAddress = '';
        }

        $year = date('y');
        $this->db->select_max('id');
        $query = $this->db->get('purchase_order');
        $result = $query->row_array();
        $maxID = $result['id'];
        $serialNoId = sprintf("%05d", $maxID + 1);
        $serialNo = $year . '/' . $serialNoId;
    
        if ($poId > 0) {
            $data = array(
                'branch_id' => $branchId,
                'company_name' => $companyName,
                'po_date' => $poDate,
                'validity_end' => $validityEnd,
                'purchase_order_no' => $purchaseOrderNo,
                'po_title' => $poTitle,
                'security_amount' => $securityAmount,
                'gst_number' => $gstNumber,
                'gst_percentage' => $gstPercentage,
                'vendor_code' => $vendorCode,
                'pan_number' => $panNumber,
                'hpcl_gst_number' => $hpclGstNumber,
                'hpcl_address' => $hpclAddress,
                'receipt_img' => $securityAmountReceipt_img,
                'po_letter' => $purchaseOrderLetter_img,
                'dd_img' => $securityAmountDD_img,
                'po_amount' => $purchaseAmount,
                'status' => 'ongoing',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $poId);
            $this->db->update('purchase_order', $data);
        } else {  
            $data = array(
                'sno' => $serialNo,
                'branch_id' => $branchId,
                'company_name' => $companyName,
                'po_date' => $poDate,
                'validity_end' => $validityEnd,
                'purchase_order_no' => $purchaseOrderNo,
                'po_title' => $poTitle,
                'security_amount' => $securityAmount,
                'gst_number' => $gstNumber,
                'gst_percentage' => $gstPercentage,
                'vendor_code' => $vendorCode,
                'pan_number' => $panNumber,
                'hpcl_gst_number' => $hpclGstNumber,
                'hpcl_address' => $hpclAddress,
                'receipt_img' => $securityAmountReceipt_img,
                'po_letter' => $purchaseOrderLetter_img,
                'dd_img' => $securityAmountDD_img,
                'po_amount' => $purchaseAmount,
                'status' => 'ongoing',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('purchase_order', $data);
            $this->db->insert_id();
        }
    }

    //Check Estimation Number
    public function checkEstimationNumber($estimationNumber)
    {
        $sql = "SELECT * FROM estimation_bill WHERE delete_status = 0 AND estimation_number = '" . $estimationNumber . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    // Save Estimation Data
    public function estimationSaveData($estId, $branchId, $companyName, $purchaseOrderId, $estimationDate, $estimationNumber,  $estimationAmount, $jobReport_img, $invoiceDate, $callupNumber, $invoiceNumber, $netAmount,  $invoiceAmount, $receivedDate, $retentionDate, $receivedAmount, $tdsAmount, $wctAmount,  $retentionAmount, $holdAmount, $bankName, $jobReport, $retentionDoc_img, $invoiceDoc_img, $status)
    {        
        $userId = $this->session->userdata('userid');
    
        $year = date('y');

        // Get the next serial number
        $this->db->select_max('id');
        $query = $this->db->get('estimation_bill');
        $result = $query->row_array();
        $maxID = $result['id'];
        $serialNoId = sprintf("%05d", $maxID + 1);
        $serialNo = $year . '/' . $serialNoId;
    
        $this->db->select_max('id');
        $query = $this->db->get('estimation_bill');
        $result = $query->row_array();
        $maxEstID = $result['id'];
        $maxEstNumber = sprintf($maxEstID + 1);
    
        if ($estId > 0) {
            if ($status === 'taxinvoice' || $status === 'estimation' || $status === 'retention') {
                $data = [
                    'estimation_date' => $estimationDate,
                    'estimation_number' => $estimationNumber,
                    'job_report' => $jobReport_img,
                    'estimation_amount' => $estimationAmount,
                    'updated_by' => $userId,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                if ($status === 'taxinvoice' || $status === 'retention') {
                    $data = array_merge($data, [
                        'taxinvoice_date' => $invoiceDate,
                        'callup_number' => $callupNumber,
                        'taxinvoice_number' => $invoiceNumber,
                        'net_amount' => $netAmount,
                        'taxinvoice_amount' => $invoiceAmount,
                        'taxinvoice_doc' => $invoiceDoc_img,
                        'updated_by' => $userId,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }

                $this->db->where('id', (int)$estId);
                $this->db->update('estimation_bill', $data);
            }

            if ($status === 'retention') {
                $retentionData = [
                    'received_date' => $receivedDate,
                    'retention_date' => $retentionDate,
                    'received_amount' => $receivedAmount,
                    'tds_amount' => $tdsAmount,
                    'wct_amount' => $wctAmount,
                    'retention_amount' => $retentionAmount,
                    'hold_amount' => $holdAmount,
                    'bank_name' => $bankName,
                    'retention_img' => $retentionDoc_img,
                    'updated_by' => $userId,
                    'updated_at' => date('Y-m-d H:i:s')
                ];

                $this->db->where('estimation_id', (int)$estId);
                $this->db->update('retention_money', $retentionData);
            }
        } else {
            $data = [
                'sno' => $serialNo,
                'branch_id' => $branchId,
                'company_name' => $companyName,
                'po_id' => $purchaseOrderId,
                'estimation_date' => $estimationDate,
                'estimation_number' => $estimationNumber,
                'job_report' => $jobReport_img,
                'estimation_amount' => $estimationAmount,
                'status' => 'estimation',
                'po_status' => 'ongoing',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('estimation_bill', $data);
            $this->db->insert_id();
        }
    }

    //Estimation Info
    public function getEstimationInfo($estimationId='')
    {
        $sql = "SELECT EB.*, PO.security_status, DATE_FORMAT(RM.retention_received_date, '%d - %m - %Y') AS retention_received_dateFormat, DATE_FORMAT(RM.received_date, '%d - %m - %Y') AS received_dateFormat, DATE_FORMAT(RM.retention_date, '%d - %m - %Y') AS retention_dateFormat, DATE_FORMAT(EB.estimation_date, '%d - %m - %Y') AS estimation_dateFormat, DATE_FORMAT(EB.taxinvoice_date, '%d - %m - %Y') AS taxinvoice_date, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS purchase_dateFormat, DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat, RM.id AS retention_id, RM.status AS retention_status, RM.received_amount, RM.tds_amount, RM.wct_amount, RM.retention_amount, RM.hold_amount, RM.bank_name, RM.retention_img, MB.branch AS branch_name, MB.zone, PO.po_title AS purchase_title, PO.po_amount AS purchase_amount, PO.purchase_order_no AS purchase_number FROM estimation_bill EB LEFT JOIN purchase_order PO ON PO.id = EB.po_id LEFT JOIN master_branch MB ON MB.id = EB.branch_id LEFT JOIN retention_money RM ON RM.estimation_id = EB.id WHERE EB.delete_status = 0 AND EB.id = $estimationId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Taxinvoice Form
    public function saveTaxinvoiceForm($estimationId, $purchaseId, $taxinvoiceDate, $callupNumber, $taxinvoiceNumber, $invoiceDoc_img, $netAmount, $taxinvoiceAmount)
    {
        $userId = $this->session->userdata('userid');
        
        // Retrieve taxinvoice details
        $taxinvoiceDetailsQuery = "SELECT branch_id, company_name 
                                FROM estimation_bill 
                                WHERE id = ?";
        $taxinvoiceDetails = $this->db->query($taxinvoiceDetailsQuery, array($estimationId))->row_array();

        if ($estimationId > 0) {
            $data = array(
                'taxinvoice_date' => $taxinvoiceDate,
                'callup_number' => $callupNumber,
                'taxinvoice_number' => $taxinvoiceNumber,
                'taxinvoice_doc' => $invoiceDoc_img,
                'net_amount' => $netAmount,
                'taxinvoice_amount' => $taxinvoiceAmount,
                'status' => 'taxinvoice',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $estimationId);
            $this->db->update('estimation_bill', $data);

            $data = array(
                'po_id' => $purchaseId,
                'estimation_id' => $estimationId,
                'status' => 'notreceived',
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s'),

                // Taxinvoice details fields to save
                'branch_id' => $taxinvoiceDetails['branch_id'],
                'company_name' => $taxinvoiceDetails['company_name']
            );
            $this->db->insert('retention_money', $data);
            $this->db->insert_id();
        }
    }

    //Save Tax Amount Received Form
    public function saveTaxAmountReceivedForm($retentionId, $estimationId, $receivedDate, $retentionDate, $receivedAmount, $tdsAmount, $wctAmount, $retentionAmount, $holdAmount, $bankName, $retentionDoc_img)
    {
        if ($retentionId > 0) {
            $data = array(
                'received_date' => $receivedDate,
                'retention_date' => $retentionDate,
                'received_amount' => $receivedAmount,
                'tds_amount' => $tdsAmount,
                'wct_amount' => $wctAmount,
                'retention_amount' => $retentionAmount,
                'hold_amount' => $holdAmount,
                'bank_name' => $bankName,
                'retention_img' => $retentionDoc_img,
                'status' => 'notreceived'
            );
            $this->db->where('id', (int) $retentionId);
            $this->db->update('retention_money', $data);

            $data = array(
                'status' => 'retention'
            );
            $this->db->where('id', (int) $estimationId);
            $this->db->update('estimation_bill', $data);
        }
    }

    //All Retention Money Total Value List
    public function getRetentionMoneyTotalValue($companyName = '', $pageStatus = '', $branchId = '')
    {
        if ($companyName != '' && $pageStatus != '') { 
            $where = "RM.company_name = '$companyName' AND RM.status = '$pageStatus' AND ";
        } else {
            $where = '';
        }
        if ($branchId != '') { 
            $where1 = "RM.branch_id = '$branchId' AND ";
        } else {
            $where1 = '';
        }
        $sql = "SELECT COALESCE(ROUND(SUM(RM.tds_amount) + SUM(RM.wct_amount), 2), 0.00) AS overall_tax_amount, COALESCE(ROUND(SUM(RM.hold_amount), 2), 0.00) AS overall_hold_amount, COALESCE(ROUND(SUM(RM.retention_amount), 2), 0.00) AS overall_retention_amount, COALESCE(ROUND(SUM(RM.received_amount), 2), 0.00) AS overall_received_amount, (SELECT COALESCE(ROUND(SUM(EB.taxinvoice_amount), 2), 0.00) FROM estimation_bill EB WHERE EB.company_name = '$companyName' AND EB.delete_status = 0 AND EB.status = 'retention') AS overall_taxinvoice_amount FROM retention_money RM WHERE $where $where1 RM.delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Retention Money List
    public function getRetentionMoneyList($companyName='', $pageStatus='', $branchId='')
    {
        if ($companyName && $pageStatus) {
            if ($pageStatus == 'notreceived') {
                $pageStatus = 'retention';
                $where = "RM.company_name = '$companyName' AND EB.status = '$pageStatus' AND RM.status = 'notreceived' AND ";
            } elseif ($pageStatus == 'received') {
                $pageStatus = 'received';
                $where = "RM.company_name = '$companyName' AND RM.status = '$pageStatus' AND ";
            }
        } else {
            $where = "";
        }
        if ($branchId) {
            $where1 = "RM.branch_id = '$branchId' AND ";
        } else {
            $where1 = "";
        }
        
        $sql = "SELECT RM.*, DATE_FORMAT(RM.retention_date, '%d - %m - %Y') AS retention_dateFormat, MB.branch, MB.zone, PO.purchase_order_no FROM retention_money RM LEFT JOIN estimation_bill EB ON EB.id = RM.estimation_id LEFT JOIN master_branch MB ON MB.id = RM.branch_id LEFT JOIN purchase_order PO ON PO.id = RM.po_id WHERE $where $where1 RM.delete_status = 0 ORDER BY RM.retention_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Retention Money List
    public function getRetentionMoneyReminderList($year='', $month='')
    {
        $year = $year + 1;

        if ($year && $month) {
            $where = "YEAR(RM.retention_date) = '$year' AND MONTH(RM.retention_date) = '$month' AND ";
        } else {
            $where = "";
        }

        $sql = "SELECT RM.*, DATE_FORMAT(RM.retention_date, '%d - %m - %Y') AS retention_dateFormat, MB.branch, MB.zone, PO.purchase_order_no FROM retention_money RM LEFT JOIN estimation_bill EB ON EB.id = RM.estimation_id LEFT JOIN master_branch MB ON MB.id = RM.branch_id LEFT JOIN purchase_order PO ON PO.id = RM.po_id WHERE $where RM.delete_status = 0 ORDER BY RM.retention_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Retention Money Received Form
    public function saveRetentionReceivedForm($retentionId, $receivedDate)
    {
        $userId = $this->session->userdata('userid');

        if ($retentionId > 0) {
            $data = array(
                'retention_received_date' => $receivedDate,
                'status' => 'received',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $retentionId);
            $this->db->update('retention_money', $data);
        }
    }

    //All Security Amount Total Value List
    public function getSecurityAmountTotalValue($companyName = '', $pageStatus = '', $branchId = '')
    {
        if ($companyName && $pageStatus) {
            $where = "PO.company_name = '$companyName' AND PO.security_status = '$pageStatus' AND ";
        } else {
            $where = "";
        }

        if ($branchId) {
            $where1 = "PO.branch_id = '$branchId' AND ";
        } else {
            $where1 = "";
        }
        
        $sql = "SELECT PO.*, COALESCE((SELECT ROUND(SUM(PO.security_amount), 2) FROM purchase_order PO WHERE $where PO.delete_status = 0), 0.00) AS overall_security_amount, COALESCE((SELECT ROUND(SUM(PO.security_amount), 2) FROM purchase_order PO WHERE $where PO.delete_status = 0 AND PO.security_status = 'notreceived'), 0.00) AS overall_notreceived_amount, COALESCE((SELECT ROUND(SUM(PO.security_amount), 2) FROM purchase_order PO WHERE $where PO.delete_status = 0 AND PO.security_status = 'received'), 0.00) AS overall_received_amount, COALESCE((SELECT ROUND(SUM(PO.security_amount), 2) FROM purchase_order PO WHERE $where PO.delete_status = 0), 0.00) - COALESCE((SELECT ROUND(SUM(PO.security_amount), 2) FROM purchase_order PO WHERE $where PO.delete_status = 0 AND PO.security_status = 'received'), 0.00) AS overall_balance_amount FROM purchase_order PO WHERE $where1 PO.delete_status = 0";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Security Amount List
    public function getSecurityAmountList($companyName='', $pageStatus='', $branchId = '')
    {
        if ($companyName && $pageStatus) {
            $where = "PO.company_name = '$companyName' AND PO.security_status = '$pageStatus' AND ";
        } else {
            $where = "";
        }
        
        if ($branchId) {
            $where1 = "PO.branch_id = '$branchId' AND ";
        } else {
            $where1 = "";
        }

        $sql = "SELECT PO.*, MB.branch AS branch_name, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_dateFormat, DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat, MB.zone FROM purchase_order PO LEFT JOIN master_branch MB ON MB.id = PO.branch_id WHERE $where $where1 PO.delete_status = 0 ORDER BY PO.validity_end ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Security Amount Received Form
    public function saveSecurityAmountReceivedForm($purchaseId, $receivedDate)
    {
        $userId = $this->session->userdata('userid');

        if ($purchaseId > 0) {
            $data = array(
                'security_received_date' => $receivedDate,
                'security_status' => 'received',
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $purchaseId);
            $this->db->update('purchase_order', $data);
        }
    }


    
    //Purchase Order List
    public function getPurchaseList($companyName='')
    {
        if ($companyName) {
            $where = "AND PO.company_name = '$companyName'"; 
        } else {
            $where = "";
        }

        $sql = "SELECT PO.*, PO.po_title AS poTitle, DATE_FORMAT(PO.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_dateFormat, DATE_FORMAT(PO.validity_end, '%d - %m - %Y') AS validity_endFormat, ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.estimation_amount ELSE 0.00 END), 2) AS estimation_amount, ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS taxinvoice_amount, ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) AS retention_amount, ROUND((PO.po_amount - (ROUND(SUM(CASE WHEN EB.status = 'estimation' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.estimation_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'retention' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2) + ROUND(SUM(CASE WHEN EB.status = 'taxinvoice' AND EB.delete_status = 0 AND EB.po_status = 'ongoing' THEN EB.taxinvoice_amount ELSE 0.00 END), 2))), 2) AS balance_amount FROM purchase_order PO LEFT JOIN estimation_bill EB ON EB.po_id = PO.id WHERE PO.delete_status = 0 AND PO.status = 'ongoing' $where GROUP BY PO.id ORDER BY PO.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Estimation List
    public function getEstimationList($companyName='')
    {
        if ($companyName) {
            $where = "AND EB.company_name = '$companyName'"; 
        } else {
            $where = "";
        }

        $sql = "SELECT EB.*, PO.po_title AS poTitle, PO.purchase_order_no, DATE_FORMAT(EB.estimation_date, '%d - %m - %Y') AS estimation_date, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_date FROM estimation_bill EB LEFT JOIN purchase_order PO ON PO.id = EB.po_id WHERE EB.delete_status = 0 AND EB.status = 'estimation' $where ORDER BY EB.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    //Taxinvoice List
    public function getTaxinvoiceList($companyName='')
    {
        if ($companyName) {
            $where = "AND EB.company_name = '$companyName'"; 
        } else {
            $where = "";
        }

        $sql = "SELECT EB.*, PO.po_title AS poTitle, PO.purchase_order_no, DATE_FORMAT(EB.taxinvoice_date, '%d - %m - %Y') AS taxinvoice_date, DATE_FORMAT(PO.po_date, '%d - %m - %Y') AS po_date FROM estimation_bill EB LEFT JOIN purchase_order PO ON PO.id = EB.po_id WHERE EB.delete_status = 0 AND EB.status = 'taxinvoice' $where ORDER BY EB.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function updateBalanceAlertFlags($poId, $data)
    {
        $this->db->where('id', (int) $poId);
        $this->db->update('purchase_order', $data);
    }
}
?>