<style>
.hover-card-wrapper {
    text-decoration: none !important;
}
.hover-card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}
.hover-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
}
</style>
<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <?php
            $categories = [
                '' => [
                    'title' => 'All Services',
                    'border' => 'border-primary',
                    'text' => 'text-primary'
                ],
                'maintenance' => [
                    'title' => 'Maintenance',
                    'border' => 'border-danger',
                    'text' => 'text-danger'
                ],
                'oil_change' => [
                    'title' => 'Oil Change',
                    'border' => 'border-warning',
                    'text' => 'text-warning'
                ],
                'wheel_alignment' => [
                    'title' => 'Wheel Alignment',
                    'border' => 'border-info',
                    'text' => 'text-info'
                ],
                'tyre_change' => [
                    'title' => 'Tyre Change',
                    'border' => 'border-success',
                    'text' => 'text-success'
                ],
                'fc_work' => [
                    'title' => 'FC Work',
                    'border' => 'border-secondary',
                    'text' => 'text-secondary'
                ]
            ];
            foreach ($categories as $key => $cat) { 
                $isActive = ($activeCategory === $key);
                $bgClass = $isActive ? ($key === '' ? 'bg-primary' : 'bg-' . str_replace('border-', '', $cat['border'])) : 'bg-white';
                $textTitleClass = $isActive ? 'text-white' : 'text-black';
                $textAmtClass = $isActive ? 'text-white' : $cat['text'];
            ?>
                <div class="col-lg col-md-4 col-6">
                    <a href="<?php echo base_url() . 'vehicle/vehicle-service-list/' . $key; ?>" class="hover-card-wrapper">
                        <div class="card p-3 text-center <?php echo $bgClass; ?> <?php echo $cat['border']; ?> border border-4 border-end-0 border-start-0 border-top-0 shadow shadow-sm hover-card">
                            <p class="mb-3 <?php echo $textTitleClass; ?>"><?php echo $cat['title']; ?></p>
                            <h5 class="mb-0 amount-format fw-semibold <?php echo $textAmtClass; ?>"><?php echo $categorySums[$key === '' ? 'all' : $key]; ?></h5>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-4 pb-3 sticky-head flex-wrap gap-3">
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
                            <th>KM <br> Next KM</th>
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
                                <p class="mb-0 date-check" data-date-check="<?php echo $row->next_service_date; ?>"><?php echo $row->next_service_dateFormat; ?></p>
                            </td>
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
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle_service" data-link="<?php echo base_url() . 'vehicle/vehicle-service-list/' . $activeCategory; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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