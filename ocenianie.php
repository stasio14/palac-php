<?php
	session_start();
	
	if(!isset($_SESSION['zalogowany'])){
		header('Location: index.php');
		exit();
	}
	
	if ($_SESSION['glos']>40){
		header('Location: glos.php');
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
		<?php
			echo "<h3>Witaj ".$_SESSION['user'].'! </h3>';
		?>
		<p>Teraz możesz ocenić gry</p>

		<form method="post" action="wynik.php">
			<table>
				<tr>
					<td>
						<select name="gra">
							<option>P. A. D.</option>
							<option>Untitled</option>
							<option>Illumni's Fun Theme</option>
							<option>solider</option>
							<option>latające papugi</option>
							<option>Kalkulator_B</option>
							<option>gra elementy</option>
							<option>Take The Ball</option>
							<option>Wyjście do kina.</option>
							<option>labirynt nie do przejścia</option>
							<option>cs go simulator</option>
							<option>słownik angielskiego</option>
							<option>odejmowanie</option>
							<option>pisanie słów</option>
							<option>dodawanie</option>
							<option>pisanie</option>
							<option>taniec nietoperza</option>
							<option>tajemnicza planeta</option>
							<option>rysownik</option>
							<option>kosmiczne rysowanie</option>
							<option>rysowanie 2</option>
							<option>rysowanie</option>
							<option>Gra Baba Jaga</option>
							<option>kosmiczny berek</option>
							<option>spacer</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<p>Możesz przyznawać oceny od 0 do 2 pkt za każdą kategorię<p>
					</td>
				</tr>
				<tr>
					<td><input type="text" name="org" placeholder="oryginalność:"/></td>
				</tr>
				<tr>
					<td><input type="text" name="graf" placeholder="grafika: "/></td>
				</tr>
				<tr>
					<td><input type="text" name="skr" placeholder="skrypt:"/></td>
				</tr>
				<tr>
					<td><input type="text" name="wyk" placeholder="wykonanie: "/></td>
				</tr>
				<tr>
					<td><input type="text" name="pom" placeholder="pomysłowość:"/></td>
				</tr>
				<tr>
					<td><input type="submit" value="Wyślij" /></td>
				</tr>
			</table>
		</form>
		<?php
			if((isset($_SESSION['war'])) && ($_SESSION['war']=true))
			{
				echo $_SESSION['z_war'];
			}
		?>
		<form action="wyloguj.php">
			<input type="submit" value="wyloguj się" />
		</form>
	</body>
</html>