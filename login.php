<?php
	session_start();  //affichage de la connexion utilisateur
	include 'users/bdd.php';  //connexion à la base de données
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Login</title>
</head>
<body>
<main>
	<nav>
		<?php include 'menu.php';?>
	</nav>
</main>
<section>
	<h2>Create Account</h2>

	<form action="login.php" method="post">
		<div>
			<label for="username">User Name</label>
		</div>
		<div>
			<input type="text" name="username" id="username" required="">
		</div>
		<div>
			<label for="password1">Password</label>
		</div>
		<div>
			<input type="password" name="password1" id="password1" required="">
		</div>
		<div>
			<label for="password2">Re Type Password</label>
		</div>
		<div>
			<input type="password" name="password2" id="password2" required="">
		</div>
			<button type="submit" value="ok" id="ok">Submit</button>
		<br/>

<?php
	if(!empty($_POST['username'])) {
		$user = $_POST['username'];	
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];
		$hashed_password = hash('sha512', $_POST['password1']);
	//vérification de la concordance des 2 mots de passe
		if($pass1!==$pass2) {
			echo "Mot de passe non valide !";
		}
	//insertion dans la BDD
	$query = "INSERT INTO account (username, password) VALUES ('$user', '$hashed_password')";
	$sql = "SELECT * FROM account WHERE username = '".$user."'";
	$result = mysqli_query($db,$sql);
	//si l'utilisateur existe déjà 
	    if(mysqli_num_rows($result)>=1) {
	        echo"Name already exists";
	    }
	//sinon crée l'utilisateur
		else if (mysqli_query($db, $query)) {
			echo "New user created successfully";
		}
		else{
			echo "Error" . $query."<br>" . mysqli_error($db);
		}
	}
?>

	</form>

	<h2>Login</h2>

	<form action="login.php" method="post">
		<div>
			<label for="user_name">User Name</label>
		</div>
		<div>
			<input type="text" name="user_name" id="user_name">
		</div>
		<div>
			<label for="password">Password</label>
		</div>
		<div>
			<input type="password" name="password" id="password">
		</div>
			<button type="submit" value="send" id="send">Connect</button>
		<br/>

<?php
	if(!empty($_POST['user_name'])) {
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$hashed_pass = hash('sha512', $_POST['password']);

	$sql = "SELECT * FROM account WHERE username = '".$user_name."'";
	$pass = "SELECT * FROM account WHERE password = '".$hashed_pass."'";
	$resuser = mysqli_query($db,$sql);
	$respass = mysqli_query($db,$pass);
	   
	    if((mysqli_num_rows($resuser)>=1) && (mysqli_num_rows($respass)>=1)) {
	        header('Location: /index.php');
  			$_SESSION['nom'] = $user_name;
	    }

		else{
			echo "Utilisateur ou mot de passe incorrect !";
			echo "Error" . $query."<br>" . mysqli_error($db);
		}
	}
?>
	</form>
</section>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>