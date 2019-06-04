<?php

	//appel du modele
	include ("modele/modele_boutique.class.php");

	/*
		cette classe a pour but le traitement des données 
		avant ou après la sollicication du modèle
	*/

	class Controleur_boutique
	{
		private $unModeleBoutique;

		public function __construct($serveur, $bdd, $user, $mdp)
		{
			$this->unModeleBoutique = new Modele_boutique ($serveur, $bdd, $user, $mdp);
		}

		public function afficher_produit()
		{
			return $this->unModeleBoutique->afficher_produit();
		}

		public function afficher_categorie()
		{
			return $this->unModeleBoutique->afficher_categorie();
		}

		public function ajouter_produit($description, $libelle,$prix, $categorie)
		{
			$this->unModeleBoutique->ajouter_produit($description, $libelle,$prix, $categorie); 
		}

		public function ajouter_categorie($libelle)
		{
			$this->unModeleBoutique->ajouter_categorie($libelle);
		}

		public function supprimer_produit($tab)
		{
			$this->unModeleBoutique->supprimer_produit($tab);
		}

		public function nb_produits()
		{
			return $this->unModeleBoutique->nb_produits();
		}
	}
?>