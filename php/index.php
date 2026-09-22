<?php

// controller

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');
require_once('model/StyloDAO.php');


/*
$idEnfant = $_GET['enfant'] ?? 22;

$daoEnfant = new EnfantDAO;

$enfant = $daoEnfant->getById($idEnfant);


// include copie/colle le code du fichier passé 
include('view/unEnfant.php');
*/


$idStylo = $_GET['stylo'] ?? 12;

$daoStylo = new StyloDAO;

$stylo = $daoStylo->getById($idStylo);


// include copie/colle le code du fichier passé 
include('view/unStylo.php');
