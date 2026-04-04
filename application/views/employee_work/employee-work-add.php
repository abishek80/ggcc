<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="employeeWorkForm" method="post">
            <div class="card px-3 pb-3">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url(); ?>employee/work-list/<?php echo $year . '/' . $month?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>employee/work-list/<?php echo $year . '/' . $month?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="employee_work_id" id="employee_work_id" type="hidden" value="<?php echo $employeeWorkId; ?>">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                        <select name="employee_id" id="employee_id" class="form-select select2">
                            <option value="">Select Employee</option>
                            <?php foreach ($employeeDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $employeeId) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Type <span class="text-danger">*</span></label>
                        <select name="work_type" id="work_type" class="form-select select2">
                            <option value="">Select Work Type</option>
                            <?php foreach ($workTypeDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $workTypeId) { echo 'selected'; } ?>><?php echo $row->work_type; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Reporting Date <span class="text-danger">*</span></label>
                        <input name="reporting_date" id="reporting_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $reportingDate; ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Branch Visit Save Function
    $("#employeeWorkForm").validate({
        rules: {
            employee_id: {
                required: true
            },
            work_type: {
                required: true
            },
            reporting_date: {
                required: true
            }
        },
        messages: {
            employee_id: {
                required: "Please Select Employee",
            },
            work_type: {
                required: "Please Select Work Type",
            },
            reporting_date: {
                required: "Please Select Reporting Date",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#employeeWorkForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>employee/addEmployeeWorkFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>employee/work-list/<?php echo $year . '/' . $month?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>