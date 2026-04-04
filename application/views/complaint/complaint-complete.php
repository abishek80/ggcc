<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="complaintCompletionForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list/inprogress" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list/inprogress" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input type="hidden" name="complaint_id" id="complaint_id" value="<?php echo $complaintId; ?>"/>
            <input type="hidden" name="outlet_id" id="outlet_id" value="<?php echo $outletId; ?>"/>
            <div class="row g-3">
                <div class="col-lg-6 col-md-6">
                    <div class="mb-3">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks <span class="text-danger">*</span></label>
                        <input id="remarks" name="remarks" type="text" class="form-control" placeholder="Enter Remarks"/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Upload Job Completion Letter</label>
                        <?php if($jobReport) { ?>
                            <a href="<?php echo base_url() . $jobReport; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="job_report" id="job_report" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $jobReport; ?>" name="alter_job_report">
                </div>
                <div class="col-lg-6">
                    <div>
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Upload Job Report</label>
                        <div class="job-report-letter"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 <?php if($workType === 'earth_renewal') { echo 'd-block'; } else { echo 'd-none'; } ?>">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Earthing Report</label>
                        <?php if($earthingReport) { ?>
                            <a href="<?php echo base_url() . $earthingReport; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input id="earthing_report" name="earthing_report" type="file" class="form-control"/>
                    <input type="hidden" value="<?php echo $earthingReport; ?>" name="alter_earthing_report">
                </div>
                <div class="col-lg-4 col-md-4 <?php if($workType === 'earth_renewal') { echo 'd-block'; } else { echo 'd-none'; } ?>">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Earth Checking Date</label>
                    <input id="checking_date" name="checking_date" type="date" class="form-control date-picker testingDate" placeholder="YYYY - MM - DD"/>
                </div>
                <div class="col-lg-4 col-md-4 <?php if($workType === 'earth_renewal') { echo 'd-block'; } else { echo 'd-none'; } ?>">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Earth Renewal Date</label>
                    <input id="renewal_date" name="renewal_date" type="date" class="form-control date-picker nextRenewalDate" placeholder="YYYY - MM - DD"/>
                </div>
                <div class="col-lg-6">
                    <div>
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Upload Before Image</label>
                        <div class="before-images"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Upload After Image</label>
                        <div class="after-images"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $('.before-images').beforeImageUploader();
    $('.after-images').afterImageUploader();
    $('.job-report-letter').jobReportUploader();

    $("#complaintCompletionForm").validate({
        rules: {
            remarks: {
                required: true
            }
        },
        messages: {
            remarks: {
                required: "Please Enter Remarks"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#complaintCompletionForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>complaint/saveComplaintReport',
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
                            window.location.href = "<?php echo base_url(); ?>complaint/complaint-list/completed";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>