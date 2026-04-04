<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">MSME Party</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $msme; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">Bill Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $purchaseUnpaidAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">Paid Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $paidUnpaidAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">Balance Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $balanceUnpaidAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="nav-align-top mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'bill/party-payment-list/' . $companyName; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $companyName . ' - ' . $partyName; ?></h4>
                </div>
                <div class="d-flex gap-3">
                    <div class="d-flex gap-3">
                        <select class="form-select w-min-250" id="zoneSelect">
                            <option value="">Select Zone</option>
                            <option value="chennai" <?php if($partyZone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                            <option value="mumbai" <?php if($partyZone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                            <option value="indore" <?php if($partyZone == 'indore') { echo 'selected'; } ?>>Indore</option>
                        </select>
                        <button id="searchButton" class="btn btn-primary w-100">Search</button>
                    </div>
                    <a href="<?php echo base_url() . 'bill/party-payment-add/' . $companyName . '/' . $partyId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Purchase Bill</a>
                </div>
            </div>
            <div class="card card-body mb-5">
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Bill Date</th>
                                <th>Bill Due Date</th>
                                <th>Bill Number</th>
                                <th>Bill Amt</th>
                                <th>Paid Amt</th>
                                <th>Balance Amt</th>
                                <th>Status</th>
                                <th class="w-min-50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach ($unpaidBillList as $row) { 
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->purchase_dateFormat; ?></td>
                                    <td><?php echo $row->validityend_dateFormat; ?></td>
                                    <td><?php echo $row->purchase_number; ?></td>
                                    <td class="amount-format"><?php echo $row->purchase_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->paid_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                    <td><?php echo $row->status == 'paid' ? '<span class="text-success">Paid</span>' : '<span class="text-danger">Not Paid</span>'; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="javascript:void(0);" class="box-hover getPartyPaymentId" data-partypaymentid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                            <a href="<?php echo base_url() . 'bill/party-payment-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                            <a href="<?php echo base_url() . 'bill/party-payment-report/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Report"> <i class="bx bx-chart"></i> </a>
                                            <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="party_payment" data-link="<?php echo base_url() . 'bill/party-payment-view/' . $row->company_name . '/' . $row->party_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="fw-bold mb-4 text-center text-black text-capitalize">Completed Bill List</h4>
            <div class="row g-3 mb-3">
                <div class="col-lg-4 col-6">
                    <div class="card p-3 text-center">
                        <p class="mb-2">Bill Amount</p>
                        <h5 class="mb-0 fw-semibold amount-format"><?php echo $purchasePaidAmount; ?></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card p-3 text-center">
                        <p class="mb-2">Paid Amount</p>
                        <h5 class="mb-0 fw-semibold amount-format"><?php echo $paidPaidAmount; ?></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="card p-3 text-center">
                        <p class="mb-2">Balance Amount</p>
                        <h5 class="mb-0 fw-semibold amount-format"><?php echo $balancePaidAmount; ?></h5>
                    </div>
                </div>
            </div>
            <div class="card card-body">
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Bill Date</th>
                                <th>Bill Due Date</th>
                                <th>Bill Number</th>
                                <th>Bill Amt</th>
                                <th>Paid Amt</th>
                                <th>Balance Amt</th>
                                <th>Status</th>
                                <th class="w-min-50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach ($paidBillList as $row) { 
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->purchase_dateFormat; ?></td>
                                    <td><?php echo $row->validityend_dateFormat; ?></td>
                                    <td><?php echo $row->purchase_number; ?></td>
                                    <td class="amount-format"><?php echo $row->purchase_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->paid_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                    <td><?php echo $row->status == 'paid' ? '<span class="text-success">Paid</span>' : '<span class="text-danger">Not Paid</span>'; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="javascript:void(0);" class="box-hover getPartyPaymentId" data-partypaymentid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                            <a href="<?php echo base_url() . 'bill/party-payment-report/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Report"> <i class="bx bx-chart"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Party Name</label>
                        <div id="partyName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bill Zone</label>
                        <div id="purchaseZone" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bill Date</label>
                        <div id="purchaseDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bill Validity End Date</label>
                        <div id="purchaseValidityendDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bill Number</label>
                        <div id="purchaseNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bill Amount</label>
                        <div id="purchaseAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Paid Amount</label>
                        <div id="paidAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Balance Amount</label>
                        <div id="balanceAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 purchaseBill d-none">
                        <label class="w-100 fw-bold text-black mb-1">Bill document</label>
                        <div id="purchaseBill" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Status</label>
                        <div id="status" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12">
                        <form id="partyPaymentForm" method="post" class="row g-3 paymentForm d-none border-top mt-3 border-2">
                            <div class="col-lg col-md-4 col-sm-6">
                                <div id="partyPaymentId"></div>
                                <div id="partyId"></div>
                                <div id="purchaseAmountValue"></div>
                                <label class="w-100 fw-bold text-black mb-1">Payment Date</label>
                                <input name="payment_date" id="payment_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="col-lg col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Payment Amount</label>
                                <input name="payment_amount" id="payment_amount" type="text" class="form-control number-only paymentAmountInput" placeholder="Enter Payment Amount">
                            </div>
                            <div class="col-lg col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-select">
                                    <option value="">Select Payment Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="tmbl">TMBL Bank</option>
                                    <option value="idbi">IDBI Bank</option>
                                </select>
                            </div>
                            <div class="col-lg col-md-4 col-sm-6">
                                <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                    <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Paid</button>
                                </div>
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
            var zone = $('#zoneSelect').val();

            // Base URL
            var baseUrl = '<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>';

            if (zone !== '') {

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (zone) {
                    newUrl += '/' + encodeURIComponent(zone);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                window.location.href = baseUrl;
            }
        });
    });

    $(document).on("click", ".getPartyPaymentId", function(e){
        var partyPaymentId = $(this).data("partypaymentid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>bill/getPartyPaymentDetail',
            dataType: "json",
            data: {partyPaymentId},
            success: function (data) {
                $('#partyPaymentId').html('<input type="hidden" id="party_payment_id" name="party_payment_id" value="' + data.partyPaymentId + '">');
                $('#partyId').html('<input type="hidden" id="party_id" name="party_id" value="' + data.partyId + '">');
                $('#purchaseAmountValue').html('<input type="hidden" id="payment_amount_value" name="payment_amount_value" class="purchaseAmountValue" value="' + data.balanceAmount + '">');
                $('#modalTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.purchaseNumber + ' - Bill Details</h5>');
                $('#status').html(data.status);
                $('#companyName').html(data.companyName);
                $('#partyName').html(data.partyName);
                $('#purchaseZone').html(data.purchaseZone);
                $('#purchaseDate').html(data.purchaseDate);
                $('#purchaseValidityendDate').html(data.purchaseValidityendDate);
                $('#purchaseNumber').html(data.purchaseNumber);
                $('#purchaseAmount').html('<span class="amount-format">' + data.purchaseAmount + '</span>');
                $('#paidAmount').html('<span class="amount-format">' + data.paidAmount + '</span>');
                $('#balanceAmount').html('<span class="amount-format">' + data.balanceAmount + '</span>');

                if (data.status == 'unpaid') {
                    $('.paymentForm').removeClass('d-none');
                } else {
                    $('.paymentForm').addClass('d-none');
                }

                if (data.purchaseBill) {
                    $('#purchaseBill').html('<a href="' + '<?php echo base_url(); ?>' + data.purchaseBill + '" target="_blank" class="doc-hover">View Purchase Bill</a>');
                    $('.purchaseBill').removeClass('d-none');
                } else {
                    $('.purchaseBill').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });
    
    $(document).on('input', '.paymentAmountInput', function () {
        var purchaseAmount = parseInt($('.purchaseAmountValue').val()); // Correctly selecting the element
        var paymentAmount = parseFloat($(this).val());

        if (paymentAmount > purchaseAmount) {
            $(this).val(purchaseAmount); // Restricting the input to available stock
        }
    });
    
    // Estimation Save Function
    $("#partyPaymentForm").validate({
        rules: {
            payment_date: {
                required: true
            },
            payment_amount: {
                required: true
            },
            payment_method: {
                required: true
            }
        },
        messages: {
            payment_date: {
                required: "Please Select Payment Date",
            },
            payment_amount: {
                required: "Please Enter Payment Method",
            },
            payment_method: {
                required: "Please Enter Payment Method",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#partyPaymentForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>bill/partyPaymentFormSave',
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
                            window.location.href = "<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>