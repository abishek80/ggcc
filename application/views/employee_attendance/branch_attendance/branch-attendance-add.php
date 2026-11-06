<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="branchAttendanceForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'attendance/branch-attendance-list/' . $branchInchargeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Add Branch Attendance</h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url() . 'attendance/branch-attendance-list/' . $branchInchargeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="branch_incharge_id" id="branch_incharge_id" type="hidden" value="<?php echo $branchInchargeId; ?>">
            <div class="row g-3 mb-2">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input id="present_date_picker" type="date" class="form-control date-picker" value="<?php echo $presentDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone</label>
                    <input type="text" class="form-control" value="<?php echo ucfirst($zoneName); ?>" readonly>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch</label>
                    <input type="text" class="form-control" value="<?php echo $branchName; ?>" readonly>
                </div>
            </div>
            <input name="present_date" id="present_date" type="hidden" value="<?php echo $presentDate; ?>">
            <div class="mt-2 table-responsive">
                <table id="branchAttendanceMainTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Attendance</th>
                            <th class="w-min-75">Action</th>
                        </tr>
                    </thead>
                    <tbody id="branchAttendanceTableBody">
                        <?php
                        $i = 1;
                        if (empty($employeeList)) {
                        ?>
                        <tr class="branchAttendanceRow1">
                            <td>1</td>
                            <td>
                                <input name="employee_id[]" type="hidden" class="employeeId">
                                <input type="text" class="form-control employeeName" placeholder="Search Employee Name">
                            </td>
                            <td><input type="text" readonly class="form-control employeeDesignation"></td>
                            <td>
                                <select name="attendance_value[]" class="form-select attendanceValue">
                                    <option value="" selected>Select</option>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                    <option value="half_day_ot">Half Day OT</option>
                                    <option value="full_day_ot">Full Day OT</option>
                                </select>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-2">
                                    <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                </div>
                            </td>
                        </tr>
                        <?php
                        } else {
                            foreach ($employeeList as $row) {
                                $currentValue = isset($statusByEmployee[$row->id]) ? $statusByEmployee[$row->id] : '';
                        ?>
                        <tr class="branchAttendanceRow<?php echo $i; ?>">
                            <td><?php echo $i; ?></td>
                            <td>
                                <input name="employee_id[]" type="hidden" class="employeeId" value="<?php echo $row->id; ?>">
                                <input type="text" class="form-control employeeName" value="<?php echo $row->employee_name; ?>" readonly>
                            </td>
                            <td><input type="text" readonly class="form-control employeeDesignation" value="<?php echo $row->designation; ?>"></td>
                            <td>
                                <select name="attendance_value[]" class="form-select attendanceValue">
                                    <option value="" <?php if ($currentValue == '') { echo 'selected'; } ?>>Select</option>
                                    <option value="present" <?php if ($currentValue == 'present') { echo 'selected'; } ?>>Present</option>
                                    <option value="absent" <?php if ($currentValue == 'absent') { echo 'selected'; } ?>>Absent</option>
                                    <option value="half_day_ot" <?php if ($currentValue == 'half_day_ot') { echo 'selected'; } ?>>Half Day OT</option>
                                    <option value="full_day_ot" <?php if ($currentValue == 'full_day_ot') { echo 'selected'; } ?>>Full Day OT</option>
                                </select>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-2">
                                    <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                </div>
                            </td>
                        </tr>
                        <?php
                                $i++;
                            }
                        }
                        ?>
                        <input type="hidden" value="<?php echo $i; ?>" id="branchAttendanceHiddenId">
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</section>

<script>
    $('#present_date_picker').change(function () {
        var selectedDate = $(this).val();
        if (selectedDate) {
            window.location.href = "<?php echo base_url() . 'attendance/branch-attendance-add/' . $branchInchargeId; ?>/" + selectedDate;
        }
    });

    function employeeNameAutoComplete() {
        $(".employeeName:not([readonly])").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>employee/getActiveEmployeeNameList',
                    type: 'post',
                    dataType: 'json',
                    data: { employee_name: request.term },
                    success: function (data) {
                        // Don't suggest employees already present as a row in this table
                        var alreadyListedIds = $('.employeeId').map(function () { return String($(this).val()); }).get();
                        var filtered = (data || []).filter(function (item) {
                            return alreadyListedIds.indexOf(String(item.id)) === -1;
                        });
                        response(filtered.length > 0 ? filtered.slice(0, 8) : [{ value: 'No data found' }]);
                    }
                });
            },
            minLength: 0,
            select: function (event, ui) {
                var $row = $(this).closest('tr');
                if (ui.item.value === 'No data found') {
                    $(this).val('');
                    $row.find('.employeeId').val('');
                    $row.find('.employeeDesignation').val('');
                } else {
                    $row.find('.employeeId').val(ui.item.id);
                    $row.find('.employeeName').val(ui.item.value);
                    $row.find('.employeeDesignation').val(ui.item.designation);
                }
            }
        });
    }

    $(document).ready(function () {
        employeeNameAutoComplete();
    });

    $(document).on('focus', '.employeeName:not([readonly])', function () {
        employeeNameAutoComplete();
        $(this).autocomplete("search", "");
    });

    var branchAttendanceRowCount = parseInt($("#branchAttendanceHiddenId").val()) || 1;

    $(document).on('click', '.increaseTableRow', function () {
        var html =
            '<tr id="branchAttendanceRow' + branchAttendanceRowCount + '">' +
                '<td id="branchAttendanceNo' + branchAttendanceRowCount + '">' + branchAttendanceRowCount + '</td>' +
                '<td>' +
                    '<input name="employee_id[]" type="hidden" class="employeeId">' +
                    '<input type="text" class="form-control employeeName" placeholder="Search Employee Name">' +
                '</td>' +
                '<td><input type="text" readonly class="form-control employeeDesignation"></td>' +
                '<td>' +
                    '<select name="attendance_value[]" class="form-select attendanceValue">' +
                        '<option value="" selected>Select</option>' +
                        '<option value="present">Present</option>' +
                        '<option value="absent">Absent</option>' +
                        '<option value="half_day_ot">Half Day OT</option>' +
                        '<option value="full_day_ot">Full Day OT</option>' +
                    '</select>' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#branchAttendanceTableBody').append(html);
        branchAttendanceRowCount++;
        employeeNameAutoComplete();
    });

    $(document).on('click', '.deleteTableRow', function () {
        var rowCount = $('#branchAttendanceTableBody tr').length;
        if (rowCount > 1) {
            $(this).closest('tr').remove();
            renumberBranchAttendanceRows();
        }
    });

    function renumberBranchAttendanceRows() {
        $('#branchAttendanceTableBody tr').each(function (index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $("#branchAttendanceForm").validate({
        submitHandler: function (form) {
            // Drop any row where no valid employee was actually picked from the autocomplete
            $('.employeeId').each(function () {
                if (!$(this).val()) {
                    $(this).closest('tr').remove();
                }
            });

            var data = new FormData($('#branchAttendanceForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>attendance/branchAttendanceFormSave',
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
                    $(".loader").hide();
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
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url() . 'attendance/branch-attendance-list/' . $branchInchargeId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>
