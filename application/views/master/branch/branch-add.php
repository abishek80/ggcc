<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="branchForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/branch-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/branch-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $branchToken; ?>">
            <input name="branch_id" id="branch_id" type="hidden" value="<?php echo $branchId; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($branchZone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($branchZone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($branchZone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <input name="branch" id="branch" type="text" class="form-control generate_token" placeholder="Enter Branch Name" value="<?php echo $branch; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                        <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    // Branch Save Function
    $("#branchForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Branch Zone",
            },
            branch: {
                required: "Please Enter Branch Name",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#branchForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/branchFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>master/branch-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>