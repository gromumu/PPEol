<div class="banniere">
<h3>Boutique</h3>
</div>

<center>
<div class='col-md-6'>
	<table class="table table-striped table-dark">
		
		<tr><td>Description</td><td>Libelle</td><td>Prix(€)</td><td>Catégorie</td></tr>

		<?php

		foreach($afficher_produit as $unproduit){
			echo"
				<tr>
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