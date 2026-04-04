<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Vehicle Name</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $vehicleName; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Vehicle Number</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $vehicleNumber; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Vehicle Fuel Type</p>
                    <h5 class="mb-0 fw-semibold text-capitalize"><?php echo $vehicleFuelType; ?></h5>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="card p-3 text-center">
                    <p class="mb-3">Overall Fuel Amount</p>
                    <h5 class="mb-0 fw-semibold amount-format"><?php echo $overallFuelAmount; ?></h5>
                </div>
            </div>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'vehicle/fuel-list'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Fuel List</h4>
                </div>
                <div class="d-flex gap-3">
                    <a href="<?php echo base_url() . 'vehicle/fuel-add/' . $vehicleId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Vehicle Fuel</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Filling Date</th>
                            <th>Branch Name</th>
                            <th>Driver Name</th>
                            <th>Vehicle KM</th>
                            <th>Liter Qty</th>
                            <th>Amount Per Liter</th>
                            <th>Fuel Amount</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($fuelList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->filling_dateFormat; ?></td>
                                <td><?php echo $row->branch_name; ?></td>
                                <td><?php echo $row->driver_name; ?></td>
                                <td><?php echo $row->vehicle_km; ?></td>
                                <td><?php echo $row->liter_qty; ?></td>
                                <td><?php echo $row->amount_per_liter; ?></td>
                                <td class="amount-format"><?php echo $row->amount; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'vehicle/fuel-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle_fuel" data-link="<?php echo base_url() . 'vehicle/fuel-view/' . $row->vehicle_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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