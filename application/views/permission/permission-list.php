<?php
if (!function_exists('get_plain_password')) {
    function get_plain_password($hash) {
        $hashLower = strtolower(trim($hash));
        static $passMap = null;
        if ($passMap === null) {
            $passMap = [
                'b66dc44cd9882859d84670604ae276e6' => '8989',
                '81dc9bdb52d04dc20036dbd8313ed055' => '1234',
                '202cb962ac59075b964b07152d234b70' => '123'
            ];
            $filePath = FCPATH . 'login_passwords.txt';
            if (file_exists($filePath)) {
                $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    $parts = array_map('trim', explode('-', $line));
                    if (count($parts) >= 3) {
                        $plainPass = $parts[1];
                        $h = strtolower($parts[2]);
                        if (!empty($plainPass) && !empty($h)) {
                            $passMap[$h] = $plainPass;
                        }
                    }
                }
            }
        }

        if (isset($passMap[$hashLower])) {
            return $passMap[$hashLower];
        }

        // Fast numeric PIN lookup (0000 - 99999)
        for ($i = 0; $i <= 99999; $i++) {
            $str = (string)$i;
            if (md5($str) === $hashLower) {
                $passMap[$hashLower] = $str;
                return $str;
            }
            $padded = sprintf("%04d", $i);
            if (md5($padded) === $hashLower) {
                $passMap[$hashLower] = $padded;
                return $padded;
            }
        }

        return $hash;
    }
}
?>
<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>admin/permission-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>admin/permission-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>admin/permission-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Login Permission List</h4>
                <!-- <a href="<?php echo base_url(); ?>admin/permission-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Permission</a> -->
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Login Code <br> Name</th>
                            <th>Mobile Number</th>
                            <th>Password</th>
                            <th>Permission</th>
                            <th>status</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($permissionList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->login_code; ?></p>
                                <p class="mb-0"><?php echo $row->employee_name; ?></p>
                            </td>
                            <td>
                                <a href="tel:<?php echo $row->mobile_number; ?>" class="a-hover"><?php echo $row->mobile_number; ?></a>
                            </td>
                            <td><?php echo !empty($row->plain_password) ? htmlspecialchars($row->plain_password) : get_plain_password($row->password); ?></td>
                            <td>
                                <?php 
                                    $permissions = json_decode($row->permission);
                                    echo implode("<br>", array_map(function($permission) {
                                        return str_replace('_', ' ', $permission); // Replace underscores with spaces
                                    }, $permissions));
                                ?>
                            </td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="login_permission" data-link="<?php echo base_url(); ?>admin/permission-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } elseif($row->status == 'inactive') { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="login_permission" data-link="<?php echo base_url(); ?>admin/permission-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" data-id="<?php echo $row->id; ?>" data-name="<?php echo htmlspecialchars($row->employee_name); ?>" class="box-hover changePassModalBtn" data-toggle="tooltip" data-placement="top" title="Change Password"> <i class="bx bx-key"></i> </a>
                                    <a href="<?php echo base_url() . 'admin/permission-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="login_permission" data-link="<?php echo base_url(); ?>admin/permission-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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

<!-- Modal for Changing Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black fs-4"></i>
                        </a>
                    </div>
                    <h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize" id="changePasswordModalLabel">Change Password</h5>
                </div>
                <form id="changePasswordForm">
                    <input type="hidden" name="permission_id" id="modal_permission_id" value="">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="modal_new_password" class="w-100 fw-bold text-black mb-1">New Password <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="modal_new_password" name="new_password" placeholder="Enter New Password">
                        </div>
                        <div class="col-md-6">
                            <label for="modal_confirm_password" class="w-100 fw-bold text-black mb-1">Confirm Password <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="modal_confirm_password" name="confirm_password" placeholder="Confirm New Password">
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-flex gap-3 justify-content-end align-items-center">
                                <button type="button" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white" id="savePasswordBtn">Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    function clearValidationErrors() {
        $('#changePasswordForm').find('.error-msg').remove();
        $('#modal_new_password, #modal_confirm_password').removeClass('border-danger is-invalid error');
    }

    function showFieldError($input, msg) {
        $input.addClass('border-danger is-invalid error');
        $input.after('<label class="error error-msg text-danger mt-1 fs-13px d-block">' + msg + '</label>');
    }

    // Clear error as user types
    $(document).on('input', '#modal_new_password, #modal_confirm_password', function() {
        $(this).removeClass('border-danger is-invalid error');
        $(this).next('.error-msg').remove();
    });

    $(document).on('click', '.changePassModalBtn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        
        $('#modal_permission_id').val(id);
        $('#changePasswordModalLabel').text('Change Password - ' + name);
        $('#modal_new_password').val('');
        $('#modal_confirm_password').val('');
        
        clearValidationErrors();

        $('#changePasswordModal').modal('show');
    });

    $('#changePasswordForm').on('submit', function(e) {
        e.preventDefault();
        clearValidationErrors();

        var permissionId = $('#modal_permission_id').val();
        var newPassword = $('#modal_new_password').val().trim();
        var confirmPassword = $('#modal_confirm_password').val().trim();
        var hasError = false;

        if (newPassword === '') {
            showFieldError($('#modal_new_password'), 'Please Enter New Password');
            hasError = true;
        }

        if (confirmPassword === '') {
            showFieldError($('#modal_confirm_password'), 'Please Enter Confirm Password');
            hasError = true;
        } else if (newPassword !== '' && newPassword !== confirmPassword) {
            showFieldError($('#modal_confirm_password'), 'New Password and Confirm Password Do Not Match');
            hasError = true;
        }

        if (hasError) {
            return false;
        }

        $('#savePasswordBtn').prop('disabled', true).text('Updating...');

        $.ajax({
            url: '<?php echo base_url(); ?>admin/update-permission-password',
            type: 'POST',
            data: {
                permission_id: permissionId,
                new_password: newPassword,
                confirm_password: confirmPassword
            },
            dataType: 'json',
            success: function(response) {
                $('#savePasswordBtn').prop('disabled', false).text('Update Password');
                toastr.options = {
                    'closeButton': true,
                    'positionClass': 'toast-top-right',
                    'timeOut': '3000'
                };
                if (response.isError === false) {
                    toastr.success(response.message || 'Password updated successfully!');
                    setTimeout(function() {
                        $('#changePasswordModal').modal('hide');
                        location.reload();
                    }, 1200);
                } else {
                    toastr.error(response.message || 'Failed to update password.');
                }
            },
            error: function() {
                $('#savePasswordBtn').prop('disabled', false).text('Update Password');
                toastr.error('An error occurred. Please try again.');
            }
        });
    });
});
</script>