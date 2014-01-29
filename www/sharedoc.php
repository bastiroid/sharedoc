<?php

session_start();

require 'functions.php';

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'database' => 'sharedoc'
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

// Autoload class fíle
spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
});