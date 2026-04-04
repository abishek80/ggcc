<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="partyNameForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/party-name-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/party-name-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $partyNameToken; ?>">
            <input name="party_name_id" id="party_name_id" type="hidden" value="<?php echo $partyNameId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Company Name <span class="text-danger">*</span></label>
                    <select name="company_name" id="company_name" class="form-select">
                        <option value="">Select Company Name</option>
                        <option value="ggcc" <?php if($companyName == 'ggcc') { echo 'selected'; } ?>>GGCC</option>
                        <option value="bright" <?php if($companyName == 'bright') { echo 'selected'; } ?>>Bright</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Party Name <span class="text-danger">*</span></label>
                    <input name="party_name" id="party_name" type="text" class="form-control generate_token" placeholder="Enter Party Name" value="<?php echo $partyName; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Email</label>
                    <input name="email" id="email" type="text" class="form-control text-lowercase" placeholder="Enter Email" value="<?php echo $email; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Mobile Number</label>
                    <input name="mobile_number" id="mobile_number" type="text" class="form-control" placeholder="Enter Mobile Number" value="<?php echo $mobileNumber; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Party is MSME <span class="text-danger">*</span></label>
                    <div class="d-flex gap-4 mt-2">
                        <div class="d-flex gap-2 align-items-center">
                            <input name="msme" id="msme_yes" type="radio" class="form-check-input" value="yes" <?php if($msmeValue == 'yes') { echo 'checked'; } ?>>
                            <label class="fw-bold text-black fs-6" for="msme_yes">Yes</label>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <input name="msme" id="msme_no" type="radio" class="form-check-input" value="no" <?php if($msmeValue == 'no') { echo 'checked'; } ?>>
                            <label class="fw-bold text-black fs-6" for="msme_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">MSME Number</label>
                    <input name="msme_number" id="msme_number" type="text" class="form-control generate_token" placeholder="Enter MSME Number" value="<?php echo $MSMENumber; ?>">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
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
    // Party Name Save Function
    $("#partyNameForm").validate({
        rules: {
            company_name: {
                required: true
            },
            party_name: {
                required: true
            },
            msme: {
                required: true
            }
        },
        messages: {
            company_name: {
                required: "Please Select Company Name",
            },
            party_name: {
                required: "Please Enter Party Name",
            },
            msme: {
                required: "Please Select Party is MSME",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#partyNameForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/partyNameFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>master/party-name-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>