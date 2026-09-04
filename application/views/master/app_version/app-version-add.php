<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="appVersionForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/app-version-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/app-version-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            
            <input name="app_version_id" id="app_version_id" type="hidden" value="<?php echo $appVersionId; ?>">
            
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Platform <span class="text-danger">*</span></label>
                    <select name="platform" id="platform" class="form-select">
                        <option value="android" <?php if($platform == 'android') { echo 'selected'; } ?>>Android</option>
                        <option value="ios" <?php if($platform == 'ios') { echo 'selected'; } ?>>iOS</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Latest Version <span class="text-danger">*</span></label>
                    <input name="latest_version" id="latest_version" type="text" class="form-control" placeholder="Enter Version (e.g. 1.0.0)" value="<?php echo $latestVersion; ?>">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Force Update <span class="text-danger">*</span></label>
                    <select name="is_force" id="is_force" class="form-select">
                        <option value="0" <?php if($isForce == '0') { echo 'selected'; } ?>>No (Dismissible/Soft)</option>
                        <option value="1" <?php if($isForce == '1') { echo 'selected'; } ?>>Yes (Force/Non-dismissible)</option>
                    </select>
                </div>

                <div class="col-lg-8 col-md-12">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Update Redirection URL <span class="text-danger">*</span></label>
                    <input name="update_url" id="update_url" type="url" class="form-control" placeholder="Enter App Store / Play Store or APK URL" value="<?php echo $updateUrl; ?>">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>

                <div class="col-lg-12">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Release Notes / Description</label>
                    <textarea name="release_notes" id="release_notes" rows="4" class="form-control" placeholder="Enter Release Notes"><?php echo $releaseNotes; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $("#appVersionForm").validate({
        rules: {
            latest_version: {
                required: true
            },
            update_url: {
                required: true,
                url: true
            }
        },
        messages: {
            latest_version: {
                required: "Please Enter Latest Version"
            },
            update_url: {
                required: "Please Enter Update Redirection URL",
                url: "Please Enter a Valid URL"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#appVersionForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/appVersionFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>master/app-version-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>
