<?php

require_once 'sharedoc.php';

$user = new User();

if ($user->isLoggedIn()) {

	$user = new User();
	$data['user'] = $user->data();

	if (!$_POST['group_id']) {
		$new_document_name = $new_group_name = escape($_POST['name']);
		$doc_id = escape($_POST['doc_id']);

		$document_rename = new Document();
		$document_rename->find($doc_id);
		var_dump($document_rename);
		$document_rename->change(
			array(
				'name' => $new_document_name
			)
		);
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