<?php

	//appel du modele
	include ("modele/modele_admin.class.php");

	/*
		cette classe a pour but le traitement des données 
		avant ou après la sollicication du modèle
	*/

	class Controleur_admin
	{
		private $unModeleAdmin;

		public function __construct($serveur, $bdd, $user, $mdp)
		{
			$this->unModeleAdmin = new Modele_admin ($serveur, $bdd, $user, $mdp);
		}

		public function connexionAdmin($emailAdmin, $mdpAdmin)
		{
			return $this->unModeleAdmin->connexionAdmin($emailAdmin, $mdpAdmin);
		}
	}
?>