<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="expensesForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($employeeId) { ?>
                        <a href="<?php echo base_url() . 'employee/expenses-view/' . $employeeId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>employee/expenses-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $formTitle . $status . ' Amount'; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($employeeId) { ?>
                        <a href="<?php echo base_url() . 'employee/expenses-view/' . $employeeId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>employee/expenses-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="expenses_id" id="expenses_id" type="hidden" value="<?php echo $expensesId; ?>">
            <input name="status" id="status" type="hidden" value="<?php echo $status; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $date ? $date : date('Y-m-d'); ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                    <?php if(in_array('employee', $userPermission)) { ?>
                        <input name="employee_name" id="employee_name" type="hidden" class="form-control" value="<?php echo $this->session->userdata('userid'); ?>">
                        <input name="employee_name_display" id="employee_name_display" readonly type="text" class="form-control" value="<?php echo $this->session->userdata('username'); ?>">
                    <?php } else { ?>
                        <select name="employee_name" id="employee_name" class="form-select selectEmployeeName select2">
                            <option value="">Select Employee Name</option>
                            <?php foreach ($employeeDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($employeeId == $row->id) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Designation</label>
                    <input name="designation" id="designation" readonly type="text" class="employeeDesignation form-control" placeholder="Enter Employee Designation" value="<?php echo $designation; ?>">
                </div>
                <div class="col-12">
                    <div class="mt-3 table-responsive">
                        <table id="expensesMainTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="expensesTable">
                                <?php if ($expensesId <= 0) { ?>
                                    <input type="hidden" value="1" id="expensesHiddenId">
                                    <tr class="expensesTableRow1">
                                        <td>1</td>
                                        <td>
                                            <input name="amount" id="amount1" type="text" class="form-control number-only amount" placeholder="Amount">
                                        </td>
                                        <td>
                                            <input name="remarks" id="remarks1" type="text" class="form-control remarks" placeholder="Remark">
                                        </td>
                                        <td class="px-2">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                                <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } else {
                                $i = 1;
                                foreach ($expensesItems as $row) {
                                ?>
                                    <tr class="expensesTableRow<?php echo $i; ?>">
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <input name="amount" id="amount<?php echo $i; ?>" type="text" class="form-control number-only amount" value="<?php echo $row->amount; ?>" placeholder="Amount">
                                        </td>
                                        <td>
                                            <input name="remarks" id="remarks<?php echo $i; ?>" type="text" class="form-control remarks" value="<?php echo $row->remarks; ?>" placeholder="Remarks">
                                        </td>
                                        <td class="px-2">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>
                                                <button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $i++;
                                    }
                                    echo '<input type="hidden" value="' . $i . '" id="expensesHiddenId">';
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
    $(document).ready(function() {
        $('.selectEmployeeName').change(function () {
            var selectedEmployeeName = $(this).val();
            if (selectedEmployeeName !== '') {
                $.ajax({
                    url: "<?php echo base_url('employee/employeeInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        employeeName: selectedEmployeeName
                    },
                    success: function (data) {
                        employeeId = data[0].id;
                        employeeDesignation = data[0].designation;
                        $('.employeeId').val(employeeId);
                        $('.employeeDesignation').val(employeeDesignation);
                    }
                });
            }
        });
    });


    // Branch Visit Order Table Increment Function
    $(document).on('keydown', 'input[name="remarks"]:last', e => { if (e.which === 9) incrementExpensesTableRow() });
    $(document).on('click', '.increaseTableRow', incrementExpensesTableRow);
    
    var expensesRowCount = parseInt($("#expensesHiddenId").val()) || 0;

    function incrementExpensesTableRow() {
        var html = 
        '<tr id="expensesTableRow' + expensesRowCount + '">' +
                '<td id="expensesTableNo' + expensesRowCount + '">' + expensesRowCount + '</td>' +
                '<td>' +
                    '<input name="amount" id="amount' + expensesRowCount + '" type="text" class="form-control number-only amount" placeholder="Amount">' +
                '</td>' +
                '<td>' +
                    '<input name="remarks" id="remarks' + expensesRowCount + '" type="text" class="form-control remarks" placeholder="Remark">' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2 justify-content-center">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#expensesTable').append(html);
        updateExpensesId();
        expensesRowCount++;
        $("#expensesSerialNo").val(expensesRowCount);
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#expensesMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('expensesTableRow', '');
            $(this).closest('tr').remove();
            var expensesRowCount = $("#expensesSerialNo").val();
            $("#expensesSerialNo").val(expensesRowCount - 1);
            updateExpensesId();
        }
    });

    function updateExpensesId() {
        $('#expensesTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'expensesTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'expensesTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="amount"]').attr('id', 'amount' + (descriptionUpdateId + 1));
            $(this).find('input[name^="remarks"]').attr('id', 'remarks' + (descriptionUpdateId + 1));
        });
    }
    

    function getExpensesItemTableData() {
        expensesData = [];
        $('#expensesTable tr').each(function() {
            var amount = $(this).find('.amount').val();
            var remarks = $(this).find('.remarks').val();

            if (amount != '' || remarks != '') {
                var tableDataObj = {
                    amount : amount,
                    remarks : remarks,
                }
                expensesData.push(tableDataObj);
            }
        });
    }

    // Vehicle Fuel Save Function
    $("#expensesForm").validate({
        rules: {
            date: {
                required: true
            },
            employee_name: {
                required: true
            }
        },
        messages: {
            date: {
                required: "Please Select Date"
            },
            employee_name: {
                required: "Please Select Employee Name"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#expensesForm').get(0));

            getExpensesItemTableData();
            data.append('expensesDataArray', JSON.stringify(expensesData));

            $.ajax({
                url: '<?php echo base_url(); ?>employee/employeeExpensesSave',
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
                                window.location.href = "<?php echo base_url() . 'employee/expenses-view/' . $employeeId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>employee/expenses-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>