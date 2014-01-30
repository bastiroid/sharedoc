<?php

require_once 'sharedoc.php';
$data = array();

if (Input::exists()) {

	if (Token::check(Input::get('token'))) {

		$validate = new Validate();
		$validation = $validate->check($_POST, $rows = array(

			'first_name' => array(
				'alias' => 'First name',
				'required' => true,
				'min' => 2,
				'max' => 30
			),

			'last_name' => array(
				'alias' => 'Last name',
				'required' => true,
				'min' => 2,
				'max' => 30
			),

			'email' => array(
				'alias' => 'Email',
				'unique' => 'ipp_users',
				'required' => true,
				'min' => 4,
				'max' => 50
			),

			'password' => array(
				'alias' => 'Password',
				'required' => true,
				'min' => 8,
				'max' => 64
			),

			'pwd_again' => array(
				'alias' => 'Password',
				'required' => true,
				'matches' => 'password'
			)
		));

		if ($validation->passed()) {

			$user = new User();

			$salt = Hash::salt(32);

			try {

				$user->create(array(
					'first_name' => Input::get('first_name'),
					'last_name' => Input::get('last_name'),
					'email' => Input::get('email'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt
				));

				Session::flash('success', 'You registered successfully and can now login!');

				$data['status'] = 'Your account has been created succesfully.';
				Redirect::to('index.php');

			} catch(Exception $e) {
				die($e->getMessage());
			}

		} else {

			$data['status'] = 'Please fill in all required data.';

			foreach ($validation->errors() as $error) {
				$data['status'] .= "<p>$error</p>";
			}
			
		}
		
	}
}

view('signup', $data);
?>