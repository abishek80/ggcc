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
                            window.location.href = "<?php echo base_url(); ?>complaint/complaint-list/not_started";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>