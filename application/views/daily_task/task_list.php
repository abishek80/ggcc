<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'employee/daily-task/'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $employeeName; ?> - Task List</h4>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="<?php echo base_url(); ?>employee/daily-task-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Daily Task</a>
                    <a href="<?php echo base_url(); ?>employee/task-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Task</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Task Type</th>
                            <th>Task Date</th>
                            <th>Description</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                            $i=1;
                            foreach ($taskList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->task_type; ?></td>
                            <td><?php if($row->latest_task_dateFormat) { echo $row->latest_task_dateFormat; } else { echo '-'; } ?></td>
                            <td><?php if($row->latest_description) { echo $row->latest_description; } else { echo '-'; } ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'employee/report-list/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="daily_task" data-link="<?php echo base_url() . 'employee/daily-task/'; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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