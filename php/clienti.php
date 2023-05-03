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

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Paolo Palumbo">
		<link rel="stylesheet" href="../css/navbar.css">
		<!--<link rel="stylesheet" href="../css/searchbar.css">-->
		<link rel="stylesheet" href="../css/sidebar.css">
		<link rel="stylesheet" href="../css/tab.css">
		<link rel="stylesheet" href="../css/master.css">
		<link rel="stylesheet" href="../css/header.css">
		<!--<link rel="stylesheet" href="../css/login_form.css">-->
		<link rel="stylesheet" href="../css/new_user_form.css">
		<!--<link rel="stylesheet" href="../css/exercise_card.css">-->
		<script type="text/javascript" src="./../js/tab.js"></script>
		<script type="text/javascript" src="./../js/passwordGenerator.js"></script>
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/ajax/ExerciseLoader.js"></script>
		<script type="text/javascript" src="./../js/ajax/ExerciseDashboard.js"></script>		
		<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
	</head>
	<body onload="document.getElementById('defaultOpen').click();">
		<header>
			<?php include DIR_LAYOUT."navbar.php"; ?>
		</header>
		<div class="main">
			<?php include DIR_LAYOUT."sidebar.php"; ?>
			<div class="page">
				<div class="tab">
					<?php
						$result = getAllCustomers();
						while($row = $result->fetch_assoc()){
							echo '<button class="tablinks" onclick="openCity(event, \''.$row['username'].'\')">'.$row['nome'].'</button>';
							#echo '<i class="fa fa-times"></i>';
						}
					?>
					<!--<button class="tablinks" onclick="openCity(event, 'London')">London</button>-->
					<button class="tablinks" onclick="openCity(event, 'new')" id="defaultOpen">Nuovo Utente</button>
				</div>
						
				<?php
					$result = getAllCustomers();

					while($row = $result->fetch_assoc()){
						echo '<div id="'.$row['username'].'" class="tabcontent">'
							.'<h3>Informazioni Utente</h3>'
							.'<form action="util/updateuser.php" method="POST">'
								.'<div class="container">'
									.'<label for="user"><b>Username</b></label>'
									.'<input type="text" placeholder="Username.." name="user" value="'.$row['username'].'">'
									.'<label for="nome"><b>Nome</b></label>'
									.'<input type="text" placeholder="Nome.." name="nome" value="'.$row['nome'].'">'
									.'<label for="cognome"><b>Cognome</b></label>'
									.'<input type="text" placeholder="Cognome.." name="cognome" value="'.$row['cognome'].'">'
									.'<input type="hidden" name="userId" value="'.$row['id'].'">'
									.'<button type="submit" class="updatebtn">Salva</button>'
								.'</div>'
							.'</form>'
							.'<form action="util/updatepassword.php" method="POST">'
								.'<div class="container">'
									.'<input type="hidden" name="userId" value="'.$row['id'].'">'
									.'<label for="psw"><b>Vecchia Password</b></label>'
									.'<input type="password" placeholder="Password.." name="psw">'
									.'<label for="newPsw"><b>Nuova Password</b></label>'
									.'<input type="password" placeholder="Nuova Password.." name="newPsw">'
									.'<button type="submit" class="updatebtn">Cambia Password</button>'
								.'</div>'
							.'</form>'
							.'<form action="util/deleteaccount.php" method="POST">'
								.'<div class="container">'
									.'<input type="hidden" name="userId" value="'.$row['id'].'">'
									.'<button type="submit" class="deletebtn">Elimina Account</button>'
								.'</div>'
							.'</form>'
						.'</div>';
					}
				?>
				<!--
				<div id="London" class="tabcontent">
					<h3>Informazioni Utente</h3>
					<form action="">
						<div class="container">
							<label for="user"><b>Username</b></label>
    						<input type="text" placeholder="Username.." name="user" value="lunden">

							<label for="nome"><b>Nome</b></label>
    						<input type="text" placeholder="Nome.." name="nome" value="London">

							<label for="cognome"><b>Cognome</b></label>
    						<input type="text" placeholder="Cognome.." name="cognome" value="Bianchi">

    						<label for="psw"><b>Password</b></label>
    						<input type="password" placeholder="Password.." name="psw">

							<label for="newPsw"><b>Nuova Password</b></label>
    						<input type="password" placeholder="Nuova Password.." name="newPsw">

							<button type="submit" class="updatebtn">Aggiorna</button>
						</div>
					</form>
				</div>
				-->
				  
				<div id="new" class="tabcontent">
					<h3>Iscrizione</h3>
					<form action="util/signup.php" class="newUser" method="POST">
						<div class="container">
							<label for="user"><b>Username</b></label>
    						<input type="text" placeholder="Username.." name="user" required>

							<label for="nome"><b>Nome</b></label>
    						<input type="text" placeholder="Nome.." name="nome" required>

							<label for="cognome"><b>Cognome</b></label>
    						<input type="text" placeholder="Cognome.." name="cognome"  required>

    						<label for="psw"><b>Password</b></label>
							<div>
								<div class="pass">
									<input type="password" placeholder="Password.." name="psw" id="psw" value="" required>
									<i class="fa fa-eye" onclick="showPassword()" id="eye"></i>
								</div>
							</div>
    						<!--
							<label for="confPsw"><b>Conferma Password</b></label>
    						<input type="password" placeholder="Conferma Password.." name="confPsw" id="confPsw" required>
							-->
							<button type="button" onclick="genPassword()">Genera Password</button>
							<button type="submit" >Registra</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</body>
</html>