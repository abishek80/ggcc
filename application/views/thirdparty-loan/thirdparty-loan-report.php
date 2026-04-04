<section class="content-wrapper bg-white">
    <div class="container-xxl flex-grow-1 container-p-y downloadReportPage">
        <div class="p-3 mb-3 text-center">
            <h6 class="mb-3 fs-5 fw-semibold pb-3 border-dark border-bottom"><?php echo $thirdpartyName . ' (' . $thirdpartyRemarks . ')'; ?></h6>
            <div class="row g-3">
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="p-3 text-center">
                        <p class="mb-3">Loan Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $loanAmount; ?></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6 border-top-0 border-bottom-0 border border-dark">
                    <div class="p-3 text-center">
                        <p class="mb-3">Received Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $receivedAmount; ?></h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="p-3 text-center">
                        <p class="mb-3">Not Received Amount</p>
                        <h5 class="mb-0 amount-format fw-semibold"><?php echo $notreceivedAmount; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-6">
                <h5 class="mb-4 fw-bold text-center">Get Loan List</h5>
                <table class="table table-border-dark table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($loanList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->advancecash_date; ?></td>
                                <td class="amount-format"><?php echo $row->advancecash_amount; ?></td>
                                <td><?php echo $row->remarks; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <h5 class="mb-4 fw-bold text-center">Loan Amount Received List</h5>
                <table class="table table-border-dark table-bordered">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($loanReceivedList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->received_date; ?></td>
                                <td class="amount-format"><?php echo $row->received_amount; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="d-flex gap-3 justify-content-center removePrint my-3">
    <a href="javascript:void(0);" id="downloadReportPDF" class="btn btn-success">Download</a>
    <a href="javascript:window.print();" class="btn btn-primary">Print</a>
</div>

<script>
    document.getElementById("downloadReportPDF").addEventListener("click", function () {
        // Select the div you want to download as PDF
        var element = document.querySelector('.downloadReportPage');
        
        // Use html2pdf to download it
        var thirdpartyName = "<?php echo $thirdpartyName . ' - Loan Report'; ?>"; // Get PHP variable in JavaScript
        var fileName = thirdpartyName + '.pdf'; // Concatenate the filename
            
        html2pdf(element, {
            margin:       0,        // Margins in cm
            filename:     fileName,  // Use the concatenated filename
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },      // Increase canvas resolution
            jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' }
        });
    });
</script>