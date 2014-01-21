/* 	CREATING IPP_USERS TABLE
*/

CREATE TABLE IF NOT EXISTS `ipp_users` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` VARCHAR(255) NOT NULL default '',
  `last_name` VARCHAR(255) NOT NULL default '',
  `password` VARCHAR(255) NOT NULL default '',
  `creation_date` VARCHAR(255) NOT NULL default '',
  `email` VARCHAR(255) NOT NULL default '',
  `avatar` VARCHAR(255) NOT NULL default '',
  `superadmin` BOOLEAN default FALSE,
  PRIMARY KEY  (`id`)
)

/* 	REGISTERING SUPERADMIN
	Password has to be hashed, creation_date to be determined, no avatar yet
*/

INSERT INTO `ipp_users` (`first_name`, `last_name`, `password`, `creation_date`, `email`, `avatar`, `superadmin`)
VALUES					('super', 'admin', 'adminpwd', 'admin_creation_date', 'admin.internet@programming.fi', 'to_be_defined', TRUE)

/* 	REGISTERING STANDARD USERS
	Password has to be hashed !!!
	First run loggin SQL to check that given email/password are unique in the table !
*/

INSERT INTO `ipp_users` (`first_name`, `last_name`, `password`, `creation_date`, `email`, `avatar`)
VALUES					(/* user_input */, /* user_input */, /* user_input */, /* generated_creation_date */, /* user_input */, /* manage file upload */)

/* 	LOGGING USERS IN
	total should be = 1 that means, only one match, then loggin is succesful
	if total = 0, ask for registration
	if total > 1, we have a structural problem, because two users in the table have been registered with identical emails and passwords...
*/

SELECT count(`id`) as total 
FROM `ipp_users` 
WHERE `email`=/* user_input */
AND `password`=/* user_input */