<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="stockreportForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'stock/month-stock-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url() . 'stock/month-stock-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="stockreport_id" id="stockreport_id" type="hidden" value="<?php echo $stockreportId; ?>">
            <div class="row g-3 justify-content-end">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Month <span class="text-danger">*</span></label>
                    <select name="month" id="month" class="form-select">
                        <option value="">Select Month</option>
                        <option value="january" <?php if($month == 'january') { echo 'selected'; } ?>>January</option>
                        <option value="february" <?php if($month == 'february') { echo 'selected'; } ?>>February</option>
                        <option value="march" <?php if($month == 'march') { echo 'selected'; } ?>>March</option>
                        <option value="april" <?php if($month == 'april') { echo 'selected'; } ?>>April</option>
                        <option value="may" <?php if($month == 'may') { echo 'selected'; } ?>>May</option>
                        <option value="june" <?php if($month == 'june') { echo 'selected'; } ?>>June</option>
                        <option value="july" <?php if($month == 'july') { echo 'selected'; } ?>>July</option>
                        <option value="august" <?php if($month == 'august') { echo 'selected'; } ?>>August</option>
                        <option value="september" <?php if($month == 'september') { echo 'selected'; } ?>>September</option>
                        <option value="october" <?php if($month == 'october') { echo 'selected'; } ?>>October</option>
                        <option value="november" <?php if($month == 'november') { echo 'selected'; } ?>>November</option>
                        <option value="december" <?php if($month == 'december') { echo 'selected'; } ?>>December</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Year <span class="text-danger">*</span></label>
                    <select name="year" id="year-dropdown" class="form-select"></select>
                </div>
            </div>
            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-75">S. No</th>
                                <th class="w-min-100">Material Code</th>
                                <th class="w-min-350">Material Name</th>
                                <th class="w-min-200">Material Category</th>
                                <th class="w-min-200">Material Type</th>
                                <th>Material Stock Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                foreach ($monthMaterialList as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->material_code; ?></td>
                                    <td><?php echo $row->material_name; ?></td>
                                    <td><?php echo $row->category; ?></td>
                                    <td><?php echo $row->type; ?></td>
                                    <td>
                                        <input name="material_id[]" id="material_id<?php echo $i; ?>" value="<?php echo $row->id; ?>" type="hidden">
                                        <input name="material_count[]" id="material_count<?php echo $i; ?>" type="text" class="form-control decimal" placeholder="Enter Material Count">
                                    </td>
                                </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    let dateDropdown = document.getElementById('year-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2024;

    while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }
    
    // Stock Report Save Function
    $("#stockreportForm").validate({
        rules: {
            month: {
                required: true
            },
            branch: {
                required: true
            }
        },
        messages: {
            month: {
                required: "Please Select Month",
            },
            branch: {
                required: "Please Enter Branch",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#stockreportForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>stock/stockreportFormSave',
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
                            window.location.href = "<?php echo base_url() . 'stock/month-stock-list/' . date('Y') . '/' . strtolower(date('F')); ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>