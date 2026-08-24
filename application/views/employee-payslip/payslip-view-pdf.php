<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $employeeName . ' - ' . $payslipMonth . ' ' . $payslipYear; ?> Payslip</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap');

        @page {
            margin: 15px;
        }
        body {
            font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #000;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        .outer-border {
            border: 1px solid #000;
            padding: 10px;
            border-radius: 4px;
        }
        .header-img {
            width: 100%;
            display: block;
            margin-bottom: 10px;
        }
        .title-bar {
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            text-transform: capitalize;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 4px 0px 8px 0;
            margin-bottom: 12px;
        }
        table {
            border-collapse: collapse;
        }
        .full-width {
            width: 100%;
        }
        .info-table td {
            padding: 3px 4px;
            vertical-align: top;
            font-size: 13px;
            font-weight: 600;
        }
        td, tr, th {
            font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
        .info-label {
            width: 45%;
        }
        .info-colon {
            width: 5%;
        }
        .info-val {
            width: 50%;
            text-transform: capitalize;
        }
        .text-right {
            text-align: right;
        }
        .sign-img {
            max-height: 50px;
        }
    </style>
</head>
<body>
    <div class="outer-border">
        <?php 
            $ggccPad = FCPATH . 'themes/images/ggcc-letter-pad.png';
            $brightPad = FCPATH . 'themes/images/bright-letter-pad.png';
            $ggccSign = FCPATH . 'themes/images/ggcc-signature.png';
            $brightSign = FCPATH . 'themes/images/bright-signature.png';
        ?>

        <?php if($companyName == 'ggcc' && file_exists($ggccPad)) { ?>
            <img class="header-img" src="<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($ggccPad)); ?>" alt="GGCC Header">
        <?php } elseif ($companyName == 'bright' && file_exists($brightPad)) { ?>
            <img class="header-img" src="<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($brightPad)); ?>" alt="Bright Header">
        <?php } ?>

        <div class="title-bar">
            <?php echo htmlspecialchars($payslipMonth . ' ' . $payslipYear); ?> - Payslip
        </div>

        <!-- Employee Info Section -->
        <table class="full-width" style="border-bottom: 1px solid #000; margin-bottom: 4px; padding-bottom: 4px;">
            <tr>
                <td style="width: 50%; vertical-align: top; padding-right: 12px; border-right: 1px solid #000;">
                    <table class="full-width info-table">
                        <tr><td class="info-label" style="padding-bottom: 5px;">Employee Id</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeId); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Joining Date</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php $dateFormat = new DateTime($joiningDate); echo $dateFormat->format('d - m - Y'); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Bank Name</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeBank_name); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Account Number</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeAccountNumber); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">IFSC Code</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeIfscCode); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">PAN Number</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeePanNumber); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">ESI Number</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeEsiNumber); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 10px;">PF Number</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 10px;"><?php echo htmlspecialchars($employeePfNumber); ?></td></tr>
                    </table>
                </td>
                <td style="width: 50%; vertical-align: top; padding-left: 12px;">
                    <table class="full-width info-table">
                        <tr><td class="info-label" style="padding-bottom: 5px;">Name</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeName); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Designation</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeDesignation); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Department</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;">Electrical Department</td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Branch</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeBranch); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Payable Days</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeePayableDays); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Present Days</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeePresentDays); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 5px;">Absent Days</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 5px;"><?php echo htmlspecialchars($employeeAbsentDays); ?></td></tr>
                        <tr><td class="info-label" style="padding-bottom: 10px;">OT Days</td><td class="info-colon">:</td><td class="info-val" style="padding-bottom: 10px;"><?php echo htmlspecialchars($employeeOtDays); ?></td></tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Earnings & Deductions + Totals + Net Amount in ONE continuous table -->
        <?php 
            $earningRows = [];
            $earningRows[] = ['label' => 'Basic Pay', 'actual' => $basicPay, 'earned' => $presentBasicePay];
            $earningRows[] = ['label' => 'Allowance', 'actual' => $allowanceAmount, 'earned' => $presentAllowanceAmount];
            if ($overtimePay > 0)       $earningRows[] = ['label' => 'Overtime Pay', 'actual' => '', 'earned' => $overtimePay];
            if ($mobileRecharge > 0)    $earningRows[] = ['label' => 'Mobile Recharge', 'actual' => '', 'earned' => $mobileRecharge];
            if ($incentiveAmount > 0)   $earningRows[] = ['label' => 'Incentive Amount', 'actual' => '', 'earned' => $incentiveAmount];
            if ($travellingAmount > 0)  $earningRows[] = ['label' => 'Travelling Amount', 'actual' => '', 'earned' => $travellingAmount];
            if ($foodExpenses > 0)      $earningRows[] = ['label' => 'Food Expenses Amount', 'actual' => '', 'earned' => $foodExpenses];

            $deductionRows = [];
            if ($pfAmount > 0)          $deductionRows[] = ['label' => 'Provident Fund (' . htmlspecialchars($basicPfAmount) . ' * 12%)', 'amount' => $pfAmount];
            if ($esiAmount > 0)         $deductionRows[] = ['label' => 'Employee State Insurance (0.75%)', 'amount' => $esiAmount];
            if ($professionalTax > 0)   $deductionRows[] = ['label' => 'Professional Tax', 'amount' => $professionalTax];
            if ($advanceCash > 0)       $deductionRows[] = ['label' => 'Adavnce In Cash', 'amount' => $advanceCash];
        ?>
        <table class="full-width" style="margin-bottom: 0;">
            <!-- Row 1: Earnings Header | Deductions Header -->
            <tr style="border-bottom: 1px solid #000;">
                <td style="width: 25%; padding: 0px 6px 8px 6px; font-size: 14px; font-weight: 700;">Earnings</td>
                <td style="width: 12.5%; padding: 0px 6px 8px 6px; font-size: 14px; font-weight: 700; text-align: right;">Actuals</td>
                <td style="width: 12.5%; padding: 0px 10px 8px 6px; font-size: 14px; font-weight: 700; text-align: right; border-right: 1px solid #000;">Earned</td>
                <td style="width: 37.5%; padding: 0px 6px 8px 15px; font-size: 14px; font-weight: 700;">Deductions</td>
                <td style="width: 12.5%; padding: 0px 6px 8px 6px; font-size: 14px; font-weight: 700; text-align: right;">Amount</td>
            </tr>
            <!-- Earning & Deduction Data Rows -->
            <?php 
                $maxRows = max(count($earningRows), count($deductionRows));
                for ($i = 0; $i < $maxRows; $i++):
                    $isFirst = ($i == 0);
                    $isLast = ($i == $maxRows - 1);
                    $topPadding = $isFirst ? '10px' : '6px';
                    $bottomPadding = $isLast ? '10px' : '4px';
                    
                    $leftPaddingStyle = "padding: {$topPadding} 10px {$bottomPadding} 6px;";
                    $rightPaddingStyle = "padding: {$topPadding} 10px {$bottomPadding} 15px;";
                    $rightValPaddingStyle = $isLast ? "padding: {$topPadding} 10px {$bottomPadding} 6px;" : "padding: {$topPadding} 6px {$bottomPadding} 6px;";
            ?>
            <tr>
                <?php if (isset($earningRows[$i])): ?>
                    <td style="<?php echo $leftPaddingStyle; ?> font-size: 13px; font-weight: 600;"><?php echo htmlspecialchars($earningRows[$i]['label']); ?></td>
                    <td style="<?php echo $leftPaddingStyle; ?> font-size: 13px; font-weight: 600; text-align: right;"><?php echo htmlspecialchars($earningRows[$i]['actual']); ?></td>
                    <td style="<?php echo $leftPaddingStyle; ?> font-size: 13px; font-weight: 600; text-align: right; border-right: 1px solid #000;"><?php echo htmlspecialchars($earningRows[$i]['earned']); ?></td>
                <?php else: ?>
                    <td style="<?php echo $leftPaddingStyle; ?>">&nbsp;</td>
                    <td style="<?php echo $leftPaddingStyle; ?>">&nbsp;</td>
                    <td style="<?php echo $leftPaddingStyle; ?> border-right: 1px solid #000;">&nbsp;</td>
                <?php endif; ?>
                <?php if (isset($deductionRows[$i])): ?>
                    <td style="<?php echo $rightPaddingStyle; ?> font-size: 13px; font-weight: 600;"><?php echo $deductionRows[$i]['label']; ?></td>
                    <td style="<?php echo $rightValPaddingStyle; ?> font-size: 13px; font-weight: 600; text-align: right;"><?php echo htmlspecialchars($deductionRows[$i]['amount']); ?></td>
                <?php else: ?>
                    <td style="<?php echo $rightPaddingStyle; ?>">&nbsp;</td>
                    <td style="<?php echo $rightValPaddingStyle; ?>">&nbsp;</td>
                <?php endif; ?>
            </tr>
            <?php endfor; ?>
            <!-- Totals Row -->
            <tr style="border-top: 1px solid #000; border-bottom: 1px solid #000;">
                <td colspan="2" style="padding: 6px 6px 8px 6px; font-size: 13px; font-weight: 600;">Total Earning Amount</td>
                <td style="padding: 6px 10px 8px 6px; font-size: 13px; font-weight: 600; text-align: right; border-right: 1px solid #000;"><?php echo htmlspecialchars($totalEarning); ?></td>
                <td style="padding: 6px 6px 8px 15px; font-size: 13px; font-weight: 600;">Total Deduction Amount</td>
                <td style="padding: 6px 6px 8px 6px; font-size: 13px; font-weight: 600; text-align: right;"><?php echo htmlspecialchars($deductionAmount); ?></td>
            </tr>
            <!-- Net Salary Row -->
            <tr style="border-bottom: 1px solid #000;">
                <td colspan="3" style="padding: 6px 6px 8px 6px; font-size: 13px; font-weight: 600; text-transform: capitalize; border-right: 1px solid #000;"><?php echo htmlspecialchars($salaryInWord); ?></td>
                <td style="padding: 6px 6px 8px 15px; font-size: 14px; font-weight: 600;">Total Amount</td>
                <td style="padding: 6px 6px 8px 6px; font-size: 14px; font-weight: 600; text-align: right;"><?php echo htmlspecialchars($salaryAmount); ?></td>
            </tr>
        </table>

        <!-- Signature -->
        <div style="margin-top: 25px; text-align: right; padding-right: 10px;">
            <?php if($companyName == 'ggcc' && file_exists($ggccSign)) { ?>
                <img class="sign-img" src="<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($ggccSign)); ?>" alt="GGCC Signature">
            <?php } elseif ($companyName == 'bright' && file_exists($brightSign)) { ?>
                <img class="sign-img" src="<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($brightSign)); ?>" alt="Bright Signature">
            <?php } ?>
            <div style="font-size: 14px; font-weight: 600; margin-top: 4px; padding-bottom: 10px;">Employer's / Authorized Signature</div>
        </div>
    </div>
</body>
</html>
