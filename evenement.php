<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Evenement</title>
</head>
<body>
<main>
	<nav>
		<?php include 'menu.php';?>
	</nav>
</main>
	<h2>Evenement</h2>

	<form action="evenement.php" method="post">
		<p>Trier par lieu :</p>
		<select name="lieu" id="lieu">
			<option value="choix">Choix de la ville</option>
			<option value="Toulouse">Toulouse</option>
			<option value="Bordeaux">Bordeaux</option>
			<option value="Paris">Paris</option>
			<option value="Cahors">Cahors</option>
			<option value="Strasbourg">Strasbourg</option>
			<option value="Nantes">Nantes</option>
		</select>
		<button type="submit" value="filter" id="filter">Filtrer</button>
	</form>
	<br/>

<?php
	$db = mysqli_connect('localhost', 'root', 'root', 'projet_php') or die ('Erreur de connexion au serveur mySQL');
	
	if (empty($_SESSION['nom'])) {
		header('Location: /login.php');
	}

	else if (isset($_POST['lieu']) && ($_POST['lieu']) !== "choix") {
		$lieu = $_POST['lieu'];
		$query = "SELECT * FROM evenement WHERE lieu = '".$lieu."' ORDER BY date DESC";
	}

	else {
		$query = "SELECT * FROM evenement ORDER BY date DESC";
	}

	$result = mysqli_query($db, $query);

	while ($donnees = mysqli_fetch_array($result)) {
		echo $donnees['titre']."<br/>"."<br/>";
		echo '<img src="'.$donnees['image'].'" height="30%" width="30%">'."<br/>";
		echo $donnees['intro']."<br/>"."<br/>";
		echo 'Débute le : '.$donnees['date']."<br/>";
		echo 'Et se termine le : '.$donnees['fin']."<br/>"."<br/>";
		echo 'À : '.$donnees['lieu']."<br/>";
		echo 'Publié le : '.$donnees['publi']."<br/>"."<br/>"."<br/>";
	}

?>





	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>