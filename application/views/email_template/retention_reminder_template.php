<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Retention Money Reminder</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 1200px; margin: auto; }
        h2 { color: #333333; }
        .branch-header { background-color: #198754; color: #ffffff; padding: 10px; margin-top: 20px; border-radius: 4px; text-transform: capitalize; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 12px; }
        th, td { border: 1px solid #dddddd; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #f8f9fa; color: #333; }
        .text-right { text-align: right; }
        .text-danger { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Retention Money Reminder - <?php echo $monthText . " " . $year; ?></h2>
        <p>Hello,</p>
        <p>Please find the consolidated list of all pending (not received) retention money grouped by branch, which are due up to the end of this month.</p>

        <?php if (!empty($groupedRetentions)) { ?>
            <?php foreach ($groupedRetentions as $branch => $retentions) { ?>
                <h3 class="branch-header"><?php echo $branch ? $branch : 'Unassigned Branch'; ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 12%;">Company</th>
                            <th style="width: 16%;">PO Title</th>
                            <th style="width: 11%;">PO No / PO Date</th>
                            <th style="width: 11%;">Est Date / Est No</th>
                            <th style="width: 10%;">Retention Date</th>
                            <th style="width: 8%; text-align: right;">Retention Amt</th>
                            <th style="width: 8%; text-align: right;">Received Amt</th>
                            <th style="width: 8%; text-align: right;">Hold Amt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($retentions as $item) { ?>
                            <tr>
                                <?php 
                                    $isOverdue = (strtotime($item->retention_date) < strtotime(date('Y-m-01')));
                                ?>
                                <td class="text-uppercase"><?php echo $item->company_name; ?></td>
                                <td><?php echo $item->po_title; ?></td>
                                <td>
                                    <strong><?php echo $item->purchase_order_no; ?></strong><br>
                                    <?php echo $item->po_dateFormat; ?>
                                </td>
                                <td>
                                    <?php echo $item->estimation_dateFormat; ?><br>
                                    <strong><?php echo $item->estimation_number; ?></strong>
                                </td>
                                <td class="<?php echo $isOverdue ? 'text-danger' : ''; ?>">
                                    <?php echo $item->retention_dateFormat; ?>
                                    <?php if($isOverdue) echo '<br><small>(Overdue)</small>'; ?>
                                </td>
                                <td class="text-right"><?php echo number_format((float)$item->retention_amount, 2); ?></td>
                                <td class="text-right"><?php echo number_format((float)$item->received_amount, 2); ?></td>
                                <td class="text-right"><?php echo number_format((float)$item->hold_amount, 2); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        <?php } else { ?>
            <p>No pending retention money found for this month.</p>
        <?php } ?>

        <p style="margin-top: 30px; font-size: 12px; color: #777;">This is an automated email from the GGCC System.</p>
    </div>
</body>
</html>
