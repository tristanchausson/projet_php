<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Blog</title>
</head>
<body>
<main>
	<nav>
		<?php include 'menu.php';?>
	</nav>
</main>
	<h2>Blog</h2>

	<form action="blog.php" method="post">
		<p>Afficher par :</p>
		<select name="tri" id="tri">
			<option value="croissant">Date croissante</option>
			<option value="decroissant">Date décroissante</option>
		</select>
		<button type="submit" value="filter" id="filter">Trier</button>
	</form>
	<br/>

<?php
	$db = mysqli_connect('localhost', 'root', 'root', 'projet_php') or die ('Erreur de connexion au serveur mySQL');
	$query = "SELECT titre, image, intro, texte, date FROM blog ORDER BY date DESC";
	$result = mysqli_query($db, $query);

	while ($donnees = mysqli_fetch_array($result)) {
		echo $donnees['titre']."<br/>";
		echo $donnees['intro']."<br/>";
		echo '<img src="'.$donnees['image'].'" height="30%" width="30%">'."<br/>";
		echo $donnees['date']."<br/>"."<br/>"."<br/>";
	}
?>

	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>