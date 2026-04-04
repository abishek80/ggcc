<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">File Manage List</h4>
                <a href="<?php echo base_url(); ?>file-manage-add" class="btn btn-primary px-4 py-2 rounded text-white">Add File Manage</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>File Name</th>
                            <th>File Doc</th>
                            <th>File URL</th>
                            <th>Remark</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($fileManageList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->file_name; ?></td>
                            <td>
                                <?php if($row->file_doc) { ?>
                                    <a href="<?php echo base_url() . $row->file_doc; ?>" class="iframe-popup doc-hover">View Document</a>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($row->file_url) { ?>
                                    <a href="<?php echo $row->file_url; ?>" target="_blank" class="doc-hover">View URL</a>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                            </td>
                            <td><?php echo $row->remarks; ?></td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'file-manage-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="file_manage" data-link="<?php echo base_url(); ?>file-manage-list" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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