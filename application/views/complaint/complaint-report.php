<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Complaint List</h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <div class="w-px-250"> 
                        <select id="branchSelect" class="w-100 form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="w-px-250"> 
                        <select id="workTypeSelect" class="form-select">
                            <option value="">Select Work Category</option>
                            <option value="maintenance" <?php if($workType == 'maintenance') { echo 'selected'; } ?>>Maintenance</option>
                            <option value="earth_renewal" <?php if($workType == 'earth_renewal') { echo 'selected'; } ?>>Earth Renewal</option>
                            <option value="project_work" <?php if($workType == 'project_work') { echo 'selected'; } ?>>Project Work</option>
                            <option value="private_work" <?php if($workType == 'private_work') { echo 'selected'; } ?>>Private Work</option>
                        </select>
                    </div>
                    <button id="searchButton" class="btn btn-primary w-px-100px">Search</button>
                    <a href="<?php echo base_url(); ?>complaint/complaint-add" class="btn btn-primary w-px-100px px-4 py-2 rounded text-white">Add Complaint</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date & Work Type</th>
                            <th>Assign To & Branch</th>
                            <th>Outlet Name & Location</th>
                            <th>Description</th>
                            <th>Givener Name & Number</th>
                            <th>Job Report & Remarks</th>
                            <th>Status</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($complaintList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->complaint_date; ?></p>
                                <p class="mb-0"><?php echo $row->work_type; ?></p>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->assign_toName; ?></p>
                                <p class="mb-0"><?php echo $row->branch_name; ?></p>
                            </td>
                            <td>
                                <?php if(!empty($row->outlet_name)) { ?>
                                    <p class="mb-1"><?php echo $row->outlet_name; ?></p>
                                    <p class="mb-0"><?php echo $row->outlet_location; ?></p>
                                <?php } elseif (!empty($row->old_outlet_name)) { ?>
                                    <p class="mb-1"><?php echo $row->old_outlet_name; ?></p>
                                    <p class="mb-0"><?php echo $row->old_outlet_location; ?></p>
                                <?php } ?>
                            </td>
                            <td><?php echo $row->description; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->complainter_name; ?></p>
                                <p class="mb-0"><a href="tel:<?php echo $row->complainter_number; ?>" class="a-hover"><?php echo $row->complainter_number; ?></a></p>
                            </td>
                            <td>
                                <?php if($row->job_remarks) { ?>
                                    <p class="mb-1"><?php echo $row->job_remarks; ?></p>
                                <?php } else { ?>
                                    <p class="mb-1">-</p>
                                <?php } ?>
                                <?php if($row->job_report) { ?>
                                    <a href="<?php echo base_url() . $row->job_report; ?>" class="iframe-popup d-block mb-0 doc-hover">View Job Report</a>
                                <?php } else { ?>
                                    <p class="mb-0">-</p>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($row->status == 'not_started') { ?>
                                    <span class="text-danger">Not Started</span>
                                <?php } elseif ($row->status == 'inprogress') { ?>
                                    <span class="text-warning">Inprogress</span>
                                <?php } elseif ($row->status == 'completed') { ?>
                                    <span class="text-success">Completed</span>
                                <?php } ?>
                            </td>
                            <td class="px-2">
                                <?php if($row->status == 'not_started' || $row->status == 'completed') { ?>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="javascript:void(0);" class="box-hover getComplaintId" data-complaintid="<?php echo $row->id; ?>" data-zone="<?php echo $row->zone; ?>" data-branchid="<?php echo $row->branch; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                        <a href="<?php echo base_url() . 'complaint/complaint-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="complaint" data-link="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                    </div>
                                <?php } if($row->status == 'inprogress') { ?>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="javascript:void(0);" class="box-hover getComplaintId" data-complaintid="<?php echo $row->id; ?>" data-zone="<?php echo $row->zone; ?>" data-branchid="<?php echo $row->branch; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                        <a href="<?php echo base_url() . 'complaint/complaint-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="complaint" data-link="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                        <a href="<?php echo base_url() . 'complaint/job-report/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Submit Report"> <i class="bx bx-send"></i> </a>
                                    </div>
                                <?php } ?>
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
                        <div class="row g-3 employeeAssigned d-none align-items-end">
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
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var branch = $('#branchSelect').val();
            var workType = $('#workTypeSelect').val();

            if (branch !== '') {
                // Base URL
                var baseUrl = '<?php echo base_url(); ?>complaint/complaint-report';

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (branch) {
                    newUrl += '/' + encodeURIComponent(branch);
                }
                if (workType) {
                    newUrl += '/' + encodeURIComponent(workType);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                alert('Please Select Branch and Work Type');
            }
        });
    });

    $(document).on("click", ".getComplaintId", function(e){
        var complaintId = $(this).data("complaintid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
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