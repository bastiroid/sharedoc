<?php

require_once 'sharedoc.php';
$data = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email_address = $_POST['email'];
	$password = $_POST['pwd'];
	$password_again = $_POST['pwd_again'];
	
	if (empty($first_name) || empty($last_name) || empty($email_address) || empty($password) || empty($password_again)) {
		$data['status'] = "Please fill out all fields.";
	} else {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'firstname' => array(
				'required' => true,
				'min' => 2,
				'max' => 30
			),
			'lastname' => array(
				'required' => true,
				'min' => 2,
				'max' => 30
			),
			'email' => array(
				'unique' => 'ipp_users',
				'required' => true,
				'min' => 3,
				'max' => 50
			),
			'pwd' => array(
				'required' => true,
				'min' => 8,
				'max' => 64
			),
			'pwd_again' => array(
				'required' => true,
				'matches' => 'pwd'
			)
		));

		if ($validation->passed()) {
			// DB::getInstance()->query(
			// "INSERT INTO ipp_users(first_name, last_name, email, password)
			// VALUES(:first_name, :last_name, :email_address, :password)",
			// array(
			// 	':first_name' => $first_name,
			// 	':last_name' => $last_name,
			// 	':email_address' => $email_address,
			// 	':password' => $password
			// ));

			$data['status'] = 'Your account has been created succesfully.';
			print_r($validation->errors());
		} else {
			print_r($validation->errors());
		}
		
	}

}

view('signup', $data);
?>