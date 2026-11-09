<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php if ($isAdminLevel) { ?>
        <div class="card p-3 mb-3">
            <div class="row g-3 align-items-end">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Branch Incharge</label>
                    <select id="branchInchargeSelect" class="form-select select2">
                        <option value="">Select Branch Incharge</option>
                        <?php foreach ($branchInchargeDropdown as $row) { ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $branchInchargeId) { echo 'selected="true"'; } ?>><?php echo $row->branch_name . ' - ' . $row->incharge_name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($branchInchargeId) { ?>
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($presentMonthList as $row) { ?>
                <a href="<?php echo base_url() . 'attendance/branch-attendance-list/' . $branchInchargeId . '/' . $year . '/' . $row->month; ?>" class="d-block card px-5 py-2 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                    <p class="mb-0 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                </a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $month; ?> - Branch Attendance</h4>
                <a href="<?php echo base_url() . 'attendance/branch-attendance-add/' . $branchInchargeId; ?>" class="btn btn-primary px-4 py-2 rounded text-white">Add Attendance</a>
            </div>
            <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
                <table class="table table-bordered text-center align-middle" id="branchAttendanceTable" style="min-width: max-content;">
                    <thead class="table-light sticky-top" style="z-index: 2;">
                        <tr>
                            <th>S. No</th>
                            <th style="position: sticky; left: 0; background: #f8f9fa; z-index: 3;">Employee Name</th>
                            <?php if(isset($daysInMonth) && $daysInMonth > 0) {
                                for($d = 1; $d <= $daysInMonth; $d++) {
                                    $dayOfWeek = date('w', strtotime("$year-" . date('m', strtotime("1 $month $year")) . "-$d"));
                                    $weekendClass = ($dayOfWeek == 0 || $dayOfWeek == 6) ? ' class="weekend-col"' : '';
                                    echo "<th$weekendClass>$d</th>";
                                }
                            } ?>
                            <th>Total <br> Present</th>
                            <th>Total <br> Absent</th>
                            <th>Total <br> OT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($employeeAttendanceList as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td style="position: sticky; left: 0; background: #fff; z-index: 1;" class="text-start">
                                <span class="fw-semibold text-nowrap">
                                    <?php echo $row->employee_name; ?>
                                    <br>
                                    <?php echo $row->designation; ?>
                                </span>
                            </td>
                            <?php if(isset($daysInMonth) && $daysInMonth > 0) {
                                for($d = 1; $d <= $daysInMonth; $d++) {
                                    $status = isset($row->daily_attendance[$d]) ? $row->daily_attendance[$d] : '-';
                                    $class = '';
                                    $dayOfWeek = date('w', strtotime("$year-" . date('m', strtotime("1 $month $year")) . "-$d"));
                                    if($dayOfWeek == 0 || $dayOfWeek == 6) $class .= ' weekend-col';
                                    if(strpos($status, 'P') !== false) $class .= ' text-success fw-bold';
                                    else if(strpos($status, 'A') !== false) $class .= ' text-danger fw-bold';
                                    else if(strpos($status, 'OT') !== false) $class .= ' text-warning fw-bold';
                                    echo "<td class='$class'>$status</td>";
                                }
                            } ?>
                            <td class="fw-bold bg-light"><?php echo $row->present_count; ?></td>
                            <td class="fw-bold bg-light"><?php echo $row->leave_count; ?></td>
                            <td class="fw-bold bg-light"><?php echo $row->ot_count; ?></td>
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
    $('#branchInchargeSelect').change(function () {
        var selectedId = $(this).val();
        if (selectedId) {
            window.location.href = "<?php echo base_url(); ?>attendance/branch-attendance-list/" + selectedId;
        }
    });

    function exportTableToExcel(tableID, filename = ''){
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);

        var tableClone = tableSelect.cloneNode(true);

        var allCells = tableClone.querySelectorAll('th, td');
        for(var j=0; j<allCells.length; j++){
            allCells[j].style.position = '';
            allCells[j].style.left = '';
            allCells[j].style.zIndex = '';
            allCells[j].style.background = '';
        }

        var tableHTML = tableClone.outerHTML;
        filename = filename ? filename+'.xls' : 'excel_data.xls';

        var blob = new Blob(['﻿', tableHTML], { type: dataType });

        if (window.navigator && window.navigator.msSaveOrOpenBlob) {
            window.navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(a.href);
        }
    }
</script>
