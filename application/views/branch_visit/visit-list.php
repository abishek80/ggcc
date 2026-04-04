<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Branch Visit List</h4>
                <a href="<?php echo base_url() . 'branch-visit-add/' . $activeLink; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Branch Visit</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone</th>
                            <th>Branch</th>
                            <th>Recent Visit Date</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $i=1;
                            foreach ($branchRecentVisitList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->zone; ?></td>
                            <td><a href="<?php echo base_url() . 'branch-visit-view/' . $row->branch_id; ?>" class="a-hover"><?php echo $row->branch; ?></a></td>
                            <td><?php echo $row->visit_dateFormat; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'branch-visit-view/' . $row->branch_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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