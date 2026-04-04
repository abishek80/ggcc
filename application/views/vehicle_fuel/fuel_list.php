<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Fuel Vehicle List</h4>
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
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><a href="<?php echo base_url() . 'vehicle/fuel-view/' . $row->vehicle_id; ?>" class="a-hover"><?php echo $row->vehicle_name; ?></a></td>
                            <td><?php echo $row->vehicle_number; ?></td>
                            <td><?php echo $row->fuel_type; ?></td>
                            <td><?php echo $row->filling_dateFormat; ?></td>
                            <td><?php echo $row->vehicle_km; ?></td>
                            <td><?php echo $row->total_liter_qty; ?></td>
                            <td class="amount-format"><?php echo $row->overall_amount; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'vehicle/fuel-view/' . $row->vehicle_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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