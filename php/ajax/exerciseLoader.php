<?php

    //session_start();
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "exerciseManagerDb.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";
    $response = new AjaxResponse();

    /*
    
    if (!isset($_GET['pattern'])){
        echo json_encode($response);
        return;
    }		

    $pattern = $_GET['pattern'];
    $result = getSearchExerciseByKeyWord($pattern); // RICERCA PAROLE CHIAVI ESERCIZI

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

    // ------------------ NUOVO APPROCCIO ----------------

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


    function checkEmptyResult($result){
		if ($result === null || !$result)
			return true;
			
		return ($result->num_rows <= 0);
	}
	
	function setEmptyResponse(){
		$message = "No more movies to load";
		return new AjaxResponse("-1", $message);
	}

    function setResponse($result, $message){
		$response = new AjaxResponse("0", $message);
			
		$index = 0;
		while ($row = $result->fetch_assoc()){
            $exercise = new Exercise();

            $exercise->name = $row['nome'];
            $exercise->image = $row['immagine'];
            $exercise->description = ( $row['descrizione'] );

            $response->data[$index] = $exercise;
            $index++;
        }
        return $response;
    }
?>