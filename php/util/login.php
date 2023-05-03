<?php

	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php"; //includes Database Class
    require_once DIR_UTIL . "sessionUtil.php"; //includes session utils
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$errorMessage = login($username, $password);

	if($errorMessage === null)
		header('location: ./../esercizi.php');
	else
		header('location: ./../../index.php?errorMessage=' . $errorMessage );


	function login($username, $password){   
		if ($username != null && $password != null){
			$userId = authenticate($username, $password);
    		if ($userId > 0){
				$trainer = checkTrainer($userId);
    			session_start();
    			setSession($username, $userId, $trainer);
    			return null;
    		}

    	} else
    		return 'Dati mancanti.';
    	
    	return 'Username e password non validi.';
	}

	function checkTrainer($userId){
		global $liftLogDb;
		$queryText = "SELECT * FROM Utente WHERE id=".$userId." AND dipendente=TRUE";
		$result = $liftLogDb->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		return ($numRow == 1);
	}
	
	function authenticate ($username, $password){   
		global $liftLogDb;
		$username = $liftLogDb->sqlInjectionFilter($username);
		$password = $liftLogDb->sqlInjectionFilter($password);

		$queryText = "SELECT * FROM Utente WHERE username='" . $username . "' AND password=SHA2('" . $password . "',512)";

		$result = $liftLogDb->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		if ($numRow != 1)
			return -1;
		
		$liftLogDb->closeConnection();
		$userRow = $result->fetch_assoc();
		$liftLogDb->closeConnection();
		return $userRow['id'];
	}

?>