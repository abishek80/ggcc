<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yearly Plan Digest</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 800px; margin: auto; }
        h2 { color: #333333; }
        .month-header { background-color: #0d6efd; color: #ffffff; padding: 10px; margin-top: 20px; border-radius: 4px; text-transform: capitalize;}
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #dddddd; padding: 10px; text-align: left; }
        th { background-color: #f8f9fa; color: #333; }
        .badge { display: inline-block; padding: 0.25em 0.4em; font-size: 75%; font-weight: 700; line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 0.25rem; }
        .badge-info { background-color: #17a2b8; color: #fff; }
        .badge-secondary { background-color: #6c757d; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Overall Active Yearly Plans - <?php echo $year; ?></h2>
        <p>Hello,</p>
        <p>Please find the consolidated list of all active yearly plans for the year <?php echo $year; ?> below.</p>

        <?php if (!empty($groupedPlans)) { ?>
            <?php foreach ($groupedPlans as $month => $events) { ?>
                <h3 class="month-header"><?php echo $month; ?></h3>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 15%;">Date</th>
                            <th style="width: 30%;">Title</th>
                            <th style="width: 40%;">Description</th>
                            <th style="width: 15%;">Plan Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event) { ?>
                            <tr>
                                <td><?php echo $event->dateFormat; ?></td>
                                <td><?php echo $event->title; ?></td>
                                <td><?php echo $event->description; ?></td>
                                <td>
                                    <?php if ($event->plan_type == 'repeated') { ?>
                                        <span class="badge badge-info">Repeated</span>
                                    <?php } else { ?>
                                        <span class="badge badge-secondary">Once</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        <?php } else { ?>
            <p>No active plans found for this year.</p>
        <?php } ?>

        <p style="margin-top: 30px; font-size: 12px; color: #777;">This is an automated email from the GGCC System.</p>
    </div>
</body>
</html>
