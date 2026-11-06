<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="complaintForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="complaint_id" id="complaint_id" type="hidden" value="<?php echo $complaintId; ?>">
            <input name="outlet_id" id="outlet_id" type="hidden" value="<?php echo $outletId; ?>">
            <input name="token" id="token" type="hidden" value="<?php echo $outletToken; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $complaintDate; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Complaint Givener Name <span class="text-danger">*</span></label>
                    <input name="complainter_name" id="complainter_name" type="text" class="form-control" placeholder="Complaint Givener Name" value="<?php echo $complainterName; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Complaint Givener Mobile Number <span class="text-danger">*</span></label>
                    <input name="complainter_number" id="complainter_number" type="text" class="form-control number-only" placeholder="Complaint Givener Mobile Number" value="<?php echo $complainterNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Category <span class="text-danger">*</span></label>
                    <select name="work_type" id="work_type" class="form-select">
                        <option value="">Select Work Category</option>
                        <option value="maintenance" <?php if($workType == 'maintenance') { echo 'selected'; } ?>>Maintenance</option>
                        <option value="earth_renewal" <?php if($workType == 'earth_renewal') { echo 'selected'; } ?>>Earth Renewal</option>
                        <option value="project_work" <?php if($workType == 'project_work') { echo 'selected'; } ?>>Project Work</option>
                        <option value="private_work" <?php if($workType == 'private_work') { echo 'selected'; } ?>>Private Work</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Assign To <span class="text-danger">*</span></label>
                    <select name="assign_to" id="assign_to" class="form-select selectEmployeeName select2">
                        <option value="">Select Employee Name</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->employee_name; ?>" <?php if($assignTo == $row->employee_name) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if($outletName) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                        <input name="outlet_name" id="outlet_name" type="text" class="form-control generate_token" placeholder="Enter Outlet Name" value="<?php echo $outletName; ?>">
                    </div>
                <?php } ?>
                
                <?php if($outletLocation) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                        <input name="outlet_location" id="outlet_location" type="text" class="form-control" placeholder="Enter Outlet Location" value="<?php echo $outletLocation; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location URL</label>
                        <input name="location_url" id="location_url" type="text" class="form-control" placeholder="Enter Outlet Location URL" value="<?php echo isset($locationUrl) ? $locationUrl : ''; ?>">
                    </div>
                <?php } ?>
                
                <?php if($contactName) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name <span class="text-danger">*</span></label>
                        <input name="contact_name" id="contact_name" type="text" class="form-control" placeholder="Enter Outlet Contact Name" value="<?php echo $contactName; ?>">
                    </div>
                <?php } ?>
                
                <?php if($contactNumber) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number <span class="text-danger">*</span></label>
                        <input name="contact_number" id="contact_number" type="text" class="form-control number-only" placeholder="Enter Outlet Contact Number" value="<?php echo $contactNumber; ?>">
                    </div>
                <?php } ?>
                
                <?php if($oldOutletName) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                        <input name="old_outlet_name" id="outlet_name" type="text" class="form-control outletName generate_token" placeholder="Enter Outlet Name" value="<?php echo $oldOutletName; ?>">
                    </div>
                <?php } ?>
                
                <?php if($oldOutletLocation) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                        <input name="old_outlet_location" id="outlet_location" type="text" class="form-control outletLocation" placeholder="Enter Outlet Location" value="<?php echo $oldOutletLocation; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location URL</label>
                        <input name="old_location_url" id="old_location_url" type="text" class="form-control outletLocationUrl" placeholder="Enter Outlet Location URL" value="<?php echo isset($oldLocationUrl) ? $oldLocationUrl : ''; ?>">
                    </div>
                <?php } ?>
                
                <?php if($oldContactName) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name <span class="text-danger">*</span></label>
                        <input name="old_contact_name" id="contact_name" type="text" class="form-control contactName" placeholder="Enter Outlet Contact Name" value="<?php echo $oldContactName; ?>">
                    </div>
                <?php } ?>
                
                <?php if($oldContactNumber) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number <span class="text-danger">*</span></label>
                        <input name="old_contact_number" id="contact_number" type="text" class="form-control number-only contactNumber" placeholder="Enter Outlet Contact Number" value="<?php echo $oldContactNumber; ?>">
                    </div>
                <?php } ?>

                <div class="col-lg-8">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" type="text" class="form-control" style="min-height: 115px;" placeholder="Enter Description"><?php echo $description; ?></textarea>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-select">
                        <option value="not_started" <?php if($status == 'not_started') { echo 'selected'; } ?>>Not Started</option>
                        <option value="inprogress" <?php if($status == 'inprogress') { echo 'selected'; } ?>>Inprogress</option>
                        <?php if($status == 'completed') { ?>
                            <option value="completed" <?php if($status == 'completed') { echo 'selected'; } ?>>Completed</option>
                        <?php } ?>
                    </select>
                </div>
                
                <?php if($jobReport) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex justify-content-between">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Upload Job Completion Letter <span class="text-danger">*</span></label>
                            <?php if($jobReport) { ?>
                                <a href="<?php echo base_url() . $jobReport; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                            <?php } ?>
                            </div>
                            <input name="job_report" id="job_report" type="file" class="form-control">
                            <input type="hidden" value="<?php echo $jobReport; ?>" name="alter_job_report">
                        </div>
                <?php } ?>
                <?php if($jobRemarks) { ?>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks <span class="text-danger">*</span></label>
                        <input id="remarks" name="remarks" type="text" class="form-control" placeholder="Enter Remarks" value="<?php echo $jobRemarks; ?>"/>
                    </div>
                <?php } ?>
                <?php if($workType == 'earth_renewal') { ?>
                    <?php if($earthingReport) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="d-flex justify-content-between">
                                <label class="w-100 fw-bold text-black mb-2 fs-14px">Earthing Report</label>
                                <?php if($earthingReport) { ?>
                                    <a href="<?php echo base_url() . $earthingReport; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                                <?php } ?>
                            </div>
                            <input id="earthing_report" name="earthing_report" type="file" class="form-control"/>
                            <input type="hidden" value="<?php echo $earthingReport; ?>" name="alter_earthing_report">
                        </div>
                    <?php } ?>
                    <?php if($checkingDate) { ?>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Earth Checking Date</label>
                            <input id="checking_date" name="checking_date" type="date" class="form-control date-picker testingDate" placeholder="YYYY - MM - DD" value="<?php echo $checkingDate; ?>"/>
                        </div>
                    <?php } ?>
                    <?php if($renewalDate) { ?>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Earth Renewal Date</label>
                            <input id="renewal_date" name="renewal_date" type="date" class="form-control date-picker nextRenewalDate" placeholder="YYYY - MM - DD" value="<?php echo $renewalDate; ?>"/>
                        </div>
                    <?php } ?>
                <?php } ?>

                <div class="col-12 mt-4">
                    <hr class="my-1">
                </div>

                <!-- Before Images Section -->
                <div class="col-lg-6">
                    <div class="card p-3 h-100 border shadow-none bg-lighter">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="fw-bold text-black mb-0 fs-14px">
                                Before Images
                            </label>
                            <span class="badge bg-label-primary before-count"><?php echo !empty($beforeImages) ? count($beforeImages) : 0; ?></span>
                        </div>

                        <!-- Existing Before Images -->
                        <div class="existing-before-images row g-2 mb-3">
                            <?php if (!empty($beforeImages)) { ?>
                                <?php foreach ($beforeImages as $img) { ?>
                                    <div class="col-4 col-sm-3 image-card" id="image-item-<?php echo $img['id']; ?>">
                                        <div class="position-relative border rounded overflow-hidden bg-white shadow-sm" style="height: 105px;">
                                            <a href="<?php echo base_url() . $img['imagepath']; ?>" target="_blank" title="Click to view full image">
                                                <img src="<?php echo base_url() . $img['imagepath']; ?>" alt="Before Image" style="width: 100%; height: 105px; object-fit: cover; display: block;">
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle delete-complaint-img-btn" data-id="<?php echo $img['id']; ?>" data-type="before" title="Delete image" style="width: 24px; height: 24px; min-width: 24px; display: flex; align-items: center; justify-content: center; z-index: 2; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                                <i class="bx bx-trash" style="font-size: 13px;"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-12 no-before-msg text-muted small py-2">
                                    <i class="bx bx-info-circle me-1"></i> No before images uploaded.
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Upload New Before Images -->
                        <div>
                            <label class="w-100 fw-bold text-black mb-2 fs-13px">Upload New Before Images</label>
                            <div class="before-images"></div>
                        </div>
                    </div>
                </div>

                <!-- After Images Section -->
                <div class="col-lg-6">
                    <div class="card p-3 h-100 border shadow-none bg-lighter">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <label class="fw-bold text-black mb-0 fs-14px">
                                After Images
                            </label>
                            <span class="badge bg-label-success after-count"><?php echo !empty($afterImages) ? count($afterImages) : 0; ?></span>
                        </div>

                        <!-- Existing After Images -->
                        <div class="existing-after-images row g-2 mb-3">
                            <?php if (!empty($afterImages)) { ?>
                                <?php foreach ($afterImages as $img) { ?>
                                    <div class="col-4 col-sm-3 image-card" id="image-item-<?php echo $img['id']; ?>">
                                        <div class="position-relative border rounded overflow-hidden bg-white shadow-sm" style="height: 105px;">
                                            <a href="<?php echo base_url() . $img['imagepath']; ?>" target="_blank" title="Click to view full image">
                                                <img src="<?php echo base_url() . $img['imagepath']; ?>" alt="After Image" style="width: 100%; height: 105px; object-fit: cover; display: block;">
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm p-0 position-absolute top-0 end-0 m-1 rounded-circle delete-complaint-img-btn" data-id="<?php echo $img['id']; ?>" data-type="after" title="Delete image" style="width: 24px; height: 24px; min-width: 24px; display: flex; align-items: center; justify-content: center; z-index: 2; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                                <i class="bx bx-trash" style="font-size: 13px;"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-12 no-after-msg text-muted small py-2">
                                    <i class="bx bx-info-circle me-1"></i> No after images uploaded.
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Upload New After Images -->
                        <div>
                            <label class="w-100 fw-bold text-black mb-2 fs-13px">Upload New After Images</label>
                            <div class="after-images"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.zone').change(function () {
            var selectedOutletZone = $(this).val();
            if (selectedOutletZone !== '') {
                $.ajax({
                    url: "<?php echo base_url('master/selectBranchDropdown'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        zone: selectedOutletZone
                    },
                    success: function (data) {
                        var selectElement = document.querySelector('.branch');
                        selectElement.innerHTML = '<option value="">Select Branch</option>';
                        data.forEach(function (item) {
                            var option = document.createElement('option');
                            option.textContent = item.branch;
                            option.value = item.id;
                            selectElement.appendChild(option);
                        });
                    }
                });
            }
        });
            
        $('.branch').change(function () {
            var selectedBranch = $(this).val();
            var selectedOutletZone = $('.zone').val();
            
            if (selectedOutletZone !== '' && selectedBranch !== '') {
                $.ajax({
                    url: "<?php echo base_url('master/selectEmployeeInchargeDropdown'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        zone: selectedOutletZone,
                        branch: selectedBranch
                    },
                    success: function (data) {
                        var selectElement = document.querySelector('.selectEmployeeName');
                        selectElement.innerHTML = '<option value="">Select Employee Name</option>';
                        data.forEach(function (item) {
                            var option = document.createElement('option');
                            option.textContent = item.employee_name;
                            option.value = item.employee_name;
                            selectElement.appendChild(option);
                        });
                    }
                });
            }
        });
    });
    
    // Complaint Save Function
    $("#complaintForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch: {
                required: true
            },
            date: {
                required: true
            },
            complainter_name: {
                required: true
            },
            complainter_number: {
                required: true
            },
            outlet_name: {
                required: true
            },
            outlet_location: {
                required: true
            },
            work_type: {
                required: true
            },
            assign_to: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Branch Zone"
            },
            branch: {
                required: "Please Select Branch Name"
            },
            date: {
                required: "Please Selete Date"
            },
            complainter_name: {
                required: "Please Enter Complainer Givener Name"
            },
            complainter_number: {
                required: "Please Enter Complainer Givener Number"
            },
            outlet_name: {
                required: "Please Enter Outlet Name"
            },
            outlet_location: {
                required: "Please Enter Outlet Location"
            },
            work_type: {
                required: "Please Enter Work Type"
            },
            assign_to: {
                required: "Please Select Employee"
            },
            description: {
                required: "Please Enter Description"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#complaintForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>complaint/complaintEditFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (data) {
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
                    }
                    else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>complaint/complaint-list/" + ($('#status').val() || 'not_started');
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });

    // Initialize Image Uploaders
    $('.before-images').beforeImageUploader();
    $('.after-images').afterImageUploader();

    // Delete Before or After Image
    $(document).on('click', '.delete-complaint-img-btn', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var imgId = $(this).data('id');
        var imgType = $(this).data('type');
        var $card = $('#image-item-' + imgId);
        var $container = $card.closest('.existing-' + imgType + '-images');

        swal({
            title: "Are you sure?",
            text: "You want to delete this " + imgType + " image?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }, function () {
            $.ajax({
                url: '<?php echo base_url(); ?>complaint/deleteComplaintImage',
                type: 'POST',
                dataType: 'json',
                data: {
                    image_id: imgId
                },
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (res) {
                    $(".loader").hide();
                    toastr.options = {
                        'closeButton': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '3000'
                    };
                    if (!res.isError) {
                        toastr.success(res.message);
                        $card.fadeOut(300, function () {
                            $(this).remove();
                            // Update badge count
                            var $badge = $('.' + imgType + '-count');
                            var count = parseInt($badge.text()) || 0;
                            if (count > 0) {
                                $badge.text(count - 1);
                            }
                            if ($container.find('.image-card').length === 0) {
                                $container.html('<div class="col-12 no-' + imgType + '-msg text-muted small py-2"><i class="bx bx-info-circle me-1"></i> No ' + imgType + ' images uploaded.</div>');
                            }
                        });
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function () {
                    $(".loader").hide();
                    toastr.error('Error connecting to server.');
                }
            });
        });
    });
</script>