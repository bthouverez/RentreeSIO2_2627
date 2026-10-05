<?php
require_once('DAO.php');
require_once('Enfant.php');
require_once('Stylo.php');

class EnfantDAO extends DAO {

	public function hydrate(array $tabFromFetch) : Enfant {
		$e = new Enfant;
		$e->id = $tabFromFetch['id'];
		$e->nom = $tabFromFetch['nom'];
		$e->prenom = $tabFromFetch['prenom'];
		$e->num_tel = $tabFromFetch['num_tel'];
		$e->taux_humidite = $tabFromFetch['taux_humidite'];
		$e->date_naissance = $tabFromFetch['date_naissance'];
		$e->distance_au_sol = $tabFromFetch['distance_au_sol'];
		return $e;
	}
	

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

			$enfant = $this->hydrate($tabEnfants[0]);

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

				$allEnfants[] = $this->hydrate($tab);
			}

		// renvoyer cet array
		return $allEnfants;

	}

	// Créer et persister (sauvegarder dans la bdd) un Enfant
	public function create(Enfant $enfant) : int { 
		// Extraire les données en $enfant
		$sql = "INSERT INTO Enfants 
				(nom, prenom, distance_au_sol, taux_humidite, date_naissance, num_tel) 
				VALUES (?, ?, ?, ?, ?, ?);";

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute(
			[
				$enfant->nom, 
				$enfant->prenom, 
				$enfant->distance_au_sol,
				$enfant->taux_humidite,
				$enfant->date_naissance, 
				$enfant->num_tel 
			]);

		// a insérer dans une requête INSERT INTO

		// renvoyer l'id du nouvel enfant créé
		return $this->pdo->lastInsertId();

	}

	// update()

	public function delete($id) : void {
		// Mettre le propriétaire a jour des stylos de l'enfant n° $id
		$this->pdo->prepare('UPDATE Stylos SET id_enfant = NULL WHERE id_enfant = ?')->execute([$id]);
		$this->pdo->prepare('DELETE FROM Macher WHERE id_enfant = ?')->execute([$id]);
		$this->pdo->prepare('DELETE FROM Enfants WHERE id = ?')->execute([$id]);
	}

	public function getEnfantsTresMouillesQuiOntFaim() : array {
		// retourne les enfants mouilles à + de 70% qui ont maché un stylo qui fonctionne
		$sql = "SELECT DISTINCT(e.id), nom, prenom, num_tel, date_naissance, distance_au_sol, taux_humidite FROM Enfants e 
			INNER JOIN Macher m ON m.id_enfant = e.id
			INNER JOIN Stylos s ON m.id_stylo = s.id
			WHERE e.taux_humidite > 0.7 
			AND s.fonctionne = TRUE";
		$stmt = $this->pdo->query($sql);
		$result = [];

		foreach($stmt->fetchAll() as $tabEnfant) {
			$result[] = $this->hydrate($tabEnfant);
		}

		return $result;

	}

}