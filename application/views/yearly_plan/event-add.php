<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="yearlyPlanForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($year && $month) { ?>
                        <a href="<?php echo base_url() . 'admin/event-view/' . $year . '/' . $month; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url() . 'admin/event-list/' . $year; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($year && $month) { ?>
                        <a href="<?php echo base_url() . 'admin/event-view/' . $year . '/' . $month; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url() . 'admin/event-list/' . $year; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="event_id" id="event_id" type="hidden" value="<?php echo $eventId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $date; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Title <span class="text-danger">*</span></label>
                    <input name="title" id="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $title; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select">
                        <option value="not_completed" <?php if($status == 'not_completed') { echo 'selected'; } ?>>Not Completed</option>
                        <option value="completed" <?php if($status == 'completed') { echo 'selected'; } ?>>Completed</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Plan Type <span class="text-danger">*</span></label>
                    <select name="plan_type" id="plan_type" class="form-select">
                        <option value="once" <?php if(isset($plan_type) && $plan_type == 'once') { echo 'selected'; } ?>>Once</option>
                        <option value="repeated" <?php if(isset($plan_type) && $plan_type == 'repeated') { echo 'selected'; } ?>>Repeated</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Description</label>
                    <textarea name="description" id="description" type="text" class="form-control" placeholder="Description" rows="5"><?php echo $description; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Save Yearly Plan Form
    $("#yearlyPlanForm").validate({
        rules: {
            year: {
                required: true
            },
            month: {
                required: true
            },
            date: {
                required: true
            },
            title: {
                required: true
            },
            plan_type: {
                required: true
            }
        },
        messages: {
            year: {
                required: "Please Select Year",
            },
            month: {
                required: "Please Select Month",
            },
            date: {
                required: "Please Select Date",
            },
            title: {
                required: "Please Enter Title",
            },
            plan_type: {
                required: "Please Select Plan Type",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#yearlyPlanForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>admin/yearlyPlanFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function(data) {
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
                            <?php if($year && $month) { ?>
                                window.location.href = "<?php echo base_url() . 'admin/event-view/' . $year . '/' . $month; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url() . 'admin/event-list/' . $year; ?>";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>