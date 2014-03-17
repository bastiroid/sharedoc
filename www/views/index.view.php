<form action="" method="post">
	<ul id="list">
		<li class="create_doc">
			<a href="" class="">Create Document</a>
	    </li>
	<?php if($data['documents']) foreach ($data['documents'] as $document): ?>

		<li class="doc"><a href="
			editor.php
			?id=<?= escape($document->id) ?>"
			class="f-<?= $document->group_id ?>"><?= $document->name ?></a></li>

	<?php endforeach; ?>
	</ul>
</form>