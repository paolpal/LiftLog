<?php
    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "liftLogDbManager.php";
    require_once DIR_UTIL . "exerciseManagerDb.php";
    include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isLogged()){
        header('location: ./../../clienti.php?errorMessage=NOT ALLOWED');
		exit;
	}

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
            
            if (checkOldPassword($id, $oldPassword)){
                if(strcmp($oldPassword,$newPassword)!==0){
                    resetPassword($id, $newPassword);
                    return null;
                }
                else return 'La nuova password deve essere diversa dalla precedente.';
            }
            else return 'Password Errata.';

        }
        else return 'Dati non validi.';
    }
?>