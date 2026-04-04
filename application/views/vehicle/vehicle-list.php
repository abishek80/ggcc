<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>vehicle/vehicle-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>vehicle/vehicle-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>vehicle/vehicle-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Vehicle List</h4>
                <a href="<?php echo base_url(); ?>vehicle/vehicle-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Vehicle</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone & Branch Name <br> Status</th>
                            <th>Vehicle Name, Number & Owner</th>
                            <th>Vehicle Doc</th>
                            <th class="w-min-75">Insurance</th>
                            <th class="w-min-75">FC</th>
                            <th class="w-min-75">PUC</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($vehicleList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->zone; ?></p>
                                <p class="mb-1"><?php echo $row->branch_name; ?></p>
                                <p class="mb-0">
                                    <?php if($row->status == 'active') { ?>
                                        <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle" data-link="<?php echo base_url(); ?>vehicle/vehicle-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                    <?php } elseif($row->status == 'inactive') { ?>
                                        <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle" data-link="<?php echo base_url(); ?>vehicle/vehicle-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                    <?php } ?>
                                </p>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->vehicle_name; ?></p>
                                <p class="mb-0"><?php echo $row->vehicle_number; ?></p>
                                <p class="mb-0"><?php echo $row->owner_name; ?></p>
                            </td>
                            <td>
                                <?php if($row->vehicle_rc) { ?>
                                    <a href="<?php echo base_url() . $row->vehicle_rc; ?>" class="iframe-popup d-block mb-1 doc-hover">View RC</a>
                                <?php } else { echo '<p class="mb-1 lh-base">-</p>'; } ?>
                                <?php if($row->vehicle_insurance) { ?>
                                    <a href="<?php echo base_url() . $row->vehicle_insurance; ?>" class="iframe-popup d-block mb-1 doc-hover">View Insurance</a>
                                <?php } else { echo '<p class="mb-0 lh-base">-</p>'; } ?>
                                <?php if($row->vehicle_puc_img) { ?>
                                    <a href="<?php echo base_url() . $row->vehicle_puc_img; ?>" class="iframe-popup d-block mb-0 doc-hover">View PUC Doc</a>
                                <?php } else { echo '<p class="mb-0 lh-base">-</p>'; } ?>
                            </td>
                            <td class="date-check" data-date-check="<?php echo $row->renewal_date; ?>"><?php $insuranceDateFormat = new DateTime($row->renewal_date); echo $insuranceDateFormat->format('d - m - Y'); ?></td>
                            <td class="date-check" data-date-check="<?php echo $row->fc_renewal_date; ?>">
                                <?php
                                    if ($row->fc_renewal_date != '0000-00-00' && !empty($row->fc_renewal_date)) {
                                        $fcDateFormat = new DateTime($row->fc_renewal_date);
                                        echo $fcDateFormat->format('d - m - Y');
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                            <td class="date-check" data-date-check="<?php echo $row->puc_renewal_date; ?>">
                                <?php
                                    if ($row->puc_renewal_date != '0000-00-00' && !empty($row->puc_renewal_date)) {
                                        $pucDateFormat = new DateTime($row->puc_renewal_date);
                                        echo $pucDateFormat->format('d - m - Y');
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getvehicleId" data-vehicleid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'vehicle/vehicle-service/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Vehicle Service"> <i class="bx bx-wrench"></i> </a>
                                    <a href="<?php echo base_url() . 'vehicle/vehicle-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle" data-link="<?php echo base_url(); ?>vehicle/vehicle-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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

<div class="modal fade" id="view_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="headingTitle"></div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Code & Status</label>
                        <div id="vehicleSno" class="text-capitalize text-black"></div>
                        <div id="status" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="vahicleZone" class="text-capitalize text-black"></div>
                        <div id="branch" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Type & Fuel Type</label>
                        <div id="vehicleType" class="text-capitalize text-black"></div>
                        <div id="fuelType" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Name & Number</label>
                        <div id="vehicleName" class="text-capitalize text-black"></div>
                        <div id="vehicleNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Owner Name</label>
                        <div id="ownerName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Insurance validity To</label>
                        <div id="renewalDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 fcRenewalDate">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle FC Validity To</label>
                        <div id="fcRenewalDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pucRenewalDate">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle PUC Validity To</label>
                        <div id="pucRenewalDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 vehicleRC">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle RC Book</label>
                        <div id="vehicleRC" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 vehicleInsurance">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Insurance</label>
                        <div id="vehicleInsurance" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 vehicleFC">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle FC</label>
                        <div id="vehicleFC" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 vehiclePUC">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle PUC</label>
                        <div id="vehiclePUC" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 vehiclePhoto">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Photo</label>
                        <div id="vehiclePhoto" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By</label>
                        <div id="createdBy" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created At</label>
                        <div id="createdAt" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12 service_Date border-top pt-3 mt-3">
                        <div class="row g-3">
                            <div class="service_Date col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Service Date</label>
                                <div id="service_Date" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_EndDate col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Service End Date</label>
                                <div id="service_EndDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_km col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Service KM</label>
                                <div id="service_km" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_category col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Service Category</label>
                                <div id="service_category" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_Cost col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Service Cost</label>
                                <div id="service_Cost" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_Bill col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Service Bill</label>
                                <div id="service_Bill" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_Description col-lg-3 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Description</label>
                                <div id="service_Description" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_Status col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Status</label>
                                <div id="service_Status" class="text-capitalize text-black"></div>
                            </div>
                            <div class="service_Payment col-lg-3 col-md-6 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Payment Method</label>
                                <div id="service_Payment" class="text-capitalize text-black"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getvehicleId", function(e){
        var vehicleId = $(this).data("vehicleid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>vehicle/getVehicleDetail',
            dataType: "json",
            data: {vehicleId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.vehicleName + ' Details</h5>');
                $('#vehicleSno').html(data.vehicleSno);
                $('#vahicleZone').html(data.vahicleZone);
                $('#branch').html(data.branchName);
                $('#ownerName').html(data.ownerName);
                $('#vehicleType').html(data.vehicleType);
                $('#fuelType').html(data.fuelType);
                $('#vehicleName').html(data.vehicleName);
                $('#vehicleNumber').html(data.vehicleNumber);
                if (data.vehiclePhoto) {
                    $('#vehiclePhoto').html('<a href="' + '<?php echo base_url(); ?>' + data.vehiclePhoto + '" target="_blank" class="doc-hover">View Photo</a>');
                    $('.vehiclePhoto').removeClass('d-none');
                } else {
                    $('.vehiclePhoto').addClass('d-none');
                }
                if (data.vehicleRC) {
                    $('#vehicleRC').html('<a href="' + '<?php echo base_url(); ?>' + data.vehicleRC + '" target="_blank" class="doc-hover">View RC</a>');
                    $('.vehicleRC').removeClass('d-none');
                } else {
                    $('.vehicleRC').addClass('d-none');
                }
                if (data.vehicleInsurance != '00 - 00 - 0000') {
                    $('#vehicleInsurance').html('<a href="' + '<?php echo base_url(); ?>' + data.vehicleInsurance + '" target="_blank" class="doc-hover">View Insurance</a>');
                    $('.vehicleInsurance').removeClass('d-none');
                } else {
                    $('.vehicleInsurance').addClass('d-none');
                }
                if (data.fcRenewalDate != '00 - 00 - 0000') {
                    $('#fcRenewalDate').html(data.fcRenewalDate);
                    $('.fcRenewalDate').removeClass('d-none');
                } else {
                    $('.fcRenewalDate').addClass('d-none');
                }
                if (data.pucRenewalDate != '00 - 00 - 0000') {
                    $('#pucRenewalDate').html(data.pucRenewalDate);
                    $('.pucRenewalDate').removeClass('d-none');
                } else {
                    $('.pucRenewalDate').addClass('d-none');
                }
                if (data.vehicleFC) {
                    $('#vehicleFC').html('<a href="' + '<?php echo base_url(); ?>' + data.vehicleFC + '" target="_blank" class="doc-hover">View FC</a>');
                    $('.vehicleFC').removeClass('d-none');
                } else {
                    $('.vehicleFC').addClass('d-none');
                }
                if (data.vehiclePUC) {
                    $('#vehiclePUC').html('<a href="' + '<?php echo base_url(); ?>' + data.vehiclePUC + '" target="_blank" class="doc-hover">View PUC</a>');
                    $('.vehiclePUC').removeClass('d-none');
                } else {
                    $('.vehiclePUC').addClass('d-none');
                }
                $('#renewalDate').html(data.renewalDate);
                $('#status').html(data.status);
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);

                
                if (data.serviceDate) {
                    $('#service_Date').html('<div class="text-capitalize text-black">' + data.serviceDate + '</div>');
                    $('.service_Date').removeClass('d-none');
                } else {
                    $('.service_Date').addClass('d-none');
                }
                if (data.endServiceDate) {
                    $('#service_EndDate').html('<div class="text-capitalize text-black">' + data.endServiceDate + '</div>');
                    $('.service_EndDate').removeClass('d-none');
                } else {
                    $('.service_EndDate').addClass('d-none');
                }
                if (data.serviceCategory) {
                    $('#service_category').html('<div class="text-capitalize text-black">' + data.serviceCategory + '</div>');
                    $('.service_category').removeClass('d-none');
                } else {
                    $('.service_category').addClass('d-none');
                }
                if (data.serviceKilometer) {
                    $('#service_km').html('<div class="text-capitalize text-black">' + data.serviceKilometer + '</div>');
                    $('.service_km').removeClass('d-none');
                } else {
                    $('.service_km').addClass('d-none');
                }
                if (data.serviceCost) {
                    $('#service_Cost').html('<div class="mb-1 text-capitalize text-black">' + data.serviceCost + '</div>');
                    $('.service_Cost').removeClass('d-none');
                } else {
                    $('.service_Cost').addClass('d-none');
                }
                if (data.serviceBill) {
                    $('#service_Bill').html('<div class="text-capitalize text-black"><a href="' + '<?php echo base_url(); ?>' + data.serviceBill + '" target="_blank" class="doc-hover">View Service Bill</a></div>');
                    $('.service_Bill').removeClass('d-none');
                } else {
                    $('#service_Bill').html('<div class="text-capitalize text-black">-</div>');
                    $('.service_Bill').addClass('d-none');
                }
                if (data.serviceDesc) {
                    $('#service_Description').html('<div class="text-capitalize text-black">' + data.serviceDesc + '</div>');
                    $('.service_Description').removeClass('d-none');
                } else {
                    $('.service_Description').addClass('d-none');
                }
                if (data.servicePayment) {
                    $('#service_Status').html('<div class="text-capitalize text-black">' + data.servicePayment + '</div>');
                    $('.service_Status').removeClass('d-none');
                } else {
                    $('.service_Status').addClass('d-none');
                }
                if (data.serviceStatus) {
                    $('#service_Payment').html('<div class="text-capitalize text-black">' + data.serviceStatus + '</div>');
                    $('.service_Payment').removeClass('d-none');
                } else {
                    $('.service_Payment').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });
</script>