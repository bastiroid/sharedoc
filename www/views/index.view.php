<?php

var_dump($data); ?>

<ul>
<?php if($data['groups']) foreach ($data['groups'] as $group): ?>

	<li><?= $group->name ?></li>

<?php endforeach; ?>
</ul>

<br><br><br>

<ul>
<?php if($data['documents']) foreach ($data['documents'] as $document): ?>

	<li><?= $document->name ?></li>

<?php endforeach; ?>
</ul>
