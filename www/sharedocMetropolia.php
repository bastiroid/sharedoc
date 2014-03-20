<?php

session_start();

require 'functions.php';

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'mysql.metropolia.fi',
		'username' => 'nt3rn3t0hj3lm0nt',
		'password' => 'm4e7t2r9op3ol2ia',
		'database' => 'nt3rn3t0hj3lm0nt'
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	)
);

// Autoload class fíle
spl_autoload_register(function($class){
	require_once 'classes/' . $class . '.php';
});

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {

	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if ($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}