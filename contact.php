<?php
	session_start();  //affichage de la connexion utilisateur
	include 'users/bdd.php';  //connexion à la base de données
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Contact</title>
</head>
<body>
<main>
	<nav>
		<?php include 'menu.php';?>
	</nav>
</main>
<section>
	<div id="contact">
	<h2>Contact</h2>
		<div id="formulaire">
			<form action="contact.php" method="post">
				<div>
					<label for="objet">Objet</label>
				</div>
				<div>
					<input type="text" name="objet" id="objet" required="">
				</div>
				<div>
					<textarea name="message" placeholder="Votre Message" rows="10" cols="50" id="message" required=""></textarea>
				</div>
				<div>
					<select name="thematique" id="thematique">
						<option value="Theme1">Theme 1</option>
						<option value="Theme2">Theme 2</option>
						<option value="Theme3">Theme 3</option>
					</select>
				</div>
					<p>Avez-vous un compte utilisateur ?</p>
					<div>
						<label for="oui">Oui</label>
							<input type="radio" name="compte" id="oui" value="oui">
						<label for="non">Non</label>
							<input type="radio" name="compte" id="non" value="non">
					</div>
				<div>
					<label for="age">Votre Age</label>
				</div>
				<div>
					<input type="number" min="0" max="100" name="age" id="age">
				</div>
					<button type="button" value="delete" id="delete" onclick="javascript:eraseText();">Effacer</button>
					<button type="submit" value="ok" id="ok">Envoyer</button>
			</form>
		</div>
	</div>
<?php 
	if(!empty($_POST)) {
		$objet = $_POST['objet'];	
		$message = $_POST['message'];
		$thematique = $_POST['thematique'];
		$compte = $_POST['compte'];
		$age = $_POST['age'];
	//définition des termes non autorisés
		if (stripos($objet, "simplon") !== false) {
			echo "<p>Ces mots ne sont pas acceptés !</p>";
		}
	//affiche les infos rentrées par l'utilisateur
		else {
			echo "<p>Objet : </p>";
			echo $_POST['objet'];
			echo "<p>Votre Message : </p>";
			echo $_POST['message'];
			echo "<p>Thème : </p>";
			echo $_POST['thematique'];
			echo "<p>Compte Utilisateur : </p>";
			echo $_POST['compte'];
			echo "<p>Votre Age : </p>";
			echo $_POST['age'];
	//envoie les infos vers la BDD
		$query = "INSERT INTO contact (objet, message, thematique, compte, age) VALUES ('$objet', '$message', '$thematique', '$compte', '$age')";
			if (mysqli_query($db, $query)) {
				echo "New record created successfully";
			}else{
				echo "Error" . $query."<br>" . mysqli_error($db);
			}
		}
	}
?>

</section>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>