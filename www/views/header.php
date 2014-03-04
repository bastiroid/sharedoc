	<div id='header'>
		<h1>Welcome <?php echo $data->first_name; ?></h1>
	    <div class='userbox'>
	    	<div id='cssmenu'>
				<ul>
	   				<li class='has-sub last'><a href='#'><span><?php echo $data->first_name; ?></span></a>
	      				<ul>
	         				<li><a href='settings.php'><span>Account</span></a></li>
	         				<li class='last'><a href='logout.php'><span>Logout</span></a></li>
	      				</ul>
	   				</li>
				</ul>
			</div>
		</div>
	</div>