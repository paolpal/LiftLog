<?php
	
	//setSession: set $_SESSION properly
	function setSession($username, $userId, $isTrainer){
		$_SESSION['userId'] = $userId;
		$_SESSION['username'] = $username;
		$_SESSION['isTrainer'] = $isTrainer;
	}

	//isLogged: check if user has logged in and, if it is the case, returns the username
	function isLogged(){		
		if(isset($_SESSION['userId']))
			return $_SESSION['userId'];
		else
			return false;
	}

	function isTrainer(){		
		if(isset($_SESSION['isTrainer']))
			return $_SESSION['isTrainer'];
		else
			return false;
	}

?>