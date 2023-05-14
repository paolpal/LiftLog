<?php
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php";
    require_once DIR_UTIL . "exerciseManagerDb.php";
    include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isTrainer()){
        header('location: ./../clienti.php?errorMessage=NOT ALLOWED');
		exit;
	}

    $username = $_POST['user'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $password = $_POST['psw'];

    $errorMessage = signup($username, $nome, $cognome, $password);
    
	if($errorMessage === null)
		header('location: ./../clienti.php');
	else
		header('location: ./../clienti.php?errorMessage=' . $errorMessage );

    function signup($username, $nome, $cognome, $password){
        if ($username != null && $nome != null && $cognome != null && $password != null){
            if(checkUsername($username)){
                insertCostumer($username, $nome, $cognome, $password);
                return null;
            }
            else return 'Username non disponibile.';
        }
        else return 'Dati non validi.';
    }
?>