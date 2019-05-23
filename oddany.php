<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
	<?php
		echo "<p>Już oddałeś głos na tą grę</p>";
	?>
	<form action="ocenianie.php">
		<input type="submit" value="Wróć do strony głównej" />
	</form>
	</body>
</html>