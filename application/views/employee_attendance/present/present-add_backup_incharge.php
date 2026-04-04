<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="attendanceForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>attendance/present-list/" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>attendance/present-list/" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="attendance_id" id="attendance_id" type="hidden" value="<?php echo $attendanceId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="present_date" id="present_date" type="date" class="form-control date-picker presentDate" placeholder="YYYY - MM - DD" value="<?php echo $presentDate ? $presentDate : date('Y-m-d'); ?>">
                </div>
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
                    <select name="branch_id" id="branch_id" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $branchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Place <span class="text-danger">*</span></label>
                    <textarea name="work_place" id="work_place" type="text" class="form-control" placeholder="Enter Work Place"></textarea>
                </div>
                <div class="col-12">
                    <div class="mt-2 table-responsive">
                        <table id="employeeAttendanceMainTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="employeeAttendanceTable">
                                <?php if ($employeeAttendanceId <= 0) { ?>
                                    <input type="hidden" value="1" id="employeeAttendanceHiddenId">
                                    <tr class="employeeAttendanceTableRow1">
                                        <td>1</td>
                                        <td>
                                            <input name="employee_id" id="employee_id1" type="hidden" class="employeeId">
                                            <input name="employee_name" id="employee_name1" type="text" class="form-control employeeName" placeholder="Enter Employee Name">
                                        </td>
                                        <td>
                                            <input name="employee_designation" id="employee_designation1" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation">
                                        </td>
                                        <td>
                                            <select name="attendance_type" id="attendance_type1" class="form-select attendanceType">
                                                <option value="present">Present</option>
                                                <option value="absent">Absent</option>
                                            </select>
                                        </td>
                                        <td class="px-2">
                                            <div class="d-flex gap-2">
                                                <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                                <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } else {
                                $i = 1;
                                foreach ($employeeDayPresentList as $row) {
                                ?>
                                    <tr class="employeeAttendanceTableRow<?php echo $i; ?>">
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <input name="employee_id" id="employee_id<?php echo $i; ?>" type="hidden" class="employeeId" value="<?php echo $row->employee_id; ?>">
                                            <input name="employee_name" id="employee_name<?php echo $i; ?>" type="text" class="form-control employeeName" placeholder="Enter Employee Name" value="<?php echo $row->employee_name; ?>">
                                        </td>
                                        <td>
                                            <input name="employee_designation" id="employee_designation<?php echo $i; ?>" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation" value="<?php echo $row->employee_designation; ?>">
                                        </td>
                                        <td>
                                            <select name="attendance_type" id="attendance_type<?php echo $i; ?>" class="form-select attendanceType">
                                                <option value="present" <?php if($attendanceType == 'present') { echo 'selected'; } ?>>Present</option>
                                                <option value="absent" <?php if($attendanceType == 'absent') { echo 'selected'; } ?>>Absent</option>
                                            </select>
                                        </td>
                                        <td class="px-2">
                                            <div class="d-flex gap-2">
                                                <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                                <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $i++;
                                    }
                                    echo '<input type="hidden" value="' . $i . '" id="employeeAttendanceHiddenId">';
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
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

    // Initial calculation when page loads
    $(document).ready(function() {
        employeeNameAutoComplete();
    });

    /* --------------------------- Employee Performance Increase FUNCTION STARTS --------------------------- */
    // Function to initialize autocomplete 
    function employeeNameAutoComplete() {
        $(".employeeName").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>employee/getEmployeeNameList',
                    type: 'post',
                    dataType: "json",
                    data: {
                        employee_name: request.term
                    },
                    success: function(data) {
                        if (data && data.length > 0) {
                            /*response(data);*/
                            // Limiting to the first 5 items
                            response(data.slice(0, 5));
                        } else {
                            // If no data is found, display a message
                            response([{ value: 'No data found' }]);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        // Handle AJAX errors here
                    }
                });
            },
            minLength: 0,
            select: function(event, ui) {
                if (ui.item.value === 'No data found') {
                    $(this).val(''); // Clear the input field if "No data found" is selected
                    $(this).closest('tr').find('.employeeId'+employeeAttendanceRowCount).val('');
                    $(this).closest('tr').find('.employeeName'+employeeAttendanceRowCount).val('');
                    $(this).closest('tr').find('.employeeDesignation'+employeeAttendanceRowCount).val('');
                }else{
                    $(this).closest('tr').find('.employeeId').val(ui.item.id);
                    $(this).closest('tr').find('.employeeName').val(ui.item.value);
                    $(this).closest('tr').find('.employeeDesignation').val(ui.item.designation);
                }
            }
        });
        
        $(document).on('focusout', '.employeeName', function() {
            var $currentRow = $(this).closest('tr'); // Get the closest parent row of the input field
            var $inputField = $(this); // Store $(this) in a variable

            var inputValue = $inputField.val();
            //console.log(inputValue);
            var matched = false;

            // Check if the field value is "No data found"
            if (inputValue === 'No data found') {
                $inputField.val(''); // Clear the input field
                $currentRow.find('.employeeId, .employeeName, .employeeDesignation, .attendanceType').val(''); // Clear the hidden inputs in the current row
                return; // Exit the function early
            }

            // Check if the input value matches any of the suggestions
            $(".employeeName").autocomplete("widget").children().each(function() {
                if ($(this).text() === inputValue) {
                    matched = true;
                    return false; // Exit the loop if a match is found
                }
            });

            // If no match found, clear the fields in the current row only
            // if (!matched) {
            //     $inputField.val(''); // Clear the input field
            //     $currentRow.find('.employeeId, .employeeName, .employeeDesignation, .attendanceType').val(''); // Clear the hidden inputs in the current row
            // }
        });
    }

    // Initialize autocomplete when the input field gains focus
    $(".employeeName").on("focus", function() {
        employeeNameAutoComplete();
        // Trigger autocomplete to show the initial suggestions
        $(this).autocomplete("search", "");
    });

    // Employee Performance Order Table Increment Function
    $(document).on('keydown', 'input[name="employee_name"]:last', e => { if (e.which === 9) incrementEmployeeAttendanceTableRow() });
    $(document).on('click', '.increaseTableRow', incrementEmployeeAttendanceTableRow);

    var employeeAttendanceRowCount = parseInt($("#employeeAttendanceHiddenId").val()) || 0;

    function incrementEmployeeAttendanceTableRow() {
        var html = 
        '<tr id="employeeAttendanceTableRow' + employeeAttendanceRowCount + '">' +
                '<td id="employeeAttendanceTableNo' + employeeAttendanceRowCount + '">' + employeeAttendanceRowCount + '</td>' +
                '<td>' +
                    '<input name="employee_id" id="employee_id' + employeeAttendanceRowCount + '" type="hidden" class="employeeId">' +
                    '<input name="employee_name" id="employee_name' + employeeAttendanceRowCount + '" type="text" class="form-control employeeName" placeholder="Enter Employee Name">' +
                '</td>' +
                '<td>' +
                    '<input name="employee_designation" id="employee_designation' + employeeAttendanceRowCount + '" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation">' +
                '</td>' +
                '<td>' +
                    '<select name="attendance_type" id="attendance_type1" class="form-select attendanceType">' +
                        '<option value="present">Present</option>' +
                        '<option value="absent">Absent</option>' +
                    '</select>' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#employeeAttendanceTable').append(html);
        updateEmployeeAttendanceId();
        employeeAttendanceRowCount++;
        $("#employeeAttendanceSerialNo").val(employeeAttendanceRowCount);

        // Initialize autocomplete when the input field gains focus
        $(".employeeName").on("focus", function() {
            employeeNameAutoComplete();
            // Trigger autocomplete to show the initial suggestions
            $(this).autocomplete("search", "");
        });
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#employeeAttendanceMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('employeeAttendanceTableRow', '');
            $(this).closest('tr').remove();
            var employeeAttendanceRowCount = $("#employeeAttendanceSerialNo").val();
            $("#employeeAttendanceSerialNo").val(employeeAttendanceRowCount - 1);
            updateEmployeeAttendanceId();
        }
    });

    function updateEmployeeAttendanceId() {
        $('#employeeAttendanceTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'employeeAttendanceTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'employeeAttendanceTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="employee_id"]').attr('id', 'employee_id' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_name"]').attr('id', 'employee_name' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_designation"]').attr('id', 'employee_designation' + (descriptionUpdateId + 1));
            $(this).find('select[name^="attendance_type"]').attr('id', 'attendance_type' + (descriptionUpdateId + 1));
            employeeNameAutoComplete();
        });
    }

    function getEmployeeAttendanceItemTableData() {
        employeeAttendanceData = [];
        $('#employeeAttendanceTable tr').each(function() {
            var employeeId = $(this).find('.employeeId').val();
            var attendanceType = $(this).find('.attendanceType').val();

            if (employeeId != '' || attendanceType != '') {
                var tableDataObj = {
                    employeeId : employeeId,
                    attendanceType : attendanceType
                }
                employeeAttendanceData.push(tableDataObj);
            }
        });
    }

    // Save EmployeeAttendance Order Form
    $("#attendanceForm").validate({
        rules: {
            present_date: {
                required: true
            },
            zone: {
                required: true
            },
            branch_id: {
                required: true
            },
            work_place: {
                required: true
            }
        },
        messages: {
            present_date: {
                required: "Please Select Date",
            },
            zone: {
                required: "Please Select Zone",
            },
            branch_id: {
                required: "Please Select Branch",
            },
            work_place: {
                required: "Please Enter Work Place",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#attendanceForm').get(0));

            getEmployeeAttendanceItemTableData();
            data.append('employeeAttendanceDataArray', JSON.stringify(employeeAttendanceData));

            $.ajax({
                url: '<?php echo base_url(); ?>attendance/employeeAttendanceSaveForm',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
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
                    }
                    else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>attendance/present-list/";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>