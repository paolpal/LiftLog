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
		<title>Schede</title>
		<link rel="stylesheet" href="../css/master.css">
		<link rel="stylesheet" href="../css/header.css">
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/sidebar.css">
		<link rel="stylesheet" href="../css/tab.css">
		<link rel="stylesheet" href="../css/alert.css">
		<link rel="stylesheet" href="../css/schede.css">
		<link rel="stylesheet" href="../css/icons.css">
		<script src="./../js/schedeUtil.js"></script>
		<script src="./../js/alertUtil.js"></script>
		<script src="./../js/formUtil.js"></script>
		<script src="./../js/ajax/ajaxManager.js"></script>
		<script src="./../js/ajax/WorkoutLoader.js"></script>
		<script src="./../js/ajax/WorkoutDashboard.js"></script>
		<script src="./../js/ajax/UserEventHandler.js"></script>
	</head>

	<?php
		if(isTrainer()){
	?>
	<body onload="UserEventHandler.addExerciseFields();">
	<?php
		}
		else {
	?>
	<body onload="WorkoutLoader.workoutOfUser(<?php echo $_SESSION['userId']; ?>)">
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
						echo '<button class="tablinks" onclick="tablinkClick(event, \''.$row['id'].'\');">'.htmlspecialchars($row['nome']).'</button>';
					}
					?>
				</div>
				<?php
					} 
				?>
					
			
				<div class="tabcontent">
					<div id="workoutDashboard">

						
					</div>

					<?php
						if(isTrainer()){
					?>
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
										<button onclick="UserEventHandler.addExerciseFields();"><i class="fa fa-plus white"></i></button>
									</div>
									<div>&nbsp;</div>
									<div>&nbsp;</div>
									<div>
										<button onclick="if (checkBeforeSave()) { UserEventHandler.saveWorkoutPlan(); resetWorkoutForm(); UserEventHandler.addExerciseFields();}">Salva Scheda</button>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<?php
						} 
					?>
				</div>
			</div>
		</div>
	</body>
</html>