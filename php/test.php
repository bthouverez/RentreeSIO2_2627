
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');
require_once('model/StyloDAO.php');

//$daoStylo = new StyloDAO;

//$daoStylo->delete(2);

$daoEnfant = new EnfantDAO;
$lesEnfantsMouilles = $daoEnfant->getEnfantsTresMouillesQuiOntFaim();
$lesEnfantsMouilles = $daoEnfant->getAll();

include('view/desEnfants.php');

?>
