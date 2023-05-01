<?php
	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php"; //includes Database Class

    function getAllExcercises(){
        global $liftLogDb;
        $queryText = 'SELECT * FROM Esercizio';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
        return $result;
    }
?>