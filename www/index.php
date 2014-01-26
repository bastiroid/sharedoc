<?php

require_once 'sharedoc.php';

$data = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$email_address = $_POST['email'];
	$password = $_POST['pwd'];
	
	if (empty($email_address) || empty($password)) {
		$data['status'] = "Please fill out all fields.";
	} else {
		DB::getInstance()->query(
			"INSERT INTO ipp_users(first_name, last_name, email, password)
			VALUES(:first_name, :last_name, :email_address, :password)",
			array(
				':email_address' => $email_address,
				':password' => $password
			));

		$data['status'] = '';
	}

}

view('index', $data);
$users = DB::getInstance()->get('ipp_users');
?>