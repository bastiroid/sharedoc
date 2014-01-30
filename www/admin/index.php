<?php

require '../sharedoc.php';


// Fetch all users
// $users = DB::getInstance()->getAll('ipp_users');

$users = DB::getInstance()->query(
	'SELECT * FROM ipp_users WHERE email = :email',
	array(
		':email' => 'henrikreponen@gmail.com'
	));

// $users = DB::getInstance()->get(
// 	'ipp_users', array('first_name', '=', 'Henrik'));

view('admin/admin', array(
	'users' => $users
));

?>