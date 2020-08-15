<?php
	$view_zone = 
	"
    CREATE OR REPLACE VIEW view_zones AS
    SELECT `tbl_agents`.`id` AS `zone_id`,'Agent' AS `zone_type`,`tbl_agents`.`name` AS `zone_name`,`tbl_agents`.`phone` AS `zone_phone`,`tbl_agents`.`address` AS `zone_address`,`tbl_area`.`name` AS `zone_area`,`tbl_agents`.`area` AS `zone_area_id`
    FROM `tbl_agents`
    LEFT JOIN `tbl_area` ON `tbl_area`.`id` = `tbl_agents`.`area`

    UNION ALL

    SELECT `tbl_subagents`.`id` AS `zone_id`,'Subagent' AS`zone_type`,`tbl_subagents`.`name` AS `zone_name`,`tbl_subagents`.`phone` AS `zone_phone`,`tbl_subagents`.`address` AS `zone_address`,`tbl_area`.`name` AS `zone_area`,`tbl_agents`.`area` AS `zone_area_id`
    FROM `tbl_subagents`
    LEFT JOIN `tbl_agents` ON `tbl_agents`.`id` = `tbl_subagents`.`agent_id`
    LEFT JOIN `tbl_area` ON `tbl_area`.`id` = `tbl_agents`.`area`
	"

	$view_clients = 
	"
    CREATE OR REPLACE VIEW view_clients AS
	SELECT `tbl_clients`.`id` AS `clientId`,`tbl_clients`.`user_role_id` AS `clientUserRoleId`,`tbl_clients`.`area` AS `clientAreaId`,`tbl_area`.`name` AS `clientAreaName`,'Client' AS `clientType`,`tbl_clients`.`name` AS `clientName`,`tbl_clients`.`phone` AS `clientPhone`,`tbl_clients`.`address` AS `clientAddress`
	FROM `tbl_clients`
    LEFT JOIN `tbl_area` ON `tbl_area`.`id` = `tbl_clients`.`area`

	UNION ALL

	SELECT `tbl_marchants`.`id` AS `clientId`,`tbl_marchants`.`user_role_id` AS `clientUserRoleId`,`tbl_marchants`.`area` AS `clientAreaId`,`tbl_area`.`name` AS `clientAreaName`,'Merchant' AS`clientType`,`tbl_marchants`.`name` AS `clientName`,`tbl_marchants`.`contact_person_phone` AS `clientPhone`,`tbl_marchants`.`address` AS `clientAddress`
	FROM `tbl_marchants`
    LEFT JOIN `tbl_area` ON `tbl_area`.`id` = `tbl_marchants`.`area`
	"

    $account = 
    "
    CREATE OR REPLACE VIEW view_account AS
    SELECT `tab1`.`voucher_no` AS `voucherNo`,`tab1`.`voucher_type` AS `voucherType`,`tab1`.`coa_head_code` AS `debitHeadCode`,`debitCoa`.`head_name` AS `debitHeadname`,`tab2`.`coa_head_code` AS `creditHeadcode`,`creditCoa`.`head_name` AS `creditHeadName`
    FROM `tbl_account_transactions` AS `tab1`
    INNER JOIN `tbl_account_transactions` AS `tab2` ON `tab2`.`voucher_no` = `tab1`.`voucher_no`
    INNER JOIN `tbl_coa` AS `debitCoa` ON `debitCoa`.`head_code` = `tab1`.`coa_head_code`
    INNER JOIN `tbl_coa` AS `creditCoa` ON `creditCoa`.`head_code` = `tab2`.`coa_head_code`
    WHERE `tab1`.`debit_amount` != 0 AND `tab2`.`credit_amount` != 0
    ORDER BY `tab1`.`voucher_no` ASC
    "

    $approve = 
    "
    CREATE OR REPLACE VIEW view_voucher_approve AS
    SELECT `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` AS `date`,`tbl_account_transactions`.`credit_amount` AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'DV' AND `tbl_account_transactions`.`debit_amount` = 0

    UNION ALL

    SELECT `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` AS `date`,`tbl_account_transactions`.`debit_amount` AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'CV' AND `tbl_account_transactions`.`credit_amount` = 0

    UNION ALL

    SELECT `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` AS `date`,SUM(`tbl_account_transactions`.`debit_amount`) AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'JV'
    GROUP BY `tbl_account_transactions`.`voucher_no`

    UNION ALL

    SELECT `tbl_account_transactions`.`id` AS `id`,`tbl_account_transactions`.`voucher_no` AS `voucherNo`,`tbl_account_transactions`.`voucher_type` AS `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` AS `date`,SUM(`tbl_account_transactions`.`debit_amount`) AS `amount`,`tbl_account_transactions`.`approve` AS `approve`,`tbl_account_transactions`.`approve_by` AS `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'OB'
    GROUP BY `tbl_account_transactions`.`voucher_no`
    ORDER BY `voucherNo`
    "
?>