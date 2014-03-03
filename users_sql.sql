/* 	CREATING IPP_USERS TABLE
*/

CREATE TABLE IF NOT EXISTS `ipp_users` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` VARCHAR(255) NOT NULL default '',
  `last_name` VARCHAR(255) NOT NULL default '',
  `password` VARCHAR(255) NOT NULL default '',
  `salt` VARCHAR(64) NOT NULL default '',
  `creation_date` VARCHAR(255) NOT NULL default '',
  `email` VARCHAR(255) NOT NULL default '',
  `avatar` VARCHAR(255) NOT NULL default '',
  `superadmin` BOOLEAN default FALSE,
  PRIMARY KEY  (`id`)
);

/* 	CREATING IPP_GROUP TABLE
*/

CREATE TABLE IF NOT EXISTS `ipp_group` (
  `id` int(11) NOT NULL auto_increment,
  `name` VARCHAR(255) NOT NULL default '',
  `admin` VARCHAR(255) NOT NULL default '',
  /*   `token` VARCHAR(255) NOT NULL default '', */
  `color_code` VARCHAR(255) NOT NULL default '', /* hexadecimal code */
  PRIMARY KEY  (`id`)
);

/* 	CREATING IPP_GROUP_JOIN TABLE
*/

CREATE TABLE IF NOT EXISTS `ipp_group_join` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `moderator` BOOLEAN default FALSE,
  PRIMARY KEY  (`id`)
);

/* 	CREATING IPP_DOCUMENTS TABLE
*/

CREATE TABLE IF NOT EXISTS `ipp_document` (
  `id` int(11) NOT NULL auto_increment,
  `name` VARCHAR(255) NOT NULL default '',
  `admin_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `creation_date` VARCHAR(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
);


/* 	CREATING IPP_CONTENT TABLE
*/

