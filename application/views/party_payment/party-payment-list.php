<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Purchase Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $purchaseAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Paid Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $paidAmount; ?></h5>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Balance Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $balanceAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Party Name</th>
                            <th>MSME <br> MSME Number</th>
                            <th>Purchase Amount</th>
                            <th>Paid Amount</th>
                            <th>Balance Amount</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($allPartyPaymentList as $row) { 
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $row->id; ?>" class="a-hover"><?php echo $row->party_name; ?></a></td>
                                <td>
                                    <p class="mb-0">
                                        <?php if($row->party_type == 'yes') { ?>
                                            <span class="text-danger"><?php echo $row->party_type; ?></span>
                                        <?php } elseif($row->party_type == 'no') { ?>
                                            <span class="text-success"><?php echo $row->party_type; ?></span>
                                        <?php } ?>
                                    </p>
                                    <?php if($row->msme_number) { ?>
                                        <p class="mt-1 mb-0"><?php echo $row->msme_number; ?></p>
                                    <?php } ?>
                                </td>
                                <td class="amount-format"><?php echo $row->purchase_amount; ?></td>
                                <td class="amount-format"><?php echo $row->paid_amount; ?></td>
                                <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
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