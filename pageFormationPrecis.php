<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="styleFormationPrecis.css">
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
			echo "Connexion réussie" . '<br/>';
		}
		// En cas d'erreur, on affiche un message et arrete tout
		catch(PDOExeption $e) {
			echo "Erreur : " . $e->getMessage();
		}

		$resultat = $cnn -> prepare("SELECT NomFichier, IdFormation FROM formation ORDER BY IdFormation");
		$resultat->execute();

		$row = $resultat -> fetch();

		?>

		<div id="formulaire">
			<form method="get" action="pageFormationPrecis.php?formationChoisie= <?php echo $row['NomFichier']; ?> "> 
			<select name="formationChoisie" onchange="form.submit()">
			<option ><br> Choisissez une formation !</option>
			<option value="Tout"> Toutes les formations <br> </option>
			
			<option value="<?php echo $row['NomFichier']; ?>">  <?php echo $row['NomFichier'] .  '<br/>'; ?> </option>
			
			<?php
			while ($row = $resultat -> fetch())
			{ ?>
				
				<option value="<?php echo $row['NomFichier']; ?>">  <?php echo $row['NomFichier'] .  '<br/>'; ?> </option>
			
				
				<?php
			}
			?>

			</select>
			</form>
		</div>

	<?php
		$resultat->closeCursor();
		$cnn=null;
	?>



	<?php 
		if (isset($_GET['formationChoisie'])) {
			$host ="localhost";    //Nom de l'hote
			$bdd = "gestionformation";       //nom de la base de données
			$user = "root";
			$password = "chacal";

			//On essaie de se connecter
			try {    //Connexion à la base et au serveur
				$cnn = new PDO("mysql:host=$host;dbname=$bdd;charset=utf8",$user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			// En cas d'erreur, on affiche un message et arrete tout
			catch(PDOExeption $e) {
				echo "Erreur : " . $e->getMessage();
			}



			$formationChoisie=$_GET['formationChoisie'];

			if ($formationChoisie == "Tout") {
				$resultat = $cnn -> prepare("SELECT NomFichier, Descriptif, Niveau, NomTheme, formation.IdTheme FROM formation INNER JOIN theme on formation.IdTheme=theme.IdTheme");
				$resultat->execute();
			} else {
				$resultat = $cnn -> prepare("SELECT NomFichier, Descriptif, Niveau, NomTheme, formation.IdTheme FROM formation INNER JOIN theme on formation.IdTheme=theme.IdTheme WHERE NomFichier='$formationChoisie'");
				$resultat->execute();
			}

			


			?>

			<?php
			while ($row = $resultat -> fetch())
			{ ?>
					<div id="allDiv">
					  <div class="example-2 card" id="photo<?php echo $row['IdTheme'];?>">
					    <div class="wrapper">
					      <div class="data">
					        <div class="content">
					          <span class="type"><?php echo $row['NomTheme']; ?></span>
					          <h1 class="title"><a href="#"><?php echo $row['NomFichier']; ?></a></h1>
					          <p class="text"><?php echo $row['Descriptif']; ?>
					          	<br><br><button class="boutton"><a href="">Acheter</a></button>
					          </p>
					        </div>
					      </div>
					    </div>
					  </div>
				<?php
			}
			?>


		
			<?php

			$resultat->closeCursor();
			$cnn=null;
		}
	?>


</body>
</html>