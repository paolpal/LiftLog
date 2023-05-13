<?php
	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php"; //includes Database Class

	function getAllExercises() {
		global $liftLogDb;
		$queryText = 'SELECT * FROM Esercizio';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
		return $result;
	}
	
	function getSearchExerciseByKeyWord($pattern) {
		global $liftLogDb;
	
		$queryText = 'SELECT * FROM Esercizio WHERE nome LIKE ?';
		$stmt = $liftLogDb->prepare($queryText);
		
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}

		$pattern = '%' . $liftLogDb->sqlInjectionFilter($pattern) . '%';
		$stmt->bind_param("s", $pattern);
		$stmt->execute();
		
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		
		$result = $stmt->get_result();
		$stmt->close();
		$liftLogDb->closeConnection();
		
		return $result;
	}
	
	function getWorkoutByUserId($userId) {
		global $liftLogDb;
	
		$queryText = 'SELECT * FROM Scheda WHERE utente = ?';
		$stmt = $liftLogDb->prepare($queryText);
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
		
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
	
		$result = $stmt->get_result();
		$stmt->close();
		$liftLogDb->closeConnection();
	
		return $result;
	}
	
	function getWorkoutByWorkoutId($workoutId) {
		global $liftLogDb;
	
		$queryText = 'SELECT * FROM Scheda WHERE id = ?';
		$stmt = $liftLogDb->prepare($queryText);
	
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
	
		$stmt->bind_param("s", $workoutId);
		$stmt->execute();
	
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
	
		$result = $stmt->get_result();
		$stmt->close();
		$liftLogDb->closeConnection();
	
		return $result;
	}
	
	function getTrainingByWorkoutId($workoutId) {
		global $liftLogDb;
	
		$queryText = 'SELECT * FROM Svolgimento WHERE scheda = ?';
		$stmt = $liftLogDb->prepare($queryText);
	
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
	
		$stmt->bind_param("s", $workoutId);
		$stmt->execute();
	
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
	
		$result = $stmt->get_result();
		$stmt->close();
		$liftLogDb->closeConnection();
	
		return $result;
	}
	
	function getExerciseById($exeId){
		global $liftLogDb;
		$queryText = 'SELECT * FROM Esercizio WHERE id = ?';
		$stmt = $liftLogDb->prepare($queryText);
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
		$stmt->bind_param("s", $exeId);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$result = $stmt->get_result();
		$stmt->close();
		$liftLogDb->closeConnection();
		return $result; 
	}
	
	function getLastWorkout($userId) {
		global $liftLogDb;
		$queryText = 'SELECT MAX(id) FROM Scheda WHERE utente = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $userId);
		$stmt->execute();
		$stmt->bind_result($lastWorkoutId);
		$stmt->fetch();
		$stmt->close();
		$liftLogDb->closeConnection();
		return $lastWorkoutId;
	}
	
	function insertWorkout($userId) {
		global $liftLogDb;
		$queryText = 'INSERT INTO Scheda VALUES (NULL, ?, curdate())';
		$stmt = $liftLogDb->prepare($queryText);
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
		$stmt->bind_param("s", $userId);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->close();
		$liftLogDb->closeConnection();
		return true; 
	}
	
	function insertTraining($exeId, $workoutId, $series, $reps, $rest){
		global $liftLogDb;
		$queryText = 'INSERT INTO Svolgimento VALUES (NULL, ?, ?, ?, ?, ?)';
		$stmt = $liftLogDb->prepare($queryText);
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
		$stmt->bind_param("sssss", $exeId, $workoutId, $series, $reps, $rest);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->close();
		$liftLogDb->closeConnection();
		return true; 
	}
	
	function deleteWorkoutById($workoutId) {
		global $liftLogDb;
		$queryText = 'DELETE FROM Scheda WHERE id = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $workoutId);
		$stmt->execute();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();
		return $affectedRows;
	}

	function deleteTrainingByWorkoutId($workoutId) {
		global $liftLogDb;
		$queryText = 'DELETE FROM Svolgimento WHERE scheda = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $workoutId);
		$stmt->execute();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();
		return $affectedRows;
	}

	function getUserByUserId($userId) {
		global $liftLogDb;
		$queryText = 'SELECT * FROM Utente WHERE id = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		$stmt->close();
		$liftLogDb->closeConnection();
		return $user;
	}	

	function getAllTrainers(){
        global $liftLogDb;
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