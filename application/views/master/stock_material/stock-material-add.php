<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="materialForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/material-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/material-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $materialToken; ?>">
            <input name="material_id" id="material_id" type="hidden" value="<?php echo $materialId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Code <span class="text-danger">*</span></label>
                    <input name="material_code" id="material_code" type="text" class="form-control" placeholder="Enter Material Code" value="<?php echo $materialCode; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Name <span class="text-danger">*</span></label>
                    <input name="material_name" id="material_name" type="text" class="form-control generate_token" placeholder="Enter Material Name" value="<?php echo $materialName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Category <span class="text-danger">*</span></label>
                    <input name="material_category" id="material_category" type="text" class="form-control" placeholder="Enter Material Category" value="<?php echo $materialCategory; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Type <span class="text-danger">*</span></label>
                    <input name="material_type" id="material_type" type="text" class="form-control" placeholder="Enter Material Type" value="<?php echo $materialType; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Entry Type</label>
                    <select name="entry_type" id="entry_type" class="form-select">
                        <option value="">Select Entry Type</option>
                        <option value="daily_entry" <?php if($entryType == 'daily_entry') { echo 'selected'; } ?>>Daily Entry</option>
                        <option value="monthly_entry" <?php if($entryType == 'monthly_entry') { echo 'selected'; } ?>>Monthly Entry</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
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
    // Material Save Function
    $("#materialForm").validate({
        rules: {
            material_code: {
                required: true
            },
            material_name: {
                required: true
            },
            material_category: {
                required: true
            },
            material_type: {
                required: true
            },
            entry_type: {
                required: true
            }
        },
        messages: {
            material_code: {
                required: "Please Enter Material Code",
            },
            material_name: {
                required: "Please Enter Material Name",
            },
            material_category: {
                required: "Please Enter Material Category",
            },
            material_type: {
                required: "Please Enter Material Type",
            },
            entry_type: {
                required: "Please Select Entry Type",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#materialForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/materialFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>master/material-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>