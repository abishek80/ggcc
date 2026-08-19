<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>themes/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>GGCC | Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>themes/images/fav-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/demo.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/toast.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/sweetalert.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/datatable/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/select2.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/lightbox.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/dropzone.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/flatpickr.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/magnifypopup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/image-uploader/image-uploader.css">

    <script src="<?php echo base_url(); ?>themes/datatable/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/validate.js"></script>
    <script src="<?php echo base_url(); ?>themes/image-uploader/image-uploader.js"></script>
</head>

<?php 
$userPermission = json_decode($this->session->userdata('permission'), true); 
// Load Menu Control States
$menuStates = [];
$CI =& get_instance();
$CI->load->database();
if ($CI->db->table_exists('menu_control')) {
    $menuStatesQuery = $CI->db->select('menu_key, status')->get('menu_control');
    if ($menuStatesQuery && $menuStatesQuery->num_rows() > 0) {
        foreach ($menuStatesQuery->result() as $mRow) {
            $menuStates[$mRow->menu_key] = $mRow->status;
        }
    }
}
?>

<body>
    <div class="loader">
        <div class="spinner-border text-danger" role="status"></div>
        <img class="loader-img" src="<?php echo base_url(); ?>themes/images/fav-icon.png" alt="loader">
    </div>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo justify-content-center">
                    <a href="<?php echo base_url(); ?>" class="app-brand-link">
                        <div class="logo-img" style="background-image: url('<?php echo base_url(); ?>themes/images/ggcc-logo.png');"></div>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-lg-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <!-- <div class="menu-inner-shadow"></div> -->
                <ul id="ggccMenu" class="menu-inner py-1">
                    <?php if (($menuStates['dashboard'] ?? 'enabled') === 'enabled') { ?>
                    <li class="menu-item <?php echo $menu_status == 'dashboard' ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-alt"></i>
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (($menuStates['your_attendance'] ?? 'enabled') === 'enabled' && $checkEmployeeAttendanceList && $this->session->userdata('is_admin') == '0') { ?>
                        <li class="menu-item <?php echo $menu_status == 'attendance' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() . 'attendance/attendance-view/' . date('Y') . '/' . strtolower(date('F') . '/' . $this->session->userdata('userid')); ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar"></i>
                                <div data-i18n="Your Attendance">Your Attendance</div>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (($menuStates['expenses'] ?? 'enabled') === 'enabled' && $checkEmployeeExpensesList && $this->session->userdata('is_admin') == '0') { ?>
                        <li class="menu-item <?php echo $menu_status == 'employee_expenses' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() . 'employee/expenses-view/' . $this->session->userdata('userid'); ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                                <div data-i18n="Expenses">Expenses</div>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (($menuStates['complaint'] ?? 'enabled') === 'enabled' && $employeeComplaintList && $this->session->userdata('is_admin') == '0') { ?>
                        <li class="menu-item <?php echo $menu_status == 'complaint' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>complaint/complaint-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-notepad"></i>
                                <div data-i18n="Complaint">Complaint</div>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (($menuStates['section_complaint_mgmt'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission))) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Complaint Management</p>
                        </li>
                        <?php if (($menuStates['complaint_list'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'complaint' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>complaint/complaint-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-notepad"></i>
                                <div data-i18n="Complaint">Complaint</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['outlet_list'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'outlet' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>outlet/outlet-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-buildings"></i>
                                <div data-i18n="Outlets">Outlets</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['branch_project_list'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'branch_project' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>outlet/branch-project-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                                <div data-i18n="Branch Project">Branch Project</div>
                            </a>
                        </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['section_stock_mgmt'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('stock_management', $userPermission))) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Stock Management</p>
                        </li>
                        <?php if (($menuStates['material_shipping'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'material-shipping' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>stock/material-shipping-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                                <div data-i18n="Material Shipping">Material Shipping</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['material_price'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'material_price' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>stock/material-price-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-cart"></i>
                                <div data-i18n="Material Price List">Material Price List</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['group_materials_stock'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_open == 'stock-report' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-category"></i>
                                <div data-i18n="Materials Stock">Materials Stock</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['material_inward'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'stock-in' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>stock/stock-in-list" class="menu-link">
                                        <div data-i18n="Material Inward">Material Inward</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['material_outward'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'stock-out' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>stock/stock-out-list" class="menu-link">
                                        <div data-i18n="Material Outward">Material Outward</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['current_stock'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'current-stock' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>stock/current-stock-list" class="menu-link">
                                        <div data-i18n="Current Stock">Current Stock</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['branch_stock'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'branch-stock' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>stock/branch-stock-list/" target="_blank" class="menu-link">
                                        <div data-i18n="Branch Stock">Branch Stock</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['month_stock'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'month-stock' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() . 'stock/month-stock-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="menu-link">
                                        <div data-i18n="Month Stock List">Month Stock List</div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['group_assets_tools'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_open == 'asset-management' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-package"></i>
                                <div data-i18n="Assets & Tools">Asset & Tools</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['tools'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'tools' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>stock/asset-list/tools" class="menu-link">
                                        <div data-i18n="Tools">Tools</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['assets'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'assets' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>stock/asset-list/assets" class="menu-link">
                                        <div data-i18n="Assets">Assets</div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['section_vehicle_mgmt'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission))) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Vehicle Management</p>
                        </li>
                        <?php if (($menuStates['vehicle_fuel'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'vehicle_fuel' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>vehicle/fuel-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-gas-pump"></i>
                                <div data-i18n="Vehicle Fuel">Vehicle Fuel</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['vehicle_service'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'vehicle_service' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>vehicle/vehicle-service-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-wrench"></i>
                                <div data-i18n="Vehicle Service">Vehicle Service</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['vehicle_list'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'vehicle' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>vehicle/vehicle-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-car"></i>
                                <div data-i18n="Vehicle">Vehicle</div>
                            </a>
                        </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['section_purchase_mgmt'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission))) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Purchase Management</p>
                        </li>
                        <?php if (($menuStates['group_purchase_order'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_open == 'purchase' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                                <div data-i18n="Purchase Order">Purchase Order</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['purchase_order_ggcc'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'purchase_ggcc' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>purchase/po-list/ggcc" class="menu-link">
                                        <div data-i18n="GGCC">GGCC</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['purchase_order_bright'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'purchase_bright' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>purchase/po-list/bright" class="menu-link">
                                        <div data-i18n="Bright">Bright</div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['group_retention_money'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_open == 'retention' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-coin"></i>
                                <div data-i18n="Retention Money">Retention Money</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['retention_ggcc'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'retention_ggcc' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>purchase/retention-money-list/ggcc/notreceived" class="menu-link">
                                        <div data-i18n="GGCC">GGCC</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['retention_bright'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'retention_bright' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>purchase/retention-money-list/bright/notreceived" class="menu-link">
                                        <div data-i18n="Bright">Bright</div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['group_security_amount'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_open == 'security' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-shield-alt-2"></i>
                                <div data-i18n="Security Amount">Security Amount</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['security_ggcc'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'security_ggcc' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>purchase/security-amount-list/ggcc/notreceived" class="menu-link">
                                        <div data-i18n="GGCC">GGCC</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['security_bright'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'security_bright' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>purchase/security-amount-list/bright/notreceived" class="menu-link">
                                        <div data-i18n="Bright">Bright</div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['section_account_mgmt'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('account_management', $userPermission))) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Account Management</p>
                        </li>
                        <?php if (($menuStates['group_party_payment'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_open == 'party_payment' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-rupee"></i>
                                <div data-i18n="Party Payment">Party Payment</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['party_payment_ggcc'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'party_ggcc' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>bill/party-payment-list/ggcc" class="menu-link">
                                        <div data-i18n="GGCC">GGCC</div>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (($menuStates['party_payment_bright'] ?? 'enabled') === 'enabled') { ?>
                                <li class="menu-item <?php echo $menu_status == 'party_bright' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>bill/party-payment-list/bright" class="menu-link">
                                        <div data-i18n="Bright">Bright</div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['petty_cash'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'petty_cash' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>bill/pettycash-list/<?php echo date('Y'); ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-dollar"></i>
                                <div data-i18n="Petty Cash">Petty Cash</div>
                            </a>
                        </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['section_employee_mgmt'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission))) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Employee Management</p>
                        </li>
                        <?php if (($menuStates['group_attendance'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission))) { ?>
                            <li class="menu-item <?php echo $menu_open == 'employee_attendance' ? 'active open' : ''; ?>">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                                    <div data-i18n="Attendance">Attendance</div>
                                </a>
                                <ul class="menu-sub">
                                    <?php if (($menuStates['attendance_list'] ?? 'enabled') === 'enabled') { ?>
                                    <li class="menu-item <?php echo $menu_status == 'attendance' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url() . 'attendance/attendance-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="menu-link">
                                            <div data-i18n="Attendance List">Attendance List</div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if (($menuStates['present_list'] ?? 'enabled') === 'enabled') { ?>
                                    <li class="menu-item <?php echo $menu_status == 'present' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url() . 'attendance/present-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="menu-link">
                                            <div data-i18n="Present List">Present List</div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if (($menuStates['leave_list'] ?? 'enabled') === 'enabled') { ?>
                                    <li class="menu-item <?php echo $menu_status == 'leave' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>attendance/leave-list" class="menu-link">
                                            <div data-i18n="Leave List">Leave List</div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if (($menuStates['ot_list'] ?? 'enabled') === 'enabled') { ?>
                                    <li class="menu-item <?php echo $menu_status == 'ot' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>attendance/ot-list" class="menu-link">
                                            <div data-i18n="OT List">OT List</div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if (in_array('admin', $userPermission) || in_array('employee_management', $userPermission)) { ?>
                            <?php if (($menuStates['employee_loan'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'advancecash_loan' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>loan/advancecash-list" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-credit-card"></i>
                                    <div data-i18n="Employee Loan">Employee Loan</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['employee_expenses_list'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'employee_expenses' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>employee/expenses-list" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                                    <div data-i18n="Expenses">Expenses</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['employee_work'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'employee_work' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url() . 'employee/work-list/' . date('Y') . '/' . strtolower(date('F')); ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-briefcase"></i>
                                    <div data-i18n="Work">Work</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['daily_task'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'daily_task' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>employee/daily-task" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-task"></i>
                                    <div data-i18n="Daily Task">Daily Task</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['employee_payslip'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'employee_payslip' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>employee/payslip-list/<?php echo date('Y'); ?>" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-money"></i>
                                    <div data-i18n="Payslip">Payslip</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['employee_transfer'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'employee_transfer' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>employee/transfer-list" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-refresh"></i>
                                    <div data-i18n="Transfer">Transfer</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['salary_increment'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'salary_increment' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>employee/increment-list" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-wallet"></i>
                                    <div data-i18n="Salary Increment">Salary Increment</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['employee_list_main'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'employee' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>employee/employee-list" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div data-i18n="Employee">Employee</div>
                                </a>
                            </li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['section_admin_mgmt'] ?? 'enabled') === 'enabled' && in_array('admin', $userPermission)) { ?>
                        <li class="px-3 py-2 mt-2 border-top w-100">
                            <p class="mb-0 fw-semibold text-dark">Admin Management</p>
                        </li>
                        <?php if (($menuStates['notification'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'notification' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() . 'notification'; ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-bell"></i>
                                <div data-i18n="Notification">Notification</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['thirdparty_loan'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'thirdparty_loan' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>loan/thirdparty-loan-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-credit-card"></i>
                                <div data-i18n="Thirdparty Loan">Thirdparty Loan</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['branch_visit'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'branch_visit' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>branch-visit-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-map"></i>
                                <div data-i18n="Branch Visit">Branch Visit</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['employee_performance'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'employee_performance' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>employee/performance-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-star"></i>
                                <div data-i18n="Performance">Performance</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['yearly_plan'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'yearly_plan' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>event-list/<?php echo date('Y'); ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-calendar-heart"></i>
                                <div data-i18n="Yearly Plan">Yearly Plan</div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if (($menuStates['file_manage'] ?? 'enabled') === 'enabled') { ?>
                        <li class="menu-item <?php echo $menu_status == 'file_manage' ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>file-manage-list" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-folder-open"></i>
                                <div data-i18n="File Management">File Management</div>
                            </a>
                        </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if (($menuStates['group_access_control'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission) || in_array('complaint_management', $userPermission))) { ?>
                        <li class="menu-item <?php echo $menu_open == 'access_control' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-lock"></i>
                                <div data-i18n="Access Control">Access Control</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if(in_array('admin', $userPermission)) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'menu_control' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/menu_control" class="menu-link">
                                            <div data-i18n="Menu Control">Menu Control</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['login_permission'] ?? 'enabled') === 'enabled' && in_array('admin', $userPermission)) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'login_permission' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>permission-list" class="menu-link">
                                            <div data-i18n="Login Permission">Login Permission</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['attendance_master'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('attendance_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'attendance_employee' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>attendance/attendance-employee-list" class="menu-link">
                                            <div data-i18n="Attendance Master">Attendance Master</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['complaint_incharge'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'incharge' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/incharge-list" class="menu-link">
                                            <div data-i18n="Complaint Incharge">Complaint Incharge</div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (($menuStates['group_report'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission) || in_array('vehicle_management', $userPermission))) { ?>
                        <li class="menu-item <?php echo $menu_open == 'report' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                                <div data-i18n="Report">Report</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['complaint_report'] ?? 'enabled') === 'enabled' && in_array('admin', $userPermission)) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'complaint_report' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>report/complaint-report" class="menu-link">
                                            <div data-i18n="Complaint Report">Complaint Report</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['payslip_report'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'payslip_report' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>report/payslip-report" class="menu-link">
                                            <div data-i18n="Payslip Report">Payslip Report</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['vehicle_fuel_report'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('vehicle_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'vehicle_fuel_report' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>report/vehicle-fuel-report" class="menu-link">
                                            <div data-i18n="Vehicle Fuel Report">Vehicle Fuel Report</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['stock_report'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('stock_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'stock_report' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>report/stock-report" class="menu-link">
                                            <div data-i18n="Stock Report">Stock Report</div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (($menuStates['group_master'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('stock_management', $userPermission) || in_array('purchase_management', $userPermission) || in_array('account_management', $userPermission) || in_array('employee_management', $userPermission) || in_array('complaint_management', $userPermission))) { ?>
                        <li class="menu-item <?php echo $menu_open == 'master' ? 'active open' : ''; ?>">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-category"></i>
                                <div data-i18n="Master">Master</div>
                            </a>
                            <ul class="menu-sub">
                                <?php if (($menuStates['master_material'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('stock_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'material' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/material-list" class="menu-link">
                                            <div data-i18n="Stock Materials">Stock Materials</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_assets_tools'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('stock_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'assets_tools' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/assets-tools-list" class="menu-link">
                                            <div data-i18n="Assets & Tools">Assets & Tools</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_project_type'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('complaint_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'project_type' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/project-type-list" class="menu-link">
                                            <div data-i18n="Project Type">Project Type</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_party_name'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('account_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'party_name' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/party-name-list" class="menu-link">
                                            <div data-i18n="Party Name">Party Name</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_pettycash_title'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('account_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'pettycash_title' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/pettycash-title-list" class="menu-link">
                                            <div data-i18n="Pettycash Title">Pettycash Title</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_work_type'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'work_type' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/work-type-list" class="menu-link">
                                            <div data-i18n="Work Type">Work Type</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_designation'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('employee_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'designation' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/designation-list" class="menu-link">
                                            <div data-i18n="Designation">Designation</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_thirdparty'] ?? 'enabled') === 'enabled' && in_array('admin', $userPermission)) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'thirdparty' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/thirdparty-list" class="menu-link">
                                            <div data-i18n="Thirdparty">Thirdparty</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_branch'] ?? 'enabled') === 'enabled' && in_array('admin', $userPermission)) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'branch' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/branch-list" class="menu-link">
                                            <div data-i18n="Branch">Branch</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_vendor'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'vendor' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/vendor-list" class="menu-link">
                                            <div data-i18n="Vendor">Vendor</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_gst'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'gst' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/gst-list" class="menu-link">
                                            <div data-i18n="GST">GST</div>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (($menuStates['master_pan'] ?? 'enabled') === 'enabled' && (in_array('admin', $userPermission) || in_array('purchase_management', $userPermission))) { ?>
                                    <li class="menu-item <?php echo $menu_status == 'pan' ? 'active' : ''; ?>">
                                        <a href="<?php echo base_url(); ?>master/pan-list" class="menu-link">
                                            <div data-i18n="PAN">PAN</div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (($menuStates['group_settings'] ?? 'enabled') === 'enabled') { ?>
                    <li class="menu-item <?php echo $menu_open == 'settings' ? 'active open' : ''; ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Settings">Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <?php if (($menuStates['settings_profile'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item <?php echo $menu_status == 'profile' ? 'active' : ''; ?>">
                                <a href="<?php echo base_url(); ?>profile" class="menu-link">
                                    <div data-i18n="My Profile">My Profile</div>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (($menuStates['settings_password'] ?? 'enabled') === 'enabled' && in_array('admin', $userPermission)) { ?>
                                <li class="menu-item <?php echo $menu_status == 'change_password' ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>change-password" class="menu-link">
                                        <div data-i18n="Change Password">Change Password</div>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (($menuStates['settings_logout'] ?? 'enabled') === 'enabled') { ?>
                            <li class="menu-item">
                                <a href="<?php echo base_url(); ?>logout" class="menu-link">
                                    <div data-i18n="Log Out">Log Out</div>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar d-xl-none container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="d-flex gap-3 w-100">
                            <div class="">
                                <span class="fw-semibold text-dark text-capitalize d-block"><?php echo $this->session->userdata('username'); ?></span>
                                <small class="text-muted text-uppercase"><?php echo $this->session->userdata('logincode'); ?></small>
                            </div>
                            <div class="avatar avatar-online">
                                <img src="<?php echo base_url(); ?>themes/images/avatar.png" alt class="w-px-40 h-auto rounded-3" />
                            </div>
                        </div>
                    </div>
                </nav>