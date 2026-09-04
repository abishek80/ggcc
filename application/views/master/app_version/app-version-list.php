<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>master/app-version-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>master/app-version-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>master/app-version-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">App Version List</h4>
                <a href="<?php echo base_url(); ?>master/app-version-add" class="btn btn-primary px-4 py-2 rounded text-white">Add App Version</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Platform</th>
                            <th>Latest Version</th>
                            <th>Force Update</th>
                            <th>Update URL</th>
                            <th>Release Notes</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($appVersionList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><span class="badge bg-label-info text-capitalize"><?php echo $row->platform; ?></span></td>
                            <td><strong><?php echo $row->latest_version; ?></strong></td>
                            <td>
                                <?php if($row->is_force == 1) { ?>
                                    <span class="badge bg-danger text-white">Yes (Force)</span>
                                <?php } else { ?>
                                    <span class="badge bg-secondary text-white">No (Soft)</span>
                                <?php } ?>
                            </td>
                            <td class="text-truncate" style="max-width: 150px;" title="<?php echo $row->update_url; ?>">
                                <a href="<?php echo $row->update_url; ?>" target="_blank"><?php echo $row->update_url; ?></a>
                            </td>
                            <td class="text-truncate" style="max-width: 150px;" title="<?php echo $row->release_notes; ?>">
                                <?php echo $row->release_notes ?: '-'; ?>
                            </td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="app_version_control" data-link="<?php echo base_url(); ?>master/app-version-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } elseif($row->status == 'inactive') { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="app_version_control" data-link="<?php echo base_url(); ?>master/app-version-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td><?php echo $row->employee_name ?: 'System'; ?></td>
                            <td><?php echo $row->created_at; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
