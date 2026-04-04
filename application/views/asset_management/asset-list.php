<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black text-capitalize">Asset Management - <?php echo $assetType; ?> List</h4>
                <a href="<?php echo base_url() . 'stock/asset-add/' . $assetType; ?>" class="btn btn-primary px-4 py-2 rounded text-white text-capitalize">Add <?php echo $assetType; ?></a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-75">S. No</th>
                            <th>Zone</th>
                            <th>Branch</th>
                            <th class="w-min-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($assetManagementBranchList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->zone; ?></td>
                            <td><?php echo $row->branch_name; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getBranchId" data-branchid="<?php echo $row->branch_id; ?>" data-assettype="<?php echo $assetType; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'stock/asset-view/' . $assetType . '/' . $row->branch_id; ?>" class="box-hover text-capitalize" data-toggle="tooltip" data-placement="top" title="Edit List"> <i class="bx bx-edit-alt"></i> </a>
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
                <div class="mb-4 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="branchDetail"></div>
                </div>
                <div id="assetsToolsList" class="row g-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getBranchId", function(e){
        var branchId = $(this).data("branchid");
        var assetType = $(this).data("assettype");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>stock/getAssetsDetail',
            dataType: "json",
            data: {branchId, assetType},
            success: function (data) {
                $('#branchDetail').html('<h4 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.zone + ' - ' + data.branchName + ' - Assets List</h4>');

                updateAssetsToolsList(data.assetsToolsList);
            }
        });
        e.preventDefault();
        return false;
    });

    // Utility Function to Update assets tool list
    function updateAssetsToolsList(assetsToolsList) {
        if (Array.isArray(assetsToolsList) && assetsToolsList.length > 0) {
            const htmlContent = assetsToolsList.map(assetTool => {
                return `
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center border-bottom pb-3">
                        <h6 class="mb-3">${assetTool.material_name}</h6>
                        <h4 class="mb-0 fw-bold text-black">${assetTool.material_count}</h4>
                    </div>
                `;
            }).join('');

            $('#assetsToolsList').html(htmlContent);
            $('.assetsToolsList').removeClass('d-none');
        } else {
            $('.assetsToolsList').addClass('d-none');
        }
    }
</script>