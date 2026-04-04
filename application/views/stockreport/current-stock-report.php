<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Current Stock Report - <?php echo $branchName; ?></h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <div class="w-px-250"> 
                        <select id="branchSelect" class="w-100 form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branchName) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <button id="searchButton" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Stockin Quantity</th>
                            <th>Stockout Quantity</th>
                            <th>Balance Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($branchCurrentStockList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->material_code; ?></td>
                            <td><?php echo $row->material_name; ?></td>
                            <td><?php echo $row->category; ?></td>
                            <td><?php echo $row->type; ?></td>
                            <td><?php echo $row->available_stockin; ?></td>
                            <td><?php echo $row->available_stockout; ?></td>
                            <td><?php echo $row->balance_stock; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var branch = $('#branchSelect').val();

            if (branch !== '') {
                // Base URL
                var baseUrl = '<?php echo base_url(); ?>stock/current-stock-report';

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (branch) {
                    newUrl += '/' + encodeURIComponent(branch);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                alert('Please Select Search Field');
            }
        });
    });
</script>