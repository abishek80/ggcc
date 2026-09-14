<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3 mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div>
                    <h4 class="fw-bold mb-1 text-dark">Website Enquiries</h4>
                    <p class="text-muted mb-0 small">List of all incoming website form submissions ordered by recent first</p>
                </div>
                <div>
                    <span class="badge bg-label-primary px-3 py-2 fs-6">
                        Total Enquiries: <?php echo !empty($enquiryList) ? count($enquiryList) : 0; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered align-middle">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date & Time</th>
                            <th>Client & Contact Details</th>
                            <th>Service & Location</th>
                            <th>Project Details & Source Page</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($enquiryList)) {
                            $i = 1;
                            foreach ($enquiryList as $row) { 
                        ?>
                            <tr id="enquiryRow_<?php echo $row->id; ?>">
                                <td><?php echo $i++; ?></td>
                                <td>
                                    <span class="fw-semibold text-dark"><?php echo date('d M Y', strtotime($row->created_at)); ?></span>
                                    <br><small class="text-dark"><?php echo date('h:i A', strtotime($row->created_at)); ?></small>
                                </td>
                                <td>
                                    <strong class="text-primary d-block mb-1 fs-6"><?php echo htmlspecialchars($row->full_name); ?></strong>
                                    <div class="mb-1"><a href="tel:<?php echo htmlspecialchars($row->phone); ?>" class="fw-semibold text-dark"><?php echo htmlspecialchars($row->phone); ?></a></div>
                                    <div><a href="mailto:<?php echo htmlspecialchars(strtolower($row->email)); ?>" class="small text-dark text-lowercase"><?php echo htmlspecialchars(strtolower($row->email)); ?></a></div>
                                </td>
                                <td>
                                    <div class="mb-1"><span class="badge bg-label-primary"><?php echo htmlspecialchars($row->service ? $row->service : 'General Enquiry'); ?></span></div>
                                    <div><span class="badge bg-label-info"><?php echo htmlspecialchars($row->location ? $row->location : 'N/A'); ?></span></div>
                                </td>
                                <td style="max-width:320px; white-space:normal;">
                                    <div><?php echo nl2br(htmlspecialchars($row->message ? $row->message : '-')); ?></div>
                                    <div class="mt-2"><small class="badge bg-label-secondary"><?php echo htmlspecialchars($row->source_page ? $row->source_page : 'Website'); ?></small></div>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="javascript:void(0);" data-id="<?php echo $row->id; ?>" data-rowid="<?php echo $row->id; ?>" data-tablename="website_enquiries" data-link="<?php echo base_url(); ?>admin/enquiries" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No website enquiries found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>