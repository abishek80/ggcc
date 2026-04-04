<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 pt-4 pb-4 container-p-y">
        <form id="multiPayslipSaveForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="payslip_id" id="payslip_id" type="hidden" value="<?php echo $payslipId; ?>">
            <div class="row g-3 justify-content-end">
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Month <span class="text-danger">*</span></label>
                    <select name="month" id="month" class="form-select payslipMonth">
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
                <div class="col-lg-3 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Year <span class="text-danger">*</span></label>
                    <select name="year" id="year" class="form-select"></select>
                </div>
            </div>
            <div class="mt-4 table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-50">S. No</th>
                            <th class="w-min-250">Employee Name</th>
                            <th class="w-min-100">No. of Day</th>
                            <th class="w-min-100">Present Count</th>
                            <th class="w-min-100">OT Count</th>
                            <th class="w-min-120">Travelling Amount</th>
                            <th class="w-min-120">Incentive Amount</th>
                            <th class="w-min-120">Food Expenses</th>
                            <th class="w-min-120">Professional Tax</th>
                            <th class="w-min-120">Advance In Cash</th>
                            <th class="w-min-120">Salary Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                            foreach ($employeePayslipList as $row) {
                        ?>
                            <tr>
                                <input name="employee_id[]" id="employee_id<?php echo $i; ?>" type="hidden" class="employeeId" value="<?php echo $row->id; ?>">
                                <input type="hidden" class="dayBasicPay">
                                <input name="month_basic_pay[]" id="month_basic_pay<?php echo $i; ?>" type="hidden" class="presentBasicPay">
                                <input type="hidden" class="dayAllowanceAmount">
                                <input name="month_allowance_amount[]" id="month_allowance_amount<?php echo $i; ?>" type="hidden" class="presentAllowanceAmount">
                                <input name="allowance_amount[]" id="allowance_amount<?php echo $i; ?>" type="hidden" class="allowanceAmount" value="<?php echo $row->allowance_amount; ?>">
                                <input name="basic_pay[]" id="basic_pay<?php echo $i; ?>" type="hidden" class="basicPay" value="<?php echo $row->basic_pay; ?>">
                                <input name="absent_count[]" id="absent_count<?php echo $i; ?>" type="hidden" class="absentDays">
                                <input name="ot_amount[]" id="ot_amount<?php echo $i; ?>" type="hidden" class="otAmount">
                                <input name="mobile_recharge[]" id="mobile_recharge<?php echo $i; ?>" type="hidden" class="mobileRecharge" value="<?php echo $row->mobile_recharge; ?>">
                                <input name="total_earning[]" id="total_earning<?php echo $i; ?>" type="hidden" class="totalEarningAmount">
                                <input name="pf_status[]" id="pf_status<?php echo $i; ?>" type="hidden" class="pfStatus" value="<?php echo $row->pf_status; ?>">
                                <input name="esi_status[]" id="esi_status<?php echo $i; ?>" type="hidden" class="esiStatus" value="<?php echo $row->esi_status; ?>">
                                <input type="hidden" class="dayPfAmount">
                                <input type="hidden" class="presentPfAmount">
                                <input name="pf_amount[]" id="pf_amount<?php echo $i; ?>" type="hidden" class="pfAmount" value="<?php echo $row->pf_amount; ?>">
                                <input name="month_pf_amount[]" id="month_pf_amount<?php echo $i; ?>" type="hidden" class="monthPfAmount">
                                <input name="esi_amount[]" id="esi_amount<?php echo $i; ?>" type="hidden" class="esiAmount">
                                <input name="esi_basic_amount[]" id="esi_basic_amount<?php echo $i; ?>" type="hidden" class="esiBasicAmount">
                                <input name="deduction_amount[]" id="deduction_amount<?php echo $i; ?>" type="hidden" class="totalDeductionAmount">
                                <input name="salary_in_word[]" id="salary_in_word<?php echo $i; ?>" type="hidden" class="salaryAmountWord">
                                <td><?php echo $i; ?></td>
                                <td>
                                    <p class="mb-1"><?php echo $row->employee_name; ?></p>
                                    <p class="mb-0"><?php echo $row->designation; ?></p>
                                </td>
                                <td>
                                    <input name="day_count[]" id="day_count<?php echo $i; ?>" type="text" readonly class="form-control dayCount" placeholder="Day Count">
                                </td>
                                <td>
                                    <input name="present_count[]" id="present_count<?php echo $i; ?>" type="text" class="form-control decimal presentDays" placeholder="Present Count">
                                </td>
                                <td>
                                    <input name="ot_count[]" id="ot_count<?php echo $i; ?>" type="text" class="form-control decimal otDays" placeholder="OT Count">
                                </td>
                                <td>
                                    <input name="travelling_amount[]" id="travelling_amount<?php echo $i; ?>" type="text" class="form-control decimal travellingAmount" placeholder="Travelling Amount">
                                </td>
                                <td>
                                    <input name="incentive_amount[]" id="incentive_amount<?php echo $i; ?>" type="text" class="form-control decimal incentiveAmount" placeholder="Incentive Amount">
                                </td>
                                <td>
                                    <input name="food_expenses[]" id="food_expenses<?php echo $i; ?>" type="text" class="form-control decimal foodExpenses" placeholder="Food Expenses Amount">
                                </td>
                                <td>
                                    <input name="professional_tax[]" id="professional_tax<?php echo $i; ?>" type="text" class="form-control decimal professionalTax" placeholder="Professional Tax" value="0">
                                </td>
                                <td>
                                    <input name="advance_cash[]" id="advance_cash<?php echo $i; ?>" type="text" class="form-control decimal advanceInCash" placeholder="Advance In Cash">
                                </td>
                                <td>
                                    <input name="salary_amount[]" id="salary_amount<?php echo $i; ?>" type="text" readonly class="form-control salaryAmount" placeholder="Salary Amount">
                                </td>
                            </tr>
                        <?php 
                            $i++;} ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</section>


