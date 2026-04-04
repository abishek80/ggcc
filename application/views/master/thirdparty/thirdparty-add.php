<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="thirdpartyForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/thirdparty-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/thirdparty-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $thirdpartyToken; ?>">
            <input name="thirdparty_id" id="thirdparty_id" type="hidden" value="<?php echo $thirdpartyId; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Thirdparty Name <span class="text-danger">*</span></label>
                    <input name="thirdparty_name" id="thirdparty_name" type="text" class="form-control generate_token" placeholder="Enter Thirdparty Name" value="<?php echo $thirdpartyName; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks <span class="text-danger">*</span></label>
                    <input name="thirdparty_remarks" id="thirdparty_remarks" type="text" class="form-control" placeholder="Enter Remarks" value="<?php echo $thirdpartyRemarks; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // PAN Save Function
    $("#thirdpartyForm").validate({
        rules: {
            thirdparty_name: {
                required: true
            },
            thirdparty_remarks: {
                required: true
            }
        },
        messages: {
            thirdparty_name: {
                required: "Please Enter Thirdparty Name",
            },
            thirdparty_remarks: {
                required: "Please Enter Thirdparty Remarks",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#thirdpartyForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/thirdpartyFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>master/thirdparty-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>