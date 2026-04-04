<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="fileManageForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>file-manage-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>file-manage-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="file_manage_id" id="file_manage_id" type="hidden" value="<?php echo $fileManageId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">File Name <span class="text-danger">*</span></label>
                    <input name="file_name" id="file_name" type="text" class="form-control" placeholder="Enter File Name" value="<?php echo $fileName; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">URL</label>
                    <input name="file_url" id="file_url" type="text" class="form-control" placeholder="Enter URL" value="<?php echo $fileURL; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">File Doc</label>
                        <?php if($fileDoc) { ?>
                            <a href="<?php echo base_url() . $fileDoc; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="file_doc" id="file_doc" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $fileDoc; ?>" name="alter_file_doc">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks </label>
                    <input name="remarks" id="remarks" type="text" class="form-control" placeholder="Enter Remarks" value="<?php echo $remarks; ?>">
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // PAN Save Function
    $("#fileManageForm").validate({
        rules: {
            file_name: {
                required: true
            }
        },
        messages: {
            file_name: {
                required: "Please Enter File Name",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#fileManageForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>fileManageFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>file-manage-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>