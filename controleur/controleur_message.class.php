<?php

	//appel du model
	include ("modele/modele_message.class.php");

	/*
		cette classe a pour but le traitement des données 
		avant ou après la sollicication du modèle
	*/

	class Controleur_message
	{
		private $unModeleMessage;

		public function __construct($serveur, $bdd, $user, $mdp)
		{
			$this->unModeleMessage = new Modele_message ($serveur, $bdd, $user, $mdp);
		}

		public function afficher_message()
		{
			return $this->unModeleMessage->afficher_message();
		}

		public function envoyer_message($nom, $prenom, $email, $theme, $message, $idMembre)
		{
			$this->unModeleMessage->envoyer_message($nom, $prenom, $email, $theme, $message, $idMembre);
		}

		public function supprimer_message($tab)
		{
			//traitement de l'id Client
			$this->unModeleMessage->supprimer_message($tab);
		}
	}
?>