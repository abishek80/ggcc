<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($presentMonthList as $row) { ?>
                <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $row->month . '/' . $employeeId; ?>" class="d-block card px-5 py-2 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                    <p class="mb-0 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                </a>
            <?php } ?>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">Employee Name</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $employeeName; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">Present Count</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo count($employeePresentList); ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">Leave Count</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo count($employeeLeaveList); ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-2">OT Count</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo count($employeeOTList); ?></h5>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item me-2">
                    <button type="button" class="px-5 nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#present_list" aria-controls="present_list" aria-selected="true"> Present List </button>
                </li>
                <li class="nav-item me-2">
                    <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#leave_list" aria-controls="leave_list" aria-selected="true"> Leave List </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#ot_list" aria-controls="ot_list" aria-selected="true"> OT List </button>
                </li>
            </ul>
            <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'attendance/ot-add/' . $year . '/' . $month . '/' . $employeeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Employee OT</a>
                    <a href="<?php echo base_url() . 'attendance/leave-add/' . $year . '/' . $month . '/' . $employeeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Employee Leave</a>
                </div>
            <?php } ?>
        </div>
        <div class="card tab-content p-3">
            <div class="tab-pane fade show active" id="present_list" role="tabpanel">
                <div class="d-flex gap-2 align-items-center border-bottom mb-3 pb-3">
                    <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-list' . '/' . $year . '/' . $month; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $month; ?> - Present List</h4>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Date</th>
                                <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                    <th class="w-min-50">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($employeePresentList as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->present_dateFormat; ?></td>
                                    <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_attendance" data-link="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                            </div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="leave_list" role="tabpanel">
                <div class="d-flex gap-2 align-items-center border-bottom mb-3 pb-3">
                    <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-list' . '/' . $year . '/' . $month; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $month; ?> - Leave List</h4>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-px-10">S. No</th>
                                <th>Leave Date</th>
                                <th>Zone <br> Branch</th>
                                <th>Leave Reason</th>
                                <th>Status</th>
                                <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                    <th class="w-min-50">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach ($employeeLeaveList as $row) { 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->leave_dateFormat; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->zone; ?></p>
                                    <p class="mb-0"><?php echo $row->branch; ?></p>
                                </td>
                                <td><?php echo $row->reason; ?></td>
                                <td><?php echo $row->status == 'approved' ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Not Approved</span>'; ?></td>
                                <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="<?php echo base_url() . 'attendance/leave-edit/' . $row->leave_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                            <a href="javascript:void(0);" data-rowid="<?php echo $row->leave_id; ?>" data-tablename="employee_leave_detail" data-link="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="box-hover trashLeaveItem" data-toggle="tooltip" data-placement="top" title="Delete Overall Record"> <i class="bx bx-trash"></i> </a>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="ot_list" role="tabpanel">
                <div class="d-flex gap-2 align-items-center border-bottom mb-3 pb-3">
                    <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-list' . '/' . $year . '/' . $month; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $month; ?> - OT List</h4>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Date</th>
                                <th>Zone <br> Branch</th>
                                <th>Work Place</th>
                                <th>Time Zone</th>
                                <th>OT Type</th>
                                <th>Status</th>
                                <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                    <th class="w-min-50">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($employeeOTList as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->ot_dateFormat; ?></td>
                                    <td>
                                        <p class="mb-1"><?php echo $row->zone; ?></p>
                                        <p class="mb-0"><?php echo $row->branch; ?></p>
                                    </td>
                                    <td><?php echo $row->work_place; ?></td>
                                    <td><?php echo $row->time_zone; ?></td>
                                    <td><?php echo $row->ot_type; ?></td>
                                    <td><?php echo $row->status == 'approved' ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Not Approved</span>'; ?></td>
                                    <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="<?php echo base_url() . 'attendance/ot-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                                <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_ot" data-link="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                            </div>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>