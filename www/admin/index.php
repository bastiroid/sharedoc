<?php

require '../sharedoc.php';


// Fetch all users
$users = DB::getInstance()->get('ipp_users');

// $users = DB::getInstance()->query(
// 	'SELECT * FROM ipp_users WHERE email = :email',
// 	array(
// 		':email' => 'herf'
// 	));

// $users = DB::getInstance()->query(
// 	"SELECT * FROM ipp_users WHERE email = :email", array(
// 		':email' => 'hern'));

view('admin/admin', array(
	'users' => $users
));

?>