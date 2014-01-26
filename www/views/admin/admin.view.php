<h1>Sharedoc</h1>

<h2>List of users</h2>
<ul>
	<?php if ($users) foreach ($users as $user) : ?>
	<li>
		<?= $user['first_name']; ?> <?= $user['last_name']; ?>
	</li>
	<?php endforeach ?>
</ul>