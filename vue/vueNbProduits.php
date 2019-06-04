<div class="banniere">
<h3>NB Produits</h3>
</div>

<center>
<div class='col-md-6'>
	<table class="table table-striped table-dark">
		
		<tr><td>idCategorie</td><td>Libelle</td><td>Nombre de Produits</td></tr>

		<?php

		foreach($nb_produits as $NBproduit){
			echo"
				<tr>
					<td>".$NBproduit['idcategorie']."</td>
					<td>".$NBproduit['libelle']."</td>
					<td>".$NBproduit['nb_produits_par_categorie']."</td>
				</tr>
				";
			}
		?>
	</table>
</div>
</center>