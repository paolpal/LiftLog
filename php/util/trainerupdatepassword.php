<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "liftLogDbManager.php";
	require_once DIR_UTIL . "exerciseManagerDb.php";
	include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isTrainer()){
		header('location: ./../../clienti.php?errorMessage=NOT ALLOWED');
		exit;
	}

	$id = $_POST['userId'];
	$newPassword = $_POST['newPsw'];

	$errorMessage = updatePassword($id, $newPassword);
	
	if($errorMessage === null)
		header('location: ./../clienti.php');
	else
		header('location: ./../clienti.php?errorMessage=' . $errorMessage );

	function updatePassword($id, $newPassword){
		if ($id != null && $newPassword != null ){
			resetPassword($id, $newPassword);
			return null;
		}
		else return 'Dati non validi.';
	}
?>