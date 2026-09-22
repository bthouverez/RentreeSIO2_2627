<?php

// controller

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');


$daoEnfant = new EnfantDAO;

$enfant = $daoEnfant->getById(13);


// include copie/colle le code du fichier passé 
include('view/unEnfant.php');