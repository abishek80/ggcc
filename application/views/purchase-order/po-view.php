<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card px-3 pb-3">
            <div class="text-center border-bottom mb-3 pt-3 pb-2 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'purchase/po-list/' . $companyName; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $branchZone . ' - ' . $branchName; ?> Purchase Order</h4>
                </div>
            </div>
            <div class="row g-3 text-center">
                <div class="col-lg col-md-4 col-sm-6">
                    <label class="w-100 text-black mb-2">Purchase Order Amount</label>
                    <h5 class="mb-0 amount-format"><?php echo $overallPoAmount; ?></h5>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <label class="w-100 text-black mb-2">Balance Amount</label>
                    <h5 class="mb-0 amount-format"><?php echo $balancePoAmount; ?></h5>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <label class="w-100 text-black mb-2">Security Amount</label>
                    <h5 class="mb-0 amount-format"><?php echo $overallSecurityAmount; ?></h5>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <label class="w-100 text-black mb-2">Estimation Amount</label>
                    <h5 class="mb-0 amount-format"><?php echo $overallEstimationAmount; ?></h5>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <label class="w-100 text-black mb-2">Taxinvoice Amount</label>
                    <h5 class="mb-0 amount-format"><?php echo $overallTaxinvoiceAmount; ?></h5>
                </div>
                <div class="col-lg col-md-4 col-sm-6">
                    <label class="w-100 text-black mb-2">Bill Amount</label>
                    <h5 class="mb-0 amount-format"><?php echo $overallRetentionAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card mt-3 p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $companyName; ?> Purchase Orders</h4>
                <a href="<?php echo base_url() . 'purchase/po-bill-add/' . $companyName . '/' . $branchId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Purchase Order</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-30">S. No</th>
                            <th>PO Date & PO End Date</th>
                            <th>PO Number & Title</th>
                            <th>PO Amt</th>
                            <th>Balance Amt</th>
                            <th>Security Amt</th>
                            <th>Estimation Amt</th>
                            <th>Taxinvoice Amt</th>
                            <th>Retention Amt</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($purchaseOrderList as $row) { 
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->po_dateFormat; ?></p>
                                    <p class="mb-0 date-check" data-date-check="<?php echo $row->validity_end; ?>"><?php echo $row->validity_endFormat; ?></p>
                                </td>
                                <td>
                                    <p class="mb-1"><?php echo $row->purchase_order_no; ?></p>
                                    <p class="mb-0"><?php echo $row->poTitle; ?></p>
                                </td>
                                <td class="amount-format"><?php echo $row->po_amount; ?></td>
                                <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                <td class="amount-format"><?php echo $row->security_amount; ?></td>
                                <td class="amount-format"><?php echo $row->estimation_amount; ?></td>
                                <td class="amount-format"><?php echo $row->taxinvoice_amount; ?></td>
                                <td class="amount-format"><?php echo $row->retention_amount; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center flex-wrap">
                                        <a href="<?php echo base_url() . 'purchase/po-detail/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                        <a href="<?php echo base_url() . 'purchase/po-bill-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="purchase_order" data-link="<?php echo base_url() . 'purchase/po-view/' . $row->company_name . '/' . $branchId; ?>" class="box-hover trashPurchaseOrder" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="purchase_order" data-link="<?php echo base_url() . 'purchase/po-view/' . $row->company_name . '/' . $branchId; ?>" class="box-hover completePurchaseOrder" data-toggle="tooltip" data-placement="top" title="Completed"> <i class="bx bx-check-circle"></i> </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($completePurchaseOrderList) { ?>
            <div class="card mt-3 p-3">
                <div class="d-flex justify-content-center align-items-center border-bottom mb-3 pb-3">
                    <h4 class="fw-bold mb-0 text-black py-2 text-capitalize"><?php echo $companyName; ?> Completed Purchase Orders</h4>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>P.O Date</th>
                                <th>P.O End Date</th>
                                <th>P.O Number</th>
                                <th>P.O Title</th>
                                <th>P.O Amt</th>
                                <th>Security Amt</th>
                                <th>Estimation Amt</th>
                                <th>Taxinvoice Amt</th>
                                <th>Balance Amt</th>
                                <th class="w-min-50">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach ($completePurchaseOrderList as $row) { 
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->po_dateFormat; ?></td>
                                    <td><?php echo $row->validity_endFormat; ?></td>
                                    <td><?php echo $row->purchase_order_no; ?></td>
                                    <td><?php echo $row->poTitle; ?></td>
                                    <td class="amount-format"><?php echo $row->po_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->security_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->estimation_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->taxinvoice_amount; ?></td>
                                    <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="<?php echo base_url() . 'purchase/po-report/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</section>