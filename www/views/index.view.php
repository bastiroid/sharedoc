<?php

//var_dump($data); ?>

<ul id="filter">
<li><a href="#" class="f-all sel">All documents</a></li>
<?php if($data['groups']) foreach ($data['groups'] as $group): ?>

	<li><a href="#" class="f-<?= $group->id ?>"><?= $group->name ?></a></li>

<?php endforeach; ?>
</ul>

<br><br><br>

<ul id="list">
	<li class="create_doc">
		<a href="#" class="">create document</a>
    </li>
<?php if($data['documents']) foreach ($data['documents'] as $document): ?>

	<li class="doc"><a href="#" class="f-<?= $document->group_id ?>"><?= $document->name ?></a></li>

<?php endforeach; ?>
</ul>