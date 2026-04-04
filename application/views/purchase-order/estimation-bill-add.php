<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="estimationForm" method="post">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branchId; ?>">
                <input name="company_name" id="company_name" type="hidden" value="<?php echo $companyName; ?>">
                <input id="purchase_id" name="purchase_id" type="hidden" value="<?php echo $poId?>">
                <input name="est_id" id="est_id" type="hidden" value="<?php echo $estId; ?>">
                <input id="retention_id" name="retention_id" type="hidden" value="<?php echo $retentionId; ?>">
                <input id="status" name="status" type="hidden" value="<?php echo $status; ?>">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Purchase Order Number <span class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control" value="<?php echo $purchaseOrderNo; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Estimation Date <span class="text-danger">*</span></label>
                        <input name="estimation_date" id="estimation_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $estimationDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Estimation Number <span class="text-danger">*</span></label>
                        <input name="estimation_number" id="estimation_number" type="text" value="<?php echo $estimationNumber; ?>" class="form-control" placeholder="Estimation Number">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex justify-content-between">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Estimation File</label>
                            <?php if($invoiceDoc) { ?>
                                <a href="<?php echo base_url() . $jobReport; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                        </div>
                        <input name="job_report" id="job_report" type="file" class="form-control">
                        <input type="hidden" value="<?php echo $jobReport; ?>" name="alter_job_report">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Estimation Amount <span class="text-danger">*</span></label>
                        <input name="estimation_amount" id="estimation_amount" type="text" value="<?php echo $estimationAmount; ?>" class="form-control decimal" placeholder="Estimation Amount">
                    </div>
                    
                    <?php if($status == 'taxinvoice' || $status == 'retention') { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-1">Invoice Date <span class="text-danger">*</span></label>
                            <input name="invoice_date" id="invoice_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $invoiceDate; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-1">Callup Number <span class="text-danger">*</span></label>
                            <input name="callup_number" id="callup_number" type="text" class="form-control" placeholder="Enter Callup Number" value="<?php echo $callupNumber; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="d-flex justify-content-between">
                                <label class="w-100 fw-bold text-black mb-2 fs-14px">Invoice Document</label>
                                <?php if($invoiceDoc) { ?>
                                    <a href="<?php echo base_url() . $invoiceDoc; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                                <?php } ?>
                            </div>
                            <input name="invoice_doc" id="invoice_doc" type="file" class="form-control">
                            <input type="hidden" name="alter_invoice_doc">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-1">Invoice Number <span class="text-danger">*</span></label>
                            <input name="invoice_number" id="invoice_number" type="text" class="form-control" placeholder="Enter Invoice Number" value="<?php echo $invoiceNumber; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-1">Net Amount <span class="text-danger">*</span></label>
                            <input name="net_amount" id="net_amount" type="text" class="form-control decimal" placeholder="Enter Net Amount" value="<?php echo $netAmount; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-1">Invoice Amount <span class="text-danger">*</span></label>
                            <input name="invoice_amount" id="invoice_amount" type="text" class="form-control decimal" placeholder="Enter Invoice Amount" value="<?php echo $invoiceAmount; ?>">
                        </div>

                        <?php if($status == 'retention') { ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Received Date <span class="text-danger">*</span></label>
                                <input name="received_date" id="received_date" type="date" class="form-control date-picker receivedDate" placeholder="YYYY - MM - DD" value="<?php echo $receivedDate; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Retention Date <span class="text-danger">*</span></label>
                                <input name="retention_date" id="retention_date" type="date" class="form-control date-picker retentionMoneyDate" placeholder="YYYY - MM - DD" value="<?php echo $retentionrDate; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Received Amount <span class="text-danger">*</span></label>
                                <input name="received_amount" id="received_amount" type="text" class="form-control decimal" placeholder="Enter Received Amount" value="<?php echo $receivedAmount; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">TDS Amount (1%) <span class="text-danger">*</span></label>
                                <input name="tds_amount" id="tds_amount" type="text" class="form-control decimal" placeholder="Enter TDS Amount" value="<?php echo $tdsAmount; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">WCT Amount (2%) <span class="text-danger">*</span></label>
                                <input name="wct_amount" id="wct_amount" type="text" class="form-control decimal" placeholder="Enter WCT Amount" value="<?php echo $wctAmount; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Retention Amount <span class="text-danger">*</span></label>
                                <input name="retention_amount" id="retention_amount" type="text" class="form-control decimal" placeholder="Enter Retention Amount" value="<?php echo $retentionAmount; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Hold Amount <span class="text-danger">*</span></label>
                                <input name="hold_amount" id="hold_amount" type="text" class="form-control decimal" placeholder="Enter Hold Amount" value="<?php echo $holdAmount; ?>">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Amount Received Bank <span class="text-danger">*</span></label>
                                <select name="bank_name" id="bank_name" type="text" class="form-select">
                                    <option value="">Select Received Bank</option>
                                    <option value="tmbl" <?php if($amountReceivedBank == 'tmbl') { echo 'selected'; }; ?>>TMBL</option>
                                    <option value="idbi" <?php if($amountReceivedBank == 'idbi') { echo 'selected'; }; ?>>IDBI</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="d-flex justify-content-between">
                                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Retention Document</label>
                                    <?php if($retentionDoc) { ?>
                                        <a href="<?php echo base_url() . $retentionDoc; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                                    <?php } ?>
                                </div>
                                <input name="retention_doc" id="retention_doc" type="file" class="form-control">
                                <input type="hidden" name="alter_retention_doc">
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Save Estimation Item Form
    $("#estimationForm").validate({
        rules: {
            purchase_order_number: {
                required: true
            },
            estimation_date: {
                required: true
            },
            estimation_number: {
                required: true
            },
            estimation_amount: {
                required: true
            }
        },
        messages: {
            purchase_order_number: {
                required: "Please Select Purchase Order Number",
            },
            estimation_date: {
                required: "Please Select Estimation Date",
            },
            estimation_number: {
                required: "Please Enter Estimation Number",
            },
            estimation_amount: {
                required: "Please Enter Estimation Number",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#estimationForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>purchase/estimationSaveForm',
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
                            window.location.href = "<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>