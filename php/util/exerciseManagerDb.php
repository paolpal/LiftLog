<?php
	require_once __DIR__ . "/../config.php";
	require_once DIR_UTIL . "liftLogDbManager.php"; //includes Database Class

	function getAllExercises() {
		global $liftLogDb;
		$queryText = 'SELECT * FROM esercizio';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
		return $result;
	}
	
	function getSearchExerciseByKeyWord($pattern) {
		global $liftLogDb;
	
		$queryText = 'SELECT * FROM esercizio WHERE nome LIKE ?';
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
	
		$queryText = 'SELECT * FROM scheda WHERE utente = ?';
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
	
		$queryText = 'SELECT * FROM scheda WHERE id = ?';
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
	
		$queryText = 'SELECT * FROM svolgimento WHERE scheda = ?';
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
		$queryText = 'SELECT * FROM esercizio WHERE id = ?';
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
		$queryText = 'SELECT MAX(id) FROM scheda WHERE utente = ?';
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
		$queryText = 'INSERT INTO scheda VALUES (NULL, ?, curdate())';
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
		$queryText = 'INSERT INTO svolgimento VALUES (NULL, ?, ?, ?, ?, ?)';
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
		$queryText = 'DELETE FROM scheda WHERE id = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $workoutId);
		$stmt->execute();
		$stmt->store_result();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();
		return $affectedRows;
	}

	function deleteTrainingByWorkoutId($workoutId) {
		global $liftLogDb;
		$queryText = 'DELETE FROM svolgimento WHERE scheda = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $workoutId);
		$stmt->execute();
		$stmt->store_result();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();
		return $affectedRows;
	}

	function getUserByUserId($userId) {
		global $liftLogDb;
		$queryText = 'SELECT * FROM utente WHERE id = ?';
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
		$queryText = 'SELECT * FROM utente WHERE dipendente = TRUE';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
		return $result;
	}

	function getAllCustomers(){
		global $liftLogDb;
		$queryText = 'SELECT * FROM utente WHERE dipendente = FALSE';
		$result = $liftLogDb->performQuery($queryText);
		$liftLogDb->closeConnection();
		return $result;
	}

	function checkUsername($username) {
		global $liftLogDb;
		$queryText = 'SELECT * FROM utente WHERE username = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();
		if($affectedRows===0)
			return true;
		else 
			return false;
	}

	function myUsername($id, $username) {
		global $liftLogDb;
		$queryText = 'SELECT * FROM utente WHERE username = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('s', $username);
		$stmt->execute();

		$result = $stmt->get_result();
		$numRow = $result->num_rows;
		if ($numRow !== 1)
			return false;
		
		$stmt->close();
		$liftLogDb->closeConnection();
		$userRow = $result->fetch_assoc();

		return $userRow['id']==$id;
	}
	
	function updateUserData($id, $nome, $cognome){
		global $liftLogDb;
		$queryText = "UPDATE utente SET nome = ?, cognome = ? WHERE id = ?";
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('ssi', $nome, $cognome, $id);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->close();
		$liftLogDb->closeConnection();
		return true;
	}

	function updateUserUsername($id, $username){
		global $liftLogDb;
		$queryText = "UPDATE utente SET username = ? WHERE id = ?";
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('si', $username, $id);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->close();
		$liftLogDb->closeConnection();
		return true;
	}

	function checkOldPassword($id, $oldPassword){
		global $liftLogDb;
		$queryText = "SELECT * FROM utente WHERE id = ? AND `password` = SHA2(?, 512)";
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('is', $id, $oldPassword);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->store_result();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();

		if($affectedRows <= 0)
			return false;
		else 
			return true;
	}

	function resetPassword($id, $newPassword){
		global $liftLogDb;
		$queryText = "UPDATE utente SET `password` = SHA2(? ,512) WHERE id = ?";
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('si', $newPassword, $id);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->close();
		$liftLogDb->closeConnection();
		return true;
	}

	function insertCostumer($username, $nome, $cognome, $password) {
		global $liftLogDb;
		$queryText = "INSERT INTO utente (username, `password`, nome, cognome, dipendente) VALUES (?, SHA2(? ,512), ?, ?, FALSE)";
		$stmt = $liftLogDb->prepare($queryText);
		if ($stmt === false) {
			die("Errore nella preparazione della query: " . $liftLogDb->error);
		}
		$stmt->bind_param("ssss", $username, $password, $nome, $cognome);
		$stmt->execute();
		if ($stmt === false) {
			die("Errore nell'esecuzione della query: " . $stmt->error);
		}
		$stmt->close();
		$liftLogDb->closeConnection();
		return true; 
	}

	function authenticate($username, $password){   
		global $liftLogDb;
		$username = $liftLogDb->sqlInjectionFilter($username);
		$password = $liftLogDb->sqlInjectionFilter($password);

		$queryText = "SELECT * FROM utente WHERE username = ? AND `password` = SHA2(?, 512)";

		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$numRow = $result->num_rows;
		if ($numRow !== 1)
			return -1;
		
		$stmt->close();
		$liftLogDb->closeConnection();
		$userRow = $result->fetch_assoc();
		return $userRow['id'];
	}

	function checkTrainer($userId){
		global $liftLogDb;
		$queryText = "SELECT * FROM utente WHERE id = ? AND dipendente = TRUE";
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$stmt->store_result();
		$numRow = $stmt->affected_rows;
		return ($numRow == 1);
	}

	function deleteCustomerById($id) {
		global $liftLogDb;
		$queryText = 'DELETE FROM utente WHERE id = ?';
		$stmt = $liftLogDb->prepare($queryText);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->store_result();
		$affectedRows = $stmt->affected_rows;
		$stmt->close();
		$liftLogDb->closeConnection();
		return $affectedRows;
	}
	

?>