<?php
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php";


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
            global $liftLogDb;

		    $id = $liftLogDb->sqlInjectionFilter($id);
		    $username = $liftLogDb->sqlInjectionFilter($username);
		    $nome = $liftLogDb->sqlInjectionFilter($nome);
		    $cognome = $liftLogDb->sqlInjectionFilter($cognome);

            #echo $queryText = "SELECT * FROM Utente WHERE id=" . $id . " AND `password` = SHA2('" . $oldPassword . "',512)";
            #$result = $liftLogDb->performQuery($queryText);
            #
            #echo $numRow = mysqli_num_rows($result);
            #if ($numRow != 1)
            #    return 'Password Errata.';

            echo $queryText = "UPDATE Utente SET "
            ."username = '".$username."', "
            ."nome = '".$nome."', "
            ."cognome = '".$cognome."' "   
            ."WHERE id = ".$id;
            
            $liftLogDb->performQuery($queryText);

            $liftLogDb->closeConnection();
            return null;
        }
        else return 'Dati non validi.';
    }
?>