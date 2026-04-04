<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>outlet/outlet-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>outlet/outlet-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>outlet/outlet-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Outlet List</h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <div class="w-px-250"> 
                        <select id="branchSelect" class="w-100 form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branch) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button id="searchButton" class="btn btn-primary w-px-100px">Search</button>
                    <a href="<?php echo base_url(); ?>outlet/outlet-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Outlet</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="assurans_table table table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Zone & <br> Branch Name</th>
                            <th>Outlet <br> Customer Id</th>
                            <th>Outlet Name & <br> Location</th>
                            <th>Contact Name & <br> Number</th>
                            <th>Earth Check & <br> Renewal Date</th>
                            <th>Status</th>
                            <th class="w-min-50 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data loaded via Ajax -->
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
                        <label class="w-100 fw-bold text-black mb-1">Customer ID & Outlet Code</label>
                        <div id="customerId" class="text-capitalize text-black"></div>
                        <div id="outletSno" class="mt-1 text-capitalize text-black"></div>
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
        var base_url = '<?php echo base_url(); ?>';
        var pageStatus = '<?php echo $activeLink; ?>';

        function cleanVal(v) {
            if (v === null || v === undefined || v === 'null' || v === 'Null' || v === '00 - 00 - 0000' || v === '') {
                return '-';
            }
            return v;
        }

        if ($.fn.DataTable.isDataTable('.assurans_table')) {
            $('.assurans_table').DataTable().destroy();
        }
        
        var table = $('.assurans_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "ajax": {
                "url": base_url + "outlet/outlet_list_json/" + pageStatus,
                "type": "POST",
                "data": function(d) {
                    d.branchId = $('#branchSelect').val();
                }
            },
            "columns": [
                { 
                    "data": "id",
                    "render": function(data, type, row, meta) {
                        return '<span>' + (meta.row + meta.settings._iDisplayStart + 1) + '</span>';
                    }
                },
                { 
                    "data": "branch_name",
                    "render": function(data, type, row) {
                        var zone = cleanVal(row.zone);
                        var branch = cleanVal(data);
                        return '<div class="fw-semibold">' + zone + '</div>' +
                               '<div class="secondary-text">' + branch + '</div>';
                    }
                },
                { 
                    "data": "customer_id",
                    "render": function(data) { return cleanVal(data); }
                },
                { 
                    "data": "outlet_name",
                    "render": function(data, type, row) {
                        var name = cleanVal(data);
                        var location = cleanVal(row.outlet_location);
                        var typeLabel = (row.outlet_type && row.outlet_type !== 'null') ? row.outlet_type + ' - ' : '';
                        return '<div class="fw-semibold">' + typeLabel + name + '</div>' +
                               '<div class="secondary-text">' + location + '</div>';
                    }
                },
                { 
                    "data": "contact_name",
                    "render": function(data, type, row) {
                        var name = cleanVal(data);
                        var phone = cleanVal(row.contact_number);
                        var phoneHtml = (phone !== '-') ? '<a href="tel:' + phone + '" class="text-primary">' + phone + '</a>' : '-';
                        return '<div>' + name + '</div>' +
                               '<div class="secondary-text">' + phoneHtml + '</div>';
                    }
                },
                { 
                    "data": "checking_dateFormat",
                    "render": function(data, type, row) {
                        var checkDate = cleanVal(data);
                        var checkDateRaw = row.checking_date;
                        var renewalDateStr = cleanVal(row.renewal_dateFormat);
                        var renewalDateRaw = row.renewal_date;
                        
                        var checkingHtml = (checkDate !== '-') ? '<div class="date-check" data-date-check="' + checkDateRaw + '">' + checkDate + '</div>' : '-';
                        var renewalHtml = (renewalDateStr !== '-') ? '<div class="date-check" data-date-check="' + renewalDateRaw + '">' + renewalDateStr + '</div>' : '-';
                        
                        return '<div>' + checkingHtml + '</div>' + 
                               '<div>' + renewalHtml + '</div>';
                    }
                },
                { 
                    "data": "status",
                    "render": function(data, type, row) {
                        if(data == 'active') {
                            return '<a href="javascript:void(0);" data-value="inactive" data-rowid="' + row.id + '" data-tablename="outlet" data-link="' + base_url + 'outlet/outlet-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>';
                        } else {
                            return '<a href="javascript:void(0);" data-value="active" data-rowid="' + row.id + '" data-tablename="outlet" data-link="' + base_url + 'outlet/outlet-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>';
                        }
                    }
                },
                { 
                    "data": null,
                    "orderable": false,
                    "className": "text-center",
                    "render": function(data, type, row) {
                        var actions = '<div class="d-flex gap-1 justify-content-center">';
                        actions += '<a href="javascript:void(0);" class="box-hover getoutletId" data-outletid="' + row.id + '" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>';
                        actions += '<a href="' + base_url + 'outlet/outlet-edit/' + row.id + '" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>';
                        actions += '<a href="javascript:void(0);" data-rowid="' + row.id + '" data-tablename="outlet" data-link="' + base_url + 'outlet/outlet-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>';
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            "drawCallback": function(settings) {
                // Manually trigger the renewal date color update from footer.php
                if (typeof updateRenewalDateColors === 'function') {
                    updateRenewalDateColors();
                }
            },
            "responsive": true,
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "language": {
                "sLengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "paginate": {
                    "next": 'Next',
                    "previous": 'Previous'
                }
            }
        });

        $('#searchButton').on('click', function() {
            table.ajax.reload();
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
                $('#outletLocation').html(cleanModalVal(data.outletLocation));
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
                $('#status').html(cleanModalVal(data.status));
                $('#createdBy').html(cleanModalVal(data.createdBy));
                $('#createdAt').html(cleanModalVal(data.createdAt));
            }
        });
        e.preventDefault();
        return false;
    });
</script>