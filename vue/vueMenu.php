	<nav>
		<ul class="menu">
			<li><a href="index.php?page=1" class="listemenu">ACCUEIL</a></li>
			<li><a href="index.php?page=2" class="listemenu">EQUIPE MASCULINE</a></li>
			<li><a href="index.php?page=3" class="listemenu">EQUIPE FEMININE</a></li>
			<li>AUTRES
				<ul class="submenu">		
					<li><a href="index.php?page=4" class="listemenu">ACADEMIE</a></li>
					<li><a href="index.php?page=5" class="listemenu">E-SPORT</a></li>
					<li><a href="index.php?page=6" class="listemenu">SUPPORTERS</a></li>
				</ul>
			</li>
			
			<?php

			if (isset($_SESSION['idMembre']))
			{
				echo '
					<li><a href="index.php?page=8" class="listemenu">BOUTIQUE</a></li>
					<li>MON COMPTE
						<ul class="submenu">
							<li><a href="index.php?page=10" class="listemenu">MON PANIER</a></li>
							<li><a href="index.php?page=11" class="listemenu">MES COMMANDES</a><l/i>
							<li><a href="index.php?page=12" class="listemenu">NEWSLETTER</a></li>
							<li><a href="index.php?page=13" class="listemenu">DECONNEXION</a></li>
						</ul>
					</li>';
			}else if(isset($_SESSION['idAdmin']))
			{
				echo '
					<li>GESTION
						<ul class="submenu">
							<li><a href="index.php?page=16" class="listemenu">GESTION MESSAGES</a></li>
							<li><a href="index.php?page=17" class="listemenu">GESTION PRODUITS</a></li>
							<li><a href="index.php?page=18" class="listemenu">GESTION NEWSLETTER</a></li>
							<li><a href="index.php?page=19" class="listemenu">DECONNEXION</a></li>
						</ul>
					</li>
					';
			}else{
				echo '<li>CONNEXION / INSCRIPTION
						<ul class="submenu">
							<li><a href="index.php?page=9" class="listemenu">ESPACE ABONNES</a></li>
							<li><a href="index.php?page=15" class="listemenu">ADMIN</a></li>
						</ul>
				</li>';
			}
			?>
			<li><a href="index.php?page=14" class="listemenu">CONTACT</a></li>
		</ul>
	</nav>
