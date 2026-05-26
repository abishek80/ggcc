<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="payslipForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <div class="w-min-250">
                        <select name="year" id="year" class="form-select"></select>
                    </div>
                    <a href="<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="payslip_id" id="payslip_id" type="hidden" value="<?php echo $payslipId; ?>">
            <input type="hidden" class="dayBasicPay">
            <input name="month_basic_pay" id="month_basic_pay" type="hidden" class="monthBasicPay">
            <input type="hidden" class="dayAllowanceAmount">
            <input name="month_allowance_amount" id="month_allowance_amount" type="hidden" class="presentAllowanceAmount">
            <input name="allowance_amount" id="allowance_amount" type="hidden" class="allowanceAmount">
            <input name="basic_pay" id="basic_pay" type="hidden" class="basicPay">
            <input name="absent_count" id="absent_count" type="hidden" class="absentCount">
            <input name="ot_amount" id="ot_amount" type="hidden" class="otAmount">
            <input name="mobile_recharge" id="mobile_recharge" type="hidden" class="mobileRecharge">
            <input name="total_earning" id="total_earning" type="hidden" class="earningAmount">
            <input name="esi_basic_amount" id="esi_basic_amount" type="hidden" class="esiBasicAmount">
            <input name="pf_status" id="pf_status" type="hidden" class="pfStatus">
            <input name="esi_status" id="esi_status" type="hidden" class="esiStatus">
            <input type="hidden" class="dayPfAmount">
            <input type="hidden" class="presentPfAmount">
            <input name="month_pf_amount" id="month_pf_amount" type="hidden" class="monthPfAmount">
            <input name="pf_amount" id="pf_amount" type="hidden" class="pfAmount">
            <input name="esi_amount" id="esi_amount" type="hidden" class="esiAmount">
            <input name="deduction_amount" id="deduction_amount" type="hidden" class="deductionAmount">
            <input name="salary_in_word" id="salary_in_word" type="hidden" class="salaryAmountInWords">
            <div class="row g-3">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name <span class="text-danger">*</span></label>
                    <select name="employee_name" id="employee_name" class="form-select selectEmployeeName select2">
                        <option value="">Select Employee Name</option>
                        <?php foreach ($employeeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->employee_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Month <span class="text-danger">*</span></label>
                    <select name="month" id="month" class="form-select">
                        <option value="">Select Month</option>
                        <option value="january" <?php if($month == 'January') { echo 'selected'; } ?>>January</option>
                        <option value="february" <?php if($month == 'February') { echo 'selected'; } ?>>February</option>
                        <option value="march" <?php if($month == 'March') { echo 'selected'; } ?>>March</option>
                        <option value="april" <?php if($month == 'April') { echo 'selected'; } ?>>April</option>
                        <option value="may" <?php if($month == 'May') { echo 'selected'; } ?>>May</option>
                        <option value="june" <?php if($month == 'June') { echo 'selected'; } ?>>June</option>
                        <option value="july" <?php if($month == 'July') { echo 'selected'; } ?>>July</option>
                        <option value="august" <?php if($month == 'August') { echo 'selected'; } ?>>August</option>
                        <option value="september" <?php if($month == 'September') { echo 'selected'; } ?>>September</option>
                        <option value="october" <?php if($month == 'October') { echo 'selected'; } ?>>October</option>
                        <option value="november" <?php if($month == 'November') { echo 'selected'; } ?>>November</option>
                        <option value="december" <?php if($month == 'December') { echo 'selected'; } ?>>December</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">No. of Day</label>
                    <input name="day_count" id="day_count" readonly type="text" class="dayCount form-control" placeholder="No. of Day">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">No. of Present Count <span class="text-danger">*</span></label>
                    <input name="present_count" id="present_count" type="text" class="presentDays form-control decimal" placeholder="No. of Present Count">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">No. of OT Count <span class="text-danger">*</span></label>
                    <input name="ot_count" id="ot_count" type="text" class="otDays form-control decimal" placeholder="No. of OT Count">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Travelling Amount <span class="text-danger">*</span></label>
                    <input name="travelling_amount" id="travelling_amount" type="text" class="travellingAmount form-control decimal" placeholder="Travelling Amount">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Incentive Amount <span class="text-danger">*</span></label>
                    <input name="incentive_amount" id="incentive_amount" type="text" class="incentiveAmount form-control decimal" placeholder="Incentive Amount">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Food Expenses Amount <span class="text-danger">*</span></label>
                    <input name="food_expenses" id="food_expenses" type="text" class="foodExpenses form-control decimal" placeholder="Food Expenses Amount">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Professional Tax <span class="text-danger">*</span></label>
                    <input name="professional_tax" id="professional_tax" type="text" class="professionalTax form-control decimal" placeholder="Professional Tax" value="0">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Advance In Cash <span class="text-danger">*</span></label>
                    <input name="advance_cash" id="advance_cash" type="text" class="advanceCash form-control decimal" placeholder="Advance In Cash">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Salary Amount</label>
                    <input name="salary_amount" id="salary_amount" readonly type="text" class="salaryAmount form-control" placeholder="Salary Amount">
                </div>
            </div>
        </form>
    </div>
</section>


<script>
    function numberToWords(num) {
        if (num === 0 || num === '0') return 'Zero Rupees';
        if (!num) return '';

        const a = [
            '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
            'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
        ];
        const b = [
            '', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
        ];

        const convert = (n) => {
            if (n < 20) return a[n];
            if (n < 100) return b[Math.floor(n / 10)] + (n % 10 !== 0 ? ' ' + a[n % 10] : '');
            if (n < 1000) return a[Math.floor(n / 100)] + ' Hundred' + (n % 100 !== 0 ? ' ' + convert(n % 100) : '');
            return '';
        };

        let n = Math.floor(Math.abs(num));
        let str = '';

        if (n >= 10000000) {
            str += convert(Math.floor(n / 10000000)) + ' Crore ';
            n %= 10000000;
        }
        if (n >= 100000) {
            str += convert(Math.floor(n / 100000)) + ' Lakh ';
            n %= 100000;
        }
        if (n >= 1000) {
            str += convert(Math.floor(n / 1000)) + ' Thousand ';
            n %= 1000;
        }
        if (n > 0) {
            str += convert(n);
        }

        return str.trim() + ' Rupees';
    }

    $(document).ready(function() {
        const monthMap = {
            "january": 0,
            "february": 1,
            "march": 2,
            "april": 3,
            "may": 4,
            "june": 5,
            "july": 6,
            "august": 7,
            "september": 8,
            "october": 9,
            "november": 10,
            "december": 11
        };

        function updateDayCount(month, year) {
            const monthIndex = monthMap[month];
            const daysInMonth = new Date(year, monthIndex + 1, 0).getDate();

            var basicPay = $('.basicPay').val();
            var dayBasicPay = basicPay / daysInMonth;
            $('.dayBasicPay').val(dayBasicPay);
            
            var allowanceAmount = $('.allowanceAmount').val();
            var dayAllowanceAmount = allowanceAmount / daysInMonth;
            $('.dayAllowanceAmount').val(dayAllowanceAmount);
            
            var pfAmount = $('.pfAmount').val();
            var dayPfAmount = pfAmount / daysInMonth;
            $('.dayPfAmount').val(dayPfAmount);

            $('.dayCount').val(daysInMonth);
            updateAbsentCount(daysInMonth);
        }

        function updateAbsentCount(daysInMonth) {
            const presentDays = parseFloat($('.presentDays').val()) || 0;
            if (presentDays > daysInMonth) {
                $('.presentDays').val(daysInMonth);
                $('.absentCount').val(0);
            } else {
                const absentDays = daysInMonth - presentDays;
                $('.absentCount').val(absentDays);
            }
        }

        $('#month, #year').change(function() {
            const selectedMonth = $('#month').val();
            const selectedYear = $('#year').val();

            if (selectedMonth && selectedYear) {
                updateDayCount(selectedMonth, selectedYear);
            } else {
                $('.dayCount').val('');
                $('.absentCount').val('');
            }
        });

        $('.presentDays').on('input', function() {
            const daysInMonth = parseFloat($('.dayCount').val()) || 0;
            updateAbsentCount(daysInMonth);
        });
        
        $('.selectEmployeeName').change(function () {
            var selectedEmployeeName = $(this).val();

            // Reset all fields
            $('#payslip_id, #month_basic_pay, #month_allowance_amount, #allowance_amount, #basic_pay, #absent_count, #ot_amount, #mobile_recharge, #total_earning, #esi_basic_amount, #pf_status, #esi_status, #month_pf_amount, #pf_amount, #esi_amount, #deduction_amount, #salary_in_word, #month, #day_count, #present_count, #ot_count, #travelling_amount, #incentive_amount, #food_expenses, #advance_cash, #salary_amount').val('');

            if (selectedEmployeeName !== '') {
                $.ajax({
                    url: "<?php echo base_url('employee/employeeSalaryInfo'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        employeeName: selectedEmployeeName
                    },
                    success: function (data) {
                        basicPay = data[0].basic_pay;
                        allowanceAmount = data[0].allowance_amount;
                        mobileRecharge = data[0].mobile_recharge;
                        pfStatus = data[0].pf_status;
                        pfAmount = data[0].pf_amount;
                        esiStatus = data[0].esi_status;
                        
                        $('.basicPay').val(basicPay);
                        $('.allowanceAmount').val(allowanceAmount);
                        $('.mobileRecharge').val(mobileRecharge);
                        $('.pfStatus').val(pfStatus);
                        $('.pfAmount').val(pfAmount);
                        $('.esiStatus').val(esiStatus);
                    }
                });
            }
        });

        $(".presentDays").on("blur", function(){
            var dayBasicPay = $('.dayBasicPay').val();
            var dayAllowanceAmount = $('.dayAllowanceAmount').val();
            var presentDays = $('.presentDays').val();
            var dayPfAmount = $('.dayPfAmount').val();

            var monthBasicPay = dayBasicPay * presentDays;
            var roundedMonthBasicPay = Number(monthBasicPay.toFixed(0));
            $('.monthBasicPay').val(roundedMonthBasicPay);

            var presentAllowanceAmount = dayAllowanceAmount * presentDays;
            var roundedPresentAllowanceAmount = Number(presentAllowanceAmount.toFixed(0));
            $('.presentAllowanceAmount').val(roundedPresentAllowanceAmount);

            var presentPfAmount = dayPfAmount * presentDays;
            $('.presentPfAmount').val(presentPfAmount);
        });

        $(".otDays").on("blur", function(){
            var dayBasicPay = $('.dayBasicPay').val();
            var otDays = $('.otDays').val();

            var otAmount = dayBasicPay * (otDays * 2);
            var roundedOtAmount = Number(otAmount.toFixed(0));
            $('.otAmount').val(roundedOtAmount);
        });

        $(".foodExpenses").on("blur", function(){
            var monthBasicPay = $('.monthBasicPay').val();
            var presentAllowanceAmount = $('.presentAllowanceAmount').val();
            var otAmount = $('.otAmount').val();
            var mobileRecharge = $('.mobileRecharge').val();
            var incentiveAmount = $('.incentiveAmount').val();
            var foodExpenses = $('.foodExpenses').val();
            var travellingAmount = $('.travellingAmount').val();

            var earningAmount = parseFloat(monthBasicPay) + parseFloat(presentAllowanceAmount) + parseFloat(otAmount) + parseFloat(mobileRecharge) + parseFloat(incentiveAmount) + parseFloat(foodExpenses) + parseFloat(travellingAmount);
            var roundedEarningAmount = Number(earningAmount.toFixed(0));
            $('.earningAmount').val(roundedEarningAmount);

            
            // var esiBasicAmount = parseFloat(monthBasicPay) + parseFloat(presentAllowanceAmount) + parseFloat(otAmount) + parseFloat(mobileRecharge) + parseFloat(incentiveAmount) + parseFloat(foodExpenses);
            
            var esiBasicAmount = parseFloat(monthBasicPay);
            var roundedESIBasicAmount = Number(esiBasicAmount.toFixed(0));
            $('.esiBasicAmount').val(roundedESIBasicAmount);
        });

        $(".foodExpenses").on("blur", function(){
            var pfStatus = $('.pfStatus').val();
            if (pfStatus == 'yes') {
                var presentPfAmount = parseFloat($('.presentPfAmount').val());
                var monthPfAmount = presentPfAmount * 0.12;
                var roundedMonthPfAmount = Number(monthPfAmount.toFixed(0));
                $('.monthPfAmount').val(roundedMonthPfAmount);
            } else {
                $('.monthPfAmount').val('0'); // Clear the input field
            }

            var esiStatus = $('.esiStatus').val();
            if (esiStatus == 'yes') {
                var esiBasicAmount = parseFloat($('.esiBasicAmount').val());
                var esiAmount = (esiBasicAmount * 0.75) / 100;
                var roundedEsiAmount = Number(esiAmount.toFixed(0));
                $('.esiAmount').val(roundedEsiAmount);
            } else {
                $('.esiAmount').val('0'); // Clear the input field
            }
        });

        $(".advanceCash").on("blur", function(){
            var esiAmount = $('.esiAmount').val();
            var monthPfAmount = $('.monthPfAmount').val();
            var advanceCash = $('.advanceCash').val();
            var professionalTax = $('.professionalTax').val();
            var earningAmount = $('.earningAmount').val();
            
            var deductionAmount = parseFloat(esiAmount) + parseFloat(monthPfAmount) + parseFloat(advanceCash) + parseFloat(professionalTax);
            $('.deductionAmount').val(deductionAmount);
            
            var deductionAmount = $('.deductionAmount').val();

            var salaryAmount = parseFloat(earningAmount) - parseFloat(deductionAmount);
            $('.salaryAmount').val(salaryAmount);
            $('.salaryAmountInWords').val(numberToWords(salaryAmount));
        });
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

    // Employee Payslip Save Function
    $("#payslipForm").validate({
        rules: {
            month: {
                required: true
            },
            employee_name: {
                required: true
            },
            present_count: {
                required: true
            },
            ot_count: {
                required: true
            },
            travelling_amount: {
                required: true
            },
            incentive_amount: {
                required: true
            },
            food_expenses: {
                required: true
            },
            advance_cash: {
                required: true
            }
        },
        messages: {
            month: {
                required: "Please Select Month"
            },
            employee_name: {
                required: "Please Select Employee Name"
            },
            present_count: {
                required: "Please Enter Present"
            },
            ot_count: {
                required: "Please Enter OT Days "
            },
            travelling_amount: {
                required: "Please Enter Travelling Amount"
            },
            incentive_amount: {
                required: "Please Enter Incentive Amount"
            },
            food_expenses: {
                required: "Please Enter Food Expenses Amount"
            },
            advance_cash: {
                required: "Please Enter Avance In Cash"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#payslipForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>employee/payslipFormSave',
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
                            window.location.href = "<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>