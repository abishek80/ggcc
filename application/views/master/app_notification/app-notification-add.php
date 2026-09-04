<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="appNotificationForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/app-notification-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/app-notification-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save & Push Notification</button>
                </div>
            </div>
            
            <div class="row g-3">
                <div class="col-lg-12">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Notification Title <span class="text-danger">*</span></label>
                    <input name="title" id="title" type="text" class="form-control" placeholder="Enter Notification Title (e.g. Office Holiday Notice)" required>
                </div>

                <div class="col-lg-12">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Notification Description / Message <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter Notification Message details to push to all mobile app users..." required></textarea>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $("#appNotificationForm").validate({
        rules: {
            title: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Please Enter Notification Title"
            },
            description: {
                required: "Please Enter Notification Message / Description"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#appNotificationForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/appNotificationFormSave',
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
                    $(".loader").hide();
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
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>master/app-notification-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>
