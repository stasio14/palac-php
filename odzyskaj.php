<?php
	session_start();
	
	if (isset($_POST['email']))
	{
		$_SESSION['email'] = $_POST['email'];
		$email = $_POST['email'];
		$x = rand(1, 9999);
		$_SESSION['x'] = $x;
		if (mail($email, 'Odzyskaj hasło', 'Twój kod aktywacyjny to: '.$x)){
			header ('Location: aktywacja.php');
			exit();
		}
		else
		{
			echo '<p class="xd">Wystąpił błąd! Spróbuj ponownie</p>';
		}
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
		
		<form method="post">
			<input type="text" name="email" placeholder="Podaj email"/></br>
			<input type="submit" value="Wyślij kod" />
		</form>
		
	</body>
</html>