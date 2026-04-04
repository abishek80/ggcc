<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="text-center border-bottom mb-3 pb-3 sticky-head">
                <div class=" d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $partyName; ?> - Purchase Detail</h4>
                    </div>
                    <a href="<?php echo base_url() . 'bill/party-payment-edit/' . $partyPaymentId; ?>" class="btn btn-info px-4 py-2 rounded text-white">Edit Pettycash</a>
                </div>
            </div>
            <div class="row g-3 text-center">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Bill Zone</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $purchaseZone; ?></h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Bill Date</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $purchaseDate; ?></h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Bill Validity End Date</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $purchaseValidityendDate; ?></h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Bill Number</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $purchaseNumber; ?></h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Bill Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $purchaseAmount; ?></h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Paid Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $paidAmount; ?></h5>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Balance Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $balanceAmount; ?></h5>
                </div>
                <?php if($purchaseBill) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <p class="mb-2">Bill document</p>
                        <h5 class="mb-0 fw-semibold"><a href="<?php echo base_url() . $purchaseBill; ?>" target="_blank" class="doc-hover">View Purchase Bill</a></h5>
                    </div>
                <?php } ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <p class="mb-2">Status</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $status; ?></h5>
                </div>
            </div>
        </div>
        <div class="nav-align-top mt-4">
            <div class="card card-body mb-5">
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Payment Date</th>
                                <th>Payment Amount</th>
                                <th>Payment Method</th>
                                <th class="w-min-50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach ($paymentReportList as $row) { 
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->payment_dateFormat; ?></td>
                                    <td><?php echo $row->payment_amount; ?></td>
                                    <td><?php echo $row->payment_method; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="javascript:void(0);" data-partypaymentid="<?php echo $row->party_payment_id; ?>" data-partypaymenttable="party_payment" data-partypaymentreceivedid="<?php echo $row->id; ?>" data-partypaymentreceivedtable="party_payment_received" data-link="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="box-hover trashPartyPaymentItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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