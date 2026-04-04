
                </div>
            </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="<?php echo base_url(); ?>themes/js/toastr.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jquery.sweet-alert.custom.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/lightbox-plus-jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/dropzone.js"></script>
    
    <script src="<?php echo base_url(); ?>themes/vendor/js/helpers.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/config.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jquery.ajax.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/js/menu.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/main.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/ui-popover.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url(); ?>themes/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>themes/datatable/js/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/datatable/js/jspdf.umd.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/datatable/js/jspdf.plugin.autotable.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/select2.full.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/lightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/flatpickr.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/date-picker.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/html2pdf.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/magnifypopup.js"></script>

    <script>
        $(document).ready(function () {

            if ($(".restrict-future").length) {
                $(".restrict-future").flatpickr({
                    monthSelectorType: "static",
                    dateFormat: "Y-m-d",
                    minDate: "today"   // 🔥 This disables all previous dates
                });
            }

        });

        function oneClickSubmitBtn() {
            $('form').on('submit', function(event) {
                const submitButton = $(this).find('button[type="submit"]'); // Select the submit button within the form
                submitButton.prop('disabled', true); // Disable the button
                submitButton.text('Submitting...'); // Optional: Change button text
            });
        }
        
        const inputFields = document.querySelectorAll('input[type="text"], textarea');

        inputFields.forEach(input => {
            input.addEventListener('input', function() {
                this.value = this.value.replace(/\b\w/g, char => char.toUpperCase());
            });
        });

        $(document).ready(function() {
            $(".testingDate").on("change", function() {
                const checkingDate = new Date($(this).val());
                if (isNaN(checkingDate)) return;

                // Calculate 180 days later
                const renewalDate = new Date(checkingDate);
                renewalDate.setDate(renewalDate.getDate() + 180);

                // Adjust to the day before
                renewalDate.setDate(renewalDate.getDate() - 1);

                // Format the date as YYYY-MM-DD
                const formattedDate = renewalDate.toISOString().split("T")[0];
                $(".nextRenewalDate").val(formattedDate);
            });

            $(".receivedDate").on("change", function() {
                const checkingDate = new Date($(this).val());
                if (isNaN(checkingDate)) return;

                // Calculate 12 months later
                const renewalDate = new Date(checkingDate);
                renewalDate.setMonth(renewalDate.getMonth() + 12);

                // Adjust to the day before
                renewalDate.setDate(renewalDate.getDate() - 1);

                // Format the date as YYYY-MM-DD
                const formattedDate = renewalDate.toISOString().split("T")[0];
                $(".retentionMoneyDate").val(formattedDate);
            });

            $('.iframe-popup').magnificPopup({
                type: 'iframe'
            });
        });

        // Function to format number as Indian numbering system
        function formatIndianNumber(number) {
            const parts = number.split(".");
            const intPart = parts[0];
            const decPart = parts.length > 1 ? "." + parts[1] : "";
            const lastThree = intPart.substring(intPart.length - 3);
            const otherNumbers = intPart.substring(0, intPart.length - 3);
            const formattedNumber = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + "," + lastThree + decPart;
            return formattedNumber.startsWith(",") ? formattedNumber.substring(1) : formattedNumber;
        }

        $(document).ready(function() {
            // Get the div and format its content
            $('.amount-format').each(function() {
                var number = $(this).text();
                var formattedNumber = formatIndianNumber(number);
                $(this).text(formattedNumber);
            });
        });

        
        function updateRenewalDateColors() {
            $(".date-check").each(function() {
                var renewalDateStr = $(this).data("date-check");
                if (!renewalDateStr || renewalDateStr === '0000-00-00') return;
                var renewalDate = new Date(renewalDateStr);
                if (isNaN(renewalDate.getTime())) return;
                
                var currentDate = new Date();
                var timeDifference = renewalDate - currentDate;
                var daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

                if (daysDifference < 0) {
                    $(this).css("color", "red");
                } else if (daysDifference <= 30) {
                    $(this).css("color", "orange");
                } else if (daysDifference >= 90) {
                    $(this).css("color", "green");
                } else {
                    $(this).css("color", "orange");
                }
            });
        }

        $(document).ready(function() {
            var table = $('.zero_config').DataTable();
           
            table.on('draw', function() {
                updateRenewalDateColors();
            });
            updateRenewalDateColors();
        });

        $(window).on('load', function() {
            $('.loader').hide();
        });

        $('.zero_config').DataTable();

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(".select2").select2({
            allowClear: true
        });
        $(".multiple.select2").select2({
            allowClear: true
        });

        $(document).on("input", ".decimal", function(evt){
            var self = $(this);
            var currentValue = self.val();
            var sanitizedValue = currentValue.replace(/[^0-9.]/g, '');
            var decimalIndex = sanitizedValue.indexOf('.');

            if (decimalIndex !== -1) {
                var beforeDecimal = sanitizedValue.substr(0, decimalIndex);
                var afterDecimal = sanitizedValue.substr(decimalIndex + 1);
                afterDecimal = afterDecimal.replace('.', '');
                sanitizedValue = beforeDecimal + '.' + afterDecimal;
            }
            if (decimalIndex !== -1 && sanitizedValue.length - decimalIndex > 4) {
                sanitizedValue = sanitizedValue.substr(0, decimalIndex + 4);
            }
        
            self.val(sanitizedValue);
            if ((evt.which !== 46 || sanitizedValue.indexOf('.') !== -1) && (evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        
        $(document).on("input", ".text-only", function(evt) {
            var self = $(this);
            var currentValue = self.val();
            var sanitizedValue = currentValue.replace(/[0-9]/g, '');
            self.val(sanitizedValue);
        });

        $(document).on("input", ".number-only", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/\D/g, ""));
            if ((evt.which < 48 || evt.which > 57)) {
                evt.preventDefault();
            }
        });
        
        $(document).on('click', '.trashItem', function(e) {
            var fieldId = $(this).data("rowid");
            var tableName = $(this).data("tablename");
            var link = $(this).data("link");
            swal({
                title: "Are you sure delete?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>deleteRecord/',
                    dataType: "json",
                    data: {
                        fieldId, 
                        tableName
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Deleted!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.trashPartyPaymentItem', function(e) {
            var partyPaymentId = $(this).data("partypaymentid");
            var partyPaymentTable = $(this).data("partypaymenttable");
            var partyPaymentReceivedId = $(this).data("partypaymentreceivedid");
            var partyPaymentReceivedTable = $(this).data("partypaymentreceivedtable");
            var link = $(this).data("link");
            swal({
                title: "Are you sure delete?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>deletePartyPaymentRecord/',
                    dataType: "json",
                    data: {
                        partyPaymentId,
                        partyPaymentTable,
                        partyPaymentReceivedId,
                        partyPaymentReceivedTable
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Deleted!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.trashPurchaseOrder', function(e) {
            var fieldId = $(this).data("rowid");
            var tableName = $(this).data("tablename");
            var link = $(this).data("link");
            swal({
                title: "Are you sure delete?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>deletePurchaseRecord/',
                    dataType: "json",
                    data: {
                        fieldId, 
                        tableName
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Deleted!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.trashRetentionMoney', function(e) {
            var fieldId = $(this).data("rowid");
            var link = $(this).data("link");
            swal({
                title: "Are you sure delete?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>deleteRetentionMoneyRecord/',
                    dataType: "json",
                    data: {
                        fieldId
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Deleted!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.completePurchaseOrder', function(e) {
            var fieldId = $(this).data("rowid");
            var tableName = $(this).data("tablename");
            var link = $(this).data("link");
            swal({
                title: "Are you sure Complete the PO?",
                text: "You will not be able to Edit this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Complete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>completePurchaseRecord/',
                    dataType: "json",
                    data: {
                        fieldId, 
                        tableName
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Moved!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.trashLeaveItem', function(e) {
            var fieldId = $(this).data("rowid");
            var link = $(this).data("link");
            swal({
                title: "Are you sure delete?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>deleteLeaveRecord/',
                    dataType: "json",
                    data: {
                        fieldId
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Deleted!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.changeStatus', function(e) {
            var fieldId = $(this).data("rowid");
            var tableName = $(this).data("tablename");
            var statusValue = $(this).data("value");
            var link = $(this).data("link");
            swal({
                title: "Change The Status?",
                text: "You Will Change The Status!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Changed!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>changeStatus/',
                    dataType: "json",
                    data: {
                        fieldId, 
                        tableName,
                        statusValue
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Changed!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.changeAllEmployeeStatus', function(e) {
            var fieldId = $(this).data("rowid");
            var statusValue = $(this).data("value");
            var link = $(this).data("link");
            swal({
                title: "Change The Status?",
                text: "You Will Change The Status!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Changed!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRFToken": csrftoken
                    },
                    url: '<?php echo base_url(); ?>changeAllEmployeeStatus/',
                    dataType: "json",
                    data: {
                        fieldId, 
                        statusValue
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
                        if (data['isError']) {
                            toastr.error(data['message']);
                        } else {
                            swal("Changed!", (data['message']), "success");
                            setTimeout(function () {
                                window.location.href = link;
                            }, 1500);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>