<?php
require_once('Enfant.php');

class EnfantDAO {

	private PDO $pdo;

	// connecter à la base
	public function __construct() {

		try {
			$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=introSIO2', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR');
		}

	}


	// getById($id) : Enfant
	public function getById(int $id) : Enfant {
		// int => Enfant

		// requete SQL
		$sql = "SELECT * FROM Enfants e JOIN Stylos s ON s.id_enfant = e.id WHERE e.id = ?";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);

		// parcourir le résultat de la requête et de créer un Enfant
		$tabEnfants = $stmt->fetchAll();

		$enfant = new Enfant();

		if($tabEnfants) {

			$enfant->id = $tabEnfants[0]['id'];
			$enfant->nom = $tabEnfants[0]['nom'];
			$enfant->prenom = $tabEnfants[0]['prenom'];
			$enfant->num_tel = $tabEnfants[0]['num_tel'];
			$enfant->date_naissance = $tabEnfants[0]['date_naissance'];
			$enfant->distance_au_sol = $tabEnfants[0]['distance_au_sol'];
			$enfant->taux_humidite = $tabEnfants[0]['taux_humidite'];

			foreach($tabEnfants as $tabEnfant) {
				$s = new Stylo;
				$s->id = $tabEnfant['id'];
				$s->marque = $tabEnfant['marque'];
				$s->couleur = $tabEnfant['couleur'];
				$s->niveau_encre = $tabEnfant['niveau_encre'];
				$s->fonctionne = $tabEnfant['fonctionne'];
				$enfant->addStylo($s);
			}
		}

		// retourner cet Enfant
		return $enfant;
	}





	// getAll() : array d'Enfant

	// create()

	// update()

	// delete()

}