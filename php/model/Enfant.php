<?php 

class Enfant {
	private int    $id;
	private string $date_naissance;
	private ?string $num_tel;
	private string $nom;
	private string $prenom;
	private float  $taux_humidite;
	private int    $distance_au_sol;
	private array  $trousse;

	public function __construct() {
		$this->id = -1;
		$this->date_naissance = '';
		$this->num_tel = '';
		$this->nom = '';
		$this->prenom = '';
		$this->taux_humidite = 0;
		$this->distance_au_sol = 0;
		$this->trousse = [];
	}

	public function __get($attr) {
		switch($attr) {
			case 'id': 				return $this->id; 				break;
			case 'date_naissance': 		return $this->date_naissance; 		break;
			case 'num_tel': 			return $this->num_tel; 			break;
			case 'nom': 			return $this->nom; 				break;
			case 'name':			return $this->nom;				break;
			case 'prenom': 			return $this->prenom; 			break;
			case 'taux_humidite': 	return $this->taux_humidite; 	break;
			case 'distance_au_sol': 	return $this->distance_au_sol; 	break;
			case 'trousse': 		return $this->trousse; 			break;
			default: return;
		}
	}

	public function __set($attr, $val) {
		switch($attr) {
			case 'id': 				$this->id = $val; 			break;
			case 'date_naissance': 		$this->date_naissance = $val; 	break;
			case 'num_tel': 			$this->num_tel = $val; 		break;
			case 'nom': 			$this->nom = $val; 			break;
			case 'prenom': 			$this->prenom = $val; 		break;
			case 'taux_humidite': 	$this->taux_humidite = $val; break;
			case 'distance_au_sol': 	$this->distance_au_sol = $val;break;
			case 'trousse': 	$this->trousse = $val;break;
			default: return;
		}
	}

	public function addStylo(Stylo $stylo) {
		$this->trousse[] = $stylo;
	}

	public function __toString() {
		$r = '';
		$r .= 'id : ' . $this->id  . PHP_EOL; 
		$r .= 'date_naissance : ' . $this->date_naissance  . PHP_EOL; 
		$r .= 'num_tel : ' . $this->num_tel  . PHP_EOL; 
		$r .= 'nom : ' . $this->nom  . PHP_EOL; 
		$r .= 'prenom : ' . $this->prenom  . PHP_EOL; 
		$r .= 'taux_humidite : ' . $this->taux_humidite  . PHP_EOL; 
		$r .= 'distance_au_sol : ' . $this->distance_au_sol  . PHP_EOL; 
		return $r;
	}
}

