<?php
	session_start();  //affichage de la connexion utilisateur
	include 'users/bdd.php'; //connexion à la base de données
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Nouvel Article</title>
</head>
<body>
<main>
	<nav>
		<?php include 'menu.php';?>
	</nav>
</main>
<section id="nouvel_article">
	<h2>Nouvel Article</h2>

	<form action="nouvel_article.php" method="post">
		<input type="text" name="titre" value="Titre de l'article"><br/>
		<textarea name="intro" value="introduction" placeholder="Introduction"></textarea><br/>
		<input type="text" name="image" value="tapez l'url de votre image ici"><br/>
		<textarea name="texte" value="description" placeholder="Description"></textarea><br/>
		<input type="date" name="date" value="Date de publication"><br/>
		<input type="submit" name="envoyer" value="Envoyer">
	</form>

<?php
	
?>

</section>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>