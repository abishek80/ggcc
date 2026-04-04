<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="thirdpartyLoanForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <?php if($thirdpartyId) { ?>
                    <a href="<?php echo base_url() . 'loan/thirdparty-loan-view/' . $thirdpartyId; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>loan/thirdparty-loan-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <?php } ?>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <?php if($thirdpartyId) { ?>
                    <a href="<?php echo base_url() . 'loan/thirdparty-loan-view/' . $thirdpartyId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } else { ?>
                    <a href="<?php echo base_url(); ?>loan/thirdparty-loan-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="thirdparty_loan_id" id="thirdparty_loan_id" type="hidden" value="<?php echo $thirdpartyLoanId; ?>">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Thirdparty Name <span class="text-danger">*</span></label>
                    <select name="thirdparty_name" id="thirdparty_name" class="form-select selectThirdpartyName select2">
                        <option value="">Select Thirdparty Name</option>
                        <?php foreach ($thirdpartyDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if($thirdpartyId == $row->id) { echo 'selected'; } ?>><?php echo $row->thirdparty_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Thirdparty Remarks</label>
                    <input name="thirdparty_remarks" id="thirdparty_remarks" readonly type="text" class="thirdpartyRemarks form-control" placeholder="Thirdparty Remarks" value="<?php echo $thirdpartyRemarks; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Thirdparty Loan Paid Date <span class="text-danger">*</span></label>
                    <input name="thirdparty_loan_date" id="thirdparty_loan_date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $thirdpartyLoanDate; ?>">
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Thirdparty Loan Amount <span class="text-danger">*</span></label>
                    <input name="thirdparty_loan_amount" id="thirdparty_loan_amount" type="text" class="form-control number-only" placeholder="Thirdparty Loan Amount" value="<?php echo $thirdpartyLoanAmount; ?>">
                </div>
                <div class="col-lg-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Remarks</label>
                    <textarea name="remarks" id="remarks" type="text" class="form-control" placeholder="Remarks" rows="3"><?php echo $remarks; ?></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.selectThirdpartyName').change(function () {
            var selectedThirdpartyName = $(this).val();
            if (selectedThirdpartyName !== '') {
                $.ajax({
                    url: "<?php echo base_url('master/getThirdpartyInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        thirdpartyName: selectedThirdpartyName
                    },
                    success: function (data) {
                        thirdpartyId = data[0].id;
                        thirdpartyRemarks = data[0].thirdpartyRemarks;
                        $('.thirdpartyId').val(thirdpartyId);
                        $('.thirdpartyRemarks').val(thirdpartyRemarks);
                    }
                });
            }
        });
    });

    // Thirdparty Loan Save Function
    $("#thirdpartyLoanForm").validate({
        rules: {
            thirdparty_name: {
                required: true
            },
            thirdparty_loan_date: {
                required: true
            },
            thirdparty_loan_amount: {
                required: true
            }
        },
        messages: {
            thirdparty_name: {
                required: "Please Select Thirdparty Name"
            },
            thirdparty_loan_date: {
                required: "Please Select Thirdparty Loan Date"
            },
            thirdparty_loan_amount: {
                required: "Please Enter Thirdparty Loan Amount"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#thirdpartyLoanForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>loan/thirdpartyLoanFormSave',
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
                            <?php if($thirdpartyId) { ?>
                                window.location.href = "<?php echo base_url() . 'loan/thirdparty-loan-view/' . $thirdpartyId; ?>";
                            <?php } else { ?>
                                window.location.href = "<?php echo base_url(); ?>loan/thirdparty-loan-list";
                            <?php } ?>
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>