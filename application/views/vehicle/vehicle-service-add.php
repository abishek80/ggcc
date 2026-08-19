<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="vehicleServiceForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($vehicleId) { ?>
                        <a href="<?php echo base_url() . 'vehicle/vehicle-service/' . $vehicleId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>vehicle/vehicle-service-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($vehicleId) { ?>
                        <a href="<?php echo base_url() . 'vehicle/vehicle-service/' . $vehicleId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>vehicle/vehicle-service-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="service_id" id="service_id" type="hidden" value="<?php echo $serviceId; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Name <span class="text-danger">*</span></label>
                    <select name="vehicle_id" id="vehicle_id" class="form-select select2 selectVehicleName">
                        <option value="">Select Vehicle Name</option>
                        <?php foreach ($vehicleDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($vehicleId == $row->id) { echo 'selected'; } ?>><?php echo $row->vehicle_name . ' / ' . $row->vehicle_number; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Service Date <span class="text-danger">*</span></label>
                    <input name="service_date" id="service_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $serviceDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Next Service Date</label>
                    <input name="next_service_date" id="next_service_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $nextServiceDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Service Kilometer <span class="text-danger">*</span></label>
                    <input name="service_km" id="service_km" type="text" class="form-control number-only" placeholder="Enter Service Kilometer" value="<?php echo $serviceKM; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Next Service Kilometer</label>
                    <input name="next_service_km" id="next_service_km" type="text" class="form-control number-only" placeholder="Enter Next Service Kilometer" value="<?php echo $nextServiceKM; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Service Category</label>
                    <select name="service_category" id="service_category" class="form-select">
                        <option value="">Select Service Category</option>
                        <option value="maintenance" <?php if($serviceCategory == 'maintenance') { echo 'selected'; } ?>>Maintenance</option>
                        <option value="oil_change" <?php if($serviceCategory == 'oil_change') { echo 'selected'; } ?>>Oil Change</option>
                        <option value="wheel_alignment" <?php if($serviceCategory == 'wheel_alignment') { echo 'selected'; } ?>>Wheel Alignment</option>
                        <option value="tyre_change" <?php if($serviceCategory == 'tyre_change') { echo 'selected'; } ?>>Tyre Change</option>
                        <option value="fc_work" <?php if($serviceCategory == 'fc_work') { echo 'selected'; } ?>>FC Work</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Service Cost <span class="text-danger">*</span></label>
                    <input name="service_cost" id="service_cost" type="text" class="form-control number-only" placeholder="Enter Service Cost" value="<?php echo $serviceCost; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Service Bill</label>
                        <?php if($serviceBill) { ?>
                            <a href="<?php echo base_url() . $serviceBill; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="service_bill" id="service_bill" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $serviceBill; ?>" name="alter_service_bill">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Payment Method</label>
                    <select name="method" id="method" class="form-select">
                        <option value="">Select Payment Method</option>
                        <option value="cash" <?php if($method == 'cash') { echo 'selected'; } ?>>Cash</option>
                        <option value="online" <?php if($method == 'online') { echo 'selected'; } ?>>Online</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="pending" <?php if($status == 'pending') { echo 'selected'; } ?>>Pending</option>
                        <option value="paid" <?php if($status == 'paid') { echo 'selected'; } ?>>Paid</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" type="text" class="form-control" style="min-height: 120px;" placeholder="Enter Description"><?php echo $description; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Vehicle Service Save Function
    $("#vehicleServiceForm").validate({
        rules: {
            vehicle_id: {
                required: true
            },
            service_date: {
                required: true
            },
            service_km: {
                required: true
            },
            service_category: {
                required: true
            },
            service_cost: {
                required: true
            },
            description: {
                required: true
            },
            method: {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            vehicle_id: {
                required: "Please Select Vehicle Name",
            },
            service_date: {
                required: "Please Enter Service Date",
            },
            service_km: {
                required: "Please Enter Service Kilometer",
            },
            service_category: {
                required: "Please Enter Service Category",
            },
            service_cost: {
                required: "Please Enter Service Cost",
            },
            description: {
                required: "Please Enter Description",
            },
            method: {
                required: "Please Select Payment Method",
            },
            status: {
                required: "Please Select Status",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#vehicleServiceForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>vehicle/vehicleServiceFormSave',
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
                            <?php if($vehicleId) { ?>
                                window.location.href = "<?php echo base_url() . 'vehicle/vehicle-service/' . $vehicleId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>vehicle/vehicle-service-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>