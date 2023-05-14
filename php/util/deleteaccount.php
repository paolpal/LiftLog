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

    $errorMessage = deleteUser($id);
    
	if($errorMessage === null)
		header('location: ./../clienti.php');
	else
		header('location: ./../clienti.php?errorMessage=' . $errorMessage );

    function deleteUser($id){
        if ($id != null){
            deleteCustomerById($id);
            return null;
        }
        else return 'Account non trovato.';
    }
?>