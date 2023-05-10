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

	$user = getUserByUserId($userId);

	if ($user === null || !$user){
		$response = setEmptyResponse();
		echo json_encode($response);
		return;
	}

	$message = "OK";
	$response = setResponse($user, $message);
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

	function setResponse($userDb, $message){
		$response = new AjaxResponse("0", $message);
		$user = new User();
		$user->id = $userDb['id'];
		$user->username = $userDb['username'];
		$user->nome = $userDb['nome'];
		$user->cognome = $userDb['cognome'];
		$response->data[] = $user;
		$index++;
		
		return $response;
	}
?>