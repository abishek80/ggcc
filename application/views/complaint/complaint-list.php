<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
            <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
                <?php foreach ($fyYears as $fy) { 
                    $years = explode('-', $fy);
                    $displayYear = '20' . $years[0] . ' - 20' . $years[1];
                ?>
                <a href="<?php echo base_url(); ?>complaint/complaint-list/<?php echo $fy; ?>/<?php echo $activeLink; ?>" class="<?php echo ($activeYear == $fy) ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-lg-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0"><?php echo $displayYear; ?></a>
                <?php } ?>
            </div>
            <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
                <a href="<?php echo base_url(); ?>complaint/complaint-list<?php echo ($activeYear) ? '/'.$activeYear : ''; ?>" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-lg-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
                <a href="<?php echo base_url(); ?>complaint/complaint-list<?php echo ($activeYear) ? '/'.$activeYear : ''; ?>/not_started" class="<?php echo ($activeLink == 'not_started') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-lg-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Not Started</a>
                <a href="<?php echo base_url(); ?>complaint/complaint-list<?php echo ($activeYear) ? '/'.$activeYear : ''; ?>/inprogress" class="<?php echo ($activeLink == 'inprogress') ? 'bg-warning text-white' : 'bg-white text-warning'; ?>  px-4 py-2 px-lg-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-warning border border-3 border-end-0 border-start-0 border-top-0">Inprogress</a>
                <a href="<?php echo base_url(); ?>complaint/complaint-list<?php echo ($activeYear) ? '/'.$activeYear : ''; ?>/completed" class="<?php echo ($activeLink == 'completed') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-lg-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Completed</a>
            </div>
        <?php } ?>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Complaint List</h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
                        <div class="w-px-250"> 
                            <select id="branchSelect" class="w-100 form-select select2">
                                <option value="">Select Branch</option>
                                <?php foreach ($branchDropdown as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branch) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="w-px-250"> 
                            <select id="workTypeSelect" class="form-select">
                                <option value="">Select Work Category</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="earth_renewal">Earth Renewal</option>
                                <option value="project_work">Project Work</option>
                                <option value="private_work">Private Work</option>
                            </select>
                        </div>
                    <button id="searchButton" class="btn btn-primary w-px-100px">Search</button>
                    <?php } ?>
                    <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
                        <a href="<?php echo base_url(); ?>complaint/complaint-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Complaint</a>
                    <?php } ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="assurans_table table table-striped table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date & <br> Work Type</th>
                            <th>Assign To & <br> Branch</th>
                            <th>Outlet Name & <br> Location</th>
                            <th>Description</th>
                            <th>Givener Name & <br> Number</th>
                            <th>Job Report & <br> Remarks</th>
                            <th>Status</th>
                            <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
                            <th class="w-min-50 text-center">Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows rendered by DataTables Ajax -->
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
                    <div id="complaintCode"></div>
                </div>
                <div class="row g-3">
                  <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Complaint Date & Status</label>
                        <div id="complaintDate" class="text-capitalize text-black"></div>
                        <div id="status" class="mt-1 text-capitalize text-black"></div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="zone" class="text-capitalize text-black"></div>
                        <div id="branch" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 outletName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Name & Location</label>
                        <div id="outletName" class="text-capitalize text-black"></div>
                        <div id="outletLocation" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 contactName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Contact Name & Number</label>
                        <div id="contactName" class="text-capitalize text-black"></div>
                        <div id="contactNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 oldOutletName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Name & Location</label>
                        <div id="oldOutletName" class="text-capitalize text-black"></div>
                        <div id="oldOutletLocation" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 oldContactName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Contact Name & Number</label>
                        <div id="oldContactName" class="text-capitalize text-black"></div>
                        <div id="oldContactNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Givener Name & Number</label>
                        <div id="complainterName" class="text-capitalize text-black"></div>
                        <div id="complainterNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Description</label>
                        <div id="description" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By</label>
                      <div id="createdBy" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created At</label>
                      <div id="createdAt" class="text-capitalize text-black"></div>
                  </div>
                    <div class="col-12 border-top pt-3 border-2">
                        <div class="row g-3 employeeNotStarted align-items-end d-none">
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Work Category</label>
                                <div id="workType" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Assign To</label>
                                <div id="assignToName" class="text-capitalize text-black"></div>
                            </div>
                            <form id="workConfirmedForm" method="post" class="col-lg-4 col-md-6">
                                <div id="workConfirmed"></div>
                            </form>
                        </div>
                        <div class="row g-3 employeeStartWork d-none align-items-end">
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Work Category</label>
                                <div id="workType1" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Assign To</label>
                                <div id="assignToName1" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div id="jobReportAction"></div>
                            </div>
                        </div>
                        <div class="row g-3 employeeWorkCompleted d-none">
                            <div class="col-lg-3 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Work Category</label>
                                <div id="workType2" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Assign To</label>
                                <div id="assignToName2" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Job Report Letter</label>
                                <div id="jobReport" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Job Work Remarks</label>
                                <div id="jobRemarks" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6 checkingDate">
                                <label class="w-100 fw-bold text-black mb-1">Checking Date</label>
                                <div id="checkingDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6 renewalDate">
                                <label class="w-100 fw-bold text-black mb-1">Renewal Date</label>
                                <div id="renewalDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6 earthingReport">
                                <label class="w-100 fw-bold text-black mb-1">Earth Report</label>
                                <div id="earthingReport" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-12 jobReportLetters d-none">
                                <label class="w-100 fw-bold text-black mb-2">Job Report Letters</label>
                                <div id="jobReportLetters" class="row g-3"></div>
                            </div>
                            <div class="col-12 beforeImages d-none">
                                <label class="w-100 fw-bold text-black mb-2">Before Images</label>
                                <div id="beforeImages" class="row g-3"></div>
                            </div>
                            <div class="col-12 afterImages d-none">
                                <label class="w-100 fw-bold text-black mb-2">After Images</label>
                                <div id="afterImages" class="row g-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var base_url = '<?php echo base_url(); ?>';
        var userPermission = <?php echo json_encode($userPermission); ?>;
        var pageStatus = '<?php echo $activeLink; ?>';
        var activeYear = '<?php echo $activeYear; ?>';

        // Initialize DataTable with server-side processing
        if ($.fn.DataTable.isDataTable('.assurans_table')) {
            $('.assurans_table').DataTable().destroy();
        }
        
        var ajaxUrl = base_url + "complaint/complaint_list_json";
        if (activeYear) ajaxUrl += "/" + activeYear;
        if (pageStatus) ajaxUrl += "/" + pageStatus;

        $('.assurans_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "desc"]], // Default order by Date columns
            "ajax": {
                "url": ajaxUrl,
                "type": "POST",
                "data": function(d) {
                    d.branchId = $('#branchSelect').val();
                    d.workType = $('#workTypeSelect').val();
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
                    "data": "complaint_date",
                    "render": function(data, type, row) {
                        var workType = row.work_type.replace(/_/g, ' ');
                        return '<div class="fw-semibold">' + data + '</div>' +
                               '<div class="secondary-text">' + workType + '</div>';
                    }
                },
                { 
                    "data": "assign_toName",
                    "render": function(data, type, row) {
                        return '<div class="fw-semibold">' + data + '</div>' +
                               '<div class="secondary-text">' + row.branch_name + '</div>';
                    }
                },
                { 
                    "data": "outlet_name",
                    "render": function(data, type, row) {
                        var name = (data || row.old_outlet_name || '-');
                        var location = (row.outlet_location || row.old_outlet_location || '');
                        return '<div class="fw-semibold">' + name + '</div>' +
                               '<div class="secondary-text">' + location + '</div>';
                    }
                },
                { 
                    "data": "description",
                    "render": function(data) {
                        return '<div class="text-wrap" style="min-width: 150px; max-width: 250px; color:#555;">' + data + '</div>';
                    }
                },
                { 
                    "data": "complainter_name",
                    "render": function(data, type, row) {
                        return '<div>' + data + '</div>' +
                               '<div class="secondary-text"><a href="tel:' + row.complainter_number + '" class="text-primary">' + row.complainter_number + '</a></div>';
                    }
                },
                { 
                    "data": "job_remarks",
                    "render": function(data, type, row) {
                        if(row.status === 'completed') {
                            return '<div class="secondary-text">Job Completed</div>' +
                                   '<div><a href="' + base_url + row.job_report + '" target="_blank" class="text-primary small">View Job Report</a></div>';
                        }
                        return '<div class="text-muted">-</div>';
                    }
                },
                { 
                    "data": "status",
                    "render": function(data) {
                        var color = '#696cff';
                        var label = data;
                        if(data == 'not_started') { color = '#ff3e1d'; label = 'Not Started'; }
                        else if(data == 'inprogress') { color = '#ffab00'; label = 'Inprogress'; }
                        else if(data == 'completed') { color = '#71dd37'; label = 'Completed'; }
                        return '<span class="text-capitalize" style="color: ' + color + ';">' + label + '</span>';
                    }
                },
                { 
                    "data": null,
                    "visible": (userPermission.includes('admin') || userPermission.includes('complaint_management')),
                    "orderable": false,
                    "className": "text-center",
                    "render": function(data, type, row) {
                        var actions = '<div class="d-flex gap-1 justify-content-center">';
                        actions += '<a href="javascript:void(0);" class="box-hover getComplaintId action-icon" data-complaintid="' + row.id + '" data-zone="' + row.zone + '" data-branchid="' + row.branch + '" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>';
                        actions += '<a href="' + base_url + 'complaint/complaint-edit/' + row.id + '" class="box-hover action-icon" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>';
                        actions += '<a href="javascript:void(0);" data-rowid="' + row.id + '" data-tablename="complaint" data-link="' + base_url + 'complaint/complaint-list/' + (activeYear ? activeYear + '/' : '') + '" class="box-hover action-icon trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>';
                        if(row.status == 'inprogress') {
                            actions += '<a href="' + base_url + 'complaint/job-report/' + row.id + '" class="box-hover action-icon" data-toggle="tooltip" data-placement="top" title="Send Report"> <i class="bx bx-send"></i> </a>';
                        }
                        if(row.status == 'completed' && row.has_files > 0) {
                            actions += '<a href="' + base_url + 'complaint/download_complaint_zip/' + row.id + '" class="box-hover action-icon" data-toggle="tooltip" data-placement="top" title="Download All Files (ZIP)" target="blank"> <i class="bx bx-download"></i> </a>';
                        }
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            "responsive": true,
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "dom": '<"row mx-1 mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"row mx-2 mt-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "language": {
                "sLengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "paginate": {
                    "next": 'Next &raquo;',
                    "previous": '&laquo; Previous'
                }
            }
        });
        
        $('.dataTables_filter input').addClass('form-control form-control-sm');
        $('.dataTables_length select').addClass('form-select form-select-sm');

        $('#searchButton').on('click', function() {
            $('.assurans_table').DataTable().ajax.reload();
        });
    });

    $(document).on("click", ".getComplaintId", function(e){
        var complaintId = $(this).data("complaintid");
        $.ajax({
            type: "POST",
            headers: { "X-CSRFToken": (typeof csrftoken !== 'undefined' ? csrftoken : '') },
            url: '<?php echo base_url(); ?>complaint/getComplaintDetail',
            dataType: "json",
            data: {complaintId},
            success: function (data) {
                $('#complaintId').html('<input type="hidden" id="complaint_id" name="complaint_id" value="' + data.complaintId + '">');
                $('#workConfirmed').html('<div class="d-flex flex-wrap gap-3 justify-content-end h-100 align-items-end"> <div><a href="javascript:void(0);" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white" data-bs-dismiss="modal">Cancel</a></div> <div><a href="javascript:void(0);" class="workConfirmedPopup btn btn-success px-4 py-2 rounded border-0 fw-bold text-white" data-complaint_id="' + data.complaintId + '">Start Work</a></div> </div>');
                $('#jobReportAction').html('<div class="d-flex flex-wrap gap-3 justify-content-end h-100 align-items-end"> <div><a href="javascript:void(0);" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white" data-bs-dismiss="modal">Cancel</a></div> <div><a href="<?php echo base_url() . 'complaint/job-report/'; ?>' + data.complaintId + '" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Submit Job Report</a></div> </div>');
                $('#complaintCode').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">View Complaint - ' + data.complaintCode + '</h5>');
                $('#complaintDate').html(data.complaintDate);
                $('#zone').html(data.zone);
                $('#branch').html(data.branchName);
                $('#complainterName').html(data.complainterName);
                $('#complainterNumber').html('<a href="tel:' + data.complainterNumber + '" class="a-hover">' + data.complainterNumber + '</a>');

                if (data.outletName) {
                    $('#outletName').html(data.outletName);
                    $('.outletName').removeClass('d-none');
                } else {
                    $('.outletName').addClass('d-none');
                }
                if (data.outletLocation) {
                    $('#outletLocation').html(data.outletLocation);
                    $('.outletLocation').removeClass('d-none');
                } else {
                    $('.outletLocation').addClass('d-none');
                }
                if (data.contactName) {
                    $('#contactName').html(data.contactName);
                    $('.contactName').removeClass('d-none');
                } else {
                    $('.contactName').addClass('d-none');
                }
                if (data.contactNumber) {
                    $('#contactNumber').html('<a href="tel:' + data.contactNumber + '" class="a-hover">' + data.contactNumber + '</a>');
                    $('.contactNumber').removeClass('d-none');
                } else {
                    $('.contactNumber').addClass('d-none');
                }
                if (data.oldOutletName) {
                    $('#oldOutletName').html(data.oldOutletName);
                    $('.oldOutletName').removeClass('d-none');
                } else {
                    $('.oldOutletName').addClass('d-none');
                }
                if (data.oldOutletLocation) {
                    $('#oldOutletLocation').html(data.oldOutletLocation);
                    $('.oldOutletLocation').removeClass('d-none');
                } else {
                    $('.oldOutletLocation').addClass('d-none');
                }
                if (data.oldContactName) {
                    $('#oldContactName').html(data.oldContactName);
                    $('.oldContactName').removeClass('d-none');
                } else {
                    $('.oldContactName').addClass('d-none');
                }
                if (data.oldContactNumber) {
                    $('#oldContactNumber').html('<a href="tel:' + data.oldContactNumber + '" class="a-hover">' + data.oldContactNumber + '</a>');
                    $('.oldContactNumber').removeClass('d-none');
                } else {
                    $('.oldContactNumber').addClass('d-none');
                }
                if (data.status == 'not_started') {
                    $('.employeeNotStarted').removeClass('d-none');
                } else {
                    $('.employeeNotStarted').addClass('d-none');
                }
                if (data.status == 'inprogress') {
                    $('.employeeStartWork').removeClass('d-none');
                } else {
                    $('.employeeStartWork').addClass('d-none');
                }
                if (data.status == 'completed') {
                    $('.employeeWorkCompleted').removeClass('d-none');
                } else {
                    $('.employeeWorkCompleted').addClass('d-none');
                }
                if (data.workType == 'earth_renewal') {
                    $('.earthRenewalReport').removeClass('d-none');
                } else {
                    $('.earthRenewalReport').addClass('d-none');
                }
                if (data.earthingReport) {
                    $('#earthingReport').html('<a href="' + '<?php echo base_url(); ?>' + data.earthingReport + '" target="_blank" class="doc-hover">View Earthing Report</a>');
                    $('.earthingReport').removeClass('d-none');
                } else {
                    $('.earthingReport').addClass('d-none');
                }
                if (data.checkingDate != '00 - 00 - 0000') {
                    $('#checkingDate').html(data.checkingDate);
                    $('.checkingDate').removeClass('d-none');
                } else {
                    $('.checkingDate').addClass('d-none');
                }
                if (data.renewalDate != '00 - 00 - 0000') {
                    $('#renewalDate').html(data.renewalDate);
                    $('.renewalDate').removeClass('d-none');
                } else {
                    $('.renewalDate').addClass('d-none');
                }
                
                if (data.status == 'not_started') {
                    $('#status').html('<span class="text-danger">Not Started</span>');
                } else if (data.status == 'inprogress') {
                    $('#status').html('<span class="text-warning">Inprogress</span>');
                } else if (data.status == 'completed') {
                    $('#status').html('<span class="text-success">Completed</span>');
                }

                updateJobReportLetters(data.jobReportLetters);
                updateBeforeImages(data.beforeImages);
                updateAfterImages(data.afterImages);

                $('#description').html(data.description);
                $('#workType').html(data.workType);
                $('#assignToName').html(data.assignToName);
                $('#workType1').html(data.workType);
                $('#assignToName1').html(data.assignToName);
                $('#workType2').html(data.workType);
                $('#assignToName2').html(data.assignToName);
                $('#jobReport').html('<a href="' + '<?php echo base_url(); ?>' + data.jobReport + '" target="_blank" class="doc-hover">View Job Report</a>');
                $('#jobRemarks').html(data.jobRemarks);
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);
            }
        });
        e.preventDefault();
        return false;
    });

    // Utility Function to update Job Report Letters
    function updateJobReportLetters(images) {
        if (Array.isArray(images) && images.length > 0) {
            const htmlContent = images.map(image => {
                const imagePath = '<?php echo base_url(); ?>' + image.imagepath;
                return `
                    <div class="col-xl-1 col-lg-2 col-md-3 col-4">
                        <a href="${imagePath}" target="_blank">
                            <img src="${imagePath}" alt="before image" style="width: 100%; height: 100px; object-fit: cover; border-radius: 7px;">
                        </a>
                    </div>
                `;
            }).join('');

            $('#jobReportLetters').html(htmlContent);
            $('.jobReportLetters').removeClass('d-none');
        } else {
            $('.jobReportLetters').addClass('d-none');
        }
    }

    // Utility Function to Update Before Images
    function updateBeforeImages(images) {
        if (Array.isArray(images) && images.length > 0) {
            const htmlContent = images.map(image => {
                const imagePath = '<?php echo base_url(); ?>' + image.imagepath;
                return `
                    <div class="col-xl-1 col-lg-2 col-md-3 col-4">
                        <a href="${imagePath}" target="_blank">
                            <img src="${imagePath}" alt="before image" style="width: 100%; height: 100px; object-fit: cover; border-radius: 7px;">
                        </a>
                    </div>
                `;
            }).join('');

            $('#beforeImages').html(htmlContent);
            $('.beforeImages').removeClass('d-none');
        } else {
            $('.beforeImages').addClass('d-none');
        }
    }

    // Utility Function to Update After Images
    function updateAfterImages(images) {
        if (Array.isArray(images) && images.length > 0) {
            const htmlContent = images.map(image => {
                const imagePath = '<?php echo base_url(); ?>' + image.imagepath;
                return `
                    <div class="col-xl-1 col-lg-2 col-md-3 col-4">
                        <a href="${imagePath}" target="_blank">
                            <img src="${imagePath}" alt="after image" style="width: 100%; height: 100px; object-fit: cover; border-radius: 7px;">
                        </a>
                    </div>
                `;
            }).join('');

            $('#afterImages').html(htmlContent);
            $('.afterImages').removeClass('d-none');
        } else {
            $('.afterImages').addClass('d-none');
        }
    }

    $(document).on('click', '.workConfirmedPopup', function(e) {
        var complaintId = $(this).data("complaint_id");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>complaint/workConfirmedFormSave',
            dataType: "json",
            data: {
                complaintId
            },
            beforeSend: function () {
                $(".loader").show();
            },
            success: function(data) {
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
                } else {
                    oneClickSubmitBtn();
                    toastr.success(data['message']);
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url(); ?>complaint/complaint-list/inprogress";
                    }, 1500);
                }
            }
        });
    });
</script>