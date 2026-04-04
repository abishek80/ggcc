<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="assetManagementForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($branchId != '' && $materialType != '') { ?>
                        <a href="<?php echo base_url() . 'stock/asset-view/' . $materialType . '/' . $branchId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } elseif ($materialType != '') { ?>
                        <a href="<?php echo base_url() . 'stock/asset-list/' . $materialType; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $formTitle . $materialType; ?> Material</h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($branchId != '' && $materialType != '') { ?>
                        <a href="<?php echo base_url() . 'stock/asset-view/' . $materialType . '/' . $branchId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } elseif ($materialType != '') { ?>
                        <a href="<?php echo base_url() . 'stock/asset-list/' . $materialType; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="asset_management_id" id="asset_management_id" type="hidden" value="<?php echo $assetManagementId; ?>">
            <input name="material_type" id="material_type" type="hidden" value="<?php echo $materialType; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $branchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Name <span class="text-danger">*</span></label>
                    <select name="material_name" id="material_name" class="form-select select2">
                        <option value="">Select Material Name</option>
                        <?php foreach ($assetsToolsDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $materialName) { echo 'selected'; } ?>><?php echo $row->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Count <span class="text-danger">*</span></label>
                    <input name="material_count" id="material_count" type="text" class="form-control number-only" placeholder="Enter Material Count" value="<?php echo $materialCount; ?>">
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Save Function
    $("#assetManagementForm").validate({
        rules: {
            branch: {
                required: true
            },
            material_name: {
                required: true
            },
            material_count: {
                required: true
            }
        },
        messages: {
            branch: {
                required: "Please Select Branch"
            },
            material_name: {
                required: "Please Select Material Name"
            },
            material_count: {
                required: "Please Enter Material Count"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#assetManagementForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>stock/assetManagementFormSave',
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
                            <?php if($branchId != '' && $materialType != '') { ?>
                                window.location.href = "<?php echo base_url() . 'stock/asset-view/' . $materialType . '/' . $branchId; ?>";
                            <?php } elseif ($materialType != '') { ?>
                                window.location.href = "<?php echo base_url() . 'stock/asset-list/' . $materialType; ?>";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>