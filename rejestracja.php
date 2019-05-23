<?php
	
	session_start();
	
	if (isset($_POST['email']))
	{
		$wszystko_OK = true;
		
		//walidacja danych
		
		
		//login
		$login = $_POST['login'];
		if((strlen($login) < 4) || (strlen($login)) > 16)
		{
			$wszystko_OK = false;
			$_SESSION['e_login'] = '<span style="color: red">Login może mieć od 4 do 16 znaków!</span> <br />';
		}
		if (!(ctype_alnum($login)))
		{
			$wszystko_OK = false;
			$_SESSION['e_login'] = '<span style="color: red">Login może składać się tylko ze znaków alfa-numerycznych (bez polskich ogonków)!</span> <br />';
		}
		
		//email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		if ((!(filter_var($emailB, FILTER_VALIDATE_EMAIL))) || ($emailB != $email))
		{
			$wszystko_OK = false;
			$_SESSION['e_email'] = '<span style="color: red">Nieprawidłowy email!</span> <br />';
		}
		
		//hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1) < 6) || (strlen($haslo2)) > 18)
		{
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = '<span style="color: red">Hasło może zawierać od 6 do 18 znaków!</span> <br />';
		}
		
		if ($haslo1 != $haslo2)
		{
			$wszystko_OK = false;
			$_SESSION['e_haslo'] = '<span style="color: red">Hasła nie są identyczne!</span> <br />';
		}
		
		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//checkbox
		if (!(isset($_POST['regulamin'])))
		{
			$wszystko_OK = false;
			$_SESSION['e_check'] = '<span style="color: red">Zaakceptuj regulamin!</span> <br />';
		}

		//powtarzalność
		require_once "connect.php";
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0){
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$rezultat  = $polaczenie -> query ("SELECT idgracza FROM palac WHERE email='$email'");
				if (!$rezultat){
					throw new Exception ($polaczenie -> error);
				}
				$ile_maili = $rezultat -> num_rows;
				if ($ile_maili > 0)
				{
					$wszystko_OK = false;
					$_SESSION['e_email'] = '<span style="color: red">Taki email już istnieje</span> <br />';
				}
				
				$rezultat  = $polaczenie -> query ("SELECT idgracza FROM palac WHERE login='$login'");
				if (!$rezultat){
					throw new Exception ($polaczenie -> error);
				}
				$ile_loginow = $rezultat -> num_rows;
				if ($ile_loginow > 0)
				{
					$wszystko_OK = false;
					$_SESSION['e_login'] = '<span style="color: red">Taki login już istnieje</span> <br />';
				}
				
				if($wszystko_OK==true)
				{
					if($polaczenie->query("INSERT INTO palac (idgracza, login, haslo, email, glos) VALUES(NULL, '$login', '$haslo_hash', '$email', '0')"))
					{
						$_SESSION['udana']=true;
						header('Location: podziekowania.php');
					}
				}
				
				@$polaczenie->close;
			}
		}
		catch (Exception $e)
		{
			echo "Błąd serwera";
			echo $e;
		}
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="UTF-8" />
		<title>rejestracja</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		
		<form method="POST">
			<input type="text" name="login" placeholder="Login: "/><br />
			<?php
				if (isset($_SESSION['e_login']))
				{
					echo $_SESSION['e_login'];
					unset($_SESSION['e_login']);
				}
			?>
			<input type="text" name="email" placeholder="Email: "/><br />
			<?php
				if (isset($_SESSION['e_email']))
				{
					echo $_SESSION['e_email'];
					unset($_SESSION['e_email']);
				}
			?>

			<input type="password" name="haslo1" placeholder="Hasło: "/><br />
			<?php
				if (isset($_SESSION['e_haslo']))
				{
					echo $_SESSION['e_haslo'];
					unset($_SESSION['e_haslo']);
				}
			?>
			<input type="password" name="haslo2" placeholder="Powtórz hasło: "/><br />
			<label>
				<input type="checkbox" name="regulamin" class="regulamin"/> <span>Akceptuję regulamin</span> <br />
			</label>
			<?php
				if (isset($_SESSION['e_check']))
				{
					echo $_SESSION['e_check'];
					unset($_SESSION['e_check']);
				}
			?>
			<input type="submit" value="Zarejestruj się" />
		</form>
		
	</body>
</html>