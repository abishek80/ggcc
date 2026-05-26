<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Monthly Payslip Available</title>
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
            padding: 30px;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-cta {
            display: inline-block;
            background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
            color: #ffffff !important;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2), 0 2px 4px -1px rgba(79, 70, 229, 0.1);
            transition: all 0.2s ease;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .detail-label {
            color: #64748b;
            font-weight: 500;
        }
        .detail-value {
            color: #0f172a;
            font-weight: 600;
        }
    </style>
</head>
<body style="margin: 0; padding: 40px 0; background-color: #f1f5f9;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <div class="container">
                    
                    <!-- Header -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);">
                        <tr>
                            <td style="padding: 40px 30px; text-align: center;">
                                <img style="height: 65px; margin-bottom: 15px;" src="https://ggcc.org.in/themes/images/ggcc-logo-white.png" alt="GGCC & Bright Logo">
                                <h1 style="color: #ffffff; font-family: 'Outfit', sans-serif; font-size: 24px; font-weight: 700; margin: 0 0 8px 0; letter-spacing: -0.02em;">Payslip Notification</h1>
                                <p style="color: #c7d2fe; font-size: 14px; margin: 0; font-weight: 500;">GGCC &amp; Bright Employee Portal</p>
                            </td>
                        </tr>
                    </table>

                    <!-- Content -->
                    <div style="padding: 30px;">
                        
                        <div class="card">
                            <h2 style="font-family: 'Outfit', sans-serif; font-size: 20px; color: #0f172a; margin: 0 0 10px 0; font-weight: 700; text-transform: capitalize;">Hi <?= htmlspecialchars($employeeName); ?>,</h2>
                            <p style="font-size: 14px; color: #475569; line-height: 22px; margin: 0 0 25px 0;">
                                Your monthly payslip for <strong style="color: #0f172a;"><?= htmlspecialchars($month . ' ' . $year); ?></strong> is now ready and available in your employee portal.
                            </p>

                            <!-- Payslip Summary Details -->
                            <div style="background-color: #f8fafc; border-radius: 8px; padding: 8px 16px; border: 1px solid #f1f5f9; margin-bottom: 10px; text-align: left;">
                                <div class="detail-row" style="margin-bottom: 10px;">
                                    <span class="detail-label">Employee Name : </span>
                                    <span class="detail-value" style="margin-left: 10px; text-transform: capitalize;"><?= htmlspecialchars($employeeName); ?></span>
                                </div>
                                <div class="detail-row" style="border-bottom: none;">
                                    <span class="detail-label">Pay Period : </span>
                                    <span class="detail-value" style="margin-left: 10px;"><?= htmlspecialchars($month . ' ' . $year); ?></span>
                                </div>
                            </div>

                            <p style="font-size: 13.5px; color: #64748b; margin-bottom: 20px; line-height: 20px;">
                                To download your payslip and view your loans, please log in to the portal by clicking below.
                            </p>

                            <a class="btn-cta" target="_blank" href="https://ggcc.org.in/">Go to Portal</a>
                        </div>

                    </div>

                    <!-- Footer -->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; border-top: 1px solid #e2e8f0;">
                        <tr>
                            <td style="padding: 24px 30px; text-align: center; font-size: 12px; color: #64748b; line-height: 18px;">
                                <?= date('Y'); ?> &copy; GGCC &amp; Bright. All rights reserved.<br>
                                <span style="font-size: 11px; color: #94a3b8;">This is a confidential system notification. Please do not share or reply to this email.</span>
                            </td>
                        </tr>
                    </table>

                </div>
            </td>
        </tr>
    </table>
</body>
</html>