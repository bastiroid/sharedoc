<?php

require_once 'sharedoc.php';

$user = new User();

if ($user->isLoggedIn()) {
	$data = $user->data();

	view('index', $data);
} else {
	Redirect::to('login.php');
}


