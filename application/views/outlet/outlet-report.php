<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>outlet/outlet-report/active/<?php echo $branchId; ?>" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>outlet/outlet-report/inactive/<?php echo $branchId; ?>" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Outlet List</h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <div class="w-px-250"> 
                        <select id="branchSelect" class="w-100 form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button id="searchButton" class="btn btn-primary w-px-100px">Search</button>
                    <a href="<?php echo base_url(); ?>outlet/outlet-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Outlet</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone & Branch Name</th>
                            <th>Outlet Customer Id</th>
                            <th>Outlet Name & Location</th>
                            <th>Contact Name & Number</th>
                            <th>Earth Check & Renewal Date</th>
                            <th>Status</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($outletReportList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->zone; ?></p>
                                <p class="mb-0"><?php echo $row->branch; ?></p>
                            </td>
                            <td><?php echo $row->customer_id; ?></td>
                            <td>
                                <p class="mb-1"><?php if($row->outlet_type) { echo $row->outlet_type . ' - '; } echo $row->outlet_name; ?></p>
                                <p class="mb-0"><?php echo $row->outlet_location; ?></p>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->contact_name; ?></p>
                                <a href="tel:<?php echo $row->contact_number; ?>" class="a-hover"><?php echo $row->contact_number; ?></a>
                            </td>
                            <td>
                                <p class="mb-1 date-check" data-date-check="<?php echo  $row->checking_date; ?>"><?php echo  $row->checking_dateFormat; ?></p>
                                <p class="mb-0 date-check" data-date-check="<?php echo $row->renewal_date; ?>"><?php echo $row->renewal_dateFormat; ?></p>
                            </td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="outlet" data-link="<?php echo base_url() . 'outlet/outlet-report/' . $row->status . '/' . $branchId; ?>" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } elseif($row->status == 'inactive') { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="outlet" data-link="<?php echo base_url() . 'outlet/outlet-report/' . $row->status . '/' . $branchId; ?>" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getoutletId" data-outletid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'outlet/outlet-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="outlet" data-link="<?php echo base_url(); ?>outlet/outlet-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="zone" class="text-capitalize text-black"></div>
                        <div id="branch" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Name & Location</label>
                        <div class="d-flex gap-2">
                            <div id="outletType" class="text-capitalize text-black"></div>
                            <div>-</div>
                            <div id="outletName" class="text-capitalize text-black"></div>
                        </div>
                        <div id="outletLocation" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Contact Name & Number</label>
                        <div id="contactName" class="text-capitalize text-black"></div>
                        <div id="contactNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Code</label>
                        <div id="outletSno" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 earthingChamber">
                        <label class="w-100 fw-bold text-black mb-1">Earthing Chamber Count</label>
                        <div id="earthingChamber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 checkingDate">
                        <label class="w-100 fw-bold text-black mb-1">Earth Checking Date</label>
                        <div id="checkingDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 renewalDate">
                        <label class="w-100 fw-bold text-black mb-1">Earth Renewal Date</label>
                        <div id="renewalDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 yardPole">
                        <label class="w-100 fw-bold text-black mb-1">Yard Pole Count</label>
                        <div id="yardPole" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 canopyLight">
                        <label class="w-100 fw-bold text-black mb-1">Canopy Light Count</label>
                        <div id="canopyLight" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 cvt">
                        <label class="w-100 fw-bold text-black mb-1">CVT Count</label>
                        <div id="cvt" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 stabilizer">
                        <label class="w-100 fw-bold text-black mb-1">Stabilizer Count</label>
                        <div id="stabilizer" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 pump">
                        <label class="w-100 fw-bold text-black mb-1">Pump Count</label>
                        <div id="pump" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 stp">
                        <label class="w-100 fw-bold text-black mb-1">STP Count</label>
                        <div id="stp" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Status</label>
                        <div id="status" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By & At</label>
                        <div id="createdBy" class="text-capitalize text-black"></div>
                        <div id="createdAt" class="text-capitalize text-black"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var branch = $('#branchSelect').val();

            if (branch !== '') {
                // Base URL
                var baseUrl = '<?php echo base_url(); ?>outlet/outlet-report/active';

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (branch) {
                    newUrl += '/' + encodeURIComponent(branch);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                alert('Please Select Search Field');
            }
        });
    });

    $(document).on("click", ".getoutletId", function(e){
        var outletId = $(this).data("outletid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>outlet/getOutletDetail',
            dataType: "json",
            data: {outletId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.outletName + ' - ' + data.branch + ' Details</h5>');
                $('#outletSno').html(data.outletSno);
                $('#zone').html(data.zone);
                $('#branch').html(data.branch);
                $('#outletType').html(data.outletType);
                $('#outletName').html(data.outletName);
                $('#outletLocation').html(data.outletLocation);
                $('#contactName').html(data.contactName);
                $('#contactNumber').html('<a href="tel:' + data.contactNumber + '" class="a-hover">' + data.contactNumber + '</a>');
                
                if (data.earthingChamber) {
                    $('#earthingChamber').html(data.earthingChamber);
                    $('.earthingChamber').removeClass('d-none');
                } else {
                    $('.earthingChamber').addClass('d-none');
                }
                
                if (data.renewalDate != '00 - 00 - 0000') {
                    $('#renewalDate').html(data.renewalDate);
                    $('.renewalDate').removeClass('d-none');
                } else {
                    $('.renewalDate').addClass('d-none');
                }
                if (data.checkingDate != '00 - 00 - 0000') {
                    $('#checkingDate').html(data.checkingDate);
                    $('.checkingDate').removeClass('d-none');
                } else {
                    $('.checkingDate').addClass('d-none');
                }
                
                if (data.yardPole) {
                    $('#yardPole').html(data.yardPole);
                    $('.yardPole').removeClass('d-none');
                } else {
                    $('.yardPole').addClass('d-none');
                }
                
                if (data.canopyLight) {
                    $('#canopyLight').html(data.canopyLight);
                    $('.canopyLight').removeClass('d-none');
                } else {
                    $('.canopyLight').addClass('d-none');
                }
                
                if (data.cvt) {
                    $('#cvt').html(data.cvt);
                    $('.cvt').removeClass('d-none');
                } else {
                    $('.cvt').addClass('d-none');
                }
                
                if (data.stabilizer) {
                    $('#stabilizer').html(data.stabilizer);
                    $('.stabilizer').removeClass('d-none');
                } else {
                    $('.stabilizer').addClass('d-none');
                }
                
                if (data.pump) {
                    $('#pump').html(data.pump);
                    $('.pump').removeClass('d-none');
                } else {
                    $('.pump').addClass('d-none');
                }
                
                if (data.stp) {
                    $('#stp').html(data.stp);
                    $('.stp').removeClass('d-none');
                } else {
                    $('.stp').addClass('d-none');
                }
                $('#status').html(data.status);
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);
            }
        });
        e.preventDefault();
        return false;
    });
</script>