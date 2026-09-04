<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to <?php echo htmlspecialchars($companyName); ?></title>
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
        .header {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 36px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .header p {
            margin: 6px 0 0 0;
            color: #94a3b8;
            font-size: 14px;
        }
        .content {
            padding: 32px 30px;
        }
        .greeting {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .info-table {
            width: 100%;
            margin: 24px 0;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
        }
        .info-table td {
            padding: 12px 18px;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
        }
        .info-table tr:last-child td {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #475569;
            width: 38%;
        }
        .info-value {
            color: #0f172a;
            font-weight: 500;
        }
        .password-badge {
            display: inline-block;
            background-color: #e0e7ff;
            color: #3730a3;
            font-family: monospace;
            font-size: 15px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 1px;
        }
        .actions-container {
            margin-top: 30px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 13px 26px;
            margin: 6px 4px;
            border-radius: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            transition: all 0.2s ease;
        }
        .btn-web {
            background-color: #2563eb;
            color: #ffffff !important;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.25);
        }
        .btn-apk {
            background-color: #16a34a;
            color: #ffffff !important;
            box-shadow: 0 4px 6px -1px rgba(22, 163, 74, 0.25);
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div style="padding: 30px 10px;">
        <table class="container" align="center" width="100%">
            <tr>
                <td class="header">
                    <h1>Welcome to <?php echo htmlspecialchars($companyName); ?></h1>
                    <p>Employee Portal Account Created</p>
                </td>
            </tr>
            <tr>
                <td class="content">
                    <div class="greeting">Hello <?php echo htmlspecialchars($employeeName); ?>,</div>
                    <p style="margin: 0; line-height: 1.6; color: #475569;">
                        Welcome to <strong><?php echo htmlspecialchars($companyName); ?></strong>! Your account has been created. Below are your login credentials to access the portal and mobile application:
                    </p>

                    <table class="info-table">
                        <tr>
                            <td class="info-label">Company Name</td>
                            <td class="info-value"><?php echo htmlspecialchars($companyName); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Employee Name</td>
                            <td class="info-value"><?php echo htmlspecialchars($employeeName); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Email Address</td>
                            <td class="info-value"><?php echo htmlspecialchars($email); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Phone Number</td>
                            <td class="info-value"><?php echo htmlspecialchars($mobileNumber); ?></td>
                        </tr>
                        <tr>
                            <td class="info-label">Password</td>
                            <td class="info-value">
                                <span class="password-badge"><?php echo htmlspecialchars($plainPassword); ?></span>
                            </td>
                        </tr>
                    </table>

                    <div class="actions-container">
                        <a href="<?php echo $webLoginUrl; ?>" class="btn btn-web" target="_blank">Web Login Portal</a>
                        <a href="<?php echo $apkDownloadUrl; ?>" class="btn btn-apk" target="_blank">Download Android App</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="footer">
                    &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($companyName); ?>. All rights reserved.
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
