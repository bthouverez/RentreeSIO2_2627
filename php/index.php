<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');
require_once('model/StyloDAO.php');

$daoEnfant = new EnfantDAO;
$daoStylo = new StyloDAO;


// controller

include('view/head.html');

if(isset($_GET['accueil'])) {
	include('view/accueil.html');
}

if(isset($_GET['enfants'])) {
	// Affichage de tous les enfants
	$enfants = $daoEnfant->getAll();
	include('view/desEnfants.php');
}

if(isset($_GET['enfant'])) {
	// Affichage d'un enfant
	if(isset($_GET['enfant']) && $_GET['enfant'] != '')
		$enfant = $daoEnfant->getById($_GET['enfant']);
	else
		$enfant = $daoEnfant->first();
	include('view/unEnfant.php');
}

if(isset($_GET['stylos'])) {
	$stylos = $daoStylo->getAll();
	include('view/desStylos.php');
}

if(isset($_GET['stylo'])) {
	// Affichage d'un stylo
	if(isset($_GET['stylo']) && $_GET['stylo'] != '')
		$stylo = $daoStylo->getById($_GET['stylo']);
	else
		$stylo = $daoStylo->first();
	
	include('view/unStylo.php');
}

// traitement du formulaire d'ajout
if(isset($_POST['btnAjoutEnfant'])) {
	$_POST['id'] = -1;
	$enfant = $daoEnfant->hydrate($_POST);
	$id = $daoEnfant->create($enfant);
	$enfant->id = $id;
	include('view/unEnfant.php');
}

if(isset($_GET['ajoutEnfant'])) {
	// La vue de création d'un enfant
	include('view/formEnfant.php');
}

if(isset($_GET['ajoutStylo'])) {
	$enfants = $daoEnfant->getAll();
	include('view/formStylo.php');
}

// traitement du formulaire d'ajout
if(isset($_POST['btnAjoutStylo'])) {
	$_POST['id'] = -1;
	$stylo = $daoStylo->hydrate($_POST);
	$e = new Enfant;
	if($_POST['proprietaire'] != "0"){
		$e->id = intval($_POST['proprietaire']);
		$stylo->enfant = $daoEnfant->getById($e->id);
	} else {
		$stylo->enfant = null;
	}
	$id = $daoStylo->create($stylo);
	$stylo = $daoStylo->getById($id);
	include('view/unStylo.php');
}

if(isset($_GET['supprStylo'])) {
	$daoStylo->delete($_GET['supprStylo']);
	$stylos = $daoStylo->getAll();
	include('view/desStylos.php');
}

include('view/foot.html');