CREATE TABLE IF NOT EXISTS `ipp_content` (
  `id` int(11) NOT NULL auto_increment,
  `document_id` VARCHAR(255) NOT NULL default '',
  `content` int(11) NOT NULL,
  `creation_date` VARCHAR(255) NOT NULL default '',
  `opening_time` VARCHAR(255) NOT NULL default '',
  `closing_time` VARCHAR(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
);



/**********************************************************************************
 **********************************************************************************
 **********************************************************************************/



/* 	REGISTERING SUPERADMIN
	Password has to be hashed, SALT to be determined by hashing creation_date, no avatar img yet
*/

INSERT INTO `ipp_users` (`first_name`, `last_name`, `password`, `creation_date`, `email`, `avatar`, `superadmin`)
VALUES					('super', 'admin', 'adminpwd', 'admin_creation_date', 'admin.internet@programming.fi', 'to_be_defined', TRUE);



/* 	REGISTERING STANDARD USERS
	Password has to be hashed !!!
	First run loggin SQL to check that given email/password are unique in the table !
*/

INSERT INTO `ipp_users` (`first_name`, `last_name`, `password`, `creation_date`, `email`, `avatar`)
VALUES					(/* user_input */, /* user_input */, /* user_input */, /* generated_creation_date */, /* user_input */, /* manage file upload */);

INSERT INTO `ipp_group` (`name`, `admin`, `color_code`)
VALUES					(/* user_input */, /* current_user_id */, /* generated with PHP */);

INSERT INTO `ipp_group_join` 	(`user_id`, `group_id`, `moderator`)
VALUES							(/* current_user_id */, /* current_group_id */, TRUE);



/* 	LOGGING USERS IN
	total should be = 1 that means, only one match, then loggin is succesful
	if total = 0, ask for registration
	if total > 1, we have a structural problem, because two users in the table have been registered with identical emails and passwords...
*/

SELECT count(`id`) as total 
FROM `ipp_users` 
WHERE `email`=/* user_input */
AND `password`=/* user_input */




/* 	CHANGING USER PASSWORD	
*/

UPDATE  `ipp_users` SET  `password` =  '/*HASHED PASSWORD*/' WHERE  `ipp_users`.`id` =/*USER_ID*/;


/* 	SELECTING GROUPS FOR EACH USER	
*/

SELECT *
FROM `ipp_group`
INNER JOIN `ipp_group_join`
ON `ipp_group_join`.`group_id` = `ipp_group`.`id`
INNER JOIN `ipp_users`
ON `ipp_group_join`.`user_id` = `ipp_users`.`id`
WHERE `ipp_group_join`.`user_id` = /* Current user id */


SELECT *
FROM `ipp_document`
INNER JOIN `ipp_users`
ON `ipp_document`.`admin_id`= `ipp_users`.`id`
WHERE `ipp_document`.`admin_id` = /*current user id*/



/* 	SELECTING DOCUMENT FOR EACH GROUP 
*/

SELECT `ipp_document`.`name`
FROM `ipp_document`
INNER JOIN `ipp_group`
ON `ipp_group`.`id` = `ipp_document`.`group_id`
WHERE `ipp_document`.`group_id` = /* Current group id */



/*	CREATION OF NEW GROUP BY USER 
*/

INSERT INTO `ipp_group` (`name`, `admin`, `color_code`)
VALUES					(/* user_input */, /* current_user_id */, /* generated with PHP */);

INSERT INTO `ipp_group_join` 	(`user_id`, `group_id`, `moderator`)
VALUES							(/* current_user_id */, /* current_group_id */, TRUE);



/*	ADDING NEW USER TO A GROUP 
*/


INSERT INTO `ipp_group_join` 	(`user_id`, `group_id`, `moderator`)
VALUES							(/* current_user_id */, /* current_group_id */, FALSE);


/*	CREATING A DOCUMENT (ALWAYS WITHIN A GROUP) 
*/


INSERT INTO `ipp_document` 	(`name`, `admin_id`, `group_id`, `creation_date`)
VALUES							(/* user_input */, /* current_user_id */, /* current_group_id */, /* current_timestamp */);


/*	DELETING A DOCUMENT 
	SHOULD ONLY BE ALLOWED IF
*/

SELECT `ipp_document`.`admin_id`
FROM `ipp_document` 
WHERE `document_id`=/* current_document_id */

/* == USER_ID -> MEANING THAT ONLY DOCUMENT'S ADMIN CAN DELETE THEM (DUH...) */

DELETE FROM `ipp_document` WHERE `ipp_document`.`id` = /* document_id */ ;



/*	DELETING A GROUP
	SHOULD ONLY BE ALLOWED IF
*/

SELECT count(`id`) as total 
FROM `ipp_group_join` 
WHERE `group_id`=/* group_id */

/* ==1 -> MEANING THERE IS ONLY ONE USER LEFT IN THE GROUP */

DELETE FROM `ipp_document` WHERE `ipp_document`.`group_id` = /* document's_group_id */ ;
DELETE FROM `ipp_group` WHERE `ipp_group`.`id` = /* group_id */ ;


/*	OTHERWISE: LEAVING A GROUP
	IMPLIES PICKING A NEW MODERATOR IF CURRENT USER WAS MODERATOR 
*/


DELETE FROM `ipp_group_join` WHERE `ipp_group_join`.`group_id` = /* group_id */ AND `ipp_group_join`.`user_id` = /* user_id */;



/*	DELETING A USER 
*/


/* SHALL WE SIMPLY FLAG THEM FOR POSSIBLE FURTHER RECOVERY ? */



/*	 PULLING LATEST CONTENT WHEN EDITING DOCUMENT
*/

SELECT `ipp_content`.`content`
INNER JOIN `ipp_content`.`document_id`=`ipp_document`.`id`
WHERE `ipp_document`.`id`= /* current_document_id */
ORDER BY `ipp_content`.`creation_date`
LIMIT 0 , 1