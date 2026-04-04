ALTER TABLE `employee_ot`
  DROP `start_time`,
  DROP `end_time`;

  ALTER TABLE `employee_work_report` ADD `description` LONGTEXT NOT NULL AFTER `report_document`;




  login_permission name change to employee_name
  ALTER TABLE `employee` ADD `payslip_status` ENUM('yes','no') NOT NULL DEFAULT 'yes' AFTER `contact_pincode`;
  ALTER TABLE `employee` CHANGE `esi_status` `esi_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
  ALTER TABLE `employee` CHANGE `pf_status` `pf_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;