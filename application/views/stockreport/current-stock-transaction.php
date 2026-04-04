<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>stock/current-stock-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $materialName; ?> - Stock Transaction</h4>
                </div>
                <a href="<?php echo base_url(); ?>stock/current-stock-list" class="btn btn-dark px-4 py-2 rounded text-white">Go Back</a>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Material Code</label>
                    <p class="mb-0 text-capitalize"><?php echo $materialCode; ?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Material Name</label>
                    <p class="mb-0 text-capitalize"><?php echo $materialName; ?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Material Category</label>
                    <p class="mb-0 text-capitalize"><?php echo $materialCategory; ?></p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Material Type</label>
                    <p class="mb-0 text-capitalize"><?php echo $materialType; ?></p>
                </div>
            </div>
            <div class="row g-3 mt-1">
                <?php if($overallStockinQty >= 0 && $overallStockinQty != '') { ?>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Overall Stockin Qty</label>
                    <h5 class="mb-0 text-capitalize"><?php echo $overallStockinQty; ?></h5>
                </div>
                <?php } ?>
                <?php if($overallStockoutQty >= 0 && $overallStockoutQty != '') { ?>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Overall Stockout Qty</label>
                    <h5 class="mb-0 text-capitalize"><?php echo $overallStockoutQty; ?></h5>
                </div>
                <?php } ?>
                <?php if($overallAvailableQty >= 0 && $overallAvailableQty != '') { ?>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Overall Available Qty</label>
                    <h5 class="mb-0 text-capitalize"><?php echo $overallAvailableQty; ?></h5>
                </div>
                <?php } ?>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Date</th>
                            <th>Branch</th>
                            <th>Transaction Type</th>
                            <th>Transaction Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($stockTransactionList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->stockdate; ?></td>
                            <td><?php echo $row->branch_name; ?></td>
                            <td>
                                <?php if($row->type == 'stockin') { ?>
                                    <?php if($row->method == 'transfer') { ?>
                                        <?php echo 'Transfer - ' . $row->to_branch_name; ?>
                                    <?php } else { ?>
                                        <?php echo 'Shop - ' . $row->method; ?>
                                    <?php } ?>
                                <?php } elseif ($row->type == 'stockout') { ?>
                                    <?php echo $row->method . ' - ' . ($row->to_branch_name ? $row->to_branch_name : $row->outlet_name); ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($row->type == 'stockin') { ?>
                                    <span class="text-success"><?php echo '+' . $row->quantity; ?></span>
                                <?php } elseif ($row->type == 'stockout') { ?>
                                    <span class="text-danger"><?php echo '-' . $row->quantity; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>