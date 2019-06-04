<?php
	/*
	cette classe modele permet d'acceder à la BDD avce différentes méthodes :
	connexion, select, delete, update etc.
	*/

	class Modele_membre
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

		public function connexion($pseudo, $mdpco)
		{
			$requete="select count(*) as nb, pseudo, nom, prenom, adresse, dateNaissance, email, idMembre
			from Membre 
			where pseudo= :pseudo
			and mdpco = :mdpco
			group by idMembre;";
			$donnees = array('pseudo'=>$pseudo, "mdpco"=>$mdpco);
			
			echo "--->".$pseudo."  --->".$mdpco;

			if($this->pdo == null){
				echo "je suis la 000";
				return null;
			} else {
				$select = $this->pdo->prepare($requete);
				$select->execute($donnees);
				$membre = $select->fetch();
				
				echo "je suis la 001";
				var_dump($membre);
				return $membre;
			}
		}

		public function inscription($nom,$prenom,$pseudo,$adresse,$date,$email,$mdp)
		{
			$requete="insert into membre values(null, :nom, :prenom, :pseudo, :adresse, :date, :email, :mdp);";

			if($this->pdo == null){
				return null;
			} else {
				$donnees = array(":nom"=>$nom, ":prenom"=>$prenom, ":pseudo"=>$pseudo,":adresse"=>$adresse, ":date"=>$date,":email"=>$email,":mdp"=>$mdp);
				$select = $this->pdo->prepare($requete);
				$select->execute($donnees);
			}
		}

		public function modifier($nom,$prenom,$pseudo,$adresse,$date,$email){
			
			$requete="update membre set  :nom, :prenom, :pseudo, :adresse, :date, :email where idMembre = :idMembre;";
			if($this->pdo == null){
				return null;
			} else {
				$donnees = array(":nom"=>$nom, ":prenom"=>$prenom, ":pseudo"=>$pseudo,":adresse"=>$adresse, ":date"=>$date,":email"=>$email,":idMembre"=>$idMembre);
				$select = $this -> pdo->prepare($requete);
				$select->execute($donnees);
				$infos = $select->fetch();
				return $infos;
			}
	 	}


	 

	 }
?>