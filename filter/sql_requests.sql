SELECT `ipp_group`.`id`,`ipp_group`.`name`
FROM `ipp_group`
INNER JOIN `ipp_group_join`
ON `ipp_group_join`.`group_id` = `ipp_group`.`id`
INNER JOIN `ipp_users`
ON `ipp_group_join`.`user_id` = `ipp_users`.`id`
WHERE `ipp_group_join`.`user_id` = /* Current user id */
AND `ipp_group`.`is_shared` = FALSE;

SELECT `ipp_group`.`id`,`ipp_group`.`name`
FROM `ipp_group`
INNER JOIN `ipp_group_join`
ON `ipp_group_join`.`group_id` = `ipp_group`.`id`
INNER JOIN `ipp_users`
ON `ipp_group_join`.`user_id` = `ipp_users`.`id`
WHERE `ipp_group_join`.`user_id` = /* Current user id */
AND `ipp_group`.`is_shared` = TRUE;


SELECT DISTINCT `ipp_document`.`group_id`,`ipp_document`.`name`,`ipp_document`.`id`
FROM `ipp_document`
WHERE `ipp_document`.`group_id` IN (
	SELECT `ipp_group_join`.`group_id`
	FROM `ipp_group_join`
	WHERE `ipp_group_join`.`user_id` = /*current user id*/);