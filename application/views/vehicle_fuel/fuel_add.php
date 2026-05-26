<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="vehicleFuelForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($vehicleId) { ?>
                    <a href="<?php echo base_url() . 'vehicle/fuel-view/' . $vehicleId . '/' . $financialYear; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                    <a href="<?php echo base_url() . 'vehicle/fuel-list/' . $financialYear; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($vehicleId) { ?>
                    <a href="<?php echo base_url() . 'vehicle/fuel-view/' . $vehicleId . '/' . $financialYear; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                    <a href="<?php echo base_url() . 'vehicle/fuel-list/' . $financialYear; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="fuel_id" id="fuel_id" type="hidden" value="<?php echo $vehicleFuelId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Filling Date <span class="text-danger">*</span></label>
                    <input name="fuel_date" id="fuel_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $fuelDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($branchId == $row->id) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Driver Name <span class="text-danger">*</span></label>
                    <select name="driver_name" id="driver_name" class="form-select select2">
                        <option value="">Select Driver Name</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($employeeId == $row->id) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Name <span class="text-danger">*</span></label>
                    <select name="vehicle_name" id="vehicle_name" class="form-select select2 selectVehicleName">
                        <option value="">Select Vehicle Name</option>
                        <?php foreach ($vehicleDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($vehicleId == $row->id) { echo 'selected'; } ?>><?php echo $row->vehicle_name . ' / ' . $row->vehicle_number; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Fuel Type <span class="text-danger">*</span></label>
                    <input name="fuel_type" id="fuel_type" type="text" class="form-control text-capitalize vehicleFuelType" readonly placeholder="Enter Fuel Type" value="<?php echo $fuelType; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle KM <span class="text-danger">*</span></label>
                    <input name="vehicle_km" id="vehicle_km" type="text" class="form-control number-only" placeholder="Enter Vehicle KM" value="<?php echo $vehicleKM; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Liter Qty <span class="text-danger">*</span></label>
                    <input name="liter_qty" id="liter_qty" type="text" class="form-control decimal" placeholder="Enter Liter Qty" value="<?php echo $literQty; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Fuel Amount Per Liter <span class="text-danger">*</span></label>
                    <input name="amount_per_liter" id="amount_per_liter" type="text" class="form-control decimal" placeholder="Enter Fuel Amount Per Liter" value="<?php echo $amountPerLiter; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Fuel Amount <span class="text-danger">*</span></label>
                    <input name="fuel_amount" id="fuel_amount" type="text" class="form-control decimal" placeholder="Enter Fuel Amount" value="<?php echo $fuelAmount; ?>">
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.selectVehicleName').change(function () {
            var selectedVehicleName = $(this).val();
            if (selectedVehicleName !== '') {
                $.ajax({
                    url: "<?php echo base_url('vehicle/getVehicleData'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        vehicleName: selectedVehicleName
                    },
                    success: function (data) {
                        vehicleFuelType = data[0].fuel_type;
                        $('.vehicleFuelType').val(vehicleFuelType);
                    }
                });
            }
        });
    });

    // Vehicle Fuel Save Function
    $("#vehicleFuelForm").validate({
        rules: {
            fuel_date: {
                required: true
            },
            branch: {
                required: true
            },
            driver_name: {
                required: true
            },
            vehicle_name: {
                required: true
            },
            vehicle_km: {
                required: true
            },
            liter_qty: {
                required: true
            },
            amount_per_liter: {
                required: true
            },
            fuel_amount: {
                required: true
            }
        },
        messages: {
            fuel_date: {
                required: "Please Select Date"
            },
            branch: {
                required: "Please Select Branch"
            },
            driver_name: {
                required: "Please Select Driver Name"
            },
            vehicle_name: {
                required: "Please Select Vehicle Name"
            },
            vehicle_km: {
                required: "Please Enter Vehicle KM"
            },
            liter_qty: {
                required: "Please Enter Liter Qty"
            },
            amount_per_liter: {
                required: "Please Enter Amount Per Liter"
            },
            fuel_amount: {
                required: "Please Enter Fuel Amount"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#vehicleFuelForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>vehicle/vehicleFuelFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (data) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': false,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '5000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut',
                    }
                    $(".loader").hide();
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            var fy = '<?php echo $financialYear; ?>';
                            <?php if($vehicleId) { ?>
                                window.location.href = "<?php echo base_url() . 'vehicle/fuel-view/' . $vehicleId; ?>/" + fy;
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url() . 'vehicle/fuel-list/'; ?>" + fy;
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>