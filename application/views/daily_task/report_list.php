<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
                        <a href="<?php echo base_url() . 'employee/task-list/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>admin" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $employeeName . ' / ' . $workType; ?> - Task List</h4>
                </div>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'employee/task-add/' . $dailyTaskId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Task</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Task Date</th>
                            <th>Description</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($taskList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->task_dateFormat; ?></td>
                                <td><?php echo $row->description; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'employee/task-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="daily_task_detail" data-link="<?php echo base_url() . 'employee/task-list/' . $dailyTaskId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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