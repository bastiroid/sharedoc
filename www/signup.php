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

		DB::getInstance()->insert('ipp_users', array(
			'first_name' => 'Long',
			'last_name' => 'John'
		));

		$data['status'] = 'Your account has been created succesfully.';

	} else {

		$data['status'] = 'Please fill in all required data.';

		foreach ($validation->errors() as $error) {
			$data['status'] .= "<p>$error</p>";
		}
		
		print_r($validation->errors());
	}
	
}

view('signup', $rows);
?>