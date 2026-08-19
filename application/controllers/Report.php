<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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

    public function complaint_report() {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_open'] = 'report';
            $data['menu_status'] = 'complaint_report';

            $branch = $data['branchId'] = $this->input->get('branch');
            $fromDate = $data['fromDate'] = $this->input->get('from_date');
            $toDate = $data['toDate'] = $this->input->get('to_date');
            $employeeName = $data['employeeName'] = $this->input->get('employee_name');
            $workCategory = $data['workCategory'] = $this->input->get('work_type');
            $complaintStatus = $data['complaintStatus'] = $this->input->get('complaint_status');

            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['inchargeDropdown'] = $this->mastermodel->getInchargeDropdown();
            $data['complaintReportList'] = $this->reportmodel->exportComplaintData($branch, $employeeName, $workCategory, $complaintStatus, $fromDate, $toDate);
        
            $this->load->view('settings/header', $data);
            $this->load->view('report/complaint_report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function getComplaintReport()
    {
        $branch = $this->input->post('branch');
        $employee_name = $this->input->post('employee_name');
        $work_type = $this->input->post('work_type');
        $complaint_status = $this->input->post('complaint_status');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
    
        $data = $this->reportmodel->exportComplaintData($branch, $employee_name, $work_type, $complaint_status, $from_date, $to_date);
        
        if (empty($data)) {
            $response = [
                "isError" => true,
                "message" => "No data available for export"
            ];
            echo json_encode($response);
            return;
        }        
    
        $fileName = "complaint_report_" . date("d-m-Y") . ".xls";
    
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        $output = fopen("php://output", "w");
    
        // Write header
        fputcsv($output, ["SNO", "Date", "Zone", "Branch", "Work Type", "Assign To", "Customer Id", "Outlet Name", "Outlet Location", "Description", "Job_report", "Checking Date", "Renewal Date", "Earthing Report", "Status"], "\t");

        // Write data rows
        foreach ($data as $row) {
            fputcsv($output, [
                $row['sno'],
                $row['date'],
                $row['zone'],
                $row['branch'],
                $row['work_type'],
                $row['assign_to'],
                $row['customer_id'],
                $row['outlet_name'],
                $row['outlet_location'],
                $row['description'],
                $row['job_report'],
                $row['checking_date'],
                $row['renewal_date'],
                $row['earthing_report'],
                $row['status']
            ], "\t");
        }
    
        fclose($output);
        exit;
    }

    public function getPettycashReport()
    {
        $year = $this->input->post('year');
        $branchId = $this->input->post('branchId');
        $month = $this->input->post('month');
        $branchName = $this->input->post('branchName');

        $data = $this->reportmodel->exportPettycashData($year, $branchId, $month);

        if (empty($data)) {
            $response = [
                "isError" => true,
                "message" => "No data available for export"
            ];
            echo json_encode($response);
            return;
        }

        $fileName = $branchName . "_pettycash_report_" . date("d-m-Y") . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        // Write header
        fputcsv($output, ["Branch Name", "Month", "Year", "Date", "Pettycash Title", "Amount", "Remarks"], "\t");

        // Write data rows
        foreach ($data as $row) {
            fputcsv($output, [
                $row['branch_name'],
                ucfirst($row['month']),  // Capitalize month if needed
                $row['year'],
                $row['paid_date'],
                $row['pettycash_title'],
                $row['amount'],
                $row['remarks']
            ], "\t");
        }

        fclose($output);
        exit;
    }

    public function getEmployeeExpensesReport()
    {
        $employeeId = $this->input->post('employeeId');
        $employeeName = $this->input->post('employeeName');
    
        // Fetch summary data
        $summary = $this->reportmodel->getEmployeeExpensesSummary($employeeId);

        // Fetch detailed records
        $details = $this->reportmodel->getEmployeeExpensesDetails($employeeId);

        if (empty($summary) && empty($details)) {
            echo json_encode(["isError" => true, "message" => "No data available for export"]);
            return;
        }

        $fileName = $employeeName . "_expenses_report_" . date("d-m-Y") . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        // Write summary header
        fputcsv($output, ["Employee Name", "Year", "Month", "Overall Disbursed Amount", "Overall Expenses Amount", "Balance Amount"], "\t");
        fputcsv($output, [
            $summary['employee_name'] ?? 'N/A',
            $summary['year'] ?? $year,
            ucfirst($summary['month'] ?? $month),
            $summary['disbursed_amount'] ?? 0,
            $summary['expenses_amount'] ?? 0,
            $summary['balance_amount'] ?? 0
        ], "\t");

        // Empty row
        fputcsv($output, [], "\t");

        // Write details header
        fputcsv($output, ["Date", "Disbursed Amount", "Expenses Amount", "Remarks"], "\t");

        foreach ($details as $row) {
            fputcsv($output, [
                $row['paid_date'],
                $row['status'] === 'disbursed' ? $row['amount'] : "-",
                $row['status'] === 'expenses' ? $row['amount'] : "-",
                $row['remarks']
            ], "\t");
        }

        fclose($output);
        exit;
    }

    public function payslip_report() {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) {
            $data['menu_open'] = 'report';
            $data['menu_status'] = 'payslip_report';

            $year = $data['year'] = $this->input->get('year');
            $month = $data['month'] = $this->input->get('month');
            $companyName = $data['companyName'] = $this->input->get('company_name');

            $data['payslipReportList'] = $this->reportmodel->getExportPayslipData($year, $month, $companyName);

            $payslipReportDetail = $this->reportmodel->getExportPayslipDetail($year, $month, $companyName);

            $row = is_array($payslipReportDetail[0]) ? (object) $payslipReportDetail[0] : $payslipReportDetail[0];

            $data['reportCount'] = count($payslipReportDetail);
            $data['payableDays'] = $row->payable_days;
            $data['presentDays'] = $row->present_days;
            $data['absentDays'] = $row->absent_days;
            $data['otDays'] = $row->ot_days;
            $data['basicAmount'] = $row->basic_amount;
            $data['allowanceAmount'] = $row->allowance_amount;
            $data['otAmount'] = $row->ot_amount;
            $data['rechargeAmount'] = $row->recharge_amount;
            $data['incentiveAmount'] = $row->incentive_amount;
            $data['travellingAmount'] = $row->travelling_amount;
            $data['foodExpensesAmount'] = $row->foodexpenses_amount;
            $data['pfAmount'] = $row->pf_amount;
            $data['esiAmount'] = $row->esi_amount;
            $data['professionalTaxAmount'] = $row->professionaltax_amount;
            $data['advanceCashAmount'] = $row->advancecash_amount;
            $data['earningAmount'] = $row->earning_amount;
            $data['deductionAmount'] = $row->deduction_amount;
            $data['salaryAmount'] = $row->salary_amount;

            extract($data);

            $this->load->view('settings/header', $data);
            $this->load->view('report/payslip_report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function getPayslipReport()
    {
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $companyName = $this->input->post('companyName');
    
        $summaryResult = $this->reportmodel->getExportPayslipDetail($year, $month, $companyName);
        $summary = !empty($summaryResult) ? $summaryResult[0] : [];

        // Fetch detailed records
        $details = $this->reportmodel->getExportPayslipData($year, $month, $companyName);

        if (empty($summary) && empty($details)) {
            echo json_encode(["isError" => true, "message" => "No data available for export"]);
            return;
        }

        $fileName = ($companyName ? $companyName . "_" : "") . "payslip_report_" . date("d-m-Y") . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        // Write summary header
        fputcsv($output, ["Payable Days", "Present Days", "Absent Days", "OT Days", "Basic Amount", "Allowance Amount", "OT Amount", "Recharge Amount", "Incentive Amount", "Travelling Amount", "Food Expenses Amount", "PF Amount", "ESI Amount", "Professional Tax Amount", "Advance In Cash Amount", "Earning Amount", "Deduction Amount", "Salary Amount"], "\t");
        fputcsv($output, [
            $summary['payable_days']  ?? 0,
            $summary['present_days']  ?? 0,
            $summary['absent_days']  ?? 0,
            $summary['ot_days']  ?? 0,
            $summary['basic_amount']  ?? 0,
            $summary['allowance_amount']  ?? 0,
            $summary['ot_amount']  ?? 0,
            $summary['recharge_amount']  ?? 0,
            $summary['incentive_amount']  ?? 0,
            $summary['travelling_amount']  ?? 0,
            $summary['foodexpenses_amount']  ?? 0,
            $summary['pf_amount']  ?? 0,
            $summary['esi_amount']  ?? 0,
            $summary['professionaltax_amount']  ?? 0,
            $summary['advancecash_amount']  ?? 0,
            $summary['earning_amount']  ?? 0,
            $summary['deduction_amount']  ?? 0,
            $summary['salary_amount']  ?? 0
        ], "\t");

        // Empty row
        fputcsv($output, [], "\t");

        // Write details header
        fputcsv($output, ["Year", "Month", "Employee Name", "Designation", "Payable Days", "Present Days", "Absent Days", "OT Days", "Actuals Basic Pay", "Earned Basic Pay", "Actuals Allowance", "Earned Allowance", "OT Amount", "Mobile Recharge", "Incentive", "Travelling", "Food Expenses", "PF Amount", "ESI Amount", "Professional Tax", "Adavnce In Cash", "Earning Amount", "Deduction Amount", "Salary Amount"], "\t");

        foreach ($details as $row) {
            fputcsv($output, [
                $row['year'],
                $row['month'],
                $row['employee_name'],
                $row['designation'],
                $row['day_count'],
                $row['present_count'],
                $row['absent_count'],
                $row['ot_count'],
                $row['basic_pay'],
                $row['month_basic_pay'],
                $row['allowance_amount'],
                $row['month_allowance_amount'],
                $row['ot_amount'],
                $row['mobile_recharge'],
                $row['incentive_amount'],
                $row['travelling_amount'],
                $row['food_expenses'],
                $row['month_pf_amount'],
                $row['esi_amount'],
                $row['professional_tax'],
                $row['advance_cash'],
                $row['total_earning'],
                $row['deduction_amount'],
                $row['salary_amount']
            ], "\t");
        }

        fclose($output);
        exit;
    }
    


    public function vehicle_fuel_report() {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) {
            $data['menu_open'] = 'report';
            $data['menu_status'] = 'vehicle_fuel_report';

            $fromDate = $data['fromDate'] = $this->input->get('from_date');
            $toDate = $data['toDate'] = $this->input->get('to_date');
            $vehicleId = $data['vehicleId'] = $this->input->get('vehicle_id');

            $data['vehicleDropdown'] = $this->mastermodel->getVehicleDropdown();
            $data['vehicleFuelReportList'] = $this->reportmodel->getExportVehicleFuelData($fromDate, $toDate, $vehicleId);

            $summary = $this->calculateFuelSummary($vehicleId, $fromDate, $toDate);

            $data['vehicleName'] = $summary['vehicle_name'];
            $data['vehicleNumber'] = $summary['vehicle_number'];
            $data['fuelType'] = $summary['fuel_type'];
            $data['totalKilometer'] = $summary['total_kilometer'];
            $data['totalAmount'] = $summary['total_amount'];
            $data['totalLiter'] = $summary['total_liter'];
            
            $data['ratePerLtr'] = $summary['rate_per_ltr'];
            $data['kmPerLtr'] = $summary['km_per_ltr'];
            $data['rsPerKM'] = $summary['rs_per_km'];
            
            $data['average'] = $summary['avg_percentage'];

            extract($data);

            $this->load->view('settings/header', $data);
            $this->load->view('report/vehicle_fuel_report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function getVehicleFuelReport()
    {
        $vehicleId = $this->input->post('vehicleId');
        $fromDate = $this->input->post('fromDate');
        $toDate = $this->input->post('toDate');
    
        $summary = $this->calculateFuelSummary($vehicleId, $fromDate, $toDate);

        // Fetch detailed records
        $details = $this->reportmodel->getExportVehicleFuelData($fromDate, $toDate, $vehicleId);

        if (empty($details)) {
            echo json_encode(["isError" => true, "message" => "No data available for export"]);
            return;
        }

        $fileName = "vehicle_fuel_report_" . date("d-m-Y") . ".xls";

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        if($vehicleId) {
            // Write summary header
            fputcsv($output, ["From Date", "To Date", "Vehicle Name", "Vehicle Number", "Fuel Type", "Total Kilometer", "Total Liter", "Rate Per Liter", "Kilometer Per Liter", "Rupees Per Kilometer", "Total Amount", "Average Percentage"], "\t");

            // Format date values properly
            $fromDateFormatted = !empty($fromDate) ? date('d - m - Y', strtotime($fromDate)) : '';
            $toDateFormatted   = !empty($toDate)   ? date('d - m - Y', strtotime($toDate))   : '';

            // Write summary data
            fputcsv($output, [
                $fromDateFormatted,
                $toDateFormatted,
                $summary['vehicle_name']?? '',
                $summary['vehicle_number']?? '',
                $summary['fuel_type']?? '',
                $summary['total_kilometer']?? '',
                $summary['total_liter']?? '',
                $summary['rate_per_ltr']?? '',
                $summary['km_per_ltr']?? '',
                $summary['rs_per_km']?? '',
                $summary['total_amount']?? '',
                $summary['avg_percentage']?? ''
            ], "\t");
        }

        if($fromDate && $toDate) {
            // Write summary header
            fputcsv($output, ["From Date", "To Date", "Total Amount"], "\t");

            // Format date values properly
            $fromDateFormatted = !empty($fromDate) ? date('d - m - Y', strtotime($fromDate)) : '';
            $toDateFormatted   = !empty($toDate)   ? date('d - m - Y', strtotime($toDate))   : '';

            // Write summary data
            fputcsv($output, [
                $fromDateFormatted,
                $toDateFormatted,
                $summary['total_amount']?? ''
            ], "\t");

        } elseif($fromDate) {

            // Write summary header
            fputcsv($output, ["From Date", "Total Amount"], "\t");

            // Format date values properly
            $fromDateFormatted = !empty($fromDate) ? date('d - m - Y', strtotime($fromDate)) : '';

            // Write summary data
            fputcsv($output, [
                $fromDateFormatted,
                $summary['total_amount']?? ''
            ], "\t");
        } else {
            // Write summary header
            fputcsv($output, ["Total Amount"], "\t");

            // Write summary data
            fputcsv($output, [
                $summary['total_amount']?? ''
            ], "\t");
        }

        // Empty row
        fputcsv($output, [], "\t");

        // Write details header
        fputcsv($output, ["Date", "Vehicle Name", "Vehicle Number", "Vehicle Type", "Fuel Type", "Kilometer", "Liter Qty", "Amount Per Liter", "Amount"], "\t");

        foreach ($details as $row) {
            fputcsv($output, [
                $row['filling_dateFormat'],
                $row['vehicle_name'],
                $row['vehicle_number'],
                $row['vehicle_type'],
                $row['fuel_type'],
                $row['vehicle_km'],
                $row['liter_qty'],
                $row['amount_per_liter'],
                $row['amount']
            ], "\t");
        }

        fclose($output);
        exit;
    }

    private function calculateFuelSummary($vehicleId, $fromDate, $toDate)
    {
        $logs = $this->reportmodel->getExportVehicleFuelData($fromDate, $toDate, $vehicleId);
        
        $summary = [
            'vehicle_name' => '',
            'vehicle_number' => '',
            'fuel_type' => '',
            'total_kilometer' => 0,
            'total_liter' => 0,
            'total_amount' => 0,
            'rate_per_ltr' => 0,
            'km_per_ltr' => 0,
            'rs_per_km' => 0,
            'avg_percentage' => 0
        ];

        if (empty($logs)) {
            if ($vehicleId) {
                $this->db->select('vehicle_name, vehicle_number, fuel_type');
                $this->db->where('id', $vehicleId);
                $vQuery = $this->db->get('vehicle');
                if ($vQuery->num_rows() > 0) {
                    $vRow = $vQuery->row();
                    $summary['vehicle_name'] = $vRow->vehicle_name;
                    $summary['vehicle_number'] = $vRow->vehicle_number;
                    $summary['fuel_type'] = $vRow->fuel_type;
                }
            }
            return $summary;
        }

        // Sort logs chronologically (oldest to newest)
        usort($logs, function($a, $b) {
            $dateA = strtotime($a['filling_date']);
            $dateB = strtotime($b['filling_date']);
            if ($dateA == $dateB) {
                return $a['id'] - $b['id'];
            }
            return $dateA - $dateB;
        });

        $summary['vehicle_name'] = $logs[0]['vehicle_name'] ?? '';
        $summary['vehicle_number'] = $logs[0]['vehicle_number'] ?? '';
        $summary['fuel_type'] = $logs[0]['fuel_type'] ?? '';

        // Calculate absolute totals
        $totalAmount = 0;
        $totalLiter = 0;
        $kms = [];
        
        foreach ($logs as $log) {
            $totalAmount += floatval($log['amount']);
            $totalLiter += floatval($log['liter_qty']);
            $kmVal = intval($log['vehicle_km']);
            if ($kmVal > 0) {
                $kms[] = $kmVal;
            }
        }

        $summary['total_amount'] = round($totalAmount, 2);
        $summary['total_liter'] = round($totalLiter, 2);

        if ($vehicleId) {
            $precedingKm = 0;
            if (!empty($kms)) {
                $maxKm = max($kms);
                $minKm = min($kms);
                
                $earliestDate = $logs[0]['filling_date'];
                
                $sql = "SELECT vehicle_km FROM vehicle_fuel WHERE vehicle_id = ? AND delete_status = 0 AND vehicle_km > 0 AND filling_date < ? ORDER BY filling_date DESC, id DESC LIMIT 1";
                $query = $this->db->query($sql, [$vehicleId, $earliestDate]);
                if ($query->num_rows() > 0) {
                    $precedingKm = intval($query->row()->vehicle_km);
                }
                
                if ($precedingKm > 0 && $maxKm >= $precedingKm) {
                    $summary['total_kilometer'] = $maxKm - $precedingKm;
                } else {
                    $summary['total_kilometer'] = ($maxKm >= $minKm) ? ($maxKm - $minKm) : 0;
                }
            }

            // Exclude entries with missing or 0 liter quantities/kms for mileage and average rate per liter
            $validLogs = array_filter($logs, function($log) {
                return intval($log['vehicle_km']) > 0 && floatval($log['liter_qty']) > 0;
            });

            if (!empty($validLogs)) {
                $validLogs = array_values($validLogs);
                
                // Calculate rate_per_ltr using only entries where liter is recorded
                $validAmount = 0;
                $validLiter = 0;
                foreach ($validLogs as $vl) {
                    $validAmount += floatval($vl['amount']);
                    $validLiter += floatval($vl['liter_qty']);
                }
                if ($validLiter > 0) {
                    $summary['rate_per_ltr'] = round($validAmount / $validLiter, 2);
                }

                // Mileage calculation: MAX km - preceding valid km, divided by liters
                $validKms = array_map(function($vl) { return intval($vl['vehicle_km']); }, $validLogs);
                $maxValidKm = max($validKms);
                $minValidKm = min($validKms);
                
                $precedingValidKm = 0;
                $earliestValidDate = $validLogs[0]['filling_date'];
                
                $sql = "SELECT vehicle_km FROM vehicle_fuel WHERE vehicle_id = ? AND delete_status = 0 AND vehicle_km > 0 AND liter_qty > 0 AND filling_date < ? ORDER BY filling_date DESC, id DESC LIMIT 1";
                $query = $this->db->query($sql, [$vehicleId, $earliestValidDate]);
                if ($query->num_rows() > 0) {
                    $precedingValidKm = intval($query->row()->vehicle_km);
                }

                if ($precedingValidKm > 0 && $maxValidKm >= $precedingValidKm) {
                    $mileageKm = $maxValidKm - $precedingValidKm;
                    $mileageLiter = $validLiter;
                } else {
                    $mileageKm = ($maxValidKm >= $minValidKm) ? ($maxValidKm - $minValidKm) : 0;
                    $mileageLiter = $validLiter - floatval($validLogs[0]['liter_qty']);
                }

                if ($mileageLiter > 0 && $mileageKm > 0) {
                    $summary['km_per_ltr'] = round($mileageKm / $mileageLiter, 2);
                }

                // Rupees Per Kilometer
                $mileageKmTotal = ($precedingValidKm > 0 && $maxValidKm >= $precedingValidKm) ? ($maxValidKm - $precedingValidKm) : (($maxValidKm >= $minValidKm) ? ($maxValidKm - $minValidKm) : 0);
                if ($mileageKmTotal > 0) {
                    $summary['rs_per_km'] = round($validAmount / $mileageKmTotal, 2);
                }
                
                // Average percentage based on baseline of 12 km/L
                if ($summary['km_per_ltr'] > 0) {
                    $summary['avg_percentage'] = round(($summary['km_per_ltr'] / 12) * 100, 2);
                }
            }
        }

        return $summary;
    }
    
    
    public function stock_report() {
        $data['userPermission'] = $userPermission = json_decode($this->session->userdata('permission'), true);
        if (in_array('admin', $userPermission)) {
            $data['menu_open'] = 'report';
            $data['menu_status'] = 'stock_report';

            $branch = $data['branchId'] = $this->input->get('branch');
            $fromDate = $data['fromDate'] = $this->input->get('from_date');
            $toDate = $data['toDate'] = $this->input->get('to_date');

            $data['branchDropdown'] = $this->mastermodel->getBranchDropdown();
            $data['stockReportList'] = $this->reportmodel->exportStockData($branch, $fromDate, $toDate);
        
            $this->load->view('settings/header', $data);
            $this->load->view('report/stock_report', $data);
            $this->load->view('settings/footer');
        } else {
            $this->load->view('settings/header_link');
            $this->load->view('settings/no_permission');
            $this->load->view('settings/footer');
        }
    }

    public function getStockReport()
    {
        $branch = $this->input->post('branch');
        $fromDate = $this->input->post('from_date');
        $toDate = $this->input->post('to_date');
    
        $data = $this->reportmodel->exportStockData($branch, $fromDate, $toDate);
        
        if (empty($data)) {
            $response = [
                "isError" => true,
                "message" => "No data available for export"
            ];
            echo json_encode($response);
            return;
        }        
    
        $fileName = "stock_report_" . date("d-m-Y") . ".xls";
    
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Pragma: no-cache");
        header("Expires: 0");
    
        $output = fopen("php://output", "w");
    
        // Write header
        fputcsv($output, ["Material Code", "Material Name", "Category", "Type", "Opening Stock", "Stock In", "Stock Out", "Transfer In", "Transfer Out", "Closing Stock"], "\t");

        // Write data rows
        foreach ($data as $row) {
            fputcsv($output, [
                $row['material_code'],
                $row['material_name'],
                $row['material_category'],
                $row['material_type'],
                $row['opening_stock'],
                $row['stock_in'],
                $row['stock_out'],
                $row['transfer_in'],
                $row['transfer_out'],
                $row['closing_stock']
            ], "\t");
        }
    
        fclose($output);
        exit;
    }
}
?>