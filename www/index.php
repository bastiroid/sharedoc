<?php

require_once 'sharedoc.php';

$user = new User();
$data = $user->data();

view('index', $data);