<script>
    $(document).on('input', '.presentDays', function() {
        var $row = $(this).closest('tr');
        var dayCount = parseFloat($row.find('.dayCount').val());
        var enteredDayCount = parseFloat($(this).val());
        
        if (enteredDayCount > dayCount) {
            $(this).val(dayCount);
        }
    });
    
    function numberToWords(num) {
        const a = [
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten',
            'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        ];
        const b = [
            '', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
        ];
        const g = [
            '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion',
            'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion',
            'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        ];

        let makeGroup = ([ones, tens, huns]) => {
            let hundreds = parseNum(huns) === 0 ? '' : a[parseNum(huns)] + ' hundred ';
            let remainder = parseNum(tens) * 10 + parseNum(ones);
            let tensAndOnes = remainder < 20 ? a[remainder] : b[parseNum(tens)] + (parseNum(ones) > 0 ? ' ' + a[parseNum(ones)] : '');
            return (hundreds + tensAndOnes).trim();
        };

        let thousand = (group, i) => group === '' ? group : `${group} ${g[i]}`;

        if (typeof num === 'number') return numberToWords(String(num));
        if (num === '0') return 'zero';

        return chunk(3)(reverse(str(num)))
            .map(makeGroup)
            .map(thousand)
            .filter(compact)
            .reverse()
            .join(' ');
    }

    function str(x) {
        return x.toString();
    }

    function parseNum(x) {
        return parseFloat(x) || 0;
    }

    function reverse(xs) {
        return xs.split('').reverse().join('');
    }

    function chunk(n) {
        return function(xs) {
            return xs.match(new RegExp(`.{1,${n}}`, 'g'));
        };
    }

    function compact(x) {
        return !!x;
    }
    
    $(document).ready(function() {
        // Store common month and year
        let commonMonth, commonYear;
        
        // Function to get common month and year
        function updateCommonValues() {
            commonMonth = $('.payslipMonth').val(); // Replace with actual ID for month
            commonYear = $('#year').val();   // Replace with actual ID for year
        }
        
        // Function to update the day count based on common month and year
        function updateDayCount(row) {
            const monthMap = {
                "january": 0, "february": 1, "march": 2, "april": 3, "may": 4, "june": 5,
                "july": 6, "august": 7, "september": 8, "october": 9, "november": 10, "december": 11
            };

            const monthIndex = monthMap[commonMonth.toLowerCase()];
            const daysInMonth = new Date(commonYear, monthIndex + 1, 0).getDate();

            const basicPay = parseFloat($(row).find('.basicPay').val());
            const allowanceAmount = parseFloat($(row).find('.allowanceAmount').val());
            const pfAmount = parseFloat($(row).find('.pfAmount').val());

            const dayBasicPay = basicPay / daysInMonth;
            const dayAllowanceAmount = allowanceAmount / daysInMonth;
            const dayPfAmount = pfAmount / daysInMonth;

            $(row).find('.dayBasicPay').val(dayBasicPay.toFixed(2));
            $(row).find('.dayAllowanceAmount').val(dayAllowanceAmount.toFixed(2));
            $(row).find('.dayPfAmount').val(dayPfAmount.toFixed(2));
            $(row).find('.dayCount').val(daysInMonth);

            updateAbsentDays(row, daysInMonth);
        }

        // Update absent days
        function updateAbsentDays(row, daysInMonth) {
            const presentDays = parseFloat($(row).find('.presentDays').val()) || 0;
            const absentDays = daysInMonth - presentDays;
            $(row).find('.absentDays').val(absentDays);
        }

        // Update calculations on common month/year change
        $(document).on('change', '.payslipMonth, #year', function() {
            updateCommonValues();
            $('tr').each(function() {
                updateDayCount(this);
            });
        });

        // Calculate based on present days
        $(document).on('blur', '.presentDays', function() {
            const row = $(this).closest('tr');
            const daysInMonth = parseFloat(row.find('.dayCount').val()) || 0;
            updateAbsentDays(row, daysInMonth);

            const dayBasicPay = parseFloat(row.find('.dayBasicPay').val());
            const dayAllowanceAmount = parseFloat(row.find('.dayAllowanceAmount').val());
            const dayPfAmount = parseFloat(row.find('.dayPfAmount').val());
            const presentDays = parseFloat($(this).val());

            const presentBasicPay = dayBasicPay * presentDays;
            const presentAllowanceAmount = dayAllowanceAmount * presentDays;
            const presentPfAmount = dayPfAmount * presentDays;

            row.find('.presentBasicPay').val(presentBasicPay.toFixed(0));
            row.find('.presentAllowanceAmount').val(presentAllowanceAmount.toFixed(0));
            row.find('.presentPfAmount').val(presentPfAmount.toFixed(2));
        });

        // Calculate OT amount
        $(document).on('blur', '.otDays', function() {
            const row = $(this).closest('tr');
            const dayBasicPay = parseFloat(row.find('.dayBasicPay').val());
            const otDays = parseFloat($(this).val());

            const otAmount = dayBasicPay * (otDays * 2);
            row.find('.otAmount').val(Number(otAmount.toFixed(0)));
        });

        // Calculate total earning
        $(document).on('blur', '.foodExpenses', function() {
            const row = $(this).closest('tr');
            const presentBasicPay = parseFloat(row.find('.presentBasicPay').val());
            const presentAllowanceAmount = parseFloat(row.find('.presentAllowanceAmount').val());
            const otAmount = parseFloat(row.find('.otAmount').val());
            const mobileRecharge = parseFloat(row.find('.mobileRecharge').val());
            const incentiveAmount = parseFloat(row.find('.incentiveAmount').val());
            const foodExpenses = parseFloat($(this).val());
            const travellingAmount = parseFloat(row.find('.travellingAmount').val());

            const totalEarningAmount = presentBasicPay + presentAllowanceAmount + otAmount + mobileRecharge + incentiveAmount + foodExpenses + travellingAmount;
            row.find('.totalEarningAmount').val(Number(totalEarningAmount.toFixed(0)));

            
            // const esiBasicAmount = presentBasicPay + presentAllowanceAmount + otAmount + mobileRecharge + incentiveAmount + foodExpenses;
            
            const esiBasicAmount = presentBasicPay;
            row.find('.esiBasicAmount').val(Number(esiBasicAmount.toFixed(0)));
        });

        $(document).on('blur', '.foodExpenses', function() {
            const row = $(this).closest('tr');

            var pfStatus = row.find('.pfStatus').val();
            if (pfStatus == 'yes') {
                const presentPfAmount = parseFloat(row.find('.presentPfAmount').val());
                const monthPfAmount = presentPfAmount * 0.12;
                const roundedMonthPfAmount = Number(monthPfAmount.toFixed(0));
                row.find('.monthPfAmount').val(roundedMonthPfAmount); // Update the current row only
            } else {
                row.find('.monthPfAmount').val('0'); // Update the current row only
            }

            var esiStatus = row.find('.esiStatus').val();
            if (esiStatus == 'yes') {
                var esiBasicAmount = parseFloat(row.find('.esiBasicAmount').val());
                var esiAmount = (esiBasicAmount * 0.75) / 100;
                var roundedEsiAmount = Number(esiAmount.toFixed(0));
                row.find('.esiAmount').val(roundedEsiAmount); // Update the current row only
            } else {
                row.find('.esiAmount').val('0'); // Update the current row only
            }
        });

        // Calculate deductions and salary
        $(document).on('blur', '.advanceInCash', function() {
            const row = $(this).closest('tr');
            const esiAmount = parseFloat(row.find('.esiAmount').val());
            const monthPfAmount = parseFloat(row.find('.monthPfAmount').val());
            const professionalTax = parseFloat(row.find('.professionalTax').val());
            const advanceCash = parseFloat($(this).val());
            const totalEarningAmount = parseFloat(row.find('.totalEarningAmount').val());

            const totalDeductionAmount = esiAmount + monthPfAmount + advanceCash + professionalTax;
            row.find('.totalDeductionAmount').val(totalDeductionAmount);

            const salaryAmount = totalEarningAmount - totalDeductionAmount;
            row.find('.salaryAmount').val(salaryAmount.toFixed(0));
            row.find('.salaryAmountWord').val(numberToWords(salaryAmount));
        });

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
    });

    // Save EmployeePayslip Order Form
    $("#multiPayslipSaveForm").validate({
        rules: {
            month: {
                required: true
            },
            year: {
                required: true
            }
        },
        messages: {
            month: {
                required: "Please Select Month",
            },
            year: {
                required: "Please Select Year",
            }
        },
        submitHandler: function(form) {
            var data = new FormData($('#multiPayslipSaveForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>employee/employeePayslipSaveFunction',
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
                            window.location.href = "<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>