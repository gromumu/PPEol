<div class="banniere">
<h3>Nous Contacter</h3>
</div>

<div class="contact">
	<div class="textcontact">
	<p><h3>Téléphone :</h3> 0892 69 69 69 (0,05€/min)<br/>
	du lundi au samedi de 10h à 19h.</p>

	<p><h3>Adresse :</h3> 10 Avenue Simone Veil, <br/>69150 Décines-Charpieu - France</p>
	</div>
	
	<html>
    	<div id="map">
    	<script>
    	  function initMap() {
    	    var uluru = {lat: 45.7652739, lng: 4.9822218};
    	    var map = new google.maps.Map(document.getElementById('map'), {
    	      zoom: 17,
    	      center: uluru
    	    });
    	    var marker = new google.maps.Marker({
    	      position: uluru,
    	      map: map
    	    });
    	  }
    	</script>
    	<script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKmhTHKZficEyKtc5wP_RuRJZsWr8J5Q4&callback=initMap">
    	</script>
    	</div>
    </html>
</div>

<?php

	if(isset($_SESSION['idMembre']))
	{
		echo'
<div class="formulaireContact">
<center>
	<form method ="post">
		<table>
			<tr><td><h3>Nom</h3></td><td><input type="text" name="nomcontact" value="'.$_SESSION['nom'].'"></td></tr>
			<tr><td><h3>Prénom</h3></td><td><input type="text" name="prenomcontact" value="'.$_SESSION['prenom'].'"></td></tr>
			<tr><td><h3>E-mail</h3></td><td><input type="text" name="emailcontact" value="'.$_SESSION['email'].'"></td></tr>
			<tr><td><h3>Thème</h3></td><td><select name="theme">
												<option>- Aucun -</option>
												<option>Groupama Statdium </option>
												<option>Billeterie OL</option>
												<option>Boutique OL</option>
												<option>Espace Client</option>
												<option>Avis</option>
												<option>Groupe OL</option>
												<option>Service Presse</option>
											</select>
											</td></tr>
			<tr><td><h3>Message</h3></td><td><input type="text" name="messagecontact"></td></tr>
			<tr><td><center><input type="submit" name="envoyermessage" value="Envoyer"></center></td></tr>
		</table>
	</form>
</center>
</div>';
	} else {
		
echo'<div class="formulaireContact">
<center>
	<form method ="post">
		<table>
			<tr><td><h3>Nom</h3></td><td><input type="text" name="nomcontact" placeholder="Nom du contact"></td></tr>
			<tr><td><h3>Prénom</h3></td><td><input type="text" name="prenomcontact" placeholder="Prénom du contact"></td></tr>
			<tr><td><h3>Date de naissance</h3></td><td><input type="date" name="datecontact" placeholder="Date de naissance"></td></tr>
			<tr><td><h3>E-mail</h3></td><td><input type="text" name="emailcontact" placeholder="E-mail"></td></tr>
			<tr><td><h3>Thème</h3></td><td><select name="theme">
												<option>- Aucun -</option>
												<option>Groupama Statdium </option>
												<option>Billeterie OL</option>
												<option>Boutique OL</option>
												<option>Espace Client</option>
												<option>Avis</option>
												<option>Groupe OL</option>
												<option>Service Presse</option>
											</select>
											</td></tr>
			<tr><td><h3>Message</h3></td><td><input type="textarea" name="messagecontact"></td></tr>
			<tr><td><center><input type="submit" name="envoyermessage" value="Envoyer"></center></td></tr>
		</table>
	</form>
</center>
</div>';
	}
?>