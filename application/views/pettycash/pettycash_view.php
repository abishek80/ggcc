<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3 mb-3">
            <?php foreach ($pettycashMonthList as $row) { ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <a href="<?php echo base_url() . 'bill/pettycash-view/' . $year . '/' . $branchId . '/' . $row->month; ?>" class="card p-3 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                        <p class="mb-2 pb-1 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                        <h5 class="mb-0 amount-format fw-semibold <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->amount; ?></h5>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'bill/pettycash-list/' . $year; ?>" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $branchName; ?> / <?php echo $month; ?> - Pettycash List</h4>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url() . 'bill/pettycash-add/' . $year . '/' . $branchId . '/' . $month; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Pettycash</a>
                    <button id="reportButton" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Export</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Date</th>
                            <th>Pettycash Title</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($pettycashList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->paid_dateFormat; ?></td>
                                <td><?php echo $row->pettycash_title; ?></td>
                                <td class="amount-format"><?php echo $row->amount; ?></td>
                                <td><?php echo $row->remarks; ?></td>
                                <td class="px-2">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="<?php echo base_url() . 'bill/pettycash-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                        <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="branch_pettycash" data-link="<?php echo base_url() . 'bill/pettycash-view/' . $year . '/' . $branchId . '/' . $month; ?>" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
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


<script>
    $('#reportButton').on('click', function() {
        // Get selected values from dropdowns
        var year = <?php echo $year; ?>;
        var branchId = <?php echo $branchId; ?>;
        var month = "<?php echo $month; ?>";
        var branchName = "<?php echo $branchName; ?>";

        $.ajax({
            url: '<?php echo base_url(); ?>report/getPettycashReport',
            type: 'post',
            data: {
                year: year,
                branchId: branchId,
                month: month,
                branchName: branchName
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