<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3 sticky-head">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>vehicle/vehicle-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Vehicle View</h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url() . 'vehicle/vehicle-edit/' . $vehicleId; ?>" class="btn btn-info px-4 py-2 rounded border-0 fw-bold text-white">Edit</a>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle Code & Status</label>
                    <p class="mb-1 text-capitalize"><?php echo $vehicleSno; ?></p>
                    <p class="mb-0"><?php if($status = 'active') { echo '<span class="text-success">Active</span>'; } else { echo '<span class="text-danger">Inactive</span>'; } ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Zone & Branch Name</label>
                    <p class="mb-1 text-capitalize"><?php echo $vahicleZone; ?></p>
                    <p class="mb-0 text-capitalize"><?php echo $branchName; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle type & Fuel Type</label>
                    <p class="mb-1 text-capitalize"><?php echo $vehicleType; ?></p>
                    <p class="mb-0 text-capitalize"><?php echo $fuelType; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle Name & Number</label>
                    <p class="mb-1 text-capitalize"><?php echo $vehicleName; ?></p>
                    <p class="mb-0 text-capitalize"><?php echo $vehicleNumber; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle Owner Name</label>
                    <p class="mb-0 text-capitalize"><?php echo $ownerName; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Insurance Validity To</label>
                    <p class="mb-0 text-capitalize"><?php echo $renewalDate; ?></p>
                </div>
                <?php if($fcRenewalDate != '00 - 00 - 0000') { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle FC Validity To</label>
                        <p class="mb-0 text-capitalize"><?php echo $fcRenewalDate; ?></p>
                    </div>
                <?php } ?>
                <?php if($pucRenewalDate != '00 - 00 - 0000') { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle PUC Validity To</label>
                        <p class="mb-0 text-capitalize"><?php echo $pucRenewalDate; ?></p>
                    </div>
                <?php } ?>
                <?php if($vehicleRC) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle RC Book</label>
                        <p class="mb-0 text-capitalize"><a href="<?php echo base_url() . $vehicleRC; ?>" class="iframe-popup doc-hover">View RC Book</a></p>
                    </div>
                <?php } ?>
                <?php if($vehicleInsurance) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle Insurance</label>
                        <p class="mb-0 text-capitalize"><a href="<?php echo base_url() . $vehicleInsurance; ?>" class="iframe-popup doc-hover">View Insurance</a></p>
                    </div>
                <?php } ?>
                <?php if($vehicleFC) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle FC</label>
                        <p class="mb-0 text-capitalize"><a href="<?php echo base_url() . $vehicleFC; ?>" class="iframe-popup doc-hover">View FC</a></p>
                    </div>
                <?php } ?>
                <?php if($vehiclePUC) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle PUC</label>
                        <p class="mb-0 text-capitalize"><a href="<?php echo base_url() . $vehiclePUC; ?>" class="iframe-popup doc-hover">View PUC</a></p>
                    </div>
                <?php } ?>
                <?php if($vehiclePhoto) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-1 fs-14px">Vehicle Photo</label>
                        <p class="mb-0 text-capitalize"><a href="<?php echo base_url() . $vehiclePhoto; ?>" class="iframe-popup doc-hover">View Photo</a></p>
                    </div>
                <?php } ?>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Created By</label>
                    <p class="mb-0 text-capitalize"><?php echo $createdBy; ?></p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-1 fs-14px">Created At</label>
                    <p class="mb-0 text-capitalize"><?php echo $createdAt; ?></p>
                </div>
            </div>
        </div>
        <div class="mt-3 card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-4 pb-3 sticky-head">
                <h4 class="fw-bold mb-0 text-black">Vehicle Service List</h4>
                <a href="<?php echo base_url(); ?>vehicle/vehicle-service-add/<?php echo $vehicleId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Vehicle Service</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Service Date</th>
                            <th>Next Service Date</th>
                            <th>Service Category</th>
                            <th>Service KM <br> Next Service KM</th>
                            <th>Service Cost</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($vehicleServiceList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->service_dateFormat; ?></td>
                            <td><?php echo $row->next_service_dateFormat; ?></td>
                             <td>
                                 <?php
                                     $catMap = [
                                         'maintenance' => 'Maintenance',
                                         'oil_change' => 'Oil Change',
                                         'wheel_alignment' => 'Wheel Alignment',
                                         'tyre_change' => 'Tyre Change',
                                         'fc_work' => 'FC Work'
                                     ];
                                     echo isset($catMap[$row->service_category]) ? $catMap[$row->service_category] : ucwords(str_replace('_', ' ', $row->service_category));
                                 ?>
                             </td>
                             <td>
                                 <p class="mb-1"><?php echo $row->service_km; ?></p>
                                 <p class="mb-0 text-secondary"><?php echo $row->next_service_km ? $row->next_service_km : '-'; ?></p>
                             </td>
                            <td><?php echo $row->service_cost; ?></td>
                            <td><?php echo $row->description; ?></td>
                            <td>
                                <p class="mb-0"><?php echo $row->status == 'paid' ? '<span class="text-success">Paid</span>' : '<span class="text-danger">Pending</span>'; ?></p>
                                <p class="mb-0"><?php echo $row->method; ?></p>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getServiceId" data-serviceid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'vehicle/vehicle-service-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle_service" data-link="<?php echo base_url() . 'vehicle/vehicle-service/' . $vehicleId ; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
                    <h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">Service Detail</h5>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Zone</label>
                        <div id="vehicleZone" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Brach</label>
                        <div id="vehicleBrach" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Name</label>
                        <div id="vehicleName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Vehicle Number</label>
                        <div id="vehicleNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Service Date</label>
                        <div id="serviceDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Next Service Date</label>
                        <div id="nextServiceDate" class="text-capitalize text-black"></div>
                    </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                         <label class="w-100 fw-bold text-black mb-1">Service Kilometer</label>
                         <div id="serviceKM" class="text-capitalize text-black"></div>
                     </div>
                     <div class="col-lg-3 col-md-4 col-sm-6">
                         <label class="w-100 fw-bold text-black mb-1">Next Service Kilometer</label>
                         <div id="nextServiceKM" class="text-capitalize text-black"></div>
                     </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Service Category</label>
                        <div id="serviceCategory" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Service Cost</label>
                        <div id="serviceCost" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 serviceBill">
                        <label class="w-100 fw-bold text-black mb-1">Service Bill</label>
                        <div id="serviceBill" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Description</label>
                        <div id="description" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Status & Payment Method</label>
                        <div id="status" class="mb-1 text-capitalize text-black"></div>
                        <div id="method" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By & At</label>
                        <div id="createdBy" class="mb-1 text-capitalize text-black"></div>
                        <div id="createdAt" class="text-capitalize text-black"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getServiceId", function(e){
        var serviceId = $(this).data("serviceid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>vehicle/getVehicleServiceDetail',
            dataType: "json",
            data: {serviceId},
            success: function (data) {
                $('#vehicleZone').html(data.vehicleZone);
                $('#vehicleBrach').html(data.vehicleBrach);
                $('#vehicleName').html(data.vehicleName);
                $('#vehicleNumber').html(data.vehicleNumber);
                $('#serviceDate').html(data.serviceDate);
                $('#nextServiceDate').html(data.nextServiceDate);
                $('#serviceCategory').html(data.serviceCategory);
                $('#serviceKM').html(data.serviceKM);
                $('#nextServiceKM').html(data.nextServiceKM ? data.nextServiceKM : '-');
                $('#serviceCost').html(data.serviceCost);
                if (data.serviceBill) {
                    $('#serviceBill').html('<a href="' + '<?php echo base_url(); ?>' + data.serviceBill + '" data-lightbox="roadtrip" class="doc-hover">View Service Bill</a>');
                    $('.serviceBill').removeClass('d-none');
                } else {
                    $('.serviceBill').addClass('d-none');
                }
                $('#description').html(data.description);
                $('#status').html(data.status);
                $('#method').html(data.method);
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);
            }
        });
        e.preventDefault();
        return false;
    });
</script>