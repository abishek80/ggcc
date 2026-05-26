<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Vehicle Renewal List</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background-color: #f1f5f9;
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
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 9999px;
            letter-spacing: 0.05em;
        }
        .badge-insurance {
            background-color: #e0e7ff;
            color: #3730a3;
        }
        .badge-fc {
            background-color: #ecfdf5;
            color: #065f46;
        }
        .badge-puc {
            background-color: #fffbeb;
            color: #92400e;
        }
        .card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
            overflow: hidden;
        }
        .card-header {
            padding: 16px 20px;
            font-weight: 700;
            font-size: 16px;
            border-bottom: 1px solid #e2e8f0;
            color: #1e293b;
        }
        .table-renewal {
            width: 100%;
            border-collapse: collapse;
        }
        .table-renewal th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        .table-renewal td {
            padding: 14px 16px;
            font-size: 13.5px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .table-renewal tr:last-child td {
            border-bottom: none;
        }
        .vehicle-name {
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 3px 0;
            font-size: 14px;
        }
        .vehicle-subtext {
            font-size: 12px;
            color: #64748b;
            margin: 0;
        }
        .renewal-date {
            font-weight: 700;
            color: #0f172a;
        }
    </style>
</head>
<body style="margin: 0; padding: 30px 0; background-color: #f1f5f9;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding: 10px 0 30px 0;">
                <div class="container">
                    
                    <!-- Header -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);">
                        <tr>
                            <td style="padding: 40px 30px; text-align: center;">
                                <img style="height: 65px; margin-bottom: 15px;" src="https://ggcc.org.in/themes/images/ggcc-logo-white.png" alt="GGCC & Bright Logo">
                                <h1 style="color: #ffffff; font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; margin: 0 0 8px 0; letter-spacing: -0.02em;">Vehicle Renewal Alerts</h1>
                                <p style="color: #c7d2fe; font-size: 14px; margin: 0; font-weight: 500;"><?= $monthText . ' ' . $year; ?> Monthly Renewal Report</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Intro / Date Banner -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-bottom: 1px solid #e2e8f0;">
                        <tr>
                            <td style="padding: 24px 30px; font-size: 14px; color: #475569;">
                                <strong style="color: #0f172a;">Hi Admin,</strong><br>
                                Below is the monthly consolidated list of vehicle renewals (Insurance, FC, and PUC) requiring immediate action.
                            </td>
                            <td style="padding: 24px 30px; text-align: right; font-size: 13px; color: #64748b; font-weight: 600; vertical-align: top;">
                                Date: <?= date('d F, Y'); ?>
                            </td>
                        </tr>
                    </table>

                    <!-- Content -->
                    <div style="padding: 30px;">
                        
                        <?php 
                        // Reusable Helper to Render Renewal Tables
                        function renderRenewalTable($title, $list, $badgeClass, $badgeLabel, $borderStyle, $dateLabel) {
                            if (empty($list)) return;
                        ?>
                            <div class="card" style="border-left: <?= $borderStyle; ?>;">
                                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-family: 'Outfit', sans-serif;"><?= $title; ?></span>
                                    <span class="badge <?= $badgeClass; ?>" style="margin-left: auto;"><?= $badgeLabel; ?></span>
                                </div>
                                <table class="table-renewal">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">S. No</th>
                                            <th style="width: 32%">Vehicle Details</th>
                                            <th style="width: 30%">Zone &amp; Branch</th>
                                            <th style="width: 30%"><?= $dateLabel; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sn = 1;
                                        foreach ($list as $row) { 
                                        ?>
                                            <tr>
                                                <td><?= $sn++; ?></td>
                                                <td>
                                                    <p class="vehicle-name"><?= htmlspecialchars($row->vehicle_number); ?></p>
                                                    <p class="vehicle-subtext"><?= htmlspecialchars($row->vehicle_name); ?></p>
                                                </td>
                                                <td>
                                                    <p style="margin: 0; font-weight: 500; color: #1e293b; font-size: 13px; text-transform: capitalize;"><?= htmlspecialchars($row->zone); ?></p>
                                                    <p class="vehicle-subtext" style="text-transform: capitalize;"><?= htmlspecialchars($row->branch_name); ?></p>
                                                </td>
                                                <td>
                                                    <span class="renewal-date"><?= htmlspecialchars($row->renewal_date); ?></span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>

                        <!-- SECTION 1: INSURANCE RENEWAL -->
                        <?php 
                        renderRenewalTable("Insurance Renewal List", $insuranceRenewalList, "badge-insurance", "Insurance Due", "5px solid #6366f1", "Renewal Date");
                        ?>

                        <!-- SECTION 2: FC RENEWAL -->
                        <?php 
                        renderRenewalTable("FC Renewal List", $fcRenewalList, "badge-fc", "FC Due", "5px solid #10b981", "Renewal Date");
                        ?>

                        <!-- SECTION 3: PUC RENEWAL -->
                        <?php 
                        renderRenewalTable("PUC Renewal List", $pucRenewalList, "badge-puc", "PUC Due", "5px solid #f59e0b", "Renewal Date");
                        ?>

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