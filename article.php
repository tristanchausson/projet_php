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
	<h2>Article</h2>

<?php
	$id = $_GET["id"];
	$query = "SELECT * FROM blog WHERE id='$id'";
	$result = mysqli_query($db, $query);
	//affiche l'article cliqué et le développe
	while ($donnees = mysqli_fetch_array($result)) {
		echo $donnees['titre']."<br/>";
		echo $donnees['intro']."<br/>";
		echo '<a href="blog.php"> <img src="'.$donnees['image'].'" height="30%" width="30%"></a>'."<br/>";
		echo $donnees['texte']."<br/>";
		echo $donnees['date']."<br/>"."<br/>"."<br/>";
	}
?>
</section>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>