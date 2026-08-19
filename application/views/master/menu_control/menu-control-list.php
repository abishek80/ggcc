<style>
    .menu-toggle-switch {
        width: 3em !important;
        height: 1.5em !important;
        cursor: pointer;
    }
</style>
<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-4 pb-3">
                <h4 class="fw-bold mb-0 text-black">Menu Control</h4>
                <a href="<?php echo base_url(); ?>master/menu_control_add" class="btn btn-primary px-4 py-2 rounded text-white">Add Menu Item</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Menu / Submenu Name</th>
                            <th>Menu Key</th>
                            <th>Parent Group</th>
                            <th class="text-center w-min-75">Show in Sidebar</th>
                            <th class="w-min-50 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($menuList as $row) { 
                                $parentName = '-';
                                if ($row->parent_key) {
                                    foreach ($menuList as $p) {
                                        if ($p->menu_key == $row->parent_key) {
                                            $parentName = $p->menu_name;
                                            break;
                                        }
                                    }
                                }
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <span class="<?php echo ($row->parent_key == NULL) ? 'fw-bold text-dark' : 'ps-3 text-secondary'; ?>">
                                    <?php echo htmlspecialchars($row->menu_name); ?>
                                </span>
                            </td>
                            <td><code><?php echo htmlspecialchars($row->menu_key); ?></code></td>
                            <td><?php echo htmlspecialchars($parentName); ?></td>
                            <td>
                                <div class="form-check form-switch justify-content-center d-flex">
                                    <input class="form-check-input menu-toggle-switch" type="checkbox" data-menukey="<?php echo htmlspecialchars($row->menu_key); ?>" <?php echo ($row->status == 'enabled') ? 'checked' : ''; ?>>
                                </div>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'master/menu_control_edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <!-- <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="menu_control" data-link="<?php echo base_url(); ?>master/menu_control" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a> -->
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
        $('.menu-toggle-switch').change(function() {
            var menuKey = $(this).data('menukey');
            var isChecked = $(this).is(':checked');
            var status = isChecked ? 'enabled' : 'disabled';
            
            $.ajax({
                url: '<?php echo base_url(); ?>master/update_menu_status',
                type: 'POST',
                dataType: 'json',
                data: {
                    menuKey: menuKey,
                    status: status
                },
                success: function(response) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '3000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut'
                    };
                    if (response.isError) {
                        toastr.error(response.message);
                    } else {
                        toastr.success(response.message);
                    }
                },
                error: function() {
                    toastr.error('An error occurred while updating the menu status.');
                }
            });
        });
    });
</script>
