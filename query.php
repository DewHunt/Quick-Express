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
?>