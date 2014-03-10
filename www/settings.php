<?php

require_once 'sharedoc.php';

$user = new User();

if (!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

$data['user'] = $user->data();

if (Input::exists()){
	if (Token::check(Input::get('token'))) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'password_current' => array(
				'alias' => 'Current password',
				'required' => true,
				'min' => 6
			),
			'password_new' => array(
				'alias' => 'New password',
				'required' => true,
				'min' => 6
			),
			'password_new_again' => array(
				'alias' => 'Password',
				'required' => true,
				'min' => 6,
				'matches' => 'password_new'
			)
		));

		if ($validation->passed()) {
			
			if (Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
				echo "<p class='error'>Your current password is incorrect</p>";
			} else {
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('password_new'), $salt),
					'salt' => $salt
				));

				Session::flash('home', 'Your password has been changed');
				Redirect::to('index.php');
			}

		} else {

			foreach ($validation->errors() as $error) {
				echo "<p class='error'>$error</p>";
			}
		}
	}
}



view('settings', $data);