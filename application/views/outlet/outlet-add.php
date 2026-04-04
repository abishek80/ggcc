<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="outletForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>outlet/outlet-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>outlet/outlet-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $outletToken; ?>">
            <input name="outlet_id" id="outlet_id" type="hidden" value="<?php echo $outletId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Type</label>
                    <select name="outlet_type" id="outlet_type" class="form-select">
                        <option value="">Select Outlet Type</option>
                        <option value="100" <?php if($outletType == '100') { echo 'selected'; } ?>>100</option>
                        <option value="119" <?php if($outletType == '119') { echo 'selected'; } ?>>119</option>
                        <option value="120" <?php if($outletType == '120') { echo 'selected'; } ?>>120</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Customer ID</label>
                    <input name="customer_id" id="customer_id" type="text" class="form-control" placeholder="Enter Customer ID" value="<?php echo $customerId; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                    <input name="outlet_name" id="outlet_name" type="text" pattern="[a-z]*" class="form-control generate_token" placeholder="Enter Outlet Name" value="<?php echo $outletName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                    <input name="outlet_location" id="outlet_location" pattern="[a-z]*" type="text" class="form-control" placeholder="Enter Outlet Location" value="<?php echo $outletLocation; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name</label>
                    <input name="contact_name" id="contact_name" pattern="[a-z]*" type="text" class="form-control" placeholder="Enter Outlet Contact Name" value="<?php echo $contactName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number</label>
                    <input name="contact_number" id="contact_number" type="text" class="form-control number-only" placeholder="Enter Outlet Contact Number" value="<?php echo $contactNumber; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
                <h5 class="fw-bold text-gray mb-0 mt-4 pt-2">Outlet Other Details</h5>
                <div class="col-12 pt-3 mt-3 border-top">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Earth Checking Date</label>
                            <input name="checking_date" id="checking_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $checkingDate; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Earth Renewal Date</label>
                            <input name="renewal_date" id="renewal_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $renewalDate; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Earthing Chamber Count</label>
                            <input name="earthing_chamber" id="earthing_chamber" type="text" class="form-control number-only" placeholder="Enter Earthing Chamber Count" value="<?php echo $earthingChamber; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">CVT Count</label>
                            <input name="cvt" id="cvt" type="text" class="form-control" placeholder="Enter CVT Count" value="<?php echo $cvt; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Stabilizer Count</label>
                            <input name="stabilizer" id="stabilizer" type="text" class="form-control" placeholder="Enter Stabilizer Count" value="<?php echo $stabilizer; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">STP Count</label>
                            <input name="stp" id="stp" type="text" class="form-control" placeholder="Enter STP Count" value="<?php echo $stp; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Canopy Light Count</label>
                            <input name="canopy_light" id="canopy_light" type="text" class="form-control" placeholder="Enter Canopy Light Count" value="<?php echo $canopyLight; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Yard Pole Count</label>
                            <input name="yard_pole" id="yard_pole" type="text" class="form-control" placeholder="Enter Yard Pole Count" value="<?php echo $yardPole; ?>">
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Pump Count</label>
                            <input name="pump" id="pump" type="text" class="form-control" placeholder="Enter Pump Count" value="<?php echo $pump; ?>">
                        </div>
                    </div>
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
    
    // Outlet Save Function
    $("#outletForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch: {
                required: true
            },
            outlet_name: {
                required: true
            },
            outlet_location: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Branch Zone"
            },
            branch: {
                required: "Please Select Branch Name"
            },
            outlet_name: {
                required: "Please Enter Outlet Name"
            },
            outlet_location: {
                required: "Please Enter Outlet Location"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#outletForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>outlet/outletFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>outlet/outlet-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>