<?php

require_once 'sharedoc.php';
$data = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email_address = $_POST['email'];
	$password = $_POST['pwd'];
	
	if (empty($first_name) || empty($last_name) || empty($email_address) || empty($password)) {
		$data['status'] = "Please fill out all fields.";
	} else {
		DB::getInstance()->query(
			"INSERT INTO ipp_users(first_name, last_name, email, password)
			VALUES(:first_name, :last_name, :email_address, :password)",
			array(
				':first_name' => $first_name,
				':last_name' => $last_name,
				':email_address' => $email_address,
				':password' => $password
			));

		$data['status'] = 'Your account has been created succesfully.';
	}

}

view('signup', $data);
?>