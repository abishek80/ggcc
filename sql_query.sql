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
