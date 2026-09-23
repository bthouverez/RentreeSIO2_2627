<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');
require_once('model/StyloDAO.php');

$daoEnfant = new EnfantDAO;

$nouvelEnfant = new Enfant;
$nouvelEnfant->nom = "Macron";
$nouvelEnfant->prenom = "Brigitte";
$nouvelEnfant->taux_humidite = 0.12;
$nouvelEnfant->distance_au_sol = 12536;
$nouvelEnfant->date_naissance = '1953-04-13';


$daoEnfant->create($nouvelEnfant);
