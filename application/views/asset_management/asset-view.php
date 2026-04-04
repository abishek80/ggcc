<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'stock/asset-list/' . $assetType; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $branchName . ' - ' . $assetType; ?> List</h4>
                </div>
                <a href="<?php echo base_url() . 'stock/asset-add/' . $assetType . '/' . $branchId; ?>" class="btn btn-primary px-4 py-2 rounded text-white text-capitalize">Add <?php echo $assetType; ?></a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-75">S. No</th>
                            <th>Material Name</th>
                            <th>Material Count</th>
                            <th class="w-min-100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($assetsToolsList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->material_name; ?></td>
                            <td><?php echo $row->material_count; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'stock/asset-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="asset_management" data-link="<?php echo base_url() . 'stock/asset-view/' . $assetType . '/' . $row->branch_id; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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