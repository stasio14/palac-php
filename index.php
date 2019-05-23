<?php
	session_start();
	
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: ocenianie.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Ocena konkursu</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h1>Zaloguj się, aby moc ocenić gry</h1>
		<a href="rejestracja.php" class="xd">Jeśli nie masz konta, zarejetruj się</a><br /><br/>
		<form action="zaloguj.php" method="POST">
			<input type="text" name="login" placeholder="Login: "/><br />
			<input type="password" name="haslo" placeholder="Hasło: "/><br /><br />
			<a href="odzyskaj.php">Kliknij jeżeli zapomniałeś hasła</a><br /><br />
			<input type="submit" value="zaloguj się" />
		</form>
		
		<?php
			if (isset($_SESSION['blad']))
			{
				echo $_SESSION['blad'];
			}
		?>
		
	</body>
</html>