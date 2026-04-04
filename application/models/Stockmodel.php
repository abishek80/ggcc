<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stockmodel extends CI_Model
{
    public function monthMaterialList()
    {
        $sql ="SELECT * FROM master_material WHERE status = 'active' AND entry_type = 'monthly_entry' AND delete_status = 0 ORDER BY CAST(material_code AS UNSIGNED) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getCurrentStockList() {
        $sql ="SELECT MM.id AS material_id, MM.material_code, MM.material_name, MM.category, MM.type, IFNULL(stockin.total_stockin, 0) AS available_stockin, IFNULL(stockout.total_stockout, 0) AS available_stockout, IFNULL(stockin.total_stockin, 0) - IFNULL(stockout.total_stockout, 0) AS balance_stock FROM master_material MM LEFT JOIN (SELECT material_id, SUM(CAST(quantity AS UNSIGNED)) AS total_stockin FROM stock_transaction WHERE type = 'stockin' AND delete_status = 0 AND LOWER(method) <> 'transfer' GROUP BY material_id) AS stockin ON MM.id = stockin.material_id LEFT JOIN (SELECT material_id, SUM(CAST(quantity AS UNSIGNED)) AS total_stockout FROM stock_transaction WHERE type = 'stockout' AND delete_status = 0 AND LOWER(method) <> 'transfer' GROUP BY material_id) AS stockout ON MM.id = stockout.material_id WHERE MM.entry_type = 'daily_entry' ORDER BY CAST(MM.material_code AS UNSIGNED)";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Get list of branches
    public function getMaterialBranchList() {
        $sql = "SELECT MB.id AS branch_id, MB.branch, MB.zone FROM master_branch MB WHERE MB.status = 'active' GROUP BY MB.id, MB.branch ORDER BY MB.branch";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Get material stock per branch
    public function getMaterialStockByBranch() {
        $sql = "SELECT MB.id AS branch_id, MB.branch, MM.id AS material_id, MM.material_code, MM.material_name, MM.category, MM.type, COALESCE(SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) END), 0) AS available_stockin, COALESCE(SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) END), 0) AS available_stockout, COALESCE(SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) END), 0) - COALESCE(SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) END), 0) AS balance_stock FROM master_material MM CROSS JOIN master_branch MB LEFT JOIN stock_transaction MS ON MS.material_id = MM.id AND MS.from_branch = MB.id AND MS.delete_status = 0 WHERE MM.delete_status = 0 AND MM.entry_type = 'daily_entry' GROUP BY MB.id, MM.id ORDER BY CAST(MM.material_code AS UNSIGNED)";

        $query = $this->db->query($sql);
        return $query->result();
    }

    // Get stock count per material per branch (Optimized using associative array)
    public function getBranchMaterialCountList() {
        $sql = "SELECT MS.material_id, MS.from_branch AS branch_id, SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) AS available_stockin, SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) AS available_stockout, SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) - SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) AS stock_count FROM stock_transaction MS WHERE MS.delete_status = 0 GROUP BY MS.material_id, MS.from_branch";

        $res = $this->db->query($sql);

        // Convert result into an associative array for faster lookup
        $structuredData = [];
        foreach ($res->result() as $row) {
            $structuredData[$row->material_id][$row->branch_id] = $row->stock_count;
        }

        return $structuredData;
    }

    //Branch Current Stock Report Info
    public function getBranchCurrentStockList($branchId)
    {
        $sql = "SELECT MB.branch, MM.id AS material_id, MM.material_code, MM.material_name, MM.category, MM.type, IFNULL(SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) END), 0) AS available_stockin, IFNULL(SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) END), 0) AS available_stockout, (IFNULL(SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) END), 0) - IFNULL(SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) END), 0)) AS balance_stock FROM master_material MM LEFT JOIN stock_transaction MS ON MS.material_id = MM.id AND MS.delete_status = 0 AND MS.from_branch = $branchId LEFT JOIN master_branch MB ON MB.id = MS.from_branch WHERE MM.entry_type = 'daily_entry' GROUP BY MB.branch, MM.id ORDER BY CAST(MM.material_code AS UNSIGNED) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Stock Transaction List
    public function getStockTransactionList($materialId)
    {
        $sql = "SELECT MS.*, MB.branch AS branch_name, DATE_FORMAT(MS.date, '%d - %m - %Y') AS stockdate, MB1.branch AS to_branch_name FROM stock_transaction MS LEFT JOIN master_branch MB ON MB.id = MS.from_branch LEFT JOIN master_branch MB1 ON MB1.id = MS.to_branch WHERE MS.material_id = $materialId AND MS.delete_status = 0 ORDER BY MS.date DESC, MS.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    public function getMaterialName($materialCode)
    {
        $this->db->select("id, material_name, CONCAT(material_code, ' - ', material_name, ' - ', category, ' - ', type) as value, category, type");
        $this->db->where('entry_type', 'daily_entry');
        $this->db->like('material_code', $materialCode);
        $this->db->order_by('CAST(material_code AS UNSIGNED) ASC');
        $query = $this->db->get('master_material');
        return $query->result_array();
    }

    //Current Stock Material Report Info
    public function getCurrentStockMaterialInfo($materialId)
    {
        $sql = "SELECT MB.branch, MM.id AS material_id, MM.material_code, MM.material_name, MM.category, MM.type, SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) AS available_stockin, SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) AS available_stockout, SUM(CASE WHEN MS.type = 'stockin' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) - SUM(CASE WHEN MS.type = 'stockout' THEN CAST(MS.quantity AS UNSIGNED) ELSE 0 END) AS balance_stock FROM stock_transaction MS JOIN master_material MM ON MM.id = MS.material_id LEFT JOIN master_branch MB ON MB.id = MS.from_branch WHERE MS.material_id = $materialId AND MS.delete_status = 0 GROUP BY MS.from_branch, MM.id";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    public function getStockinMaterialName($materialCode, $fromBranchId)
    {
        $this->db->select('MM.id, MM.material_code, CONCAT(MM.material_code, " - ", MM.material_name, " - ", MM.category, " - ", MM.type) as value, MM.category, MM.type');
        $this->db->select('(SELECT SUM(MS.quantity) FROM stock_transaction MS WHERE MS.material_id = MM.id AND MS.from_branch = '.$fromBranchId.' AND MS.type = "stockin") AS stockin_available_stock');
        $this->db->select('(SELECT SUM(MS.quantity) FROM stock_transaction MS WHERE MS.material_id = MM.id AND MS.from_branch = '.$fromBranchId.' AND MS.type = "stockout") AS stockout_available_stock');
        $this->db->select('(COALESCE((SELECT SUM(MS.quantity) FROM stock_transaction MS WHERE MS.material_id = MM.id AND MS.from_branch = '.$fromBranchId.' AND MS.type = "stockin"), 0) - COALESCE((SELECT SUM(MS.quantity) FROM stock_transaction MS WHERE MS.material_id = MM.id AND MS.from_branch = '.$fromBranchId.' AND MS.type = "stockout"), 0)) AS current_stock_quantity');
        $this->db->from('master_material MM');
        $this->db->join('stock_transaction MS', 'MM.id = MS.material_id');
        $this->db->where('MS.from_branch', $fromBranchId);
        $this->db->where('MS.type', 'stockin');
        $this->db->like('MM.material_code', $materialCode);
        $this->db->having('current_stock_quantity >', 0);
        $this->db->order_by('CAST(MM.material_code AS UNSIGNED) ASC');
        $this->db->group_by('MM.id, MM.material_name, MM.category, MM.type');
        $query = $this->db->get();
        return $query->result();
    }


    //Stock Inward List
    public function getStockInList()
    {
        $sql = "SELECT MS.*, DATE_FORMAT(MS.date, '%d - %m - %Y') AS stockdate, MM.material_code, MM.material_name, MM.category, MM.type, MB1.branch AS from_branch_name, MB2.branch AS to_branch_name FROM stock_transaction MS LEFT JOIN master_material MM ON MM.id = MS.material_id LEFT JOIN master_branch MB1 ON MB1.id = MS.from_branch LEFT JOIN master_branch MB2 ON MB2.id = MS.to_branch WHERE MS.delete_status = 0 AND MS.type = 'stockin' ORDER BY MS.date DESC, MS.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Stock Inward Info
    public function getStockInInfo($stockInId)
    {
        $sql = "SELECT MS.*, MM.material_code, MM.material_name, MM.category, MM.type FROM stock_transaction MS LEFT JOIN master_material MM ON MM.id = MS.material_id WHERE MS.delete_status = 0 AND MS.id = $stockInId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Stockin Item List
    public function getStockInMaterialItems($stockInId)
    {
        $sql = "SELECT MS.*, MM.material_code, MM.material_name, MM.category, MM.type FROM stock_transaction MS LEFT JOIN master_material MM ON MM.id = MS.material_id WHERE MS.id = $stockInId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function saveStockInData($stockInId, $stockInDate, $zone, $fromBranchId, $getinFrom, $stockInArrayData)
    {
        $userId = $this->session->userdata('userid');
        $currentDateTime = date('Y-m-d H:i:s');

        $this->db->trans_start();

        if ($stockInId > 0) {
            $updateData = array(
                'date' => $stockInDate,
                'method' => $getinFrom,
                'zone' => $zone,
                'from_branch' => $fromBranchId,
                'updated_by' => $userId,
                'updated_at' => $currentDateTime
            );

            $this->db->where('id', (int) $stockInId);
            $this->db->update('stock_transaction', $updateData);

            if (!empty($stockInArrayData)) {
                $this->db->where('id', $stockInId);
                $this->db->delete('stock_transaction');

                foreach ($stockInArrayData as $item) {
                    $itemData = array(
                        'date' => $stockInDate,
                        'method' => $getinFrom,
                        'zone' => $zone,
                        'from_branch' => $fromBranchId,
                        'type' => 'stockin',
                        'material_id' => $item->materialId,
                        'quantity' => $item->materialQuantity,
                        'updated_by' => $userId,
                        'updated_at' => $currentDateTime
                    );
                    $this->db->insert('stock_transaction', $itemData);
                }
            }
        } else {
            if (!empty($stockInArrayData)) {
                foreach ($stockInArrayData as $item) {
                    $insertData = array(
                        'date' => $stockInDate,
                        'method' => $getinFrom,
                        'zone' => $zone,
                        'from_branch' => $fromBranchId,
                        'type' => 'stockin',
                        'material_id' => $item->materialId,
                        'quantity' => $item->materialQuantity,
                        'created_by' => $userId,
                        'created_at' => $currentDateTime
                    );
                    $this->db->insert('stock_transaction', $insertData);
                }
            }
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }
        return true;
    }

    //Stock Outward List
    public function getStockOutList()
    {
        $sql = "SELECT MS.*, DATE_FORMAT(MS.date, '%d - %m - %Y') AS stockdate, MM.material_code, MM.material_name, MM.category, MM.type, MB1.branch AS from_branch_name, MB2.branch AS to_branch_name FROM stock_transaction MS LEFT JOIN master_material MM ON MM.id = MS.material_id LEFT JOIN master_branch MB1 ON MB1.id = MS.from_branch LEFT JOIN master_branch MB2 ON MB2.id = MS.to_branch WHERE MS.delete_status = 0 AND MS.type = 'stockout' ORDER BY MS.date DESC, MS.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Stock Outward Info
    public function getStockOutInfo($stockOutId)
    {
        $sql = "SELECT MS.*, MM.material_code, MM.material_name, MM.category AS material_category, MM.type AS material_type FROM stock_transaction MS LEFT JOIN master_material MM ON MM.id = MS.material_id WHERE MS.delete_status = 0 AND MS.id = $stockOutId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Stockout Item List
    public function getStockOutMaterialItems($stockOutId)
    {
        $sql = "SELECT MS.*, MM.material_code, MM.material_name, MM.category, MM.type FROM stock_transaction MS LEFT JOIN master_material MM ON MM.id = MS.material_id WHERE MS.id = $stockOutId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Save Stock Outward Data
    public function saveStockOutData($stockOutId, $stockOutDate, $zone, $fromBranchId, $usedTo, $outletName, $toBranchId, $stockOutArrayData)
    {
        $userId = $this->session->userdata('userid');
        $currentDateTime = date('Y-m-d H:i:s');

        $this->db->trans_start();

        // Retrieve branch details
        $branchDetailsQuery = "SELECT zone 
                                FROM master_branch 
                                WHERE id = ?";
        $branchDetails = $this->db->query($branchDetailsQuery, array($toBranchId))->row_array();

        if ($stockOutId > 0) {
            $updateData = array(
                'date' => $stockOutDate,
                'method' => $usedTo,
                'zone' => $zone,
                'from_branch' => $fromBranchId,
                'outlet_name' => $outletName,
                'to_branch' => $toBranchId,
                'updated_by' => $userId,
                'updated_at' => $currentDateTime
            );

            $this->db->where('id', (int) $stockOutId);
            $this->db->update('stock_transaction', $updateData);

            if (!empty($stockOutArrayData)) {
                $this->db->where('id', $stockOutId);
                $this->db->delete('stock_transaction');

                foreach ($stockOutArrayData as $item) {
                    $itemData = array(
                        'date' => $stockOutDate,
                        'method' => $usedTo,
                        'zone' => $zone,
                        'from_branch' => $fromBranchId,
                        'outlet_name' => $outletName,
                        'to_branch' => $toBranchId,
                        'type' => 'stockout',
                        'material_id' => $item->materialId,
                        'quantity' => $item->materialQuantity,
                        'updated_by' => $userId,
                        'updated_at' => $currentDateTime
                    );
                    $this->db->insert('stock_transaction', $itemData);
                }
            }
        } else {
            if (!empty($stockOutArrayData)) {
                foreach ($stockOutArrayData as $item) {
                    $insertData = array(
                        'date' => $stockOutDate,
                        'method' => $usedTo,
                        'zone' => $zone,
                        'from_branch' => $fromBranchId,
                        'to_branch' => $toBranchId,
                        'outlet_name' => $outletName,
                        'type' => 'stockout',
                        'material_id' => $item->materialId,
                        'quantity' => $item->materialQuantity,
                        'created_by' => $userId,
                        'created_at' => $currentDateTime
                    );
                    $this->db->insert('stock_transaction', $insertData);
                }
                if ($usedTo === 'transfer') {
                    foreach ($stockOutArrayData as $item) {
                        $insertData = array(
                            'date' => $stockOutDate,
                            'method' => 'transfer',
                            'zone' => $branchDetails['zone'],
                            'from_branch' => $toBranchId,
                            'to_branch' => $fromBranchId,
                            'type' => 'stockin',
                            'material_id' => $item->materialId,
                            'quantity' => $item->materialQuantity,
                            'created_by' => $userId,
                            'created_at' => $currentDateTime
                        );
                        $this->db->insert('stock_transaction', $insertData);
                    }
                }
            }
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }
        return true;
    }

    public function getStockReports($year = '', $month = '')
    {
        $sql="SELECT SR.material_id, MM.material_code, MM.material_name, MM.category, MM.type, SUM(SR.material_count) AS material_count, (SELECT SUM(SR_inner.material_count) FROM stock_report SR_inner WHERE SR_inner.material_id = SR.material_id AND SR_inner.year = '$year' AND SR_inner.month = '$month') AS overall_count FROM stock_report SR LEFT JOIN master_material MM ON MM.id = SR.material_id WHERE SR.year = '$year' AND SR.month = '$month' GROUP BY SR.material_id, MM.material_name, MM.category, MM.type ORDER BY CAST(MM.material_code AS UNSIGNED)";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Stock Material Report Info
    public function getStockMaterialInfo($materialId, $year, $month)
    {
        $sql = "SELECT SR.*, MB.branch, MM.material_code, MM.material_name, SR.month FROM stock_report SR LEFT JOIN master_material MM ON MM.id = SR.material_id LEFT JOIN master_branch MB ON MB.id = SR.branch WHERE SR.year = '$year' AND SR.month = '$month' AND SR.material_id = $materialId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    // Save Stock Report Data
    public function saveStockreportData($stockreportId, $branch, $month, $year, $materialId, $materialCount)
    {
        // Check if materialId or materialCount is empty and return false if so
        if (empty($materialCount)) {
            return false;
        }
    
        $userId = $this->session->userdata('userid');
    
        // Prepare data for insertion
        $data = [
            'month' => $month,
            'year' => $year,
            'branch' => $branch,
            'material_id' => $materialId,
            'material_count' => $materialCount,
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        // Remove existing entries for the given month, year, branch and material_id
        $this->db->where('month', $month);
        $this->db->where('year', $year);
        $this->db->where('branch', $branch);
        $this->db->where('material_id', $materialId);
        $this->db->delete('stock_report');
    
        // Insert the new performance data
        $this->db->insert('stock_report', $data);
    
        return true;
    }

    public function getAllStockReports($year, $month, $branchId) {
        $sql="SELECT SR.*, MM.material_code, MM.material_name, MM.category, MM.id AS material_sno, MM.type, MB.branch FROM stock_report SR LEFT JOIN master_material MM ON MM.id = SR.material_id LEFT JOIN master_branch MB ON MB.id = SR.branch WHERE SR.year = '$year' AND SR.month = '$month' AND MB.id = $branchId ORDER BY CAST(MM.material_code AS UNSIGNED) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    
    //Material Shipping List
    public function getMaterialShippingList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "MS.status = '$pageStatus' AND";
        } else {
            $where = "";
        }

        $sql = "SELECT MS.*, DATE_FORMAT(MS.shipping_date, '%d - %m - %Y') AS shipping_dateFormat, DATE_FORMAT(MS.received_date, '%d - %m - %Y') AS received_dateFormat, DATE_FORMAT(MS.created_at, '%d - %m - %Y') AS created_at, MB.branch AS from_location, MB1.branch AS to_location FROM material_shipping MS LEFT JOIN master_branch MB ON MB.id = MS.from_location LEFT JOIN master_branch MB1 ON MB1.id = MS.to_location WHERE $where MS.delete_status = 0 ORDER BY MS.shipping_date DESC, MS.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Material Shipping Info
    public function getMaterialShippingInfo($shippingId)
    {
        $sql = "SELECT MS.*, DATE_FORMAT(MS.shipping_date, '%d - %m - %Y') AS shipping_dateFormat, DATE_FORMAT(MS.received_date, '%d - %m - %Y') AS received_dateFormat, DATE_FORMAT(MS.created_at, '%d - %m - %Y') AS created_at, LP.employee_name, MB.branch AS from_branch, MB1.branch AS to_branch FROM material_shipping MS LEFT JOIN master_branch MB ON MB.id = MS.from_location LEFT JOIN master_branch MB1 ON MB1.id = MS.to_location LEFT JOIN login_permission LP ON LP.employee_id = MS.created_by WHERE MS.id = $shippingId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Material Shipping Data Form
    public function saveMaterialShippingData($materialShippingId, $shippingDate, $shippingType, $fromLocation, $toLocation, $materialName, $senderName, $senderNumber, $receiverName, $receiverNumber, $receivedDate, $billCopy_img, $status, $lrCopy_img)
    {
        $userId = $this->session->userdata('userid');

        if ($materialShippingId > 0) {
            $data = array(
                'shipping_date' => $shippingDate,
                'shipping_type' => $shippingType,
                'from_location' => $fromLocation,
                'to_location' => $toLocation,
                'material_name' => $materialName,
                'sender_name' => $senderName,
                'sender_number' => $senderNumber,
                'receiver_name' => $receiverName,
                'receiver_number' => $receiverNumber,
                'received_date' => $receivedDate,
                'bill_copy' => $billCopy_img,
                'lr_copy' => $lrCopy_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $materialShippingId);
            $this->db->update('material_shipping', $data);
        } else {
            $data = array(
                'shipping_date' => $shippingDate,
                'shipping_type' => $shippingType,
                'from_location' => $fromLocation,
                'to_location' => $toLocation,
                'material_name' => $materialName,
                'sender_name' => $senderName,
                'sender_number' => $senderNumber,
                'receiver_name' => $receiverName,
                'receiver_number' => $receiverNumber,
                'received_date' => $receivedDate,
                'bill_copy' => $billCopy_img,
                'lr_copy' => $lrCopy_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('material_shipping', $data);
            $this->db->insert_id();
        }
    }
    
    //Material Shipping Received Form
    public function saveMaterialReceivedForm($shippingId, $receivedDate)
    {
        if ($shippingId > 0) {
            $data = array(
                'received_date' => $receivedDate,
                'status' => 'received'
            );
            $this->db->where('id', (int) $shippingId);
            $this->db->update('material_shipping', $data);
        }
    }
    
    // Asset Management Branch List
    public function getAssetManagementBranchList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = " AND AM.material_type = '$pageStatus'";
        } else {
            $where = "";
        }

        $sql = "SELECT AM.*, MB.branch AS branch_name, MB.zone, MB.id AS branch_id FROM asset_management AM LEFT JOIN master_branch MB ON MB.id = AM.branch_id WHERE MB.delete_status = 0 AND MB.status = 'active' $where GROUP BY AM.branch_id";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Asset Tools List
    public function getAssetsToolsList($assetType = '', $branchId = '')
    {
        if ($assetType) {
            $whereAsset = "MA.type = '$assetType' AND";
        } else {
            $whereAsset = "";
        }

        if ($branchId) {
            $where = "AM.branch_id = '$branchId' AND";
        } else {
            $where = "";
        }

        $sql = "SELECT AM.*, MA.name AS material_name, MA.type AS material_type, AM.material_count, MB.branch AS branch_name, MB.id AS branch_id FROM asset_management AM LEFT JOIN master_assets MA ON MA.id = AM.material_name LEFT JOIN master_branch MB ON MB.id = AM.branch_id WHERE $where $whereAsset AM.delete_status = 0 ORDER BY AM.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }
    
    // Asset Management Info
    public function getAssetManagementInfo($assetManagementId)
    {
        $sql = "SELECT AM.*, AM.material_count, MB.branch AS branch_name, MB.id AS branch_id FROM asset_management AM LEFT JOIN master_assets MA ON MA.id = AM.material_name LEFT JOIN master_branch MB ON MB.id = AM.branch_id WHERE AM.id = $assetManagementId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Asset Management Data Form
    public function saveAssetManagementData($assetManagementId, $branch, $materialName, $materialType, $materialCount)
    {
        $userId = $this->session->userdata('userid');

        if ($assetManagementId > 0) {
            $data = array(
                'branch_id' => $branch,
                'material_name' => $materialName,
                'material_type' => $materialType,
                'material_count' => $materialCount,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $assetManagementId);
            $this->db->update('asset_management', $data);
        } else {
            $data = array(
                'branch_id' => $branch,
                'material_name' => $materialName,
                'material_type' => $materialType,
                'material_count' => $materialCount,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('asset_management', $data);
            $this->db->insert_id();
        }
    }

    //Material Price List
    public function getMaterialVendorList()
    {
        $sql = "SELECT MP.id, DATE_FORMAT(MP.date, '%d - %m - %Y') AS dateFormat, MP.vendor_name, MP.amount, MP.remarks, MP.material_id, MM.material_name, MM.category AS material_category, MM.material_code, MM.type AS material_type, MB.branch AS branch_name, MB.zone FROM material_price MP INNER JOIN master_material MM ON MM.id = MP.material_id INNER JOIN master_branch MB ON MB.id = MP.branch WHERE MP.delete_status = 0 AND MP.amount = (SELECT MIN(amount) FROM material_price WHERE material_id = MP.material_id AND delete_status = 0) GROUP BY MP.material_id ORDER BY CAST(MM.material_code AS UNSIGNED) ASC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Material Price List
    public function getMaterialPriceList($materialId = '')
    {
        if($materialId) {
            $where = ' AND MP.material_id =' . $materialId;
        }
        
        $sql = "SELECT MP.id, DATE_FORMAT(MP.date, '%d - %m - %Y') AS dateFormat, MP.vendor_name, MP.amount, MP.remarks, MP.material_id, MM.material_name, MM.category AS material_category, MM.material_code, MM.type AS material_type, MB.branch AS branch_name, MB.zone FROM material_price MP INNER JOIN master_material MM ON MM.id = MP.material_id INNER JOIN master_branch MB ON MB.id = MP.branch WHERE MP.delete_status = 0 $where ORDER BY MP.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Material Price Detail
    public function getMaterialPriceDetail($materialPriceId)
    {
        $sql = "SELECT MP.id, MP.date, MP.vendor_name, MP.amount, MP.remarks, MP.material_id, MM.material_name, MM.category AS material_category, MM.material_code, MM.type AS material_type, MP.branch FROM material_price MP INNER JOIN master_material MM ON MM.id = MP.material_id WHERE MP.id = $materialPriceId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Salary Increment Form
    public function saveMaterialPriceFormData($materialPriceId, $date, $branch, $materialId, $vendorName, $amount, $remarks)
    {
        $userId = $this->session->userdata('userid');

        if ($materialPriceId > 0) {
            $data = array(
                'branch' => $branch,
                'date' => $date,
                'material_id' => $materialId,
                'vendor_name' => $vendorName,
                'amount' => $amount,
                'remarks' => $remarks,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $materialPriceId);
            $this->db->update('material_price', $data);
        } else {
            $data = array(
                'branch' => $branch,
                'date' => $date,
                'material_id' => $materialId,
                'vendor_name' => $vendorName,
                'amount' => $amount,
                'remarks' => $remarks,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('material_price', $data);
            $this->db->insert_id();
        }
    }
}
?>