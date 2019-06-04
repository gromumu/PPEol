<?php

	//appel du modele
	include ("modele/modele.class.php");

	/*
		cette classe a pour but le traitement des données 
		avant ou après la sollicication du modèle
	*/

	class Controleur
	{
		private $unModele;

		public function __construct($serveur, $bdd, $user, $mdp)
		{
			$this->unModele = new Modele ($serveur, $bdd, $user, $mdp);
		}
	}
?>