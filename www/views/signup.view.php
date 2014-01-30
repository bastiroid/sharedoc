<h1>Sharedoc</h1>
<h2>Register a new account</h2>

<form action="" method="post">
	<ul>
		<li>
			<label for="first_name">First name</label>
			<input type="text" name="first_name" id="first_name" value="<?= escape(Input::get('first_name')) ?>">
		</li>

		<li>
			<label for="last_name">Last name</label>
			<input type="text" name="last_name" id="last_name" value="<?= escape(Input::get('last_name')) ?>">
		</li>

		<li>
			<label for="email">Email address</label>
			<input type="text" name="email" id="email" value="<?= escape(Input::get('email')) ?>">
		</li>

		<li>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</li>

		<li>
			<label for="pwd_again">Password again</label>
			<input type="password" name="pwd_again" id="pwd_again">
		</li>

		<li>
			<input type="hidden" name="token" value="<?= Token::generate(); ?>">
			<input type="submit" value="Create new account">
		</li>
	</ul>

	<?php if (isset($status)) : ?>
		<p><?= $status; ?></p>
	<?php endif; ?>
</form>