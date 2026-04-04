<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'stock/month-stock-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                </div>
                <div class="px-4 d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <div class="w-px-200">
                        <select name="year" id="yearSelect" class="w-100 form-select"></select>
                    </div>
                    <div class="w-px-200">
                        <select id="monthSelect" class="w-100 form-select">
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
                    <div class="w-px-200"> 
                        <select id="branchSelect" class="w-100 form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchId) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button id="searchButton" class="btn btn-primary w-100">Search</button>
                    </div>
                    <div>
                        <button id="downloadStockPDF" class="btn btn-primary d-flex align-items-center gap-2"><i class="bx bx-download"></i> PDF</button>
                    </div>
                </div>
            </div>
            
                <div class="downloadStockPage table-responsive p-4">
                    <h5 class="mb-4 text-center text-capitalize"><?php echo $branchName . ' Stock Report - ' . $year . ' ' . $month; ?></h5>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo $branchName; ?></th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th><?php echo $month; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($allStockreportList as $row) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->material_code; ?></td>
                                <td><?php echo $row->material_name; ?></td>
                                <td><?php echo $row->category; ?></td>
                                <td><?php echo $row->type; ?></td>
                                <td><?php echo $row->material_count; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let dateDropdown = document.getElementById('yearSelect');

    let currentYear = new Date().getFullYear();
    let earliestYear = 2024;

    while (currentYear >= earliestYear) {
      let dateOption = document.createElement('option');
      dateOption.text = currentYear;
      dateOption.value = currentYear;
      dateDropdown.add(dateOption);
      currentYear -= 1;
    }

    document.getElementById("downloadStockPDF").addEventListener("click", function () {
        // Select the div you want to download as PDF
        var element = document.querySelector('.downloadStockPage');
        
        // Use html2pdf to download it
        var branchName = "<?php echo $branchToken; ?>"; // Get PHP variable in JavaScript
        var fileName = branchName + '-stock-report.pdf'; // Concatenate the filename
        
        html2pdf(element, {
            margin:       0,        // Margins in cm
            filename:     fileName,  // Use the concatenated filename
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },      // Increase canvas resolution
            jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' }
        });
    });

    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var year = $('#yearSelect').val();
            var month = $('#monthSelect').val();
            var branchId = $('#branchSelect').val();

            if (year !== '' && month !== '' && branchId !== '') {
                // Base URL
                var baseUrl = '<?php echo base_url(); ?>stock/month-stock-view';

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (year) {
                    newUrl += '/' + encodeURIComponent(year);
                }
                if (month) {
                    newUrl += '/' + encodeURIComponent(month);
                }
                if (branchId) {
                    newUrl += '/' + encodeURIComponent(branchId);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                alert('Please Select Search Field');
            }
        });
    });
</script>