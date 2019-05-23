<?php
	session_start();
	
	$user = $_SESSION['user'];
	require_once "connect.php";
	
	if (isset($_POST['gra'])){
		$org = intval($_POST['org']);
		$graf = intval($_POST['graf']);
		$skr = intval($_POST['skr']);
		$wyk = intval($_POST['wyk']);
		$pom = intval($_POST['pom']);
			
		if ((($org || $graf || $skr || $wyk || $pom) > 2) || (($org || $graf || $skr || $wyk || $pom) <0))
		{
			$_SESSION['z_war']='<span style="color: red">Nieprawidłowa wartość. Podaj poprawną liczbę</span>';
		}
		else
		{
			$ocena = $org + $graf + $skr + $wyk + $pom;
			$gra = $_POST['gra'];
			$_SESSION['ocena'] = $ocena;
				
			$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno != 0){
				echo $polaczenie->connect_errno;
			}
			else {
				if($_SESSION['glos'] < 25){
					if ($rezultat = @$polaczenie->query("SELECT * FROM wynik WHERE nazwa_gry = '$gra'")){
						$ile_gier = $rezultat->num_rows;
						if($ile_gier > 0){
							$wiersz = $rezultat->fetch_assoc();
							$idgry = $wiersz['idgry'];
							$pkt = $wiersz['glos'] + $ocena;
							$idgracza = $_SESSION['idgracza'];
							$rezultat->free_result();
							if($rezultat = @$polaczenie->query("SELECT palac.login FROM palac, glosy WHERE glosy.idgracza = $idgracza AND glosy.idgry = $idgry AND glosy.idgracza = palac.idgracza")){
								$ile_glosow = $rezultat->num_rows;
								if ($ile_glosow > 0){
									$polaczenie->close();
									header('Location: oddany.php');
									exit();
								}
								else{
									if($rezultat = @$polaczenie->query("INSERT INTO glosy (idglosu, idgry, idgracza) VALUES (NULL, $idgry, $idgracza)")){
										if($rezultat = @$polaczenie->query("UPDATE wynik SET glos = $pkt WHERE idgry = $idgry")){
											$ile_glosow = $_SESSION['glos'] + 1;
											if($rezultat = @$polaczenie->query("UPDATE palac SET glos = $ile_glosow WHERE idgracza = $idgracza")){
												if ($ile_glosow < 25){
													$polaczenie->close();
													header('Location: glowna.php');
													exit();
												}
												else{
													$polaczenie->close();
													header('Location: glos.php');
													exit();
												}
											}
										}
									}
								}
							}
							
						}
						else{
							
						}
					}
				}
				else{
					$polaczenie-> close();
					header('Location: glos.php');
					exit();
				}
			}
		}
	}
?>