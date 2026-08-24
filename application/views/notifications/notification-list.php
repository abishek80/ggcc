<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Notifications</h4>
                <a href="javascript:void(0);" class="btn btn-primary px-4 py-2 rounded text-white" id="markAllReadBtn">Mark All as Read</a>
            </div>
            
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date & Time</th>
                            <th>Module</th>
                            <th>Alert Type</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th class="w-min-120">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            foreach($notifications as $row) { 
                                $statusClass = $row->is_read ? 'text-success' : 'text-danger fw-bold';
                                $statusText = $row->is_read ? 'Read' : 'Unread';
                        ?>
                            <tr>
                                <td><?= date('d-m-Y h:i A', strtotime($row->created_at)) ?></td>
                                <td class="text-capitalize"><?= str_replace('_', ' ', $row->module_type) ?></td>
                                <td class="text-capitalize"><?= str_replace('_', ' ', $row->notification_type) ?></td>
                                <td class="text-start"><?= $row->message ?></td>
                                <td class="<?= $statusClass ?>"><?= $statusText ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <?php if ($row->module_type == 'purchase_order') { ?>
                                            <a href="<?= base_url('purchase/po-detail/' . $row->module_id) ?>" class="btn btn-sm btn-info text-white">View</a>
                                        <?php } else if ($row->module_type == 'vehicle') { ?>
                                            <a href="<?= base_url('vehicle/vehicle-edit/' . $row->module_id) ?>" class="btn btn-sm btn-info text-white">View</a>
                                        <?php } else if ($row->module_type == 'yearly_plan') { ?>
                                            <a href="<?= base_url('admin/event-edit/' . $row->module_id) ?>" class="btn btn-sm btn-info text-white">View</a>
                                        <?php } else if ($row->module_type == 'task') { ?>
                                            <a href="<?= base_url('employee/task-list/' . $row->module_id) ?>" class="btn btn-sm btn-info text-white">View</a>
                                        <?php } else { ?>
                                            <button class="btn btn-sm btn-secondary" disabled>View</button>
                                        <?php } ?>
                                        
                                        <?php if (!$row->is_read) { ?>
                                            <button class="btn btn-sm btn-success mark-read-btn" data-id="<?= $row->id ?>">Mark Read</button>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('.mark-read-btn').click(function() {
        var id = $(this).data('id');
        var btn = $(this);
        $.ajax({
            url: "<?= base_url('notification/mark_read_ajax') ?>",
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    btn.closest('tr').removeClass('table-warning');
                    btn.closest('td').prev().removeClass('text-danger fw-bold').addClass('text-success').text('Read');
                    btn.remove();
                }
            }
        });
    });

    $('#markAllReadBtn').click(function() {
        $.ajax({
            url: "<?= base_url('notification/mark_read_ajax') ?>",
            type: 'POST',
            data: { id: null }, // null marks all as read
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    location.reload();
                }
            }
        });
    });
});
</script>
