<?php
	/*
	cette classe modele permet d'acceder à la BDD avce différentes méthodes :
	connexion, select, delete, update etc.
	*/

	class Modele_message
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


		public function envoyer_message( $nom, $prenom, $email, $theme, $message, $idMembre)
		{
			$requete = "insert into message values(null, :nom, :prenom, NOW(),:email , :theme, :message, :idMembre);";

			if($this->pdo == null){
				return null;
			} else {
				$donnees = array(":nom"=>$nom, ":prenom"=>$prenom, ":email"=>$email, ":theme"=>$theme, ":message"=>$message,":idMembre"=>$idMembre);
				$select = $this->pdo->prepare($requete);
				$select->execute($donnees);
			}
		}


		public function afficher_message()
		{
			$requete="select * from message;";

			if($this->pdo == null){
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute();
				$afficher_message = $select->fetchAll();
				return $afficher_message;
			}
		}

		public function supprimer_message($tab)
		{
			$requete="delete from message where idmessage = :idmessage;";
			if($this->pdo == null){
				return null;
			} else {
				$donnees = array(":idmessage"=>$tab['idmessage']);
				$select = $this->pdo->prepare($requete);
				$select->execute($donnees);
			}
		}
	}
?>