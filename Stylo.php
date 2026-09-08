<?php 

class Stylo {
	private int    $id;
	private string $couleur;
	private string $marque;
	private bool   $fonctionne;
	private int    $niveauEncre;

	public function __construct() {
		$this->id = 42;
		$this->couleur = 'Orange';
		$this->marque = 'Parker';
		$this->fonctionne = true;
		$this->niveauEncre = 75;
	}

	public function __get__($attr) {
		switch($attr) {
			case 'id': 				return $this->id; 				break;
			case 'couleur': 		return $this->couleur; 			break;
			case 'marque': 			return $this->marque; 			break;
			case 'fonctionne':		return $this->fonctionne; 		break;
			case 'niveauEncre': 	return $this->niveauEncre; 	    break;
			default: return;
		}
	}

	public function __set__($attr, $val) {
		switch($attr) {
			case 'id': 				$this->id = $val; 			break;
			case 'couleur': 		$this->couleur = $val; 		break;
			case 'marque': 			$this->marque = $val; 		break;
			case 'fonctionne': 		$this->fonctionne = $val; 	break;
			case 'niveauEncre': 	$this->niveauEncre = $val;	break;
			default: return;
		}
	}

	public function __toString() {
		$r = '';
		$r .= 'id : ' . $this->id  . PHP_EOL; 
		$r .= 'marque : ' . $this->marque  . PHP_EOL; 
		$r .= 'couleur : ' . $this->couleur  . PHP_EOL; 
		$r .= 'niveauEncre : ' . $this->niveauEncre  . PHP_EOL; 
		$r .= 'fonctionne : ' . $this->distanceAuSol  . PHP_EOL; 
		return $r;
	}
}

