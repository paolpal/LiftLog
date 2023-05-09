<?php
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php";
    include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isTrainer()){
        header('location: ./../../clienti.php?errorMessage=NOT ALLOWED');
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
		header('location: ./../../clienti.php?errorMessage=' . $errorMessage );

    function signup($username, $nome, $cognome, $password){
        if ($username != null && $nome != null && $cognome != null && $password != null){
            global $liftLogDb;

		    $username = $liftLogDb->sqlInjectionFilter($username);
		    $nome = $liftLogDb->sqlInjectionFilter($nome);
		    $cognome = $liftLogDb->sqlInjectionFilter($cognome);
		    $password = $liftLogDb->sqlInjectionFilter($password);

            $queryText = "INSERT INTO Utente (username, `password`, nome, cognome, dipendente) VALUES ('".$username."', SHA2('".$password."',512), '".$nome."', '".$cognome."', FALSE)";
            $liftLogDb->performQuery($queryText);

            $liftLogDb->closeConnection();
            return null;
        }
        else return 'Dati non validi.';
    }
?>