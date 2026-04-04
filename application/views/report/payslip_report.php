<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="<?php echo base_url(); ?>report/payslip-report" method="get">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <h4 class="fw-bold mb-0 text-black">Payslip Report</h4>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>report/payslip-report" class="btn btn-secondary px-4 py-2 rounded border-0 fw-bold text-white">Reset</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded border-0 fw-bold reportSubmit text-white">Filter</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Year <span class="text-danger">*</span></label>
                        <select name="year" id="year" class="form-select">
                            <option value="">Select the Year</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4">
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
                    <div class="col-lg-4 col-md-4">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Company Name</label>
                        <select name="company_name" id="company_name" class="form-select">
                            <option value="">Select Company Name</option>
                            <option value="ggcc" <?php if($companyName == 'ggcc') { echo 'selected'; } ?>>GGCC</option>
                            <option value="bright" <?php if($companyName == 'bright') { echo 'selected'; } ?>>Bright</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <?php if($payslipReportList) { ?>
            <div class="mt-3 card p-3">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <h4 class="fw-bold mb-0 text-black">Payslip Report List</h4>
                    <button id="reportButton" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Export</button>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Report Count</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo count($payslipReportList); ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Payable Days</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $payableDays; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Present Days</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $presentDays; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Absent Days</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $absentDays; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">OT Days</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $otDays; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Basic Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $basicAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Allowance Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $allowanceAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">OT Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $otAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Recharge Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $rechargeAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Incentive Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $incentiveAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Travelling Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $travellingAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Food Expenses Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $foodExpensesAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">PF Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $pfAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">ESI Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $esiAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Professional Tax Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $professionalTaxAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Advance In Cash Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $advanceCashAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Earning Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $earningAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Deduction Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $deductionAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="bg-body text-center p-3 rounded-3 border">
                            <p class="mb-2 text-black fw-bold">Salary Amount</p>
                            <h5 class="mb-0 text-black fw-semibold text-capitalize"><?php echo $salaryAmount; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th class="w-min-80">Year</th>
                                <th class="w-min-80">Month</th>
                                <th class="w-min-200">Employee Name</th>
                                <th class="w-min-120">Designation</th>
                                <th class="w-min-100">Payable Days</th>
                                <th class="w-min-100">Present Days</th>
                                <th class="w-min-100">Absent Days</th>
                                <th class="w-min-100">OT Days</th>
                                <th class="w-min-100">Actuals Basic Pay</th>
                                <th class="w-min-100">Earned Basic Pay</th>
                                <th class="w-min-100">Actuals Allowance</th>
                                <th class="w-min-100">Earned Allowance</th>
                                <th class="w-min-100">OT Amount</th>
                                <th class="w-min-100">Mobile Recharge</th>
                                <th class="w-min-100">Incentive</th>
                                <th class="w-min-100">Travelling</th>
                                <th class="w-min-100">Food Expenses</th>
                                <th class="w-min-100">PF Amount</th>
                                <th class="w-min-100">ESI Amount</th>
                                <th class="w-min-100">Professional Tax</th>
                                <th class="w-min-100">Adavnce In Cash</th>
                                <th class="w-min-100">Earning Amount</th>
                                <th class="w-min-100">Deduction Amount</th>
                                <th class="w-min-100">Salary Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($payslipReportList as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($row['year'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['month'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['employee_name'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['designation'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['day_count'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['present_count'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['absent_count'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['ot_count'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['basic_pay'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['month_basic_pay'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['allowance_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['month_allowance_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['ot_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['mobile_recharge'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['incentive_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['travelling_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['food_expenses'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['month_pf_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['esi_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['professional_tax'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['advance_cash'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['total_earning'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['deduction_amount'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['salary_amount'] ?? '-'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    let selectYear = "<?= $year ?>"; // safely embed PHP variable as a JS string

    let dateDropdown = document.getElementById('year');
    let currentYear = new Date().getFullYear();
    let earliestYear = 2024;

    while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;

        // Pre-select the year if it matches the PHP-provided year
        if (currentYear == selectYear) {
            dateOption.selected = true;
        }

        dateDropdown.add(dateOption);
        currentYear -= 1;
    }


    $('.reportSubmit').on('click', function() {
        if($('#year').val() === '') {
            alert('select the year');
        }
    });

    $('#reportButton').on('click', function() {
        if($('#year').val() === '') {
            alert('select the year');
        } else {
            var year = $('#year').val();
            var month = $('#month').val();
            var companyName = $('#company_name').val();
                
            $.ajax({
                url: '<?php echo base_url(); ?>report/getPayslipReport',
                type: 'post',
                data: {
                    year: year,
                    month: month,
                    companyName: companyName
                },
                xhrFields: {
                    responseType: 'blob' // Expect a binary response for file download
                },
                success: function (response, status, xhr) {
                    // Get the filename from the Content-Disposition header
                    var filename = "";
                    var disposition = xhr.getResponseHeader('Content-Disposition');
                    if (disposition && disposition.indexOf('attachment') !== -1) {
                        var matches = /filename="([^"]+)"/.exec(disposition);
                        if (matches != null && matches[1]) filename = matches[1];
                    }

                    // Create a link element to trigger the download
                    var link = document.createElement('a');
                    var url = window.URL.createObjectURL(response);
                    link.href = url;
                    link.download = filename || "export.xls";
                    document.body.appendChild(link);
                    link.click();
                    window.URL.revokeObjectURL(url);
                    link.remove();
                },
                error: function () {
                    alert('An error occurred while exporting the data.');
                }
            });
        }
    });
</script>