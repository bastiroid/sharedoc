<h1>Sharedoc</h1>
<h2>Register a new account</h2>

<form action="" method="post">
	<ul>
		<li>
			<label for="firstname">First name</label>
			<input type="text" name="firstname" id="firstname">
		</li>

		<li>
			<label for="lastname">Last name</label>
			<input type="text" name="lastname" id="lastname">
		</li>

		<li>
			<label for="email">Email address</label>
			<input type="text" name="email" id="email">
		</li>

		<li>
			<label for="pwd">Password</label>
			<input type="password" name="pwd" id="pwd">
		</li>

		<li>
			<input type="submit" value="Create new account">
		</li>
	</ul>

	<?php if (isset($status)) : ?>
		<p><?= $status; ?></p>
	<?php endif; ?>
</form>