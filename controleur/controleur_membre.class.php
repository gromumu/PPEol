<?php

	//appel du modele
	include ("modele/modele_membre.class.php");

	/*
		cette classe a pour but le traitement des données 
		avant ou après la sollicication du modèle
	*/

	class Controleur_membre
	{
		private $unModeleMembre;

		public function __construct($serveur, $bdd, $user, $mdp)
		{
			$this->unModeleMembre = new Modele_membre($serveur, $bdd, $user, $mdp);
		}

		public function inscription($nom,$prenom,$pseudo,$adresse,$date,$email,$mdp)
		{
			$this->unModeleMembre->inscription($nom,$prenom,$pseudo,$adresse,$date,$email,$mdp);
		}

		public function connexion($pseudo, $mdpco)
		{
			return $this->unModeleMembre->connexion($pseudo, $mdpco);
		}

		public function modifier($nom,$prenom,$pseudo,$adresse,$date,$email)
		{
			$this->unModeleMembre->modifier($nom,$prenom,$pseudo,$adresse,$date,$email);
		}
	}
?>