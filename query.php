<?php
	$view_zone = 
	"
    CREATE OR REPLACE VIEW view_zones AS
	SELECT `tbl_agents`.`id` as `zone_id`,'Agent' as `zone_type`,`tbl_agents`.`name` as `zone_name`,`tbl_agents`.`phone` as `zone_phone`,`tbl_agents`.`address` as `zone_address`
	FROM `tbl_agents`

	UNION ALL

	SELECT `tbl_subagents`.`id` as `zone_id`,'Subagent' as`zone_type`,`tbl_subagents`.`name` as `zone_name`,`tbl_subagents`.`phone` as `zone_phone`,`tbl_subagents`.`address` as `zone_address`
	FROM `tbl_subagents`
	"

	$view_clients = 
	"
    CREATE OR REPLACE VIEW view_clients AS
	SELECT `tbl_clients`.`id` as `clientId`,`tbl_clients`.`user_role_id` as `clientUserRoleId`,'Client' as `clientType`,`tbl_clients`.`name` as `clientName`,`tbl_clients`.`phone` as `clientPhone`,`tbl_clients`.`address` as `clientAddress`
	FROM `tbl_clients`

	UNION ALL

	SELECT `tbl_marchants`.`id` as `clientId`,`tbl_marchants`.`user_role_id` as `clientUserRoleId`,'Merchant' as`clientType`,`tbl_marchants`.`name` as `clientName`,`tbl_marchants`.`contact_person_phone` as `clientPhone`,`tbl_marchants`.`address` as `clientAddress`
	FROM `tbl_marchants`
	"

    $account = 
    "
    CREATE OR REPLACE VIEW view_account AS
    SELECT `tab1`.`voucher_no` AS `voucherNo`,`tab1`.`voucher_type` as `voucherType`,`tab1`.`coa_head_code` AS `debitHeadCode`,`debitCoa`.`head_name` AS `debitHeadname`,`tab2`.`coa_head_code` AS `creditHeadcode`,`creditCoa`.`head_name` AS `creditHeadName`
    FROM `tbl_account_transactions` AS `tab1`
    INNER JOIN `tbl_account_transactions` as `tab2` ON `tab2`.`voucher_no` = `tab1`.`voucher_no`
    INNER JOIN `tbl_coa` as `debitCoa` ON `debitCoa`.`head_code` = `tab1`.`coa_head_code`
    INNER JOIN `tbl_coa` as `creditCoa` ON `creditCoa`.`head_code` = `tab2`.`coa_head_code`
    WHERE `tab1`.`debit_amount` != 0 AND `tab2`.`credit_amount` != 0
    ORDER BY `tab1`.`voucher_no` ASC
    "

    $approve = 
    "
    CREATE OR REPLACE VIEW view_voucher_approve AS
    SELECT `tbl_account_transactions`.`id` as `id`,`tbl_account_transactions`.`voucher_no` as `voucherNo`,`tbl_account_transactions`.`voucher_type` as `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` as `date`,`tbl_account_transactions`.`credit_amount` as `amount`,`tbl_account_transactions`.`approve` as `approve`,`tbl_account_transactions`.`approve_by` as `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'DV' AND `tbl_account_transactions`.`debit_amount` = 0

    UNION ALL

    SELECT `tbl_account_transactions`.`id` as `id`,`tbl_account_transactions`.`voucher_no` as `voucherNo`,`tbl_account_transactions`.`voucher_type` as `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` as `date`,`tbl_account_transactions`.`debit_amount` as `amount`,`tbl_account_transactions`.`approve` as `approve`,`tbl_account_transactions`.`approve_by` as `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'CV' AND `tbl_account_transactions`.`credit_amount` = 0

    UNION ALL

    SELECT `tbl_account_transactions`.`id` as `id`,`tbl_account_transactions`.`voucher_no` as `voucherNo`,`tbl_account_transactions`.`voucher_type` as `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` as `date`,SUM(`tbl_account_transactions`.`debit_amount`) as `amount`,`tbl_account_transactions`.`approve` as `approve`,`tbl_account_transactions`.`approve_by` as `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'JV'
    GROUP BY `tbl_account_transactions`.`voucher_no`

    UNION ALL

    SELECT `tbl_account_transactions`.`id` as `id`,`tbl_account_transactions`.`voucher_no` as `voucherNo`,`tbl_account_transactions`.`voucher_type` as `voucherType`,`tbl_account_transactions`.`narration`,`tbl_account_transactions`.`voucher_date` as `date`,SUM(`tbl_account_transactions`.`debit_amount`) as `amount`,`tbl_account_transactions`.`approve` as `approve`,`tbl_account_transactions`.`approve_by` as `approveBy`
    FROM `tbl_account_transactions`
    WHERE `tbl_account_transactions`.`voucher_type` = 'OB'
    GROUP BY `tbl_account_transactions`.`voucher_no`
    ORDER BY `voucherNo`
    "
?>