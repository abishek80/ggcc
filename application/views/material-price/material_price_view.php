<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Material Code</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $materialCode; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Material Name</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $materialName; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Material Category</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $materialCategory; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Material Type</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $materialType; ?></h5>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'stock/material-price-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Material Price List</h4>
                </div>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'stock/material-price-add/' . $materialId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Material Price</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone</th>
                            <th>Branch</th>
                            <th>Date</th>
                            <th>Vendor Name</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;

                            // Step 1: Get all amounts
                            $amounts = array_map(function($item) {
                                return $item->amount;
                            }, $materialPriceList);

                            // Step 2: Find min and max amount
                            $minAmount = min($amounts);
                            $maxAmount = max($amounts);

                            // Step 3: Loop and apply classes
                            foreach ($materialPriceList as $row) {
                                $amountClass = '';
                                if ($row->amount == $minAmount) {
                                    $amountClass = 'text-success'; // Lowest
                                } elseif ($row->amount == $maxAmount) {
                                    $amountClass = 'text-danger';  // Highest
                                } else {
                                    $amountClass = 'text-danger';  // Highest
                                }
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->zone; ?></td>
                            <td><?php echo $row->branch_name; ?></td>
                            <td><?php echo $row->dateFormat; ?></td>
                            <td><?php echo $row->vendor_name; ?></td>
                            <td class="amount-format <?php echo $amountClass; ?>"><?php echo $row->amount; ?></td>
                            <td><?php echo $row->remarks; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'stock/material-price-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="material_price" data-link="<?php echo base_url() . 'stock/material-price-view/' . $row->material_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </a>
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