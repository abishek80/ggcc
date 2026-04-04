<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center border-primary border border-4 border-end-0 border-start-0 border-top-0">
                    <p class="mb-3">Purchase Order Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $poAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center border-danger border border-4 border-end-0 border-start-0 border-top-0">
                    <p class="mb-3">Balance Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $balanceAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center border-info border border-4 border-end-0 border-start-0 border-top-0">
                    <p class="mb-3">Estimation Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $estimationAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center border-warning border border-4 border-end-0 border-start-0 border-top-0">
                    <p class="mb-3">Tax Invoice Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $taxinvoiceAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center border-success border border-4 border-end-0 border-start-0 border-top-0">
                    <p class="mb-3">Bill Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $retentionAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center bg-label-success">
                    <p class="mb-3 text-black">Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallReceivedAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center bg-label-blue">
                    <p class="mb-3 text-black">Tax Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallTDSAmount + $overallWCTAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center bg-label-warning">
                    <p class="mb-3 text-black">Retention Money</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallRetentionMoney; ?></h5>
                </div>
            </div>
            <div class="col-lg col-md-4 col-6">
                <div class="card p-3 text-center bg-label-danger">
                    <p class="mb-3 text-black">Hold Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallHoldAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
            <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'purchase/po-view/' . $companyName . '/' . $branchId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $purchaseOrderNo; ?> Purchase Report</h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url() . 'purchase/po-bill-edit/' . $poId; ?>" class="btn btn-info px-4 py-2 rounded border-0 fw-bold text-white">Edit</a>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">PO Company Name</label>
                    <p class="text-capitalize mb-0"><?php echo $companyName; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Branch Name</label>
                    <p class="text-capitalize mb-0"><?php echo $zone  . ' - ' . $branchName; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Purchase Order Date</label>
                    <p class="text-capitalize mb-0"><?php echo $poDate; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Validity End Date</label>
                    <p class="text-capitalize mb-0"><?php echo $validityEnd; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Purchase Order Number</label>
                    <p class="text-capitalize mb-0"><?php echo $purchaseOrderNo; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Purchase Order Title</label>
                    <p class="text-capitalize mb-0"><?php echo $poTitle; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Purchase Order Amount</label>
                    <p class="text-capitalize mb-0 amount-format"><?php echo $poAmount; ?></p>
                </div>
                <?php if($purchaseOrderLetter) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Purchase Order Letter</label>
                        <p class="text-capitalize mb-0"><a href="<?php echo base_url() . $purchaseOrderLetter; ?>" class="iframe-popup doc-hover">View Letter</a></p>
                    </div>
                <?php } ?>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Security Amount</label>
                    <p class="text-capitalize mb-0 amount-format"><?php echo $securityAmount; ?></p>
                </div>
                <?php if($securityAmountReceiptImg) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Security Amt. Receipt Doc</label>
                        <p class="text-capitalize mb-0"><a href="<?php echo base_url() . $securityAmountReceiptImg; ?>" class="iframe-popup doc-hover">View Receipt</a></p>
                    </div>
                <?php } ?>
                <?php if($securityAmountDDImg) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Security Amt. DD Doc</label>
                        <p class="text-capitalize mb-0"><a href="<?php echo base_url() . $securityAmountDDImg; ?>" class="iframe-popup doc-hover">View DD</a></p>
                    </div>
                <?php } ?>
                <?php if($vendorCode) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vendor Code</label>
                        <p class="text-capitalize mb-0"><?php echo $vendorCode; ?></p>
                    </div>
                <?php } ?>
                <?php if($panNumber) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">PAN Number</label>
                        <p class="text-capitalize mb-0"><?php echo $panNumber; ?></p>
                    </div>
                <?php } ?>
                <?php if($gstNumber) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">GST Number</label>
                        <p class="text-capitalize mb-0"><?php echo $gstNumber; ?></p>
                    </div>
                <?php } ?>
                <?php if($gstPercentage) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">GST Percentage</label>
                        <p class="text-capitalize mb-0"><?php echo $gstPercentage; ?> %</p>
                    </div>
                <?php } ?>
                <?php if($hpclGstNumber) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">HPCL GST Number</label>
                        <p class="text-capitalize mb-0"><?php echo $hpclGstNumber; ?></p>
                    </div>
                <?php } ?>
                <?php if($hpclAddress) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">HPCL Address</label>
                        <p class="text-capitalize mb-0"><?php echo $hpclAddress; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="nav-align-top mt-4">
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item me-2">
                        <button type="button" class="px-5 nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#estimation_bill" aria-controls="estimation_bill" aria-selected="true"> Estimation Bill </button>
                    </li>
                    <li class="nav-item me-2">
                        <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tax_invoice" aria-controls="tax_invoice" aria-selected="true"> Tax Invoice </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#retention_money" aria-controls="retention_money" aria-selected="true"> Retention Money </button>
                    </li>
                </ul>
                <a href="<?php echo base_url() . 'purchase/estimation-bill-add/' . $poId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Estimation Bill</a>
            </div>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="estimation_bill" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <h4 class="fw-bold mb-0 text-black">Estimation Bill</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Estimation Date</th>
                                    <th>Estimation Number</th>
                                    <th>Estimation File</th>
                                    <th>Estimation Amount</th>
                                    <th class="w-min-50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($estimationBillList as $row) { 
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->estimation_date; ?></td>
                                        <td><?php echo $row->estimation_number; ?></td>
                                        <td>
                                            <?php if($row->job_report) { ?>
                                                <a href="<?php echo base_url() . $row->job_report; ?>" class="iframe-popup doc-hover">View Job Report</a>
                                            <?php } else { ?>
                                                -
                                            <?php } ?>
                                        </td>
                                        <td class="amount-format"><?php echo $row->estimation_amount; ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="javascript:void(0);" class="box-hover getEstimationId" data-estimationid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                                <a href="<?php echo base_url() . 'purchase/estimation-bill-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="estimation_bill" data-link="<?php echo base_url() . 'purchase/po-detail/' . $row->po_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tax_invoice" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <h4 class="fw-bold mb-0 text-black">Tax Invoice</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Est Date</th>
                                    <th>Est No</th>
                                    <th>Invoice Date</th>
                                    <th>Invoice Number</th>
                                    <th>Callup Number</th>
                                    <th>Tax Invoice Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($taxinvoiceList as $row) { 
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->estimation_date; ?></td>
                                        <td><?php echo $row->estimation_number; ?></td>
                                        <td><?php echo $row->taxinvoice_date; ?></td>
                                        <td><?php echo $row->taxinvoice_number; ?></td>
                                        <td><?php echo $row->callup_number; ?></td>
                                        <td class="amount-format"><?php echo $row->taxinvoice_amount; ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="javascript:void(0);" class="box-hover getEstimationId" data-estimationid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                                <a href="<?php echo base_url() . 'purchase/estimation-bill-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-link="<?php echo base_url() . 'purchase/po-detail/' . $row->po_id; ?>" class="box-hover trashRetentionMoney" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="retention_money" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                        <h4 class="fw-bold mb-0 text-black">Retention Money</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Received Date</th>
                                    <th>Retention Date</th>
                                    <th>Received Amount</th>
                                    <th>TDS Amount</th>
                                    <th>WCT Amount</th>
                                    <th>Retention Money</th>
                                    <th>Hold Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($retentionList as $row) { 
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->received_dateFormat; ?></td>
                                        <td><?php echo $row->retention_dateFormat; ?></td>
                                        <td class="amount-format"><?php echo $row->received_amount; ?></td>
                                        <td><?php echo $row->tds_amount; ?></td>
                                        <td><?php echo $row->wct_amount; ?></td>
                                        <td class="amount-format"><?php echo $row->retention_amount; ?></td>
                                        <td><?php echo $row->hold_amount; ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="javascript:void(0);" class="box-hover getEstimationId" data-estimationid="<?php echo $row->estimation_id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                                <a href="<?php echo base_url() . 'purchase/estimation-bill-edit/' . $row->estimation_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->estimation_id; ?>" data-link="<?php echo base_url() . 'purchase/po-detail/' . $row->po_id; ?>" class="box-hover trashRetentionMoney" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
                        <label class="w-100 fw-bold text-black mb-1">Purchase Order Date</label>
                        <div id="purchaseDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Validity End Date</label>
                        <div id="validityEnd" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Order Number</label>
                        <div id="purchaseNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Order Title</label>
                        <div id="purchaseTitle" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Purchase Order Amount</label>
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
                        <form id="taxinvoiceForm" method="post" class="mt-3 row g-3 taxinvoiceForm d-none">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="estimationId"></div>
                                <div class="purchaseId"></div>
                                <label class="w-100 fw-bold text-black mb-1">Invoice Date <span class="text-danger">*</span></label>
                                <input name="invoice_date" id="invoice_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Callup Number <span class="text-danger">*</span></label>
                                <input name="callup_number" id="callup_number" type="text" class="form-control" placeholder="Enter Callup Number">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Document</label>
                                <input name="invoice_doc" id="invoice_doc" type="file" class="form-control">
                                <input type="hidden" name="alter_invoice_doc">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Number <span class="text-danger">*</span></label>
                                <input name="invoice_number" id="invoice_number" type="text" class="form-control" placeholder="Enter Invoice Number">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Net Amount <span class="text-danger">*</span></label>
                                <input name="net_amount" id="net_amount" type="number" class="form-control" placeholder="Enter Net Amount">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Invoice Amount <span class="text-danger">*</span></label>
                                <div id="invoiceAmountInput"></div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                    <a href="<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Convert Tax</button>
                                </div>
                            </div>
                        </form>
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
                        </div>
                        <form id="taxAmountReceivedForm" method="post" class="row g-3 mt-3 taxAmountReceivedForm d-none">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="retentionId"></div>
                                <div class="estimationId"></div>
                                <label class="w-100 fw-bold text-black mb-1">Received Date <span class="text-danger">*</span></label>
                                <input name="received_date" id="received_date" type="date" class="form-control date-picker receivedDate" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Retention Date <span class="text-danger">*</span></label>
                                <input name="retention_date" id="retention_date" type="date" class="form-control date-picker retentionMoneyDate" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Received Amount <span class="text-danger">*</span></label>
                                <input name="received_amount" id="received_amount" type="number" class="form-control decimal" placeholder="Enter Received Amount">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">TDS Amount (1%) <span class="text-danger">*</span></label>
                                <input name="tds_amount" id="tds_amount" type="number" class="form-control decimal" placeholder="Enter TDS Amount">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">WCT Amount (2%) <span class="text-danger">*</span></label>
                                <input name="wct_amount" id="wct_amount" type="number" class="form-control decimal" placeholder="Enter WCT Amount">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Retention Amount <span class="text-danger">*</span></label>
                                <input name="retention_amount" id="retention_amount" type="number" class="form-control decimal" placeholder="Enter Retention Amount">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Hold Amount <span class="text-danger">*</span></label>
                                <input name="hold_amount" id="hold_amount" type="number" class="form-control decimal" placeholder="Enter Hold Amount">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Amount Received Bank <span class="text-danger">*</span></label>
                                <select name="bank_name" id="bank_name" type="text" class="form-select">
                                    <option value="">Select Received Bank</option>
                                    <option value="tmbl">TMBL</option>
                                    <option value="idbi">IDBI</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Retention Document</label>
                                <input name="retention_doc" id="retention_doc" type="file" class="form-control">
                                <input type="hidden" name="alter_retention_doc">
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-6">
                                <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                    <a href="<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Amount Received</button>
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
    function calculateAmounts() {

        var invoiceAmount = parseFloat($("#invoiceAmount").text()) || 0;
        var receivedAmount = parseFloat($("#received_amount").val()) || 0;

        if (receivedAmount > invoiceAmount) {
            $("#received_amount").val(invoiceAmount);
            receivedAmount = invoiceAmount;
        }

        // Auto calculate tax
        var tds = (invoiceAmount * 1) / 100;
        var wct = (invoiceAmount * 2) / 100;

        $("#tds_amount").val(tds.toFixed(2));
        $("#wct_amount").val(wct.toFixed(2));

        // Balance after received + tax
        var balance = invoiceAmount - receivedAmount - tds - wct;

        if (balance < 0) balance = 0;

        var retention = parseFloat($("#retention_amount").val()) || 0;

        if (retention > balance) {
            retention = balance;
            $("#retention_amount").val(balance.toFixed(2));
        }

        var hold = balance - retention;

        $("#hold_amount").val(hold.toFixed(2));
    }


    // Trigger when received amount changes
    $(document).on("keyup change", "#received_amount", function () {
        calculateAmounts();
    });

    // Trigger when retention amount changes
    $(document).on("keyup change", "#retention_amount", function () {
        calculateAmounts();
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
                $('.retentionId').html('<input type="hidden" id="retention_id" name="retention_id" value="' + data.retentionId + '">');
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
                $('#estimationAmount').html('<span class="amount-format">' + data.estimationAmount + '</span>');
                $('#invoiceAmountInput').html('<input name="invoice_amount" id="invoice_amount" type="number" class="form-control" value="' + data.estimationAmount + '" placeholder="Enter Invoice Amount">');

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
                if (data.status == 'estimation') {
                    $('.taxinvoiceForm').removeClass('d-none');
                } else {
                    $('.taxinvoiceForm').addClass('d-none');
                }
                if (data.status == 'taxinvoice') {
                    $('.taxAmountReceivedForm').removeClass('d-none');
                } else {
                    $('.taxAmountReceivedForm').addClass('d-none');
                }

            }
        });
        e.preventDefault();
        return false;
    });
    
    // Get Estimation Amount
    function getEstimationAmount() {
        return parseFloat($("#estimationAmount").text().replace(/,/g, '').trim()) || 0;
    }

    // Prevent entering amount greater than estimation
    $(document).on("input", "#net_amount, #invoice_amount", function () {

        var estimation = getEstimationAmount();
        var value = parseFloat($(this).val()) || 0;

        if (value > estimation) {
            $(this).val(estimation);
        }

    });
    // Taxinvoice Save Function
    $("#taxinvoiceForm").validate({
        rules: {
            invoice_date: {
                required: true
            },
            callup_number: {
                required: true
            },
            invoice_number: {
                required: true
            },
            net_amount: {
                required: true
            },
            invoice_amount: {
                required: true
            }
        },
        messages: {
            invoice_date: {
                required: "Please Select Invoice Date",
            },
            callup_number: {
                required: "Please Select Callup Number",
            },
            invoice_number: {
                required: "Please Enter Invoice Number",
            },
            net_amount: {
                required: "Please Select Net Amount",
            },
            invoice_amount: {
                required: "Please Enter Invoice Amount",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#taxinvoiceForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>purchase/taxinvoiceFormSave',
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
                            window.location.href = "<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });

    // tax Amount Received Form Save Function
    $("#taxAmountReceivedForm").validate({
        rules: {
            received_date: {
                required: true
            },
            retention_date: {
                required: true
            },
            received_amount: {
                required: true
            },
            tds_amount: {
                required: true
            },
            wct_amount: {
                required: true
            },
            retention_amount: {
                required: true
            },
            hold_amount: {
                required: true
            },
            bank_name: {
                required: true
            }
        },
        messages: {
            received_date: {
                required: "Please Select Received Date",
            },
            retention_date: {
                required: "Please Select Retention Date",
            },
            received_amount: {
                required: "Please Enter Received Amount",
            },
            tds_amount: {
                required: "Please Enter TDS Amount",
            },
            wct_amount: {
                required: "Please Enter WCT Amount",
            },
            retention_amount: {
                required: "Please Enter Retention Amount",
            },
            hold_amount: {
                required: "Please Enter Hold Amount",
            },
            bank_name: {
                required: "Please Enter Amount Received Bank",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#taxAmountReceivedForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>purchase/taxAmountReceivedFormSave',
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
                            window.location.href = "<?php echo base_url() . 'purchase/po-detail/' . $poId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>