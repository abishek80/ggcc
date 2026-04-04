<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="stockOutForm" method="post">
            <div class="card px-3 pb-3">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="<?php echo base_url(); ?>stock/stock-out-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>stock/stock-out-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="stockout_id" id="stockout_id" type="hidden" value="<?php echo $stockOutId; ?>">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                        <input name="stockout_date" id="stockout_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $stockOutDate ? $stockOutDate : date('Y-m-d'); ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone <span class="text-danger">*</span></label>
                        <select name="zone" id="zone" class="form-select zone">
                            <option value="">Select Zone</option>
                            <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                            <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                            <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                        <select name="from_branch_id" id="from_branch_id" class="form-select branch select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $fromBranchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Used To <span class="text-danger">*</span></label>
                        <select name="used_to" id="used_to" class="form-select">
                            <option value="">Select Used To</option>
                            <option value="outlet" <?php if($usedTo == 'outlet') { echo 'selected'; } ?>>Outlet</option>
                            <option value="transfer" <?php if($usedTo == 'transfer') { echo 'selected'; } ?>>Branch Transfer</option>
                            <option value="missing" <?php if($usedTo == 'missing') { echo 'selected'; } ?>>Material Missing</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 showUsedTo d-none">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Transfer Branch</label>
                        <select name="to_brand_id" id="to_brand_id" class="form-select select2">
                            <option value="">Select Transfer Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $toBranchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 showOutlet d-none">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name</label>
                        <input name="outlet_name" id="outlet_name" type="text" class="form-control" placeholder="Enter Outlet Name" value="<?php echo $outletName; ?>">
                    </div>
                </div>
            </div>
            <div class="mt-3 card p-3">
                <div class="table-responsive">
                    <table id="stockOutMainTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Material Name</th>
                                <th>Material Category</th>
                                <th>Material Type</th>
                                <th>Available Stock</th>
                                <th>Material Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="stockOutTable">
                            <?php if ($stockOutId <= 0) { ?>
                                <input type="hidden" value="1" id="stockOutHiddenId">
                                <tr class="stockOutTableRow1">
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
                                        <input name="available_stock" id="available_stock1" type="text" readonly class="form-control availableStock" placeholder="Available Stock">
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
                            foreach ($stockOutMaterialItems as $row) {
                            ?>
                                <tr class="stockOutTableRow<?php echo $i; ?>">
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
                                        <input name="available_stock" id="available_stock<?php echo $i; ?>" type="text" readonly class="form-control availableStock" placeholder="Available Stock">
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
                                echo '<input type="hidden" value="' . $i . '" id="stockOutHiddenId">';
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
        
        $(document).on('input', '.materialQuantity', function() {
            var $row = $(this).closest('tr');
            var availableStock = parseInt($row.find('.availableStock').val());
            var enteredQuantity = parseFloat($(this).val());
            
            if (enteredQuantity > availableStock) {
                $(this).val(availableStock);
            }
        });

        if ($('#used_to').val() === 'transfer') {
            $('.showUsedTo').addClass('d-block').removeClass('d-none');
        }
        
        if ($('#used_to').val() === 'outlet') {
            $('.showOutlet').addClass('d-block').removeClass('d-none');
        }

        $('#used_to').change(function(){
            if ($(this).val() === 'transfer') {
                $('.showUsedTo').addClass('d-block').removeClass('d-none');
            } else {
                $('.showUsedTo').removeClass('d-block').addClass('d-none');
            }
            if ($(this).val() === 'outlet') {
                $('.showOutlet').addClass('d-block').removeClass('d-none');
            } else {
                $('.showOutlet').removeClass('d-block').addClass('d-none');
            }
        });
        
        materialNameAutoComplete();
    });

    /* --------------------------- StockOut Increase FUNCTION STARTS --------------------------- */
    // Function to initialize autocomplete 
    function materialNameAutoComplete() {
        var fromBranch = $('#from_branch_id').val();
        $(".materialName").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>stock/getStockinMaterialNameList',
                    type: 'post',
                    dataType: "json",
                    data: {
                        material_code: request.term,
                        from_branch_id: fromBranch
                    },
                    success: function(data) {
                        if (data && data.length > 0) {
                            /*response(data);*/
                            // Limiting to the first 10 items
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
                    $(this).closest('tr').find('.materialId'+stockOutRowCount).val('');
                    $(this).closest('tr').find('.materialName'+stockOutRowCount).val('');
                    $(this).closest('tr').find('.materialCategory'+stockOutRowCount).val('');
                    $(this).closest('tr').find('.materialType'+stockOutRowCount).val('');
                    $(this).closest('tr').find('.availableStock'+stockOutRowCount).val('');
                    $(this).closest('tr').find('.materialQuantity'+stockOutRowCount).val('');
                }else{
                    $(this).closest('tr').find('.materialId').val(ui.item.id);
                    $(this).closest('tr').find('.materialName').val(ui.item.value);
                    $(this).closest('tr').find('.materialCategory').val(ui.item.category);
                    $(this).closest('tr').find('.materialType').val(ui.item.type);
                    $(this).closest('tr').find('.availableStock').val(ui.item.current_stock_quantity);
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
                $currentRow.find('.materialId, .materialName, .materialCategory, .materialType, .availableStock, .materialQuantity').val('');
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
            //     $currentRow.find('.materialId, .materialName, .materialCategory, .materialType, .availableStock, .materialQuantity').val('');
            // }
        });
    }

    // Initialize autocomplete when the input field gains focus
    $(".materialName").on("focus", function() {
        materialNameAutoComplete();
        // Trigger autocomplete to show the initial suggestions
        $(this).autocomplete("search", "");
    });

    // StockOut Order Table Increment Function
    $(document).on('keydown', 'input[name="material_quantity"]:last', e => { if (e.which === 9) incrementStockOutTableRow() });
    $(document).on('click', '.increaseTableRow', incrementStockOutTableRow);
    
    var stockOutRowCount = parseInt($("#stockOutHiddenId").val()) || 0;

    function incrementStockOutTableRow() {
        var html = 
        '<tr id="stockOutTableRow' + stockOutRowCount + '">' +
                '<td id="stockOutTableNo' + stockOutRowCount + '">' + stockOutRowCount + '</td>' +
                '<td>' +
                    '<input name="material_id" id="material_id' + stockOutRowCount + '" type="hidden" class="materialId">' +
                    '<input name="material_name" id="material_name' + stockOutRowCount + '" type="text" class="form-control materialName" placeholder="Material Name">' +
                '</td>' +
                '<td>' +
                    '<input name="material_category" id="material_category' + stockOutRowCount + '" type="text" readonly class="form-control materialCategory" placeholder="Material Category">' +
                '</td>' +
                '<td>' +
                    '<input name="material_type" id="material_type' + stockOutRowCount + '" type="text" readonly class="form-control materialType" placeholder="Material Type">' +
                '</td>' +
                '<td>' +
                    '<input name="available_stock" id="available_stock' + stockOutRowCount + '" type="text" readonly class="form-control availableStock" placeholder="Available Stock">' +
                '</td>' +
                '<td>' +
                    '<input name="material_quantity" id="material_quantity' + stockOutRowCount + '" type="text" class="form-control materialQuantity decimal" placeholder="Material Quantity">' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#stockOutTable').append(html);
        updateStockOutId();
        stockOutRowCount++;
        $("#stockOutSerialNo").val(stockOutRowCount);
    
        // Initialize autocomplete when the input field gains focus
        $(".materialName").on("focus", function() {
            materialNameAutoComplete();
            // Trigger autocomplete to show the initial suggestions
            $(this).autocomplete("search", "");
        });
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#stockOutMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('stockOutTableRow', '');
            $(this).closest('tr').remove();
            var stockOutRowCount = $("#stockOutSerialNo").val();
            $("#stockOutSerialNo").val(stockOutRowCount - 1);
            updateStockOutId();
        }
    });

    function updateStockOutId() {
        $('#stockOutTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'stockOutTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'stockOutTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="material_id"]').attr('id', 'material_id' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_name"]').attr('id', 'material_name' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_category"]').attr('id', 'material_category' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_type"]').attr('id', 'material_type' + (descriptionUpdateId + 1));
            $(this).find('input[name^="available_stock"]').attr('id', 'available_stock' + (descriptionUpdateId + 1));
            $(this).find('input[name^="material_quantity"]').attr('id', 'material_quantity' + (descriptionUpdateId + 1));
            materialNameAutoComplete();
        });
    }
    
    function getStockOutTableData() {
        stockOutData = [];
        $('#stockOutTable tr').each(function() {
            var materialId = $(this).find('.materialId').val();
            var materialQuantity = $(this).find('.materialQuantity').val();

            if (materialId != '' || materialQuantity) {
                var tableDataObj = {
                    materialId: materialId,
                    materialQuantity: materialQuantity,
                }
                stockOutData.push(tableDataObj);
            }
        });
    }
    
    // Stock Outward Save Function
    $("#stockOutForm").validate({
        rules: {
            stockout_date: {
                required: true
            },
            zone: {
                required: true
            },
            branch_id: {
                required: true
            },
            used_to: {
                required: true
            }
        },
        messages: {
            stockout_date: {
                required: "Please Select Date",
            },
            zone: {
                required: "Please Select Zone",
            },
            branch_id: {
                required: "Please Select Branch",
            },
            used_to: {
                required: "Please Select Getin From",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#stockOutForm').get(0));

            getStockOutTableData();
            data.append('stockOutDataArray', JSON.stringify(stockOutData));

            $.ajax({
                url: '<?php echo base_url(); ?>stock/stockOutForm',
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
                            window.location.href = "<?php echo base_url(); ?>stock/stock-out-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>