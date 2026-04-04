<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="transferForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($employeeId) { ?>
                    <a href="<?php echo base_url() . 'employee/transfer-view/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>employee/transfer-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $formTitle . $employeeName . ' Transfer'; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($employeeId) { ?>
                    <a href="<?php echo base_url() . 'employee/transfer-view/' . $employeeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>employee/transfer-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="transfer_id" id="transfer_id" type="hidden" value="<?php echo $transferId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $date ? $date : date('Y-m-d'); ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                    <select name="employee_name" id="employee_name" class="form-select selectEmployeeName select2">
                        <option value="">Select Employee Name</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($employeeId == $row->id) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Designation</label>
                    <input name="designation" id="designation" readonly type="text" class="employeeDesignation form-control" placeholder="Enter Employee Designation" value="<?php echo $designation; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">From Branch <span class="text-danger">*</span></label>
                    <select name="from_branch" id="from_branch" class="form-select select2">
                        <option value="">Select From Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($fromBranch == $row->id) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">To Branch <span class="text-danger">*</span></label>
                    <select name="to_branch" id="to_branch" class="form-select select2">
                        <option value="">Select To Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($toBranch == $row->id) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks</label>
                    <input name="remarks" id="remarks" type="text" class="form-control" placeholder="Enter Remarks" value="<?php echo $remarks; ?>">
                </div>
                <?php if($formTitle == 'Edit ') { ?>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Return Date</label>
                        <input name="return_date" id="return_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $returnDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Day Count</label>
                        <input name="day_count" id="day_count" type="text" class="form-control number-only" placeholder="Enter Day Count" value="<?php echo $dayCount; ?>">
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
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

    // Vehicle Fuel Save Function
    $("#transferForm").validate({
        rules: {
            date: {
                required: true
            },
            employee_name: {
                required: true
            },
            from_branch: {
                required: true
            },
            to_branch: {
                required: true
            }
        },
        messages: {
            date: {
                required: "Please Select Date"
            },
            employee_name: {
                required: "Please Select Employee Name"
            },
            from_branch: {
                required: "Please Select From Branch"
            },
            to_branch: {
                required: "Please Select To Branch"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#transferForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>employee/employeeTransferSave',
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
                                window.location.href = "<?php echo base_url() . 'employee/transfer-view/' . $employeeId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>employee/transfer-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>