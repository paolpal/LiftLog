<?php
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php";


    $id = $_POST['userId'];
    $oldPassword = $_POST['psw'];
    $newPassword = $_POST['newPsw'];

    $errorMessage = updatePassword($id, $oldPassword, $newPassword);
    
	if($errorMessage === null)
		header('location: ./../clienti.php');
	else
		header('location: ./../clienti.php?errorMessage=' . $errorMessage );

    function updatePassword($id, $oldPassword, $newPassword){
        if ($id != null && $oldPassword != null && $newPassword != null ){
            global $liftLogDb;

		    echo $id = $liftLogDb->sqlInjectionFilter($id);
		    echo $oldPassword = $liftLogDb->sqlInjectionFilter($oldPassword);
		    echo $newPassword = $liftLogDb->sqlInjectionFilter($newPassword);

            echo $queryText = "SELECT * FROM Utente WHERE id=" . $id . " AND `password` = SHA2('" . $oldPassword . "',512)";
            $result = $liftLogDb->performQuery($queryText);
            
            echo $numRow = mysqli_num_rows($result);
            if ($numRow != 1)
                return 'Password Errata.';

            $queryText = "UPDATE Utente SET `password` = SHA2('" . $newPassword . "',512) WHERE id = ".$id;
            
            $liftLogDb->performQuery($queryText);

            $liftLogDb->closeConnection();
            return null;
        }
        else return 'Dati non validi.';
    }
?>