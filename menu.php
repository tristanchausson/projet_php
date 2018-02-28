<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="about.php">A Propos</a></li>
	<li><a href="contact.php">Contact</a></li>
	<li><a href="blog.php">Blog</a></li>
	<li><a href="evenement.php">Evenement</a></li>
	<li><a href="login.php">Login</a></li>
	<li>
		<?php
			if (!empty ($_SESSION['nom'])) {
				echo "Bonjour : ".$_SESSION['nom'];	
		?>
	<form action="logout.php" method="post">
		<input type="submit" name="logout" value="logout" />
	</form>
		<?php
		}
		?>

	</li>
</ul>