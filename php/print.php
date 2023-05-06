<?php
	require_once __DIR__."/config.php";
	require_once DIR_UTIL."userManagerDb.php";
	include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isLogged()){
		header('Location: ./../index.php');
		exit;
	}
?>
<!--
	
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<meta name="author" content="Paolo Palumbo">
			<link rel="stylesheet" href="../css/master.css">
			<link rel="stylesheet" href="../css/header.css">
			<link rel="stylesheet" href="../css/navbar.css">
			<link rel="stylesheet" href="../css/sidebar.css">
			<link rel="stylesheet" href="../css/tab.css">
			<link rel="stylesheet" href="../css/schede.css">
			<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
		</head>
		<body>
			<div>
	
			</div>
		</body>
	</html>
-->


<!--

-->
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" href="../css/print.css">
	<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
	<title>Scheda degli esercizi</title>
</head>
<body>
	<h1>LiftLog</h1>
	<!--
		<div class="deck" id="exerciseDashboard">
			<div class="excard">
				<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
				<div>
					<h4>Esercizio</h4>
					<p>Descrizione</p>
				</div>
			</div>
		</div>
	-->
	<div class="workout">
		<div class="exercise">
			<div class="image">
				<!--

				-->
				<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
			</div>
			<div class="info">
				<div class="name">Squat</div>
				<div class="parteCorpo">Gambe</div>
				<div class="svolgimento">
					<div>3</div>x</i><div>12</div><div>30s</div>
				</div>
				<!--

				-->
			</div>
		</div>
		<div class="exercise">
			<div class="image">
				<!--

				-->
				<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
			</div>
			<div class="info">
				<div class="name">Squat</div>
				<div class="description">
					Lo squat è un esercizio fondamentale per allenare le gambe. Si esegue posizionandosi con i piedi leggermente più larghi delle spalle e piegando le ginocchia fino a formare un angolo di 90 gradi. Poi si ritorna in posizione eretta.
				</div>
				<!--

				-->
			</div>
		</div>
		<div class="exercise">
			<div class="image">
				<!--

				-->
				<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
			</div>
			<div class="info">
				<div class="name">Squat</div>
				<div class="description">
					Lo squat è un esercizio fondamentale per allenare le gambe. Si esegue posizionandosi con i piedi leggermente più larghi delle spalle e piegando le ginocchia fino a formare un angolo di 90 gradi. Poi si ritorna in posizione eretta.
				</div>
				<!--

				-->
			</div>
		</div>
	</div>
</body>
</html>
