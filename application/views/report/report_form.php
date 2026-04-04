<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="reportForm" method="post">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <h4 class="fw-bold mb-0 text-black">Filter</h4>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>report" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                        <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Filter type <span class="text-danger">*</span></label>
                        <select name="filter_type" id="filter_type" class="form-select">
                            <option value="">Select Filter type</option>
                            <option value="complaint" <?php if($month == 'complaint') { echo 'selected'; } ?>>Complaint</option>
                            <option value="purchase_order" <?php if($month == 'purchase_order') { echo 'selected'; } ?>>Purchase_order</option>
                            <option value="estimation" <?php if($month == 'estimation') { echo 'selected'; } ?>>Estimation</option>
                            <option value="taxinvoice" <?php if($month == 'taxinvoice') { echo 'selected'; } ?>>Taxinvoice</option>
                            <option value="retention" <?php if($month == 'retention') { echo 'selected'; } ?>>Retention</option>
                            <option value="vehicle" <?php if($month == 'vehicle') { echo 'selected'; } ?>>Vehicle</option>
                            <option value="outlet" <?php if($month == 'outlet') { echo 'selected'; } ?>>Outlet</option>
                            <option value="party_payment" <?php if($month == 'party_payment') { echo 'selected'; } ?>>Party_payment</option>
                            <option value="vehicle_fuel" <?php if($month == 'vehicle_fuel') { echo 'selected'; } ?>>Vehicle_fuel</option>
                            <option value="stock" <?php if($month == 'stock') { echo 'selected'; } ?>>Stock</option>
                            <option value="shipping" <?php if($month == 'shipping') { echo 'selected'; } ?>>Shipping</option>
                            <option value="thirdparty" <?php if($month == 'thirdparty') { echo 'selected'; } ?>>Thirdparty</option>
                            <option value="employee" <?php if($month == 'employee') { echo 'selected'; } ?>>Employee</option>
                            <option value="employee_loan" <?php if($month == 'employee_loan') { echo 'selected'; } ?>>Employee_loan</option>
                            <option value="leave" <?php if($month == 'leave') { echo 'selected'; } ?>>Leave</option>
                            <option value="advancecash" <?php if($month == 'advancecash') { echo 'selected'; } ?>>Advancecash</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Year <span class="text-danger">*</span></label>
                        <select name="year" id="year" class="form-select">
                            <option value="2025" <?php if($year == '2025') { echo 'selected'; } ?>>2025</option>
                            <option value="2026" <?php if($year == '2026') { echo 'selected'; } ?>>2026</option>
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
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Zone <span class="text-danger">*</span></label>
                        <select name="zone" id="zone" class="form-select zone">
                            <option value="">Select Zone</option>
                            <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                            <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                            <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                        <select name="branch" id="branch" class="form-select branch select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->branchId; ?>"><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Form Date <span class="text-danger">*</span></label>
                        <input name="from_date" id="from_date" type="date" class="form-control date-picker fromDate" placeholder="YYYY - MM - DD" value="<?php echo $fromDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">To Date <span class="text-danger">*</span></label>
                        <input name="to_date" id="to_date" type="date" class="form-control date-picker toDate" placeholder="YYYY - MM - DD" value="<?php echo $toDate; ?>">
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                        <select name="employee_name" id="employee_name" class="form-select selectEmployeeName select2">
                            <option value="">Select Employee Name</option>
                            <?php foreach ($employeeDropdown as $row) { ?>
                                <option value="<?php echo $row->employeeId; ?>"><?php echo $row->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Category <span class="text-danger">*</span></label>
                        <select name="work_type" id="work_type" class="form-select">
                            <option value="">Select Work Category</option>
                            <option value="maintenance" <?php if($workCategory == 'maintenance') { echo 'selected'; } ?>>Maintenance</option>
                            <option value="earth_renewal" <?php if($workCategory == 'earth_renewal') { echo 'selected'; } ?>>Earth Renewal</option>
                            <option value="project_work" <?php if($workCategory == 'project_work') { echo 'selected'; } ?>>Project Work</option>
                            <option value="private_work" <?php if($workCategory == 'private_work') { echo 'selected'; } ?>>Private Work</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                        <select name="outlet_id" id="outlet_id" class="form-select select2">
                            <option value="">Select Outlet Name</option>
                            <?php foreach ($outletDropdown as $row) { ?>
                                <option value="<?php echo $row->outletId; ?>"><?php echo $row->outlet_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Complaint Status <span class="text-danger">*</span></label>
                        <select name="complaint_status" id="complaint_status" class="form-select">
                            <option value="not_started" <?php if($complaintStatus == 'not_started') { echo 'selected'; } ?>>Not Started</option>
                            <option value="inprogress" <?php if($complaintStatus == 'inprogress') { echo 'selected'; } ?>>Inprogress</option>
                            <option value="completed" <?php if($complaintStatus == 'completed') { echo 'selected'; } ?>>Completed</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                            <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    let dateDropdown = document.getElementById('year');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2024;

    while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }

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

    
    // Save Party Payment Form
    $("#PartyPaymentForm").validate({
        rules: {
            purchase_zone: {
                required: true
            },
            purchase_date: {
                required: true
            },
            purchase_vlaidityend_date: {
                required: true
            },
            purchase_number: {
                required: true
            },
            purchase_amount: {
                required: true
            }
        },
        messages: {
            purchase_zone: {
                required: "Please Enter Bill Zone",
            },
            purchase_date: {
                required: "Please Select Bill Date",
            },
            purchase_vlaidityend_date: {
                required: "Please Select Bill Validity End Date",
            },
            purchase_number: {
                required: "Please Enter Bill Number",
            },
            purchase_amount: {
                required: "Please Enter Bill Amount",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#PartyPaymentForm').get(0));

            $.ajax({
                url: '<?php echo base_url(); ?>bill/partyPaymentSaveForm',
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
                        'showDuration': '300',
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
                            window.location.href = "<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>