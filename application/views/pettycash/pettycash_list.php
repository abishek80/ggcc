<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <?php foreach ($yearList as $year) { ?>
                <a href="<?php echo base_url(); ?>bill/pettycash-list/<?php echo $year; ?>" class="<?php echo ($activeLink == $year) ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0"><?php echo $year; ?></a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Pettycash List</h4>
                <a href="<?php echo base_url() . 'bill/pettycash-add/' . $activeLink; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Pettycash</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Branch</th>
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
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($pettycashBranchList as $branch_id => $branch) { 
                                $pettycash = $branch['pettycash'];
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo base_url() . 'bill/pettycash-view/' . $activeLink . '/' . $branch_id . '/' . strtolower(date('F')); ?>" class="a-hover"><?php echo htmlspecialchars($branch['branch']); ?></a></td>
                                <?php 
                                    $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
                                    foreach ($months as $month) { ?>
                                        <td class="text-center">
                                            <?php echo isset($pettycash[$month]) ? '<a href=' . base_url() . 'bill/pettycash-view/' . $activeLink . '/' . $branch_id . '/' . $month . ' class="a-hover amount-format">'.$pettycash[$month].'</a>' : '-'; ?>
                                        </td>
                                <?php } ?>
                            <td>
                                <a href="<?php echo base_url() . 'bill/pettycash-view/' . $activeLink . '/' . $branch_id . '/' . strtolower(date('F')); ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"><i class="bx bx-show-alt"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>