<?php

function view($path, $data = null){
	if ($data) {
		extract($data);
	}

	$path = $path . '.view.php';

	include "views/layout.php";
}

function escape($string){
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

?>