<?php $userPermission = json_decode($this->session->userdata('permission'), true); ?>

<div class="p-4 bg-white a4-size downloadPayslipPage">
    <div class="border rounded-3 border-dark">
        <div class="p-2 m-1">
            <?php if($companyName == 'ggcc') { ?>
                <div class="row g-4 border-bottom mb-3 px-4 py-3 border-dark">
                    <img class="w-100 mb-0" src="<?php echo base_url(); ?>themes/images/ggcc-letter-pad.png" alt="ggcc letter pad">
                </div>
            <?php } elseif ($companyName == 'bright') { ?>
                <div class="row g-4 border-bottom mb-3 px-4 py-3 border-dark">
                    <img class="w-100 mb-0" src="<?php echo base_url(); ?>themes/images/bright-letter-pad.png" alt="bright letter pad">
                </div>
            <?php } ?>
            <div class="row g-4 border-bottom border-dark mb-3 pb-3">
                <h4 class="text-center mb-0 fw-semibold text-capitalize"><?php echo $payslipMonth . ' ' . $payslipYear; ?> - Payslip</h4>
            </div>
            <div class="row g-4 border-bottom border-dark mb-3 pb-3">
                <div class="col-6 border-end-dark pe-4">
                    <div class="row g-1">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Employee Id</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeId; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Joining Date</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php $dateFormat = new DateTime($joiningDate); echo $dateFormat->format('d - m - Y'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Bank Name</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeBank_name; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Account Number</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeAccountNumber; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">IFSC Code</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeIfscCode; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">PAN Number</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeePanNumber; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">ESI Number</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeEsiNumber; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">PF Number</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeePfNumber; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 ps-4">
                    <div class="row g-1">
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Name</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeName; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Designation</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeDesignation; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Department</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span>Electrical Department</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Branch</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeBranch; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Payable Days</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeePayableDays; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Present Days</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeePresentDays; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">Absent Days</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeAbsentDays; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                <div class="col-6">
                                    <p class="mb-1 fs-13px text-black fw-semibold">OT Days</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-0 fs-13px text-black fw-semibold text-capitalize"><span class="me-2"> : </span><?php echo $employeeOtDays; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 border-bottom border-dark mb-2 pb-3">
                <div class="col-6 pe-4 border-end-dark">
                    <div class="row g-3 border-bottom border-dark mb-3 pb-3">
                        <div class="col-6">
                            <h6 class="mb-0 text-black fs-14px fw-bold">Earnings</h6>
                        </div>
                        <div class="col-3 text-end">
                            <h6 class="mb-0 text-black fs-14px fw-bold">Actuals</h6>
                        </div>
                        <div class="col-3 text-end">
                            <h6 class="mb-0 text-black fs-14px fw-bold">Earned</h6>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-6">
                            <p class="mb-0 text-black fs-13px fw-semibold">Basic Pay</p>
                        </div>
                        <div class="col-3 text-end">
                            <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $basicPay; ?></p>
                        </div>
                        <div class="col-3 text-end">
                            <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $presentBasicePay; ?></p>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-6">
                            <p class="mb-0 text-black fs-13px fw-semibold">Allowance</p>
                        </div>
                        <div class="col-3 text-end">
                            <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $allowanceAmount; ?></p>
                        </div>
                        <div class="col-3 text-end">
                            <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $presentAllowanceAmount; ?></p>
                        </div>
                    </div>
                    <?php if($overtimePay > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Overtime Pay</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $overtimePay; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($mobileRecharge > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Mobile Recharge</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $mobileRecharge; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($incentiveAmount > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Incentive Amount</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $incentiveAmount; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($travellingAmount > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Travelling Amount</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $travellingAmount; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($foodExpenses > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Food Expenses Amount</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $foodExpenses; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-6 ps-4">
                    <div class="row g-3 border-bottom border-dark mb-3 pb-3">
                        <div class="col-9">
                            <h6 class="mb-0 text-black fs-14px fw-bold">Deductions</h6>
                        </div>
                        <div class="col-3 text-end">
                            <h6 class="mb-0 text-black fs-14px fw-bold">Amount</h6>
                        </div>
                    </div>
                    <?php if($pfAmount > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Provident Fund (<?php echo $basicPfAmount?> * 12%)</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $pfAmount; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($esiAmount > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Employee State Insurance (0.75%)</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $esiAmount; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($professionalTax > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Professional Tax</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $professionalTax; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($advanceCash > 0) { ?>
                        <div class="row g-3 mb-2">
                            <div class="col-9">
                                <p class="mb-0 text-black fs-13px fw-semibold">Adavnce In Cash</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $advanceCash; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row g-4 border-bottom border-dark mb-3 pb-2">
                <div class="col-6 border-end-dark pe-4">
                    <div class="d-flex justify-content-between align-items-end">
                        <div><p class="mb-0 text-black fs-13px fw-semibold text-capitalize">Total Earning Amount</p></div>
                        <div><p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $totalEarning; ?></p></div>
                    </div>
                </div>
                <div class="col-6 ps-4">
                    <div class="d-flex justify-content-between align-items-end">
                        <div><p class="mb-0 text-black fs-13px fw-semibold text-capitalize">Total Deduction Amount</p></div>
                        <div><p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $deductionAmount; ?></p></div>
                    </div>
                </div>
            </div>
            <div class="row g-4 border-bottom border-dark mb-2 pb-3 align-items-center">
                <div class="col-6 border-end-dark pe-4">
                    <p class="mb-0 text-black fs-13px fw-semibold text-capitalize"><?php echo $salaryInWord; ?></p>
                </div>
                <div class="col-6 ps-4">
                    <div class="d-flex justify-content-end gap-4 align-items-end">
                        <div><p class="mb-0 text-black fs-14px fw-semibold text-capitalize">Total Amount</p></div>
                        <div><p class="mb-0 text-black fs-14px fw-semibold text-capitalize"><?php echo $salaryAmount; ?></p></div>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-end me-2">
                <?php if($companyName == 'ggcc') { ?>
                    <img class="sign-img" src="<?php echo base_url(); ?>themes/images/ggcc-signature.png" alt="digital signature">
                <?php } elseif ($companyName == 'bright') { ?>
                    <img class="sign-img" src="<?php echo base_url(); ?>themes/images/bright-signature.png" alt="digital signature">
                <?php } ?>
                <p class="mt-2 mb-2 fs-14px fw-semibold text-black">Employer's / Authorized Signature</p>
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-3 justify-content-center removePrint my-3">
    <a href="javascript:void(0);" id="downloadPayslipPDF" class="btn btn-success">Download</a>
    <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
        <a href="javascript:window.print();" class="btn btn-primary">Print</a>
        <a href="javascript:void(0);" data-rowid="<?php echo $payslipId; ?>" data-tablename="employee_payslip" data-link="<?php echo base_url() . 'employee/payslip-list/' . $payslipYear; ?>" class="btn btn-danger trashItem">Delete</a>
    <?php } ?>
</div>

<script>
    document.getElementById("downloadPayslipPDF").addEventListener("click", function () {
        // Select the div you want to download as PDF
        var element = document.querySelector('.downloadPayslipPage');
        
        // Use html2pdf to download it
        var employeeName = "<?php echo $employeeName . ' - ' . $payslipMonth . ' ' . $payslipYear .' payslip'; ?>"; // Get PHP variable in JavaScript
        var fileName = employeeName + '.pdf'; // Concatenate the filename
        
        html2pdf(element, {
            margin:       0,        // Margins in cm
            filename:     fileName,  // Use the concatenated filename
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },      // Increase canvas resolution
            jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' }
        });
    });
</script>