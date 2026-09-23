<?php 

class Stylo {
	private int    $id;
	private string $couleur;
	private string $marque;
	private bool   $fonctionne;
	private int    $niveau_encre;
	private ?Enfant $enfant;

	public function __construct() {
		$this->id = -1;
		$this->couleur = '';
		$this->marque = '';
		$this->fonctionne = false;
		$this->niveau_encre = 0;
		$this->enfant = new Enfant();
	}

	public function __get($attr) {
		switch($attr) {
			case 'id': 				return $this->id; 				break;
			case 'couleur': 		return $this->couleur; 			break;
			case 'marque': 			return $this->marque; 			break;
			case 'fonctionne':		return $this->fonctionne; 		break;
			case 'niveau_encre': 	return $this->niveau_encre; 	break;
			case 'enfant': 			return $this->enfant; 			break;
			default: return;
		}
	}

	public function __set($attr, $val) {
		switch($attr) {
			case 'id': 				$this->id = $val; 			break;
			case 'couleur': 		$this->couleur = $val; 		break;
			case 'marque': 			$this->marque = $val; 		break;
			case 'fonctionne': 		$this->fonctionne = $val; 	break;
			case 'niveau_encre': 	$this->niveau_encre = $val;	break;
			case 'enfant': 			$this->enfant = $val;		break;
			default: return;
		}
	}

	public function __toString() {
		$r  = '';
		$r .= 'id : ' 		. $this->id  . PHP_EOL; 
		$r .= 'marque : ' 	. $this->marque  . PHP_EOL; 
		$r .= 'couleur : ' 	. $this->couleur  . PHP_EOL; 
		$r .= 'niveau_encre : ' 		. $this->niveau_encre  . PHP_EOL; 
		$r .= 'fonctionne : ' 		. $this->distanceAuSol  . PHP_EOL; 
		$r .= 'Propriétaire : ' 		. $this->enfant  . PHP_EOL; 
		return $r;
	}

	public function toHTMLColor(): string {
		switch($this->couleur) {
			case "Argenté": 	return "silver";
			case "Bleu": 		return "blue";
			case "Doré": 		return "goldenrod";
			case "Fuchsia": 	return "fuschia";
			case "Gris": 		return "grey";
			case "Jaune": 		return "yellow";
			case "Marron": 		return "brown";
			case "Noir": 		return "black";
			case "Orange": 		return "orange";
			case "Rose": 		return "pink";
			case "Rouge": 		return "red";
			case "Vert": 		return "green";
			case "Violet": 		return "purple";
		}
	}
}

