<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sharedoc</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
		<?php include($path); ?>
	<div id='header'>
    <div class='userbox'>
    	<div id='cssmenu'>
			<ul>
   				<li class='has-sub last'><a href='#'><span>Username</span></a>
      				<ul>
         				<li><a href='#'><span>Account</span></a></li>
         				<li class='last'><a href='#'><span>Logout</span></a></li>
      				</ul>
   				</li>
			</ul>
		</div>
	</div>
</div>	

	<div id="footer">
  		Copyright © <?php echo date("Y"); ?> ShareDoc
	</div>
	
</body>
</html>