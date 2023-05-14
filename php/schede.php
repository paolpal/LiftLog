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
		<script src="./../js/schedeUtil.js"></script>
        <script src="./../js/alertUtil.js"></script>
		<script src="./../js/formUtil.js"></script>
		<script src="./../js/ajax/ajaxManager.js"></script>
		<script src="./../js/ajax/WorkoutLoader.js"></script>
		<script src="./../js/ajax/WorkoutDashboard.js"></script>
		<script src="./../js/ajax/UserEventHandler.js"></script>
		<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
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
						#echo '<i class="fa fa-times"></i>';
					}
					?>
				</div>
				<?php
					} 
				?>
					
			
				<div class="tabcontent">
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
										<button onclick="UserEventHandler.addExerciseFields();"><i class="fa fa-plus fa-lg"></i></button>
									</div>
									<div>&nbsp;</div>
									<div>&nbsp;</div>
									<div>
										<!-- 
											<button onclick="UserEventHandler.saveWorkoutPlan();">Salva Scheda</button>
										-->
										<button onclick="if (checkBeforeSave()) { UserEventHandler.saveWorkoutPlan(); resetWorkoutForm(); UserEventHandler.addExerciseFields();}">Salva Scheda</button>
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
					<?php
						} 
					?>
				</div>
			</div>
		</div>
	</body>
</html>