<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "exerciseManagerDb.php";
	require_once DIR_AJAX_UTIL . "AjaxResponse.php";
	include_once DIR_UTIL . "sessionUtil.php";
	if(!isset($_SESSION)){
		session_start();
	}
	$response = new AjaxResponse();

	if(!isLogged()){
		echo json_encode($response);
		return;
	}

	if(!isset($_GET['userId'])){
		echo json_encode($response);
		return;
	}
	$userId = $_GET['userId'];

	// ------------------ NUOVO APPROCCIO ------------------
	if(isset($_GET['delWorkout'])){
		if(!isTrainer()){
			echo json_encode($response);
			return;
		}
		$workoutId = $_GET['delWorkout'];
		$deletedRows = deleteWorkoutById($workoutId);
	}
	elseif(isset($_GET['addWorkout'])){
		if(!isTrainer()){
			echo json_encode($response);
			return;
		}
		$workout = json_decode($_GET['addWorkout']);
		$result = insertWorkoutPlan($workout, $userId);
	}

	if(!isTrainer() && $_SESSION['userId']!=$userId){
		echo json_encode($response);
		return;
	}


	$message = "OK";
	$response = setResponse($userId, $message);
	echo json_encode($response);
	
	return;

	function insertWorkoutPlan($workout, $userId){
		if(insertWorkout($userId)){
			if($workoutId = getLastWorkout($userId)){
				foreach ($workout as $exe) {
					insertTraining($exe->exeId, $workoutId, $exe->series, $exe->reps, $exe->rest);
				}
				return null;
			}
		}
		return null;
	}

	function checkEmptyResult($result){
		if ($result === null || !$result)
			return true;
			
		return ($result->num_rows <= 0);
	}
	
	function setEmptyResponse(){
		$message = "No more workout to load";
		return new AjaxResponse("-1", $message);
	}

	function setPositiveResponse(){
		$message = "OK";
		return new AjaxResponse("0", $message);
	}

	function setResponse($userId, $message){
		$response = new AjaxResponse("0", $message);
		$result = getWorkoutByUserId($userId);

		if (checkEmptyResult($result)){
			$response = setEmptyResponse();
			return $response;
		}
		
		$index = 0;
		while ($row = $result->fetch_assoc()){
			$workout = new Workout();

			$workout->assignDate = ( $row['data_assegnamento'] );
			$workout->userId = ( $row['utente'] );
			$workout->id = ( $row['id'] );
			$workout->trainingList = [];

			$trainingResult = getTrainingByWorkoutId($workout->id);
			while ($trainingRow = $trainingResult->fetch_assoc()){
				$training = new Training();

				$training->series = ( $trainingRow['serie'] );
				$training->reps = ( $trainingRow['ripetizioni'] );
				$training->rest = ( $trainingRow['recupero'] );

				$exerciseResult = getExerciseById($trainingRow['esercizio']);
				if($exerciseRow = $exerciseResult->fetch_assoc()){
					$training->exercise = $exerciseRow['nome'];
				}
				$workout->trainingList[] = $training;
			}

			$response->data[$index] = $workout;
			$index++;
		}
		return $response;
	}

?>