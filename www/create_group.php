<?php

require_once 'sharedoc.php';

$user = new User();

if ($user->isLoggedIn()) {

	$user = new User();
	$data['user'] = $user->data();

	$groups = new Group();
	$groups->getGroups();
	$data['groups'] = $groups->data();


	$new_group = new Group();
	$new_group->create(
		array(
			'name' => 'Untitled Group',
			'admin' => $data['user']->id,
			'is_shared' => true
		),
		array(
			'user_id' => $data['user']->id,
			'moderator' => true
		)
	);


	Redirect::to('index.php');

} else {
	Redirect::to('login.php');
}