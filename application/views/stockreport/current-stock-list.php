<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Current Stock List</h4>
                <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                    <div class="w-px-250"> 
                        <select id="branchSelect" class="w-100 form-select select2">
                            <option value="">Select Branch</option>
                            <?php foreach ($branchDropdown as $row) { ?>
                                <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branch) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
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
                            <th>Stockin Qty</th>
                            <th>Stockout Qty</th>
                            <th>Balance Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($currentStockList as $row) { 
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
                            <td class="px-2">
                                <div class="d-flex gap-2">
                                    <a href="javascript:void(0);" class="box-hover getMaterialId" data-materialid="<?php echo $row->material_id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'stock/current-stock-transaction/' . $row->material_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Transaction Record"> <i class="bx bx-chart"></i> </a>
                                </div>
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


    $(document).on("click", ".getMaterialId", function(e){
        var materialId = $(this).data("materialid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>stock/getCurrentStockReportDetail',
            dataType: "json",
            data: {materialId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.materialName + ' (' + data.materialCategory + ' - '  + data.materialtype + ') - Stock Report</h5>');
                    
                var stockListHtml = '';
                data.stockMaterialData.forEach(function(item) {
                    stockListHtml += '<div class="col-lg-3 col-md-4 col-sm-6">';
                    stockListHtml += '<h6 class="text-capitalize fw-bold text-black mb-2">' + item.branch + '</h6>';
                    stockListHtml += '<h5 class="text-capitalize text-black mb-0">' + item.balance_stock + '</h5>';
                    stockListHtml += '</div>';
                });

                $('#stockList').html(stockListHtml);
            }
        });
        e.preventDefault();
        return false;
    });
</script>