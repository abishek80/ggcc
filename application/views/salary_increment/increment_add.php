<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="incrementForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($employeeId) { ?>
                    <a href="<?php echo base_url() . 'employee/increment-view/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>employee/increment-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($employeeId) { ?>
                    <a href="<?php echo base_url() . 'employee/increment-view/' . $employeeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>employee/increment-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="increment_id" id="increment_id" type="hidden" value="<?php echo $incrementId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Increment Date <span class="text-danger">*</span></label>
                    <input name="increment_date" id="increment_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $incrementDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                    <select name="employee_id" id="employee_id" class="form-select selectEmployeeName select2">
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
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Actual Salary Amount <span class="text-danger">*</span></label>
                    <input name="old_salary_amount" id="old_salary_amount" type="text" readonly class="oldSalaryAmount form-control" placeholder="Enter Actual Salary Amount" value="<?php echo $oldSalaryAmount; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Increment Salary Amount</label>
                    <input name="new_salary_amount" id="new_salary_amount" type="text" class="form-control decimal" placeholder="Enter Increment Salary Amount" value="<?php echo $newSalaryAmount; ?>">
                </div>
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
                    url: "<?php echo base_url('employee/employeeSalaryInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        employeeName: selectedEmployeeName
                    },
                    success: function (data) {
                        employeeId = data[0].id;
                        employeeDesignation = data[0].employeeDesignation;
                        oldSalaryAmount = data[0].oldSalaryAmount;
                        
                        $('.employeeId').val(employeeId);
                        $('.employeeDesignation').val(employeeDesignation);
                        $('.oldSalaryAmount').val(oldSalaryAmount);
                    }
                });
            }
        });
    });

    // salary increment Save Function
    $("#incrementForm").validate({
        rules: {
            increment_date: {
                required: true
            },
            employee_id: {
                required: true
            },
            new_salary_amount: {
                required: true
            }
        },
        messages: {
            increment_date: {
                required: "Please Select Date"
            },
            employee_id: {
                required: "Please Select Employee"
            },
            new_salary_amount: {
                required: "Please Enter Increment Salary Amount"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#incrementForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>employee/incrementFormSave',
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
                                window.location.href = "<?php echo base_url() . 'employee/increment-view/' . $employeeId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>employee/increment-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>