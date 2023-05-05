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
		<link rel="stylesheet" href="../css/schede.css">
		<script type="text/javascript" src="./../js/schedeUtil.js"></script>
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/ajax/WorkoutLoader.js"></script>
		<script type="text/javascript" src="./../js/ajax/WorkoutDashboard.js"></script>
		<script type="text/javascript" src="./../js/ajax/UserEventHandler.js"></script>
		<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
	</head>
	<body onload="UserEventHandler.addExerciseFields();">
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
							echo '<button class="tablinks" onclick="tablinkClick(event, \''.$row['id'].'\');">'.$row['nome'].'</button>';
							#echo '<i class="fa fa-times"></i>';
						}
					?>
				</div>
						
				
				  
				<div id="paolpal" class="tabcontent">
					<div id="workoutDashboard">
						<!--
							<div class="scheda">
								<h4>12/04/2022</h4>
								<div class="header">
									<div>Esercizio </div> <div class="info"> <div>Serie</div> <i class="fa fa-times"></i> <div>Ripetizioni</div> <div>Riposo</div> </div>
								</div>
								<ul>
									<li><div class="exe">Sollevamenti posteriori ai cavi</div> <div class="info"> <div>3</div> <i class="fa fa-times"></i> <div>12</div> <div>30</div>s </div></li>
									<li><div class="exe">Sollevamenti posteriori ai cavi</div> <div class="info"> <div>3</div> <i class="fa fa-times"></i> <div>12</div> <div>30</div>s </div></li>
									<li><div class="exe">Sollevamenti posteriori ai cavi</div> <div class="info"> <div>3</div> <i class="fa fa-times"></i> <div>12</div> <div>30</div>s </div></li>
									<li><div class="exe">Sollevamenti posteriori ai cavi</div> <div class="info"> <div>3</div> <i class="fa fa-times"></i> <div>12</div> <div>30</div>s </div></li>
									<li><div class="exe">Sollevamenti posteriori ai cavi</div> <div class="info"> <div>3</div> <i class="fa fa-times"></i> <div>12</div> <div>30</div>s </div></li>
								</ul>
								<button>
									<i class="fa fa-trash fa-xl"></i>
								</button>
								<button>
									<i class="fa fa-print fa-xl"></i>
								</button>
							</div>
						-->
						
					</div>
					<div class="newScheda">
						<h3>Nuova Scheda</h3>
						<div>
							<input type="hidden" name="userId" id="userId">
							<div class="container" id="formScheda">
								<div class="titles">
									<div>Esercizio</div> <div>Serie</div> <div>Ripetizioni</div> <div>Riposo</div>
								</div>
								<div class="command">
									<div class="addExe">
										<button onclick="UserEventHandler.addExerciseFields();"><i class="fa fa-plus fa-lg"></i></button>
									</div>
									<div>&nbsp;</div>
									<div>&nbsp;</div>
									<div>
										<button onclick="UserEventHandler.saveWorkoutPlan();">Salva Scheda</button>
									</div>
								</div>
								<!--
								<div class="exe">
									<div>
										<select name="exercise" id="1">
											<option value="">Sollevamenti posteriori ai cavi</option>
											<option value="">Sollevamenti posteriori ai cavi</option>
											<option value="">Sollevamenti posteriori ai cavi</option>
										</select>
									</div>
									<div>
										<input type="number" name="series" id="">
									</div>
									<div>
										<input type="number" name="reps" id="">
									</div>
									<div>
										<input type="number" name="rest" id="">
									</div>
									<div>
										<i class="fa fa-trash"></i>
									</div>
								</div>
								-->
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>