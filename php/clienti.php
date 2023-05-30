<?php
	require_once __DIR__."/config.php";
	require_once DIR_UTIL."exerciseManagerDb.php";
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
		<title>Clienti</title>
		<link rel="stylesheet" href="../css/master.css">
		<link rel="stylesheet" href="../css/header.css">
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/sidebar.css">
		<link rel="stylesheet" href="../css/tab.css">
		<link rel="stylesheet" href="../css/alert.css">
		<link rel="stylesheet" href="../css/userForm.css">
		<link rel="stylesheet" href="../css/icons.css">
		<script src="./../js/schedeUtil.js"></script>
		<script src="./../js/alertUtil.js"></script>
		<script src="./../js/formUtil.js"></script>
		<script src="./../js/passwordGenerator.js"></script>
		<script src="./../js/ajax/ajaxManager.js"></script>
		<script src="./../js/ajax/UserLoader.js"></script>
		<script src="./../js/ajax/UserDashboard.js"></script>
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
						}
					?>
					<button class="tablinks" onclick="openTab(event, 'new')" id="defaultOpen">Nuovo Utente</button>
				</div>
				<?php
					} 
				?>

				<div class="tabcontent" id="userTab">
					<div id="userDashboard">
					</div>
				</div>
				<?php
					if(isTrainer()){
				?>
				<div id="new" class="tabcontent">
					<h3>Iscrizione</h3>
					<form action="util/signup.php" class="newUser" method="POST">
						<div class="container">
							<label for="user"><b>Username</b></label>
							<input type="text" placeholder="Username.." name="user" id="user" required>

							<label for="nome"><b>Nome</b></label>
							<input type="text" placeholder="Nome.." name="nome" id="nome" required>

							<label for="cognome"><b>Cognome</b></label>
							<input type="text" placeholder="Cognome.." name="cognome" id="cognome" required>

							<label for="psw"><b>Password</b></label>
							<div class="pass">
								<input type="password" placeholder="Password.." name="psw" id="psw" value="" required>
								<i class="fa fa-eye" onclick="showPassword(event)" id="eye"></i>
							</div>
							<button type="button" onclick="genPassword()">Genera Password</button>
							<button type="submit" >Registra</button>
						</div>
					</form>
				</div>
				<?php
					} 
				?>
				<?php
				if (isset($_GET['errorMessage'])){
					echo '<div class="alert">'
						.'<span class="closebtn" onclick="closeAlert(event)">&times;</span>  '
						.'<strong>Attenzione!</strong> '. htmlspecialchars($_GET['errorMessage'])
					.'</div>';
				}
			?>
			</div>
		</div>
	</body>
</html>