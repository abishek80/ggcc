<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>master/app-notification-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>master/app-notification-list/custom" class="<?php echo ($activeLink == 'custom') ? 'bg-info text-white' : 'bg-white text-info'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-info border border-3 border-end-0 border-start-0 border-top-0">Custom Broadcasts</a>
            <a href="<?php echo base_url(); ?>master/app-notification-list/payslip" class="<?php echo ($activeLink == 'payslip') ? 'bg-warning text-white' : 'bg-white text-warning'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-warning border border-3 border-end-0 border-start-0 border-top-0">Payslip Alerts</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">App Notifications List</h4>
                <a href="<?php echo base_url(); ?>master/app-notification-add" class="btn btn-primary px-4 py-2 rounded text-white">Push Custom Notification</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Target User</th>
                            <th>Push Status</th>
                            <th>Sent At</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($appNotificationList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><strong><?php echo $row->title; ?></strong></td>
                            <td style="max-width: 300px;"><?php echo $row->description; ?></td>
                            <td>
                                <?php if($row->notification_type == 'payslip') { ?>
                                    <span class="badge bg-warning text-white">Payslip</span>
                                <?php } else { ?>
                                    <span class="badge bg-info text-white">Custom</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!empty($row->employee_name)) { ?>
                                    <span class="badge bg-label-primary"><?php echo $row->employee_name; ?></span>
                                <?php } else { ?>
                                    <span class="badge bg-label-dark">All Users (Broadcast)</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($row->sent_status == 1) { ?>
                                    <span class="badge bg-success text-white"><i class="bx bx-check me-1"></i> Sent</span>
                                <?php } else { ?>
                                    <span class="badge bg-secondary text-white">Pending</span>
                                <?php } ?>
                            </td>
                            <td><?php echo $row->sent_at ?: '-'; ?></td>
                            <td><?php echo $row->created_at; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
