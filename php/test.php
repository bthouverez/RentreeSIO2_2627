<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('model/EnfantDAO.php');
require_once('model/StyloDAO.php');

$daoEnfant = new EnfantDAO;
// LEs données qui viennent du formulaire
$nouvelEnfant = new Enfant;
$nouvelEnfant->nom = "Meluch";
$nouvelEnfant->prenom = "Jean claude";
$nouvelEnfant->taux_humidite = 0.82;
$nouvelEnfant->distance_au_sol = 126;
$nouvelEnfant->num_tel = null;
$nouvelEnfant->date_naissance = '1902-02-02';


$idNouvelEnfant = $daoEnfant->create($nouvelEnfant);
echo $idNouvelEnfant;