<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daily Purchase Order Alerts</title>
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
        .badge-critical {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .badge-warning {
            background-color: #ffedd5;
            color: #9a3412;
        }
        .badge-info {
            background-color: #e0e7ff;
            color: #3730a3;
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
        .table-po {
            width: 100%;
            border-collapse: collapse;
        }
        .table-po th {
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
        .table-po td {
            padding: 14px 16px;
            font-size: 13.5px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .table-po tr:last-child td {
            border-bottom: none;
        }
        .po-title {
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 3px 0;
            font-size: 14px;
        }
        .po-subtext {
            font-size: 12px;
            color: #64748b;
            margin: 0;
        }
        .po-amount {
            font-weight: 600;
            color: #0f172a;
        }
        .po-balance-critical {
            font-weight: 700;
            color: #dc2626;
        }
        .po-balance-warning {
            font-weight: 700;
            color: #ea580c;
        }
        .po-balance-info {
            font-weight: 700;
            color: #2563eb;
        }
        .mobile-label {
            display: none;
        }
        @media only screen and (max-width: 600px) {
            body {
                padding: 10px 0 !important;
            }
            .container {
                border-radius: 8px !important;
                box-shadow: none !important;
                width: 100% !important;
                max-width: 100% !important;
            }
            .card {
                border-radius: 8px !important;
                margin-bottom: 20px !important;
            }
            .card-header {
                padding: 12px 15px !important;
                font-size: 14px !important;
            }
            .table-po, .table-po thead, .table-po tbody, .table-po tr, .table-po td {
                display: block !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }
            .table-po thead {
                display: none !important;
            }
            .table-po tr {
                padding: 15px !important;
                border-bottom: 1px solid #e2e8f0 !important;
                position: relative !important;
                background-color: #ffffff !important;
            }
            .table-po tr:last-child {
                border-bottom: none !important;
            }
            .table-po td {
                padding: 6px 0 !important;
                border-bottom: none !important;
                text-align: left !important;
                font-size: 13px !important;
            }
            .mobile-label {
                display: inline-block !important;
                font-size: 10px !important;
                font-weight: 700 !important;
                text-transform: uppercase !important;
                color: #94a3b8 !important;
                letter-spacing: 0.05em !important;
                width: 100px !important;
                vertical-align: top !important;
            }
            .mobile-value {
                display: inline-block !important;
                vertical-align: top !important;
                width: calc(100% - 110px) !important;
            }
            .desktop-only-label {
                display: none !important;
            }
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
                            <td style="padding: 40px 30px; text-align: center;">
                                <img style="height: 65px; margin-bottom: 15px;" src="https://ggcc.org.in/themes/images/ggcc-logo-white.png" alt="GGCC & Bright Logo">
                                <h1 style="color: #ffffff; font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; margin: 0 0 8px 0; letter-spacing: -0.02em;"><?= isset($emailTitle) ? $emailTitle : 'Daily Purchase Order Alerts'; ?></h1>
                                <p style="color: #c7d2fe; font-size: 14px; margin: 0; font-weight: 500;"><?= isset($emailSubtext) ? $emailSubtext : 'Consolidated Expiries &amp; Low Balance Reminders'; ?></p>
                            </td>
                        </tr>
                    </table>

                    <!-- Intro / Date Banner -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-bottom: 1px solid #e2e8f0;">
                        <tr>
                            <td style="padding: 24px 30px; font-size: 14px; color: #475569;">
                                <strong style="color: #0f172a;">Hi Admin,</strong><br>
                                <?= isset($introText) ? $introText : 'Below is the daily consolidated report of active Purchase Orders requiring immediate attention. Please review the details below.'; ?>
                            </td>
                            <td style="padding: 24px 30px; text-align: right; font-size: 13px; color: #64748b; font-weight: 600; vertical-align: top;">
                                Date: <?= isset($currentDate) ? $currentDate : date('d F, Y'); ?>
                            </td>
                        </tr>
                    </table>

                    <!-- Content -->
                    <div style="padding: 20px;">
                        
                        <?php 
                        // Reusable Helper to Render PO Tables
                        function renderPOTable($title, $list, $badgeClass, $badgeLabel, $borderStyle, $isExpiry = true) {
                            if (empty($list)) return;
                        ?>
                            <div class="card" style="border-left: <?= $borderStyle; ?>;">
                                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-family: 'Outfit', sans-serif;"><?= $title; ?></span>
                                    <span class="badge <?= $badgeClass; ?>" style="margin-left: auto;"><?= $badgeLabel; ?></span>
                                </div>
                                <table class="table-po">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">S. No</th>
                                            <th style="width: 35%">PO Details</th>
                                            <th style="width: 20%">Po Timeline</th>
                                            <th style="width: 20%">PO Amount & Balance</th>
                                            <th style="width: 20%"><?= $isExpiry ? 'Expiry' : 'Balance'; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sn = 1;
                                        foreach ($list as $row) { 
                                            $bal = (float)$row->balance_amount;
                                            if ($bal <= 100000) {
                                                $balStyle = 'po-balance-critical';
                                            } elseif ($bal <= 300000) {
                                                $balStyle = 'po-balance-warning';
                                            } else {
                                                $balStyle = 'po-balance-info';
                                            }
                                        ?>
                                             <tr>
                                                 <td>
                                                     <span class="mobile-label">S. No:</span>
                                                     <span class="mobile-value" style="font-weight: 700; color: #475569;">#<?= $sn++; ?></span>
                                                 </td>
                                                 <td>
                                                     <span class="mobile-label">PO Details:</span>
                                                     <div class="mobile-value">
                                                         <p class="po-title"><?= htmlspecialchars($row->purchase_order_no); ?></p>
                                                         <p class="po-subtext" style="font-weight: 600; color: #475569;"><?= htmlspecialchars($row->po_title); ?></p>
                                                         <p class="po-subtext" style="margin-top: 4px; text-transform: capitalize; color: #64748b;">
                                                             <?= htmlspecialchars($row->company_name); ?><br> &bull; <?= htmlspecialchars($row->zone); ?> &bull; <?= htmlspecialchars($row->branch_name); ?>
                                                         </p>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <span class="mobile-label">Po Timeline:</span>
                                                     <div class="mobile-value">
                                                         <p style="margin: 0; font-size: 13px; font-weight: 600; color: #1e293b;">
                                                             <?= htmlspecialchars($row->po_dateFormat); ?> <span style="font-weight: 400; color: #64748b;"><br> to<br></span> <?= htmlspecialchars($row->validity_endFormat); ?>
                                                         </p>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <span class="mobile-label"><?= $isExpiry ? 'PO Amt & Bal' : 'PO Amt'; ?>:</span>
                                                     <div class="mobile-value">
                                                         <p style="margin: 0; font-size: 13px; color: #475569;">
                                                             <?php if ($isExpiry) { ?>
                                                                 <span style="font-size: 11px; color: #94a3b8; font-weight: 600; text-transform: uppercase;">PO Amt:</span><br>
                                                             <?php } ?>
                                                             <span style="font-weight: 600; color: #0f172a;">₹<?= number_format($row->po_amount, 2); ?></span>
                                                         </p>
                                                         <?php if ($isExpiry) { ?>
                                                             <p style="margin: 6px 0 0 0; font-size: 13px; color: #475569;">
                                                                 <span style="font-size: 11px; color: #94a3b8; font-weight: 600; text-transform: uppercase;">Bal:</span><br>
                                                                 <span class="<?= $balStyle; ?>">₹<?= number_format($row->balance_amount, 2); ?></span>
                                                             </p>
                                                         <?php } ?>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <span class="mobile-label"><?= $isExpiry ? 'Expiry' : 'Balance'; ?>:</span>
                                                     <div class="mobile-value">
                                                         <?php if ($isExpiry) { ?>
                                                             <span style="font-weight: 700; color: #991b1b;"><?= htmlspecialchars($row->validity_endFormat); ?></span>
                                                             <p class="po-subtext" style="color: #b91c1c; font-weight: 600; margin: 2px 0 0 0;"><?= $row->PoRemainingDate; ?> Days left</p>
                                                         <?php } else { ?>
                                                             <span class="<?= $balStyle; ?>">₹<?= number_format($row->balance_amount, 2); ?></span>
                                                         <?php } ?>
                                                     </div>
                                                 </td>
                                             </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>

                        <!-- SECTION 1: EXPIRY ALERTS -->
                        <?php 
                        renderPOTable("PO Expiry in 1 Month (30 Days)", $poExpiry30, "badge-critical", "Critical Expiry", "5px solid #dc2626", true);
                        renderPOTable("PO Expiry in 3 Months (90 Days)", $poExpiry90, "badge-warning", "Urgent Expiry", "5px solid #ea580c", true);
                        renderPOTable("PO Expiry in 5 Months (150 Days)", $poExpiry150, "badge-info", "Upcoming Expiry", "5px solid #6366f1", true);
                        ?>

                        <!-- SECTION 2: LOW BALANCE ALERTS -->
                        <?php 
                        renderPOTable("PO Balance Below ₹1,00,000", $poBalance100000, "badge-critical", "Critical Balance", "5px solid #dc2626", false);
                        renderPOTable("PO Balance Below ₹3,00,000", $poBalance300000, "badge-warning", "Low Balance", "5px solid #ea580c", false);
                        renderPOTable("PO Balance Below ₹5,00,000", $poBalance500000, "badge-info", "Warning Balance", "5px solid #3b82f6", false);
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