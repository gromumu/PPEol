<div class="banniere">
<h3>Boutique</h3>
</div>

<center>
<div class='col-md-6'>
	<table class="table table-striped table-dark">
		
		<tr><td>ID Produit</td><td>Description</td><td>Libelle</td><td>Prix(€)</td><td>Catégorie</td></tr>

		<?php

		foreach($afficher_produit as $unproduit){
			echo"
				<tr>
					<td>".$unproduit['idProduit']."</td>
					<td>".$unproduit['description']."</td>
					<td>".$unproduit['categorie']."</td>
					<td>".$unproduit['prix']."</td>
					<td>".$unproduit['libelle']."</td>
				</tr>
				";
			}

			
		?>
	</table>
</div>
</center>
<br><br><br>
<div class="integrationProduit">
<center>
	<h2>Ajouter un produit</h3>
	<form method ="post">
		<table>
			<tr><td><h3>Description</h3></td><td><input type="text" name="descriptionProduit" placeholder="Description"></td></tr>
			<tr><td><h3>Libelle</h3></td><td><input type="text" name="libelleProduit" placeholder="Libelle"></td></tr>
			<tr><td><h3>Prix(€)</h3></td><td><input type="number" name="prixProduit" placeholder="Prix(€)"></td></tr>
			<tr><td><h3>Categorie</h3></td><td><select name='categorieProduit'>

			<?php
				foreach($afficher_categorie as $uneCategorie){
			echo"
					<option value=".$uneCategorie['idcategorie'].">".$uneCategorie['libelle']."</option>
				";
			}

			?>
			</select></td></tr>
			<tr><td><center><input type="submit" name="ajouterProduit" value="Ajouter"></center></td></tr>
		</table>
	</form>
</center>
</div>
<br><br><br>

<div class="supprimerproduit">
	<center>
	<h2>Supprimer un produit</h2>
	<table>
		<tr><form method="post" action="index.php?page=17">
		<td><h3>ID Produit</h3></td><td> <input type="text" name="idProduit" placeholder="exemple : 1"></td></tr>

		<tr><td></td><td><input type="submit" name="supprimerproduit" value="Supprimer"></td></tr>
		</form>
	</table>
	</center>
</div>
<br><br><br>

<center>
<div class='col-md-6'>
	<table class="table table-striped table-dark">
		
		<tr><td>ID Categorie</td><td>Libelle</td></tr>

		<?php

		foreach($afficher_categorie as $uneCategorie){
			echo"
				<tr>
					<td>".$uneCategorie['idcategorie']."</td>
					<td>".$uneCategorie['libelle']."</td>
				</tr>
				";
			}	
		?>
	</table>
</div>
</center>


<div class="integrationCategorie">
<center>
	<h2>Ajouter une Categorie</h2>
	<form method="post">
		<table>
			<tr><td><h3>Libelle</h3></td><td><input type="text" name="libelleCategorie" placeholder="Libelle"></td></tr>
			<tr><td><center><input type="submit" name="ajouterCategorie" value="Ajouter"></center></td></tr>
		</table>
	</form>
</center>
</div>
<br><br><br>

<div class="supprimercategorie">
	<center>
	<h2>Supprimer une categorie</h2>
	<table>
		<tr><form method="post" action="index.php?page=17">
		<td><h3>ID Categorie</h3></td><td> <input type="text" name="idcategorie" placeholder="exemple : 1"></td></tr>

		<tr><td></td><td><input type="submit" name="supprimercategorie" value="Supprimer"></td></tr>
		</form>
	</table>
	</center>
</div>




