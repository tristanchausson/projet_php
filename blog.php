<?php
	session_start();  //affichage de la connexion utilisateur
	include 'users/bdd.php'; //connexion à la base de données
?>
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
<section>
	<h2>Blog</h2>

	<form action="blog.php" method="post">
		<p>Afficher par :
		<select name="tri" id="tri">
			<option value="croissant">Date croissante</option>
			<option value="decroissant">Date décroissante</option>
		</select>
		<button type="submit" value="filter" id="filter">Trier</button>
		</p>
	</form>
	<form method="post">
		<input type="submit" name="nouvel_article" value="Nouvel Article" id="new"></input>

	</form>
	<br/>

<?php
	//affichage selon le lieu et trie par date croissante
	if (isset($_POST['tri']) && ($_POST['tri'] === "croissant")) {
		$query = "SELECT * FROM blog ORDER BY date";
	}
	//tri par date décroissante
	else {
		$query = "SELECT * FROM blog ORDER BY date DESC";
	}
	$result = mysqli_query($db, $query);
	//affiche chaque article tant qu'il y a des entrées dans la BDD
	while ($donnees = mysqli_fetch_array($result)) {
		echo $donnees['titre']."<br/>";
		echo $donnees['intro']."<br/>";
		echo '<a href="article.php?id='.$donnees["id"].'"> <img src="'.$donnees['image'].'" height="30%" width="30%"></a>'."<br/>";
		echo $donnees['date']."<br/>"."<br/>"."<br/>";
	}
?>

</section>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>