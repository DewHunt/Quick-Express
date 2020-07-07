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
?>