<?php
	session_start();
	include("controleur/controleur.class.php");
	include("controleur/controleur_admin.class.php");
	include("controleur/controleur_membre.class.php");
	include("controleur/controleur_boutique.class.php");
	include("controleur/controleur_message.class.php");

?>

<html>
	<head>
		<link rel="shortcut icon" type="image" href="medias/mqdefault.png" width="100%" height="auto"/>
		<title class="titre">
			Olympique Lyonnais | Site Officiel
		</title>

		<link rel="stylesheet" href="css/olppe.css">
		<link rel="stylesheet" href="css/menu.css">


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
	</head>

	<body>

	<div class="main">
		<div class="header">
			<a href="http://localhost:8888/Site%20OL/"><img src="medias/mqdefault.png" class="logo">
			<h6>OLYMPIQUE LYONNAIS</h6></a><br/>
		</div>

<?php
	/******************************************************************************************************/
	
		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
		} else {
			$page = 1;
		}

		$serveur="localhost";
		$dbname="siteol";
		$iddb="root";
		$mdpdb="root";

		$unControleur = new Controleur ($serveur, $dbname, $iddb, $mdpdb);
		$unControleur_admin = new Controleur_admin($serveur, $dbname, $iddb, $mdpdb);
		$unControleur_membre = new Controleur_membre($serveur, $dbname, $iddb, $mdpdb);
		$unControleur_boutique = new Controleur_boutique($serveur, $dbname, $iddb, $mdpdb);
		$unControleur_message = new Controleur_message($serveur, $dbname, $iddb, $mdpdb);
		
		
		switch($page){
		
			case 1 : include("vue/vueAccueil.php");
			break;

			case 2 : include("vue/vueEquipeMasculine.php");
			break;

			case 3 : include("vue/vueEquipeFeminine.php");
			break;

			case 4 : include("vue/vueAcademie.php");
			break;

			case 5 : include("vue/vueESport.php");
			break;

			case 6 : include("vue/vueSupporters.php");
			break;

			case 7 : include("vue/vuePartenaires.php");
			break;

			case 8 : 
				$afficher_produit=$unControleur_boutique -> afficher_produit();
				include("vue/vueBoutiqueMembre.php");
			break;

			case 9 : include("vue/vueEspaceAbonnes.php");

				if(isset($_POST['Validerco']))
				{
					$pseudo = $_POST['pseudo'];
					$mdpco = $_POST['mdpco'];
										 
					$membre = $unControleur_membre-> connexion($pseudo, $mdpco);

					if($membre['nb'] == 1){

						$_SESSION['pseudo'] = $membre['pseudo'];
						$_SESSION['nom'] = $membre['nom'];
						$_SESSION['prenom'] = $membre['prenom'];
						$_SESSION['adresse'] = $membre['adresse'];
						$_SESSION['email'] = $membre['email'];
						$_SESSION['dateNaissance'] = $membre['dateNaissance'];
						$_SESSION['idMembre'] = $membre['idMembre'];
						header('Location: index.php?page=8');
						echo "<br/>Vous êtes connecté : ".$membre['pseudo']."<br><br>";
						
						exit();
						
					}else{
						echo "<br/><h5><strong>!!! Veuillez verifier vos identifiants !!!</strong></h5><br>";
					}
				}
				 
				if(isset($_POST['Validerins']))
				{
					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$pseudo = $_POST['pseudo'];
					$adresse = $_POST['adresse'];
					$date = $_POST['date'];
					$email = $_POST['email'];
					$mdp = $_POST['mdp'];
					$confmdp = $_POST['confmdp'];

					$membre = $unControleur_membre -> inscription($nom,$prenom,$pseudo,$adresse,$date,$email,$mdp);


					if($_POST['nom'] == "" || $_POST['prenom'] == "" ||$_POST['pseudo'] == "" ||
					$_POST['adresse'] == "" ||$_POST['date'] == "" ||$_POST['email'] == "" || 
					$_POST['mdp'] == "" || $_POST['confmdp'] == ""){

						echo "<br/><h5><strong>!!! Veuillez remplir tous les champs !!!</strong></h5><br>";

					}else if($_POST['mdp'] != $_POST['confmdp']){
						echo"<br/><h5><strong>!!! Le mot de passe est incorrecte !!!</strong></h5><br>";
					}else{
						echo "<br/><h5><strong>Vous êtes inscrit : ".$_POST['pseudo']."</strong></h5><br>";
					}

				}

			break;

			case 10: include("vue/vueMonPanier.php");
			break;

			case 11: include("vue/vueMesCommandes.php");
			break;

			case 12: include("vue/vueNewsletter.php");
			break;

			case 13:
				if (isset($_SESSION['idMembre']))
				{
					header('Location: index.php?page=1');
					//echo "<br/><h5><strong>Merci de votre visiste ".$_SESSION['pseudo']."</strong></h5><br>";
					unset($_SESSION['idMembre']);
					unset($_SESSION['pseudo']);
				
					session_destroy();
					exit();
				}
			break;

			case 14 : 
				include("vue/vueContact.php");
				
				if (isset($_SESSION['idMembre']) || isset($_SESSION['idAdmin']))
				{
					if(isset($_POST['envoyermessage']))
					{
						$nom = $_POST['nomcontact'];
						$prenom = $_POST['prenomcontact'];
						$email = $_POST['emailcontact'];
						$theme = $_POST['theme'];
						$message = $_POST['messagecontact'];
						if (isset($_SESSION['idMembre']))
						{
							$idMembre = $_SESSION['idMembre'];
						} else {
							$idMembre = $_SESSION['idAdmin'];
						}
						

						$envoyer_message = $unControleur_message -> envoyer_message($nom, $prenom, $email, $theme, $message, $idMembre);
						echo"Votre message a été envoyé avec succès";
					}
				} else{
					
					echo"<br><h4>!!! Veuillez-vous <a href='index.php?page=9'>connecter/inscrire</a> afin d'envoyer un message !!!</h4>";

				}

			break;
				

			case 15 : include("vue/vueAdmin.php");

				if(isset($_POST['ValidercoAdmin']))
				{
					$emailAdmin = $_POST['emailAdmin'];
					$mdpAdmin = $_POST['mdpAdmin'];
					 
					$Administrateurs = $unControleur_admin-> connexionAdmin($emailAdmin, $mdpAdmin);
											
					if($Administrateurs['nb'] == 1){
					
						//echo "<br/>Vous êtes connecté : ".$Administrateurs['emailAdmin']."<br><br>";
						$_SESSION['emailAdmin'] = $Administrateurs['emailAdmin'] ;
						$_SESSION['idAdmin'] = $Administrateurs['idAdmin'] ;

						header('Location: index.php?page=16');
						exit();
						
					}else{
						echo "<br/><h5><strong>!!! Veuillez verifier vos identifiants !!!</strong></h5><br>";
					}
				}
			break;

			case 16 : 
			$afficher_message=$unControleur_message->afficher_message();
			include("vue/vueMessage.php"); 

			if(isset($_POST['supprimermessage'])){
				$unControleur_message->supprimer_message($_POST);
				header('Location: index.php?page=16');
			} break;


			case 17 : 
			$afficher_produit=$unControleur_boutique->afficher_produit();
			$afficher_categorie=$unControleur_boutique->afficher_categorie();

			include("vue/vueBoutiqueAdmin.php");
				
			if (isset($_SESSION['idAdmin']))
			{
				if(isset($_POST['ajouterProduit'])){
				
					$description = $_POST['descriptionProduit'];
					$libelle = $_POST['libelleProduit'];
					$prix = $_POST['prixProduit'];
					$categorie = $_POST['categorieProduit'];

					$ajouter_produit=$unControleur_boutique->ajouter_produit($description, $libelle,$prix, $categorie);

					header('Location: index.php?page=17');

				}

				if(isset($_POST['supprimerproduit'])){
					$unControleur_boutique->supprimer_produit($_POST);
					header('Location: index.php?page=17');
				}

				if(isset($_POST['ajouterCategorie'])){			
					$libelle = $_POST['libelleCategorie'];
					$ajouter_categorie=$unControleur_boutique->ajouter_categorie($libelle);

					header('Location: index.php?page=17');
				}

				if(isset($_POST['supprimercategorie'])){
					$unControleur_boutique->supprimer_categorie($_POST);
					
					header('Location: index.php?page=17');

				}

			}


			
							
			 break;

			case 18 : include("vue/vueGestionNews.php"); break;

			case 19 : 
				if (isset($_SESSION['idAdmin']))
				{
				
					header('Location: index.php?page=1');
  					
					unset($_SESSION['idAmin']);
					unset($_SESSION['emailAdmin']);
				
					session_destroy();
					exit();
				}
			case 20 : include("vue/vueTableauDeBordAdmin.php");break;

			case 23 : 
			$nb_produits=$unControleur_boutique -> nb_produits();
			include("vue/vueNbProduits.php"); break;
		}
	

	/************************ ******************************************************************************/

		include("vue/vueMenu.php");

?>

	<footer class="footer">
		<?php
			include("vue/vueFooter.php");
		?>
		<p style="font-size : 12px;">Site réalisé par <a href="https://www.infitex.fr/" target="_blank">Infitex</a> ® 2018</p> 
	</footer>
	</body>
</div>
</html>