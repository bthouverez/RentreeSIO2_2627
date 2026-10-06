<table class="table-stylos">
	<thead>
		<tr>
			<th>id</th>
			<th>marque</th>
			<th>couleur</th>
			<th>niveau encre</th>
			<th>propriétaire</th>
			<th>voir</th>
			<th>suppr</th>
		</tr>
	</thead>

	<?php foreach($stylos as $s) { ?>
		<tr>
		<td><?= $s->id ?></td>
		<td><?= $s->marque ?></td>
		<td><?= $s->couleur ?></td>
		<td><?= $s->niveau_encre ?></td>
		<td><?= $s->id ?></td>
		<td><a href="index.php?stylo=<?= $s->id ?>">Voir</a></td>
		<td><a href="index.php?supprStylo=<?= $s->id ?>">X</a> </td>
	</tr>

	<?php } ?>

</table>