<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <?php
            // URL pattern: vehicle/vehicle-service-list/{category}/{year}/{month}
            // 'all' is used as placeholder when category is empty so CI never skips a segment
            function svcUrl($cat, $yr, $mo) {
                $catSlug = ($cat === '' || $cat === null) ? 'all' : $cat;
                return base_url() . 'vehicle/vehicle-service-list/' . $catSlug . '/' . $yr . '/' . $mo;
            }
        ?>

        <!-- Year Filter Buttons -->
        <?php if (!empty($availableYears)): ?>
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($availableYears as $yr): ?>
            <a href="<?php echo svcUrl($activeCategory, $yr, ''); ?>" class="d-block card px-5 py-2 text-center <?php echo ($activeYear == $yr) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                <p class="mb-0 <?php echo ($activeYear == $yr) ? 'text-white' : 'text-black'; ?>"><?php echo $yr; ?></p>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Month Filter Buttons (only show months of selected year) -->
        <?php
        $monthNames = ['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June',
                       '07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'];
        $monthsForYear = ($activeYear && isset($availableMonths[$activeYear])) ? $availableMonths[$activeYear] : [];
        if (!empty($monthsForYear)):
        ?>
        <div class="d-flex gap-3 flex-wrap mb-3">
            <a href="<?php echo svcUrl($activeCategory, $activeYear, ''); ?>" class="d-block card px-5 py-2 text-center <?php echo ($activeMonth === '') ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                <p class="mb-0 <?php echo ($activeMonth === '') ? 'text-white' : 'text-black'; ?>">All Months</p>
            </a>
            <?php foreach ($monthsForYear as $mo => $dummy): ?>
            <a href="<?php echo svcUrl($activeCategory, $activeYear, $mo); ?>" class="d-block card px-5 py-2 text-center <?php echo ($activeMonth == $mo) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                <p class="mb-0 <?php echo ($activeMonth == $mo) ? 'text-white' : 'text-black'; ?>"><?php echo $monthNames[$mo]; ?></p>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>


        <!-- Category Summary Cards -->
        <div class="row g-3 mb-3">
            <?php
            $categories = [
                '' => [
                    'title'  => 'All Services',
                    'border' => 'border-primary',
                    'text'   => 'text-dark'
                ],
                'maintenance' => [
                    'title'  => 'Maintenance',
                    'border' => 'border-danger',
                    'text'   => 'text-dark'
                ],
                'oil_change' => [
                    'title'  => 'Oil Change',
                    'border' => 'border-warning',
                    'text'   => 'text-dark'
                ],
                'wheel_alignment' => [
                    'title'  => 'Wheel Alignment',
                    'border' => 'border-info',
                    'text'   => 'text-dark'
                ],
                'tyre_change' => [
                    'title'  => 'Tyre Change',
                    'border' => 'border-success',
                    'text'   => 'text-dark'
                ],
                'battery' => [
                    'title'  => 'Battery',
                    'border' => 'border-dark',
                    'text'   => 'text-dark'
                ],
                'fc_work' => [
                    'title'  => 'FC Work',
                    'border' => 'border-secondary',
                    'text'   => 'text-dark'
                ]
            ];
            foreach ($categories as $key => $cat) {
                $isActive = ($activeCategory === $key);
                $bgClass = $isActive ? ($key === '' ? 'bg-primary' : 'bg-' . str_replace('border-', '', $cat['border'])) : 'bg-white';
                $textTitleClass = $isActive ? 'text-white' : 'text-black';
                $textAmtClass   = $isActive ? 'text-white' : $cat['text'];
            ?>
                <div class="col-lg col-md-4 col-6">
                    <a href="<?php echo svcUrl($key, $activeYear, $activeMonth); ?>" class="hover-card-wrapper">
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
                <table class="zero_config table table-striped table-bordered" data-order='[]'>
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone <br> Brach</th>
                            <th class="w-min-100">Name <br> Number</th>
                            <th class="w-min-100">Date <br> Next Date</th>
                            <th>Category</th>
                            <th class="w-min-75">KM <br> Next KM</th>
                            <th>Cost</th>
                            <th>Description</th>
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
                                        'battery' => 'Battery',
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
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getServiceId" data-serviceid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'vehicle/vehicle-service-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle_service" data-link="<?php echo svcUrl($activeCategory, $activeYear, $activeMonth); ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
                    var billsHtml = '';
                    try {
                        var parsed = JSON.parse(data.serviceBill);
                        if (Array.isArray(parsed) && parsed.length > 0) {
                            billsHtml = '<div class="d-flex flex-column gap-1">';
                            parsed.forEach(function(b) {
                                if (b.file) {
                                    var title = b.title ? b.title : 'Service Bill';
                                    billsHtml += '<div><a href="' + '<?php echo base_url(); ?>' + b.file + '" target="_blank" class="doc-hover"><i class="bx bx-file me-1"></i>' + title + '</a></div>';
                                }
                            });
                            billsHtml += '</div>';
                        }
                    } catch(e) {
                        billsHtml = '<a href="' + '<?php echo base_url(); ?>' + data.serviceBill + '" target="_blank" class="doc-hover">View Service Bill</a>';
                    }
                    if (billsHtml) {
                        $('#serviceBill').html(billsHtml);
                        $('.serviceBill').removeClass('d-none');
                    } else {
                        $('.serviceBill').addClass('d-none');
                    }
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