<h1>Sharedoc</h1>
<h2>Sign in</h2>

<form action="" method="post">
	<ul>

		<li>
			<label for="email">Email address</label>
			<input type="text" name="email" id="email">
		</li>

		<li>
			<label for="pwd">Password</label>
			<input type="password" name="pwd" id="pwd">
		</li>

		<li>
			<input type="submit" value="Login">
		</li>
	</ul>

	<?php if (isset($status)) : ?>
		<p><?= $status; ?></p>
	<?php endif; ?>
</form>

<p><a href="signup.php">Not a member yet? Sign up here</a></p>