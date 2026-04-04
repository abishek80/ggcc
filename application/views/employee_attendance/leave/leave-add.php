<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="employeeLeaveForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($employeeId) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>attendance/leave-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($employeeId) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>attendance/leave-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="leave_id" id="leave_id" type="hidden" value="<?php echo $leaveId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <select name="branch_id" id="branch_id" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $branchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                    <select name="employee_name" id="employee_name" class="form-select select2 selectEmployeeName">
                        <option value="">Select Employee Name</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($employeeId == $row->id) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Designation</label>
                    <input name="designation" id="designation" readonly type="text" class="employeeDesignation form-control" placeholder="Enter Employee Designation" value="<?php echo $designation; ?>">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Start Date <span class="text-danger">*</span></label>
                    <input name="leave_date" id="leave_date" type="date" class="form-control date-picker leaveDate" placeholder="YYYY - MM - DD" value="<?php echo $leaveDate; ?>">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">End Date <span class="text-danger">*</span></label>
                    <input name="joining_date" id="joining_date" type="date" class="form-control date-picker joiningDate" placeholder="YYYY - MM - DD" value="<?php echo $joiningDate; ?>">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Leave Count <span class="text-danger">*</span></label>
                    <input name="leave_count" id="leave_count" type="text" readonly class="form-control number-only leaveCount" placeholder="Enter Leave Count" value="<?php echo $leaveCount; ?>">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Reason <span class="text-danger">*</span></label>
                    <input name="reason" id="reason" type="text" class="form-control" placeholder="Enter Reason" value="<?php echo $reason; ?>">
                </div>
                <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                    <div class="col-12">
                        <div class="border-top my-3"></div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Replacement Employee Name</label>
                        <select name="replacement_name" id="replacement_name" class="form-select select2">
                            <option value="">Select Employee Name</option>
                            <?php foreach ($employeeDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($replacementName == $row->id) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Actual Joining Date </label>
                        <input name="return_joining_date" id="return_joining_date" type="date" class="form-control date-picker rejoiningDate" placeholder="YYYY - MM - DD" value="<?php echo $returnJoiningDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Extra Leave Count </label>
                        <input name="extra_leave_count" id="extra_leave_count" type="text" class="form-control number-only" placeholder="Enter Extra Leave Count" value="<?php echo $extraLeaveCount; ?>">
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Join Status</label>
                        <select name="join_status" id="join_status" class="form-select">
                            <option value="not_join" <?php if($joinStatus == 'not_join') { echo 'selected'; } ?>>Not Join</option>
                            <option value="join" <?php if($joinStatus == 'join') { echo 'selected'; } ?>>Join</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="not_approved" <?php if($status == 'not_approved') { echo 'selected'; } ?>>Not Approved</option>
                            <option value="approved" <?php if($status == 'approved') { echo 'selected'; } ?>>Approved</option>
                        </select>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
</section>

<script>
    $('.zone').change(function () {
        var selectedOutletZone = $(this).val();
        if (selectedOutletZone !== '') {
            $.ajax({
                url: "<?php echo base_url('master/selectBranchDropdown'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    zone: selectedOutletZone
                },
                success: function (data) {
                    var selectElement = document.querySelector('.branch');
                    selectElement.innerHTML = '<option value="">Select Branch</option>';
                    data.forEach(function (item) {
                        var option = document.createElement('option');
                        option.textContent = item.branch;
                        option.value = item.id;
                        selectElement.appendChild(option);
                    });
                }
            });
        }
    });

    $(document).ready(function () {
        // Clear joining date when leave date changes
        $('.leaveDate').change(function () {
            $('.joiningDate').val(''); // Clear the joining date input
            $('.leaveCount').val(''); // Reset leave count
        });

        $('.joiningDate').change(function () {
            var leaveDate = $('.leaveDate').val();
            var joiningDate = $(this).val();

            if (leaveDate && joiningDate) {
                // Convert string dates to Date objects
                var startDate = new Date(leaveDate);
                var endDate = new Date(joiningDate);

                // Calculate the difference in days
                var timeDifference = endDate - startDate;
                var dayDifference = timeDifference / (1000 * 60 * 60 * 24); // Convert milliseconds to days

                if (dayDifference >= 0) {
                    $('.leaveCount').val(dayDifference + 1); // Always add 1 extra day
                } else {
                    $('.leaveCount').val('Invalid Date'); // Handle incorrect date selections
                }
            } else {
                $('.leaveCount').val('');
            }
        });

        
        $('.selectEmployeeName').change(function () {
            var selectedEmployeeName = $(this).val();
            if (selectedEmployeeName !== '') {
                $.ajax({
                    url: "<?php echo base_url('employee/employeeInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        employeeName: selectedEmployeeName
                    },
                    success: function (data) {
                        employeeId = data[0].id;
                        employeeDesignation = data[0].designation;
                        $('.employeeId').val(employeeId);
                        $('.employeeDesignation').val(employeeDesignation);
                    }
                });
            }
        });
    });

    // PAN Save Function
    $("#employeeLeaveForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch_id: {
                required: true
            },
            employee_name: {
                required: true
            },
            leave_date: {
                required: true
            },
            joining_date: {
                required: true
            },
            leave_count: {
                required: true
            },
            reason: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Zone",
            },
            branch_id: {
                required: "Please Select Branch",
            },
            employee_name: {
                required: "Please Enter Employee Name",
            },
            leave_date: {
                required: "Please Select Leave Date",
            },
            joining_date: {
                required: "Please Select Joining Date",
            },
            leave_count: {
                required: "Please Enter Leave Count",
            },
            reason: {
                required: "Please Enter Reason",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#employeeLeaveForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>attendance/employeeLeaveFormSave',
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
                            <?php if($employeeId) { ?>
                                window.location.href = "<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>attendance/leave-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>