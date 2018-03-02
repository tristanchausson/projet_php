<?php
	session_start();  //affichage de la connexion utilisateur
	include 'users/bdd.php';  //connexion à la base de données
?>
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
<section>
	<h2>Evenement</h2>
<?php
	$req = "SELECT DISTINCT lieu FROM evenement ORDER BY lieu";
	$resultat = mysqli_query($db, $req);
	$options = "";
	while ($donnees = mysqli_fetch_array($resultat)) {
		$options .= "<option value='".$donnees['lieu']."'>".$donnees['lieu']."</option>";
	}
?>
	<form action="evenement.php" method="post">
		<p>Trier par lieu :</p>
		<select name="lieu" id="lieu">
			<option value="choix">Choix de la ville</option>
			<?php
				echo $options;
			?>
		</select>
		<button type="submit" value="filter" id="filter">Filtrer</button>
	</form>
	<br/>

<?php
	//obligation d'être connecté pour accéder à la page
	if (empty($_SESSION['nom'])) {
		header('Location: /login.php');
	}
	//affichage selon le lieu
	else if (isset($_POST['lieu']) && ($_POST['lieu']) !== "choix") {
		$lieu = $_POST['lieu'];
		$query = "SELECT * FROM evenement WHERE lieu = '".$lieu."' ORDER BY date";
	}
	//tri par date
	else {
		$query = "SELECT * FROM evenement ORDER BY date";
	}
	//affiche tous les résultats si rien n'est sélectionné
	$result = mysqli_query($db, $query);

	while ($donnees = mysqli_fetch_array($result)) {
		if(date("Y-m-d") < $donnees['date']) {
			echo '<h3>'.$donnees['titre']."</h3><br/>"."<br/>";
			echo '<img src="'.$donnees['image'].'" height="30%" width="30%">'."<br/>";
			echo $donnees['intro']."<br/>";
			echo '<p><b>Débute le : '.$donnees['date']." ";
			echo 'Et se termine le : '.$donnees['fin']."</b><p>";
			echo 'À : '.$donnees['lieu']."<br/>";
			echo 'Publié le : '.$donnees['publi']."<br/>"."<br/>"."<br/>";
		}
	}
?>
</section>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>