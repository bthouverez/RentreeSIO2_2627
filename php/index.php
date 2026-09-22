<?php

// controller

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');

$idEnfant = $_GET['enfant'] ?? 22;

$daoEnfant = new EnfantDAO;

$enfant = $daoEnfant->getById($idEnfant);


// include copie/colle le code du fichier passé 
include('view/unEnfant.php');