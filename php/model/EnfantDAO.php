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
		$sql = "SELECT * FROM Enfants WHERE id = ?";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);

		// parcourir le résultat de la requête et de créer un Enfant
		$tabEnfant = $stmt->fetch();
		$enfant = new Enfant();
		
		if($tabEnfant) {
			$enfant->id = $tabEnfant['id'];
			$enfant->nom = $tabEnfant['nom'];
			$enfant->prenom = $tabEnfant['prenom'];
			$enfant->num_tel = $tabEnfant['num_tel'];
			$enfant->date_naissance = $tabEnfant['date_naissance'];
			$enfant->distance_au_sol = $tabEnfant['distance_au_sol'];
			$enfant->taux_humidite = $tabEnfant['taux_humidite'];
		}

		// retourner cet Enfant
		return $enfant;
	}





	// getAll() : array d'Enfant

	// create()

	// update()

	// delete()

}