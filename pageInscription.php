<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="styleContact.css">
	<link rel="icon" type="image/x-icon" href="logo.png">
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
			<form method="post" action="pageInscription.php?">
				<p>	
					<input type="text" name="nom" id="normal" placeholder="Nom" size="30" />
					<br />		
					<input type="text" name="prenom" id="normal" placeholder="Prénom" size="30" maxlength="10" />  
					<br />
					<input type="email" name="email" id="normal" placeholder="Email" size="30" maxlength="100" required/>
					<br />
					<input type="password" name="mdp" id="normal" placeholder="Mot de passe" size="30"/>
					<br />
					<button id="button2" type="submit" name ="btnenvoyer" >Envoyer</button>	
					<p>Système d'inscription, non finie !!!</p>	
					<br />		
				</p>	
				
			</form>
		</div>


	<?php
		if (isset($_POST['email'])) {

			$compteur = 0;
			$code = "";
			while ($compteur!=6) {
				$random = rand(1, 9);
				$code = $code + strval($random);
				$compteur = $compteur + 1;
			}
			

			$header = "Message de : " . $_POST["nom"] . " " . $_POST["prenom"] . "\r\n" . "voici le code a rntré pour finir l'inscription : " . $code;
			$retour = mail($_POST["email"], "Kantan-Formation", "Bonjour, merci de vous être inscri", $header);
		    if ($retour){
		        echo "Un Email, a été envoyé à votre adresse email, veuillez entrer le code qui vous a été envoyé.";
		    }

			?> 


			<form method="post">
				<br /><input type="text" name="codeRenvoie" id="normal" placeholder="Entrer le code" size="10"/><br />
			</form>
			<?php
		}
    
    ?>





	<?php
		if (isset($_POST['code']) and $_POST['codeRenvoie']==$code) {
			echo "Votre compte a bien été enregistré";
		}
    
    ?>




</body>
</html>