<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <?php foreach ($yearList as $year) { ?>
                <a href="<?php echo base_url(); ?>employee/payslip-list/<?php echo $year; ?>" class="<?php echo ($activeLink == $year) ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0"><?php echo $year; ?></a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Payslip List</h4>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>employee/payslip-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Single Payslip</a>
                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Payslip Multiple
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>employee/payslip-add-multi/ggcc">GGCC</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>employee/payslip-add-multi/bright">Bright</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th class="w-min-250">Employee Name & Designation</th>
                            <th>January</th>
                            <th>February</th>
                            <th>March</th>
                            <th>April</th>
                            <th>May</th>
                            <th>June</th>
                            <th>July</th>
                            <th>August</th>
                            <th>September</th>
                            <th>October</th>
                            <th>November</th>
                            <th>December</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($payslipList as $employee_id => $employee) { 
                                $payslip = $employee['payslip'];
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-1"><?php echo htmlspecialchars($employee['employee_name']); ?></p>
                                <p class="mb-0"><?php echo htmlspecialchars($employee['designation']); ?></p>
                            </td>
                            <?php 
                                $month = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
                                foreach ($month as $value) {
                                    echo '<td> <div class="d-flex justify-content-center">';
                                        echo isset($payslip[$value]) ? '<a href="' . base_url() . 'employee/payslip-view/' . $payslip[$value] . '" class="box-hover" target="_blank" data-toggle="tooltip" data-placement="top" title="View Payslip"> <i class="bx bx-show-alt"></i> </a>' : '-';
                                    echo '</div></td>';
                                }
                            ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>