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

	<form action="contact.php" method="post">
		<select name="thematique" id="thematique">
			<option value="Lieu1">Trier par lieu</option>
			<option value="Lieu1">Toulouse</option>
			<option value="Lieu2">Bordeaux</option>
			<option value="Lieu3">Paris</option>
			<option value="Lieu3">Cahors</option>
			<option value="Lieu3">Strasbourg</option>
			<option value="Lieu3">Nantes</option>
		</select>
	</form>
	<br/>
	<?php
		if (empty($_SESSION['nom'])) {
			header('Location: /login.php');
		}
		else {
			$db = mysqli_connect('localhost', 'root', 'root', 'projet_php') or die ('Erreur de connexion au serveur mySQL');
			$query = "SELECT * FROM evenement ORDER BY date DESC";
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
		}

	?>





	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>