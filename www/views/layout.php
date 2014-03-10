<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sharedoc</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/filter-1.0.js"></script> 
</head>
<body>
	
	<?php
		$user = new User();
		if ($user->isLoggedIn()) require_once 'header.php';
	?>

	<div class="container">

		<?php include($path); ?>
	
	</div>

	<?php require_once 'footer.php'; ?>
	
</body>
</html>