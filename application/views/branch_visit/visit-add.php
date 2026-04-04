<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="branchVisitForm" method="post">
            <div class="card px-3 pb-3">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                    <div class="d-flex gap-2 align-items-center">
                        <?php if($branchId) { ?>
                            <a href="<?php echo base_url() . 'branch-visit-view/' . $branchId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>branch-visit-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                        <?php } ?>
                        <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                    </div>
                    <div class="d-flex gap-3 justify-content-end">
                        <?php if($branchId) { ?>
                            <a href="<?php echo base_url() . 'branch-visit-view/' . $branchId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>branch-visit-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <?php } ?>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <input name="branch_visit_id" id="branch_visit_id" type="hidden" value="<?php echo $branchVisitId; ?>">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                        <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $branchVisitDate; ?>">
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
                        <select name="branch_id" id="branch_id" class="form-select branch select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($row->id == $branchId) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-3 card p-3">
                <div class="table-responsive">
                    <table id="branchVisitMainTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Title</th>
                                <th>Remark</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="branchVisitTable">
                            <?php if ($branchVisitId <= 0) { ?>
                                <input type="hidden" value="1" id="branchVisitHiddenId">
                                <tr class="branchVisitTableRow1">
                                    <td>1</td>
                                    <td>
                                        <input name="title" id="title1" type="text" class="form-control title" placeholder="Title">
                                    </td>
                                    <td>
                                        <input name="remark" id="remark1" type="text" class="form-control remark" placeholder="Remark">
                                    </td>
                                    <td>
                                        <input name="status" id="status1" type="text" class="form-control status" placeholder="Status">
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
                            foreach ($branchVisitItems as $row) {
                            ?>
                                <tr class="branchVisitTableRow<?php echo $i; ?>">
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <input name="title" id="title<?php echo $i; ?>" type="text" class="form-control title" value="<?php echo $row->title; ?>" placeholder="Title">
                                    </td>
                                    <td>
                                        <input name="remark" id="remark<?php echo $i; ?>" type="text" class="form-control remark" value="<?php echo $row->remark; ?>" placeholder="Remark">
                                    </td>
                                    <td>
                                        <input name="status" id="status<?php echo $i; ?>" type="text" class="form-control status" value="<?php echo $row->status; ?>" placeholder="Status">
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
                                echo '<input type="hidden" value="' . $i . '" id="branchVisitHiddenId">';
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
    });

    /* --------------------------- Branch Visit Increase FUNCTION STARTS --------------------------- */


    // Branch Visit Order Table Increment Function
    $(document).on('keydown', 'input[name="status"]:last', e => { if (e.which === 9) incrementBranchVisitTableRow() });
    $(document).on('click', '.increaseTableRow', incrementBranchVisitTableRow);
    
    var branchVisitRowCount = parseInt($("#branchVisitHiddenId").val()) || 0;

    function incrementBranchVisitTableRow() {
        var html = 
        '<tr id="branchVisitTableRow' + branchVisitRowCount + '">' +
                '<td id="branchVisitTableNo' + branchVisitRowCount + '">' + branchVisitRowCount + '</td>' +
                '<td>' +
                    '<input name="title" id="title' + branchVisitRowCount + '" type="text" class="form-control title" placeholder="Title">' +
                '</td>' +
                '<td>' +
                    '<input name="remark" id="remark' + branchVisitRowCount + '" type="text" class="form-control remark" placeholder="Remark">' +
                '</td>' +
                '<td>' +
                    '<input name="status" id="status' + branchVisitRowCount + '" type="text" class="form-control status" placeholder="Status">' +
                '</td>' +
                '<td class="px-2">' +
                    '<div class="d-flex gap-2 justify-content-center">' +
                        '<button type="button" class="deleteTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="bx bx-minus"></i> </button>' +
                        '<button type="button" class="increaseTableRow border-0 box-hover" data-toggle="tooltip" data-placement="top" title="Add"> <i class="bx bx-plus"></i> </button>' +
                    '</div>' +
                '</td>' +
            '</tr>';
        $('#branchVisitTable').append(html);
        updateBranchVisitId();
        branchVisitRowCount++;
        $("#branchVisitSerialNo").val(branchVisitRowCount);
    }

    $(document).on('click', '.deleteTableRow', function() {
        var rowCount = parseInt($('#branchVisitMainTable tr').length) - 1;
        if (rowCount > 1) {
            var ballRowId = $(this).closest('tr').attr('id');
            var descriptionNumber = ballRowId.replace('branchVisitTableRow', '');
            $(this).closest('tr').remove();
            var branchVisitRowCount = $("#branchVisitSerialNo").val();
            $("#branchVisitSerialNo").val(branchVisitRowCount - 1);
            updateBranchVisitId();
        }
    });

    function updateBranchVisitId() {
        $('#branchVisitTable tr').each(function(descriptionUpdateId) {
            $(this).attr('id', 'branchVisitTableRow' + (descriptionUpdateId + 1));
            $(this).find('td:first').attr('id', 'branchVisitTableNo' + (descriptionUpdateId + 1)).text(descriptionUpdateId + 1);
            $(this).find('input[name^="title"]').attr('id', 'title' + (descriptionUpdateId + 1));
            $(this).find('input[name^="remark"]').attr('id', 'remark' + (descriptionUpdateId + 1));
            $(this).find('input[name^="status"]').attr('id', 'status' + (descriptionUpdateId + 1));
        });
    }
    

    function getBranchVisitItemTableData() {
        branchVisitData = [];
        $('#branchVisitTable tr').each(function() {
            var title = $(this).find('.title').val();
            var status = $(this).find('.status').val();
            var remark = $(this).find('.remark').val();

            if (title != '' || status != '' || remark != '') {
                var tableDataObj = {
                    title : title,
                    status : status,
                    remark : remark,
                }
                branchVisitData.push(tableDataObj);
            }
        });
    }

    // Branch Visit Save Function
    $("#branchVisitForm").validate({
        rules: {
            date: {
                required: true
            },
            zone: {
                required: true
            },
            branch_id: {
                required: true
            }
        },
        messages: {
            date: {
                required: "Please Select Date",
            },
            zone: {
                required: "Please Select Zone",
            },
            branch_id: {
                required: "Please Select Branch",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#branchVisitForm').get(0));

            getBranchVisitItemTableData();
            data.append('branchVisitDataArray', JSON.stringify(branchVisitData));

            $.ajax({
                url: '<?php echo base_url(); ?>addBranchVisitFormSave',
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
                            <?php if($branchId) { ?>
                                window.location.href = "<?php echo base_url() . 'branch-visit-view/' . $branchId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>branch-visit-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>