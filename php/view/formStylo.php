<h1>

Ajouter un stylo
</h1>

<form method="post" action="index.php">
	<label class="form-label" for="couleur">Couleur</label>
	<input class="form-control" id="couleur" type="text" name="couleur" />
	<label class="form-label" for="marque">Marque</label>
	<input class="form-control" id="marque" type="text" name="marque" />
	<label class="form-label" for="niveau_encre">Niveau d'encre</label>
	<input class="form-control" id="niveau_encre" type="text" name="niveau_encre" />

	<label class="form-label">Propriétaire</label>
	<select class="form-control" name="proprietaire">
		<option value="0">Choisir un étudiant...</option>
		<?php foreach($enfants as $e) { ?>
			<option value="<?= $e->id ?>"><?= $e->prenom ?> <?= $e->nom ?></option>
		<?php } ?>

	</select>


	<button name="btnAjoutStylo">Ajouter</button>
</form>
