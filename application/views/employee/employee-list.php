<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>employee/employee-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>employee/employee-list/active" class="<?php echo ($activeLink == 'active') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Active</a>
            <a href="<?php echo base_url(); ?>employee/employee-list/inactive" class="<?php echo ($activeLink == 'inactive') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Inactive</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Employee List</h4>
                <a href="<?php echo base_url(); ?>employee/employee-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Employee</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th class="w-min-40">S. No</th>
                        <th>Employee Code</th>
                        <th>Zone & Branch Name</th>
                        <th>Employee Name & Designation</th>
                        <th>Number & Email</th>
                        <th>status</th>
                        <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($employeeList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->employee_code; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->zone; ?></p>
                                <p class="mb-0"><?php echo $row->branch_name; ?></p>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div>
                                        <?php if($row->profile_img) { ?>
                                            <img src="<?php echo base_url() . $row->profile_img; ?>" class="w-px-40 h-auto rounded-3" alt="profile image">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() . 'themes/images/avatar.png'; ?>" class="w-px-40 h-auto rounded-3" alt="profile image">
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <p class="mb-1"><?php echo $row->employee_name; ?></p>
                                        <p class="mb-0"><?php echo $row->designation; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-1"><a href="tel:<?php echo $row->mobile_number; ?>" class="a-hover"><?php echo $row->mobile_number; ?></a></p>
                                <p class="mb-0"><a href="mailto:<?php echo $row->email; ?>" class="a-hover text-lowercase"><?php echo $row->email; ?></a></p>
                            </td>
                            <td>
                                <?php if($row->status == 'active') { ?>
                                    <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-link="<?php echo base_url(); ?>employee/employee-list" class="text-success changeAllEmployeeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                <?php } elseif($row->status == 'inactive') { ?>
                                    <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-link="<?php echo base_url(); ?>employee/employee-list" class="text-danger changeAllEmployeeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                <?php } ?>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getemployeeId" data-employeeid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'employee/employee-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="employee" data-link="<?php echo base_url(); ?>employee/employee-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="view_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="headingTitle"></div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 pe-lg-4 col-md-3 col-sm-6 employeeProfile">
                        <div id="employeeProfile" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Employee Code & Company Name</label>
                        <div id="employeeCode" class="mb-1 text-capitalize text-black"></div>
                        <div id="companyName" class="text-capitalize text-black"></div>
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="zone" class="text-capitalize text-black"></div>
                        <div id="branch" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Name & Designation</label>
                        <div id="employeeName" class="text-capitalize text-black"></div>
                        <div id="employeeDesignation" class="mt-1 text-capitalize text-black"></div>
                        <label class="w-100 fw-bold text-black mb-1">Mobile Number & Email</label>
                        <div id="employeeNumber" class="text-capitalize text-black"></div>
                        <div id="employeeEmail" class="text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Employee Address</label>
                        <div id="employeeHouseNo" class="text-capitalize text-black"></div>
                        <div id="employeeStreet" class="text-capitalize text-black"></div>
                        <div id="employeeCity" class="text-capitalize text-black"></div>
                        <div class="d-flex gap-2">
                            <div id="employeeDistrict" class="text-capitalize text-black"></div>
                            <div>-</div>
                            <div id="employeePincode" class="text-capitalize text-black"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Education Qualification</label>
                        <div id="employeeEducation" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Date of Birth</label>
                        <div id="dob" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Pancard Number</label>
                        <div id="panNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Aadharcard Number</label>
                        <div id="aadharNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeAadharcard">
                        <label class="w-100 fw-bold text-black mb-1">Employee Aadharcard</label>
                        <div id="employeeAadharcard" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeePancard">
                        <label class="w-100 fw-bold text-black mb-1">Employee Pancard</label>
                        <div id="employeePancard" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeLicence">
                        <label class="w-100 fw-bold text-black mb-1">Employee Licence</label>
                        <div id="employeeLicence" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 licenceNumber">
                        <label class="w-100 fw-bold text-black mb-1">Licence Number</label>
                        <div id="licenceNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 electricalLicence">
                        <label class="w-100 fw-bold text-black mb-1">Electrical Licence</label>
                        <div id="electricalLicence" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeElectricalLicence">
                        <label class="w-100 fw-bold text-black mb-1">Electrical Licence File</label>
                        <div id="employeeElectricalLicence" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12">
                        <div class="border-top"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Date of Joining</label>
                        <div id="doj" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Salary Basic Pay</label>
                        <div id="basicPay" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Allowance Amount</label>
                        <div id="allowanceAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Mobile Recharge</label>
                        <div id="mobileRecharge" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">ESI Number</label>
                        <div id="esiNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PF Number</label>
                        <div id="pfNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">PF Amount</label>
                        <div id="pfAmount" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bank Name</label>
                        <div id="bankName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Bank Branch Name</label>
                        <div id="bankBranchName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Account Number</label>
                        <div id="accountNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">IFSC Code</label>
                        <div id="ifscCode" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeBankbook">
                        <label class="w-100 fw-bold text-black mb-1">Employee Bankbook</label>
                        <div id="employeeBankbook" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12">
                        <div class="border-top"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeContactName">
                        <label class="w-100 fw-bold text-black mb-1">Contact Name</label>
                        <div id="employeeContactName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeRelativeType">
                        <label class="w-100 fw-bold text-black mb-1">Relative Type</label>
                        <div id="employeeRelativeType" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 employeeContactNumber">
                        <label class="w-100 fw-bold text-black mb-1">Contact Mobile Number</label>
                        <div id="employeeContactNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div></div>
                        <label class="w-100 fw-bold text-black mb-1">Contact Person Address</label>
                        <div id="contactHouseNo" class="text-capitalize text-black"></div>
                        <div id="contactStreet" class="text-capitalize text-black"></div>
                        <div id="contactCity" class="text-capitalize text-black"></div>
                        <div class="d-flex gap-2">
                            <div id="contactDistrict" class="text-capitalize text-black"></div>
                            <div>-</div>
                            <div id="contactPincode" class="text-capitalize text-black"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By & Employee Status</label>
                        <div class="d-flex gap-3">
                            <div id="createdBy" class="text-capitalize text-black"></div>
                            <div>-</div>
                            <div id="status" class="text-capitalize text-black"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created At</label>
                        <div id="createdAt" class="text-capitalize text-black"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getemployeeId", function(e){
        var employeeId = $(this).data("employeeid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>employee/getEmployeeDetail',
            dataType: "json",
            data: {employeeId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.employeeName + ' Details</h5>');
                $('#employeeCode').html(data.employeeCode);
                $('#companyName').html(data.companyName + " - " + data.branchLocation);
                $('#zone').html(data.zone);
                $('#branch').html(data.branchName);
                $('#employeeName').html(data.employeeName);
                $('#employeeNumber').html('<a href="tel:' + data.employeeNumber + '" class="a-hover">' + data.employeeNumber + '</a>');
                $('#employeeEmail').html('<a href="mailto:' + data.employeeEmail + '" class="a-hover">' + data.employeeEmail + '</a>');
                $('#employeeDesignation').html(data.employeeDesignation);
                $('#employeeEducation').html(data.employeeEducation);
                $('#employeeHouseNo').html(data.employeeHouseNo);
                $('#dob').html(data.dob);
                $('#doj').html(data.doj);
                $('#employeeStreet').html(data.employeeStreet);
                $('#employeeCity').html(data.employeeCity);
                $('#employeeDistrict').html(data.employeeDistrict);
                $('#employeePincode').html(data.employeePincode);
                
                if (data.employeeProfile) {
                    $('#employeeProfile').html('<img src="' + '<?php echo base_url(); ?>' + data.employeeProfile + '" class="w-100 rounded-3">');
                    $('.employeeProfile').removeClass('d-none');
                } else {
                    $('.employeeProfile').addClass('d-none');
                }
                
                if (data.employeeAadharcard) {
                    $('#employeeAadharcard').html('<a href="' + '<?php echo base_url(); ?>' + data.employeeAadharcard + '" target="_blank" class="doc-hover">View Aadharcard</a>');
                    $('.employeeAadharcard').removeClass('d-none');
                } else {
                    $('.employeeAadharcard').addClass('d-none');
                }
                
                if (data.employeePancard) {
                    $('#employeePancard').html('<a href="' + '<?php echo base_url(); ?>' + data.employeePancard + '" target="_blank" class="doc-hover">View Pancard</a>');
                    $('.employeePancard').removeClass('d-none');
                } else {
                    $('.employeePancard').addClass('d-none');
                }
                
                if (data.employeeBankbook) {
                    $('#employeeBankbook').html('<a href="' + '<?php echo base_url(); ?>' + data.employeeBankbook + '" target="_blank" class="doc-hover">View Bankbook</a>');
                    $('.employeeBankbook').removeClass('d-none');
                } else {
                    $('.employeeBankbook').addClass('d-none');
                }
                
                if (data.employeeLicence) {
                    $('#employeeLicence').html('<a href="' + '<?php echo base_url(); ?>' + data.employeeLicence + '" target="_blank" class="doc-hover">View Licence</a>');
                    $('.employeeLicence').removeClass('d-none');
                } else {
                    $('.employeeLicence').addClass('d-none');
                }
                
                if (data.licenceNumber) {
                    $('#licenceNumber').html(data.licenceNumber);
                    $('.licenceNumber').removeClass('d-none');
                } else {
                    $('.licenceNumber').addClass('d-none');
                }
                
                if (data.electricalLicence) {
                    $('#electricalLicence').html(data.electricalLicence);
                    $('.electricalLicence').removeClass('d-none');
                } else {
                    $('.electricalLicence').addClass('d-none');
                }
                
                if (data.electricalLicenceImg) {
                    $('#employeeElectricalLicence').html('<a href="' + '<?php echo base_url(); ?>' + data.electricalLicenceImg + '" target="_blank" class="doc-hover">View Electrical Licence</a>');
                    $('.employeeElectricalLicence').removeClass('d-none');
                } else {
                    $('.employeeElectricalLicence').addClass('d-none');
                }
                
                if (data.employeeContactName) {
                    $('#employeeContactName').html(data.employeeContactName);
                    $('.employeeContactName').removeClass('d-none');
                } else {
                    $('.employeeContactName').addClass('d-none');
                }
                
                if (data.employeeRelativeType) {
                    $('#employeeRelativeType').html(data.employeeRelativeType);
                    $('.employeeRelativeType').removeClass('d-none');
                } else {
                    $('.employeeRelativeType').addClass('d-none');
                }
                
                if (data.employeeContactNumber) {
                    $('#employeeContactNumber').html('<a href="tel:' + data.employeeContactNumber + '" class="a-hover">' + data.employeeContactNumber + '</a>');
                    $('.employeeContactNumber').removeClass('d-none');
                } else {
                    $('.employeeContactNumber').addClass('d-none');
                }

                $('#contactHouseNo').html(data.contactHouseNo);
                $('#contactStreet').html(data.contactStreet);
                $('#contactCity').html(data.contactCity);
                $('#contactDistrict').html(data.contactDistrict);
                $('#contactPincode').html(data.contactPincode);
                $('#basicPay').html(data.basicPay);
                $('#allowanceAmount').html(data.allowanceAmount);
                $('#esiNumber').html(data.esiNumber);
                $('#pfNumber').html(data.pfNumber);
                $('#panNumber').html(data.panNumber);
                $('#aadharNumber').html(data.aadharNumber);
                $('#mobileRecharge').html(data.mobileRecharge);
                $('#pfAmount').html(data.pfAmount);
                $('#bankName').html(data.bankName);
                $('#bankBranchName').html(data.bankBranchName);
                $('#accountNumber').html(data.accountNumber);
                $('#ifscCode').html(data.ifscCode);
                $('#status').html(data.status);
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);
            }
        });
        e.preventDefault();
        return false;
    });
</script>