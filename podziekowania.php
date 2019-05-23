<?php
	session_start();
	
	if(!isset($_SESSION['udana']))
	{
		header('Location: index.php');
		exit();
	}
	else{
		unset($_SESSION['udana']);
	}
	if (isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
	if (isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if (isset($_SESSION['e_haslo'])) unset($_SESSION['e_haslo']);
	if (isset($_SESSION['e_regulamin'])) unset($_SESSION['e_regulamin']);
	if (isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Ocena konkursu</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h1>Dziękujemy za rejestrację. Teraz możesz się zalogować</h1>
		<a class="xd" href="index.php">Przejdź do strony logowania</a><br />
	</body>
</html>