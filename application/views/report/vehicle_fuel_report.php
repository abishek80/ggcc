<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="<?php echo base_url(); ?>report/vehicle-fuel-report" method="get">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <h4 class="fw-bold mb-0 text-black">Vehicle Fuel Report</h4>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>report/vehicle-fuel-report" class="btn btn-secondary px-4 py-2 rounded border-0 fw-bold text-white">Reset</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded border-0 fw-bold text-white">Filter</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Form Date</label>
                        <input name="from_date" id="from_date" type="date" class="form-control date-picker fromDate" placeholder="YYYY - MM - DD" value="<?php echo $fromDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">To Date</label>
                        <input name="to_date" id="to_date" type="date" class="form-control date-picker toDate" placeholder="YYYY - MM - DD" value="<?php echo $toDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Name</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-select select2">
                            <option value="">Select Vehicle Name</option>
                            <?php foreach ($vehicleDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($vehicleId == $row->id) { echo 'selected'; } ?>><?php echo $row->vehicle_name . ' / ' . $row->vehicle_number; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <?php if($vehicleFuelReportList) { ?>
            <div class="mt-3 card p-3">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <h4 class="fw-bold mb-0 text-black">Vehicle Fuel Report List</h4>
                    <button id="reportButton" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Export</button>
                </div>
                <div class="row g-3 mb-4">
                    <?php if($fromDate) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">From Date</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo date('d - m - Y', strtotime($fromDate)); ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($toDate) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">To Date</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo date('d - m - Y', strtotime($toDate)); ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($vehicleId) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Vehicle Name</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $vehicleName; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Vehicle Number</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $vehicleNumber; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Fuel Type</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $fuelType; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Total Kilometer</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $totalKilometer; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Total Liter</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $totalLiter; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Rate Per Liter</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $ratePerLtr; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Kilometer Per Liter</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $kmPerLtr; ?></h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Rupees Per Kilometer</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $rsPerKM; ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Total Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $totalAmount; ?></h5>
                        </div>
                    </div>
                    <?php if($vehicleId) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-body text-center p-3 rounded-3 border">
                                <p class="mb-2 text-black fw-bold">Average Percentage</p>
                                <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $average; ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Date</th>
                                <th>Vehicle Number <br> Vehicle Name</th>
                                <th>Fuel Type <br> Vehicle Type</th>
                                <th>Kilometer</th>
                                <th>Liter Qty</th>
                                <th>Amount Per Liter</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($vehicleFuelReportList as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($row['filling_dateFormat'] ?? '-'); ?></td>
                                    <td>
                                        <p class="mb-2"><?php echo htmlspecialchars($row['vehicle_number'] ?? '-'); ?></p>
                                        <p class="mb-0"><?php echo htmlspecialchars($row['vehicle_name'] ?? '-'); ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-2"><?php echo htmlspecialchars($row['fuel_type'] ?? '-'); ?></p>
                                        <p class="mb-0"><?php echo htmlspecialchars($row['vehicle_type'] ?? '-'); ?></p>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['vehicle_km'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['liter_qty'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['amount_per_liter'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['amount'] ?? '-'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    $('#reportButton').on('click', function() {
        // Get selected values from dropdowns
        var vehicle_id = $('#vehicle_id').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        $.ajax({
            url: '<?php echo base_url(); ?>report/getVehicleFuelReport',
            type: 'post',
            data: {
                vehicleId: vehicle_id,
                fromDate: from_date,
                toDate: to_date
            },
            xhrFields: {
                responseType: 'blob' // Expect a binary response for file download
            },
            success: function (response, status, xhr) {
                // Get the filename from the Content-Disposition header
                var filename = "";
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var matches = /filename="([^"]+)"/.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1];
                }

                // Create a link element to trigger the download
                var link = document.createElement('a');
                var url = window.URL.createObjectURL(response);
                link.href = url;
                link.download = filename || "export.xls";
                document.body.appendChild(link);
                link.click();
                window.URL.revokeObjectURL(url);
                link.remove();
            },
            error: function () {
                alert('An error occurred while exporting the data.');
            }
        });
    });
</script>