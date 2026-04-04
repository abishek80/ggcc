<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Material Price List</h4>
                <a href="<?php echo base_url(); ?>stock/material-price-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Material Price</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Material Code <br> Material Name</th>
                            <th>Material Category <br> Material Type</th>
                            <th>Zone <br> Branch</th>
                            <th>Date</th>
                            <th>Vendor Name</th>
                            <th>Price Amount</th>
                            <th>Remarks</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($materialVendorList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-2"><a href="<?php echo base_url() . 'stock/material-price-view/' . $row->material_id; ?>" class="a-hover d-blocm,"><?php echo $row->material_code; ?></a></p>
                                <p class="mb-0"><a href="<?php echo base_url() . 'stock/material-price-view/' . $row->material_id; ?>" class="a-hover d-blocm,"><?php echo $row->material_name; ?></a></p>
                            </td>
                            <td>
                                <p class="mb-2"><?php echo $row->material_category; ?></p>
                                <p class="mb-0"><?php echo $row->material_type; ?></p>
                            </td>
                            <td>
                                <p class="mb-2"><?php echo $row->zone; ?></p>
                                <p class="mb-0"><?php echo $row->branch_name; ?></p>
                            </td>
                            <td><?php echo $row->dateFormat; ?></td>
                            <td><?php echo $row->vendor_name; ?></td>
                            <td class="amount-format"><?php echo $row->amount; ?></td>
                            <td><?php echo $row->remarks; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'stock/material-price-view/' . $row->material_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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