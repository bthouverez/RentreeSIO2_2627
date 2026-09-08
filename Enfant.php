<?php 

class Enfant {
	private int    $id;
	private string $dateNaiss;
	private string $numTel;
	private string $nom;
	private string $prenom;
	private float  $tauxHumidite;
	private int    $distanceAuSol;

	public function __construct() {
		$this->id = 42;
		$this->dateNaiss = '2002-02-03';
		$this->numTel = '+33612365478';
		$this->nom = 'John';
		$this->prenom = 'Doe';
		$this->tauxHumidite = 0.25;
		$this->distanceAuSol = 75;
	}

	public function __get($attr) {
		switch($attr) {
			case 'id': 				return $this->id; 				break;
			case 'dateNaiss': 		return $this->dateNaiss; 		break;
			case 'numTel': 			return $this->numTel; 			break;
			case 'nom': 			return $this->nom; 				break;
			case 'name':			return $this->nom;				break;
			case 'prenom': 			return $this->prenom; 			break;
			case 'tauxHumidite': 	return $this->tauxHumidite; 	break;
			case 'distanceAuSol': 	return $this->distanceAuSol; 	break;
			default: return;
		}
	}

	public function __set($attr, $val) {
		switch($attr) {
			case 'id': 				$this->id = $val; 			break;
			case 'dateNaiss': 		$this->dateNaiss = $val; 	break;
			case 'numTel': 			$this->numTel = $val; 		break;
			case 'nom': 			$this->nom = $val; 			break;
			case 'prenom': 			$this->prenom = $val; 		break;
			case 'tauxHumidite': 	$this->tauxHumidite = $val; break;
			case 'distanceAuSol': 	$this->distanceAuSol = $val;break;
			default: return;
		}
	}

	public function __toString() {
		$r = '';
		$r .= 'id : ' . $this->id  . PHP_EOL; 
		$r .= 'dateNaiss : ' . $this->dateNaiss  . PHP_EOL; 
		$r .= 'numTel : ' . $this->numTel  . PHP_EOL; 
		$r .= 'nom : ' . $this->nom  . PHP_EOL; 
		$r .= 'prenom : ' . $this->prenom  . PHP_EOL; 
		$r .= 'tauxHumidite : ' . $this->tauxHumidite  . PHP_EOL; 
		$r .= 'distanceAuSol : ' . $this->distanceAuSol  . PHP_EOL; 
		return $r;
	}
}

