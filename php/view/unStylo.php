	<section class="cardStylo">
		<?php if($stylo->id > 0) { ?>
		<h1><?= $stylo->id ?> - <?= $stylo->marque ?> <?= $stylo->couleur ?></h1>
		<span class="pastille" style="background: <?= $stylo->couleur ?>;"></span>

		<ul class="infos">
			<li>Niveau encre : <?= $stylo->niveau_encre ?>%</li>
			<li>Propriétaire
				<ul class="proprietaire">
					<li class="stylo">
					
						<?php if($stylo->enfant) { ?>
							<?= $stylo->enfant->nom ?> <?= $stylo->enfant->prenom ?>
							<span class="niveau"><?= $stylo->enfant->taux_humidite * 100 ?>% d'humidite</span>
						<?php } else { ?>
							Inconnu
						<?php } ?>


					</li>
				</ul>
			</li>
		</ul>

		<div class="nav">
			<a href="?stylo=<?= $stylo->id-1 ?>"><button>&larr; Précédent</button></a>
			<a href="?stylo=<?= $stylo->id+1 ?>"><button>Suivant &rarr;</button></a>
		</div>
	<?php } else { ?>
		<p class="empty">Aucun stylo trouvé.</p>
	<?php } ?>
	</section>