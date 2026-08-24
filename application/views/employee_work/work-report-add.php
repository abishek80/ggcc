<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="workReportForm" method="post">
            <div class="card px-3 pb-3">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
                            <?php if($employeeWorkId) { ?>
                                <a href="<?php echo base_url() . 'employee/work-report/' . $employeeWorkId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url() . 'employee/work-list/' . $year . '/' . $month; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                            <?php } ?>
                            <?php } else { ?>
                                <?php if($employeeWorkId) { ?>
                                    <a href="<?php echo base_url() . 'employee/work-report/' . $employeeWorkId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url(); ?>admin" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                                <?php } ?>
                        <?php } ?>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <?php if($employeeWorkId) { ?>
                            <a href="<?php echo base_url() . 'employee/work-report/' . $employeeWorkId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url() . 'employee/work-list/' . $year . '/' . $month; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <?php } ?>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="work_report_id" id="work_report_id" type="hidden" value="<?php echo $workReportId; ?>">
                <input name="next_report_day_count" id="next_report_day_count" class="nextReportDayCount" type="hidden" value="<?php echo $nextReportDayCount; ?>">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Work <span class="text-danger">*</span></label>
                        <select name="employee_work" id="employee_work" class="selectEmployeeWork form-select select2">
                            <option value="">Select Employee Work</option>
                            <?php foreach ($employeeWorkDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $employeeWorkId) { echo 'selected'; } ?>><?php echo $row->employee_name . ' - ' . $row->work_type; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Report Date <span class="text-danger">*</span></label>
                        <input name="report_date" id="report_date" type="date" class="reportDate form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $reportDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Submission Date <span class="text-danger">*</span></label>
                        <input name="submission_date" id="submission_date" type="date" class="submissionDate form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $submissionDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Next Report Submission Date <span class="text-danger">*</span></label>
                        <input name="next_report_date" id="next_report_date" type="date" class="nextReportDate form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $nextReportDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex justify-content-between">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Report Document</label>
                            <?php if($reportDoc) { ?>
                                <a href="<?php echo base_url() . $reportDoc; ?>" target="_blank"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                        </div>
                        <input name="work_report" id="work_report" type="file" class="form-control">
                        <input type="hidden" value="<?php echo $reportDoc; ?>" name="alter_work_report">
                    </div>
                    <div class="col-md-12">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Description</label>
                        <textarea name="description" id="description" type="text" rows="5" class="form-control" placeholder="Enter the Description"><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.selectEmployeeWork').change(function () {
            var selectEmployeeWork = $(this).val();
            $('.submissionDate').val('');
            $('.nextReportDate').val('');
            if (selectEmployeeWork !== '') {
                $.ajax({
                    url: "<?php echo base_url('employee/employeeWorkTypeInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        employeeWorkId: selectEmployeeWork
                    },
                    success: function (data) {
                        nextReportDayCount = data[0].day_count;
                        
                        $('.nextReportDayCount').val(nextReportDayCount);
                    }
                });
            }
        });
        
        $('.submissionDate').on("change", function() {
            const submissionDate = new Date($(this).val());
            const nextReportDayCount = $(".nextReportDayCount").val();
            if (isNaN(submissionDate)) return;

            // Calculate months later based on nextReportDayCount
            const nextReportDate = new Date(submissionDate);
            nextReportDate.setDate(nextReportDate.getDate() + parseInt(nextReportDayCount));

            // Format the date as YYYY-MM-DD
            const formattedDate = nextReportDate.toISOString().split("T")[0];
            $(".nextReportDate").val(formattedDate);
        });
    });

    // Branch Visit Save Function
    $("#workReportForm").validate({
        rules: {
            employee_work: {
                required: true
            },
            report_date: {
                required: true
            },
            submission_date: {
                required: true
            },
            next_report_date: {
                required: true
            }
        },
        messages: {
            employee_work: {
                required: "Please Select Employee Name",
            },
            report_date: {
                required: "Please Select Reporting Date",
            },
            submission_date: {
                required: "Please Select Submission Date",
            },
            next_report_date: {
                required: "Please Select Next Reporting Date",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#workReportForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>employee/addWorkReportFormSave',
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
                            <?php if($employeeWorkId) { ?>
                                window.location.href = "<?php echo base_url() . 'employee/work-report/' . $employeeWorkId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url() . 'employee/work-list/' . $year . '/' . $month; ?>";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>