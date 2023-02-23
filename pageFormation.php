<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page d'accueil</title>
	<link rel="stylesheet" type="text/css" href="styleFormation.css">
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



	<div id="allForm"> 
		<form method="post" action="pageFormationPrecis.php">
			<button>Rechercher une formation</button>
		</form>
			  
		<form method="post" action="pageFormationVague.php">
			<button >Parcourirs les formations</button>
		</form>
	</div>	




</body>
</html>