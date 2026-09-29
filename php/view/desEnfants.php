<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Des Efantns</title>
</head>
<body>


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

		<?php foreach($lesEnfantsMouilles as $e) { ?>
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


</body>
</html>