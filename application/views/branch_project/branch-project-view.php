<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'outlet/branch-project-list/'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $branchName; ?> - <?php if($projectCategory == 'hpcl') { echo 'HPCL'; } else { echo 'Private'; }?> Project List</h4>
                </div>
                <a href="<?php echo base_url() . 'outlet/branch-project-add/' . $projectCategory . '/' . $branchId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Branch Project</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Project Type</th>
                            <th>Not Started Project Count</th>
                            <th>Active Project Count</th>
                            <th>Completed Project Count</th>
                            <th>Overall Project Count</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($projectCategoryList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->project_type_name; ?></td>
                            <td><?php echo $row->notstarted_project_count; ?></td>
                            <td><?php echo $row->ongoing_project_count; ?></td>
                            <td><?php echo $row->completed_project_count; ?></td>
                            <td><?php echo $row->overall_project_count; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'outlet/branch-project-detail/' . $projectCategory . '/' . $branchId . '/' . $row->project_type_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
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