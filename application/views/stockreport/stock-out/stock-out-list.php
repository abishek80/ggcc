<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Stock Outward List</h4>
                <a href="<?php echo base_url(); ?>stock/stock-out-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Stock Outward</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Branch</th>
                            <th>Used To</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($stockOutList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->material_code; ?></td>
                            <td><?php echo $row->material_name; ?></td>
                            <td><?php echo $row->category; ?></td>
                            <td><?php echo $row->type; ?></td>
                            <td><?php echo $row->stockdate; ?></td>
                            <td><?php echo $row->from_branch_name; ?></td>
                            <td><?php echo $row->method . ' - ' . ($row->to_branch_name ? $row->to_branch_name : $row->outlet_name); ?></td>
                            <td><?php echo $row->quantity; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-2">
                                    <a href="<?php echo base_url() . 'stock/stock-out-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="stock_transaction" data-link="<?php echo base_url(); ?>stock/stock-out-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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