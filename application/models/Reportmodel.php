<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportmodel extends CI_Model
{
	public function exportComplaintData($branch, $employee_name, $work_type, $complaint_status, $from_date, $to_date)
	{
        if ($branch) {
            $branch = " AND C.branch = '$branch'";
        } else {
            $branch = "";
        }
        if ($complaint_status) {
            $complaintStatus = " AND C.status = '$complaint_status'";
        } else {
            $complaintStatus = "";
        }
        if ($employee_name) {
            $employeeName = " AND C.assign_to = '$employee_name'";
        } else {
            $employeeName = "";
        }
        if ($work_type) {
            $workType = " AND C.work_type = '$work_type'";
        } else {
            $workType = "";
        }
        if ($from_date && $to_date) {
            $fromtoDate = " AND C.date BETWEEN '$from_date' AND '$to_date'";
        } elseif ($from_date) {
            $fromtoDate = " AND C.date = '$from_date'";
        } else {
            $fromtoDate = "";
        }

		$sql = "SELECT C.sno, DATE_FORMAT(C.date, '%d - %m - %Y') AS date, C.zone, MB.branch, C.work_type, C.assign_to, O.customer_id, O.outlet_name, O.outlet_location, C.description, C.job_report, C.checking_date, C.renewal_date, C.earthing_report, C.status FROM complaint C LEFT JOIN master_branch MB ON MB.id = C.branch LEFT JOIN outlet O ON O.id = C.outlet_id WHERE C.delete_status = 0 $branch $employeeName $fromtoDate $workType $complaintStatus ORDER By C.date DESC, C.id DESC";
        
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function exportPettycashData($year, $branchId, $month)
	{
		$sql = "SELECT MB.branch AS branch_name, LOWER(DATE_FORMAT(BP.paid_date, '%M')) AS month, DATE_FORMAT(BP.paid_date, '%Y') AS year, DATE_FORMAT(BP.paid_date, '%d - %m - %Y') AS paid_date, MP.title AS pettycash_title, BP.amount, BP.remarks FROM branch_pettycash BP INNER JOIN master_pettycash MP ON MP.id = BP.title INNER JOIN master_branch MB ON MB.id = BP.branch WHERE BP.delete_status = 0 AND DATE_FORMAT(BP.paid_date, '%Y') = '$year' AND BP.branch = '$branchId' AND LOWER(DATE_FORMAT(BP.paid_date, '%M')) = '$month' AND BP.delete_status = 0 ORDER BY BP.paid_date DESC";
        
		$res = $this->db->query($sql);
		return $res->result_array();
	}

    public function getEmployeeExpensesSummary($employeeId)
    {
        $this->db->select("E.employee_name, 
            SUM(CASE WHEN EE.status = 'disbursed' THEN EE.amount ELSE 0 END) AS disbursed_amount,
            SUM(CASE WHEN EE.status = 'expenses' THEN EE.amount ELSE 0 END) AS expenses_amount,
            (SUM(CASE WHEN EE.status = 'disbursed' THEN EE.amount ELSE 0 END) - SUM(CASE WHEN EE.status = 'expenses' THEN EE.amount ELSE 0 END)) AS balance_amount,
            LOWER(DATE_FORMAT(EE.date, '%M')) AS month,
            DATE_FORMAT(EE.date, '%Y') AS year");
        $this->db->from("employee_expenses EE");
        $this->db->join("employee E", "E.id = EE.employee_id");
        $this->db->where("EE.employee_id", $employeeId);
        $this->db->where("EE.delete_status", 0);
        $this->db->order_by("EE.date", "asc");
        return $this->db->get()->row_array();
    }

    public function getEmployeeExpensesDetails($employeeId)
    {
        $this->db->select("DATE_FORMAT(date, '%d-%m-%Y') AS paid_date, amount, remarks, status");
        $this->db->from("employee_expenses");
        $this->db->where("employee_id", $employeeId);
        $this->db->where("delete_status", 0);
        $this->db->order_by("date", "asc");
        return $this->db->get()->result_array();
    }

	public function getExportPayslipData($year, $month, $companyName)
	{
        if ($year) {
            $year = " AND year = '$year'";
        } else {
            $year = "";
        }
        if ($month) {
            $month = " AND month = '$month'";
        } else {
            $month = "";
        }
        if ($companyName) {
            $companyName = " AND company_name = '$companyName'";
        } else {
            $companyName = "";
        }

		$sql = "SELECT year, month, employee_name, designation, day_count, present_count, absent_count, ot_count, basic_pay, month_basic_pay, allowance_amount, month_allowance_amount, ot_amount, mobile_recharge, incentive_amount, travelling_amount, food_expenses, month_pf_amount, esi_amount, professional_tax, advance_cash, total_earning, deduction_amount, salary_amount FROM employee_payslip WHERE delete_status = 0 $year $month $companyName ORDER BY id DESC";
        
		$res = $this->db->query($sql);
		return $res->result_array();
	}

	public function getExportPayslipDetail($year, $month, $companyName)
	{
        if ($year) {
            $year = " AND year = '$year'";
        } else {
            $year = "";
        }
        if ($month) {
            $month = " AND month = '$month'";
        } else {
            $month = "";
        }
        if ($companyName) {
            $companyName = " AND company_name = '$companyName'";
        } else {
            $companyName = "";
        }

		$sql = "SELECT SUM(day_count) AS payable_days, SUM(present_count) AS present_days, SUM(absent_count) AS absent_days, SUM(ot_count) AS ot_days, SUM(month_basic_pay) AS basic_amount, SUM(month_allowance_amount) AS allowance_amount, SUM(ot_amount) AS ot_amount, SUM(mobile_recharge) AS recharge_amount, SUM(incentive_amount) AS incentive_amount, SUM(travelling_amount) AS travelling_amount, SUM(food_expenses) AS foodexpenses_amount, SUM(month_pf_amount) AS pf_amount, SUM(esi_amount) AS esi_amount, SUM(professional_tax) AS professionaltax_amount, SUM(advance_cash) AS advancecash_amount, SUM(total_earning) AS earning_amount, SUM(deduction_amount) AS deduction_amount, SUM(salary_amount) AS salary_amount FROM employee_payslip WHERE delete_status = 0 $year $month $companyName";
        
		$res = $this->db->query($sql);
		return $res->result_array();
	}

    public function getExportVehicleFuelData($fromDate, $toDate, $vehicleId)
    {
        $fromtoDate = '';
        if (!empty($fromDate) && !empty($toDate)) {
            $fromtoDate = " AND VF.filling_date BETWEEN '$fromDate' AND '$toDate'";
        } elseif (!empty($fromDate)) {
            $fromtoDate = " AND VF.filling_date = '$fromDate'";
        }

        $vehicleCondition = '';
        if (!empty($vehicleId)) {
            $vehicleCondition = " AND VF.vehicle_id = '$vehicleId'";
        }

        $sql = "SELECT VF.*, DATE_FORMAT(VF.filling_date, '%d - %m - %Y') AS filling_dateFormat, V.vehicle_name, V.fuel_type, V.vehicle_number, V.vehicle_type FROM vehicle_fuel VF LEFT JOIN vehicle V ON V.id = VF.vehicle_id WHERE VF.delete_status = 0 $fromtoDate $vehicleCondition ORDER BY VF.filling_date DESC";

		$res = $this->db->query($sql);
		return $res->result_array();
	}
    
    public function getExportVehicleFuelDetail($fromDate, $toDate, $vehicleId)
    {
        $fromtoDate = '';
        if (!empty($fromDate) && !empty($toDate)) {
            $fromtoDate = " AND VF.filling_date BETWEEN '$fromDate' AND '$toDate'";
        } elseif (!empty($fromDate)) {
            $fromtoDate = " AND VF.filling_date = '$fromDate'";
        }

        $vehicleCondition = '';
        if (!empty($vehicleId)) {
            $vehicleCondition = " AND VF.vehicle_id = '$vehicleId'";
        }

        // Prepare the subquery condition only if $fromDate is not empty
        $previousKmSubquery = "MIN(VF.vehicle_km)";
        if (!empty($fromDate)) {
            $previousKmSubquery = "IFNULL((SELECT VF2.vehicle_km FROM vehicle_fuel VF2 WHERE VF2.vehicle_id = VF.vehicle_id AND VF2.delete_status = 0 AND VF2.filling_date < '$fromDate' ORDER BY VF2.filling_date DESC LIMIT 1), MIN(VF.vehicle_km))";
        }

        $sql = "SELECT V.vehicle_name, VF.vehicle_id, V.fuel_type, V.vehicle_number, MAX(VF.vehicle_km) - $previousKmSubquery AS total_kilometer, ROUND(SUM(VF.liter_qty), 2) AS total_liter, ROUND(SUM(VF.amount), 2) AS total_amount, AVG(VF.amount_per_liter) AS rate_per_ltr, CASE WHEN SUM(VF.liter_qty) > 0 THEN ROUND((MAX(VF.vehicle_km) - $previousKmSubquery) / SUM(VF.liter_qty), 2) ELSE 0 END AS km_per_ltr, CASE WHEN (MAX(VF.vehicle_km) - $previousKmSubquery) > 0 THEN ROUND(SUM(VF.amount) / (MAX(VF.vehicle_km) - $previousKmSubquery), 2) ELSE 0 END AS rs_per_km, CASE WHEN SUM(VF.liter_qty) > 0 THEN ROUND(((MAX(VF.vehicle_km) - $previousKmSubquery) / SUM(VF.liter_qty)) / 12 * 100, 2) ELSE 0 END AS avg_percentage FROM vehicle_fuel VF LEFT JOIN vehicle V ON V.id = VF.vehicle_id WHERE VF.delete_status = 0 $fromtoDate $vehicleCondition ORDER BY VF.filling_date DESC ";

        $res = $this->db->query($sql);
        return $res->result_array();
    }
    
	
    // public function exportStockData($branch, $fromDate, $toDate)
    // {
    //     $branchClause = $branch ? " AND from_branch = $branch" : "";

    //     if ($fromDate && $toDate) {
    //         $fromtoDate = " AND date BETWEEN '$fromDate' AND '$toDate'";
    //     } elseif ($toDate) {
    //         $fromtoDate = " AND date = '$toDate'";
    //     } else {
    //         $fromtoDate = "";
    //     }

    //     $sql = "SELECT 
    //         MM.id AS material_id,
    //         MM.material_code,
    //         MM.material_name,
    //         MM.category AS material_category,
    //         MM.type AS material_type,
    //         IFNULL(stockin.total_stockin, 0) AS stock_in,
    //         IFNULL(stockout.total_stockout, 0) AS stock_out,
    //         IFNULL(transferin.total_transferin, 0) AS transfer_in,
    //         IFNULL(transferout.total_transferout, 0) AS transfer_out,
    //         0 AS opening_stock,
    //         (
    //             IFNULL(stockin.total_stockin, 0) - IFNULL(stockout.total_stockout, 0)
    //         ) AS closing_stock

    //         FROM master_material MM
    //         LEFT JOIN (
    //             SELECT material_id, SUM(quantity) AS total_stockin
    //             FROM stock_transaction
    //             WHERE type = 'stockin' AND delete_status = 0 $branchClause $fromtoDate
    //             GROUP BY material_id
    //         ) AS stockin ON MM.id = stockin.material_id

    //         LEFT JOIN (
    //             SELECT material_id, SUM(quantity) AS total_stockout
    //             FROM stock_transaction
    //             WHERE type = 'stockout' AND delete_status = 0 $branchClause $fromtoDate
    //             GROUP BY material_id
    //         ) AS stockout ON MM.id = stockout.material_id

    //         LEFT JOIN (
    //             SELECT material_id, SUM(quantity) AS total_transferin
    //             FROM stock_transaction
    //             WHERE type = 'stockin' AND method = 'transfer' AND delete_status = 0 $branchClause $fromtoDate
    //             GROUP BY material_id
    //         ) AS transferin ON MM.id = transferin.material_id

    //         LEFT JOIN (
    //             SELECT material_id, SUM(quantity) AS total_transferout
    //             FROM stock_transaction
    //             WHERE type = 'stockout' AND method = 'transfer' AND delete_status = 0 $branchClause $fromtoDate
    //             GROUP BY material_id
    //         ) AS transferout ON MM.id = transferout.material_id ORDER BY MM.material_name ASC";

    //     $res = $this->db->query($sql);
    //     return $res->result_array();
    // }


    
    public function exportStockData($branch, $fromDate, $toDate)
    {
        $branchClause = $branch ? " AND from_branch = $branch" : "";

        if ($fromDate && $toDate) {
            $fromtoDate = " AND date BETWEEN '$fromDate' AND '$toDate'";
        } elseif ($toDate) {
            $fromtoDate = " AND date = '$toDate'";
        } else {
            $fromtoDate = "";
        }

        // Clause for calculating opening stock (before fromDate)
        $openingDateClause = $fromDate ? " AND date < '$fromDate'" : "";

        $sql = "SELECT MM.id AS material_id, MM.material_code, MM.material_name, MM.category AS material_category, MM.type AS material_type, IFNULL(stockin.total_stockin, 0) AS stock_in, IFNULL(stockout.total_stockout, 0) AS stock_out, IFNULL(transferin.total_transferin, 0) AS transfer_in, IFNULL(transferout.total_transferout, 0) AS transfer_out, (IFNULL(opening_stockin.total_open_stockin, 0) - IFNULL(opening_stockout.total_open_stockout, 0)) AS opening_stock, ((IFNULL(opening_stockin.total_open_stockin, 0) - IFNULL(opening_stockout.total_open_stockout, 0)) + IFNULL(stockin.total_stockin, 0) - IFNULL(stockout.total_stockout, 0)) AS closing_stock FROM master_material MM LEFT JOIN (SELECT material_id, SUM(quantity) AS total_stockin FROM stock_transaction WHERE type = 'stockin' AND delete_status = 0 $branchClause $fromtoDate GROUP BY material_id) AS stockin ON MM.id = stockin.material_id LEFT JOIN (SELECT material_id, SUM(quantity) AS total_stockout FROM stock_transaction WHERE type = 'stockout' AND delete_status = 0 $branchClause $fromtoDate GROUP BY material_id) AS stockout ON MM.id = stockout.material_id LEFT JOIN (SELECT material_id, SUM(quantity) AS total_transferin FROM stock_transaction WHERE type = 'stockin' AND method = 'transfer' AND delete_status = 0 $branchClause $fromtoDate GROUP BY material_id) AS transferin ON MM.id = transferin.material_id LEFT JOIN (SELECT material_id, SUM(quantity) AS total_transferout FROM stock_transaction WHERE type = 'stockout' AND method = 'transfer' AND delete_status = 0 $branchClause $fromtoDate GROUP BY material_id) AS transferout ON MM.id = transferout.material_id LEFT JOIN (SELECT material_id, SUM(quantity) AS total_open_stockin FROM stock_transaction WHERE type = 'stockin' AND delete_status = 0 $branchClause $openingDateClause GROUP BY material_id) AS opening_stockin ON MM.id = opening_stockin.material_id LEFT JOIN (SELECT material_id, SUM(quantity) AS total_open_stockout FROM stock_transaction WHERE type = 'stockout' AND delete_status = 0 $branchClause $openingDateClause GROUP BY material_id) AS opening_stockout ON MM.id = opening_stockout.material_id WHERE MM.status = 'active' AND MM.delete_status = 0 AND MM.entry_type = 'daily_entry' ORDER BY MM.material_name ASC";

        $res = $this->db->query($sql);
        return $res->result_array();
    }


}
?>