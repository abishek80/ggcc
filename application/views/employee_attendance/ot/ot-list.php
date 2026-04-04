<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>attendance/ot-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>attendance/ot-list/not_approved" class="<?php echo ($activeLink == 'not_approved') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Not Approved</a>
            <a href="<?php echo base_url(); ?>attendance/ot-list/approved" class="<?php echo ($activeLink == 'approved') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Approved</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Employee OT List</h4>
                <a href="<?php echo base_url(); ?>attendance/ot-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Employee OT</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone <br> Branch</th>
                            <th>Employee Name <br> Designation</th>
                            <th>Date</th>
                            <th>Work Place</th>
                            <th class="w-px-100">Time Zone <br> OT Type</th>
                            <th>Status</th>
                            <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                <th class="w-min-40">Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($employeeOTList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->zone; ?></p>
                                    <p class="mb-0"><?php echo $row->branch; ?></p>
                                </td>
                                <td>
                                    <p class="mb-1"><?php echo $row->employee_name; ?></p>
                                    <p class="mb-0"><?php echo $row->designation; ?></p>
                                </td>
                                <td><?php echo $row->ot_dateFormat; ?></td>
                                <td><?php echo $row->work_place; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->time_zone; ?></p>
                                    <p class="mb-0"><?php echo $row->ot_type; ?></p>
                                </td>
                                <td>
                                    <?php
                                        $statusText = $row->status == 'approved' ? 'Approved' : 'Not Approved';
                                        $statusClass = $row->status == 'approved' ? 'text-success' : 'text-danger';
                                        $dataValue = $row->status == 'approved' ? 'not_approved' : 'Approved';
                                        $link = base_url() . 'attendance/ot-list';
                                    ?>
                                    <a href="javascript:void(0);" data-value="<?php echo $dataValue; ?>" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_ot" data-link="<?php echo $link; ?>" class="<?php echo $statusClass; ?> changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> <?php echo $statusText; ?> </a>
                                </td>
                                <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="<?php echo base_url() . 'attendance/ot-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                            <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_ot" data-link="<?php echo base_url(); ?>attendance/ot-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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