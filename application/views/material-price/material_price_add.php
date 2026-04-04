<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="materialPriceForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($materialId) { ?>
                    <a href="<?php echo base_url() . 'stock/material-price-view/' . $materialId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>stock/material-price-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($materialId) { ?>
                    <a href="<?php echo base_url() . 'stock/material-price-view/' . $materialId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>stock/material-price-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="material_price_id" id="material_price_id" type="hidden" value="<?php echo $materialPriceId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $date ? $date : date('Y-m-d'); ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($branchId == $row->id) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Name <span class="text-danger">*</span></label>
                    <select name="material_id" id="material_id" class="form-select select2 selectMaterialName">
                        <option value="">Select Material Name</option>
                        <?php foreach ($materialDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($materialId == $row->id) { echo 'selected'; } ?>><?php echo $row->material_code . ' - ' . $row->material_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Category</label>
                    <input name="material_category" id="material_category" type="text" class="form-control text-capitalize materialCategory" readonly placeholder="Enter Material Category" value="<?php echo $materialCategory; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Type</label>
                    <input name="material_type" id="material_type" type="text" class="form-control text-capitalize materialType" readonly placeholder="Enter Material Type" value="<?php echo $materialType; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vendor Name <span class="text-danger">*</span></label>
                    <input name="vendor_name" id="vendor_name" type="text" class="form-control text-capitalize" placeholder="Enter Vendor Name" value="<?php echo $vendorName; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Price Amount <span class="text-danger">*</span></label>
                    <input name="amount" id="amount" type="text" class="form-control decimal" placeholder="Enter Price Amount" value="<?php echo $amount; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks</label>
                    <input name="remarks" id="remarks" type="text" class="form-control" placeholder="Enter Remarks" value="<?php echo $remarks; ?>">
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.selectMaterialName').change(function () {
            var selectMaterialName = $(this).val();
            if (selectMaterialName !== '') {
                $.ajax({
                    url: "<?php echo base_url('stock/getMaterialData'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        materialName: selectMaterialName
                    },
                    success: function (data) {
                        materialCategory = data[0].category;
                        materialType = data[0].type;
                        $('.materialCategory').val(materialCategory);
                        $('.materialType').val(materialType);
                    }
                });
            }
        });
    });

    // Material Price Save Function
    $("#materialPriceForm").validate({
        rules: {
            date: {
                required: true
            },
            branch: {
                required: true
            },
            material_id: {
                required: true
            },
            vendor_name: {
                required: true
            },
            amount: {
                required: true
            }
        },
        messages: {
            date: {
                required: "Please Select Date"
            },
            branch: {
                required: "Please Select Branch"
            },
            material_id: {
                required: "Please Select Material Name"
            },
            vendor_name: {
                required: "Please Enter Vendor Name"
            },
            amount: {
                required: "Please Enter Amount"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#materialPriceForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>stock/materialPriceFormSave',
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
                            <?php if($materialId) { ?>
                                window.location.href = "<?php echo base_url() . 'stock/material-price-view/' . $materialId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>stock/material-price-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>