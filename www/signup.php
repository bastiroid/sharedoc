<?php

require_once 'sharedoc.php';
$data = array();

if (Input::exists()) {

	$validate = new Validate();
	$validation = $validate->check($_POST, $rows = array(

		'first_name' => array(
			'name' => 'First name',
			'required' => true,
			'min' => 2,
			'max' => 30
		),

		'last_name' => array(
			'name' => 'Last name',
			'required' => true,
			'min' => 2,
			'max' => 30
		),

		'email' => array(
			'name' => 'Email',
			'unique' => 'ipp_users',
			'required' => true,
			'min' => 4,
			'max' => 50
		),

		'password' => array(
			'name' => 'Password',
			'required' => true,
			'min' => 8,
			'max' => 64
		),

		'pwd_again' => array(
			'required' => true,
			'matches' => 'password'
		)
	));

	if ($validation->passed()) {

		echo "Passed!";
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

	} else {
		$data['status'] = 'Please fill in all required data.';
		print_r($validation->errors());
	}
	
}

view('signup', $data);
?>