<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <?php foreach ($yearList as $year) { ?>
                <a href="<?php echo base_url(); ?>admin/event-list/<?php echo $year; ?>" class="<?php echo ($activeLink == $year) ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0"><?php echo $year; ?></a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0 text-black">Yearly Plan List</h4>
                <a href="<?php echo base_url() . 'admin/event-add/' . $activeLink; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Yearly Plan</a>
            </div>
        </div>
        <?php if ($monthEventList) { ?>
            <div class="row g-3 mt-1">
                <?php foreach ($monthEventList as $row) { ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 text-center">
                        <div class="d-block bg-white card p-3">
                            <h4 class="mb-3 fw-semibold text-capitalize"><?php echo $row->month?></h4>
                            <div class="d-flex gap-3 justify-content-between align-items-center">
                                <a href="#" class="getEventId" data-year="<?php echo $row->year; ?>" data-month="<?php echo $row->month; ?>" data-bs-toggle="modal" data-bs-target="#view_modal">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <i class="bx bx-show-alt pe-1"></i>
                                        <span>View</span>
                                    </div>
                                </a>
                                <a href="<?php echo base_url() . 'admin/event-view/' . $row->year . '/' . $row->month; ?>">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <i class="bx bx-edit-alt pe-1"></i>
                                        <span>Edit</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h4 class="mb-0 mt-4 text-center fw-bold text-black"> No Events Found </h4>
        <?php } ?>
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
                <div id="yearlyPlanList" class="row g-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getEventId", function(e){
        var year = $(this).data("year");
        var month = $(this).data("month");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>admin/getYearlyPlanDetail',
            dataType: "json",
            data: {year, month},
            success: function (data) {
                $('#branchDetail').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.month + ' - Event List</h5>');

                updateYearlyPlanList(data.yearlyPlanList);
            }
        });
        e.preventDefault();
        return false;
    });

    // Utility Function to Update yearly plan list
    function updateYearlyPlanList(yearlyPlanList) {
        if (Array.isArray(yearlyPlanList) && yearlyPlanList.length > 0) {
            const htmlContent = yearlyPlanList.map(event => {
                return `
                    <div class="col-xl-3 col-md-4 col-6 text-center">
                        <h5 class="mb-2">${event.dateFormat}</h5>
                        <h5 class="mb-2 fw-bold text-black">${event.title}</h5>
                        <h6 class="mb-0 fw-bold text-black">${event.description}</h6>
                        <p class="mb-0 mt-2 fw-bold text-black text-capitalize">Plan Type: ${event.plan_type}</p>
                        <p class="mb-0 mt-2 fw-bold text-black text-capitalize">${event.status.replace('_', ' ')}</p>
                    </div>
                `;
            }).join('');

            $('#yearlyPlanList').html(htmlContent);
            $('.yearlyPlanList').removeClass('d-none');
        } else {
            $('.yearlyPlanList').addClass('d-none');
        }
    }
</script>