<?php
	session_start();
	
	if (isset($_POST['kod'])){
		$x = $_SESSION['x'];
		$kod = intval($_POST['kod']);
		if ($kod != $x)
		{
			$SESSION['blad']='<p class="xd">Twój kod jest nieprwidłowy</p>';
		}
		else
		{
			unset ($SEESION['blad']);
			header ('Location: nowe_haslo.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<form method = "post">
			<input type="text" name="kod" placeholder="Podaj kod:"/>
			<input type="submit" value = "Potwierdz kod" />
		</form>
		<?php
			echo $SESSION['blad'];
		?>
	</body>
</html>