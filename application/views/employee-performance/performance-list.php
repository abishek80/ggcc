<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Performance List</h4>
                <a href="<?php echo base_url(); ?>employee/performance-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Performance</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th class="w-min-40">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($performanceList as $row) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->employee_name; ?></td>
                                <td><?php echo $row->designation; ?></td>
                                <td>
                                    <a href="javascript:void(0);" class="box-hover getEmployeeId" data-employeeid="<?php echo $row->employee_id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
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
                <div id="employeePerformance" class="row gx-3 gy-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getEmployeeId", function(e){
        var employeeId = $(this).data("employeeid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>employee/getEmployeePerformanceDetail',
            dataType: "json",
            data: {employeeId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.employeeName + ' Performance Report</h5>');
                    
                var employeePerformanceHtml = '';
                data.employeePerformanceData.forEach(function(item) {
                    employeePerformanceHtml += '<div class="col-lg-3 col-md-4 col-sm-6 text-center">';
                    employeePerformanceHtml += '<h5 class="text-capitalize fw-bold text-black mb-2">' + item.performance_date + '</h5>';
                    employeePerformanceHtml += '<h6 class="text-capitalize text-black mb-2">' + item.rating + '</h6>';
                    employeePerformanceHtml += '<h6 class="text-capitalize text-black mb-0">' + item.remarks + '</h6>';
                    employeePerformanceHtml += '</div>';
                });

                $('#employeePerformance').html(employeePerformanceHtml);
            }
        });
        e.preventDefault();
        return false;
    });
</script>