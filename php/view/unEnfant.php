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
						<span class="pastille" style="background: <?= $stylo->toHTMLColor() ?>;"></span>
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