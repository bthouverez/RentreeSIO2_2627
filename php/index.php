<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');
require_once('model/StyloDAO.php');

$daoStylo = new StyloDAO;

$stylo = $daoStylo->getById(13);

$stylos = $daoStylo->getAll();

echo '<pre>';

var_dump($stylos);
echo '</pre>';

$daoEnfant = new EnfantDAO;
$enfant = $daoEnfant->getById(24);

?>

<h1>Les stylos</h1>
Le stylo <?= $stylo->couleur ?> de la marque <?= $stylo->marque ?> appartient à  <?= $stylo->enfant->prenom ?> <?= $stylo->enfant->nom ?>


<h2>Les enfants</h2>
L'enfant <?= $enfant->nom ?> <?= $enfant->prenom ?> possède <?= count($enfant->trousse) ?> stylos : 

<ul>
	<?php foreach($enfant->trousse as $stylo) { ?>
		<li><?= $stylo->marque ?> <?= $stylo->couleur ?> </li>
	<?php }	?>
</ul>
<?php

