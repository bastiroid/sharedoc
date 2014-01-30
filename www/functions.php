<?php

function view($path, $data = null){
	if ($data) {

		if (is_array($data)) {
			extract($data);
		} else {
			get_object_vars($data);
		}
	}

	$path = $path . '.view.php';

	include "views/layout.php";
}

function escape($string){
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

?>