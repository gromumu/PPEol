<div class="banniere">
<h3>Messages</h3>
</div>


<center>
<div class='col-md-6'>
	<table class="table table-striped table-dark">
		
		<tr><td>ID Message</td><td>Nom</td><td>Prenom</td><td>Date du Message</td><td>E-mail</td><td>Thème</td><td>Message</td></tr>

		<?php

		foreach($afficher_message as $unmessage){
			echo"
				<tr>
					<td>".$unmessage['idMessage']."</td>
					<td>".$unmessage['nom']."</td>
					<td>".$unmessage['prenom']."</td>
					<td>".$unmessage['dateMessage']."</td>
					<td>".$unmessage['email']."</td>
					<td>".$unmessage['theme']."</td>
					<td>".$unmessage['message']."</td>
				</tr>
				";
			}
		?>
	</table>
</div>

<div class="supprimermessage">
	<center>
	<h2>Supprimer un Message</h2>
	<table>
		<tr><form method="post" action="index.php?page=16">
		<td><h3>ID Message </h3></td><td> <input type="text" name="idmessage"></td></tr>

		<tr><td></td><td><input type="submit" name="supprimermessage" value="Supprimer"></td></tr>
		</form>
	</table>
	</center>
</div>

</center>