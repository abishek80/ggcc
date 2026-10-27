<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php 
            $branch = $planner['branch'] ?? null;
            $branchCoords = $planner['branch_coords'] ?? null;
            $stats = $planner['stats'] ?? ['total' => 0, 'overdue' => 0, 'due_soon' => 0, 'safe' => 0, 'with_coords' => 0, 'total_km' => 0];
            $stops = $planner['sequenced_stops'] ?? [];
            $routeUrl = $planner['google_maps_route_url'] ?? '';
            $filter = $planner['priority_filter'] ?? 'all';
            $selBranchId = $selectedBranchId ?? '';
        ?>

        <div class="card p-3 mb-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <div>
                            <h4 class="fw-bold mb-0 text-black">Earth Testing Priority & Route Planner</h4>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <!-- Branch Selector -->
                    <div style="min-width: 240px;">
                        <select id="branchSelect" class="form-select select2" onchange="if(this.value) window.location.href='<?php echo base_url(); ?>outlet/earth-testing/' + this.value + '/<?php echo $filter; ?>';">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $bRow) { ?>
                                <option value="<?php echo $bRow->id; ?>" <?php if ($bRow->id == $selBranchId) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($bRow->branch); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Open Full Route in Google Maps -->
                    <?php if (!empty($routeUrl)) { ?>
                        <a href="<?php echo htmlspecialchars($routeUrl); ?>" target="_blank" class="btn btn-success d-flex align-items-center gap-1">
                            <i class="bx bx-map-pin"></i> Open Full Route in Google Maps
                        </a>
                    <?php } else { ?>
                        <button class="btn btn-outline-secondary" disabled title="Requires at least 2 stops with valid map location coordinates">
                            <i class="bx bx-map-pin"></i> Google Maps Route
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Filter Cards (Clickable KPI Summary Cards) -->
        <div class="row g-3 mb-3">
            <!-- 1. All Outlets -->
            <?php $isAllActive = ($filter == 'all'); ?>
            <div class="col-xl col-md-4 col-sm-6">
                <a href="<?php echo base_url(); ?>outlet/earth-testing/<?php echo $selBranchId; ?>/all" class="filter-card-link" title="Click to view all outlets">
                    <div class="card p-3 border-4 border-start-0 border-top-0 border-end-0 border-primary shadow-sm h-100 filter-card <?php echo $isAllActive ? 'bg-primary text-white' : 'bg-white text-primary'; ?>">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="<?php echo $isAllActive ? 'text-white' : 'text-primary'; ?> fs-12px fw-bold text-uppercase">Total Outlets</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold mb-0 <?php echo $isAllActive ? 'text-white' : 'text-dark'; ?>"><?php echo $stats['total']; ?></h3>
                                <span class="fs-12px <?php echo $isAllActive ? 'text-white' : 'text-muted'; ?>"><?php echo $stats['with_coords']; ?> geolocated on map</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 2. Highest Priority / Overdue (< 15 days) -->
            <?php $isOverdueActive = ($filter == 'overdue'); ?>
            <div class="col-xl col-md-4 col-sm-6">
                <a href="<?php echo base_url(); ?>outlet/earth-testing/<?php echo $selBranchId; ?>/overdue" class="filter-card-link" title="Click to filter highest priority & overdue outlets">
                    <div class="card p-3 border-4 border-start-0 border-top-0 border-end-0 border-danger shadow-sm h-100 filter-card <?php echo $isOverdueActive ? 'bg-danger text-white' : 'bg-white text-danger'; ?>">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="<?php echo $isOverdueActive ? 'text-white' : 'text-danger'; ?> fs-12px fw-bold text-uppercase">🔴 Highest Priority</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold mb-0 <?php echo $isOverdueActive ? 'text-white' : 'text-danger'; ?>"><?php echo $stats['overdue']; ?></h3>
                                <span class="fs-12px <?php echo $isOverdueActive ? 'text-white' : 'text-muted'; ?>">&lt; 15 days or past due</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 3. Medium Priority / Due Soon (15 - 45 days) -->
            <?php $isDueSoonActive = ($filter == 'due_soon'); ?>
            <div class="col-xl col-md-4 col-sm-6">
                <a href="<?php echo base_url(); ?>outlet/earth-testing/<?php echo $selBranchId; ?>/due_soon" class="filter-card-link" title="Click to filter medium priority & due soon outlets">
                    <div class="card p-3 border-4 border-start-0 border-top-0 border-end-0 border-warning shadow-sm h-100 filter-card <?php echo $isDueSoonActive ? 'bg-warning text-white' : 'bg-white text-warning'; ?>">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="<?php echo $isDueSoonActive ? 'text-white' : 'text-warning'; ?> fs-12px fw-bold text-uppercase">🟠 Medium Priority</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold mb-0 <?php echo $isDueSoonActive ? 'text-white' : 'text-warning'; ?>"><?php echo $stats['due_soon']; ?></h3>
                                <span class="fs-12px <?php echo $isDueSoonActive ? 'text-white' : 'text-muted'; ?>">Due within 15 - 45 days</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 4. Upcoming (> 45 days) -->
            <?php $isSafeActive = ($filter == 'safe'); ?>
            <div class="col-xl col-md-4 col-sm-6">
                <a href="<?php echo base_url(); ?>outlet/earth-testing/<?php echo $selBranchId; ?>/safe" class="filter-card-link" title="Click to filter upcoming outlets">
                    <div class="card p-3 border-4 border-start-0 border-top-0 border-end-0 border-success shadow-sm h-100 filter-card <?php echo $isSafeActive ? 'bg-success text-white' : 'bg-white text-success'; ?>">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="<?php echo $isSafeActive ? 'text-white' : 'text-success'; ?> fs-12px fw-bold text-uppercase">🟢 Upcoming</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold mb-0 <?php echo $isSafeActive ? 'text-white' : 'text-success'; ?>"><?php echo $stats['safe']; ?></h3>
                                <span class="fs-12px <?php echo $isSafeActive ? 'text-white' : 'text-muted'; ?>">&gt; 45 days remaining</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- 5. Tour Travel Distance -->
            <div class="col-xl col-md-4 col-sm-6">
                <div class="card p-3 border-4 border-start-0 border-top-0 border-end-0 border-info shadow-sm h-100 bg-white">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span class="text-info fs-12px fw-bold text-uppercase">Tour Distance</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bold mb-0 text-dark"><?php echo number_format($stats['total_km'], 1); ?> <span class="fs-6 text-muted">KM</span></h3>
                            <span class="fs-12px text-muted"><?php echo count($stops); ?> route stop<?php echo count($stops) != 1 ? 's' : ''; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sequential Stops Table -->
        <div class="card p-3">

            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 80px;">Stop Order</th>
                            <th>Priority & Due Status</th>
                            <th>Outlet Name & ID</th>
                            <th>Location & Map</th>
                            <th>Travel Distance</th>
                            <th>Earth Dates</th>
                            <th>Contact Person</th>
                            <th class="text-center" style="width: 140px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($stops)) { ?>
                            <?php foreach ($stops as $stop) { ?>
                                <tr class="<?php echo ($stop->priority == 1) ? 'table-danger-subtle' : (($stop->priority == 2) ? 'table-warning-subtle' : ''); ?>">
                                    <!-- Stop Order Badge -->
                                    <td class="text-center fw-bold"><?php echo $stop->stop_number; ?></td>

                                    <!-- Priority & Urgency Badge -->
                                    <td>
                                        <div class="fs-12px text-muted">
                                            <?php if ($stop->days_remaining < 0 && $stop->days_remaining > -900) { ?>
                                                <span class="text-danger fw-semibold">Past renewal by <?php echo abs($stop->days_remaining); ?> days</span>
                                            <?php } elseif ($stop->days_remaining >= 0 && $stop->days_remaining <= 15) { ?>
                                                <span class="text-danger fw-semibold">Only <?php echo $stop->days_remaining; ?> days remaining</span>
                                            <?php } elseif ($stop->days_remaining <= 45) { ?>
                                                <span class="text-warning fw-semibold"><?php echo $stop->days_remaining; ?> days remaining</span>
                                            <?php } elseif ($stop->days_remaining > 45) { ?>
                                                <span class="text-success"> <?php echo $stop->days_remaining; ?> days remaining</span>
                                            <?php } else { ?>
                                                <span class="text-danger fw-semibold">No renewal date set</span>
                                            <?php } ?>
                                        </div>
                                    </td>

                                    <!-- Outlet Name & ID -->
                                    <td>
                                        <div class="fw-bold text-dark text-capitalize mb-1">
                                            <?php echo htmlspecialchars($stop->outlet_name); ?>
                                        </div>
                                        <div class="fs-12px text-muted">
                                            ID: <?php echo !empty($stop->customer_id) ? htmlspecialchars($stop->customer_id) : '-'; ?> | 
                                            S.No: <?php echo htmlspecialchars($stop->sno); ?>
                                        </div>
                                    </td>

                                    <!-- Location & Map Link -->
                                    <td>
                                        <div class="text-capitalize text-dark mb-1">
                                            <?php echo htmlspecialchars($stop->outlet_location); ?>
                                        </div>
                                        <div>
                                            <?php if (!empty($stop->location_url)) { 
                                                $locUrl = (preg_match('#^https?://#i', $stop->location_url)) ? $stop->location_url : 'https://' . $stop->location_url;
                                            ?>
                                                <a href="<?php echo htmlspecialchars($locUrl); ?>" target="_blank" class="badge bg-primary text-white fs-tiny py-2 px-3 rounded-pill" title="<?php echo htmlspecialchars($stop->location_url); ?>">
                                                    View on Map
                                                </a>
                                            <?php } else { ?>
                                                <span class="badge bg-warning text-white fs-tiny py-2 px-3 rounded-pill">No Map URL</span>
                                            <?php } ?>
                                        </div>
                                    </td>

                                    <!-- Travel Distance in KM -->
                                    <td>
                                        <?php if ($stop->leg_km !== null) { ?>
                                            <div class="fw-bold text-primary fs-14px">
                                                +<?php echo number_format($stop->leg_km, 1); ?> km
                                            </div>
                                            <div class="fs-11px text-muted">
                                                from <span class="fw-semibold text-truncate d-inline-block" style="max-width: 140px; vertical-align: bottom;"><?php echo htmlspecialchars($stop->from_point); ?></span>
                                            </div>
                                        <?php } else { ?>
                                            <span class="text-muted fs-13px">-</span>
                                            <div class="fs-11px text-warning">Map coords missing</div>
                                        <?php } ?>
                                    </td>

                                    <!-- Earth Dates -->
                                    <td>
                                        <div class="fs-13px mb-1">
                                            <span class="text-muted">Renewal:</span> 
                                            <span class="fw-bold <?php echo ($stop->priority == 1) ? 'text-danger' : (($stop->priority == 2) ? 'text-warning' : 'text-success'); ?>">
                                                <?php echo !empty($stop->renewal_dateFormat) ? $stop->renewal_dateFormat : '-'; ?>
                                            </span>
                                        </div>
                                        <div class="fs-12px text-muted">
                                            Checked: <?php echo !empty($stop->checking_dateFormat) ? $stop->checking_dateFormat : '-'; ?>
                                        </div>
                                    </td>

                                    <!-- Contact Person -->
                                    <td>
                                        <div class="fw-semibold text-dark"><?php echo !empty($stop->contact_name) ? htmlspecialchars($stop->contact_name) : '-'; ?></div>
                                        <?php if (!empty($stop->contact_number)) { ?>
                                            <a href="tel:<?php echo htmlspecialchars($stop->contact_number); ?>" class="btn btn-xs btn-outline-primary mt-1">
                                                <i class="bx bx-phone me-1"></i><?php echo htmlspecialchars($stop->contact_number); ?>
                                            </a>
                                        <?php } else { ?>
                                            <span class="text-muted fs-12px">No phone</span>
                                        <?php } ?>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <!-- Create Earth Renewal Complaint -->
                                            <a href="<?php echo base_url(); ?>complaint/complaint-add?branch=<?php echo $stop->branch_id; ?>&outlet_id=<?php echo $stop->id; ?>&work_type=earth_renewal" 
                                               class="btn btn-icon btn-sm btn-label-success" data-toggle="tooltip" title="Create Earth Renewal Complaint">
                                                <i class="bx bx-plus-circle"></i>
                                            </a>

                                            <!-- Edit Outlet -->
                                            <a href="<?php echo base_url(); ?>outlet/outlet-edit/<?php echo $stop->id; ?>" 
                                               class="btn btn-icon btn-sm btn-label-primary" data-toggle="tooltip" title="Edit Outlet">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>

                                            <!-- View Details Modal -->
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-label-dark getoutletId" data-outletid="<?php echo $stop->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" title="View Outlet Details">
                                                <i class="bx bx-show-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bx bx-info-circle fs-1 text-secondary mb-2 d-block"></i>
                                        <h5>No outlets found for the selected criteria</h5>
                                        <p class="mb-0">Try changing the branch or selecting "All Outlets" filter.</p>
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

<!-- Outlet Detail Modal -->
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
                        <label class="w-100 fw-bold text-black mb-1">Outlet S.No</label>
                        <div id="outletSno" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Customer Id</label>
                        <div id="customerId" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch</label>
                        <div id="zone" class="text-capitalize text-black"></div>
                        <div id="branch" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Type</label>
                        <div id="outletType" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Name & Location</label>
                        <div id="outletName" class="mt-1 text-capitalize text-black fw-bold"></div>
                        <div id="outletLocation" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Contact Name & Number</label>
                        <div id="contactName" class="mt-1 text-capitalize text-black"></div>
                        <div id="contactNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 earthingChamber">
                        <label class="w-100 fw-bold text-black mb-1">Earthing Chamber Count</label>
                        <div id="earthingChamber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 renewalDate">
                        <label class="w-100 fw-bold text-black mb-1">Earth Check & Renewal Date</label>
                        <div id="checkingDate" class="mt-1 text-capitalize text-black"></div>
                        <div id="renewalDate" class="mt-1 text-capitalize text-black fw-bold"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Status</label>
                        <div id="status" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By & Date</label>
                        <div id="createdBy" class="mt-1 text-capitalize text-black"></div>
                        <div id="createdAt" class="mt-1 text-capitalize text-black"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if ($.fn.select2) {
            $('.select2').select2();
        }
    });

    $(document).on("click", ".getoutletId", function(e){
        var outletId = $(this).data("outletid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": (typeof csrftoken !== 'undefined') ? csrftoken : ''
            },
            url: '<?php echo base_url(); ?>outlet/getOutletDetail',
            dataType: "json",
            data: {outletId: outletId},
            success: function (data) {
                function cleanModalVal(v) {
                    if (v === null || v === undefined || v === 'null' || v === 'Null' || v === '00 - 00 - 0000' || v === '') {
                        return '-';
                    }
                    return v;
                }

                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + cleanModalVal(data.outletName) + ' - ' + cleanModalVal(data.branchName) + ' Details</h5>');
                $('#outletSno').html(cleanModalVal(data.outletSno));
                $('#customerId').html(cleanModalVal(data.customerId));
                $('#zone').html(cleanModalVal(data.zone));
                $('#branch').html(cleanModalVal(data.branchName));
                $('#outletType').html(cleanModalVal(data.outletType));
                $('#outletName').html(cleanModalVal(data.outletName));
                
                var outletLoc = cleanModalVal(data.outletLocation);
                if (data.locationUrl && data.locationUrl.trim() !== '' && data.locationUrl !== '-' && data.locationUrl !== 'null') {
                    var locUrl = (data.locationUrl.match(/^https?:\/\//i)) ? data.locationUrl : 'https://' + data.locationUrl;
                    outletLoc += ' <a href="' + encodeURI(locUrl) + '" target="_blank" class="badge bg-primary mt-2 rounded-pill px-3 py-2 text-white">View Location</a>';
                }
                $('#outletLocation').html(outletLoc);
                $('#contactName').html(cleanModalVal(data.contactName));
                $('#contactNumber').html(data.contactNumber ? '<a href="tel:' + data.contactNumber + '" class="a-hover">' + data.contactNumber + '</a>' : '-');
                
                if (data.earthingChamber) {
                    $('#earthingChamber').html(data.earthingChamber);
                    $('.earthingChamber').removeClass('d-none');
                } else {
                    $('.earthingChamber').addClass('d-none');
                }
                
                if (data.renewalDate && data.renewalDate != '00 - 00 - 0000') {
                    $('#renewalDate').html(data.renewalDate);
                    $('.renewalDate').removeClass('d-none');
                } else {
                    $('.renewalDate').addClass('d-none');
                }
                if (data.checkingDate && data.checkingDate != '00 - 00 - 0000') {
                    $('#checkingDate').html(data.checkingDate);
                    $('.checkingDate').removeClass('d-none');
                } else {
                    $('.checkingDate').addClass('d-none');
                }
                
                $('#status').html(cleanModalVal(data.status));
                $('#createdBy').html(cleanModalVal(data.createdBy));
                $('#createdAt').html(cleanModalVal(data.createdAt));
            }
        });
        e.preventDefault();
        return false;
    });
</script>
