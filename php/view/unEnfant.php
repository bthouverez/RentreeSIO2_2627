<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Un enfant</title>
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			background: orange;
			font-family: "Segoe UI", Arial, sans-serif;
			color: #333;
			display: flex;
			justify-content: center;
			padding: 40px 20px;
		}

		.cardEnfant {
			background: #fff;
			padding: 30px 35px;
			border-radius: 12px;
			box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
			width: 550px;
			max-width: 100%;
		}

		.cardEnfant h1 {
			margin: 0 0 20px;
			font-size: 1.5em;
			color: #2c3e50;
			border-bottom: 2px solid #eef1f5;
			padding-bottom: 12px;
		}

		.infos {
			list-style: none;
			padding: 0;
			margin: 0 0 20px;
		}

		.infos > li {
			padding: 8px 0;
			border-bottom: 1px solid #f0f0f0;
		}

		.infos > li:last-child {
			border-bottom: none;
		}

		.trousse {
			list-style: none;
			padding: 0;
			margin: 10px 0 0;
			display: flex;
			flex-direction: column;
			gap: 6px;
		}

		.stylo {
			display: flex;
			align-items: center;
			gap: 10px;
			padding: 6px 10px;
			background: #f7f8fa;
			border-radius: 6px;
		}

		.stylo .pastille {
			width: 14px;
			height: 14px;
			border-radius: 50%;
			border: 1px solid rgba(0, 0, 0, 0.2);
			flex-shrink: 0;
		}

		.stylo .niveau {
			margin-left: auto;
			font-size: 0.85em;
			color: #777;
		}

		.nav {
			display: flex;
			justify-content: space-between;
			margin-top: 25px;
		}

		.nav a {
			text-decoration: none;
		}

		.nav button {
			padding: 8px 18px;
			border: none;
			border-radius: 6px;
			background: #2c3e50;
			color: #fff;
			font-size: 1em;
			cursor: pointer;
		}

		.nav button:hover {
			background: #1a252f;
		}

		.empty {
			text-align: center;
			color: #888;
			font-size: 1.2em;
		}
	</style>
</head>
<body>

	<section class="cardEnfant">
		<?php if($enfant->id > 0) { ?>
		<h1><?= $enfant->id ?> - <?= $enfant->prenom ?> <?= $enfant->nom ?></h1>
		<ul class="infos">
			<li>Né(e) le <?= $enfant->date_naissance ?></li>
			<li>Tel : <?= $enfant->num_tel ?></li>
			<li>Mouillé(e) à <?= $enfant->taux_humidite*100 ?>%</li>
			<li>A <?= $enfant->distance_au_sol ?> cm du sol</li>
			<li><?= count($enfant->trousse) ?> stylo(s) :
				<ul class="trousse">
				<?php foreach($enfant->trousse as $stylo) { ?>
					<li class="stylo">
						<span class="pastille" style="background: <?= $stylo->couleur ?>;"></span>
						<?= $stylo->marque ?> de couleur <?= $stylo->couleur ?>
						<span class="niveau"><?= $stylo->niveau_encre ?>% d'encre</span>
					</li>
				<?php } ?>
				</ul>
			</li>
		</ul>

		<div class="nav">
			<a href="?enfant=<?= $enfant->id-1 ?>"><button>&larr; Précédent</button></a>
			<a href="?enfant=<?= $enfant->id+1 ?>"><button>Suivant &rarr;</button></a>
		</div>
	<?php } else { ?>
		<p class="empty">Aucun enfant trouvé.</p>
	<?php } ?>
	</section>

</body>
</html>
