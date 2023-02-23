<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Inserer des données dans une table</title>
</head>
	<body>
		<?php 
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

			$resultat = $cnn -> prepare("SELECT DISTINCT theme.IdTheme, NomTheme, nomFichier, Descriptif, Niveau FROM theme INNER JOIN formation on formation.IdTheme=theme.IdTheme ORDER BY IdTheme");
			$resultat->execute();


			?>
			<h1>Formulaire, pour ajouter une formation</h1>
			<form method="post" action="pageAjouter.php?"> 

				<label>Nom : </label><input type="text" name="nom"> <br> <br>

				<label>Descriptif : </label><input type="text" name="des"> <br> <br>

				<label>Niveau : </label><input type="text" name="niv"> <br> <br>

				<label>IdTheme : </label>


				<select name="idt">
				<?php
				while ($row = $resultat -> fetch())
				{ ?>
					
					<option value="<?php echo $row['IdTheme']; ?>">  <?php echo $row['IdTheme'] . " : " . $row['NomTheme'] . '<br/>'; ?> </option>
					
					<?php
				}
				?>

				</select>
				<button type="submit">Envoyer</button>
			</form>

		<?php
			$resultat->closeCursor();
			$cnn=null;
		?>





		<?php 
		if (isset($_POST['nom'])) {
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


			$resultat = $cnn -> prepare('INSERT INTO formation (Descriptif, NomFichier, Niveau, IdTheme) VALUES (:des, :nom, :niv, :idt);');

			$resultat->bindParam(':des', $_POST["des"], PDO::PARAM_STR);
			$resultat->bindParam(':nom', $_POST["nom"], PDO::PARAM_STR);
			$resultat->bindParam(':niv', $_POST["niv"], PDO::PARAM_STR);
			$resultat->bindParam(':idt', $_POST["idt"], PDO::PARAM_STR);



			$resultat->execute();


			echo "A été ajouté";
			$cnn=null;
		}
		?>



		<p>================================================================================================================================================================================</p>



		<?php 
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

			$resultat = $cnn -> prepare("SELECT DISTINCT NomTheme, IdTheme FROM theme ORDER BY IdTheme");
			$resultat->execute();


			?>
			<h1>Formulaire, pour ajouter un thème</h1>
			<form method="post" action="pageAjouter.php?"> 

				<label>Nom : </label><input type="text" name="nomT"> <br> <br>


				<label>Thème déjà existant : </label>


				<select name="idt" >
				<?php
				while ($row = $resultat -> fetch())
				{ ?>
					
					<option disabled value="<?php echo $row['IdTheme']; ?>">  <?php echo $row['IdTheme'] . " : " . $row['NomTheme'] . '<br/>'; ?> </option>
					
					<?php
				}
				?>

				</select>
				<button type="submit">Envoyer</button>
			</form>

		<?php
			$resultat->closeCursor();
			$cnn=null;
		?>





		<?php 
		if (isset($_POST['nomT'])) {
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


			$resultat = $cnn -> prepare('INSERT INTO theme (NomTheme) VALUES (:nomT);');

			$resultat->bindParam(':nomT', $_POST["nomT"], PDO::PARAM_STR);




			$resultat->execute();


			echo "A été ajouté";
			$cnn=null;
		}
		?>
</body>
</html>