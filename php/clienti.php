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
		<link rel="stylesheet" href="../css/master.css">
		<link rel="stylesheet" href="../css/header.css">
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/sidebar.css">
		<link rel="stylesheet" href="../css/tab.css">
        <link rel="stylesheet" href="../css/alert.css">
		<link rel="stylesheet" href="../css/userForm.css">
		<script type="text/javascript" src="./../js/schedeUtil.js"></script>
        <script type="text/javascript" src="./../js/alertUtil.js"></script>
		<script type="text/javascript" src="./../js/formUtil.js"></script>
		<script type="text/javascript" src="./../js/passwordGenerator.js"></script>
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/ajax/UserLoader.js"></script>
		<script type="text/javascript" src="./../js/ajax/UserDashboard.js"></script>
		<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
	</head>

	<?php
		if(isTrainer()){
	?>
	<body onload="document.getElementById('defaultOpen').click();">
	<?php
		}
		else {
	?>
	<body onload="UserLoader.dataOfUser(<?php echo $_SESSION['userId']; ?>)">
	<?php
		}
	?>
		<header>
			<?php include DIR_LAYOUT."navbar.php"; ?>
		</header>
		<div class="main">
			<?php include DIR_LAYOUT."sidebar.php"; ?>
			<div class="page">

				<?php
					if(isTrainer()){
				?>
				<div class="tab">
					<?php
						$result = getAllCustomers();
						while($row = $result->fetch_assoc()){
							echo '<button class="tablinks" onclick="openTab(event, \'userTab\'); UserLoader.dataOfUser('.$row['id'].')">'.htmlspecialchars($row['nome']).'</button>';
							#echo '<i class="fa fa-times"></i>';
						}
					?>
					<!--<button class="tablinks" onclick="openTab(event, 'London')">London</button>-->
					<button class="tablinks" onclick="openTab(event, 'new')" id="defaultOpen">Nuovo Utente</button>
				</div>
				<?php
					} 
				?>

				<div class="tabcontent" id="userTab">
					<div id="userDashboard">
					</div>
				</div>
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
				<?php
					if(isTrainer()){
				?>
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
				<?php
					} 
				?>

			</div>
		</div>
	</body>
</html>