<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="stockInForm" method="post">
            <div class="card px-3 pb-3">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url(); ?>stock/stock-in-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>stock/stock-in-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="stockin_id" id="stockin_id" type="hidden" value="<?php echo $stockInId; ?>">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                        <input name="stockin_date" id="stockin_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $stockInDate ? $stockInDate : date('Y-m-d'); ?>">
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
                        <select name="from_branch_id" id="from_branch_id" class="form-select branch select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $fromBranchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Vendor Name <span class="text-danger">*</span></label>
                        <input name="getin_from" id="getin_from" type="text" class="form-control" placeholder="Enter Vendor Name" value="<?php echo $getinFrom; ?>">
                    </div>
                </div>
            </div>
            <div class="mt-3 card p-3">
                <div class="table-responsive">
                    <table id="stockInMainTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Material Name</th>
                                <th>Material Category</th>
                                <th>Material Type</th>
                                <th>Material Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="stockInTable">
                            <?php if ($stockInId <= 0) { ?>
                                <input type="hidden" value="1" id="stockInHiddenId">
                                <tr class="stockInTableRow1">
                                    <td>1</td>
                                    <td>
                                        <input name="material_name" id="material_name1" type="text" class="form-control materialName" placeholder="Material Name">
                                        <input name="material_id" id="material_id1" type="hidden" class="materialId">
                                    </td>
                                    <td>
                                        <input name="material_category" id="material_category1" type="text" readonly class="form-control materialCategory" placeholder="Material Category">
                                    </td>
                                    <td>
                                        <input name="material_type" id="material_type1" type="text" readonly class="form-control materialType" placeholder="Material Type">
                                    </td>
                                    <td>
                                        <input name="material_quantity" id="material_quantity1" type="text" class="form-control materialQuantity decimal" placeholder="Material Quantity">
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
                                foreach ($stockInMaterialItems as $row) {
                            ?>
                                <tr class="stockInTableRow<?php echo $i; ?>">
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <input name="material_name" id="material_name<?php echo $i; ?>" type="text" class="form-control materialName" value="<?php echo $row->material_name; ?>" placeholder="Material Name">
                                        <input name="material_id" id="material_id<?php echo $i; ?>" type="hidden" class="materialId" value="<?php echo $row->material_id; ?>">
                                    </td>
                                    <td>
                                        <input name="material_category" id="material_category<?php echo $i; ?>" type="text" readonly class="form-control materialCategory" value="<?php echo $row->category; ?>" placeholder="Material Category">
                                    </td>
                                    <td>
                                        <input name="material_type" id="material_type<?php echo $i; ?>" type="text" readonly class="form-control materialType" value="<?php echo $row->type; ?>" placeholder="Material Type">
                                    </td>
                                    <td>
                                        <input name="material_quantity" id="material_quantity<?php echo $i; ?>" type="text" class="form-control materialQuantity decimal" value="<?php echo $row->quantity; ?>" placeholder="Material Quantity">
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
                                echo '<input type="hidden" value="' . $i . '" id="stockInHiddenId">';
                            } ?>
                        </tbody>
                    </table>
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
        
        materialNameAutoComplete();
    });


    /* --------------------------- Stockin Increase FUNCTION STARTS --------------------------- */
    // Function to initialize autocomplete 
    function materialNameAutoComplete() {
        $(".materialName").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>stock/getMaterialNameList',
                    type: 'post',
                    dataType: "json",
                    data: {
                        material_code: request.term
                    },
                    success: function(data) {
                        if (data && data.length > 0) {
                            /*response(data);*/
                            // Limiting to the first  items
                            response(data.slice(0, 10));
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
                    $(this).closest('tr').find('.materialId'+stockInRowCount).val('');
                    $(this).closest('tr').find('.materialName'+stockInRowCount).val('');
                    $(this).closest('tr').find('.materialCategory'+stockInRowCount).val('');
                    $(this).closest('tr').find('.materialType'+stockInRowCount).val('');
                    $(this).closest('tr').find('.materialQuantity'+stockInRowCount).val('');
                }else{
                    $(this).closest('tr').find('.materialId').val(ui.item.id);
                    $(this).closest('tr').find('.materialName').val(ui.item.value);
                    $(this).closest('tr').find('.materialCategory').val(ui.item.category);
                    $(this).closest('tr').find('.materialType').val(ui.item.type);
                }
            }
        });

        $(document).on('focusout', '.materialName', function() {
            var $currentRow = $(this).closest('tr');
            var $inputField = $(this);
            var inputValue = $inputField.val();
            var matched = false;

            if (inputValue === 'No data found') {
                $inputField.val('');
                $currentRow.find('.materialId, .materialName, .materialCategory, .materialType, .materialQuantity').val('');
                return;
            }

            $(".materialName").autocomplete("widget").children().each(function() {
                if ($(this).text() === inputValue) {
                    matched = true;
                    return false;
                }
            });

            // if (!matched) {
            //     $inputField.val('');
            //     $currentRow.find('.materialId, .materialName, .materialCategory, .materialType, .materialQuantity').val('');
            // }
        });
    }

    // Initialize autocomplete when the input field gains focus
    $(".materialName").on("focus", function() {
        materialNameAutoComplete();
        // Trigger autocomplete to show the initial suggestions
        $(this).autocomplete("search", "");
    });

    // Stockin Order Table Increment Function
    $(document).on('keydown', 'input[name="material_quantity"]:last', e => { if (e.which === 9) incrementStockInTableRow() });
    $(document).on('click', '.increaseTableRow', incrementStockInTableRow);
    
    var stockInRowCount = parseInt($("#stockInHiddenId").val()) || 0;

    function incrementStockInTableRow() {
        var html = 
        '<tr id="stockInTableRow' + stockInRowCount + '">' +
                '<td id="stockInTableNo' + stockInRowCount + '">' + stockInRowCount + '</td>' +
                '<td>' +
                    '<input name="material_id" id="material_id' + stockInRowCount + '" type="hidden" class="materialId">' +
                    '<input name="material_name" id="material_name' + stockInRowCount + '" type="text" class="form-control materialName" placeholder="Material Name">' +
                '</td>' +
                '<td>' +
                    '<input name="material_category" id="material_category' + stockInRowCount + '" type="text" readonly class="form-control materialCategory" placeholder="Material Category">' +
                '</td>' +
                '<td>' +
                    '<input name="material_type" id="material_type' + stockInRowCount + '" type="text" readonly class="form-control materialType" placeholder="Material Type">' +
                '</td>' +
                '<td>' +
                    '<input name="material_quantity" id="material_quantity' + stockInRowCount + '" type="text" class="form-control materialQuantity decimal" placeholder="Material Quantity">' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#stockInTable').append(html);
        updateStockInId();
        stockInRowCount++;
        $("#stockInSerialNo").val(stockInRowCount);
    
        // Initialize autocomplete when the input field gains focus
        $(".materialName").on("focus", function() {
            materialNameAutoComplete();
            // Trigger autocomplete to show the initial suggestions
            $(this).autocomplete("search", "");
        });
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#stockInMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('stockInTableRow', '');
            $(this).closest('tr').remove();
            var stockInRowCount = $("#stockInSerialNo").val();
            $("#stockInSerialNo").val(stockInRowCount - 1);
            updateStockInId();
        }
    });

    function updateStockInId() {
        $('#stockInTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'stockInTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'stockInTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="material_id"]').attr('id', 'material_id' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_name"]').attr('id', 'material_name' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_category"]').attr('id', 'material_category' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_type"]').attr('id', 'material_type' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_quantity"]').attr('id', 'material_quantity' + (descriptionUpdateId + 1));
            materialNameAutoComplete();
        });
    }
    
    function getStockInTableData() {
        stockInData = [];
        $('#stockInTable tr').each(function() {
            var materialId = $(this).find('.materialId').val();
            var materialQuantity = $(this).find('.materialQuantity').val();

            if (materialId != '' || materialQuantity) {
                var tableDataObj = {
                    materialId: materialId,
                    materialQuantity: materialQuantity,
                }
                stockInData.push(tableDataObj);
            }
        });
    }
    
    // Stock Inward Save Function
    $("#stockInForm").validate({
        rules: {
            stockin_date: {
                required: true
            },
            zone: {
                required: true
            },
            from_branch_id: {
                required: true
            },
            getin_from: {
                required: true
            }
        },
        messages: {
            stockin_date: {
                required: "Please Select Date",
            },
            zone: {
                required: "Please Select Zone",
            },
            from_branch_id: {
                required: "Please Select Branch Name",
            },
            getin_from: {
                required: "Please Enter Vendor Name",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#stockInForm').get(0));

            getStockInTableData();
            data.append('stockInDataArray', JSON.stringify(stockInData));

            $.ajax({
                url: '<?php echo base_url(); ?>stock/stockInForm',
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
                            window.location.href = "<?php echo base_url(); ?>stock/stock-in-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>