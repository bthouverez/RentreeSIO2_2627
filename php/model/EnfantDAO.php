<?php
require_once('DAO.php');
require_once('Enfant.php');
require_once('Stylo.php');

class EnfantDAO extends DAO {

	

	// getById($id) : Enfant
	public function getById(int $id) : Enfant {
		// int => Enfant

		// requete SQL
		$sql = "SELECT e.id, nom, prenom, num_tel, date_naissance, distance_au_sol, taux_humidite, couleur, marque, niveau_encre, fonctionne
 FROM Enfants e LEFT JOIN Stylos s ON s.id_enfant = e.id WHERE e.id =  ?";
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

			foreach($tabEnfants as $tabEnfant) if($tabEnfant['marque']) {
				$s = new Stylo;
				// $s->id = $tabEnfant['id'];
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




	public function getAll() : array {

		// requete SQL qui choppe tous les enfant
		$sql = 'SELECT * FROM Enfants';
		$stmt = $this->pdo->query($sql);

			$allEnfants = array();
			// parcourir chaque ligne résultat et créer un Enfant
			foreach($stmt->fetchAll() as $tab) {
				$e = new Enfant;
				$e->id = $tab['id']; 
				$e->nom = $tab['nom']; 
				$e->prenom = $tab['prenom']; 
				$e->num_tel = $tab['num_tel']; 
				$e->date_naissance = $tab['date_naissance']; 
				$e->distance_au_sol = $tab['distance_au_sol'];
				$e->taux_humidite = $tab['taux_humidite'];
				
				// ajouter cet enfant créé dans un array
				$allEnfants[] = $e;
			}

		// renvoyer cet array
		return $allEnfants;

	}

	// Créer et persister (sauvegarder dans la bdd) un Enfant
	public function create(Enfant $enfant) : int { 

		// Extraire les données en $enfant

		// a insérer dans une requête INSERT INTO

		// renvoyer l'id du nouvel enfant créé

	}

	// update()

	// delete()

}