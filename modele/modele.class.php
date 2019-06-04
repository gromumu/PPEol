<?php

	/*
	cette classe modele permet d'acceder à la BDD avce différentes méthodes :
	connexion, select, delete, update etc.
	*/

	class Modele
	{
		private $pdo; //instance de la classe PDO

		public function __construct($serveur, $bdd, $user, $mdp)
		{
			$this->pdo = null;
			try{
				$this->pdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
			}
			catch(Exception $exp){
				echo "Erreur de la connexion à la BDD ! ";
			}

		}
	}
?>