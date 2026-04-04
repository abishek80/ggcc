<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'employee/increment-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $employeeName . ' / ' . $designation; ?> - Increment List</h4>
                </div>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'employee/increment-add/' . $employeeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Salary Increment</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Increment Date</th>
                            <th>Old Salary Amount</th>
                            <th>Increment Salary Amount</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($incrementList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->increment_dateFormat; ?></td>
                                <td class="amount-format"><?php echo $row->old_salary_amount; ?></td>
                                <td class="amount-format"><?php echo $row->new_salary_amount; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'employee/increment-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="salary_increment" data-link="<?php echo base_url() . 'employee/increment-view/' . $employeeId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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