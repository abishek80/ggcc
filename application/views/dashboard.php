<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3">
            <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="<?php echo base_url(); ?>complaint/complaint-list">
                        <div class="card h-100">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="d-block mb-2 text-black">Complaint Count</span>
                                    <h4 class="card-title mb-0"><?php echo count($complaintList); ?></h4>
                                </div>
                                <div class="card-title mb-0">
                                    <div class="avatar flex-shrink-0 bg-label-success d-flex justify-content-center align-items-center rounded-2">
                                        <i class="bx bx-notepad"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <?php if(in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) { ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="<?php echo base_url(); ?>purchase/po-list/ggcc">
                        <div class="card h-100">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="d-block mb-2 text-black">PO Count</span>
                                    <h4 class="card-title mb-0"><?php echo count($purchaseOrderList); ?></h4>
                                </div>
                                <div class="card-title mb-0">
                                    <div class="avatar flex-shrink-0 bg-label-info d-flex justify-content-center align-items-center rounded-2">
                                        <i class="bx bx-news"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <?php if(in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) { ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="<?php echo base_url(); ?>vehicle/vehicle-list">
                        <div class="card h-100">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="d-block mb-2 text-black">Vehicle Count</span>
                                    <h4 class="card-title mb-0"><?php echo count($vehicleList); ?></h4>
                                </div>
                                <div class="card-title mb-0">
                                    <div class="avatar flex-shrink-0 bg-label-danger d-flex justify-content-center align-items-center rounded-2">
                                        <i class="bx bx-car"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
                <div class="col-lg-3 col-sm-6">
                    <a href="<?php echo base_url(); ?>employee/employee-list">
                        <div class="card h-100">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="d-block mb-2 text-black">Employee Count</span>
                                    <h4 class="card-title mb-0"><?php echo count($employeeList); ?></h4>
                                </div>
                                <div class="card-title mb-0">
                                    <div class="avatar flex-shrink-0 bg-label-primary d-flex justify-content-center align-items-center rounded-2">
                                        <i class="bx bx-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
            <div class="mt-4">
                <h4 class="fw-bold mb-3 text-black">Recent Complaint List</h4>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="assurans_table table table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Date & <br> Work Type</th>
                                    <th>Assign To & <br> Branch</th>
                                    <th>Outlet Name & <br> Location</th>
                                    <th>Description</th>
                                    <th>Givener Name & <br> Number</th>
                                    <th>Job Report & <br> Remarks</th>
                                    <th>Status</th>
                                    <?php if(in_array('admin', $userPermission) || in_array('complaint_management', $userPermission)) { ?>
                                        <th class="w-min-50 text-center">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows rendered by DataTables Ajax -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(in_array('admin', $userPermission) || in_array('purchase_management', $userPermission)) { ?>
            <div class="mt-4">
                <h4 class="fw-bold mb-3 text-black">Purchase Order List</h4>
                <div class="row g-3 mb-3">
                    <div class="col-lg col-md-4 col-6">
                        <div class="card p-3 text-center border-primary border border-4 border-end-0 border-start-0 border-top-0">
                            <p class="mb-3 text-black">Purchase Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallPoAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="card p-3 text-center border-danger border border-4 border-end-0 border-start-0 border-top-0">
                            <p class="mb-3 text-black">Balance Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $balancePoAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="card p-3 text-center border-secondary border border-4 border-end-0 border-start-0 border-top-0">
                            <p class="mb-3 text-black">Security Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $securityAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="card p-3 text-center border-info border border-4 border-end-0 border-start-0 border-top-0">
                            <p class="mb-3 text-black">Estimation Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallEstimationAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="card p-3 text-center border-warning border border-4 border-end-0 border-start-0 border-top-0">
                            <p class="mb-3 text-black">Taxinvoice Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallTaxinvoiceAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="card p-3 text-center border-success border border-4 border-end-0 border-start-0 border-top-0">
                            <p class="mb-3 text-black">Bill Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $overallRetentionAmount; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Zone & Branch Name</th>
                                    <th>Purchase Order Amt</th>
                                    <th>Security Amt</th>
                                    <th>Est Amt</th>
                                    <th>Tax Amt</th>
                                    <th>Retention Amt</th>
                                    <th>Balance Amt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($allBranchPurchaseOrderList as $row) { 
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td>
                                            <p class="mb-1"><?php echo $row->zone; ?></p>
                                            <p class="mb-0"><?php echo $row->branch; ?></p>
                                        </td>
                                        <td class="amount-format"><?php echo $row->branch_po_amount; ?></td>
                                        <td class="amount-format"><?php echo $row->security_amount; ?></td>
                                        <td class="amount-format"><?php echo $row->branch_estimation_amount; ?></td>
                                        <td class="amount-format"><?php echo $row->branch_taxinvoice_amount; ?></td>
                                        <td class="amount-format"><?php echo $row->branch_retention_amount; ?></td>
                                        <td class="amount-format"><?php echo $row->branch_balance_po_amount; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission)) { ?>
            <div class="mt-4">
                <h4 class="fw-bold mb-3 text-black">Vehicle List</h4>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Zone & Branch Name <br> Status</th>
                                    <th>Vehicle Name & Number</th>
                                    <th>Vehicle Doc</th>
                                    <th class="w-min-75">Insurance</th>
                                    <th class="w-min-75">FC</th>
                                    <th class="w-min-75">PUC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($vehicleList as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <p class="mb-1"><?php echo $row->zone; ?></p>
                                        <p class="mb-1"><?php echo $row->branch_name; ?></p>
                                        <p class="mb-0">
                                            <?php if($row->status == 'active') { ?>
                                                <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle" data-link="<?php echo base_url(); ?>vehicle/vehicle-list" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                            <?php } elseif($row->status == 'inactive') { ?>
                                                <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="vehicle" data-link="<?php echo base_url(); ?>vehicle/vehicle-list" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                            <?php } ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><a href="<?php echo base_url() . 'vehicle/vehicle-service/' . $row->id; ?>" class="a-hover"><?php echo $row->vehicle_name; ?></a></p>
                                        <p class="mb-0"><?php echo $row->vehicle_number; ?></p>
                                        <p class="mb-0"><?php echo $row->owner_name; ?></p>
                                    </td>
                                    <td>
                                        <?php if($row->vehicle_rc) { ?>
                                            <a href="<?php echo base_url() . $row->vehicle_rc; ?>" class="iframe-popup d-block mb-1 doc-hover">View RC</a>
                                        <?php } else { echo '<p class="mb-1 lh-base">-</p>'; } ?>
                                        <?php if($row->vehicle_insurance) { ?>
                                        <a href="<?php echo base_url() . $row->vehicle_insurance; ?>" class="iframe-popup d-block mb-0 doc-hover">View Insurance</a>
                                        <?php } else { echo '<p class="mb-0 lh-base">-</p>'; } ?>
                                        <?php if($row->vehicle_puc_img) { ?>
                                            <a href="<?php echo base_url() . $row->vehicle_puc_img; ?>" class="iframe-popup d-block mb-0 doc-hover">View PUC Doc</a>
                                        <?php } else { echo '<p class="mb-0 lh-base">-</p>'; } ?>
                                    </td>
                                    <td class="date-check" data-date-check="<?php echo $row->renewal_date; ?>"><?php $insuranceDateFormat = new DateTime($row->renewal_date); echo $insuranceDateFormat->format('d - m - Y'); ?></td>
                                    <td class="date-check" data-date-check="<?php echo $row->fc_renewal_date; ?>">
                                        <?php
                                            if ($row->fc_renewal_date != '0000-00-00' && !empty($row->fc_renewal_date)) {
                                                $fcDateFormat = new DateTime($row->fc_renewal_date);
                                                echo $fcDateFormat->format('d - m - Y');
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </td>
                                    <td class="date-check" data-date-check="<?php echo $row->puc_renewal_date; ?>">
                                        <?php
                                            if ($row->puc_renewal_date != '0000-00-00' && !empty($row->puc_renewal_date)) {
                                                $pucDateFormat = new DateTime($row->puc_renewal_date);
                                                echo $pucDateFormat->format('d - m - Y');
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url() . 'vehicle/vehicle-service/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
            <div class="mt-4">
                <h4 class="fw-bold mb-3 text-black">Employee List</h4>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Employee Code</th>
                                    <th>Zone & Branch Name</th>
                                    <th>Employee Name & Designation</th>
                                    <th>Number & Email</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($employeeList as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->employee_code; ?></td>
                                    <td>
                                        <p class="mb-1"><?php echo $row->zone; ?></p>
                                        <p class="mb-0"><?php echo $row->branch_name; ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><?php echo $row->employee_name; ?></p>
                                        <p class="mb-0"><?php echo $row->designation; ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-1"><a href="tel:<?php echo $row->mobile_number; ?>" class="a-hover"><?php echo $row->mobile_number; ?></a></p>
                                        <p class="mb-0"><a href="mailto:<?php echo $row->email; ?>" class="a-hover text-lowercase"><?php echo $row->email; ?></a></p>
                                    </td>
                                    <td>
                                        <?php if($row->status == 'active') { ?>
                                            <a href="javascript:void(0);" data-value="inactive" data-rowid="<?php echo $row->id; ?>" data-tablename="employee" data-link="<?php echo base_url(); ?>admin" class="text-success changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Active </a>
                                        <?php } elseif($row->status == 'inactive') { ?>
                                            <a href="javascript:void(0);" data-value="active" data-rowid="<?php echo $row->id; ?>" data-tablename="employee" data-link="<?php echo base_url(); ?>admin" class="text-danger changeStatus" data-toggle="tooltip" data-placement="top" title="Status Change"> Inactive </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(in_array('admin', $userPermission) || in_array('account_management', $userPermission)) { ?>
            <div class="mt-4">
                <h4 class="fw-bold mb-3 text-black">Party Payment List</h4>
                <div class="row g-3 mb-3">
                    <div class="col-lg-4 col-6">
                        <div class="card p-3 text-center">
                            <p class="mb-3">Total Purchase Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $purchaseAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card p-3 text-center">
                            <p class="mb-3">Total Paid Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $paidAmount; ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card p-3 text-center">
                            <p class="mb-3">Total Balance Amount</p>
                            <h5 class="mb-0 amount-format fw-semibold"><?php echo $balanceAmount; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="nav-align-top mt-4">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item me-2">
                            <button type="button" class="px-5 nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#ggcc_partyList" aria-controls="ggcc_partyList" aria-selected="true"> GGCC Party List </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="px-5 nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#bright_partyList" aria-controls="bright_partyList" aria-selected="true"> Bright Party List </button>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="ggcc_partyList" role="tabpanel">
                            <div class="table-responsive">
                                <table class="zero_config table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="w-min-40">S. No</th>
                                            <th>Party Name</th>
                                            <th>MSME</th>
                                            <th>Purchase Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance Amount</th>
                                            <th class="w-min-50">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($ggccPartyPaymentList as $row) { 
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><a href="<?php echo base_url() . 'bill/party-payment-view/' . $row->company_name . '/' . $row->id; ?>" class="a-hover"><?php echo $row->party_name; ?></a></td>
                                                <td>
                                                    <?php if($row->party_type == 'yes') { ?>
                                                        <span class="text-danger"><?php echo $row->party_type; ?></span>
                                                    <?php } elseif($row->party_type == 'no') { ?>
                                                        <span class="text-success"><?php echo $row->party_type; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td class="amount-format"><?php echo $row->purchase_amount; ?></td>
                                                <td class="amount-format"><?php echo $row->paid_amount; ?></td>
                                                <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                                <td class="px-2">
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <a href="<?php echo base_url() . 'bill/party-payment-view/' . $row->company_name . '/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bright_partyList" role="tabpanel">
                            <div class="table-responsive">
                                <table class="zero_config table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="w-min-40">S. No</th>
                                            <th>Party Name</th>
                                            <th>MSME</th>
                                            <th>Purchase Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Balance Amount</th>
                                            <th class="w-min-50">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($brightPartyPaymentList as $row) { 
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><a href="<?php echo base_url() . 'bill/party-payment-view/' . $row->company_name . '/' . $row->id; ?>" class="a-hover"><?php echo $row->party_name; ?></a></td>
                                                <td>
                                                    <?php if($row->party_type == 'yes') { ?>
                                                        <span class="text-danger"><?php echo $row->party_type; ?></span>
                                                    <?php } elseif($row->party_type == 'no') { ?>
                                                        <span class="text-success"><?php echo $row->party_type; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td class="amount-format"><?php echo $row->purchase_amount; ?></td>
                                                <td class="amount-format"><?php echo $row->paid_amount; ?></td>
                                                <td class="amount-format"><?php echo $row->balance_amount; ?></td>
                                                <td class="px-2">
                                                    <div class="d-flex gap-1 justify-content-center">
                                                        <a href="<?php echo base_url() . 'bill/party-payment-view/' . $row->company_name . '/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(in_array('admin', $userPermission) || in_array('stock_management', $userPermission)) { ?>
            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold mb-0 text-black">Current Stock List</h4>
                    <div class="d-flex gap-3 align-items-center justify-content-end flex-wrap">
                        <div class="w-px-250"> 
                            <select id="branchSelect" class="w-100 form-select select2">
                                <option value="">Select Branch</option>
                                <?php foreach ($branchDropdown as $row) { ?>
                                    <option value="<?php echo $row->id; ?>" <?php if ($row->branch == $branch) { echo 'selected="true"'; } ?>><?php echo $row->branch; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <button id="searchButton" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Stockin Qty</th>
                                    <th>Stockout Qty</th>
                                    <th>Balance Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($currentStockList as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->material_code; ?></td>
                                    <td><?php echo $row->material_name; ?></td>
                                    <td><?php echo $row->category; ?></td>
                                    <td><?php echo $row->type; ?></td>
                                    <td><?php echo $row->available_stockin; ?></td>
                                    <td><?php echo $row->available_stockout; ?></td>
                                    <td><?php echo $row->balance_stock; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-2">
                                            <a href="javascript:void(0);" class="box-hover getMaterialId" data-materialid="<?php echo $row->material_id; ?>" data-bs-toggle="modal" data-bs-target="#view_correctStock" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                            <a href="<?php echo base_url() . 'stock/current-stock-transaction/' . $row->material_id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Transaction Record"> <i class="bx bx-chart"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(empty(in_array('admin', $userPermission))) { ?>
            <div class="card p-3 mt-3">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <h6 class="mb-3 text-capitalize">Name</h6>
                        <h5 class="mb-0 text-capitalize"><?php echo $username; ?></h5>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="mb-3 text-capitalize">Login Code</h6>
                        <h5 class="mb-0 text-capitalize"><?php echo $loginCode; ?></h5>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="mb-3 text-capitalize">Mobile Number</h6>
                        <h5 class="mb-0 text-capitalize"><?php echo $mobile; ?></h5>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="mb-3 text-capitalize">Permission</h6>
                        <div>
                            <?php 
                                $permissionsArray = json_decode($permissions, true); // Convert JSON string to PHP array
                                if (is_array($permissionsArray)) {
                                    foreach ($permissionsArray as $permission) {
                                        // Replace underscores with spaces and capitalize words
                                        echo '<h5 class="mb-2 text-capitalize">'
                                            . ucfirst(str_replace('_', ' ', $permission))
                                            . '</h5>';
                                    }
                                } else {
                                    echo '<h5 class="mb-0">No permissions available.</h5>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if($employeeWorkList) { ?>
                <div class="d-flex gap-3 align-items-center justify-content-between mt-4 mb-3">
                    <h4 class="mb-0 fw-bold">Your Work List</h4>
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Work Type</th>
                                    <th>Reporting Date</th>
                                    <th>Submission Date</th>
                                    <th>Reporting Doc</th>
                                    <th>Description</th>
                                    <th class="w-min-50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                    $i=1;
                                    foreach ($employeeWorkList as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->work_type; ?></td>
                                    <td class="date-check" data-date-check="<?php echo $row->report_date; ?>">
                                        <?php
                                            if ($row->report_date != '0000-00-00' && !empty($row->report_date)) {
                                                $reportDateFormat = new DateTime($row->report_date);
                                                echo $reportDateFormat->format('d - m - Y');
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </td>
                                    <td class="date-check" data-date-check="<?php echo $row->submission_date; ?>">
                                        <?php
                                            if ($row->submission_date != '0000-00-00' && !empty($row->submission_date)) {
                                                $nextReportDateFormat = new DateTime($row->submission_date);
                                                echo $nextReportDateFormat->format('d - m - Y');
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </td>
                                    <td><?php if($row->report_document) { ?><a href="<?php echo base_url() . $row->report_document; ?>" class="doc-hover" target="_blank">View Work Report</a><?php } else { echo '-'; } ?></td>
                                    <td><?php echo $row->description; ?></td>
                                    <td class="px-2">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="javascript:void(0);" class="box-hover getWorkReportId" data-workreportid="<?php echo $row->work_report_id; ?>" data-bs-toggle="modal" data-bs-target="#work_report_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                            <a href="<?php echo base_url() . 'employee/work-report/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="History"> <i class="bx bx-history"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            
            <?php if($dailyTaskList) { ?>
                <div class="d-flex gap-3 align-items-center justify-content-between mt-4 mb-3">
                    <h4 class="mb-0 fw-bold">Daily Task List</h4>
                </div>
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="zero_config table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="w-min-40">S. No</th>
                                    <th>Task Type</th>
                                    <th>Task Date</th>
                                    <th>Description</th>
                                    <th class="w-min-50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                    $i=1;
                                    foreach ($dailyTaskList as $row) { 
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->task_type; ?></td>
                                        <td><?php if($row->latest_task_dateFormat) { echo $row->latest_task_dateFormat; } else { echo '-'; } ?></td>
                                        <td><?php if($row->latest_description) { echo $row->latest_description; } else { echo '-'; } ?></td>
                                        <td class="px-2">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="<?php echo base_url() . 'employee/task-list/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show"></i> </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>

            <?php if($userPayslipList) { ?>
                <h4 class="mt-4 mb-3 fw-bold">Your Payslip List</h4>
                <div class="row g-2">
                    <?php foreach ($userPayslipList as $row) { ?>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                            <a href="<?php echo base_url() . 'employee/payslip-view/' . $row->id; ?>" target="_blank" class="card p-3 text-center d-flex justify-content-between align-items-center flex-column h-100">
                                <h6 class="mb-2 text-capitalize"><?php echo $row->month . ' - ' . $row->year; ?></h6>
                                <p class="mb-0 doc-hover">View Payslip</p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
            <?php if($advancecashList) { ?>
                <h4 class="mt-3 pt-3 mb-3 fw-bold">Your Personal Loan Detail</h4>
                <div class="downloadReportPage">
                    <div class="card p-3 text-center">
                        <h6 class="mb-3 fs-5 fw-semibold pb-3 border-dark border-bottom"><?php echo $employeeName . ' (' . $designation . ')'; ?></h6>
                        <div class="row g-3 mb-4 pb-3">
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="p-3 text-center">
                                    <p class="mb-3">Loan Amount</p>
                                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $advancecashAmount; ?></h5>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6 border-top-0 border-bottom-0 border border-dark">
                                <div class="p-3 text-center">
                                    <p class="mb-3">Paid Amount</p>
                                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $receivedAmount; ?></h5>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="p-3 text-center">
                                    <p class="mb-3">Balance Amount</p>
                                    <h5 class="mb-0 amount-format fw-semibold"><?php echo $notreceivedAmount; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <?php if($advancecashList) { ?>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 fw-bold text-center">Get Loan List</h5>
                                    <table class="table table-border-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($advancecashList as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row->advancecash_date; ?></td>
                                                    <td class="amount-format"><?php echo $row->advancecash_amount; ?></td>
                                                    <td><?php echo $row->remarks; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                            <?php if($advancecashReceivedList) { ?>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 fw-bold text-center">Loan Amount Received List</h5>
                                    <table class="table table-border-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 1;
                                                foreach ($advancecashReceivedList as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row->received_date; ?></td>
                                                    <td class="amount-format"><?php echo $row->received_amount; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-center removePrint mt-3">
                    <a href="javascript:void(0);" id="downloadReportPDF" class="btn btn-success">Download</a>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="content-backdrop fade"></div>
</div>

<div class="modal fade" id="view_complaintModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="complaintCode"></div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Complaint Date & Status</label>
                        <div id="complaintDate" class="text-capitalize text-black"></div>
                        <div id="status" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Zone & Branch Name</label>
                        <div id="zone" class="text-capitalize text-black"></div>
                        <div id="branch" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 outletName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Name & Location</label>
                        <div id="outletName" class="text-capitalize text-black"></div>
                        <div id="outletLocation" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 contactName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Contact Name & Number</label>
                        <div id="contactName" class="text-capitalize text-black"></div>
                        <div id="contactNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 oldOutletName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Name & Location</label>
                        <div id="oldOutletName" class="text-capitalize text-black"></div>
                        <div id="oldOutletLocation" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 oldContactName">
                        <label class="w-100 fw-bold text-black mb-1">Outlet Contact Name & Number</label>
                        <div id="oldContactName" class="text-capitalize text-black"></div>
                        <div id="oldContactNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Givener Name & Number</label>
                        <div id="complainterName" class="text-capitalize text-black"></div>
                        <div id="complainterNumber" class="mt-1 text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Description</label>
                        <div id="description" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By</label>
                        <div id="createdBy" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created At</label>
                        <div id="createdAt" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12 border-top pt-3 border-2">
                        <div class="row g-3 employeeAssigned d-none align-items-end">
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Work Category</label>
                                <div id="workType" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Assign To</label>
                                <div id="assignToName" class="text-capitalize text-black"></div>
                            </div>
                            <form id="workConfirmedForm" method="post" class="col-lg-4 col-md-6">
                                <div id="workConfirmed"></div>
                            </form>
                        </div>
                        <div class="row g-3 employeeStartWork d-none align-items-end">
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Work Category</label>
                                <div id="workType1" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="w-100 fw-bold text-black mb-1">Assign To</label>
                                <div id="assignToName1" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div id="jobReportAction"></div>
                            </div>
                        </div>
                        <div class="row g-3 employeeWorkCompleted d-none">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Work Category</label>
                                <div id="workType2" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Assign To</label>
                                <div id="assignToName2" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Job Report Letter</label>
                                <div id="jobReport" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1">Job Work Remarks</label>
                                <div id="jobRemarks" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6 checkingDate">
                                <label class="w-100 fw-bold text-black mb-1">Checking Date</label>
                                <div id="checkingDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6 renewalDate">
                                <label class="w-100 fw-bold text-black mb-1">Renewal Date</label>
                                <div id="renewalDate" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-lg-3 col-md-6 earthingReport">
                                <label class="w-100 fw-bold text-black mb-1">Earth Report</label>
                                <div id="earthingReport" class="text-capitalize text-black"></div>
                            </div>
                            <div class="col-12 jobReportLetters d-none">
                                <label class="w-100 fw-bold text-black mb-2">Job Report Letters</label>
                                <div id="jobReportLetters" class="row g-3"></div>
                            </div>
                            <div class="col-12 beforeImages d-none">
                                <label class="w-100 fw-bold text-black mb-2">Before Images</label>
                                <div id="beforeImages" class="row g-3"></div>
                            </div>
                            <div class="col-12 afterImages d-none">
                                <label class="w-100 fw-bold text-black mb-2">After Images</label>
                                <div id="afterImages" class="row g-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view_correctStock" tabindex="-1">
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
                <div id="stockList" class="row gx-3 gy-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="work_report_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="modalTitle"></div>
                </div>
                <div class="row g-3 w-100">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Employee Name</label>
                        <div id="employeeName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Work Type</label>
                        <div id="employeeWorkType" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Report Date</label>
                        <div id="reportDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 reportSubmissionDate d-none">
                        <label class="w-100 fw-bold text-black mb-1">Submission Date</label>
                        <div id="reportSubmissionDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 reportDoc d-none">
                        <label class="w-100 fw-bold text-black mb-1">Report Document</label>
                        <div id="reportDoc" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 reportDescription d-none">
                        <label class="w-100 fw-bold text-black mb-1">Description</label>
                        <div id="reportDescription" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-12">
                        <form id="workReportForm" method="post" class="row g-3 d-none border-top mt-3 border-2">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div id="workReportId"></div>
                                <div id="reportDayCount"></div>
                                <div id="reportDateInput"></div>
                                <div id="employeeWorkId"></div>
                                <label class="w-100 fw-bold text-black mb-1">Submission Date</label>
                                <input name="submission_date" id="submission_date" type="date" class="form-control submissionDate date-picker" placeholder="YYYY - MM - DD">
                                <label class="w-100 fw-bold text-black mb-1 mt-3">Next Reporting Date</label>
                                <input name="next_report_date" id="next_report_date" type="date" class="form-control nextReportDate date-picker" placeholder="YYYY - MM - DD">
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <label class="w-100 fw-bold text-black mb-1 fs-14px">Report Document</label>
                                <input name="work_report" id="work_report" type="file" class="form-control">
                                <input type="hidden" value="<?php echo $reportDoc; ?>" name="alter_work_report">
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <label class="w-100 fw-bold text-black mb-1 fs-14px">Description</label>
                                <textarea name="description" id="description" type="text" rows="5" class="form-control" placeholder="Enter the Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex gap-3 justify-content-end h-100 align-items-end">
                                    <a href="<?php echo base_url() . 'bill/party-payment-view/' . $companyName . '/' . $partyId; ?>" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    
    $(document).ready(function() {
        var base_url = '<?php echo base_url(); ?>';
        var userPermission = <?php echo json_encode($userPermission); ?>;
        var pageStatus = '<?php echo $activeLink; ?>';

        // Initialize DataTable with server-side processing
        if ($.fn.DataTable.isDataTable('.assurans_table')) {
            $('.assurans_table').DataTable().destroy();
        }
        
        $('.assurans_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "desc"]], // Default order by Date columns
            "ajax": {
                "url": base_url + "complaint/complaint_list_json/" + pageStatus,
                "type": "POST",
                "data": function(d) {
                    d.branchId = $('#branchSelect').val();
                    d.workType = $('#workTypeSelect').val();
                }
            },
            "columns": [
                { 
                    "data": "id",
                    "render": function(data, type, row, meta) {
                        return '<span>' + (meta.row + meta.settings._iDisplayStart + 1) + '</span>';
                    }
                },
                { 
                    "data": "complaint_date",
                    "render": function(data, type, row) {
                        var workType = row.work_type.replace(/_/g, ' ');
                        return '<div class="fw-semibold">' + data + '</div>' +
                               '<div class="secondary-text">' + workType + '</div>';
                    }
                },
                { 
                    "data": "assign_toName",
                    "render": function(data, type, row) {
                        return '<div class="fw-semibold">' + data + '</div>' +
                               '<div class="secondary-text">' + row.branch_name + '</div>';
                    }
                },
                { 
                    "data": "outlet_name",
                    "render": function(data, type, row) {
                        var name = (data || row.old_outlet_name || '-');
                        var location = (row.outlet_location || row.old_outlet_location || '');
                        return '<div class="fw-semibold">' + name + '</div>' +
                               '<div class="secondary-text">' + location + '</div>';
                    }
                },
                { 
                    "data": "description",
                    "render": function(data) {
                        return '<div class="text-wrap" style="min-width: 150px; max-width: 250px; color:#555;">' + data + '</div>';
                    }
                },
                { 
                    "data": "complainter_name",
                    "render": function(data, type, row) {
                        return '<div>' + data + '</div>' +
                               '<div class="secondary-text"><a href="tel:' + row.complainter_number + '" class="text-primary">' + row.complainter_number + '</a></div>';
                    }
                },
                { 
                    "data": "job_remarks",
                    "render": function(data, type, row) {
                        if(row.status === 'completed') {
                            return '<div class="secondary-text">Job Completed</div>' +
                                   '<div><a href="' + base_url + row.job_report + '" target="_blank" class="text-primary small">View Job Report</a></div>';
                        }
                        return '<div class="text-muted">-</div>';
                    }
                },
                { 
                    "data": "status",
                    "render": function(data) {
                        var color = '#696cff';
                        var label = data;
                        if(data == 'not_started') { color = '#ff3e1d'; label = 'Not Started'; }
                        else if(data == 'inprogress') { color = '#ffab00'; label = 'Inprogress'; }
                        else if(data == 'completed') { color = '#71dd37'; label = 'Completed'; }
                        return '<span class="text-capitalize" style="color: ' + color + ';">' + label + '</span>';
                    }
                },
                { 
                    "data": null,
                    "visible": (userPermission.includes('admin') || userPermission.includes('complaint_management')),
                    "orderable": false,
                    "className": "text-center",
                    "render": function(data, type, row) {
                        var actions = '<div class="d-flex gap-1 justify-content-center">';
                        actions += '<a href="javascript:void(0);" class="box-hover getComplaintId action-icon" data-complaintid="' + row.id + '" data-zone="' + row.zone + '" data-branchid="' + row.branch + '" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>';
                        actions += '<a href="' + base_url + 'complaint/complaint-edit/' + row.id + '" class="box-hover action-icon" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>';
                        actions += '<a href="javascript:void(0);" data-rowid="' + row.id + '" data-tablename="complaint" data-link="' + base_url + 'complaint/complaint-list/not_started" class="box-hover action-icon trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>';
                        if(row.status == 'inprogress') {
                            actions += '<a href="' + base_url + 'complaint/job-report/' + row.id + '" class="box-hover action-icon" data-toggle="tooltip" data-placement="top" title="Send Report"> <i class="bx bx-send"></i> </a>';
                        }
                        if(row.status == 'completed' && row.has_files > 0) {
                            actions += '<a href="' + base_url + 'complaint/download_complaint_zip/' + row.id + '" class="box-hover action-icon" data-toggle="tooltip" data-placement="top" title="Download All Files (ZIP)" target="blank"> <i class="bx bx-download"></i> </a>';
                        }
                        actions += '</div>';
                        return actions;
                    }
                }
            ],
            "responsive": true,
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "dom": '<"row mx-1 mb-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"row mx-2 mt-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            "language": {
                "sLengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "paginate": {
                    "next": 'Next &raquo;',
                    "previous": '&laquo; Previous'
                }
            }
        });
        
        $('.dataTables_filter input').addClass('form-control form-control-sm');
        $('.dataTables_length select').addClass('form-select form-select-sm');

        $('#searchButton').on('click', function() {
            $('.assurans_table').DataTable().ajax.reload();
        });
    });

    $(document).ready(function() {
        $('.submissionDate').on("change", function() {
            const submissionDate = new Date($(this).val());
            const nextReportDayCount = $(".nextReportDayCount").val();
            if (isNaN(submissionDate)) return;

            // Calculate months later based on nextReportDayCount
            const nextReportDate = new Date(submissionDate);
            nextReportDate.setDate(nextReportDate.getDate() + parseInt(nextReportDayCount));

            // Format the date as YYYY-MM-DD
            const formattedDate = nextReportDate.toISOString().split("T")[0];
            $(".nextReportDate").val(formattedDate);
        });
    });

    $(document).on("click", ".getWorkReportId", function(e){
        var workReportId = $(this).data("workreportid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>employee/getWorkReportDetail',
            dataType: "json",
            data: {workReportId},
            success: function (data) {
                $('#workReportId').html('<input type="hidden" id="work_report_id" name="work_report_id" value="' + data.workReportId + '">');
                $('#reportDayCount').html('<input type="hidden" id="next_report_day_count" name="next_report_day_count" class="nextReportDayCount" value="' + data.nextReportDayCount + '">');
                $('#reportDateInput').html('<input type="hidden" id="report_date" name="report_date" value="' + data.reportDate + '">');
                $('#employeeWorkId').html('<input type="hidden" id="employee_work" name="employee_work" value="' + data.employeeWorkId + '">');
                $('#modalTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.employeeName + ' / ' + data.workType + ' - Report Details</h5>');
                $('#employeeName').html(data.employeeName);
                $('#employeeWorkType').html(data.workType);
                $('#reportDate').html(data.reportDate);

                if (data.submissionDate && data.submissionDate !== '0000-00-00') {
                    $('#workReportForm').addClass('d-none');
                } else {
                    $('#workReportForm').removeClass('d-none');
                }

                if (data.submissionDate && data.submissionDate !== '0000-00-00') {
                    $('#reportSubmissionDate').html(data.submissionDate);
                    $('.reportSubmissionDate').removeClass('d-none');
                } else {
                    $('.reportSubmissionDate').addClass('d-none');
                }

                if (data.description) {
                    $('#reportDescription').html(data.description);
                    $('.reportDescription').removeClass('d-none');
                } else {
                    $('.reportDescription').addClass('d-none');
                }

                if (data.reportDoc) {
                    $('#reportDoc').html('<a href="' + '<?php echo base_url(); ?>' + data.reportDoc + '" target="_blank" class="doc-hover">View Report</a>');
                    $('.reportDoc').removeClass('d-none');
                } else {
                    $('.reportDoc').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });
    
    // Estimation Save Function
    $("#workReportForm").validate({
        rules: {
            submission_date: {
                required: true
            },
            next_report_date: {
                required: true
            }
        },
        messages: {
            submission_date: {
                required: "Please Select Submission Date",
            },
            next_report_date: {
                required: "Please Select Next Reporting Date",
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#workReportForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>employee/addWorkReportFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (data) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': false,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '5000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut',
                    }
                    $(".loader").hide();
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url() . 'employee/work-list/' . $year . '/' . $month; ?>";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        var downloadButton = document.getElementById("downloadReportPDF");
        if (downloadButton) {
            downloadButton.addEventListener("click", function () {
                var element = document.querySelector('.downloadReportPage');
                var employeeName = "<?php echo $employeeName . ' - Loan Report'; ?>";
                var fileName = employeeName + '.pdf';

                html2pdf(element, {
                    margin: 0,
                    filename: fileName,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'cm', format: 'a4', orientation: 'portrait' }
                });
            });
        }
    });

    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            // Get selected values from dropdowns
            var branch = $('#branchSelect').val();

            if (branch !== '') {
                // Base URL
                var baseUrl = '<?php echo base_url(); ?>stock/current-stock-report';

                // Construct new URL with selected values
                var newUrl = baseUrl;
                if (branch) {
                    newUrl += '/' + encodeURIComponent(branch);
                }

                // Redirect to the new URL
                window.location.href = newUrl;
            } else {
                alert('Please Select Search Field');
            }
        });
    });

    $(document).on("click", ".getMaterialId", function(e){
        var materialId = $(this).data("materialid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>stock/getCurrentStockReportDetail',
            dataType: "json",
            data: {materialId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.materialName + ' (' + data.materialCategory + ' - '  + data.materialtype + ') - Stock Report</h5>');
                    
                var stockListHtml = '';
                data.stockMaterialData.forEach(function(item) {
                    stockListHtml += '<div class="col-lg-3 col-md-4 col-sm-6">';
                    stockListHtml += '<h6 class="text-capitalize fw-bold text-black mb-2">' + item.branch + '</h6>';
                    stockListHtml += '<h5 class="text-capitalize text-black mb-0">' + item.balance_stock + '</h5>';
                    stockListHtml += '</div>';
                });

                $('#stockList').html(stockListHtml);
            }
        });
        e.preventDefault();
        return false;
    });

    $(document).on("click", ".getComplaintId", function(e){
        var complaintId = $(this).data("complaintid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>complaint/getComplaintDetail',
            dataType: "json",
            data: {complaintId},
            success: function (data) {
                $('#complaintId').html('<input type="hidden" id="complaint_id" name="complaint_id" value="' + data.complaintId + '">');
                $('#workConfirmed').html('<div class="d-flex flex-wrap gap-3 justify-content-end h-100 align-items-end"> <div><a href="javascript:void(0);" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white" data-bs-dismiss="modal">Cancel</a></div> <div><a href="javascript:void(0);" class="workConfirmedPopup btn btn-success px-4 py-2 rounded border-0 fw-bold text-white" data-complaint_id="' + data.complaintId + '">Start Work</a></div> </div>');
                $('#jobReportAction').html('<div class="d-flex flex-wrap gap-3 justify-content-end h-100 align-items-end"> <div><a href="javascript:void(0);" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white" data-bs-dismiss="modal">Cancel</a></div> <div><a href="<?php echo base_url() . 'complaint/job-report/'; ?>' + data.complaintId + '" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Submit Job Report</a></div> </div>');
                $('#complaintCode').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">View Complaint - ' + data.complaintCode + '</h5>');
                $('#complaintDate').html(data.complaintDate);
                $('#zone').html(data.zone);
                $('#branch').html(data.branchName);
                $('#complainterName').html(data.complainterName);
                $('#complainterNumber').html('<a href="tel:' + data.complainterNumber + '" class="a-hover">' + data.complainterNumber + '</a>');

                if (data.outletName) {
                    $('#outletName').html(data.outletName);
                    $('.outletName').removeClass('d-none');
                } else {
                    $('.outletName').addClass('d-none');
                }
                if (data.outletLocation) {
                    $('#outletLocation').html(data.outletLocation);
                    $('.outletLocation').removeClass('d-none');
                } else {
                    $('.outletLocation').addClass('d-none');
                }
                if (data.contactName) {
                    $('#contactName').html(data.contactName);
                    $('.contactName').removeClass('d-none');
                } else {
                    $('.contactName').addClass('d-none');
                }
                if (data.contactNumber) {
                    $('#contactNumber').html('<a href="tel:' + data.contactNumber + '" class="a-hover">' + data.contactNumber + '</a>');
                    $('.contactNumber').removeClass('d-none');
                } else {
                    $('.contactNumber').addClass('d-none');
                }
                if (data.oldOutletName) {
                    $('#oldOutletName').html(data.oldOutletName);
                    $('.oldOutletName').removeClass('d-none');
                } else {
                    $('.oldOutletName').addClass('d-none');
                }
                if (data.oldOutletLocation) {
                    $('#oldOutletLocation').html(data.oldOutletLocation);
                    $('.oldOutletLocation').removeClass('d-none');
                } else {
                    $('.oldOutletLocation').addClass('d-none');
                }
                if (data.oldContactName) {
                    $('#oldContactName').html(data.oldContactName);
                    $('.oldContactName').removeClass('d-none');
                } else {
                    $('.oldContactName').addClass('d-none');
                }
                if (data.oldContactNumber) {
                    $('#oldContactNumber').html('<a href="tel:' + data.oldContactNumber + '" class="a-hover">' + data.oldContactNumber + '</a>');
                    $('.oldContactNumber').removeClass('d-none');
                } else {
                    $('.oldContactNumber').addClass('d-none');
                }
                if (data.status == 'not_started') {
                    $('.employeeNotStarted').removeClass('d-none');
                } else {
                    $('.employeeNotStarted').addClass('d-none');
                }
                if (data.status == 'inprogress') {
                    $('.employeeStartWork').removeClass('d-none');
                } else {
                    $('.employeeStartWork').addClass('d-none');
                }
                if (data.status == 'completed') {
                    $('.employeeWorkCompleted').removeClass('d-none');
                } else {
                    $('.employeeWorkCompleted').addClass('d-none');
                }
                if (data.workType == 'earth_renewal') {
                    $('.earthRenewalReport').removeClass('d-none');
                } else {
                    $('.earthRenewalReport').addClass('d-none');
                }
                if (data.earthingReport) {
                    $('#earthingReport').html('<a href="' + '<?php echo base_url(); ?>' + data.earthingReport + '" target="_blank" class="doc-hover">View Earthing Report</a>');
                    $('.earthingReport').removeClass('d-none');
                } else {
                    $('.earthingReport').addClass('d-none');
                }
                if (data.checkingDate != '00 - 00 - 0000') {
                    $('#checkingDate').html(data.checkingDate);
                    $('.checkingDate').removeClass('d-none');
                } else {
                    $('.checkingDate').addClass('d-none');
                }
                if (data.renewalDate != '00 - 00 - 0000') {
                    $('#renewalDate').html(data.renewalDate);
                    $('.renewalDate').removeClass('d-none');
                } else {
                    $('.renewalDate').addClass('d-none');
                }
                
                if (data.status == 'not_started') {
                    $('#status').html('<span class="text-danger">Not Started</span>');
                } else if (data.status == 'inprogress') {
                    $('#status').html('<span class="text-warning">Inprogress</span>');
                } else if (data.status == 'completed') {
                    $('#status').html('<span class="text-success">Completed</span>');
                }
                
                updateJobReportLetters(data.jobReportLetters);
                updateBeforeImages(data.beforeImages);
                updateAfterImages(data.afterImages);

                $('#description').html(data.description);
                $('#workType').html(data.workType);
                $('#assignToName').html(data.assignToName);
                $('#workType1').html(data.workType);
                $('#assignToName1').html(data.assignToName);
                $('#workType2').html(data.workType);
                $('#assignToName2').html(data.assignToName);
                $('#jobReport').html('<a href="' + '<?php echo base_url(); ?>' + data.jobReport + '" target="_blank" class="doc-hover">View Job Report</a>');
                $('#jobRemarks').html(data.jobRemarks);
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);
            }
        });
        e.preventDefault();
        return false;
    });

    // Utility Function to update Job Report Letters
    function updateJobReportLetters(images) {
        if (Array.isArray(images) && images.length > 0) {
            const htmlContent = images.map(image => {
                const imagePath = '<?php echo base_url(); ?>' + image.imagepath;
                return `
                    <div class="col-xl-1 col-lg-2 col-md-3 col-4">
                        <a href="${imagePath}" target="_blank">
                            <img src="${imagePath}" alt="before image" style="width: 100%; height: 100px; object-fit: cover; border-radius: 7px;">
                        </a>
                    </div>
                `;
            }).join('');

            $('#jobReportLetters').html(htmlContent);
            $('.jobReportLetters').removeClass('d-none');
        } else {
            $('.jobReportLetters').addClass('d-none');
        }
    }
    
    // Utility Function to Update Before Images
    function updateBeforeImages(images) {
        if (Array.isArray(images) && images.length > 0) {
            const htmlContent = images.map(image => {
                const imagePath = '<?php echo base_url(); ?>' + image.imagepath;
                return `
                    <div class="col-xl-1 col-lg-2 col-md-3 col-4">
                        <a href="${imagePath}" target="_blank">
                            <img src="${imagePath}" alt="before image" style="width: 100%; height: 100px; object-fit: cover; border-radius: 7px;">
                        </a>
                    </div>
                `;
            }).join('');

            $('#beforeImages').html(htmlContent);
            $('.beforeImages').removeClass('d-none');
        } else {
            $('.beforeImages').addClass('d-none');
        }
    }

    // Utility Function to Update After Images
    function updateAfterImages(images) {
        if (Array.isArray(images) && images.length > 0) {
            const htmlContent = images.map(image => {
                const imagePath = '<?php echo base_url(); ?>' + image.imagepath;
                return `
                    <div class="col-xl-1 col-lg-2 col-md-3 col-4">
                        <a href="${imagePath}" target="_blank">
                            <img src="${imagePath}" alt="after image" style="width: 100%; height: 100px; object-fit: cover; border-radius: 7px;">
                        </a>
                    </div>
                `;
            }).join('');

            $('#afterImages').html(htmlContent);
            $('.afterImages').removeClass('d-none');
        } else {
            $('.afterImages').addClass('d-none');
        }
    }

    $(document).on('click', '.workConfirmedPopup', function(e) {
        var complaintId = $(this).data("complaint_id");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>complaint/workConfirmedFormSave',
            dataType: "json",
            data: {
                complaintId
            },
            beforeSend: function () {
                $(".loader").show();
            },
            success: function(data) {
                toastr.options = {
                    'closeButton': true,
                    'debug': false,
                    'newestOnTop': false,
                    'progressBar': false,
                    'positionClass': 'toast-top-right',
                    'preventDuplicates': false,
                    'showDuration': '1000',
                    'hideDuration': '1000',
                    'timeOut': '5000',
                    'extendedTimeOut': '1000',
                    'showEasing': 'swing',
                    'hideEasing': 'linear',
                    'showMethod': 'fadeIn',
                    'hideMethod': 'fadeOut',
                }
                $(".loader").hide();
                if (data['isError']) {
                    toastr.error(data['message']);
                } else {
                    oneClickSubmitBtn();
                    toastr.success(data['message']);
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url(); ?>complaint/complaint-list/inprogress";
                    }, 1500);
                }
            }
        });
    });
</script>