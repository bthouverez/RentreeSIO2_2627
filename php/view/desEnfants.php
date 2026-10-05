

	<table>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Num tel</th>
			<th>Distance au sol</th>
			<th>% humidité</th>
			<th>Naissance</th>
		</tr>

		<?php foreach($enfants as $e) { ?>
		<tr>
			<td><?= $e->id ?></td>
			<td><?= $e->nom ?></td>
			<td><?= $e->prenom ?></td>
			<td><?= $e->num_tel ?></td>
			<td><?= $e->distance_au_sol ?></td>
			<td><?= $e->taux_humidite ?></td>
			<td><?= $e->date_naissance ?></td>
		</tr>
		<?php } ?>
	</table>
