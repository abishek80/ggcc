<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg col-md-4 col-6">
                <a href="<?php echo base_url() . 'purchase/purchase-list/' . $companyName; ?>">
                    <div class="card p-3 text-center border-primary border border-4 border-end-0 border-start-0 border-top-0">
                        <p class="mb-3 text-black">Purchase Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallPoAmount; ?></h5>
                    </div>
                </a>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center border-danger border border-4 border-end-0 border-start-0 border-top-0">
                    <p class="mb-3 text-black">Balance Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $balancePoAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <a href="<?php echo base_url() . 'purchase/security-amount-list/' . $companyName . '/notreceived'; ?>">
                    <div class="card p-3 text-center border-secondary border border-4 border-end-0 border-start-0 border-top-0">
                        <p class="mb-3 text-black">Security Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $securityAmount; ?></h5>
                    </div>
                </a>
            </div>
            <div class="col-lg col-md-4 col-6">
                <a href="<?php echo base_url() . 'purchase/estimation-list/' . $companyName; ?>">
                    <div class="card p-3 text-center border-info border border-4 border-end-0 border-start-0 border-top-0">
                        <p class="mb-3 text-black">Estimation Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallEstimationAmount; ?></h5>
                    </div>
                </a>
            </div>
            <div class="col-lg col-md-4 col-6">
                <a href="<?php echo base_url() . 'purchase/taxinvoice-list/' . $companyName; ?>">
                    <div class="card p-3 text-center border-warning border border-4 border-end-0 border-start-0 border-top-0">
                        <p class="mb-3 text-black">Taxinvoice Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallTaxinvoiceAmount; ?></h5>
                    </div>
                </a>
            </div>
            <div class="col-lg col-md-4 col-6">
                <a href="<?php echo base_url() . 'purchase/retention-money-list/' . $companyName . '/notreceived'; ?>">
                    <div class="card p-3 text-center border-success border border-4 border-end-0 border-start-0 border-top-0">
                        <p class="mb-3 text-black">Bill Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallRetentionAmount; ?></h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex flex-wrap gap-2 gap-md-3">
                <a href="<?php echo base_url() . 'purchase/retention-money-list/' . $companyName . '/notreceived'; ?>" class="<?php echo ($activeLink == 'notreceived') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Not Received List</a>
                <a href="<?php echo base_url() . 'purchase/retention-money-list/' . $companyName . '/received'; ?>" class="<?php echo ($activeLink == 'received') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Received List</a>
            </div>
            <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                <div class="w-px-250"> 
                    <select id="branchSelect" class="w-100 form-select select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branch) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button id="searchButton" class="btn btn-primary w-px-100px">Search</button>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center bg-label-success">
                    <p class="mb-3 text-black">Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallReceivedAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center bg-label-blue">
                    <p class="mb-3 text-black">Tax Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallTaxAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center bg-label-warning">
                    <p class="mb-3 text-black">Bill Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallRetentionMoney; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center bg-label-danger">
                    <p class="mb-3 text-black">Hold Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallHoldAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone & Branch</th>
                            <th>PO Number</th>
                            <th>Retention Date</th>
                            <th>Received Amt</th>
                            <th>TDS Amt</th>
                            <th>WCT Amt</th>
                            <th>Retention Amt</th>
                            <th>Hold Amt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($retentionMoneyList as $row) { 
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->zone; ?></p>
                                    <p class="mb-0"><?php echo $row->branch; ?></p>
                                </td>
                                <td><?php echo $row->purchase_order_no; ?></td>
                                <td class="date-check" data-date-check="<?php echo $row->retention_date; ?>"><?php echo $row->retention_dateFormat; ?></td>
                                <td class="amount-format"><?php echo $row->received_amount; ?></td>
                                <td><?php echo $row->tds_amount; ?></td>
                                <td><?php echo $row->wct_amount; ?></td>
                                <td class="amount-format"><?php echo $row->retention_amount; ?></td>
                                <td><?php echo $row->hold_amount; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="javascript:void(0);" class="box-hover getEstimationId" data-estimationid="<?php echo $row->estimation_id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="view_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="modalTitle"></div>
                </div>
                <div class="row g-3 w-100">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="branch_zone" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PO Date</label>
                        <div id="purchaseDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Validity End Date</label>
                        <div id="validityEnd" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PO Number</label>
                        <div id="purchaseNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PO Title</label>
                        <div id="purchaseTitle" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PO Amount</label>
                        <div id="purchaseAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Estimation Date</label>
                        <div id="estimationDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Estimation Number</label>
                        <div id="estimationNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Estimation Amount</label>
                        <div id="estimationAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 estimationDoc d-none">
                        <label class="w-100 fw-bold text-black mb-1">Estimation Document</label>
                        <div id="estimationDoc" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12 border-top pt-3 border-2">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-4 col-sm-6 invoiceDate d-none">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Date</label>
                                <div id="invoiceDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 invoiceNumber d-none">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Number</label>
                                <div id="invoiceNumber" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 callupNumber d-none">
                                <label class="w-100 fw-bold text-black mb-1">Callup Number</label>
                                <div id="callupNumber" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 netAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">Net Amount</label>
                                <div id="netAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 invoiceAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Amount</label>
                                <div id="invoiceAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 invoiceDoc d-none">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Document</label>
                                <div id="invoiceDoc" class="text-capitalize text-black"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 border-top pt-3 border-2">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-4 col-sm-6 amountReceivedDate d-none">
                                <label class="w-100 fw-bold text-black mb-1">Received Date</label>
                                <div id="amountReceivedDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 retentionDate d-none">
                                <label class="w-100 fw-bold text-black mb-1">Retention Date</label>
                                <div id="retentionDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 receivedAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">Received Amount</label>
                                <div id="receivedAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 TDSAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">TDS Amount</label>
                                <div id="TDSAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 WCTAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">WCT Amount</label>
                                <div id="WCTAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 retentionAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">Retention Money</label>
                                <div id="retentionAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 holdAmount d-none">
                                <label class="w-100 fw-bold text-black mb-1">Hold Amount</label>
                                <div id="holdAmount" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 receivedBank d-none">
                                <label class="w-100 fw-bold text-black mb-1">Amount Received Bank</label>
                                <div id="receivedBank" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 retentionDocument d-none">
                                <label class="w-100 fw-bold text-black mb-1">Retention Document</label>
                                <div id="retentionDocument" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 retentionReceivedDate d-none">
                                <label class="w-100 fw-bold text-black mb-1">Retention Money Received Date</label>
                                <div id="retentionReceivedDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Retention Money Received Status</label>
                                <div id="retentionStatus" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-12 m-0">
                                <form id="retentionMoneyReceived" method="post" class="d-flex gap-3 pt-3 justify-content-end align-items-end border-top mt-3 border-2 d-none">
                                    <div>
                                        <div id="retentionId"></div>
                                        <label class="w-100 fw-bold text-black mb-1">Retention Money Received Date</label>
                                        <input name="retention_received_date" id="retention_received_date" type="date" class="form-control date-picker w-min-300" placeholder="YYYY - MM - DD">
                                    </div>
                                    <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                        <a href="<?php echo base_url() . 'purchase/retention-money-list/' . $companyName . '/notreceived'; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Money Received</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var branch = $('#branchSelect').val();

            if (branch !== '') {
                // Base URL
                var baseUrl = '<?php echo base_url() . 'purchase/retention-money-list/' . $companyName . '/' . $activeLink; ?>';

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (branch) {
                    newUrl += '/' + encodeURIComponent(branch);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                alert('Please Select Search Field');
            }
        });
    });

    $(document).on("click", ".getEstimationId", function(e){
        var estimationId = $(this).data("estimationid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>purchase/getEstimationBillDetail',
            dataType: "json",
            data: {estimationId},
            success: function (data) {
                $('#retentionId').html('<input type="hidden" id="retention_id" name="retention_id" value="' + data.retentionId + '">');
                $('.estimationId').html('<input type="hidden" id="estimation_id" name="estimation_id" value="' + data.estimationId + '">');
                $('.purchaseId').html('<input type="hidden" id="purchase_id" name="purchase_id" value="' + data.purchaseId + '">');
                $('#branch_zone').html(data.zone + ' - ' + data.branchName);
                if (data.invoiceNumber) {
                    $('#modalTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.invoiceNumber + ' - ' + data.status + ' Details</h5>');
                } else {
                    $('#modalTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.estimationNumber + ' - ' + data.status + ' Details</h5>');
                }
                $('#status').html(data.status);
                $('#purchaseTitle').html(data.purchaseTitle);
                $('#purchaseDate').html(data.purchaseDate);
                $('#validityEnd').html(data.validityEnd);
                $('#purchaseNumber').html(data.purchaseNumber);
                $('#purchaseAmount').html('<span class="amount-format">' + data.purchaseAmount + '</span>');
                $('#estimationDate').html(data.estimationDate);
                $('#estimationNumber').html(data.estimationNumber);
                $('#retentionStatus').html(data.retentionStatus);
                $('#estimationAmount').html('<span class="amount-format">' + data.estimationAmount + '</span>');
                $('#invoiceAmountInput').html('<input name="invoice_amount" id="invoice_amount" type="text" class="form-control" value="' + data.estimationAmount + '" placeholder="Enter Invoice Amount">');

                if (data.estimationDoc) {
                    $('#estimationDoc').html('<a href="' + '<?php echo base_url(); ?>' + data.estimationDoc + '" target="_blank" class="doc-hover">View Estimation Doc</a>');
                    $('.estimationDoc').removeClass('d-none');
                } else {
                    $('.estimationDoc').addClass('d-none');
                }

                if (data.invoiceDate) {
                    $('#invoiceDate').html(data.invoiceDate);
                    $('.invoiceDate').removeClass('d-none');
                } else {
                    $('.invoiceDate').addClass('d-none');
                }
                if (data.callupNumber) {
                    $('#callupNumber').html(data.callupNumber);
                    $('.callupNumber').removeClass('d-none');
                } else {
                    $('.callupNumber').addClass('d-none');
                }
                if (data.invoiceNumber) {
                    $('#invoiceNumber').html(data.invoiceNumber);
                    $('.invoiceNumber').removeClass('d-none');
                } else {
                    $('.invoiceNumber').addClass('d-none');
                }
                if (data.invoiceDoc) {
                    $('#invoiceDoc').html('<a href="' + '<?php echo base_url(); ?>' + data.invoiceDoc + '" target="_blank" class="doc-hover">View Invoice Doc</a>');
                    $('.invoiceDoc').removeClass('d-none');
                } else {
                    $('.invoiceDoc').addClass('d-none');
                }
                if (data.netAmount) {
                    $('#netAmount').html(data.netAmount);
                    $('.netAmount').removeClass('d-none');
                } else {
                    $('.netAmount').addClass('d-none');
                }
                if (data.invoiceAmount) {
                    $('#invoiceAmount').html(data.invoiceAmount);
                    $('.invoiceAmount').removeClass('d-none');
                } else {
                    $('.invoiceAmount').addClass('d-none');
                }
                if (data.amountReceivedDate) {
                    $('#amountReceivedDate').html(data.amountReceivedDate);
                    $('.amountReceivedDate').removeClass('d-none');
                } else {
                    $('.amountReceivedDate').addClass('d-none');
                }
                if (data.retentionDate) {
                    $('#retentionDate').html(data.retentionDate);
                    $('.retentionDate').removeClass('d-none');
                } else {
                    $('.retentionDate').addClass('d-none');
                }
                if (data.receivedAmount) {
                    $('#receivedAmount').html(data.receivedAmount);
                    $('.receivedAmount').removeClass('d-none');
                } else {
                    $('.receivedAmount').addClass('d-none');
                }
                if (data.TDSAmount) {
                    $('#TDSAmount').html(data.TDSAmount);
                    $('.TDSAmount').removeClass('d-none');
                } else {
                    $('.TDSAmount').addClass('d-none');
                }
                if (data.WCTAmount) {
                    $('#WCTAmount').html(data.WCTAmount);
                    $('.WCTAmount').removeClass('d-none');
                } else {
                    $('.WCTAmount').addClass('d-none');
                }
                if (data.retentionAmount) {
                    $('#retentionAmount').html(data.retentionAmount);
                    $('.retentionAmount').removeClass('d-none');
                } else {
                    $('.retentionAmount').addClass('d-none');
                }
                if (data.holdAmount) {
                    $('#holdAmount').html(data.holdAmount);
                    $('.holdAmount').removeClass('d-none');
                } else {
                    $('.holdAmount').addClass('d-none');
                }
                if (data.receivedBank) {
                    $('#receivedBank').html(data.receivedBank);
                    $('.receivedBank').removeClass('d-none');
                } else {
                    $('.receivedBank').addClass('d-none');
                }
                if (data.retentionDocument) {
                    $('#retentionDocument').html('<a href="' + '<?php echo base_url(); ?>' + data.retentionDocument + '" target="_blank" class="doc-hover">View Retention Doc</a>');
                    $('.retentionDocument').removeClass('d-none');
                } else {
                    $('.retentionDocument').addClass('d-none');
                }
                if (data.retentionReceivedDate) {
                    $('#retentionReceivedDate').html(data.retentionReceivedDate);
                    $('.retentionReceivedDate').removeClass('d-none');
                } else {
                    $('.retentionReceivedDate').addClass('d-none');
                }
                if (data.retentionStatus == 'notreceived') {
                    $('#retentionMoneyReceived').removeClass('d-none');
                } else {
                    $('#retentionMoneyReceived').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });

    // retention Money Received Function
    $("#retentionMoneyReceived").validate({
        rules: {
            retention_received_date: {
                required: true
            }
        },
        messages: {
            retention_received_date: {
                required: "Please Select Retention Money Received Date",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#retentionMoneyReceived').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>purchase/retentionReceivedFormSave',
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
                            window.location.href = "<?php echo base_url(). 'purchase/retention-money-list/' . $companyName . '/received'; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>