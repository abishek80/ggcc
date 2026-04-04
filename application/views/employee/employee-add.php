<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="employeeForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>employee/employee-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>employee/employee-list" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="token" id="token" type="hidden" value="<?php echo $employeeToken; ?>">
            <input name="employee_id" id="employee_id" type="hidden" value="<?php echo $employeeId; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Code <span class="text-danger">*</span></label>
                    <input name="employee_code" id="employee_code" type="text" class="form-control generate_token" placeholder="Enter Employee Code" value="<?php echo $code; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Login Password <span class="text-danger">*</span></label>
                    <?php if(!empty($password)) { ?>
                        <input name="employee_password" id="employee_password" type="password" readonly class="form-control" placeholder="Enter Login Password" value="<?php echo $password?>">
                    <?php } else { ?>
                        <input name="employee_password" id="employee_password" type="text" class="form-control" placeholder="Enter Login Password" value="<?php echo $password?>">
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Permission <span class="text-danger">*</span></label>
                    <select name="employee_permission" id="employee_permission" class="form-select">
                        <option value="">Select Permission</option>
                        <option value="employee" <?php if($permission == 'employee') { echo 'selected'; } ?>>Employee</option>
                        <option value="attendance_management" <?php if($permission == 'attendance_management') { echo 'selected'; } ?>>Attendance Management</option>
                        <option value="complaint_management" <?php if($permission == 'complaint_management') { echo 'selected'; } ?>>Complaint Management</option>
                        <option value="vehicle_management" <?php if($permission == 'vehicle_management') { echo 'selected'; } ?>>Vehicle Management</option>
                        <option value="stock_management" <?php if($permission == 'stock_management') { echo 'selected'; } ?>>Stock Management</option>
                        <option value="purchase_management" <?php if($permission == 'purchase_management') { echo 'selected'; } ?>>Purchase Order Management</option>
                        <option value="account_management" <?php if($permission == 'account_management') { echo 'selected'; } ?>>Account Management</option>
                        <option value="employee_management" <?php if($permission == 'employee_management') { echo 'selected'; } ?>>Employee Management</option>
                        <option value="admin" <?php if($permission == 'admin') { echo 'selected'; } ?>>Admin</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Company Name <span class="text-danger">*</span></label>
                    <select name="company_name" id="company_name" class="form-select">
                        <option value="">Select Company Name</option>
                        <option value="ggcc" <?php if($companyName == 'ggcc') { echo 'selected'; } ?>>George General Const. Co.</option>
                        <option value="bright" <?php if($companyName == 'bright') { echo 'selected'; } ?>>Bright Electricals & Hardwares</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Payslip Location <span class="text-danger">*</span></label>
                    <select name="branch_location" id="branch_location" class="form-select">
                        <option value="">Select Payslip Location</option>
                        <option value="Mumbai" <?php if($branchLocation == 'Mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="Indore" <?php if($branchLocation == 'Indore') { echo 'selected'; } ?>>Indore</option>
                        <option value="Tamil Nadu" <?php if($branchLocation == 'Tamil Nadu') { echo 'selected'; } ?>>Tamil Nadu</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Zone <span class="text-danger">*</span></label>
                    <select name="employee_zone" id="employee_zone" class="form-select zone">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if($zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if($zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if($zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Branch <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-select branch select2">
                        <option value="">Select Branch</option>
                        <?php foreach ($branchDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                    <input name="employee_name" id="employee_name" type="text" class="form-control" placeholder="Enter Employee Name" value="<?php echo $name; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Email</label>
                    <input name="employee_email" id="employee_email" type="text" class="form-control" placeholder="Enter Employee Email" value="<?php echo $email; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Phone Number <span class="text-danger">*</span></label>
                    <input name="employee_number" id="employee_number" type="text" class="form-control number-only" placeholder="Enter Employee Phone Number" value="<?php echo $phoneNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Designation <span class="text-danger">*</span></label>
                    <select name="employee_designation" id="employee_designation" class="form-select select2">
                        <option value="">Select Designation</option>
                        <?php foreach ($designationDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->designation == $designation) { echo 'selected="true"'; } ?>><?php echo $row->designation; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Date of Joining <span class="text-danger">*</span></label>
                    <input name="doj" id="doj" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $doj; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Payslip Status <span class="text-danger">*</span></label>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <input name="payslip_status" id="payslip_yes" type="radio" value="yes" <?php if($payslipStatus == 'yes') { echo 'checked'; } ?>>
                            <label for="payslip_yes">Yes</label>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <input name="payslip_status" id="payslip_no" type="radio" value="no" <?php if($payslipStatus == 'no') { echo 'checked'; } ?>>
                            <label for="payslip_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Basic Pay <span class="text-danger">*</span></label>
                    <input name="basic_pay" id="basic_pay" type="text" class="form-control decimal" placeholder="Enter Salary Basic Pay" value="<?php echo $basicPay; ?>">
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Allowance Amount <span class="text-danger">*</span></label>
                    <input name="allowance_amount" id="allowance_amount" type="text" class="form-control decimal" placeholder="Enter Allowance Amount" value="<?php echo $allowanceAmount; ?>">
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Mobile Recharge <span class="text-danger">*</span></label>
                    <input name="mobile_recharge" id="mobile_recharge" type="text" class="form-control decimal" placeholder="Enter Mobile Recharge" value="<?php echo $mobileRecharge; ?>">
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">ESI Status <span class="text-danger">*</span></label>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <input name="esi_status" id="esi_yes" type="radio" value="yes" <?php if($esiStatus == 'yes') { echo 'checked'; } ?>>
                            <label for="esi_yes">Yes</label>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <input name="esi_status" id="esi_no" type="radio" value="no" <?php if($esiStatus == 'no') { echo 'checked'; } ?>>
                            <label for="esi_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">ESI Number <span class="text-danger">*</span></label>
                    <input name="esi_number" id="esi_number" type="text" class="form-control esiNumber" placeholder="Enter ESI Number" value="<?php echo $esiNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">PF Status <span class="text-danger">*</span></label>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2">
                            <input name="pf_status" id="pf_yes" type="radio" value="yes" <?php if($pfStatus == 'yes') { echo 'checked'; } ?>>
                            <label for="pf_yes">Yes</label>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <input name="pf_status" id="pf_no" type="radio" value="no" <?php if($pfStatus == 'no') { echo 'checked'; } ?>>
                            <label for="pf_no">No</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">PF Number <span class="text-danger">*</span></label>
                    <input name="pf_number" id="pf_number" type="text" class="form-control pfNumber" placeholder="Enter PF Number" value="<?php echo $pfNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6 payslipDetails d-none">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">PF Amount <span class="text-danger">*</span></label>
                    <input name="pf_amount" id="pf_amount" type="text" class="form-control pfAmount decimal" placeholder="Enter PF Amount" value="<?php echo $pfAmount; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">PAN Number <span class="text-danger">*</span></label>
                    <input name="pan_number" id="pan_number" type="text" class="form-control" placeholder="Enter PAN Number" value="<?php echo $panNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Aadhar Number <span class="text-danger">*</span></label>
                    <input name="aadhar_number" id="aadhar_number" type="text" class="form-control number-only" placeholder="Enter Aadhar Number" value="<?php echo $aadharNumber; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Aadharcard</label>
                        <?php if($aadharcard) { ?>
                            <a href="<?php echo base_url() . $aadharcard; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="employee_aadharcard" id="employee_aadharcard" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $aadharcard; ?>" name="alter_employee_aadharcard">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Pancard</label>
                        <?php if($pancard) { ?>
                            <a href="<?php echo base_url() . $pancard; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="employee_pancard" id="employee_pancard" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $pancard; ?>" name="alter_employee_pancard">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex justify-content-between">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Licence</label>
                        <?php if($licence) { ?>
                            <a href="<?php echo base_url() . $licence; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                        <?php } ?>
                    </div>
                    <input name="employee_licence" id="employee_licence" type="file" class="form-control">
                    <input type="hidden" value="<?php echo $licence; ?>" name="alter_employee_licence">
                </div>
                <h4 class="fw-bold text-gray mb-0 mt-4 pt-2">Bank Details</h4>
                <div class="col-12 pt-3 mt-3 border-top">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Account Number <span class="text-danger">*</span></label>
                            <input name="account_number" id="account_number" type="text" class="form-control number-only" placeholder="Enter Account Number" value="<?php echo $accountNumber; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">IFSC Code <span class="text-danger">*</span></label>
                            <input name="ifsc_code" id="ifsc_code" type="text" class="form-control" placeholder="Enter IFSC Code" value="<?php echo $ifscCode; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Bank Name <span class="text-danger">*</span></label>
                            <input name="bank_name" id="bank_name" type="text" class="form-control" placeholder="Enter Bank Name" value="<?php echo $bankName; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Bank Branch Name <span class="text-danger">*</span></label>
                            <input name="bank_branch_name" id="bank_branch_name" type="text" class="form-control" placeholder="Enter Bank Branch Name" value="<?php echo $bankBranchName; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="d-flex justify-content-between">
                                <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Bankbook Photo</label>
                                <?php if($bankbook) { ?>
                                    <a href="<?php echo base_url() . $bankbook; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                                <?php } ?>
                            </div>
                            <input name="employee_bankbook" id="employee_bankbook" type="file" class="form-control">
                            <input type="hidden" value="<?php echo $bankbook; ?>" name="alter_employee_bankbook">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="active" <?php if($status == 'active') { echo 'selected'; } ?>>Active</option>
                                <option value="inactive" <?php if($status == 'inactive') { echo 'selected'; } ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4 class="fw-bold text-gray mb-0 mt-4 pt-2">Personal Details</h4>
                <div class="col-12 pt-3 mt-3 border-top">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Date of Birth</label>
                            <input name="dob" id="dob" type="date" class="form-control date-picker" placeholder="YYYY - MM - DD" value="<?php echo $dob; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Education Qualification</label>
                            <input name="education" id="education" type="text" class="form-control" placeholder="Enter Education Qualification" value="<?php echo $employeeEducation; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="d-flex justify-content-between">
                                <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Photo</label>
                                <?php if($profile) { ?>
                                    <a href="<?php echo base_url() . $profile; ?>" class="iframe-popup"><i class="bx bx-show-alt"></i></a>
                                <?php } ?>
                            </div>
                            <input name="employee_profile" id="employee_profile" type="file" class="form-control">
                            <input type="hidden" value="<?php echo $profile; ?>" name="alter_employee_profile">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">House No</label>
                            <input name="house_no" id="house_no" type="text" class="form-control" placeholder="Enter House No" value="<?php echo $houseNo; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Street Name</label>
                            <input name="street" id="street" type="text" class="form-control" placeholder="Enter Street Name" value="<?php echo $street; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">City Name</label>
                            <input name="city" id="city" type="text" class="form-control" placeholder="Enter City Name" value="<?php echo $city; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">District Name</label>
                            <input name="district" id="district" type="text" class="form-control" placeholder="Enter District Name" value="<?php echo $district; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Pincode</label>
                            <input name="pincode" id="pincode" type="text" class="form-control number-only" placeholder="Enter Pincode" value="<?php echo $pincode; ?>">
                        </div>
                    </div>
                </div>
                <h4 class="fw-bold text-gray mb-0 mt-4 pt-2">Contact Details</h4>
                <div class="col-12 pt-3 mt-3 border-top">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Relative Type</label>
                            <input name="contact_relative" id="contact_relative" type="text" class="form-control" placeholder="Enter Relative Type" value="<?php echo $contactRelative; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Contact Person Name</label>
                            <input name="contact_name" id="contact_name" type="text" class="form-control" placeholder="Enter Contact Person Name" value="<?php echo $contactName; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Contact Person Phone Number</label>
                            <input name="contact_phone_number" id="contact_phone_number" type="text" class="form-control number-only" placeholder="Enter Contact Person Phone Number" value="<?php echo $contactPhoneNumber; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">House No</label>
                            <input name="contact_house_no" id="contact_house_no" type="text" class="form-control" placeholder="Enter House No" value="<?php echo $contactHouseNo; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Street Name</label>
                            <input name="contact_street" id="contact_street" type="text" class="form-control" placeholder="Enter Street Name" value="<?php echo $contactStreet; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">City Name</label>
                            <input name="contact_city" id="contact_city" type="text" class="form-control" placeholder="Enter City Name" value="<?php echo $contactCity; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">District Name</label>
                            <input name="contact_district" id="contact_district" type="text" class="form-control" placeholder="Enter District Name" value="<?php echo $contactDistrict; ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="w-100 fw-bold text-black mb-2 fs-14px">Pincode</label>
                            <input name="contact_pincode" id="contact_pincode" type="text" class="form-control number-only" placeholder="Enter Pincode" value="<?php echo $contactPincode; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).ready(function () {
        function togglePayslip() {
            let status = $('input[name="payslip_status"]:checked').val();
            if (status === 'yes') {
                $('.payslipDetails').addClass('d-block').removeClass('d-none');
            } else {
                $('.payslipDetails').addClass('d-none').removeClass('d-block');
            }
        }

        // Run on page load
        togglePayslip();

        // Run on clicking radio
        $('input[name="payslip_status"]').on('change', togglePayslip);
    });


    $(document).ready(function() {
        $('#esi_no').change(function() {
            $('.esiNumber').val('Not Applicable'); // Clear the input field
        });
        $('#pf_no').change(function() {
            $('.pfNumber').val('Not Applicable'); // Clear the input field
            $('.pfAmount').val('0'); // Clear the input field
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
    });
    
    // Employee Save Function
    $("#employeeForm").validate({
        rules: {
            employee_code: {
                required: true
            },
            employee_password: {
                required: true
            },
            employee_permission: {
                required: true
            },
            company_name: {
                required: true
            },
            employee_zone: {
                required: true
            },
            branch: {
                required: true
            },
            branch_location: {
                required: true
            },
            employee_name: {
                required: true
            },
            employee_number: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            employee_designation: {
                required: true
            },
            doj: {
                required: true
            },
            // house_no: {
            //     required: true
            // },
            // street: {
            //     required: true
            // },
            // city: {
            //     required: true
            // },
            // district: {
            //     required: true
            // },
            // pincode: {
            //     required: true
            // },
            // contact_name: {
            //     required: true
            // },
            // contact_relative: {
            //     required: true
            // },
            // contact_phone_number: {
            //     required: true
            // },
            // contact_house_no: {
            //     required: true
            // },
            // contact_street: {
            //     required: true
            // },
            // contact_city: {
            //     required: true
            // },
            // contact_district: {
            //     required: true
            // },
            // contact_pincode: {
            //     required: true
            // },
            payslip_status: {
                required: true
            },
            basic_pay: {
                required: true
            },
            allowance_amount: {
                required: true
            },
            pf_status: {
                required: true
            },
            esi_status: {
                required: true
            },
            esi_number: {
                required: true
            },
            pf_number: {
                required: true
            },
            pf_amount: {
                required: true
            },
            pan_number: {
                required: true
            },
            aadhar_number: {
                required: true
            },
            mobile_recharge: {
                required: true
            },
            bank_name: {
                required: true
            },
            // bank_branch_name: {
            //     required: true
            // },
            account_number: {
                required: true
            },
            ifsc_code: {
                required: true
            }
        },
        messages: {
            employee_code: {
                required: "Please Enter Employee Code"
            },
            employee_password: {
                required: "Please Enter Employee Password"
            },
            employee_permission: {
                required: "Please Select Employee Permission"
            },
            company_name: {
                required: "Please Select Company Name"
            },
            employee_zone: {
                required: "Please Select Employee Zone"
            },
            branch: {
                required: "Please Select Employee Branch"
            },
            branch_location: {
                required: "Please Enter Branch Location"
            },
            employee_name: {
                required: "Please Enter Employee Name"
            },
            employee_number: {
                required: "Please Enter Employee Phone Number"
            },
            employee_designation: {
                required: "Please Select Employee Designation"
            },
            doj: {
                required: "Please Enter Date of Joining"
            },
            // house_no: {
            //     required: "Please Enter House No"
            // },
            // street: {
            //     required: "Please Enter Street"
            // },
            // city: {
            //     required: "Please Enter City"
            // },
            // district: {
            //     required: "Please Enter District"
            // },
            // pincode: {
            //     required: "Please Enter Pincode"
            // },
            // contact_name: {
            //     required: "Please Enter Contact Name"
            // },
            // contact_relative: {
            //     required: "Please Enter Relative Type"
            // },
            // contact_phone_number: {
            //     required: "Please Enter Contact Phone Number"
            // },
            // contact_house_no: {
            //     required: "Please Enter Contact House No"
            // },
            // contact_street: {
            //     required: "Please Enter Contact Street"
            // },
            // contact_city: {
            //     required: "Please Enter Contact City"
            // },
            // contact_district: {
            //     required: "Please Enter Contact District"
            // },
            // contact_pincode: {
            //     required: "Please Enter Contact Pincode"
            // },
            payslip_status: {
                required: "Please Enter Payslip Status"
            },
            basic_pay: {
                required: "Please Enter Basic Pay"
            },
            allowance_amount: {
                required: "Please Enter Allowance Amount"
            },
            pf_status: {
                required: "Please Enter PF Status"
            },
            esi_status: {
                required: "Please Enter ESI Status"
            },
            esi_number: {
                required: "Please Enter ESI Number"
            },
            pf_number: {
                required: "Please Enter PF Number"
            },
            pf_amount: {
                required: "Please Enter PF Amount"
            },
            pan_number: {
                required: "Please Enter PAN Number"
            },
            aadhar_number: {
                required: "Please Enter Aadhar Number"
            },
            mobile_recharge: {
                required: "Please Enter Mobile Recharge Amount"
            },
            bank_name: {
                required: "Please Enter Bank Name"
            },
            // bank_branch_name: {
            //     required: "Please Enter Bank Branch Name"
            // },
            account_number: {
                required: "Please Enter Account Number"
            },
            ifsc_code: {
                required: "Please Enter IFSC Code"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#employeeForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>employee/employeeFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>employee/employee-list";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>