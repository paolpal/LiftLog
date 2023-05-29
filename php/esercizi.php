<?php
	require_once __DIR__."/config.php";
	include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isLogged()){
		header('Location: ./../index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Paolo Palumbo">
		<title>Esercizi</title>
		<link rel="stylesheet" href="../css/master.css">
		<link rel="stylesheet" href="../css/header.css">
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/sidebar.css">
		<link rel="stylesheet" href="../css/searchbar.css">
		<link rel="stylesheet" href="../css/exerciseCard.css">
		<link rel="stylesheet" href="../css/icons.css">
		<script src="./../js/ajax/ajaxManager.js"></script>
		<script src="./../js/ajax/ExerciseLoader.js"></script>
		<script src="./../js/ajax/ExerciseDashboard.js"></script>		
	</head>
	<body onload="ExerciseLoader.search('')">
		<header>
			<?php include DIR_LAYOUT."navbar.php"; ?>
		</header>
		<div class="main">
			<?php include DIR_LAYOUT."sidebar.php"; ?>
			<div class="page">
				<div class="searchContainer">
					<div class="search">
						<input type="text" placeholder="Ricerca.." name="search2" onkeyup="ExerciseLoader.search(this.value)">
						<button type="submit"><i class="fa fa-search white"></i></button>
					</div>
				</div>
				
				<div class="deck" id="exerciseDashboard">
				<!--
					<div class="excard">
						<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
						<div>
							<h4>Esercizio</h4>
							<p>Descrizione</p>
						</div>
					</div>
				-->
				</div>
			</div>
		</div>
	</body>
</html>