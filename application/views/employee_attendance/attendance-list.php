<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex gap-3 flex-wrap mb-3">
            <?php foreach ($presentMonthList as $row) { ?>
                <a href="<?php echo base_url() . 'attendance/attendance-list/' . $year . '/' . $row->month; ?>" class="d-block card px-5 py-2 text-center <?php echo ($month == $row->month) ? 'bg-primary' : 'bg-white'; ?> shadow shadow-sm lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">
                    <p class="mb-0 text-capitalize <?php echo ($month == $row->month) ? 'text-white' : 'text-black'; ?>"><?php echo $row->month?></p>
                </a>
            <?php } ?>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black text-capitalize"><?php echo $month; ?> - Employee Attendance List</h4>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-success" onclick="exportTableToExcel('attendanceTable', 'Employee_Attendance_<?php echo $month; ?>_<?php echo $year; ?>')">
                        <i class="bx bx-export me-1"></i> Export Excel
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Add Employee Present </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'attendance/present-add/' . $year . '/' . $month . '/chennai'; ?>">Chennai</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'attendance/present-add/' . $year . '/' . $month . '/mumbai'; ?>">Mumbai</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url() . 'attendance/present-add/' . $year . '/' . $month . '/indore'; ?>">Indore</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle" id="attendanceTable" style="min-width: max-content;">
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
                            <th class="w-min-75">Action</th>
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
                                <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $row->employee_id; ?>" class="a-hover fw-semibold text-nowrap">
                                    <?php echo $row->employee_name; ?>
                                    <br>
                                    <?php echo $row->designation; ?>
                                </a>
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
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo base_url() . 'attendance/attendance-view/' . $year . '/' . $month . '/' . $row->employee_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
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
function exportTableToExcel(tableID, filename = ''){
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    
    // Clone table to safely manipulate it before exporting
    var tableClone = tableSelect.cloneNode(true);
    
    // Remove the last column (Action) from the header
    var ths = tableClone.querySelectorAll('thead tr th');
    if(ths.length > 0) ths[ths.length - 1].remove();
    
    // Remove the last column (Action) from all rows
    var trs = tableClone.querySelectorAll('tbody tr');
    for(var i=0; i<trs.length; i++){
        var tds = trs[i].querySelectorAll('td');
        if(tds.length > 0) tds[tds.length - 1].remove();
    }
    
    // Remove sticky positioning styles from clone
    var allCells = tableClone.querySelectorAll('th, td');
    for(var j=0; j<allCells.length; j++){
        allCells[j].style.position = '';
        allCells[j].style.left = '';
        allCells[j].style.zIndex = '';
        allCells[j].style.background = '';
    }
    
    var tableHTML = tableClone.outerHTML;
    filename = filename ? filename+'.xls' : 'excel_data.xls';
    
    var blob = new Blob(['\ufeff', tableHTML], { type: dataType });
    
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