<?php

require_once 'Stylo.php';

class StyloDAO {


	private PDO $pdo;

	// connecter à la base
	public function __construct() {
		try {
			$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=introSIO2', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR');
		}
	}


	// getById($id) : Stylo
	public function getById(int $id) : Stylo {
		// int => Stylo

		// requete SQL
		$sql = "SELECT * FROM Stylos s 
		JOIN Enfants e ON s.id_enfant = e.id WHERE s.id = ?";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);

		// parcourir le résultat de la requête et de créer un Stylo
		$tabStylo = $stmt->fetch();
		$stylo = new Stylo();

		if($tabStylo) {
			$stylo->id = $tabStylo['id'];
			$stylo->marque = $tabStylo['marque'];
			$stylo->couleur = $tabStylo['couleur'];
			$stylo->fonctionne = $tabStylo['fonctionne'];
			$stylo->niveau_encre = $tabStylo['niveau_encre'];

			$enfant = new Enfant;
			$enfant->id = $tabStylo['id'];
			$enfant->nom = $tabStylo['nom'];
			$enfant->prenom = $tabStylo['prenom'];
			$enfant->num_tel = $tabStylo['num_tel'];
			$enfant->date_naissance = $tabStylo['date_naissance'];
			$enfant->distance_au_sol = $tabStylo['distance_au_sol'];
			$enfant->taux_humidite = $tabStylo['taux_humidite'];

			$stylo->enfant = $enfant;
		}

		// retourner cet Stylo
		return $stylo;
	}


	public function getAll() : array {

		// requete SQL avec jointure pour chopper chaque stylo avec son propriétaire, sans forcément la préparer (juste un $pdo->query($req) )
		

			// parcourir chaque ligne résultat (fetchAll) et créer un Stylo et lui associer l'enfant propriétaire

			// ajouter chaque stylo créé dans un array

		// renvoyer cet array

	}

}