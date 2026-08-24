<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>admin/branch-visit-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $branchName; ?> Visit List</h4>
                </div>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'admin/branch-visit-add/' . $branchId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Branch Visit</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($branchVisitList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->dateFormat; ?></td>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo $row->remark; ?></td>
                                <td><?php echo $row->status; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'admin/branch-visit-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="branch_visit" data-link="<?php echo base_url() . 'admin/branch-visit-view/' . $branchId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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