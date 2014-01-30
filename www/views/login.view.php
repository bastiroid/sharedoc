<h1>Sharedoc</h1>
<h2>Sign in</h2>

<form action="" method="post">
	<ul>

		<li>
			<label for="email">Email address</label>
			<input type="text" name="email" id="email" value="<?= escape(Input::get('email')) ?>">
		</li>

		<li>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</li>

		<li>
			<label for="remember">
				<input type="checkbox" name="remember" id="remember">
				Remember me
			</label>
			
		</li>

		<li>
			<input type="hidden" name="token" value="<?= Token::generate(); ?>">
			<input type="submit" value="Login">
		</li>
	</ul>

	<?php if (isset($status)) : ?>
		<p><?= $status; ?></p>
	<?php endif; ?>
</form>

<p><a href="signup.php">Not a member yet? Sign up here</a></p>