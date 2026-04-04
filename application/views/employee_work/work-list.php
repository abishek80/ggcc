<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($workMonthList as $row) { ?>
                <a href="<?php echo base_url() . 'employee/work-list/' . $year . '/' . $row->month; ?>" class="d-block card px-5 py-2 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                    <p class="mb-0 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                </a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Employee Work List</h4>
                <a href="<?php echo base_url() . 'employee/employee-work-add/' . $year . '/' . $month; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Employee Work</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Employee Name</th>
                            <th>Work Type</th>
                            <th>Reporting Date</th>
                            <th>Reporting Doc</th>
                            <th>Description</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($employeeWorkList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->employee_name; ?></td>
                            <td><?php echo $row->work_type; ?></td>
                            <td class="date-check" data-date-check="<?php echo $row->report_date; ?>">
                                <?php
                                    if ($row->report_date != '0000-00-00' && !empty($row->report_date)) {
                                        $reportDateFormat = new DateTime($row->report_date);
                                        echo $reportDateFormat->format('d - m - Y');
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                            <td><?php if($row->report_document) { ?><a href="<?php echo base_url() . $row->report_document; ?>" class="doc-hover" target="_blank">View Work Report</a><?php } else { echo '-'; } ?></td>
                            <td><?php echo $row->description; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getWorkReportId" data-workreportid="<?php echo $row->work_report_id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'employee/work-report/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="History"> <i class="bx bx-history"></i> </a>
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

<div class="modal fade" id="view_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="modalTitle"></div>
                </div>
                <div class="row g-3 w-100">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Employee Name</label>
                        <div id="employeeName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Work Type</label>
                        <div id="workType" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Report Date</label>
                        <div id="reportDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 reportSubmissionDate d-none">
                        <label class="w-100 fw-bold text-black mb-1">Submission Date</label>
                        <div id="reportSubmissionDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 reportDoc d-none">
                        <label class="w-100 fw-bold text-black mb-1">Report Document</label>
                        <div id="reportDoc" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 reportDescription d-none">
                        <label class="w-100 fw-bold text-black mb-1">Description</label>
                        <div id="reportDescription" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12">
                        <form id="workReportForm" method="post" class="row g-3 d-none border-top mt-3 border-2">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div id="workReportId"></div>
                                <div id="reportDayCount"></div>
                                <div id="reportDateInput"></div>
                                <div id="employeeWorkId"></div>
                                <label class="w-100 fw-bold text-black mb-1">Submission Date</label>
                                <input name="submission_date" id="submission_date" type="date" class="form-control submissionDate restrict-future date-picker" placeholder="YYYY - MM - DD">
                                <label class="w-100 fw-bold text-black mb-1 mt-3">Next Reporting Date</label>
                                <input name="next_report_date" id="next_report_date" type="date" class="form-control nextReportDate date-picker" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1 fs-14px">Report Document</label>
                                <input name="work_report" id="work_report" type="file" class="form-control">
                                <input type="hidden" value="<?php echo $reportDoc; ?>" name="alter_work_report">
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <label class="w-100 fw-bold text-black mb-1 fs-14px">Description</label>
                                <textarea name="description" id="description" type="text" rows="5" class="form-control" placeholder="Enter the Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                    <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
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

    $(document).on("click", ".getWorkReportId", function(e){
        var workReportId = $(this).data("workreportid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>employee/getWorkReportDetail',
            dataType: "json",
            data: {workReportId},
            success: function (data) {
                $('#workReportId').html('<input type="hidden" id="work_report_id" name="work_report_id" value="' + data.workReportId + '">');
                $('#reportDayCount').html('<input type="hidden" id="next_report_day_count" name="next_report_day_count" class="nextReportDayCount" value="' + data.nextReportDayCount + '">');
                $('#reportDateInput').html('<input type="hidden" id="report_date" name="report_date" value="' + data.reportDate + '">');
                $('#employeeWorkId').html('<input type="hidden" id="employee_work" name="employee_work" value="' + data.employeeWorkId + '">');
                $('#modalTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.employeeName + ' / ' + data.workType + ' - Report Details</h5>');
                $('#employeeName').html(data.employeeName);
                $('#workType').html(data.workType);
                $('#reportDate').html(data.reportDate);

                if (data.submissionDate && data.submissionDate !== '0000-00-00') {
                    $('#workReportForm').addClass('d-none');
                } else {
                    $('#workReportForm').removeClass('d-none');
                }

                if (data.submissionDate && data.submissionDate !== '0000-00-00') {
                    $('#reportSubmissionDate').html(data.submissionDate);
                    $('.reportSubmissionDate').removeClass('d-none');
                } else {
                    $('.reportSubmissionDate').addClass('d-none');
                }

                if (data.description) {
                    $('#reportDescription').html(data.description);
                    $('.reportDescription').removeClass('d-none');
                } else {
                    $('.reportDescription').addClass('d-none');
                }

                if (data.reportDoc) {
                    $('#reportDoc').html('<a href="' + '<?php echo base_url(); ?>' + data.reportDoc + '" target="_blank" class="doc-hover">View Report</a>');
                    $('.reportDoc').removeClass('d-none');
                } else {
                    $('.reportDoc').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });
    
    // Estimation Save Function
    $("#workReportForm").validate({
        rules: {
            submission_date: {
                required: true
            },
            next_report_date: {
                required: true
            }
        },
        messages: {
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
                            window.location.href = "<?php echo base_url() . 'employee/work-list/' . $year . '/' . $month; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>