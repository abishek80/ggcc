<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Thirdparty Name & Remarks</p>
                    <h6 class="mb-2 fs-5 fw-semibold"><?php echo $thirdpartyName; ?></h6>
                    <h6 class="mb-0 fs-5 fw-semibold"><?php echo $thirdpartyRemarks; ?></h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Loan Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $loanAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $receivedAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Not Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $notreceivedAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="nav-align-top mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item me-2">
                        <button type="button" class="px-5 nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#notreceived_list" aria-controls="notreceived_list" aria-selected="true"> Loan Taken List </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#received_list" aria-controls="received_list" aria-selected="true"> Received List </button>
                    </li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'loan/thirdparty-loan-add/' . $thirdpartyId ; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Loan</a>
                    <a href="<?php echo base_url() . 'loan/thirdparty-loan-received-add/' . $thirdpartyId ; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Loan Received</a>
                    <a href="<?php echo base_url() . 'loan/thirdparty-loan-report/' . $thirdpartyId ; ?>" target="_blank" class="btn btn-primary px-4 py-2 rounded text-white">Loan Report</a>
                </div>
            </div>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="notreceived_list" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <div class="d-flex gap-2 align-items-center">
                            <a href="<?php echo base_url() . 'loan/thirdparty-loan-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                            <h4 class="fw-bold mb-0 text-black"><?php echo $thirdpartyName; ?> - Loan Taken List</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th class="w-min-40">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($loanList as $row) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->advancecash_date; ?></td>
                                        <td class="amount-format"><?php echo $row->advancecash_amount; ?></td>
                                        <td><?php echo $row->remarks; ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="<?php echo base_url() . 'loan/thirdparty-loan-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="advancecash_loan" data-link="<?php echo base_url() . 'loan/thirdparty-loan-view/' . $thirdpartyId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="received_list" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <div class="d-flex gap-2 align-items-center">
                            <a href="<?php echo base_url() . 'loan/thirdparty-loan-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                            <h4 class="fw-bold mb-0 text-black"><?php echo $thirdpartyName; ?> - Received List</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th class="w-min-40">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    foreach ($loanReceivedList as $row) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->received_date; ?></td>
                                        <td class="amount-format"><?php echo $row->received_amount; ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="<?php echo base_url() . 'loan/thirdparty-loan-received-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="advancecash_received" data-link="<?php echo base_url() . 'loan/thirdparty-loan-view/' . $thirdpartyId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
    </div>
</section>