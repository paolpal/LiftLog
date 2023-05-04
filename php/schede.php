<?php
	require_once __DIR__."/config.php";
    require_once DIR_UTIL."userManagerDb.php";
	include DIR_UTIL . "sessionUtil.php";
	session_start();

	if (!isLogged()){
		header('Location: ./../index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Paolo Palumbo">
		<link rel="stylesheet" href="../css/master.css">
		<link rel="stylesheet" href="../css/header.css">
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/sidebar.css">
		<link rel="stylesheet" href="../css/tab.css">
		<link rel="stylesheet" href="../css/new_user_form.css">
		<script type="text/javascript" src="./../js/tab.js"></script>
		<script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
	</head>
	<body onload="document.getElementById('defaultOpen').click();">
		<header>
			<?php include DIR_LAYOUT."navbar.php"; ?>
		</header>
		<div class="main">
			<?php include DIR_LAYOUT."sidebar.php"; ?>
			<div class="page">
				<div class="tab">
					<?php
						$result = getAllCustomers();
						while($row = $result->fetch_assoc()){
							echo '<button class="tablinks" onclick="openCity(event, \''.$row['username'].'\')">'.$row['nome'].'</button>';
							#echo '<i class="fa fa-times"></i>';
						}
					?>
					<!--<button class="tablinks" onclick="openCity(event, 'London')">London</button>-->
					
				</div>
						
				
				  
				<div id="new" class="tabcontent">
					
				</div>

			</div>
		</div>
	</body>
</html>