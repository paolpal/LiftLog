<?php
	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php"; //includes Database Class

    function getAllTrainers(){
        global $liftLogDb;
        //if(!$liftLogDb->isOpened()) return null;
        $queryText = 'SELECT * FROM Utente WHERE dipendente = TRUE';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
        return $result;
    }

    function getAllCustomers(){
        global $liftLogDb;
        $queryText = 'SELECT * FROM Utente WHERE dipendente = FALSE';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
        return $result;
    }

?>