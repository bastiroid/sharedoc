<?php

require_once 'sharedoc.php';

$user = new User();

if ($user->isLoggedIn()) {

	$user = new User();
	$data['user'] = $user->data();

	$groups = new Group();
	$groups->getGroups();
	$data['groups'] = $groups->data();

	$documents = new Document();
	$documents->getDocuments();
	$data['documents'] = $documents->data();

	view('index', $data);

} else {
	Redirect::to('login.php');
}


