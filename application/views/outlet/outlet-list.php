<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Outlet List</h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <a href="<?php echo base_url(); ?>outlet/outlet-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Outlet</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone</th>
                            <th>Branch Name</th>
                            <th class="text-center">Outlet Count</th>
                            <th class="w-min-50 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($branchOutletSummary as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td class="text-capitalize"><?php echo $row->zone; ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'outlet/branch-outlet-list/' . $row->branch_id; ?>" class="fw-semibold text-primary">
                                    <?php echo $row->branch_name; ?>
                                </a>
                            </td>
                            <td class="text-center"><?php echo $row->outlet_count; ?></td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'outlet/branch-outlet-list/' . $row->branch_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View Outlets">
                                        <i class="bx bx-show-alt fs-5"></i>
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