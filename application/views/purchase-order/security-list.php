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
                <a href="<?php echo base_url() . 'purchase/security-amount-list/' . $companyName . '/notreceived'; ?>" class="<?php echo ($activeLink == 'notreceived') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Not Received List</a>
                <a href="<?php echo base_url() . 'purchase/security-amount-list/' . $companyName . '/received'; ?>" class="<?php echo ($activeLink == 'received') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Received List</a>
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
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Security Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallSecurityAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallReceivedAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Not Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallNotreceivedAmount; ?></h5>
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
                            <th>PO Title</th>
                            <th>PO Date</th>
                            <th>PO End Date</th>
                            <th>Security Amount</th>
                            <th>Receipt Doc</th>
                            <th>DC Doc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($securityAmountList as $row) { 
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->zone; ?></p>
                                    <p class="mb-0"><?php echo $row->branch_name; ?></p>
                                </td>
                                <td><?php echo $row->purchase_order_no; ?></td>
                                <td><?php echo $row->po_title; ?></td>
                                <td><?php echo $row->po_dateFormat; ?></td>
                                <td class="date-check" data-date-check="<?php echo $row->validity_end; ?>"><?php echo $row->validity_endFormat; ?></td>
                                <td class="amount-format"><?php echo $row->security_amount; ?></td>
                                <td>
                                    <?php if($row->receipt_img) { ?>
                                        <a href="<?php echo base_url() . $row->receipt_img; ?>" class="iframe-popup doc-hover">View Receipt Doc</a>
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($row->dd_img) { ?>
                                        <a href="<?php echo base_url() . $row->dd_img; ?>" class="iframe-popup doc-hover">View DC Doc</a>
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="javascript:void(0);" class="box-hover getPurchaseId" data-purchaseid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
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
                        <label class="w-100 fw-bold text-black mb-1">Company Name</label>
                        <div id="companyName" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="branch_zone" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Date</label>
                        <div id="poDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PO Validity End Date</label>
                        <div id="validityEnd" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase OrderNo</label>
                        <div id="purchaseOrderNo" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Order Title</label>
                        <div id="poTitle" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Amount</label>
                        <div id="poAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 purchaseOrderLetter d-none">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Order Letter</label>
                        <div id="purchaseOrderLetter" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Security Amount</label>
                        <div id="securityAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 securityAmountReceiptImg d-none">
                        <label class="w-100 fw-bold text-black mb-1">Security Amount Receipt Doc</label>
                        <div id="securityAmountReceiptImg" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 securityAmountDDImg d-none">
                        <label class="w-100 fw-bold text-black mb-1">Security Amount DD Doc</label>
                        <div id="securityAmountDDImg" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 gstNumber d-none">
                        <label class="w-100 fw-bold text-black mb-1">GST Number</label>
                        <div id="gstNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 gstPercentage d-none">
                        <label class="w-100 fw-bold text-black mb-1">GST Percentage</label>
                        <div id="gstPercentage" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 vendorCode d-none">
                        <label class="w-100 fw-bold text-black mb-1">Vendor Code</label>
                        <div id="vendorCode" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 panNumber d-none">
                        <label class="w-100 fw-bold text-black mb-1">PAN Number</label>
                        <div id="panNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 hpclGstNumber d-none">
                        <label class="w-100 fw-bold text-black mb-1">HPCL GST Number</label>
                        <div id="hpclGstNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 hpclAddress d-none">
                        <label class="w-100 fw-bold text-black mb-1">HPCL Address</label>
                        <div id="hpclAddress" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 securityReceivedDate d-none">
                        <label class="w-100 fw-bold text-black mb-1">Security Amt Received Date</label>
                        <div id="securityReceivedDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Security Amt Received Status</label>
                        <div id="securityStatus" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12 m-0">
                        <form id="securityAmountReceived" method="post" class="d-flex gap-3 pt-3 justify-content-end align-items-end border-top mt-3 border-2 d-none">
                            <div>
                                <div id="purchaseId"></div>
                                <label class="w-100 fw-bold text-black mb-1">Security Amount Received Date</label>
                                <input name="security_received_date" id="security_received_date" type="date" class="form-control date-picker w-min-300" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                <a href="<?php echo base_url() . 'purchase/security-amount-list/' . $companyName . '/notreceived'; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Amount Received</button>
                            </div>
                        </form>
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
                var baseUrl = '<?php echo base_url() . 'purchase/security-amount-list/' . $companyName . '/' . $activeLink; ?>';

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

    $(document).on("click", ".getPurchaseId", function(e){
        var purchaseId = $(this).data("purchaseid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>purchase/getPurchaseDetail',
            dataType: "json",
            data: {purchaseId},
            success: function (data) {
                $('#branch_zone').html(data.zone + ' - ' + data.branchName);
                $('#modalTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.purchaseOrderNo + ' - Purchase Order Details</h5>');
                $('#purchaseId').html('<input type="hidden" id="purchase_id" name="purchase_id" value="' + data.poId + '">');
                $('#companyName').html(data.companyName);
                $('#poDate').html(data.poDate);
                $('#validityEnd').html(data.validityEnd);
                $('#purchaseOrderNo').html(data.purchaseOrderNo);
                $('#poTitle').html(data.poTitle);
                $('#securityAmount').html('<span class="amount-format">' + data.securityAmount + '</span>');
                $('#poAmount').html('<span class="amount-format">' + data.poAmount + '</span>');
                $('#securityStatus').html(data.securityStatus);

                if (data.gstNumber) {
                    $('#gstNumber').html(data.gstNumber);
                    $('.gstNumber').removeClass('d-none');
                } else {
                    $('.gstNumber').addClass('d-none');
                }

                if (data.gstPercentage) {
                    $('#gstPercentage').html(data.gstPercentage);
                    $('.gstPercentage').removeClass('d-none');
                } else {
                    $('.gstPercentage').addClass('d-none');
                }

                if (data.vendorCode) {
                    $('#vendorCode').html(data.vendorCode);
                    $('.vendorCode').removeClass('d-none');
                } else {
                    $('.vendorCode').addClass('d-none');
                }

                if (data.panNumber) {
                    $('#panNumber').html(data.panNumber);
                    $('.panNumber').removeClass('d-none');
                } else {
                    $('.panNumber').addClass('d-none');
                }

                if (data.hpclGstNumber) {
                    $('#hpclGstNumber').html(data.hpclGstNumber);
                    $('.hpclGstNumber').removeClass('d-none');
                } else {
                    $('.hpclGstNumber').addClass('d-none');
                }

                if (data.hpclAddress) {
                    $('#hpclAddress').html(data.hpclAddress);
                    $('.hpclAddress').removeClass('d-none');
                } else {
                    $('.hpclAddress').addClass('d-none');
                }
                
                if (data.purchaseOrderLetter) {
                    $('#purchaseOrderLetter').html('<a href="' + '<?php echo base_url(); ?>' + data.purchaseOrderLetter + '" target="_blank" class="doc-hover">View Purchase Order Doc</a>');
                    $('.purchaseOrderLetter').removeClass('d-none');
                } else {
                    $('.purchaseOrderLetter').addClass('d-none');
                }
                if (data.securityAmountReceiptImg) {
                    $('#securityAmountReceiptImg').html('<a href="' + '<?php echo base_url(); ?>' + data.securityAmountReceiptImg + '" target="_blank" class="doc-hover">View Security Received Doc</a>');
                    $('.securityAmountReceiptImg').removeClass('d-none');
                } else {
                    $('.securityAmountReceiptImg').addClass('d-none');
                }
                if (data.securityAmountDDImg) {
                    $('#securityAmountDDImg').html('<a href="' + '<?php echo base_url(); ?>' + data.securityAmountDDImg + '" target="_blank" class="doc-hover">View Security DD Doc</a>');
                    $('.securityAmountDDImg').removeClass('d-none');
                } else {
                    $('.securityAmountDDImg').addClass('d-none');
                }
                if (data.securityReceivedDate) {
                    $('#securityReceivedDate').html(data.securityReceivedDate);
                    $('.securityReceivedDate').removeClass('d-none');
                } else {
                    $('.securityReceivedDate').addClass('d-none');
                }
                if (data.securityStatus == 'notreceived') {
                    $('#securityAmountReceived').removeClass('d-none');
                } else {
                    $('#securityAmountReceived').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });

    // Security Amount Received Save Function
    $("#securityAmountReceived").validate({
        rules: {
            security_received_date: {
                required: true
            }
        },
        messages: {
            security_received_date: {
                required: "Please Select Security Amount Received Date",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#securityAmountReceived').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>purchase/securityReceivedFormSave',
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
                            window.location.href = "<?php echo base_url(). 'purchase/security-amount-list/' . $companyName . '/received'; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>