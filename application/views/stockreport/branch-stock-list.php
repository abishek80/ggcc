<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Branch Stock List</h4>
                <div class="d-flex gap-3">
                    <a href="javascript:window.close();" class="btn btn-dark">Close</a>
                    <a href="javascript:void(0);" id="downloadStockReportPDF" class="btn btn-primary">Download PDF</a>
                    <a href="javascript:void(0);" id="downloadStockReportExcel" class="btn btn-success">Download Excel</a>
                </div>
            </div>
            <div class="downloadStockReportPage table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-white">Code</th>
                            <th class="text-white">Material Name</th>
                            <th class="text-white">Category</th>
                            <th class="text-white">Type</th>
                            <?php foreach ($materialBranchList as $branch) { ?>
                                <th class="text-white"><?php echo htmlspecialchars($branch->branch); ?></th>
                            <?php } ?>
                            <th class="text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $uniqueMaterials = []; // Array to track unique materials

                        foreach ($materialStockList as $stock) { 
                            // Create a unique key using material_name, category, and type
                            $key = $stock->material_name . '|' . $stock->category . '|' . $stock->type;

                            if (!isset($uniqueMaterials[$stock->material_id])) {
                                $uniqueMaterials[$stock->material_id] = true;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($stock->material_code); ?></td>
                                <td><?php echo htmlspecialchars($stock->material_name); ?></td>
                                <td><?php echo htmlspecialchars($stock->category); ?></td>
                                <td><?php echo htmlspecialchars($stock->type); ?></td>
                            
                                <?php 
                                $materialTotal = 0;
                            
                                foreach ($materialBranchList as $branch) { 
                                    $balance_stock = isset($branchMaterialCountList[$stock->material_id][$branch->branch_id]) 
                                                    ? $branchMaterialCountList[$stock->material_id][$branch->branch_id] 
                                                    : 0;
                                    $materialTotal += $balance_stock;
                                ?>
                                    <td><?php echo $balance_stock; ?></td>
                                <?php } ?>
                            
                                <td><strong><?php echo $materialTotal; ?></strong></td>
                            </tr>
                        <?php 
                            } // End of if condition
                        } // End of foreach loop
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Include the xlsx library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<!-- Include jsPDF and autoTable libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>

<script>
    document.getElementById("downloadStockReportExcel").addEventListener("click", function () {
        // Select the div you want to download as Excel
        var element = document.querySelector('.downloadStockReportPage table');
        
        // Create a new workbook
        var wb = XLSX.utils.table_to_book(element, {sheet: "Stock Report"});
        
        // Define the file name
        var fileName = 'overall-stock-report.xlsx';
        
        // Export the table as an Excel file
        XLSX.writeFile(wb, fileName);
    });


    document.getElementById("downloadStockReportPDF").addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('l', 'mm', 'a4'); // Landscape mode

        // Add title
        doc.setFontSize(14);
        doc.text("Branch Stock List", 14, 15);

        // Get table data
        var element = document.querySelector('.downloadStockReportPage table');

        // Convert table to autoTable
        doc.autoTable({
            html: element,
            startY: 20, // Position below the title
            theme: 'grid',
            styles: {
                fontSize: 8,
                cellPadding: 2,
                valign: 'middle',
                halign: 'center',
            },
            headStyles: {
                fillColor: [35, 52, 70], // Dark header background
                textColor: 255, // White text
                fontStyle: 'bold',
            },
            columnStyles: {
                0: { cellWidth: 15 }, // ID column width
                1: { cellWidth: 40 }, // Material Name width
                2: { cellWidth: 30 }, // Category width
                3: { cellWidth: 25 }, // Type width
            },
            margin: { top: 20 },
        });

        // Save as PDF
        doc.save("overall-stock-report.pdf");
    });
</script>


<style>
    .table-responsive {
        max-height: 98vh; /* Adjust height as needed */
        overflow-y: auto;
        position: relative;
    }

    .table thead {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 2;
    }

    /* Fix the first three columns */
    .table td:first-child, .table th:first-child {
        border: 1px solid rgb(104, 104, 104);
        background: #233446;
        color: #fff;
        position: sticky;
        left: 0;
        z-index: 1;
    }

    .table td:nth-child(2), .table th:nth-child(2) {
        border: 1px solid rgb(104, 104, 104);
        background: #233446;
        color: #fff;
        position: sticky;
        left: 63px; /* Adjust based on column width */
        z-index: 1;
    }

    .table td:nth-child(3), .table th:nth-child(3) {
        border: 1px solid rgb(104, 104, 104);
        background: #233446;
        color: #fff;
        position: sticky;
        left: 166px; /* Adjust based on column width */
        z-index: 1;
    }

    .table td:nth-child(4), .table th:nth-child(4) {
        border: 1px solid rgb(104, 104, 104);
        background: #233446;
        color: #fff;
        position: sticky;
        left: 272px; /* Adjust based on column width */
        z-index: 1;
    }

    .table td  {
        background-color: #fff;
        border: 1px solid rgb(104, 104, 104);
        text-align: center;
    }

    .table th  {
        border: 1px solid rgb(255, 255, 255);
        text-align: center;
    }
</style>
