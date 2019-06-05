<?php
	/*
	cette classe modele permet d'acceder à la BDD avce différentes méthodes :
	connexion, select, delete, update etc.
	*/

	class Modele_boutique
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

		public function afficher_produit(){
	 		$requete="select p.idProduit, p.idcategorie, p.description, p.categorie, p.prix, c.libelle
	 			from Produit p, categorie c
	 			where p.idcategorie = c.idcategorie;";


	 		if($this->pdo == null){
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute();
				$afficher_produit = $select->fetchAll();
				return $afficher_produit;
			}
	 	}

	 	public function afficher_categorie(){
	 		$requete="select idcategorie, libelle from categorie;";

	 		if($this->pdo == null){
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute();
				$afficher_categorie = $select->fetchAll();
				return $afficher_categorie;
			}
	 	}

	 	public function ajouter_produit($description, $libelle,$prix, $categorie){
	 		$requete="insert into Produit values(null, :description, :libelle, :prix, :categorie);";

	 		if ($this->pdo == null) {
	 		 	return null;
	 		 } else {
				$donnees = array(":description"=>$description, ":libelle"=>$libelle, ":prix"=>$prix, ":categorie"=>$categorie);	
				$select = $this->pdo->prepare($requete);
	 		 	$select->execute($donnees);
	 		 }
	 	}

	 	public function ajouter_categorie($libelle)
	 	{
	 		$requete="insert into categorie values(null, :libelle);";

	 		if($this->pdo == null){
	 			return null;
	 		} else {
	 			$donnees = array(":libelle"=>$libelle);
	 			$select = $this->pdo->prepare($requete);
	 			$select->execute($donnees);
	 		}
	 	}

	 	public function supprimer_produit($tab)
	 	{
	 		$requete="delete from Produit where idProduit = :idProduit;";
	 		if($this->pdo == null){
	 			return null;
	 		} else {
	 			$donnees = array(":idProduit"=>$tab['idProduit']);
	 			$select = $this->pdo->prepare($requete);
	 			$select->execute($donnees);
	 		}
	 	}

	 	public function supprimer_categorie($tab)
	 	{
	 		$requete="delete from categorie where idcategorie = :idcategorie;";
	 		if($this->pdo == null){
	 			return null;
	 		} else {
	 			$donnees = array(":idcategorie"=>$tab['idcategorie']);
	 			$select = $this->pdo->prepare($requete);
	 			$select->execute($donnees);
	 		}
	 	}

	 	public function nb_produits(){
	 		$requete="select * from nb_produits;";

	 		if($this->pdo == null){
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute();
				$nb_produits = $select->fetchAll();
				return $nb_produits;
			}
	 	}
	 }
?>