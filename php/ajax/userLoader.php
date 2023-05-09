<?php
    //session_start();
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "exerciseManagerDb.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";
    include_once DIR_UTIL . "sessionUtil.php";
    session_start();
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
    
    if(!isTrainer() && $_SESSION['userId']!=$userId){
        echo json_encode($response);
        return;
    }

    $result = getUserByUserId($userId);

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
		return new AjaxResponse("-1", $Smessage);
	}

    function setResponse($result, $message){
		$response = new AjaxResponse("0", $message);
			
		$index = 0;
		while ($row = $result->fetch_assoc()){
            $user = new User();

            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->nome = $row['nome'];
            $user->cognome = $row['cognome'];

            $response->data[$index] = $user;
            $index++;
        }
        return $response;
    }
?>