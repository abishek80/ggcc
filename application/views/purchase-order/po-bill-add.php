<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="purchaseOrderForm" method="post">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url() . 'purchase/po-view/' . $companyName . '/' . $branchId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $companyName . ' - ' . $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url() . 'purchase/po-view/' . $companyName . '/' . $branchId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="po_id" id="po_id" type="hidden" value="<?php echo $poId; ?>">
                <input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branchId; ?>">
                <input name="company_name" id="company_name" type="hidden" value="<?php echo $companyName; ?>">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Purchase Order Date <span class="text-danger">*</span></label>
                        <input name="po_date" id="po_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $poDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Validity End Date <span class="text-danger">*</span></label>
                        <input name="validity_end" id="validity_end" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $validityEnd; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Purchase Order Number <span class="text-danger">*</span></label>
                        <input name="purchase_order_no" id="purchase_order_no" type="text" class="form-control" value="<?php echo $purchaseOrderNo; ?>" placeholder="Purchase Order Number">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Purchase Order Title <span class="text-danger">*</span></label>
                        <input name="po_title" id="po_title" class="form-control" Placeholder="Enter PO Title" value="<?php echo $poTitle; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Purchase Amount <span class="text-danger">*</span></label>
                        <input name="purchase_amount" id="purchase_amount" type="text" class="form-control decimal" value="<?php echo $purchaseAmount; ?>" placeholder="Purchase Amount">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Purchase Order Letter</label>
                            <?php if($purchaseOrderLetter) { ?>
                                <a href="<?php echo base_url() . $purchaseOrderLetter; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                        </div>
                        <input name="purchase_order_letter" id="purchase_order_letter" type="file" class="form-control">
                        <input type="hidden" value="<?php echo $purchaseOrderLetter; ?>" name="alter_purchase_order_letter">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Security Amount <span class="text-danger">*</span></label>
                        <input name="security_amount" id="security_amount" type="text" class="form-control decimal" value="<?php echo $securityAmount; ?>" placeholder="Security Amount">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Security Amt. Receipt Doc</label>
                            <?php if($securityAmountReceipt) { ?>
                                <a href="<?php echo base_url() . $securityAmountReceipt; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                        </div>
                        <input name="security_amount_receipt" id="security_amount_receipt" type="file" class="form-control">
                        <input type="hidden" value="<?php echo $securityAmountReceipt; ?>" name="alter_security_amount_receipt">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Security Amt. DD Doc</label>
                            <?php if($securityAmountDD) { ?>
                                <a href="<?php echo base_url() . $securityAmountDD; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                        </div>
                        <input name="security_amount_dd" id="security_amount_dd" type="file" class="form-control">
                        <input type="hidden" value="<?php echo $securityAmountDD; ?>" name="alter_security_amount_dd">
                    </div>
                    <!-- <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">GST Number</label>
                        <select name="gst_number" id="gst_number" class="form-select select2">
                            <option value="">Select GST Number</option>
                            <?php foreach ($gstDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->id == $gstNumber) { echo 'selected="true"'; } ?>><?php echo $row->gst_number; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">GST Percentage</label>
                        <select name="gst_percentage" id="gst_percentage" class="form-select">
                            <option value="">Select GST Percentage</option>
                            <option value="18" <?php if($gstPercentage == '18') { echo 'selected'; } ?>>IGST 18%</option>
                            <option value="9" <?php if($gstPercentage == '9') { echo 'selected'; } ?>>CGST 9% & SGST 9%</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vendor Code</label>
                        <select name="vendor_code" id="vendor_code" class="form-select select2">
                            <option value="">Select Vendor Code</option>
                            <?php foreach ($vendorCodeDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->id == $vendorCode) { echo 'selected="true"'; } ?>><?php echo $row->vendor_code; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">PAN Number</label>
                        <select name="pan_number" id="pan_number" class="form-select select2">
                            <option value="">Select PAN Number</option>
                            <?php foreach ($panDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->id == $panNumber) { echo 'selected="true"'; } ?>><?php echo $row->pan_number; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">HPCL GST Number</label>
                        <input name="hpcl_gst_number" id="hpcl_gst_number" type="text" class="form-control" value="<?php echo $hpclGstNumber; ?>" placeholder="HPCL GST Number">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">HPCL Address</label>
                        <input name="hpcl_address" id="hpcl_address" type="text" class="form-control" value="<?php echo $hpclAddress; ?>" placeholder="HPCL Address">
                    </div> -->
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Save Purchase Order Form
    $("#purchaseOrderForm").validate({
        rules: {
            po_date: {
                required: true
            },
            validity_end: {
                required: true
            },
            purchase_order_no: {
                required: true
            },
            po_title: {
                required: true
            },
            security_amount: {
                required: true
            },
            purchase_amount: {
                required: true
            },
            company_name: {
                required: true
            // },
            // gst_number: {
            //     required: true
            // },
            // gst_percentage: {
            //     required: true
            // },
            // vendor_code: {
            //     required: true
            // },
            // pan_number: {
            //     required: true
            // },
            // hpcl_gst_number: {
            //     required: true
            // },
            // hpcl_address: {
            //     required: true
            }
        },
        messages: {
            po_date: {
                required: "Please Enter Purchase Order Date",
            },
            validity_end: {
                required: "Please Select Validity End",
            },
            purchase_order_no: {
                required: "Please Enter Purchase Order Number",
            },
            po_title: {
                required: "Please Enter Purchase Order Title",
            },
            security_amount: {
                required: "Please Enter Security Amount",
            },
            purchase_amount: {
                required: "Please Enter Purchase Amount",
            },
            company_name: {
                required: "Please Enter Company Name",
            // },
            // gst_number: {
            //     required: "Please Enter GST Number",
            // },
            // gst_percentage: {
            //     required: "Please Enter GST Percentage",
            // },
            // vendor_code: {
            //     required: "Please Enter Vendor Code",
            // },
            // pan_number: {
            //     required: "Please Enter PAN Number",
            // },
            // hpcl_gst_number: {
            //     required: "Please Enter HPCL GST Number",
            // },
            // hpcl_address: {
            //     required: "Please Enter HPCL Address",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#purchaseOrderForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>purchase/purchaseOrderSaveForm',
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
                        'showDuration': '300',
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
                            window.location.href = "<?php echo base_url() . 'purchase/po-view/' . $companyName . '/' . $branchId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>