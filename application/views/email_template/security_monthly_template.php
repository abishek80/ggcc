<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Upcoming Monthly Security Amount Reminder</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 1000px; margin: auto; }
        h2 { color: #333333; }
        .branch-header { background-color: #0d6efd; color: #ffffff; padding: 10px; margin-top: 20px; border-radius: 4px; text-transform: capitalize; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 12px; }
        th, td { border: 1px solid #dddddd; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #f8f9fa; color: #333; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upcoming Monthly Security Amount Reminder - <?php echo $monthText . " " . $year; ?></h2>
        <p>Hello,</p>
        <p>Below is the list of pending security amounts that are due in <strong><?php echo $monthText; ?></strong>.</p>

        <?php if (!empty($groupedSecurity)) { ?>
            <?php foreach ($groupedSecurity as $branch => $items) { ?>
                <h3 class="branch-header"><?php echo $branch ? $branch : 'Unassigned Branch'; ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 15%;">Company</th>
                            <th style="width: 25%;">PO Title</th>
                            <th style="width: 15%;">PO No / PO Date</th>
                            <th style="width: 15%;">Validity End Date</th>
                            <th style="width: 15%;">Security Due Date</th>
                            <th style="width: 15%; text-align: right;">Security Amt (&#8377;)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) { ?>
                            <tr>
                                <td class="text-uppercase"><?php echo $item->company_name; ?></td>
                                <td><?php echo $item->po_title; ?></td>
                                <td>
                                    <strong><?php echo $item->purchase_order_no; ?></strong><br>
                                    <?php echo $item->po_dateFormat; ?>
                                </td>
                                <td><?php echo $item->validity_endFormat; ?></td>
                                <td><strong><?php echo $item->security_due_dateFormat; ?></strong></td>
                                <td class="text-right"><?php echo number_format((float)$item->security_amount, 2); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        <?php } else { ?>
            <p>No pending security amounts found for <?php echo $monthText; ?>.</p>
        <?php } ?>

        <p style="margin-top: 30px; font-size: 12px; color: #777;">This is an automated email from the GGCC System.</p>
    </div>
</body>
</html>
