<?php

require_once 'sharedoc.php';

$data = array();

if (Session::exists('success')) {
	echo Session::flash('success');
}

if (Input::exists()) {
	
	if (Token::check(Input::get('token'))) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(

			'email' => array(
				'required' => true
			),

			'password' => array(
				'required' => true
			)

		));

		if ($validation->passed()) {
			$user = new User();
			$remember = (Input::get('remember') === 'on' ? true : false);

			$login = $user->login(Input::get('email'), Input::get('password'), $remember);

			if ($login) {
				Redirect::to('index.php');
			} else {
				$data['status'] = 'Your email address or password is invalid.';
			}

		} else {

			$data['status'] = '';
			
			foreach ($validation->errors() as $error) {
				$data['status'] .= "<p>$error</p>";
			}
		}
	}
}

view('login', $data);

?>