<?php
// Backwards-compatibility helper
if (!isset($reports)) {
    $reports = [
        (object) [
            'work_type_name' => isset($work_type) ? $work_type : '',
            'report_date' => isset($report_date) ? $report_date : date('Y-m-d')
        ]
    ];
}
$isMultiple = (count($reports) > 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Work Report Submission Reminder</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Helvetica, Arial, sans-serif;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        td {
            font-family: 'Plus Jakarta Sans', 'Segoe UI', Helvetica, Arial, sans-serif;
        }
        a {
            text-decoration: none;
            color: #6366f1;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }
        .card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 24px;
            margin: 20px 0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #f1f5f9;
            padding: 12px 0;
        }
        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .info-row:first-child {
            padding-top: 0;
        }
        .info-label {
            font-weight: 600;
            color: #64748b;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .info-value {
            font-weight: 700;
            color: #0f172a;
            font-size: 14px;
        }
        .btn-submit {
            display: inline-block;
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
            color: #ffffff !important;
            padding: 14px 28px;
            font-weight: 700;
            font-size: 13px;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
            margin-top: 15px;
        }
    </style>
</head>
<body style="margin: 0; padding: 30px 0; background-color: #f1f5f9;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding: 10px 10px 30px 10px;">
                <div class="container">
                    <!-- Header -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);">
                        <tr>
                            <td style="padding: 35px 30px; text-align: center;">
                                <img style="height: 60px; margin-bottom: 15px;" src="https://ggcc.org.in/themes/images/ggcc-logo-white.png" alt="GGCC & Bright Logo">
                                <h1 style="color: #ffffff; font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 700; margin: 0 0 8px 0; letter-spacing: -0.02em;">Submission Reminder</h1>
                                <p style="color: #c7d2fe; font-size: 13.5px; margin: 0; font-weight: 500;">Upcoming Work Report<?= $isMultiple ? 's' : ''; ?> Deadline</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Content -->
                    <div style="padding: 30px 24px; text-align: left;">
                        <p style="font-size: 15px; color: #334155; line-height: 24px; margin-top: 0;">
                            Dear <strong style="color: #0f172a;"><?= htmlspecialchars($employee_name); ?></strong>,
                        </p>
                        <p style="font-size: 14px; color: #475569; line-height: 22px;">
                            This is an automated reminder that your scheduled <strong>Work Report<?= $isMultiple ? 's' : ''; ?></strong> <?= $isMultiple ? 'are' : 'is'; ?> due for submission tomorrow. Please ensure your report details and any supporting documents are submitted on time.
                        </p>

                        <!-- Details Cards -->
                        <?php foreach ($reports as $row) { 
                            $formattedDate = (strpos($row->report_date, '-') !== false) 
                                ? date('d/m/Y', strtotime($row->report_date)) 
                                : $row->report_date;
                        ?>
                        <div class="card">
                            <div class="info-row">
                                <span class="info-label">Report Type</span>
                                <span class="info-value"><?= htmlspecialchars($row->work_type_name); ?></span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Due Date</span>
                                <span class="info-value" style="color: #b91c1c;"><?= htmlspecialchars($formattedDate); ?></span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Status</span>
                                <span class="info-value" style="color: #d97706; text-transform: uppercase;">Pending</span>
                            </div>
                        </div>
                        <?php } ?>

                        <p style="font-size: 14px; color: #475569; line-height: 22px; margin-bottom: 25px;">
                            Kindly log into the GGCC portal and complete your report submission to maintain compliance.
                        </p>

                        <div style="text-align: center; margin-bottom: 10px;">
                            <a href="https://ggcc.org.in/" class="btn-submit">Submit Report<?= $isMultiple ? 's' : ''; ?> Now</a>
                        </div>
                    </div>

                    <!-- Footer -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-top: 1px solid #e2e8f0;">
                        <tr>
                            <td style="padding: 24px 30px; text-align: center; font-size: 12px; color: #64748b; line-height: 18px;">
                                <?= date('Y'); ?> &copy; GGCC &amp; Bright. All rights reserved.<br>
                                <span style="font-size: 11px; color: #94a3b8;">This is an automated system notification. Please do not reply directly to this email.</span>
                            </td>
                        </tr>
                    </table>

                </div>
            </td>
        </tr>
    </table>
</body>
</html>
