<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="performanceForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>employee/performance-list/" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>employee/performance-list/" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="performance_id" id="performance_id" type="hidden" value="<?php echo $performanceId; ?>">
            <div class="table-responsive">
                <table id="employeePerformanceMainTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Date</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Rating</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="employeePerformanceTable">
                        <?php if ($employeePerformanceId <= 0) { ?>
                            <input type="hidden" value="1" id="employeePerformanceHiddenId">
                            <tr class="employeePerformanceTableRow1">
                                <td>1</td>
                                <td>
                                    <input name="performance_date" id="performance_date1" type="date" class="form-control performanceDate date-picker" placeholder="YYYY - MM - DD">
                                </td>
                                <td>
                                    <input name="employee_id" id="employee_id1" type="hidden" class="employeeId">
                                    <input name="employee_name" id="employee_name1" type="text" class="form-control employeeName" placeholder="Enter Employee Name">
                                </td>
                                <td>
                                    <input name="employee_designation" id="employee_designation1" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation">
                                </td>
                                <td>
                                    <select name="performance_ratings" id="performance_ratings1" class="form-select performanceRatings">
                                        <option value="">Select Rating</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        <option value="Poor">Poor</option>
                                        <option value="Bad">Bad</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="performance_remarks" id="performance_remarks1" type="text" class="form-control performanceRemarks" placeholder="Enter Remarks"></textarea>
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
                        foreach ($employeePerformanceList as $row) {
                        ?>
                            <tr class="employeePerformanceTableRow<?php echo $i; ?>">
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <input name="performance_date" id="performance_date<?php echo $i; ?>" type="date" class="form-control performanceDate date-picker" placeholder="YYYY - MM - DD">
                                </td>
                                <td>
                                    <input name="employee_id" id="employee_id<?php echo $i; ?>" type="hidden" class="employeeId" value="<?php echo $row->employee_id; ?>">
                                    <input name="employee_name" id="employee_name<?php echo $i; ?>" type="text" class="form-control employeeName" placeholder="Enter Employee Name" value="<?php echo $row->employee_name; ?>">
                                </td>
                                <td>
                                    <input name="employee_designation" id="employee_designation<?php echo $i; ?>" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation" value="<?php echo $row->employee_designation; ?>">
                                </td>
                                <td>
                                    <select name="performance_ratings" id="performance_ratings<?php echo $i; ?>" class="form-select performanceRatings">
                                        <option value="">Select Rating</option>
                                        <option value="Excellent" <?php if($row->ratings == "Excellent") { echo "selected"; } ?>>Excellent</option>
                                        <option value="Good" <?php if($row->ratings == "Good") { echo "selected"; } ?>>Good</option>
                                        <option value="Average" <?php if($row->ratings == "Average") { echo "selected"; } ?>>Average</option>
                                        <option value="Poor" <?php if($row->ratings == "Poor") { echo "selected"; } ?>>Poor</option>
                                        <option value="Bad" <?php if($row->ratings == "Bad") { echo "selected"; } ?>>Bad</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="performance_remarks" id="performance_remarks<?php echo $i; ?>" type="text" class="form-control performanceRemarks" placeholder="Enter Remarks"><?php echo $row->remarks; ?></textarea>
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
                            echo '<input type="hidden" value="' . $i . '" id="employeePerformanceHiddenId">';
                        } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</section>


<script>
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
                    $(this).closest('tr').find('.employeeId'+employeePerformanceRowCount).val('');
                    $(this).closest('tr').find('.employeeName'+employeePerformanceRowCount).val('');
                    $(this).closest('tr').find('.employeeDesignation'+employeePerformanceRowCount).val('');
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
                $currentRow.find('.employeeId, .employeeName, .employeeDesignation, .performanceRatings, .performanceRemarks').val(''); // Clear the hidden inputs in the current row
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
            //     $currentRow.find('.employeeId, .employeeName, .employeeDesignation, .performanceRatings, .performanceRemarks').val(''); // Clear the hidden inputs in the current row
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
    $(document).on('keydown', 'textarea[name="performance_remarks"]:last', e => { if (e.which === 9) incrementEmployeePerformanceTableRow() });
    $(document).on('click', '.increaseTableRow', incrementEmployeePerformanceTableRow);

    var employeePerformanceRowCount = parseInt($("#employeePerformanceHiddenId").val()) || 0;

    function incrementEmployeePerformanceTableRow() {
        var html = 
        '<tr id="employeePerformanceTableRow' + employeePerformanceRowCount + '">' +
                '<td id="employeePerformanceTableNo' + employeePerformanceRowCount + '">' + employeePerformanceRowCount + '</td>' +
                
                '<td>' +
                    '<input name="performance_date" id="performance_date' + employeePerformanceRowCount + '" type="date" class="form-control performanceDate date-picker" placeholder="YYYY - MM - DD">' +
                '</td>' +
                '<td>' +
                    '<input name="employee_id" id="employee_id' + employeePerformanceRowCount + '" type="hidden" class="employeeId">' +
                    '<input name="employee_name" id="employee_name' + employeePerformanceRowCount + '" type="text" class="form-control employeeName" placeholder="Enter Employee Name">' +
                '</td>' +
                '<td>' +
                    '<input name="employee_designation" id="employee_designation' + employeePerformanceRowCount + '" readonly type="text" class="form-control employeeDesignation" placeholder="Enter Employee Designation">' +
                '</td>' +
                '<td>' +
                    '<select name="performance_ratings" id="performance_ratings' + employeePerformanceRowCount + '" class="form-select performanceRatings">' +
                        '<option value="">Select Rating</option>' +
                        '<option value="Excellent">Excellent</option>' +
                        '<option value="Good">Good</option>' +
                        '<option value="Average">Average</option>' +
                        '<option value="Poor">Poor</option>' +
                        '<option value="Bad">Bad</option>' +
                    '</select>' +
                '</td>' +
                '<td>' +
                    '<textarea name="performance_remarks" id="performance_remarks' + employeePerformanceRowCount + '" type="text" class="form-control performanceRemarks" placeholder="Enter Remarks"></textarea>' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#employeePerformanceTable').append(html);
        updateEmployeePerformanceId();
        employeePerformanceRowCount++;
        $("#employeePerformanceSerialNo").val(employeePerformanceRowCount);

        // Initialize autocomplete when the input field gains focus
        $(".employeeName").on("focus", function() {
            employeeNameAutoComplete();
            // Trigger autocomplete to show the initial suggestions
            $(this).autocomplete("search", "");
        });
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#employeePerformanceMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('employeePerformanceTableRow', '');
            $(this).closest('tr').remove();
            var employeePerformanceRowCount = $("#employeePerformanceSerialNo").val();
            $("#employeePerformanceSerialNo").val(employeePerformanceRowCount - 1);
            updateEmployeePerformanceId();
        }
    });

    function updateEmployeePerformanceId() {
        $('#employeePerformanceTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'employeePerformanceTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'employeePerformanceTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="performance_date"]').attr('id', 'performance_date' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_id"]').attr('id', 'employee_id' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_name"]').attr('id', 'employee_name' + (descriptionUpdateId + 1));
            $(this).find('input[name^="employee_designation"]').attr('id', 'employee_designation' + (descriptionUpdateId + 1));
            $(this).find('input[name^="performance_ratings"]').attr('id', 'performance_ratings' + (descriptionUpdateId + 1));
            $(this).find('textarea[name^="performance_remarks"]').attr('id', 'performance_remarks' + (descriptionUpdateId + 1));
            employeeNameAutoComplete();
        });
    }

    function getEmployeePerformanceItemTableData() {
        employeePerformanceData = [];
        $('#employeePerformanceTable tr').each(function() {
            var performanceDate = $(this).find('.performanceDate').val();
            var employeeId = $(this).find('.employeeId').val();
            var performanceRatings = $(this).find('.performanceRatings').val();
            var performanceRemarks = $(this).find('.performanceRemarks').val();

            if (performanceDate != '' || employeeId != '' || performanceRatings != '' || performanceRemarks != '') {
                var tableDataObj = {
                    performanceDate : performanceDate,
                    employeeId : employeeId,
                    performanceRatings : performanceRatings,
                    performanceRemarks : performanceRemarks
                }
                employeePerformanceData.push(tableDataObj);
            }
        });
    }

    // Save EmployeePerformance Order Form
    $("#performanceForm").validate({
        rules: {
            performance_date: {
                required: true
            },
            employee_name: {
                required: true
            },
            employee_designation: {
                required: true
            },
            performance_ratings: {
                required: true
            },
            performance_remarks: {
                required: true
            }
        },
        messages: {
            performance_date: {
                required: "Please Select Date",
            },
            employee_name: {
                required: "Please Select Employee Name",
            },
            employee_designation: {
                required: "Please Select Employee Designation",
            },
            performance_ratings: {
                required: "Please Select Performance Ratings",
            },
            performance_remarks: {
                required: "Please Enter Performance Remarks",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#performanceForm').get(0));

            getEmployeePerformanceItemTableData();
            data.append('employeePerformanceDataArray', JSON.stringify(employeePerformanceData));

            $.ajax({
                url: '<?php echo base_url(); ?>employee/employeePerformanceSaveForm',
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
                            window.location.href = "<?php echo base_url(); ?>employee/performance-list/";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>