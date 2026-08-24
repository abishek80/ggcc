<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="permissionForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/permission-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>admin/permission-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="permission_id" id="permission_id" type="hidden" value="<?php echo $permissionId; ?>">
            <input name="token" id="token" type="hidden" value="<?php echo $loginToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Login Code <span class="text-danger">*</span></label>
                    <input name="login_code" id="login_code" type="text" class="form-control generate_token" placeholder="Enter Login Code" value="<?php echo $loginCode; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Name <span class="text-danger">*</span></label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter Your Name" value="<?php echo $name; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Mobile Number <span class="text-danger">*</span></label>
                    <input name="mobile_number" id="mobile_number" type="text" class="form-control number-only" placeholder="Enter Mobile Number" value="<?php echo $mobileNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Login Password <span class="text-danger">*</span></label>
                    <?php if(!empty($password)) { ?>
                        <input name="password" id="password" type="password" readonly class="form-control" placeholder="Enter Login Password" value="<?php echo $password?>">
                    <?php } else { ?>
                        <input name="password" id="password" type="text" class="form-control" placeholder="Enter Login Password" value="<?php echo $password?>">
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Login Permission <span class="text-danger">*</span></label>
                    <select name="permission[]" id="permission" class="form-select select2" multiple>
                        <option value="employee" <?php if (isset($permissions) && in_array('employee', $permissions)) { echo 'selected'; } ?>>Employee</option>
                        <option value="attendance_management" <?php if (isset($permissions) && in_array('attendance_management', $permissions)) { echo 'selected'; } ?>>Attendance Management</option>
                        <option value="complaint_management" <?php if (isset($permissions) && in_array('complaint_management', $permissions)) { echo 'selected'; } ?>>Complaint Management</option>
                        <option value="vehicle_management" <?php if (isset($permissions) && in_array('vehicle_management', $permissions)) { echo 'selected'; } ?>>Vehicle Management</option>
                        <option value="stock_management" <?php if (isset($permissions) && in_array('stock_management', $permissions)) { echo 'selected'; } ?>>Stock Management</option>
                        <option value="purchase_management" <?php if (isset($permissions) && in_array('purchase_management', $permissions)) { echo 'selected'; } ?>>Purchase Order Management</option>
                        <option value="account_management" <?php if (isset($permissions) && in_array('account_management', $permissions)) { echo 'selected'; } ?>>Account Management</option>
                        <option value="employee_management" <?php if (isset($permissions) && in_array('employee_management', $permissions)) { echo 'selected'; } ?>>Employee Management</option>
                        <option value="admin" <?php if (isset($permissions) && in_array('admin', $permissions)) { echo 'selected'; } ?>>Admin</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Login Permission Save Function
    $("#permissionForm").validate({
        rules: {
            login_code: {
                required: true
            },
            name: {
                required: true
            },
            mobile_number: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            password: {
                required: true
            },
            permission: {
                required: true
            }
        },
        messages: {
            login_code: {
                required: "Please Enter Login Code"
            },
            name: {
                required: "Please Enter Your Name"
            },
            mobile_number: {
                required: "Please Enter Mobile Number"
            },
            password: {
                required: "Please Enter Login Password"
            },
            permission: {
                required: "Please Select Permission"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#permissionForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/permissionFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (data) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': false,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '5000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut',
                    }
                    $(".loader").hide();
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>admin/permission-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>