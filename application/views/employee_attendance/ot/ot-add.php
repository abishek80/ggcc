<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="employeeOTForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($employeeId) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>attendance/ot-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($employeeId) { ?>
                        <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>attendance/ot-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="ot_id" id="ot_id" type="hidden" value="<?php echo $otId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <select name="branch_id" id="branch_id" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($row->id == $branchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="ot_date" id="ot_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $otDate ? $otDate : date('Y-m-d'); ?>">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Place <span class="text-danger">*</span></label>
                    <input name="work_place" id="work_place" type="text" class="form-control" placeholder="Enter Work Place" value="<?php echo $workPlace; ?>">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Time Zone</label>
                    <select name="time_zone" id="time_zone" class="form-select">
                        <option value="">Select Time Zone</option>
                        <option value="night" <?php if($timeZone == 'night') { echo 'selected'; } ?>>Night</option>
                        <option value="sunday" <?php if($timeZone == 'sunday') { echo 'selected'; } ?>>Sunday</option>
                        <option value="monday" <?php if($timeZone == 'monday') { echo 'selected'; } ?>>Monday</option>
                        <option value="tuesday" <?php if($timeZone == 'tuesday') { echo 'selected'; } ?>>Tuesday</option>
                        <option value="wednesday" <?php if($timeZone == 'wednesday') { echo 'selected'; } ?>>Wednesday</option>
                        <option value="thursday" <?php if($timeZone == 'thursday') { echo 'selected'; } ?>>Thursday</option>
                        <option value="friday" <?php if($timeZone == 'friday') { echo 'selected'; } ?>>Friday</option>
                        <option value="saturday" <?php if($timeZone == 'saturday') { echo 'selected'; } ?>>Saturday</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">OT Type <span class="text-danger">*</span></label>
                    <select name="ot_type" id="ot_type" class="form-select">
                        <option value="">Select OT Type</option>
                        <option value="Half Day" <?php if($otType == 'Half Day') { echo 'selected'; } ?>>Half Day</option>
                        <option value="Full Day" <?php if($otType == 'Full Day') { echo 'selected'; } ?>>Full Day</option>
                    </select>
                </div>
                <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission)) { ?>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="not_approved" <?php if($status == 'not_approved') { echo 'selected'; } ?>>Not Approved</option>
                            <option value="approved" <?php if($status == 'approved') { echo 'selected'; } ?>>Approved</option>
                        </select>
                    </div>
                <?php } ?>
            </div>
            
            <div class="mt-4 table-responsive">
                <table id="employeeOTMainTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <?php if($formTitle == 'Add Employee OT') { ?>
                                <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody id="employeeOTTable">
                        <?php if ($otId <= 0) { ?>
                            <input type="hidden" value="1" id="employeeOTHiddenId">
                            <tr class="employeeOTTableRow1">
                                <td>1</td>
                                <td>
                                    <input name="employee_id" id="employee_id1" type="hidden" class="employeeId">
                                    <input name="employee_name" id="employee_name1" type="text" class="form-control employeeName" placeholder="Enter Employee Name">
                                </td>
                                <td>
                                    <input name="employee_designation" id="employee_designation1" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation">
                                </td>
                                <?php if($formTitle == 'Add Employee OT') { ?>
                                    <td class="px-2">
                                        <div class="d-flex gap-2">
                                            <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                            <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } else {
                        $i = 1;
                        foreach ($employeeOTItems as $row) {
                        ?>
                            <tr class="employeeOTTableRow<?php echo $i; ?>">
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <input name="employee_id" id="employee_id<?php echo $i; ?>" type="hidden" class="employeeId" value="<?php echo $row->employee_id; ?>">
                                    <input name="employee_name" id="employee_name<?php echo $i; ?>" type="text" class="form-control employeeName" placeholder="Enter Employee Name" value="<?php echo $row->employee_name; ?>">
                                </td>
                                <td>
                                    <input name="employee_designation" id="employee_designation<?php echo $i; ?>" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation" value="<?php echo $row->employee_designation; ?>">
                                </td>
                                <?php if($formTitle == 'Add Employee OT') { ?>
                                    <td class="px-2">
                                        <div class="d-flex gap-2">
                                            <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                            <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php $i++;
                            }
                            echo '<input type="hidden" value="' . $i . '" id="employeeOTHiddenId">';
                        } ?>
                    </tbody>
                </table>
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

    $(document).ready(function() {
        // Initial calculation when page loads
        employeeNameAutoComplete();
    });

    /* --------------------------- Employee OT Increase FUNCTION STARTS --------------------------- */
    // Function to initialize autocomplete 
    function employeeNameAutoComplete() {
        $(".employeeName").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>employee/getAttendanceEmployeeNameList',
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
                    $(this).closest('tr').find('.employeeId'+employeeOTRowCount).val('');
                    $(this).closest('tr').find('.employeeName'+employeeOTRowCount).val('');
                    $(this).closest('tr').find('.employeeDesignation'+employeeOTRowCount).val('');
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
                $currentRow.find('.employeeId, .employeeName, .employeeDesignation').val(''); // Clear the hidden inputs in the current row
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
            //     $currentRow.find('.employeeId, .employeeName, .employeeDesignation').val(''); // Clear the hidden inputs in the current row
            // }
        });
    }

    // Initialize autocomplete when the input field gains focus
    $(".employeeName").on("focus", function() {
        employeeNameAutoComplete();
        // Trigger autocomplete to show the initial suggestions
        $(this).autocomplete("search", "");
    });

    // Employee OT Order Table Increment Function
    $(document).on('keydown', 'input[name="employee_designation"]:last', e => { if (e.which === 9) incrementEmployeeOTTableRow() });
    $(document).on('click', '.increaseTableRow', incrementEmployeeOTTableRow);

    var employeeOTRowCount = parseInt($("#employeeOTHiddenId").val()) || 0;

    function incrementEmployeeOTTableRow() {
        var html = 
        '<tr id="employeeOTTableRow' + employeeOTRowCount + '">' +
                '<td id="employeeOTTableNo' + employeeOTRowCount + '">' + employeeOTRowCount + '</td>' +
                '<td>' +
                    '<input name="employee_id" id="employee_id' + employeeOTRowCount + '" type="hidden" class="employeeId">' +
                    '<input name="employee_name" id="employee_name' + employeeOTRowCount + '" type="text" class="form-control employeeName" placeholder="Enter Employee Name">' +
                '</td>' +
                '<td>' +
                    '<input name="employee_designation" id="employee_designation' + employeeOTRowCount + '" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation">' +
                '</td>' +
                <?php if($formTitle == 'Add Employee OT') { ?>
                    '<td class="px-2">' +
                        '<div class="d-flex gap-2">' +
                            '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                            '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                        '</div>' +
                    '</td>' +
                <?php } ?>
            '</tr>';
        $('#employeeOTTable').append(html);
        updateEmployeeOTId();
        employeeOTRowCount++;
        $("#employeeOTSerialNo").val(employeeOTRowCount);

        // Initialize autocomplete when the input field gains focus
        $(".employeeName").on("focus", function() {
            employeeNameAutoComplete();
            // Trigger autocomplete to show the initial suggestions
            $(this).autocomplete("search", "");
        });
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#employeeOTMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('employeeOTTableRow', '');
            $(this).closest('tr').remove();
            var employeeOTRowCount = $("#employeeOTSerialNo").val();
            $("#employeeOTSerialNo").val(employeeOTRowCount - 1);
            updateEmployeeOTId();
        }
    });

    function updateEmployeeOTId() {
        $('#employeeOTTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'employeeOTTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'employeeOTTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="employee_id"]').attr('id', 'employee_id' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_name"]').attr('id', 'employee_name' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_designation"]').attr('id', 'employee_designation' + (descriptionUpdateId + 1));
            employeeNameAutoComplete();
        });
    }

    function getEmployeeOTItemTableData() {
        employeeOTData = [];
        $('#employeeOTTable tr').each(function() {
            var employeeId = $(this).find('.employeeId').val();

            if (employeeId != '') {
                var tableDataObj = {
                    employeeId : employeeId
                }
                employeeOTData.push(tableDataObj);
            }
        });
    }

    // PAN Save Function
    $("#employeeOTForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch_id: {
                required: true
            },
            ot_date: {
                required: true
            },
            work_place: {
                required: true
            },
            ot_type: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Zone",
            },
            branch_id: {
                required: "Please Select Branch",
            },
            ot_date: {
                required: "Please Select OT Date",
            },
            work_place: {
                required: "Please Enter Work Place",
            },
            ot_type: {
                required: "Please Select OT Type",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#employeeOTForm').get(0));

            getEmployeeOTItemTableData();
            data.append('employeeOTDataArray', JSON.stringify(employeeOTData));

            $.ajax({
                url: '<?php echo base_url(); ?>attendance/employeeOTFormSave',
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
                            <?php if($employeeId) { ?>
                                window.location.href = "<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $employeeId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>attendance/ot-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>