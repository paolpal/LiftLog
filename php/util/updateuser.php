<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "liftLogDbManager.php";
	require_once DIR_UTIL . "exerciseManagerDb.php";
	include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isLogged()){
		header('location: ./../../clienti.php?errorMessage=NOT ALLOWED');
		exit;
	}

	$id = $_POST['userId'];
	$username = $_POST['user'];
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];

	$errorMessage = updateUserInfo($id, $username, $nome, $cognome);
	
	if($errorMessage === null)
		header('location: ./../clienti.php');
	else
		header('location: ./../clienti.php?errorMessage=' . $errorMessage );

	function updateUserInfo($id, $username, $nome, $cognome){
		if ($id != null && $username != null && $nome != null && $cognome != null ){

			#check for usable username
			if(checkUsername($username) || myUsername($id, $username)){
				if(!myUsername($id, $username)) updateUserUsername($id, $username);
				updateUserData($id, $nome, $cognome);
				return null;
			}
			else return 'Username non disponibile.';
		}
		else return 'Dati non validi.';
	}
?>