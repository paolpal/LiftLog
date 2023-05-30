<?php
	require_once __DIR__."/config.php";
	require_once DIR_UTIL."exerciseManagerDb.php";
	include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isLogged()){
		header('Location: ./../index.php');
		exit;
	}

	if(!isset($_GET['userId']) || !isset($_GET['workoutId'])){
		header('Location: ./../index.php');
		exit;
	}
	$userId = $_GET['userId'];
	$workoutId = $_GET['workoutId'];

	if(!isTrainer() && $_SESSION['userId']!=$userId){
		$errorMessage = "Pagina non trovata.";
		//header('Location: ./../index.php');
		header('Location: ./../index.php?errorMessage=' . $errorMessage );
		exit;
	}

	$user = getUserByUserId($userId);
	if($user === null || !$user){
		// FALLIMENTO
		// RITORNA UN ERRORE
		$errorMessage = "Utente Inesistente";
		//header('Location: ./../index.php');
		header('Location: ./../index.php?errorMessage=' . $errorMessage );
		exit;
	}
	else {
		$nome = $user["nome"].' '.$user["cognome"];
	}

	$result = getWorkoutByWorkoutId($workoutId);
	if(checkEmptyResult($result)){
		// FALLIMENTO
		// RITORNA UN ERRORE
		$errorMessage = "Scheda Insistente";
		header('Location: ./../index.php?errorMessage=' . $errorMessage );
		//header('Location: ./../index.php');
		exit;
	}
	if($row = $result->fetch_assoc()){
		$dataAssegnamento = $row["data_assegnamento"];
		if($row["utente"]!=$userId){
			$errorMessage = "Scheda Inesistente";
			header('Location: ./../index.php?errorMessage=' . $errorMessage );
			//header('Location: ./../index.php');
			exit;
		}
	}


	function checkEmptyResult($result){
		if ($result === null || !$result)
			return true;
			
		return ($result->num_rows <= 0);
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title>Scheda di allenamento</title>
	<link rel="stylesheet" href="../css/print.css">
</head>
<body>
	
	
	<div class="header">
		<h2>LiftLog</h2>
		<div class="info">
			<p>Nome atleta: <?php echo htmlspecialchars($nome)?></p>
			<p>Data assegnazione: <?php echo htmlspecialchars($dataAssegnamento)?></p>
		</div>
	</div>

	<table class="workout">
		<?php 
		$result = getTrainingByWorkoutId($workoutId);
		$index = 0;
		while ($row = $result->fetch_assoc()) {
			$resultEsercizio = getExerciseById($row["esercizio"]);
			if ($rowEsercizio = $resultEsercizio->fetch_assoc()) {
				$nomeEsercizio = $rowEsercizio["nome"];
				$parteCorpo = $rowEsercizio["parte_del_corpo"];
				$immagine = $rowEsercizio["immagine"];
			}
			if ($index % 2 === 0) {
				echo '<tr>'
					. '<td colspan="2">'
					. '<div class="banda"></div>'
					. '</td>'
					. '</tr>'
					. '<tr>';
			}
			echo '<td>'
				. '<div class="esercizio">'
				. '<div>'
				. '<div class="immagine">'
				. '<img src="../img/'.$immagine.'" alt="">'
				. '</div>'
				. '<div class="contenuto">'
				. '<div class="nome">'.$nomeEsercizio.'</div>'
				. '<div class="parte-corpo">'.$parteCorpo.'</div>'
				. '<div class="dettagli">Serie: '.$row["serie"].'</div>'
				. '<div class="dettagli">Ripetizioni: '.$row["ripetizioni"].'</div>'
				. '<div class="dettagli">Tempo di recupero: '.$row["recupero"].' secondi</div>'
				. '</div>'
				. '</div>'
				. '</div>'
				. '</td>';
		
			$index++;
			if ($index % 2 === 0) {
				echo '</tr>';
			}
		}
		if ($index % 2 !== 0) {
			echo '<td></td></tr>';
		}

		?>
	<!--
		<tr>
			<td colspan="2">
				<div class="banda"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="esercizio">
					<div>
						<div class="immagine">
							<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="Squat">
						</div>
						<div class="contenuto">
							<div class="nome">Squat</div>
							<div class="parte-corpo">Gambe</div>
							<div class="dettagli">Serie: 3</div>
							<div class="dettagli">Ripetizioni: 10</div>
							<div class="dettagli">Tempo di recupero: 1 minuto</div>
						</div>
					</div>
				</div>
			</td>
			<td>
				<div class="esercizio">
					<div>
						<div class="immagine">
							<img src="../img/esercizi/addominali/abdominal_crunch.png" alt="Squat">
						</div>
						<div class="contenuto">
							<div class="nome">Squat</div>
							<div class="parte-corpo">Gambe</div>
							<div class="dettagli">Serie: 3</div>
							<div class="dettagli">Ripetizioni: 10</div>
							<div class="dettagli">Tempo di recupero: 1 minuto</div>
						</div>
					</div>
				</div>
			</td>
		</tr>
	-->
	</table>

</body>
</html>
