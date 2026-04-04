<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($presentMonthList as $row) { ?>
                <a href="<?php echo base_url() . 'attendance/attendance-list/' . $year . '/' . $row->month; ?>" class="d-block card px-5 py-2 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                    <p class="mb-0 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                </a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $month; ?> - Employee Attendance List</h4>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Add Employee Present </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'attendance/present-add/' . $year . '/' . $month . '/chennai'; ?>">Chennai</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'attendance/present-add/' . $year . '/' . $month . '/mumbai'; ?>">Mumbai</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'attendance/present-add/' . $year . '/' . $month . '/indore'; ?>">Indore</a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Present Count</th>
                            <th>Leave Count</th>
                            <th>OT Count</th>
                            <th class="w-min-75">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($employeeAttendanceList as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $row->employee_id; ?>" class="a-hover"><?php echo $row->employee_name; ?></a></td>
                            <td><?php echo $row->designation; ?></td>
                            <td><?php echo $row->present_count; ?></td>
                            <td><?php echo $row->leave_count; ?></td>
                            <td><?php echo $row->ot_count; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $row->employee_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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