<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="materialShippingForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($status == 'received') { ?>
                        <a href="<?php echo base_url(); ?>stock/material-shipping-list/received" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>stock/material-shipping-list/notreceived" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($status == 'received') { ?>
                        <a href="<?php echo base_url(); ?>stock/material-shipping-list/received" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>stock/material-shipping-list/notreceived" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="material_shipping_id" id="material_shipping_id" type="hidden" value="<?php echo $materialShippingId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Shipping Date <span class="text-danger">*</span></label>
                    <input name="shipping_date" id="shipping_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $shippingDate ? $shippingDate : date('Y-m-d'); ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">From Location <span class="text-danger">*</span></label>
                    <select name="from_location" id="from_location" class="form-select select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $fromLocation) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">To Location <span class="text-danger">*</span></label>
                    <select name="to_location" id="to_location" class="form-select select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $toLocation) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Material Name <span class="text-danger">*</span></label>
                    <input name="material_name" id="material_name" type="text" class="form-control" placeholder="Enter Material Name" value="<?php echo $materialName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Sender Name</label>
                    <input name="sender_name" id="sender_name" type="text" class="form-control" placeholder="Enter Sender Name" value="<?php echo $senderName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Sender Number</label>
                    <input name="sender_number" id="sender_number" type="text" class="form-control number-only" placeholder="Enter Sender Number" value="<?php echo $senderNumber; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Receiver Name</label>
                    <input name="receiver_name" id="receiver_name" type="text" class="form-control" placeholder="Enter Receiver Name" value="<?php echo $receiverName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Receiver Number</label>
                    <input name="receiver_number" id="receiver_number" type="text" class="form-control number-only" placeholder="Enter Receiver Number" value="<?php echo $receiverNumber; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Shipping Type</label>
                    <input name="shipping_type" id="shipping_type" type="text" class="form-control" placeholder="Enter Shipping Type" value="<?php echo $shippingType; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">LR Copy</label>
                        <?php if($lrCopy) { ?>
                            <a href="<?php echo base_url() . $lrCopy; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="lr_copy" id="lr_copy" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $lrCopy; ?>" name="alter_lr_copy">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Copy</label>
                        <?php if($billCopy) { ?>
                            <a href="<?php echo base_url() . $billCopy; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="bill_copy" id="bill_copy" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $billCopy; ?>" name="alter_bill_copy">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Received Date</label>
                    <input name="received_date" id="received_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $receivedDate; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="notreceived" <?php if($status == 'notreceived') { echo 'selected'; } ?>>Not Received</option>
                        <option value="received" <?php if($status == 'received') { echo 'selected'; } ?>>Received</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Save Function
    $("#materialShippingForm").validate({
        rules: {
            shipping_date: {
                required: true
            },
            from_location: {
                required: true
            },
            to_location: {
                required: true
            },
            material_name: {
                required: true
            }
        },
        messages: {
            shipping_date: {
                required: "Please Select Shipping Date"
            },
            from_location: {
                required: "Please Select From Location"
            },
            to_location: {
                required: "Please Enter To Location"
            },
            material_name: {
                required: "Please Enter Material Name"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#materialShippingForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>stock/materialShippingFormSave',
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
                        
                        var status = "<?php echo $status; ?>";

                        setTimeout(function () {
                            if (status == 'received') {
                                window.location.href = "<?php echo base_url(); ?>stock/material-shipping-list/received";
                            } else {
                                window.location.href = "<?php echo base_url(); ?>stock/material-shipping-list/notreceived";
                            }
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>