<?php
	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php"; //includes Database Class

    function getAllExercises(){
        global $liftLogDb;
        $queryText = 'SELECT * FROM Esercizio';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
        return $result;
    }

    function getSearchExerciseByKeyWord($pattern){
		global $liftLogDb;
		$pattern = $liftLogDb->sqlInjectionFilter($pattern);
		$queryText = 'SELECT * ' 
					. 'FROM Esercizio '
					. 'WHERE nome LIKE \'%' . $pattern . '%\''; 
 	
 		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
		return $result; 
	}

	function getWorkoutByUserId($userId){
		global $liftLogDb;
		$userId = $liftLogDb->sqlInjectionFilter($userId);
		$queryText = 'SELECT * ' 
					. 'FROM Scheda '
					. 'WHERE utente = '.$userId; 
		$result = $liftLogDb->performQuery($queryText);
		
		$liftLogDb->closeConnection();
		return $result; 
	}

	function getTrainingByWorkoutId($workoutId){
		global $liftLogDb;
		$workoutId = $liftLogDb->sqlInjectionFilter($workoutId);
		$queryText = 'SELECT * ' 
			. 'FROM Svolgimento '
			. 'WHERE scheda = '.$workoutId;
		$result = $liftLogDb->performQuery($queryText);
	
		$liftLogDb->closeConnection();
		return $result; 
	}

	function getExerciseById($exeId){
		global $liftLogDb;
		$exeId = $liftLogDb->sqlInjectionFilter($exeId);
		$queryText = 'SELECT * ' 
			. 'FROM Esercizio '
			. 'WHERE id = '.$exeId;
		$result = $liftLogDb->performQuery($queryText);
	
		$liftLogDb->closeConnection();
		return $result; 
	}

	function getLastWorkout($userId){
		global $liftLogDb;
		$userId = $liftLogDb->sqlInjectionFilter($userId);

		$queryText = 'SELECT max(id) FROM Scheda WHERE utente = \''.$userId.'\'';
		$result = $liftLogDb->performQuery($queryText);

		$liftLogDb->closeConnection();
		return $result; 
	}

	function insertWorkout($userId) {
		global $liftLogDb;
		$userId = $liftLogDb->sqlInjectionFilter($userId);

		$queryText = 'INSERT INTO Scheda VALUES (NULL, '.$userId.', curdate())';
		$result = $liftLogDb->performQuery($queryText);
		
		$liftLogDb->closeConnection();
		return $result; 
	}

	function insertTraining($exeId, $workoutId, $series, $reps, $rest){
		global $liftLogDb;
		$exeId = $liftLogDb->sqlInjectionFilter($exeId);
		$queryText = 'INSERT INTO Svolgimento VALUES (NULL,'.$exeId.','.$workoutId.','.$series.','.$reps.','.$rest.')';
		$liftLogDb->performQuery($queryText);
	
		$result = $liftLogDb->closeConnection();
		return $result; 
	}

	function deleteWorkoutById($workoutId){
		global $liftLogDb;
		$workoutId = $liftLogDb->sqlInjectionFilter($workoutId);
		$queryText = 'DELETE FROM Scheda WHERE id = '.$workoutId;
		$liftLogDb->performQuery($queryText);
	
		$result = $liftLogDb->closeConnection();
		return $result; 
	}

	function deleteTrainingByWorkoutId($workoutId){
		global $liftLogDb;
		$workoutId = $liftLogDb->sqlInjectionFilter($workoutId);
		$queryText = 'DELETE FROM Svolgimento WHERE scheda = '.$workoutId;
		$liftLogDb->performQuery($queryText);
	
		$result = $liftLogDb->closeConnection();
		return $result; 
	}


?>