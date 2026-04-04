<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="branchProjectForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($branchId != '' && $projectCategory != '' && $projectTypeId != '') { ?>
                        <a href="<?php echo base_url() . 'outlet/branch-project-detail/' . $projectCategory . '/' . $branchId . '/' . $projectTypeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } elseif($branchId != '' && $projectCategory != '') { ?>
                        <a href="<?php echo base_url() . 'outlet/branch-project-view/' . $projectCategory . '/' . $branchId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url() . 'outlet/branch-project-list/'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($branchId != '' && $projectCategory != '' && $projectTypeId != '') { ?>
                        <a href="<?php echo base_url() . 'outlet/branch-project-detail/' . $projectCategory . '/' . $branchId . '/' . $projectTypeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } elseif($branchId != '' && $projectCategory != '') { ?>
                        <a href="<?php echo base_url() . 'outlet/branch-project-view/' . $projectCategory . '/' . $branchId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url() . 'outlet/branch-project-list/'; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="branch_project_id" id="branch_project_id" type="hidden" value="<?php echo $branchProjectId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $branchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Project Category <span class="text-danger">*</span></label>
                    <select name="project_category" id="project_category" class="form-select">
                        <option value="">Select Project Category</option>
                        <option value="hpcl" <?php if($projectCategory == 'hpcl') { echo 'selected'; } ?>>HPCL</option>
                        <option value="private" <?php if($projectCategory == 'private') { echo 'selected'; } ?>>Private Project</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Project Type <span class="text-danger">*</span></label>
                    <select name="project_type" id="project_type" class="form-select select2">
                        <option value="">Select Project Type</option>
                        <?php foreach ($projectTypeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $projectTypeId) { echo 'selected'; } ?>><?php echo $row->project_type; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Project Date <span class="text-danger">*</span></label>
                    <input name="project_date" id="project_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $projectDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                    <input name="outlet_name" id="outlet_name" type="text" class="form-control" placeholder="Enter Outlet Name" value="<?php echo $outletName; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                    <input name="outlet_location" id="outlet_location" type="text" class="form-control" placeholder="Enter Outlet Location" value="<?php echo $outletLocation; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Select Employee Name</label>
                    <select name="employee_name" id="employee_name" class="form-select select2">
                        <option value="">Select Employee Name</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $employeeId) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Completed Date <span class="text-danger">*</span></label>
                    <input name="completed_date" id="completed_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $completedDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Project Status <span class="text-danger">*</span></label>
                    <select name="project_status" id="project_status" class="form-select">
                        <option value="" <?php if($projectStatus == '') { echo 'selected'; } ?>>Select Project Status</option>
                        <option value="not_started" <?php if($projectStatus == 'not_started') { echo 'selected'; } ?>>Not Started</option>
                        <option value="ongoing" <?php if($projectStatus == 'ongoing') { echo 'selected'; } ?>>Ongoing</option>
                        <option value="completed" <?php if($projectStatus == 'completed') { echo 'selected'; } ?>>Completed</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function(){
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
    });

    // Branch Save Function
    $("#branchProjectForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch: {
                required: true
            },
            project_category: {
                required: true
            },
            project_type: {
                required: true
            },
            project_date: {
                required: true
            },
            outlet_name: {
                required: true
            },
            outlet_location: {
                required: true
            },
            project_status: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Zone",
            },
            branch: {
                required: "Please Select Branch",
            },
            project_category: {
                required: "Please Select Project Category",
            },
            project_type: {
                required: "Please Select Project Type",
            },
            project_date: {
                required: "Please Select Project Date",
            },
            outlet_name: {
                required: "Please Enter Outlet Name",
            },
            outlet_location: {
                required: "Please Enter Outlet Location",
            },
            project_status: {
                required: "Please Select Project Status",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#branchProjectForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>outlet/branchProjectFormSave',
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
                            <?php if($branchId != '' && $projectCategory != '' && $projectTypeId != '') { ?>
                                window.location.href = "<?php echo base_url() . 'outlet/branch-project-detail/' . $projectCategory . '/' . $branchId . '/' . $projectTypeId; ?>";
                            <?php } elseif($branchId != '' && $projectCategory != '') { ?>
                                window.location.href = "<?php echo base_url() . 'outlet/branch-project-view/' . $projectCategory . '/' . $branchId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url() . 'outlet/branch-project-list/'; ?>";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>