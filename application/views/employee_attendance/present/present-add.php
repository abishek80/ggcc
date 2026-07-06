<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="attendanceGridForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>attendance/attendance-employee-list" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black">Monthly Attendance Sheet</h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save Attendance</button>
                </div>
            </div>
            
            <div class="row g-3 mb-4">
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Year <span class="text-danger">*</span></label>
                    <select name="year" id="year" class="form-select filter-trigger">
                        <option value="">Select Year</option>
                        <?php 
                        $currentYear = date('Y');
                        for($i = $currentYear - 2; $i <= $currentYear; $i++) {
                            echo "<option value='$i'".($i == $currentYear ? ' selected' : '').">$i</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Month <span class="text-danger">*</span></label>
                    <select name="month" id="month" class="form-select filter-trigger">
                        <option value="">Select Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Zone <span class="text-danger">*</span></label>
                    <select name="zone" id="zone" class="form-select filter-trigger">
                        <option value="">Select Zone</option>
                        <option value="chennai" <?php if(isset($zone) && $zone == 'chennai') { echo 'selected'; } ?>>Chennai</option>
                        <option value="mumbai" <?php if(isset($zone) && $zone == 'mumbai') { echo 'selected'; } ?>>Mumbai</option>
                        <option value="indore" <?php if(isset($zone) && $zone == 'indore') { echo 'selected'; } ?>>Indore</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center align-middle" id="attendanceTable">
                            <thead class="table-light sticky-top" id="attendanceGridHeader">
                                <tr>
                                    <th>Please select Year, Month and Zone</th>
                                </tr>
                            </thead>
                            <tbody id="attendanceGridBody">
                                <!-- Data will be loaded here via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<style>
    /* Styling to make it look more like excel */
    #attendanceTable th, #attendanceTable td {
        min-width: 50px;
        padding: 5px;
        border: 1px solid #ddd;
    }
    #attendanceTable th:first-child, #attendanceTable td:first-child {
        min-width: 200px;
        text-align: left;
        position: sticky;
        left: 0;
        background: #fff;
        z-index: 1;
    }
    #attendanceTable th:first-child {
        z-index: 2;
    }
    .att-select {
        border: none;
        background: transparent;
        width: 100%;
        text-align: center;
        appearance: none;
        -webkit-appearance: none;
        cursor: pointer;
    }
    .att-select:focus {
        outline: 1px solid #0d6efd;
    }
    .att-P { color: green; font-weight: bold; }
    .att-A { color: red; font-weight: bold; }
</style>

<script>
$(document).ready(function() {
    // Current month auto-selection
    const currentMonth = new Date().getMonth() + 1;
    $('#month').val(currentMonth.toString().padStart(2, '0'));

    $('.filter-trigger').change(function() {
        loadAttendanceGrid();
    });

    function loadAttendanceGrid() {
        var year = $('#year').val();
        var month = $('#month').val();
        var zone = $('#zone').val();

        if (year && month && zone) {
            $('#attendanceGridHeader').html('<tr><th>Loading...</th></tr>');
            $('#attendanceGridBody').html('');

            $.ajax({
                url: "<?php echo base_url('attendance/getMonthlyAttendanceGrid'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    year: year,
                    month: month,
                    zone: zone
                },
                success: function (res) {
                    if (res.status === 'success') {
                        $('#attendanceGridHeader').html(res.thead);
                        $('#attendanceGridBody').html(res.tbody);
                    } else {
                        $('#attendanceGridHeader').html('<tr><th class="text-danger">Failed to load data</th></tr>');
                    }
                },
                error: function() {
                    $('#attendanceGridHeader').html('<tr><th class="text-danger">Error fetching data</th></tr>');
                }
            });
        }
    }
    
    // Automatically load if zone is predefined
    if($('#zone').val() !== '') {
        loadAttendanceGrid();
    }

    // Save grid
    $("#attendanceGridForm").submit(function (e) {
        e.preventDefault();
        
        var year = $('#year').val();
        var month = $('#month').val();
        var zone = $('#zone').val();

        if (!year || !month || !zone) {
            alert('Please select Year, Month and Zone');
            return false;
        }
        
        var formData = new FormData(this);
        
        $.ajax({
            url: '<?php echo base_url(); ?>attendance/saveMonthlyAttendanceGrid',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            method: 'POST',
            dataType: 'json',
            beforeSend: function () {
                $(".loader").show();
            },
            success: function (data) {
                $(".loader").hide();
                toastr.options = {
                    'closeButton': true,
                    'positionClass': 'toast-top-right',
                    'timeOut': '3000',
                }
                if (data.isError) {
                    toastr.error(data.message);
                }
                else {
                    toastr.success(data.message);
                }
            },
            error: function() {
                $(".loader").hide();
                alert("Error saving data");
            }
        });
    });

    // Color code selects when changed
    $(document).on('change', '.att-select', function() {
        $(this).removeClass('att-P att-A');
        var val = $(this).val();
        if(val == 'present') $(this).addClass('att-P');
        else if(val == 'absent') $(this).addClass('att-A');
    });
});
</script>