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

	$requested_group = escape($_GET['group_id']);

	if (is_numeric($requested_group)) {

		$has_access = false;

		foreach ($data['groups'] as $group) {
			if ($group->id == $requested_group) {
				$has_access = true;
			}
		}

		if ($has_access) {
			$new_document = new Document();
			$new_document->create(array(
				'name' => 'Untitled Document',
				'group_id' => $requested_group,
				'admin_id' => $data['user']->id,
				'creation_date' => strtotime("now")
			));
		}
	}

	Redirect::to('index.php');

} else {
	Redirect::to('login.php');
}