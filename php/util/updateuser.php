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
            #global $liftLogDb;

		    #$id = $liftLogDb->sqlInjectionFilter($id);
		    #$username = $liftLogDb->sqlInjectionFilter($username);
		    #$nome = $liftLogDb->sqlInjectionFilter($nome);
		    #$cognome = $liftLogDb->sqlInjectionFilter($cognome);

            #check for usable username
            if(checkUsername($username)){
                
                #echo $queryText = "UPDATE Utente SET "
                #."username = '".$username."', "
                #."nome = '".$nome."', "
                #."cognome = '".$cognome."' "   
                #."WHERE id = ".$id;
                #
                #$liftLogDb->performQuery($queryText);
                #
                #$liftLogDb->closeConnection();
                updateUser($id, $username, $nome, $cognome);
                return null;
            }
            else return 'Username non disponibile.';
        }
        else return 'Dati non validi.';
    }
?>