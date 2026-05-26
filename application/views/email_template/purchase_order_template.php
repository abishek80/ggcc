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
                    <table style="width:100%;max-width:767px;margin:0 auto; padding: 15px;">
                        <tbody>
                            <tr>
                                <td style="padding: 20px 25px 20px !important; text-align: center; border-radius: 15px; background: #fff;">
                                    <div style="text-align: center;">
                                        <img style="height: 80px; margin-bottom: 25px;" src="https://ggcc.org.in/themes/images/ggcc-logo.png" alt="GGCC & Bright">
                                    </div>
                                    <p style="text-transform: capitalize; margin-bottom: 10px; color: #000000; font-size: 18px; text-align: center;">Hi Admin,</p>
                                    <p style="margin-bottom: 25px; color: #000000; font-weight: 700; font-size: 18px; text-align: center;"><?php echo $monthText . ' ' . $year; ?> Vehicle Renewal List.</p>
                                    <p style="margin-bottom: 15px; color: #000000; font-weight: 700; font-size: 18px; text-align: center;">Insurance Renewal List</p>
                                    
                                    <?php if($insuranceRenewalList) { ?>
                                        <table style="margin-bottom: 25px !important;">
                                            <thead>
                                                <tr>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">S. No</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Zone <br> Branch</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Vehicle Name</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Vehicle Number</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Insurance Renewal Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach($insuranceRenewalList as $row) {
                                                ?>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $i++; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            <p style="text-transform: capitalize; margin-bottom: 0px;"><?php echo $row->zone; ?></p>
                                                            <p style="text-transform: capitalize; margin-bottom: 0px;"><?php echo $row->branch_name; ?></p>
                                                        </td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->vehicle_name; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->vehicle_number; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->renewal_date; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                    <?php if($insuranceRenewalList) { ?>
                                        <p style="margin-bottom: 15px; color: #000000; font-weight: 700; font-size: 18px; text-align: center;">FC Renewal List</p>
                                        <table style="margin-bottom: 25px !important;">
                                            <thead>
                                                <tr>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">S. No</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Zone <br> Branch</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Vehicle Name</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Vehicle Number</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">FC Renewal Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach($insuranceRenewalList as $row) {
                                                ?>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $i++; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            <p style="text-transform: capitalize; margin-bottom: 0px;"><?php echo $row->zone; ?></p>
                                                            <p style="text-transform: capitalize; margin-bottom: 0px;"><?php echo $row->branch_name; ?></p>
                                                        </td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->vehicle_name; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->vehicle_number; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->renewal_date; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                    <?php if($insuranceRenewalList) { ?>
                                        <p style="margin-bottom: 15px; color: #000000; font-weight: 700; font-size: 18px; text-align: center;">PUC Renewal List</p>
                                        <table style="margin-bottom: 25px !important;">
                                            <thead>
                                                <tr>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">S. No</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Zone <br> Branch</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Vehicle Name</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">Vehicle Number</th>
                                                    <th style="border: 1px solid #ddd; padding: 10px;">PUC Renewal Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    foreach($insuranceRenewalList as $row) {
                                                ?>
                                                    <tr>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $i++; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;">
                                                            <p style="text-transform: capitalize; margin-bottom: 0px;"><?php echo $row->zone; ?></p>
                                                            <p style="text-transform: capitalize; margin-bottom: 0px;"><?php echo $row->branch_name; ?></p>
                                                        </td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->vehicle_name; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->vehicle_number; ?></td>
                                                        <td style="border: 1px solid #ddd; padding: 10px;"><?php echo $row->renewal_date; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
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