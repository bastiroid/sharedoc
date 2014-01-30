<?php

require_once 'sharedoc.php';

$user = new User();
$user->logout();

Redirect::to('login.php');