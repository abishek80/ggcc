<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="<?php echo base_url(); ?>report/stock-report" method="get">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <h4 class="fw-bold mb-0 text-black">Stock Report</h4>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>report/stock-report" class="btn btn-secondary px-4 py-2 rounded border-0 fw-bold text-white">Reset</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded border-0 fw-bold text-white">Filter</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Name</label>
                        <select name="branch" id="branch" class="form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if($branchId == $row->id) { echo 'selected'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Form Date</label>
                        <input name="from_date" id="from_date" type="date" class="form-control date-picker fromDate" placeholder="YYYY - MM - DD" value="<?php echo $fromDate; ?>">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">To Date</label>
                        <input name="to_date" id="to_date" type="date" class="form-control date-picker toDate" placeholder="YYYY - MM - DD" value="<?php echo $toDate; ?>">
                    </div>
                </div>
            </div>
        </form>

        <?php if($stockReportList) { ?>
            <div class="mt-3 card p-3">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <h4 class="fw-bold mb-0 text-black">Stock Report List</h4>
                    <button id="reportButton" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Export</button>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Opening Stock</th>
                                <th>Stock In</th>
                                <th>Stock Out</th>
                                <th>Transfer In</th>
                                <th>Transfer Out</th>
                                <th>Closing Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stockReportList as $row) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['material_code'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['material_name'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['material_category'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['material_type'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['opening_stock'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['stock_in'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['stock_out'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['transfer_in'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['transfer_out'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($row['closing_stock'] ?? '-'); ?></td>
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
    $('#reportButton').on('click', function() {
        // Get selected values from dropdowns
        var branch = $('#branch').val();
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();

        $.ajax({
            url: '<?php echo base_url(); ?>report/getStockReport',
            type: 'post',
            data: {
                branch: branch,
                fromDate: fromDate,
                toDate: toDate
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
    });
</script>