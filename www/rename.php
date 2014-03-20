<?php

require_once 'sharedoc.php';

$user = new User();

if ($user->isLoggedIn()) {

	$user = new User();
	$data['user'] = $user->data();

	if (!$_POST['group_id']) {
		
	} else {
		$new_group_name = escape($_POST['name']);
		$group_id = escape($_POST['group_id']);

		$group_rename = new Group();
		$group_rename->find($group_id);

		// $group_rename->data();

		$group_rename->change(
			array(
				'name' => $new_group_name
			)
		);	
	}

	Redirect::to('index.php');

} else {
	Redirect::to('login.php');
}