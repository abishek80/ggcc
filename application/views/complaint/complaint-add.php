<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="complaintForm" method="post" class="card px-lg-4 px-3 pb-lg-4 pb-3">
            <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="complaint_id" id="complaint_id" type="hidden">
            <input name="token" id="token" type="hidden">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date <span class="text-danger">*</span></label>
                    <input name="date" id="date" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai">Chennai</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="indore">Indore</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Complaint Givener Name <span class="text-danger">*</span></label>
                    <input name="complainter_name" id="complainter_name" type="text" class="form-control" placeholder="Complaint Givener Name">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Complaint Givener Mobile Number <span class="text-danger">*</span></label>
                    <input name="complainter_number" id="complainter_number" type="text" class="form-control number-only" placeholder="Complaint Givener Mobile Number">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Category <span class="text-danger">*</span></label>
                    <select name="work_type" id="work_type" class="form-select">
                        <option value="">Select Work Category</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="earth_renewal">Earth Renewal</option>
                        <option value="project_work">Project Work</option>
                        <option value="private_work">Private Work</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Assign To <span class="text-danger">*</span></label>
                    <select name="assign_to" id="assign_to" class="form-select selectEmployeeName select2">
                        <option value="">Select Employee Name</option>
                    </select>
                </div>
                <div class="col-lg-12 border-top pt-4 mt-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input alreadyExists" type="checkbox" id="flexSwitchCheckChecked" name="already_exists" />
                        <label class="form-check-label" for="flexSwitchCheckChecked"> Enter New Outlet Detail </label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 newOutlet d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                    <input name="outlet_name" id="outlet_name" type="text" class="inputClass form-control generate_token" placeholder="Enter Outlet Name">
                </div>
                <div class="col-lg-4 col-md-6 newOutlet d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                    <input name="outlet_location" id="outlet_location" type="text" class="inputClass form-control" placeholder="Enter Outlet Location">
                </div>
                <div class="col-lg-4 col-md-6 newOutlet d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name</label>
                    <input name="contact_name" id="contact_name" type="text" class="inputClass form-control" placeholder="Enter Outlet Contact Name">
                </div>
                <div class="col-lg-4 col-md-6 newOutlet d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number</label>
                    <input name="contact_number" id="contact_number" type="text" class="inputClass number-only form-control" placeholder="Enter Outlet Contact Number">
                </div>
                <div class="col-lg-4 col-md-6 oldOutlet d-block">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                    <select name="outlet_id" id="outlet_id" class="form-select selectOutletName inputClass select2">
                        <option value="">Select Outlet Name</option>
                        <?php foreach ($outletDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->outlet_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6 oldOutlet d-block">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                    <input name="old_outlet_name" id="outlet_name" type="text" readonly class="inputClass form-control outletName" placeholder="Outlet Name">
                </div>
                <div class="col-lg-4 col-md-6 oldOutlet d-block">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                    <input name="old_outlet_location" id="outlet_location" type="text" readonly class="inputClass form-control outletLocation" placeholder="Outlet Location">
                </div>
                <div class="col-lg-4 col-md-6 oldOutlet d-block">
                    <div class="mb-2">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name</label>
                        <input name="old_contact_name" id="contact_name" type="text" readonly class="inputClass form-control contactName" placeholder="Outlet Contact Name">
                    </div>
                    <div>
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number</label>
                        <input name="old_contact_number" id="contact_number" type="text" readonly class="inputClass number-only form-control contactNumber" placeholder="Outlet Contact Number">
                    </div>
                </div>
                <div class="col-lg-8">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" type="text" class="form-control" style="min-height: 120px;" placeholder="Description"></textarea>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.alreadyExists').on('click', function() {
            if ($(this).prop('checked')) {
                $('.newOutlet').removeClass('d-none');
                $('.newOutlet').addClass('d-block');

                $('.oldOutlet').removeClass('d-block');
                $('.oldOutlet').addClass('d-none');

                // Reset input values for input fields within the specified class
                $('.newOutlet .inputClass').val('');
            } else {
                $('.newOutlet').addClass('d-none');
                $('.newOutlet').removeClass('d-block');

                $('.oldOutlet').addClass('d-block');
                $('.oldOutlet').removeClass('d-none');

                // Reset input values for input fields within the specified class
                $('.oldOutlet .inputClass').val('');
            }
        });

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
        
        $('.branch').change(function () {
            var selectedBranch = $(this).val();
            var selectedOutletZone = $('.zone').val();
            if (selectedOutletZone !== '' && selectedBranch !== '') {
                $.ajax({
                    url: "<?php echo base_url('outlet/selectOutletDropdown'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        zone: selectedOutletZone,
                        branch: selectedBranch
                    },
                    success: function (data) {
                        var selectElement = document.querySelector('.selectOutletName');
                        selectElement.innerHTML = '<option value="">Select Outlet Name</option>';
                        data.forEach(function (item) {
                            var option = document.createElement('option');
                            option.textContent = item.outlet_name;
                            option.value = item.id;
                            selectElement.appendChild(option);
                        });
                    }
                });
            }
            
            if (selectedOutletZone !== '' && selectedBranch !== '') {
                $.ajax({
                    url: "<?php echo base_url('master/selectEmployeeInchargeDropdown'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        zone: selectedOutletZone,
                        branch: selectedBranch
                    },
                    success: function (data) {
                        var selectElement = document.querySelector('.selectEmployeeName');
                        selectElement.innerHTML = '<option value="">Select Employee Name</option>';
                        data.forEach(function (item) {
                            var option = document.createElement('option');
                            option.textContent = item.employee_name;
                            option.value = item.employee_name;
                            selectElement.appendChild(option);
                        });
                    }
                });
            }
        });
        
        $('.selectOutletName').change(function () {
            var selectedoutletName = $(this).val();
            if (selectedoutletName !== '') {
                $.ajax({
                    url: "<?php echo base_url('outlet/getDropdownOutletInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        outletName: selectedoutletName
                    },
                    success: function (data) {
                        var inputElement = document.querySelector('.outletName');
                        inputElement.value = data[0].outlet_name;
                        var inputElement = document.querySelector('.outletLocation');
                        inputElement.value = data[0].outlet_location;
                        var inputElement = document.querySelector('.contactName');
                        inputElement.value = data[0].contact_name;
                        var inputElement = document.querySelector('.contactNumber');
                        inputElement.value = data[0].contact_number;
                    }
                });
            } else {
                $('.outletName').val('');
                $('.outletLocation').val('');
                $('.contactName').val('');
                $('.contactNumber').val('');
            }
        });
    });
    
    // Complaint Save Function
    $("#complaintForm").validate({
        rules: {
            zone: {
                required: true
            },
            branch: {
                required: true
            },
            date: {
                required: true
            },
            complainter_name: {
                required: true
            },
            complainter_number: {
                required: true
            },
            outlet_name: {
                required: true
            },
            outlet_location: {
                required: true
            },
            work_type: {
                required: true
            },
            assign_to: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            zone: {
                required: "Please Select Branch Zone"
            },
            branch: {
                required: "Please Select Branch Name"
            },
            date: {
                required: "Please Select Date"
            },
            complainter_name: {
                required: "Please Enter Complainer Givener Name"
            },
            complainter_number: {
                required: "Please Enter Complainer Givener Number"
            },
            outlet_name: {
                required: "Please Enter Outlet Name"
            },
            outlet_location: {
                required: "Please Enter Outlet Location"
            },
            work_type: {
                required: "Please Enter Work Type"
            },
            assign_to: {
                required: "Please Select Employee"
            },
            description: {
                required: "Please Enter Description"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#complaintForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>complaint/complaintFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>complaint/complaint-list/not_started";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>