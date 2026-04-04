<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>themes/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>GGCC | Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>themes/images/fav-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/demo.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/toast.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/sweetalert.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/datatable/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/lightbox.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/dropzone.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/flatpickr.css">

    <script src="<?php echo base_url(); ?>themes/datatable/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/validate.js"></script>
</head>

<body>
    <div class="loader">
        <div class="spinner-border text-danger" role="status"></div>
        <img class="loader-img" src="<?php echo base_url(); ?>themes/images/fav-icon.png" alt="loader">
    </div>

    <section class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <form id="complaintForm" method="post" class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 sticky-head">
                    <h4 class="fw-bold mb-0 text-black">Add Complaint</h4>
                </div>
                <input name="complaint_id" id="complaint_id" type="hidden">
                <input name="outlet_id" id="outlet_id" type="hidden">
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
                            <label class="form-check-label" for="flexSwitchCheckChecked"> Outlet Data Already Have </label>
                        </div>
                    </div>
                    <div class="col-lg-4 newOutlet d-none">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                        <input name="outlet_name" id="outlet_name" type="text" class="inputClass form-control generate_token" placeholder="Enter Outlet Name">
                    </div>
                    <div class="col-lg-4 newOutlet d-none">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                        <input name="outlet_location" id="outlet_location" type="text" class="inputClass form-control" placeholder="Enter Outlet Location">
                    </div>
                    <div class="col-lg-4 newOutlet d-none">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name</label>
                        <input name="contact_name" id="contact_name" type="text" class="inputClass form-control" placeholder="Enter Outlet Contact Name">
                    </div>
                    <div class="col-lg-4 newOutlet d-none">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number</label>
                        <input name="contact_number" id="contact_number" type="text" class="inputClass form-control number-only" placeholder="Enter Outlet Contact Number">
                    </div>
                    <div class="col-lg-4 oldOutlet d-block">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                        <select name="outlet_id" id="outlet_id" class="form-select selectOutletName inputClass select2">
                            <option value="">Select Outlet Name</option>
                            <?php foreach ($outletDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->outlet_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 oldOutlet d-block">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Name <span class="text-danger">*</span></label>
                        <input name="old_outlet_name" id="outlet_name" type="text" readonly class="inputClass form-control outletName" placeholder="Outlet Name">
                    </div>
                    <div class="col-lg-4 oldOutlet d-block">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Location <span class="text-danger">*</span></label>
                        <input name="old_outlet_location" id="outlet_location" type="text" readonly class="inputClass form-control outletLocation" placeholder="Outlet Location">
                    </div>
                    <div class="col-lg-4 oldOutlet d-block">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Name</label>
                        <input name="old_contact_name" id="contact_name" type="text" readonly class="inputClass form-control contactName" placeholder="Outlet Contact Name">
                        <label class="mt-3 w-100 fw-bold text-black mb-2 fs-14px">Outlet Contact Number</label>
                        <input name="old_contact_number" id="contact_number" type="text" readonly class="inputClass form-control number-only contactNumber" placeholder="Outlet Contact Number">
                    </div>
                    <div class="col-lg-8">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" type="text" class="form-control" style="min-height: 120px;" placeholder="Description"></textarea>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="<?php echo base_url(); ?>complaint/complaint-list/not_started" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                            <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 text-center mt-3 mb-5">
            <a href="<?php echo base_url(); ?>login" class="btn btn-primary px-4 py-2 rounded border-0 fw-bold text-white">Go Login</a>
        </div>
    </section>
    
    <script>
        $(window).on('load', function() {
            $('.loader').hide();
        });

        // Only Numbers
        $(document).on("input", ".number-only", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });

        $(document).ready(function() {
            $('.branch').change(function () {
                var selectedBranch = $(this).val();
                var selectedOutletZone = $('.zone').val();
                if (selectedOutletZone !== '' && selectedBranch !== '') {
                    $.ajax({
                        url: "<?php echo base_url('login/selectEmployeeInchargeDropdown'); ?>",
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
                work_type: {
                    required: true
                },
                assign_to: {
                    required: true
                },
                outlet_id: {
                    required: true
                },
                outlet_name: {
                    required: true
                },
                outlet_location: {
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
                work_type: {
                    required: "Please Enter Work Type"
                },
                assign_to: {
                    required: "Please Select Assign To"
                },
                outlet_id: {
                    required: "Please Select Outlet Name"
                },
                outlet_name: {
                    required: "Please Enter Outlet Name"
                },
                outlet_location: {
                    required: "Please Enter Outlet Location"
                },
                description: {
                    required: "Please Enter Description"
                }
            },
            submitHandler: function (form) {
                var data = new FormData($('#complaintForm').get(0));
                $.ajax({
                    url: '<?php echo base_url(); ?>login/complaintFormSave',
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
                                window.location.href = "<?php echo base_url(); ?>login";
                            }, 1500);
                        }
                    }
                });
                return false;
            }
        });
        
        function oneClickSubmitBtn() {
            $('form').on('submit', function(event) {
                const submitButton = $(this).find('button[type="submit"]'); // Select the submit button within the form
                submitButton.prop('disabled', true); // Disable the button
                submitButton.text('Submitting...'); // Optional: Change button text
            });
        }
    </script>

    <script src="<?php echo base_url(); ?>themes/js/toastr.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jquery.sweet-alert.custom.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/lightbox-plus-jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/dropzone.js"></script>
    
    <script src="<?php echo base_url(); ?>themes/vendor/js/helpers.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/config.js"></script>
    <script src="<?php echo base_url(); ?>themes/datatable/js/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jquery.ajax.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/js/menu.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/main.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/ui-popover.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/lightbox.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/lightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/flatpickr.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/date-picker.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/html2pdf.min.js"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(".select2").select2({
            allowClear: true
        });
        $(".multiple.select2").select2({
            allowClear: true
        });

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
                        url: "<?php echo base_url('login/selectBranchDropdown'); ?>",
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
                        url: "<?php echo base_url('login/selectOutletDropdown'); ?>",
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
            });
            
            $('.selectOutletName').change(function () {
                var selectedoutletName = $(this).val();
                $('.outletName').val('');
                $('.outletLocation').val('');
                $('.contactName').val('');
                $('.contactNumber').val('');
                if (selectedoutletName !== '') {
                    $.ajax({
                        url: "<?php echo base_url('login/getDropdownOutletInfo'); ?>",
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
                }
            });
        });
    </script>
</body>

</html>