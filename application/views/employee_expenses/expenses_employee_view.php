<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Employee Name</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $employeeName; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Disbursed Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $disbursedAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Expenses Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $expensesAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Balance Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $balanceAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item me-2">
                    <button type="button" class="px-5 nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#disbursed_list" aria-controls="disbursed_list" aria-selected="true"> Disbursed Amount List </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#expenses_list" aria-controls="expenses_list" aria-selected="true"> Expenses Amount List </button>
                </li>
            </ul>
            <div class="d-flex gap-3">
                <a href="<?php echo base_url() . 'employee/disbursed-add/' . $employeeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Disbursed Amount</a>
                <a href="<?php echo base_url() . 'employee/expenses-add/' . $employeeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Expenses Amount</a>
            </div>
        </div>
        <div class="card tab-content p-3">
            <div class="tab-pane fade show active" id="disbursed_list" role="tabpanel">
                <div class="d-flex gap-2 align-items-center border-bottom mb-3 pb-3">
                    <a href="<?php echo base_url() . 'employee/expenses-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Disbursed Amount List</h4>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                                <th class="w-min-40">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($disbursedAmountList as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->month; ?></td>
                                    <td><?php echo $row->date; ?></td>
                                    <td class="amount-format"><?php echo $row->amount; ?></td>
                                    <td><?php echo $row->remarks; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="<?php echo base_url() . 'employee/expenses-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                            <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_expenses" data-link="<?php echo base_url() . 'employee/expenses-view/' . $row->employee_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="expenses_list" role="tabpanel">
                <div class="d-flex gap-2 align-items-center border-bottom mb-3 pb-3">
                    <a href="<?php echo base_url() . 'employee/expenses-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Expenses Amount List</h4>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                                <th class="w-min-40">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($expensesAmountList as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->month; ?></td>
                                    <td><?php echo $row->date; ?></td>
                                    <td class="amount-format"><?php echo $row->amount; ?></td>
                                    <td><?php echo $row->remarks; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="<?php echo base_url() . 'employee/expenses-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                            <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee_expenses" data-link="<?php echo base_url() . 'employee/expenses-view/' . $row->employee_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>