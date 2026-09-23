<?php

class DAO {
	
	protected PDO $pdo;

	// connecter à la base
	public function __construct() {
		try {
			$this->pdo = new PDO('mysql:host=127.0.0.1;dbname=lesenfantsmouillesdustylo', 'bthouverez', '321654');
		} catch(Exception $e) {
			die('ERROR : '.$e->getMessage() );
		}
	}
}