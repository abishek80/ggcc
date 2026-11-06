<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="branchInchargeForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/branch-incharge-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/branch-incharge-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="branch_incharge_id" id="branch_incharge_id" type="hidden" value="<?php echo $branchInchargeId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if ($branchInchargeZone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if ($branchInchargeZone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if ($branchInchargeZone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchInchargeBranch) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Incharge Employee <span class="text-danger">*</span></label>
                    <select name="incharge_employee" id="incharge_employee" class="form-select select2">
                        <option value="">Select Incharge Employee</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchInchargeEmployee) { echo 'selected="true"'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if ($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if ($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employees in this Branch</label>
                    <select name="employees[]" id="employees" class="form-select multiple select2" multiple="multiple">
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if (in_array($row->id, $assignedEmployeeIds)) { echo 'selected="true"'; } ?>><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.zone').change(function () {
            var selectedZone = $(this).val();
            if (selectedZone === '') return;

            $.ajax({
                url: "<?php echo base_url('master/selectBranchDropdown'); ?>",
                type: "POST",
                dataType: "json",
                data: { zone: selectedZone },
                success: function (data) {
                    var selectElement = document.querySelector('.branch');
                    selectElement.innerHTML = '<option value="">Select Branch</option>';
                    data.forEach(function (item) {
                        var option = document.createElement('option');
                        option.textContent = item.branch;
                        option.value = item.id;
                        selectElement.appendChild(option);
                    });
                    $('.branch').trigger('change.select2');
                }
            });
        });
    });

    $("#branchInchargeForm").validate({
        rules: {
            zone: { required: true },
            branch: { required: true },
            incharge_employee: { required: true }
        },
        messages: {
            zone: { required: "Please Select Zone" },
            branch: { required: "Please Select Branch" },
            incharge_employee: { required: "Please Select Incharge Employee" }
        },
        submitHandler: function (form) {
            var data = new FormData($('#branchInchargeForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/branchInchargeFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>master/branch-incharge-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>
