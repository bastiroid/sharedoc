<?php

require_once 'sharedoc.php';

if (!$user->isLoggedIn) {
	Redirect::to('login.php');
} else {
	$user = new User();
	$data = $user->data();

	view('index', $data);
}