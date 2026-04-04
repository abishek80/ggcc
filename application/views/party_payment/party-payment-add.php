<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="PartyPaymentForm" method="post">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="party_payment_id" id="party_payment_id" type="hidden" value="<?php echo $partyPaymentId; ?>">
                <input name="party_id" id="party_id" type="hidden" value="<?php echo $partyId; ?>">
                <input name="company_name" id="company_name" type="hidden" value="<?php echo $companyName; ?>">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Party Name <span class="text-danger">*</span></label>
                        <input name="party_name" id="party_name" type="text" value="<?php echo $partyName; ?>" readonly class="form-control">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Zone <span class="text-danger">*</span></label>
                        <select name="purchase_zone" id="purchase_zone" class="form-select">
                            <option value="">Select Bill Zone</option>
                            <option value="chennai" <?php if($purchaseZone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                            <option value="mumbai" <?php if($purchaseZone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                            <option value="indore" <?php if($purchaseZone == 'indore') { echo 'selected'; } ?>>Indore</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Date <span class="text-danger">*</span></label>
                        <input name="purchase_date" id="purchase_date" type="date" class="form-control date-picker billDate" placeholder="YYYY - MM - DD" value="<?php echo $purchaseDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Validity End Date <span class="text-danger">*</span></label>
                        <input name="purchase_validityend_date" id="purchase_validityend_date" type="date" class="form-control date-picker validityEndDate" placeholder="YYYY - MM - DD" value="<?php echo $purchaseValidityendDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Number <span class="text-danger">*</span></label>
                        <input name="purchase_number" id="purchase_number" type="text" class="form-control" value="<?php echo $purchaseNumber; ?>" placeholder="Enter Bill Number">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Amount <span class="text-danger">*</span></label>
                        <input name="purchase_amount" id="purchase_amount" type="text" class="form-control decimal" value="<?php echo $purchaseAmount; ?>" placeholder="Enter Bill Amount">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Bill Image</label>
                            <?php if($purchaseBill) { ?>
                                <a href="<?php echo base_url() . $purchaseBill; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                        </div>
                        <input name="purchase_bill" id="purchase_bill" type="file" class="form-control">
                        <input type="hidden" value="<?php echo $purchaseBill; ?>" name="alter_purchase_bill">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $(".billDate").on("change", function() {
        const checkingDate = new Date($(this).val());
        if (isNaN(checkingDate)) return;

        // Calculate 12 months later
        const renewalDate = new Date(checkingDate);
        renewalDate.setMonth(renewalDate.getMonth() + 2);

        // Adjust to the day before
        renewalDate.setDate(renewalDate.getDate() - 16);

        // Format the date as YYYY-MM-DD
        const formattedDate = renewalDate.toISOString().split("T")[0];
        $(".validityEndDate").val(formattedDate);
    });

    
    // Save Party Payment Form
    $("#PartyPaymentForm").validate({
        rules: {
            purchase_zone: {
                required: true
            },
            purchase_date: {
                required: true
            },
            purchase_vlaidityend_date: {
                required: true
            },
            purchase_number: {
                required: true
            },
            purchase_amount: {
                required: true
            }
        },
        messages: {
            purchase_zone: {
                required: "Please Enter Bill Zone",
            },
            purchase_date: {
                required: "Please Select Bill Date",
            },
            purchase_vlaidityend_date: {
                required: "Please Select Bill Validity End Date",
            },
            purchase_number: {
                required: "Please Enter Bill Number",
            },
            purchase_amount: {
                required: "Please Enter Bill Amount",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#PartyPaymentForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>bill/partyPaymentSaveForm',
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
                            window.location.href = "<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>