<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="<?php echo base_url(); ?>report/vehicle-maintenance-report" method="get" id="filterForm">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3 mb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <h4 class="fw-bold mb-0 text-black">Vehicle Maintenance Report</h4>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>report/vehicle-maintenance-report" class="btn btn-secondary px-4 py-2 rounded border-0 fw-bold text-white">Reset</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded border-0 fw-bold text-white">Filter</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">From Date</label>
                        <input name="from_date" id="from_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $fromDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">To Date</label>
                        <input name="to_date" id="to_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $toDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-select select2">
                            <option value="">All Vehicles</option>
                            <?php foreach ($vehicleDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($vehicleId == $row->id) { echo 'selected'; } ?>><?php echo $row->vehicle_name . ' (' . $row->vehicle_number . ')'; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Service Category</label>
                        <select name="category" id="category" class="form-select select2">
                            <option value="">All Categories</option>
                            <option value="maintenance" <?php if($category == 'maintenance') echo 'selected'; ?>>Maintenance</option>
                            <option value="oil_change" <?php if($category == 'oil_change') echo 'selected'; ?>>Oil Change</option>
                            <option value="battery" <?php if($category == 'battery') echo 'selected'; ?>>Battery</option>
                            <option value="wheel_alignment" <?php if($category == 'wheel_alignment') echo 'selected'; ?>>Wheel Alignment</option>
                            <option value="tyre_change" <?php if($category == 'tyre_change') echo 'selected'; ?>>Tyre Change</option>
                            <option value="fc_work" <?php if($category == 'fc_work') echo 'selected'; ?>>FC Work</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <!-- Summary & Latest Category Cards -->
        <?php if (!empty($vehicleId) && !empty($selectedVehicle)) { ?>
            <div class="card p-3 mb-3">
                <!-- Vehicle Info & Latest Category Cards (Visible only when vehicle is selected) -->
                <div class="row g-3 mt-1">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Vehicle Name</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo htmlspecialchars($selectedVehicle->vehicle_name); ?> - <?php echo htmlspecialchars($selectedVehicle->vehicle_type ?: '-'); ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Vehicle Number</p>
                            <h5 class="mb-0 text-black fw-semibold text-uppercase"><?php echo htmlspecialchars($selectedVehicle->vehicle_number); ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Latest Maintenance</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo !empty($latestServices['maintenance']['date']) ? $latestServices['maintenance']['date'] : '-'; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Oil Change</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo !empty($latestServices['oil_change']['date']) ? $latestServices['oil_change']['date'] : '-'; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Wheel Alignment</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo !empty($latestServices['wheel_alignment']['date']) ? $latestServices['wheel_alignment']['date'] : '-'; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Tyre Change</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo !empty($latestServices['tyre_change']['date']) ? $latestServices['tyre_change']['date'] : '-'; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">Battery</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo !empty($latestServices['battery']['date']) ? $latestServices['battery']['date'] : '-'; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border h-100 d-flex flex-column justify-content-center">
                            <p class="mb-2 text-black fw-bold">FC Work</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo !empty($latestServices['fc_work']['date']) ? $latestServices['fc_work']['date'] : '-'; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom flex-wrap gap-2">
                <h4 class="fw-bold mb-0 text-black">Vehicle Maintenance Details</h4>
                <button type="button" id="exportButton" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">
                    <i class="bx bx-export me-1"></i> Export Excel
                </button>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered text-nowrap" id="serviceReportTable" data-order='[]'>
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Service Date</th>
                            <th>Name <br> Number</th>
                            <th>Zone & Branch</th>
                            <th>Category</th>
                            <th>Service KM <br> Next KM</th>
                            <th>Next Service Date</th>
                            <th>Cost</th>
                            <th>Bills <br> Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($serviceReportList as $row) {
                                $cat = $row['service_category'];
                                $catLabel = ucwords(str_replace('_', ' ', $cat));

                                // Parse multiple bills
                                $bills = [];
                                if (!empty($row['service_bill'])) {
                                    $decoded = json_decode($row['service_bill'], true);
                                    if (is_array($decoded)) {
                                        $bills = $decoded;
                                    } else {
                                        $bills = [['title' => 'Service Bill', 'file' => $row['service_bill']]];
                                    }
                                }
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['service_dateFormat']; ?></td>
                            <td>
                                <p class="mb-1 fw-semibold text-black"><?php echo $row['vehicle_name']; ?></p>
                                <p class="mb-0 text-muted"><?php echo $row['vehicle_number']; ?></p>
                            </td>
                            <td>
                                <p class="mb-1 text-capitalize"><?php echo $row['zone']; ?></p>
                                <p class="mb-0 text-muted"><?php echo $row['branch_name']; ?></p>
                            </td>
                            <td>
                                <?php echo $catLabel; ?>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row['service_km']; ?> KM</p>
                                <p class="mb-0 text-muted"><?php echo $row['next_service_km'] ? $row['next_service_km'] . ' KM' : '-'; ?></p>
                            </td>
                            <td>
                                <p class="mb-0 date-check" data-date-check="<?php echo $row['next_service_date']; ?>">
                                    <?php echo $row['next_service_dateFormat'] ?: '-'; ?>
                                </p>
                            </td>
                            <td>
                                <span class="fw-semibold text-black amount-format"><?php echo $row['service_cost']; ?></span>
                            </td>
                            <td>
                                <?php if(!empty($bills)) { ?>
                                    <div class="d-flex flex-column gap-1">
                                        <?php foreach ($bills as $b) { 
                                            if (!empty($b['file'])) {
                                                $bTitle = !empty($b['title']) ? $b['title'] : 'Bill';
                                        ?>
                                            <a href="<?php echo base_url() . $b['file']; ?>" target="_blank" class="badge bg-label-info text-decoration-none">
                                                <i class="bx bx-file me-1"></i><?php echo htmlspecialchars($bTitle); ?>
                                            </a>
                                        <?php } } ?>
                                    </div>
                                <?php } else { echo '-'; } ?>
                                <br>
                                <?php echo nl2br(htmlspecialchars($row['description'])); ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $('#exportButton').on('click', function() {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var vehicleId = $('#vehicle_id').val();
        var category = $('#category').val();
        var status = $('#status').val();
        var branch = $('#branch').val();

        var params = $.param({
            from_date: fromDate,
            to_date: toDate,
            vehicle_id: vehicleId,
            category: category,
            status: status,
            branch: branch
        });

        window.location.href = '<?php echo base_url(); ?>report/getVehicleServiceReport?' + params;
    });
</script>
