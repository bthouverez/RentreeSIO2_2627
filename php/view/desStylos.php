<table>
	<thead>
		<tr>
			<th>id</th>
			<th>marque</th>
			<th>couleur</th>
			<th>niveau encre</th>
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
		<td><a href="index.php?stylo=<?= $s->id ?>">GO</a></td>
		<td> ???? </td>
	</tr>

	<?php } ?>

</table>