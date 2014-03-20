<?php

require_once 'sharedoc.php';

$user = new User();

if ($user->isLoggedIn()) {

	if (!is_numeric($_GET['id'])) {
		Redirect::to('index.php');
	}

	$has_access = false;

	$document = new Document();
	$document->find(escape($_GET['id']));
	$data['document'] = $document->data();

	$my_documents = new Document();
	$my_documents->getDocuments();
	$data['documents'] = $my_documents->data();

	foreach ($data['documents'] as $document) {

		if ($document->id == $data['document']->id) {
			$has_access = true;
		}
	}

	if ($has_access) {
		$data['user'] = $user->data();

		// $groups = new Group();
		// $groups->getGroups();
		// $data['groups'] = $groups->data();

		// $documents = new Document();
		// $documents->getDocuments();
		// $data['documents'] = $documents->data();

		$data['ip'] = $_SERVER['REMOTE_ADDR'];

		view('editor', $data);

		if (!$data['document']->is_open) {

			$docu = new Document();
			$docu->find($data['document']->id);
			$docu->change(array(
				'is_open' => true
			));

			$document->find(escape($_GET['id']));
			$data['document'] = $document->data();
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$content = $_POST['a'];
			$title = $_POST['b'];
			$docu = new Document();
			$docu->find($data['document']->id);
			$docu->change(array(
				'content' => $content,
				'is_open' => false,
				'name' => $title
			));

		}

	} else {
		Redirect::to('index.php');
	}

} else {
	Redirect::to('login.php');
}