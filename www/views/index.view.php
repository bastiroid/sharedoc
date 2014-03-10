<?php

//var_dump($data); ?>
<ul id="list">
	<li class="create_doc">
		<a href="#" class="">create document</a>
    </li>
<?php if($data['documents']) foreach ($data['documents'] as $document): ?>

	<li class="doc"><a href="#" class="f-<?= $document->group_id ?>"><?= $document->name ?></a></li>

<?php endforeach; ?>
</ul>