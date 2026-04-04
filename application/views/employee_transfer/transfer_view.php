<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex gap-2 align-items-center justify-content-between border-bottom mb-3 pb-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'employee/transfer-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $employeeName; ?> - Transfter List</h4>
                </div>
                <a href="<?php echo base_url() . 'employee/transfer-add/' . $employeeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Transfer</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date</th>
                            <th>From Branch</th>
                            <th>To Branch</th>
                            <th>Remarks</th>
                            <th>Return Date</th>
                            <th>Day Count</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($transferList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->dateFormat; ?></td>
                                <td><?php echo $row->from_branch; ?></td>
                                <td><?php echo $row->to_branch; ?></td>
                                <td><?php echo $row->remarks; ?></td>
                                <td><?php if($row->return_dateFormat != '00 - 00 - 0000') { echo $row->return_dateFormat; }?></td>
                                <td><?php echo $row->day_count; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'employee/transfer-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_transfer" data-link="<?php echo base_url() . 'employee/transfer-view/' . $row->employee_name; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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