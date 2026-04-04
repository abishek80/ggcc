<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'outlet/branch-project-view/' . $projectCategory . '/' . $branchId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $branchName . ' - ' . $projectType; ?> Work List</h4>
                </div>
                <a href="<?php echo base_url() . 'outlet/branch-project-add/' . $projectCategory . '/' . $branchId . '/' . $projectTypeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Branch Project</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date</th>
                            <th>Outlet Details</th>
                            <th>Employee Name</th>
                            <th>Project Status</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($branchProjectList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->projectDateFormat; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->outlet_name; ?></p>
                                <p class="mb-0"><?php echo $row->outlet_location; ?></p>
                            </td>
                            <td>
                                <?php if($row->employee_name) { ?>
                                    <p class="mb-0">
                                        <?php echo $row->employee_name; ?>
                                    </p>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                                <?php if($row->employee_designation) { ?>
                                    <p class="mb-0">
                                        <?php echo $row->employee_designation; ?>
                                    </p>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($row->projectCompletedDateFormat != '00-00-0000') { ?>
                                    <p class="mb-1"><?php echo $row->projectCompletedDateFormat; ?></p>
                                <?php } ?>
                                <?php if($row->project_status == 'ongoing') { ?>
                                    <p class="mb-0 text-warning"> Ongoing </p>
                                <?php } elseif($row->project_status == 'completed') { ?>
                                    <p class="mb-0 text-success"> Completed </p>
                                <?php } elseif($row->project_status == 'not_started') { ?>
                                    <p class="mb-0 text-danger"> Not Started </p>
                                <?php } ?>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getBranchProjectId" data-branchprojectid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'outlet/branch-project-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="branch_project" data-link="<?php echo base_url() . 'outlet/branch-project-view/' . $projectCategory . '/' . $branchId; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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
                        <label class="w-100 fw-bold text-black mb-1">Branch & Zone</label>
                        <div id="zone" class="text-capitalize text-black"></div>
                        <div id="branch" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Project Detail</label>
                        <div id="projectCategory" class="text-capitalize text-black"></div>
                        <div id="projectType" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 outletName d-none">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Detail</label>
                        <div id="outletName" class="text-capitalize text-black mb-1"></div>
                        <div id="outletLocation" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeName d-none">
                        <label class="w-100 fw-bold text-black mb-1">Employee Detail</label>
                        <div id="employeeName" class="text-capitalize text-black mb-1"></div>
                        <div id="employeeDesignation" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 projectDate d-none">
                        <label class="w-100 fw-bold text-black mb-1">Project Date</label>
                        <div id="projectDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 projectStatus d-none">
                        <label class="w-100 fw-bold text-black mb-1">Project Status</label>
                        <div id="projectStatus" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 completedDate d-none">
                        <label class="w-100 fw-bold text-black mb-1">Completed Date</label>
                        <div id="completedDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12">
                        <div id="projectCompletedDate" class="d-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getBranchProjectId", function(e){
        var branchProjectId = $(this).data("branchprojectid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>outlet/getBranchProjectDetail',
            dataType: "json",
            data: {branchProjectId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.branch + ' / ' + data.projectType + ' - Project Details</h5>');
                $('#zone').html(data.zone);
                $('#branch').html(data.branch);
                $('#projectCategory').html(data.projectCategory);
                $('#projectType').html(data.projectType);
                
                if (data.projectDate) {
                    $('#projectDate').html(data.projectDate);
                    $('.projectDate').removeClass('d-none');
                } else {
                    $('.projectDate').addClass('d-none');
                }
                if (data.outletName) {
                    $('#outletName').html(data.outletName);
                    $('#outletLocation').html(data.outletLocation);
                    $('.outletName').removeClass('d-none');
                } else {
                    $('.outletName').addClass('d-none');
                }
                if (data.employeeName) {
                    $('#employeeName').html(data.employeeName);
                    $('#employeeDesignation').html(data.employeeDesignation);
                    $('.employeeName').removeClass('d-none');
                } else {
                    $('.employeeName').addClass('d-none');
                }
                if (data.projectStatus) {
                    $('#projectStatus').html(data.projectStatus == 'not_started' ? 'Not Started' : (data.projectStatus == 'ongoing' ? 'Ongoing' : 'Completed'));

                    $('.projectStatus').removeClass('d-none');
                } else {
                    $('.projectStatus').addClass('d-none');
                }
                if (data.completedDate != '00 - 00 - 0000') {
                    $('#completedDate').html(data.completedDate);
                    $('.completedDate').removeClass('d-none');
                } else {
                    $('.completedDate').addClass('d-none');
                }
                if (data.projectStatus == 'not_started' || data.projectStatus == 'ongoing') {
                    $('#projectCompletedDate').html(`
                        <div class="d-flex gap-3 justify-content-between h-100 align-items-center border-top pt-3 mt-1">
                            <input id="completed_date" name="completed_date" type="date" placeholder="YYYY - MM - DD" class="form-control date-picker w-min-300">
                            <div class="d-flex gap-3 justify-content-between h-100 align-items-center">
                                <a href="<?php echo base_url() . 'outlet/branch-project-detail/' . $projectCategory . '/' . $branchId . '/' . $projectTypeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                <button type="submit" data-branchprojectid="` + data.branchProjectId + `" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white branchProjectCompleted">Project Completed</button>
                            </div>
                        </div>
                    `);
                    $('#projectCompletedDate').removeClass('d-none');
                } else {
                    $('#projectCompletedDate').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });

    $(document).on('click', '.branchProjectCompleted', function(e) {
        if($('#completed_date').val() == '') {
            alert('Select Received Date');
        } else {
            var branchProjectId = $(this).data("branchprojectid");
            var completedDate = $('#completed_date').val();
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRFToken": csrftoken
                },
                url: '<?php echo base_url(); ?>outlet/branchProjectCompletedFormSave',
                dataType: "json",
                data: {
                    branchProjectId,
                    completedDate
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
                            window.location.href = "<?php echo base_url() . 'outlet/branch-project-detail/' . $projectCategory . '/' . $branchId . '/' . $projectTypeId; ?>";
                        }, 1500);
                    }
                }
            });
        }
    });
</script>