<h1>
	Formulaire d'ajout d'enfant
</h1>

<form method="post" action="index.php">
	<label class="form-label" for="nom">Nom :</label>
	<input class="form-control" type="text" name="nom" id="nom">
	<label class="form-label" for="prenom">Prénom :</label>
	<input class="form-control" type="text" name="prenom" id="prenom">
	<label class="form-label" for="taux_humidite">Taux humidité :</label>
	<input class="form-control" type="text" name="taux_humidite" id="taux_humidite">
	<label class="form-label" for="distance_au_sol">Distance au sol :</label>
	<input class="form-control" type="number" name="distance_au_sol" id="distance_au_sol">
	<label class="form-label" for="date_naissance">Date naissance :</label>
	<input class="form-control" type="date" name="date_naissance" id="date_naissance">
	<label class="form-label" for="num_tel">Numéro de téléphone :</label>
	<input class="form-control" type="text" name="num_tel" id="num_tel">

	<button class="btn btn-success" name="btnAjoutEnfant">Enregistrer</button>
</form>