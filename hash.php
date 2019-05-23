<?php
	
	if (isset($_POST['hash'])){
		$haslo=$_POST['hash'];
		$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
		echo $haslo_hash; exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Ocena konkursu</title>
	</head>
	<body>
		<form method="post">
			<input type="password" name="hash" />
			<input type="submit" value="hashuj" />
		</form>
		
	</body>
</html>