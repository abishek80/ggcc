<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="taskForm" method="post">
            <div class="card px-3 pb-3">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
                            <?php if($dailyTaskId) { ?>
                                <a href="<?php echo base_url() . 'employee/task-list/' . $dailyTaskId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url() . 'employee/daily-task'; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                            <?php } ?>
                            <?php } else { ?>
                                <?php if($dailyTaskId) { ?>
                                    <a href="<?php echo base_url() . 'employee/task-list/' . $dailyTaskId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url(); ?>admin" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                                <?php } ?>
                        <?php } ?>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <?php if($dailyTaskId) { ?>
                            <a href="<?php echo base_url() . 'employee/task-list/' . $dailyTaskId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url() . 'employee/daily-task'; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <?php } ?>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="task_id" id="task_id" type="hidden" value="<?php echo $taskId; ?>">
                <div class="row g-3">
                    <div class="col-lg-6 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Task Type <span class="text-danger">*</span></label>
                        <select name="daily_task_type" id="daily_task_type" class="form-select select2">
                            <option value="">Select Task Type</option>
                            <?php foreach ($dailyTaskDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $dailyTaskId) { echo 'selected'; } ?>><?php echo $row->employee_name . ' - ' . $row->task_type; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Task Date <span class="text-danger">*</span></label>
                        <input name="task_date" id="task_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $taskDate; ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" type="text" class="form-control" rows="4" placeholder="Enter Task Description"><?php echo $description; ?></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    // Branch Visit Save Function
    $("#taskForm").validate({
        rules: {
            daily_task_type: {
                required: true
            },
            task_date: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            daily_task_type: {
                required: "Please Select Task Type",
            },
            task_date: {
                required: "Please Select Task Date",
            },
            description: {
                required: "Please Enter Task Desciption",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#taskForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>employee/addTaskFormSave',
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
                            <?php if($dailyTaskId) { ?>
                                window.location.href = "<?php echo base_url() . 'employee/task-list/' . $dailyTaskId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url() . 'employee/daily-task/'; ?>";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>