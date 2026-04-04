<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="advancecashForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($employeeId) { ?>
                    <a href="<?php echo base_url() . 'loan/advancecash-view/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>loan/advancecash-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($employeeId) { ?>
                    <a href="<?php echo base_url() . 'loan/advancecash-view/' . $employeeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>loan/advancecash-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="advancecash_id" id="advancecash_id" type="hidden" value="<?php echo $advancecashId; ?>">
            <div class="row g-3">
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
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Loan Paid Date <span class="text-danger">*</span></label>
                    <input name="advancecash_date" id="advancecash_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $advancecashDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Loan Amount <span class="text-danger">*</span></label>
                    <input name="advancecash_amount" id="advancecash_amount" type="text" class="form-control number-only" placeholder="Enter Loan Amount" value="<?php echo $advancecashAmount; ?>">
                </div>
                <div class="col-lg-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks</label>
                    <textarea name="remarks" id="remarks" type="text" class="form-control" placeholder="Enter Remarks" rows="3"><?php echo $remarks; ?></textarea>
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

    // Employee Loan Save Function
    $("#advancecashForm").validate({
        rules: {
            employee_name: {
                required: true
            },
            advancecash_date: {
                required: true
            },
            advancecash_amount: {
                required: true
            }
        },
        messages: {
            employee_name: {
                required: "Please Select Employee Name"
            },
            advancecash_date: {
                required: "Please Select Loan Taken Date"
            },
            advancecash_amount: {
                required: "Please Enter Loan Taken Amount"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#advancecashForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>loan/advancecashFormSave',
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
                                window.location.href = "<?php echo base_url() . 'loan/advancecash-view/' . $employeeId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>loan/advancecash-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>