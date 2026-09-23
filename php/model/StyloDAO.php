<?php

require_once 'DAO.php';
require_once 'Stylo.php';

class StyloDAO extends DAO {


	// getById($id) : Stylo

	// Read
	public function getById(int $id) : Stylo {
		// int => Stylo

		// requete SQL


		$sql = "SELECT * FROM Stylos s 
		LEFT JOIN Enfants e ON s.id_enfant = e.id WHERE s.id = ?";

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$id]);

		// parcourir le résultat de la requête et de créer un Stylo
		$tabStylo = $stmt->fetch();
		$stylo = new Stylo();


		if($tabStylo) {
			$stylo->id = $tabStylo[0];
			$stylo->marque = $tabStylo['marque'];
			$stylo->couleur = $tabStylo['couleur'];
			$stylo->fonctionne = $tabStylo['fonctionne'];
			$stylo->niveau_encre = $tabStylo['niveau_encre'];

			if(isset($tabStylo['nom'])) {

				$enfant = new Enfant;
				$enfant->id = $tabStylo['id'];
				$enfant->nom = $tabStylo['nom'];
				$enfant->prenom = $tabStylo['prenom'];
				$enfant->num_tel = $tabStylo['num_tel'];
				$enfant->date_naissance = $tabStylo['date_naissance'];
				$enfant->distance_au_sol = $tabStylo['distance_au_sol'];
				$enfant->taux_humidite = $tabStylo['taux_humidite'];

				$stylo->enfant = $enfant;
			} else {
				$stylo->enfant = null;
			}
		}

		// retourner cet Stylo
		return $stylo;
	}

	// Read
	public function getAll() : array {


		// requete SQL pour chopper chaque stylo 

		$sql = "SELECT * FROM Stylos";
		$stmt = $this->pdo->query($sql);  // execute la requete
	


// parcourir chaque ligne résultat (fetchAll) et créer un Stylo et lui associer l'enfant propriétaire


	/* Chacune des trois boucles fait la meme chose, a chaque tour
	de boucle, elle met un Stylo (array tout pourri) dans $tab et elle 
	boucle comme ça 50 fois, parce que y'a 50 stylos dans la BDD

		// CA 
		$allTab = $stmt->fetchAll();
		foreach($allTab as $tab) {

		}

		// EQUIVAUT A CA
		for($ii = 0; $ii < $stmt->rowCount(); $ii++) {
			$tab = $stmt->fetch();
		}
*/

		$lesStylos = [];

		// EQUIVAUT A CA AUSSI
		while($tab = $stmt->fetch()) {
			$stylo = new Stylo;
			$stylo->id = $tab['id'];
			$stylo->marque = $tab['marque'];
			$stylo->couleur = $tab['couleur'];
			$stylo->fonctionne = $tab['fonctionne'];
			$stylo->niveau_encre = $tab['niveau_encre'];

			// ajouter chaque stylo créé dans un array
			$lesStylos[] = $stylo;

		}


		// renvoyer cet array
		return $lesStylos;



	}

}