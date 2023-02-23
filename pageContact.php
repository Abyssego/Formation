<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="styleContact.css">
	<link rel="icon" type="image/x-icon" href="dessin/logo.png">
</head>
<body>

	<ul>	
		<li class="nav"><img id="logo" src="dessin/logo.png" alt="Kantan-Formation"></li>	
		<li><a href="pageInscription.php" id="reste">Inscription</a></li>
		<li><a href="pageContact.php" id="reste">Contact</a></li>
		<li><a href="pagePanier.php" id="reste">Achat</a></li>
		<li><a href="pageFormation.php" id="reste">Formation</a></li>
		<li><a href="pageIndex.php" id="reste">Accueil</a></li>
	</ul>

	<div id="corps">
		<div id="formulaire">
			<form method="post">
				<p>	
					<input type="text" name="nom" id="normal" placeholder="Nom / Prénom" size="30" />
					<br />		
					<input type="text" name="tel" id="normal" placeholder="Numéro de téléphone" size="30" maxlength="10" />  
					<br />
					<input type="email" name="email" id="normal" placeholder="Email" size="30" maxlength="100" required/>
					<br />
					<input type="text" name="objet" id="normal" placeholder="Objet" size="30"/>
					<br />
					<input type="text" name="message" id="message" placeholder="Message" size="30"/>
					<br />
					<button id="button2" type="submit" name ="btnenvoyer" >Envoyer</button>				
				</p>	
				
			</form>
		</div>

		<div id="information">
			<div id="info">
				<img src="dessin/logo.png">
				<p id="texteInfo">Kantan-Formation</p><br>
				<p id="texteInfo">Après avoir fait une Kantan-formation, vous pourrez enfin, <br> vous achetez des nouilles :)</p>
			</div>
		</div>
	</div>


	<?php
		if (isset($_POST['email'])) {
			$header = "Message de : " . $_POST["nom"] . "\r\n" . "dont le numéro de téléphone est : " . $_POST["tel"];
			$retour = mail($_POST["email"], $_POST["objet"], $_POST["message"], $header);
		    if ($retour){
		        echo "<p> L'email a bien été envoyé.</p>";
		    }
		}
    
    ?>



</body>
</html>