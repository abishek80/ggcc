<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Branch Project List</h4>
                <a href="<?php echo base_url(); ?>outlet/branch-project-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Branch Project</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone & Branch Name</th>
                            <th>Not Started Proj. Count</th>
                            <th>Active Proj. Count</th>
                            <th>Completed Proj. Count</th>
                            <th>Overall Proj. Count</th>
                            <th class="w-min-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($allBranchProjectList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-0"><?php echo $row->zone; ?></p>
                                <p class="mb-0"><?php echo $row->branch; ?></p>
                            </td>
                            <td>
                                <div class="mb-2 border-bottom pb-2 d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">HPCL </p>
                                    <p class="mb-0"><?php echo $row->hpcl_notstarted_project_count; ?></p>
                                </div>
                                <div class="d-flex gap-2 align-items-center justify-content-between">
                                    <p class="mb-0">Private </p>
                                    <p class="mb-0"><?php echo $row->private_notstarted_project_count; ?></p>
                                </div>
                            </td>
                            <td>
                                <p class="mb-2 border-bottom pb-2 text-center"><?php echo $row->hpcl_ongoing_project_count; ?></p>
                                <p class="mb-0 text-center"><?php echo $row->private_ongoing_project_count; ?></p>
                            </td>
                            <td>
                                <p class="mb-2 border-bottom pb-2 text-center"><?php echo $row->hpcl_completed_project_count; ?></p>
                                <p class="mb-0 text-center"><?php echo $row->private_completed_project_count; ?></p>
                            </td>
                            <td>
                                <p class="mb-2 border-bottom pb-2 text-center"><?php echo $row->hpcl_overall_project_count; ?></p>
                                <p class="mb-0 text-center"><?php echo $row->private_overall_project_count; ?></p>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-2 justify-content-center flex-column">
                                    <a href="<?php echo base_url() . 'outlet/branch-project-view/hpcl/' . $row->branch_id; ?>" class="a-hover border-bottom pb-2"> HPCL </a>
                                    <a href="<?php echo base_url() . 'outlet/branch-project-view/private/' . $row->branch_id; ?>" class="a-hover"> Private </a>
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