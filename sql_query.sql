ALTER TABLE `employee_ot`
  DROP `start_time`,
  DROP `end_time`;

  ALTER TABLE `employee_work_report` ADD `description` LONGTEXT NOT NULL AFTER `report_document`;




login_permission name change to employee_name
ALTER TABLE `employee` ADD `payslip_status` ENUM('yes','no') NOT NULL DEFAULT 'yes' AFTER `contact_pincode`;
ALTER TABLE `employee` CHANGE `esi_status` `esi_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `employee` CHANGE `pf_status` `pf_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

ALTER TABLE `purchase_order`
  ADD COLUMN `bal_alert_10000_sent` TINYINT(1) NOT NULL DEFAULT 0 AFTER `security_status`,
  ADD COLUMN `bal_alert_5000_sent` TINYINT(1) NOT NULL DEFAULT 0 AFTER `bal_alert_10000_sent`,
  ADD COLUMN `bal_alert_1000_sent` TINYINT(1) NOT NULL DEFAULT 0 AFTER `bal_alert_5000_sent`;

ALTER TABLE `employee_work_report`
  ADD COLUMN `reminder_sent` TINYINT(1) NOT NULL DEFAULT 0 AFTER `delete_status`;

ALTER TABLE `purchase_order`
CHANGE COLUMN `bal_alert_1000_sent` `bal_alert_100000_sent` TINYINT(1) NOT NULL DEFAULT 0,
CHANGE COLUMN `bal_alert_5000_sent` `bal_alert_300000_sent` TINYINT(1) NOT NULL DEFAULT 0,
CHANGE COLUMN `bal_alert_10000_sent` `bal_alert_500000_sent` TINYINT(1) NOT NULL DEFAULT 0;

ALTER TABLE branch_project ADD completed_date DATE DEFAULT NULL AFTER project_status;








-- 1. Branch Incharge tables (parent + assigned-employee junction)
CREATE TABLE IF NOT EXISTS `master_branch_incharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sno` varchar(20) DEFAULT NULL,
  `zone` varchar(100) NOT NULL,
  `branch` int(11) NOT NULL,
  `incharge_employee_id` int(11) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `delete_status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch` (`branch`),
  KEY `incharge_employee_id` (`incharge_employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `master_branch_incharge_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_incharge_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_incharge_id` (`branch_incharge_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 2. Menu entries (safe to re-run - skips if already present)
INSERT INTO menu_control (menu_key, menu_name, parent_key, status, display_order, delete_status, created_at)
SELECT 'master_branch_incharge', 'Branch Incharge', 'group_access_control', 'enabled', 65, 0, NOW()
WHERE NOT EXISTS (SELECT 1 FROM menu_control WHERE menu_key = 'master_branch_incharge');

INSERT INTO menu_control (menu_key, menu_name, parent_key, status, display_order, delete_status, created_at)
SELECT 'branch_attendance', 'Branch Attendance', 'group_attendance', 'enabled', 45, 0, NOW()
WHERE NOT EXISTS (SELECT 1 FROM menu_control WHERE menu_key = 'branch_attendance');
