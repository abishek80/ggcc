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
        <h4 class="fw-bold mb-3 pt-2 text-black text-capitalize">Purchase Order List - <?php echo $companyName; ?></h4>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone & Branch Name</th>
                            <th>Purchase Order Amt</th>
                            <th>Security Amt</th>
                            <th>Est Amt</th>
                            <th>Tax Amt</th>
                            <th>Retention Amt</th>
                            <th>Balance Amt</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($allBranchPurchaseOrderList as $row) { 
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->zone; ?></p>
                                    <p class="mb-0"><a href="<?php echo base_url() . 'purchase/po-view/' . $companyName . '/' . $row->id; ?>" class="a-hover"><?php echo $row->branch; ?></a></p>
                                </td>
                                <td class="amount-format"><?php echo $row->branch_po_amount; ?></td>
                                <td class="amount-format"><?php echo $row->security_amount; ?></td>
                                <td class="amount-format"><?php echo $row->branch_estimation_amount; ?></td>
                                <td class="amount-format"><?php echo $row->branch_taxinvoice_amount; ?></td>
                                <td class="amount-format"><?php echo $row->branch_retention_amount; ?></td>
                                <td class="amount-format"><?php echo $row->branch_balance_po_amount; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'purchase/po-view/' . $companyName . '/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
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