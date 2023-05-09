<?php
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php";


    $id = $_POST['userId'];
    $newPassword = $_POST['newPsw'];

    $errorMessage = updatePassword($id, $newPassword);
    
	if($errorMessage === null)
		header('location: ./../clienti.php');
	else
		header('location: ./../clienti.php?errorMessage=' . $errorMessage );

    function updatePassword($id, $newPassword){
        if ($id != null && $newPassword != null ){
            global $liftLogDb;

		    $id = $liftLogDb->sqlInjectionFilter($id);
		    $newPassword = $liftLogDb->sqlInjectionFilter($newPassword);

            $queryText = "SELECT * FROM Utente WHERE id=" . $id;
            $result = $liftLogDb->performQuery($queryText);
            
            $numRow = mysqli_num_rows($result);
            if ($numRow != 1)
                return 'Utente inesistente.';

            $queryText = "UPDATE Utente SET `password` = SHA2('" . $newPassword . "',512) WHERE id = ".$id;
            
            $liftLogDb->performQuery($queryText);

            $liftLogDb->closeConnection();
            return null;
        }
        else return 'Dati non validi.';
    }
?>