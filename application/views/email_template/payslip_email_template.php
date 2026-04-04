<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
        
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color:#8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important;  background-color: #f5f6fa;">
	<center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
               <td style="padding: 40px 0;">
                    <table style="width:100%;max-width:620px;margin:0 auto; padding: 15px;">
                        <tbody>
                            <tr>
                                <td style="padding: 20px 25px 20px !important; text-align: center; border-radius: 15px; background: #fff;">
                                    <div style="text-align: center;">
                                        <img style="height: 80px; margin-bottom: 25px;" src="https://ggcc.org.in/themes/images/ggcc-logo.png" alt="GGCC & Bright">
                                    </div>
                                    <p style="text-transform: capitalize; margin-bottom: 10px; color: #000000; font-size: 18px; text-align: center;">Hi <?php echo $employeeName; ?>,</p>
                                    <p style="margin-bottom: 15px; color: #000000; font-weight: 700; font-size: 18px; text-align: center;">Your payslip for <?php echo $month . ' ' . $year; ?> is now available.</p>
                                    <p style="padding-bottom: 10px; color: #000000; text-align: center;">To download your payslip and view your loan details, please log in to the portal.</p>
                                    <p style="padding-bottom: 10px; color: #000000; text-align: center;">Click the button below.</p>
                                    <a style="display: block; background-color: #696cff; padding: 10px 20px; color: #ffffff; text-align: center;" target="_blank" href="https://ggcc.org.in/">Click Here</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-size: 14px; color: #000000ff; padding: 20px 0;">
                                    <?= date('Y'); ?> &copy; GGCC & Bright. All rights reserved.
                                </td>
                            </tr>
                        </tbody>
                    </table>
               </td>
            </tr>
        </table>
    </center>
</body>
</html>