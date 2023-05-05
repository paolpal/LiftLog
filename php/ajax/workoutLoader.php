<?php

    //session_start();
    
    require_once __DIR__ . "/../config.php";
    
    require_once DIR_UTIL . "exerciseManagerDb.php";
    
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";

    $response = new AjaxResponse();
    
    /*
    if (!isset($_GET['userId'])){
        echo json_encode($response);
        return;
    }		

    $userId = $_GET['userId'];
    
    $result = getWorkoutByUserId($userId); 
    
    // ritorna la lista delle schede

    if (checkEmptyResult($result)){
        $response = setEmptyResponse();
        echo json_encode($response);
        return;
    }

    $message = "OK";	
    $response = setResponse($result, $message);
    echo json_encode($response);

    return;*/

    // ------------------ NUOVO APPROCCIO ------------------
    if (isset($_GET['userId'])){
        $userId = $_GET['userId'];
        $result = getWorkoutByUserId($userId);
    }
    elseif(isset($_GET['workout'])){
        #echo 0;
        $workout = json_decode($_GET['workout']);
        #echo 1;
        $result = insertWorkoutPlan($workout);
        #echo 2;

        if (checkEmptyResult($result)){
            $response = setPositiveResponse();
            echo json_encode($response);
            return;
        }
    }
    else{
        echo json_encode($response);
        return;
    }

    if (checkEmptyResult($result)){
        $response = setEmptyResponse();
        echo json_encode($response);
        return;
    }

    $message = "OK";	
    $response = setResponse($result, $message);
    echo json_encode($response);
    
    return;
    //
    //echo json_encode($response);
    //return;
    //$userId = $_GET['userId'];
    //$result = getWorkoutByUserId($userId); 
    //// ritorna la lista delle schede
//
    //if (checkEmptyResult($result)){
    //    $response = setEmptyResponse();
    //    echo json_encode($response);
    //    return;
    //}
//
    //$message = "OK";	
    //$response = setResponse($result, $message);
    //echo json_encode($response);
//
    //return;
//
    // ------------------ NUOVO APPROCCIO ----------------
    /*
    if(isset($_GET['pattern'])){
        $pattern = $_GET['pattern'];
        $result = getSearchExerciseByKeyWord($pattern); // RICERCA PAROLE CHIAVI ESERCIZI
    }
    elseif(isset($_GET['all'])){
        $result = getAllExcercises();
    }
    else{
        echo json_encode($response);
        return;
    }

    if (checkEmptyResult($result)){
        $response = setEmptyResponse();
        echo json_encode($response);
        return;
    }

    $message = "OK";	
    $response = setResponse($result, $message);
    echo json_encode($response);

    return;
*/

    function insertWorkoutPlan($workout){
        if(insertWorkout($workout->userId)){
            #echo 2;
            if($result = getLastWorkout($workout->userId)){
                #echo 3;
                $workoutId = ($result->fetch_assoc())['max(id)'];
                #echo 4;
                foreach ($workout->exes as $exe) {
                    #echo 5;
                    insertTraining($exe->exeId, $workoutId, $exe->series, $exe->reps, $exe->rest);
                    #echo 6;
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
		$message = "No more movies to load";
		return new AjaxResponse("-1", $message);
	}

    function setPositiveResponse(){
		$message = "OK";
        return new AjaxResponse("0", $message);
    }

    function setResponse($result, $message){
		$response = new AjaxResponse("0", $message);
			
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