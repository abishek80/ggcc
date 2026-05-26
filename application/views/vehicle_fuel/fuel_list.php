<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <?php 
                $years = [ date('Y').'-'.(date('Y')+1), (date('Y')-1).'-'.date('Y') ];
                foreach($years as $fy) {
                    $activeClass = ($financialYear == $fy) ? 'bg-primary text-white' : 'bg-white text-primary';
            ?>
                <a href="<?= base_url('vehicle/fuel_list/'.$fy) ?>" class="px-4 py-2 px-lg-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0 <?= $activeClass ?>"><?= $fy ?></a>
            <?php } ?>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-lg-6 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Liter Qty</p>
                    <h5 class="mb-0 fw-semibold"><?php echo $totalLiterQty; ?></h5>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Total Fuel Amount</p>
                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $totalFuelAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Vehicle Fuel List</h4>
                <a href="<?php echo base_url(); ?>vehicle/fuel-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Vehicle Fuel</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle Number</th>
                            <th>Fuel Type</th>
                            <th>Recent Filling Date</th>
                            <th>Recent KM</th>
                            <th>Overall Liter</th>
                            <th>Overall Fuel Amount</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($vehicleFuelList as $row) { 
                                $viewUrl = base_url() . 'vehicle/fuel-view/' . $row->vehicle_id . '/' . $financialYear;
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo $viewUrl; ?>" class="a-hover"><?php echo $row->vehicle_name; ?></a></td>
                            <td><?php echo $row->vehicle_number; ?></td>
                            <td><?php echo $row->fuel_type; ?></td>
                            <td><?php echo $row->filling_dateFormat; ?></td>
                            <td><?php echo $row->vehicle_km; ?></td>
                            <td><?php echo $row->total_liter_qty; ?></td>
                            <td class="amount-format"><?php echo $row->overall_amount; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo $viewUrl; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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