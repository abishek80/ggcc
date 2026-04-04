<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($presentMonthList as $row) { ?>
                <a href="<?php echo base_url() . 'attendance/present-list/' . $year . '/' . $row->month; ?>" class="d-block card px-5 py-2 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                    <p class="mb-0 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                </a>
            <?php } ?>
        </div>
        <div class="card tab-content p-3">
            <div class="d-flex gap-2 align-items-center justify-content-between border-bottom mb-3 pb-3">
                <h4 class="fw-bold mb-0 text-black text-capitalize">Employee Present List</h4>
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
                            <th class="w-min-40">S. No</th>
                            <th>Date</th>
                            <th>Employee Name</th>
                            <th>Desingation</th>
                            <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                <th class="w-min-40">Action</th>
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
                                <td><?php echo $row->employee_name; ?></td>
                                <td><?php echo $row->designation; ?></td>
                                <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_attendance" data-link="<?php echo base_url() . 'attendance/present-list/' . $year . '/' . $month; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
</section>