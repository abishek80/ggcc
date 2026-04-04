<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="vehicleForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>vehicle/vehicle-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>vehicle/vehicle-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $vehicleToken; ?>">
            <input name="vehicle_id" id="vehicle_id" type="hidden" value="<?php echo $vehicleId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Type <span class="text-danger">*</span></label>
                    <select name="vehicle_type" id="vehicle_type" class="form-select">
                        <option value="">Select Type</option>
                        <option value="bike" <?php if($vehicleType == 'bike') { echo 'selected'; } ?>>Bike</option>
                        <option value="car" <?php if($vehicleType == 'car') { echo 'selected'; } ?>>Car</option>
                        <option value="truck" <?php if($vehicleType == 'truck') { echo 'selected'; } ?>>Truck</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Fuel Type <span class="text-danger">*</span></label>
                    <select name="fuel_type" id="fuel_type" class="form-select">
                        <option value="">Select Fuel Type</option>
                        <option value="petrol" <?php if($fuelType == 'petrol') { echo 'selected'; } ?>>Petrol</option>
                        <option value="diesel" <?php if($fuelType == 'diesel') { echo 'selected'; } ?>>Diesel</option>
                        <option value="cng" <?php if($fuelType == 'cng') { echo 'selected'; } ?>>CNG</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Name <span class="text-danger">*</span></label>
                    <input name="vehicle_name" id="vehicle_name" type="text" class="form-control" placeholder="Enter Vehicle Name" value="<?php echo $vehicleName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Number <span class="text-danger">*</span></label>
                    <input name="vehicle_number" id="vehicle_number" type="text" class="form-control generate_token" placeholder="Enter Vehicle Number" value="<?php echo $vehicleNumber; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Owner Name <span class="text-danger">*</span></label>
                    <input name="owner_name" id="owner_name" type="text" class="form-control" placeholder="Enter Vehicle Owner Name" value="<?php echo $ownerName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Insurance validity To <span class="text-danger">*</span></label>
                    <input name="renewal_date" id="renewal_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $renewalDate; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">FC validity To</label>
                    <input name="fc_renewal_date" id="fc_renewal_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $fcRenewalDate; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">PUC validity To</label>
                    <input name="puc_renewal_date" id="puc_renewal_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $pucRenewalDate; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Photo</label>
                        <?php if($vehiclePhoto) { ?>
                            <a href="<?php echo base_url() . $vehiclePhoto; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="vehicle_photo" id="vehicle_photo" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $vehiclePhoto; ?>" name="alter_vehicle_photo">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle RC Book</label>
                        <?php if($vehicleRC) { ?>
                            <a href="<?php echo base_url() . $vehicleRC; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="vehicle_rc" id="vehicle_rc" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $vehicleRC; ?>" name="alter_vehicle_rc">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle Insurance</label>
                        <?php if($vehicleInsurance) { ?>
                            <a href="<?php echo base_url() . $vehicleInsurance; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="vehicle_insurance" id="vehicle_insurance" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $vehicleInsurance; ?>" name="alter_vehicle_insurance">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle FC</label>
                        <?php if($vehicleFC) { ?>
                            <a href="<?php echo base_url() . $vehicleFC; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="vehicle_fc" id="vehicle_fc" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $vehicleFC; ?>" name="alter_vehicle_fc">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vehicle PUC</label>
                        <?php if($vehiclePUC) { ?>
                            <a href="<?php echo base_url() . $vehiclePUC; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="vehicle_puc" id="vehicle_puc" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $vehiclePUC; ?>" name="alter_vehicle_puc">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.zone').change(function () {
            var selectedOutletZone = $(this).val();
            if (selectedOutletZone !== '') {
                $.ajax({
                    url: "<?php echo base_url('master/selectBranchDropdown'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        zone: selectedOutletZone
                    },
                    success: function (data) {
                        var selectElement = document.querySelector('.branch');
                        selectElement.innerHTML = '<option value="">Select Branch</option>';
                        data.forEach(function (item) {
                            var option = document.createElement('option');
                            option.textContent = item.branch;
                            option.value = item.id;
                            selectElement.appendChild(option);
                        });
                    }
                });
            }
        });
    });

    // Vehicle Save Function
    $("#vehicleForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch: {
                required: true
            },
            vehicle_type: {
                required: true
            },
            fuel_type: {
                required: true
            },
            vehicle_name: {
                required: true
            },
            vehicle_number: {
                required: true
            },
            owner_name: {
                required: true
            },
            renewal_date: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Enter Vehicle Zone",
            },
            branch: {
                required: "Please Enter Vehicle Number",
            },
            vehicle_type: {
                required: "Please Enter Vehicle Type",
            },
            fuel_type: {
                required: "Please Enter Fuel Type",
            },
            vehicle_name: {
                required: "Please Enter Vehicle Name",
            },
            vehicle_number: {
                required: "Please Enter Vehicle Number",
            },
            owner_name: {
                required: "Please Enter Vehicle Owner Name",
            },
            renewal_date: {
                required: "Please Enter Insurance validity To",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#vehicleForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>vehicle/vehicleFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>vehicle/vehicle-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>