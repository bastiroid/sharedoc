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
		<a href="#" class="get_selected_group_class"><img src="http://placehold.it/200x250&text=create+document"></a>
    </li>
<?php if($data['documents']) foreach ($data['documents'] as $document): ?>

	<li><a href="#" class="<?= $document->id ?>"><?= $document->name ?></a></li>

<?php endforeach; ?>
</ul>