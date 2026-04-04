<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Employee Expenses List</h4>
                <div class="d-flex gap-2">
                    <a href="<?php echo base_url(); ?>employee/disbursed-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Disbursed Amount</a>
                    <a href="<?php echo base_url(); ?>employee/expenses-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Expenses Amount</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Disbursed Amount</th>
                            <th>Expenses Amount</th>
                            <th>Balance Amount</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($employeeExpensesList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo base_url() . 'employee/expenses-view/' . $row->employee_id; ?>" class="a-hover"><?php echo $row->employee_name; ?></a></td>
                            <td><?php echo $row->designation; ?></td>
                            <td class="amount-format"><?php echo $row->disbursed_amount; ?></td>
                            <td class="amount-format"><?php echo $row->expenses_amount; ?></td>
                            <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'employee/expenses-view/' . $row->employee_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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