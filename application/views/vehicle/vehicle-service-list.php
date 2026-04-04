<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-4 pb-3 sticky-head">
                <h4 class="fw-bold mb-0 text-black">Vehicle Service List</h4>
                <a href="<?php echo base_url(); ?>vehicle/vehicle-service-add/<?php echo $vehicleId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Vehicle Service</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone <br> Brach</th>
                            <th class="w-min-100">Name <br> Number</th>
                            <th class="w-min-100">Date <br> Next Date</th>
                            <th>Category</th>
                            <th>KM</th>
                            <th>Cost</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($allVehicleServiceList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->zone; ?></p>
                                <p class="mb-0"><?php echo $row->branch; ?></p>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->vehicle_name; ?></p>
                                <p class="mb-0"><?php echo $row->vehicle_number; ?></p>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->service_dateFormat; ?></p>
                                <p class="mb-0"><?php echo $row->next_service_dateFormat; ?></p>
                            </td>
                            <td><?php echo $row->service_category; ?></td>
                            <td><?php echo $row->service_km; ?></td>
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
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle_service" data-link="<?php echo base_url() . 'vehicle/vehicle-service-list/'; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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