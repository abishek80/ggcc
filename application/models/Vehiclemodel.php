<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehiclemodel extends CI_Model
{
    //Vehicle List
    public function vehicleList($pageStatus = '')
    {
        if ($pageStatus) {
            $where = "AND V.status = '$pageStatus'";
        }

        $sql = "SELECT V.*, DATE_FORMAT(V.created_at, '%d/%m/%Y %h:%i %p') AS created_at, LP.employee_name, B.branch AS branch_name  FROM vehicle V LEFT JOIN login_permission LP ON LP.employee_id = V.created_by LEFT JOIN master_branch B ON B.id = V.branch WHERE V.delete_status = 0 $where ORDER BY V.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    public function getVehicleRenewalList($year, $month, $renewalType)
    {
        if ($renewalType == 'insurance') {
            $dateColumn = 'V.renewal_date';
        } elseif ($renewalType == 'fc') {
            $dateColumn = 'V.fc_renewal_date';
        } elseif ($renewalType == 'puc') {
            $dateColumn = 'V.puc_renewal_date';
        } else {
            return [];
        }

        // Last date of given month
        $end_date = date("Y-m-t", strtotime($year . '-' . $month . '-01'));

        $sql = "SELECT V.*, DATE_FORMAT(V.renewal_date, '%d/%m/%Y') AS renewal_date, DATE_FORMAT(V.fc_renewal_date, '%d/%m/%Y') AS fc_renewal_date, DATE_FORMAT(V.puc_renewal_date, '%d/%m/%Y') AS puc_renewal_date, B.branch AS branch_name FROM vehicle V LEFT JOIN master_branch B ON B.id = V.branch WHERE V.delete_status = 0 AND V.status = 'active' AND $dateColumn <= ? ORDER BY $dateColumn DESC";

        $res = $this->db->query($sql, [$end_date]);
        return $res->result();
    }

    //Vehicle Info
    public function getVehicleInfo($vehicleId)
    {
        $sql = "SELECT V.*, DATE_FORMAT(V.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(V.renewal_date, '%d - %m - %Y') AS renewal_dateFormat, DATE_FORMAT(V.fc_renewal_date, '%d - %m - %Y') AS fc_renewal_dateFormat, DATE_FORMAT(V.puc_renewal_date, '%d - %m - %Y') AS puc_renewal_dateFormat, LP.employee_name, B.branch AS branch_name FROM vehicle V LEFT JOIN master_branch B ON B.id = V.branch LEFT JOIN login_permission LP ON LP.employee_id = V.created_by WHERE V.delete_status = 0 AND V.id = $vehicleId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vehicle Info
    public function getVehicleServiceInfo($serviceId)
    {
        $sql = "SELECT VS.*, MB.branch, MB.zone, V.vehicle_name, V.vehicle_number, DATE_FORMAT(VS.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(VS.service_date, '%d - %m - %Y') AS service_dateFormat, DATE_FORMAT(VS.next_service_date, '%d - %m - %Y') AS next_service_dateFormat, LP.employee_name FROM vehicle_service VS LEFT JOIN vehicle V ON V.id = VS.vehicle_id LEFT JOIN master_branch MB ON MB.id = V.branch LEFT JOIN login_permission LP ON LP.employee_id = VS.created_by WHERE VS.delete_status = 0 AND VS.id = $serviceId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vehicle Service Last Info
    public function getVehicleLastServiceInfo($vehicleId)
    {
        $sql = "SELECT VS.*, DATE_FORMAT(VS.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(VS.service_date, '%d - %m - %Y') AS service_dateFormat, DATE_FORMAT(VS.next_service_date, '%d - %m - %Y') AS next_service_dateFormat, LP.employee_name FROM vehicle_service VS LEFT JOIN login_permission LP ON LP.employee_id = VS.created_by WHERE VS.delete_status = 0 AND VS.vehicle_id = $vehicleId ORDER BY VS.id DESC LIMIT 1";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vehicle Service List
    public function getVehicleServiceList($vehicleId = '')
    {
        if($vehicleId) {
            $where = " AND VS.vehicle_id = $vehicleId";
        }

        $sql = "SELECT VS.*, MB.branch, MB.zone, V.vehicle_name, V.vehicle_number, DATE_FORMAT(VS.created_at, '%d/%m/%Y %h:%i %p') AS created_at, DATE_FORMAT(VS.service_date, '%d - %m - %Y') AS service_dateFormat, DATE_FORMAT(VS.next_service_date, '%d - %m - %Y') AS next_service_dateFormat, LP.employee_name FROM vehicle_service VS LEFT JOIN vehicle V ON V.id = VS.vehicle_id LEFT JOIN master_branch MB ON MB.id = V.branch LEFT JOIN login_permission LP ON LP.employee_id = VS.created_by WHERE VS.delete_status = 0 $where ORDER BY VS.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Check Vehicle
    public function checkVehicle($token)
    {
        $sql = "SELECT * FROM vehicle WHERE delete_status = 0 AND token = '" . $token . "'";

        $res = $this->db->query($sql);
        return $res->num_rows();
    }

    //Save Vehicle Form
    public function saveVehicleData($vehicleId, $token, $zone, $branch, $vehicleType, $fuelType, $vehicleName, $vehicleNumber, $ownerName, $vehiclePhoto_img, $vehicleRC_img, $vehicleInsurance_img, $fcRenewalDate, $pucRenewalDate, $vehicleFc_img, $vehiclePuc_img, $renewalDate, $status)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('vehicle');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($vehicleId > 0) {
            $data = array(
                'zone' => $zone,
                'branch' => $branch,
                'vehicle_type' => $vehicleType,
                'fuel_type' => $fuelType,
                'vehicle_name' => $vehicleName,
                'vehicle_number' => $vehicleNumber,
                'owner_name' => $ownerName,
                'vehicle_photo' => $vehiclePhoto_img,
                'vehicle_rc' => $vehicleRC_img,
                'vehicle_insurance' => $vehicleInsurance_img,
                'renewal_date' => $renewalDate,
                'fc_renewal_date' => $fcRenewalDate,
                'puc_renewal_date' => $pucRenewalDate,
                'vehicle_fc_img' => $vehicleFc_img,
                'vehicle_puc_img' => $vehiclePuc_img,
                'status' => $status,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $vehicleId);
            $this->db->update('vehicle', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'token' => $token,
                'zone' => $zone,
                'branch' => $branch,
                'vehicle_type' => $vehicleType,
                'fuel_type' => $fuelType,
                'vehicle_name' => $vehicleName,
                'vehicle_number' => $vehicleNumber,
                'owner_name' => $ownerName,
                'vehicle_photo' => $vehiclePhoto_img,
                'vehicle_rc' => $vehicleRC_img,
                'vehicle_insurance' => $vehicleInsurance_img,
                'renewal_date' => $renewalDate,
                'fc_renewal_date' => $fcRenewalDate,
                'puc_renewal_date' => $pucRenewalDate,
                'vehicle_fc_img' => $vehicleFc_img,
                'vehicle_puc_img' => $vehiclePuc_img,
                'status' => $status,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('vehicle', $data);
            $this->db->insert_id();
        }
    }

    //Save Vehicle Service Form
    public function saveVehicleServiceData($vehicleId, $serviceId, $serviceDate, $nextServiceDate, $serviceCategory, $serviceKM, $serviceCost, $description, $serviceBill_img, $status, $method)
    {
        $userId = $this->session->userdata('userid');

        $year        = date('y');
        $this->db->select_max('id');
        $query       = $this->db->get('vehicle_service');
        $result      = $query->row_array();
        $maxID       = $result['id'];
        $miNumberId = sprintf("%05d", $maxID + 1);
        $miNumber   = $year . '/' . $miNumberId;

        if ($serviceId > 0) {
            $data = array(
                'service_date' => $serviceDate,
                'next_service_date' => $nextServiceDate,
                'service_category' => $serviceCategory,
                'service_km' => $serviceKM,
                'service_cost' => $serviceCost,
                'description' => $description,
                'service_bill' => $serviceBill_img,
                'status' => $status,
                'method' => $method,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $serviceId);
            $this->db->update('vehicle_service', $data);
        } else {
            $data = array(
                'sno' => $miNumber,
                'vehicle_id' => $vehicleId,
                'service_date' => $serviceDate,
                'next_service_date' => $nextServiceDate,
                'service_category' => $serviceCategory,
                'service_km' => $serviceKM,
                'service_cost' => $serviceCost,
                'description' => $description,
                'service_bill' => $serviceBill_img,
                'status' => $status,
                'method' => $method,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('vehicle_service', $data);
            $this->db->insert_id();
        }
    }

    //Vehicle Fuel List
    public function getVehicleFuelList($fyStartDate = '', $fyEndDate = '')
    {
        $sql = "SELECT 
                    V.vehicle_number, 
                    V.fuel_type, 
                    V.vehicle_name, 
                    V.id AS vehicle_id, 
                    (SELECT VF1.vehicle_km FROM vehicle_fuel VF1 WHERE VF1.vehicle_id = V.id AND VF1.delete_status = 0 ORDER BY VF1.filling_date DESC, VF1.id DESC LIMIT 1) AS vehicle_km, 
                    (SELECT DATE_FORMAT(VF2.filling_date, '%d - %m - %Y') FROM vehicle_fuel VF2 WHERE VF2.vehicle_id = V.id AND VF2.delete_status = 0 ORDER BY VF2.filling_date DESC, VF2.id DESC LIMIT 1) AS filling_dateFormat,
                    (SELECT VF3.filling_date FROM vehicle_fuel VF3 WHERE VF3.vehicle_id = V.id AND VF3.delete_status = 0 ORDER BY VF3.filling_date DESC, VF3.id DESC LIMIT 1) AS last_filling_date,
                    ROUND(SUM(CASE WHEN VF.filling_date BETWEEN '$fyStartDate' AND '$fyEndDate' THEN VF.amount ELSE 0 END), 2) AS overall_amount, 
                    ROUND(SUM(CASE WHEN VF.filling_date BETWEEN '$fyStartDate' AND '$fyEndDate' THEN VF.liter_qty ELSE 0 END), 2) AS total_liter_qty, 
                    ROUND(SUM(CASE WHEN VF.filling_date BETWEEN '$fyStartDate' AND '$fyEndDate' THEN VF.amount_per_liter ELSE 0 END), 2) AS total_fuel_amount 
                FROM vehicle_fuel VF 
                LEFT JOIN vehicle V ON V.id = VF.vehicle_id 
                WHERE VF.delete_status = 0 
                GROUP BY V.vehicle_number, V.fuel_type, V.vehicle_name, V.id 
                ORDER BY last_filling_date DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //All Vehicle Fuel Total Value
    public function getVehicleFuelTotalValue($fyStartDate = '', $fyEndDate = '')
    {
        $where = "VF.delete_status = 0";
        if ($fyStartDate && $fyEndDate) {
            $where .= " AND VF.filling_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }
        $sql = "SELECT COALESCE(ROUND(SUM(VF.amount), 2), 0.00) AS total_fuel_amount, COALESCE(ROUND(SUM(VF.liter_qty), 2), 0.00) AS total_liter_qty FROM vehicle_fuel VF WHERE $where";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Fuel List
    public function getFuelList($vehicleId, $fyStartDate = '', $fyEndDate = '')
    {
        $where = "VF.delete_status = 0 AND V.id=$vehicleId";
        if ($fyStartDate && $fyEndDate) {
            $where .= " AND VF.filling_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }
        $sql = "SELECT VF.*, V.vehicle_name, V.id AS vehicle_id, DATE_FORMAT(VF.filling_date, '%d - %m - %Y') AS filling_dateFormat, E.employee_name AS driver_name, B.branch AS branch_name FROM vehicle_fuel VF LEFT JOIN vehicle V ON V.id = VF.vehicle_id LEFT JOIN employee E ON E.id = VF.driver_name LEFT JOIN master_branch B ON B.id = VF.branch WHERE $where ORDER BY VF.id DESC";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Vehicle Fuel Info
    public function getVehicleFuelInfo($vehicleId, $fyStartDate = '', $fyEndDate = '')
    {
        if (!$vehicleId) {
            return [];
        }
        $where = "VF.delete_status = 0 AND V.id = ?";
        if ($fyStartDate && $fyEndDate) {
            $where .= " AND VF.filling_date BETWEEN '$fyStartDate' AND '$fyEndDate'";
        }

        $sql = "SELECT V.*, ROUND(SUM(VF.amount), 2) AS overall_amount FROM vehicle V LEFT JOIN vehicle_fuel VF ON VF.vehicle_id = V.id WHERE $where";

        $res = $this->db->query($sql, [$vehicleId]);
        return $res->result();
    }

    //Vehicle Fuel Detail
    public function getVehicleFuelDetail($vehicleFuelId)
    {
        $sql = "SELECT VF.*, ROUND(SUM(VF.amount), 2) AS overall_amount, V.vehicle_name, V.vehicle_number, V.fuel_type FROM  vehicle_fuel VF LEFT JOIN vehicle V ON VF.vehicle_id = V.id WHERE VF.id = $vehicleFuelId";

        $res = $this->db->query($sql);
        return $res->result();
    }

    //Save Salary Increment Form
    public function saveVehicleFuelFormData($fuelId, $fuelDate, $branch, $driverName, $vehicleName, $vehicleKM, $fuelAmount, $literQty, $amountPerLiter)
    {
        $userId = $this->session->userdata('userid');

        if ($fuelId > 0) {
            $data = array(
                'filling_date' => $fuelDate,
                'branch' => $branch,
                'driver_name' => $driverName,
                'vehicle_id' => $vehicleName,
                'vehicle_km' => $vehicleKM,
                'liter_qty' => $literQty,
                'amount_per_liter' => $amountPerLiter,
                'amount' => $fuelAmount,
                'updated_by' => $userId,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $this->db->where('id', (int) $fuelId);
            $this->db->update('vehicle_fuel', $data);
        } else {
            $data = array(
                'filling_date' => $fuelDate,
                'branch' => $branch,
                'driver_name' => $driverName,
                'vehicle_id' => $vehicleName,
                'vehicle_km' => $vehicleKM,
                'liter_qty' => $literQty,
                'amount_per_liter' => $amountPerLiter,
                'amount' => $fuelAmount,
                'created_by' => $userId,
                'created_at' => date('Y-m-d H:i:s')
            );
            $this->db->insert('vehicle_fuel', $data);
            $this->db->insert_id();
        }
    }
}
?>