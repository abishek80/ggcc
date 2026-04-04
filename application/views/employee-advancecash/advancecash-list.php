<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Loan Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $advancecashAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $receivedAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Not Received Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $notreceivedAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Loan Taken List</h4>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url(); ?>loan/advancecash-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Loan</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Loan Amount</th>
                            <th>Received Amount</th>
                            <th>Not Received Amount</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($advancecashEmployeeList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><a href="<?php echo base_url() . 'loan/advancecash-view/' . $row->employee_id; ?>" class="a-hover"><?php echo $row->employee_name; ?></a></td>
                                <td><?php echo $row->designation; ?></td>
                                <td class="amount-format"><?php echo $row->overall_advancecash_amount; ?></td>
                                <td class="amount-format"><?php echo $row->overall_received_amount; ?></td>
                                <td class="amount-format"><?php echo $row->overall_notreceived_amount; ?></td>
                                <td>
                                    <a href="<?php echo base_url() . 'loan/advancecash-view/' . $row->employee_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>