<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="stylePanier.css">
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


	<?php 
		$host ="localhost";    //Nom de l'hote
		$bdd = "gestionformation";       //nom de la base de données
		$user = "root";
		$password = "chacal";

		//On essaie de se connecter
		try {    //Connexion à la base et au serveur
			$cnn = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			echo "Connexion réussie";
		}
		// En cas d'erreur, on affiche un message et arrete tout
		catch(PDOExeption $e) {
			echo "Erreur : " . $e->getMessage();
		}

		$resultat = $cnn -> prepare("SELECT nomFichier FROM formation");
		$resultat->execute();


		$row = $resultat -> fetch();


		?>
		<div id="corps">
			<div class="formulaire">
				<form method="get" action="download.php?formationChoisie= <?php echo $row['nomFichier']; ?> "> 

					<label>Entrer votre nom : </label>
					<input type="text" id="nom" placeholder="nom" size="30" />
					<br />	

					<label>Entrer votre prénom : </label>
					<input type="text" id="prenom" placeholder="prenom" size="30" />
					<br />	

					<select name="formationChoisie">
					<option value="<?php echo $row['nomFichier']; ?>">  <?php echo $row['nomFichier'] .  '<br/>'; ?> </option>
					<?php
					while ($row = $resultat -> fetch())
					{ ?>
						
						<option value="<?php echo $row['nomFichier']; ?>">  <?php echo $row['nomFichier'] .  '<br/>'; ?> </option>
						
						<?php
					}
					?>

					</select>
					<br>
					<button type="submit">Télécharger</button>
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

		$resultat->closeCursor();
		$cnn=null;
	?>




</body>
</html>