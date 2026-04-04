<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap mb-3">
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
            <div class="w-px-150">
                <button id="searchButton" class="btn btn-primary w-100">Search</button>
            </div>
            <div class="w-px-150">
                <a href="<?php echo base_url() . 'stock/month-stock-view/' . date('Y') . '/' . strtolower(date('F')); ?>" class="btn btn-primary w-100">Branch Stock</a>
            </div>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                <a href="<?php echo base_url() . 'stock/month-stock-add/' . date('Y') . '/' . strtolower(date('F')); ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Stock Report</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th class="w-min-100">Material Code</th>
                            <th class="w-min-250">Material Name</th>
                            <th class="w-min-150">Material Category</th>
                            <th class="w-min-150">Material Type</th>
                            <th class="w-min-30">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($stockreportList as $row) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->material_code; ?></td>
                                <td><?php echo $row->material_name; ?></td>
                                <td><?php echo $row->category; ?></td>
                                <td><?php echo $row->type; ?></td>
                                <td class="px-2">
                                    <a href="javascript:void(0);" class="box-hover getmaterialId" data-materialid="<?php echo $row->material_id; ?>" data-year="<?php echo $year; ?>" data-month="<?php echo $month; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="view_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="headingTitle"></div>
                </div>
                <div id="stockList" class="row gx-3 gy-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var month = $('#monthSelect').val();
            var year = $('#yearSelect').val();

            // Base URL
            var baseUrl = '<?php echo base_url(); ?>stock/month-stock-list';

            // Construct new URL with selected values
            var newUrl = baseUrl;
            if (year) {
                newUrl += '/' + encodeURIComponent(year);
            }
            if (month) {
                newUrl += '/' + encodeURIComponent(month);
            }

            // Redirect to the new URL
            window.location.href = newUrl;
        });
    });

    $(document).on("click", ".getmaterialId", function(e){
        var materialId = $(this).data("materialid");
        var year = $(this).data("year");
        var month = $(this).data("month");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>stock/getStockReportDetail',
            dataType: "json",
            data: {materialId,year,month},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.materialName + ' - ' + data.year  + ' ' + data.month + ' - ' + ' Stock Report</h5>');
                    
                var stockListHtml = '';
                data.stockMaterialData.forEach(function(item) {
                    stockListHtml += '<div class="col-lg-3 col-md-4 col-sm-6">';
                    stockListHtml += '<h6 class="text-capitalize fw-bold text-black mb-2">' + item.branch + '</h6>';
                    stockListHtml += '<h5 class="text-capitalize text-black mb-0">' + item.material_count + '</h5>';
                    stockListHtml += '</div>';
                });

                $('#stockList').html(stockListHtml);
            }
        });
        e.preventDefault();
        return false;
    });
</script>