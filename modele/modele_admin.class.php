<?php

	/*
	cette classe modele permet d'acceder à la BDD avce différentes méthodes :
	connexion, select, delete, update etc.
	*/

	class Modele_admin
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

		public function connexionAdmin($emailAdmin, $mdpAdmin)
		{
			$requete = "select count(*) as nb, emailAdmin, idAdmin
			from Administrateurs
			where emailAdmin = :emailAdmin
			and mdpAdmin = :mdpAdmin
			group by idAdmin
			;";
			$donnees = array('emailAdmin'=>$emailAdmin, "mdpAdmin"=>$mdpAdmin);
			if($this->pdo == null){
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute($donnees);
				$Administrateurs = $select->fetch();
				return $Administrateurs;
			}
		}			
	 }
?>