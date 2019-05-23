<?php
	session_start();
	
	if (isset($_POST['haslo1'])){
		require_once "connect.php";
		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
		
		if ($polaczenie->connect_errno!=0){
			echo "Error: ".$polaczenie->connect_errno;
		}
		else{
			$email = $_SESSION['email'];
			$haslo1 = $_POST['haslo1'];
			$haslo2 = $_POST['haslo2'];
			
			if (($haslo1 != $haslo2)){
				echo '<span style="color: red" >Hasła nie są takie same!</span>';
			}
			else
			{
				$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
				if ($rezultat = @$polaczenie->query("UPDATE palac SET haslo = '$haslo_hash' WHERE email = '$email'"))
				{
					$polaczenie -> close();
					echo '<p>Hasło zostało zmienione, <a href="index.php" >kliknij,żeby przejść do strony głównej</a></p>';
				}
			}
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
			<input type="password" name="haslo1" placeholder="Podaj nowe hasło: "/></br> 
			<input type="password" name="haslo2" placeholder="Powtórz nowe hasło:"/></br>
			<input type="submit" value = "zatwierdź" />
		</form>
	</body>
</html>