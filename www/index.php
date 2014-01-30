<?php

require_once 'sharedoc.php';

$data = new User();

if (!$data->isLoggedIn()) {
	Redirect::to('login.php');
}


view('index', $data);