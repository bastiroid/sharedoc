SELECT `ipp_group`.`id`,`ipp_group`.`name`
FROM `ipp_group`
INNER JOIN `ipp_group_join`
ON `ipp_group_join`.`group_id` = `ipp_group`.`id`
INNER JOIN `ipp_users`
ON `ipp_group_join`.`user_id` = `ipp_users`.`id`
WHERE `ipp_group_join`.`user_id` = /* Current user id */


SELECT `ipp_document`.`group_id`,`ipp_document`.`name`
FROM `ipp_document`
INNER JOIN `ipp_users`
ON `ipp_document`.`admin_id`= `ipp_users`.`id`
WHERE `ipp_document`.`admin_id` = /*current user id*/