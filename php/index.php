<?php 

require_once('model/EnfantDAO.php');

$dao = new EnfantDAO;

$enfant = $dao->getById(7);

var_dump($enfant);