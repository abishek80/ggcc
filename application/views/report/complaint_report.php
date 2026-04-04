<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form action="<?php echo base_url(); ?>report/complaint-report" method="get">
            <div class="card px-lg-4 px-3 pb-lg-4 pb-3">
                <div class="text-center border-bottom mb-lg-4 mb-3 pt-lg-4 py-3 d-flex justify-content-between align-items-center sticky-head flex-wrap gap-3">
                    <h4 class="fw-bold mb-0 text-black">Complaint Report</h4>
                    <div class="d-flex gap-3 justify-content-end">
                        <a href="<?php echo base_url(); ?>report/complaint-report" class="btn btn-secondary px-4 py-2 rounded border-0 fw-bold text-white">Reset</a>
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
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Employee Name</label>
                        <select name="employee_name" id="employee_name" class="form-select select2">
                            <option value="">Select Employee Name</option>
                            <?php foreach ($inchargeDropdown as $row) { ?>
                                <option value="<?php echo $row->employee_name; ?>" <?php if($employeeName == $row->employee_name) { echo 'selected'; } ?>><?php echo $row->employee_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Work Category</label>
                        <select name="work_type" id="work_type" class="form-select">
                            <option value="">Select Work Category</option>
                            <option value="maintenance" <?php if($workCategory == 'maintenance') { echo 'selected'; } ?>>Maintenance</option>
                            <option value="earth_renewal" <?php if($workCategory == 'earth_renewal') { echo 'selected'; } ?>>Earth Renewal</option>
                            <option value="project_work" <?php if($workCategory == 'project_work') { echo 'selected'; } ?>>Project Work</option>
                            <option value="private_work" <?php if($workCategory == 'private_work') { echo 'selected'; } ?>>Private Work</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="w-100 fw-bold text-black mb-2 fs-14px">Complaint Status</label>
                        <select name="complaint_status" id="complaint_status" class="form-select">
                            <option value="">Select Status</option>
                            <option value="not_started" <?php if($complaintStatus == 'not_started') { echo 'selected'; } ?>>Not Started</option>
                            <option value="inprogress" <?php if($complaintStatus == 'inprogress') { echo 'selected'; } ?>>Inprogress</option>
                            <option value="completed" <?php if($complaintStatus == 'completed') { echo 'selected'; } ?>>Completed</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <?php if($complaintReportList) { ?>
            <div class="mt-3 card p-3">
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <h4 class="fw-bold mb-0 text-black">Complaint Report List</h4>
                    <button id="reportButton" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Export</button>
                </div>
                <div class="table-responsive">
                    <table class="zero_config table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="w-min-40">S. No</th>
                                <th>Date & Work Type</th>
                                <th>Zone & Branch</th>
                                <th>Outlet Name & Location</th>
                                <th>Description</th>
                                <th>Job Report & Remarks</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($complaintReportList as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <p class="mb-1"><?php echo htmlspecialchars($row['date'] ?? '-'); ?></p>
                                        <p class="mb-0"><?php echo htmlspecialchars($row['work_type'] ?? '-'); ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><?php echo htmlspecialchars($row['zone'] ?? '-'); ?></p>
                                        <p class="mb-0"><?php echo htmlspecialchars($row['branch'] ?? '-'); ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><?php echo htmlspecialchars($row['outlet_name'] ?? '-'); ?></p>
                                        <p class="mb-0"><?php echo htmlspecialchars($row['outlet_location'] ?? '-'); ?></p>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['description'] ?? '-'); ?></td>
                                    <td>
                                        <p class="mb-1"><?php echo htmlspecialchars($row['job_remarks'] ?? '-'); ?></p>
                                        <?php if (!empty($row['job_report'])) { ?>
                                            <a href="<?php echo base_url() . htmlspecialchars($row['job_report']); ?>" 
                                            class="iframe-popup d-block mb-0 doc-hover">
                                                View Job Report
                                            </a>
                                        <?php } else { ?>
                                            <span>-</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                        switch ($row['status']) {
                                            case 'not_started':
                                                echo '<span class="text-danger">Not Started</span>';
                                                break;
                                            case 'inprogress':
                                                echo '<span class="text-warning">Inprogress</span>';
                                                break;
                                            case 'completed':
                                                echo '<span class="text-success">Completed</span>';
                                                break;
                                            default:
                                                echo '<span>-</span>';
                                        }
                                        ?>
                                    </td>
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
        var employee_name = $('#employee_name').val();
        var work_type = $('#work_type').val();
        var complaint_status = $('#complaint_status').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        $.ajax({
            url: '<?php echo base_url(); ?>report/getComplaintReport',
            type: 'post',
            data: {
                branch: branch,
                employee_name: employee_name,
                work_type: work_type,
                complaint_status: complaint_status,
                from_date: from_date,
                to_date: to_date
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