<!-- navbar -->
<?php 
	require_once __DIR__."/../config.php";
	include_once DIR_UTIL."sessionUtil.php";
?>
<nav>
	<a href="/LiftLog/index.php">Home</a>
	<a href="/LiftLog/index.php#chisiamo">Chi siamo</a>
	<a href="/LiftLog/index.php#motivazione">La motivazione</a>
	<a href="/LiftLog/index.php#dovetrovarci">Dove trovarci</a>
	<?php
	if(isLogged()){
		echo '<a href="/LiftLog/php/esercizi.php">Parte privata</a>';
		echo '<a href="/LiftLog/php/util/logout.php" class="split">Logout</a>';
	}
	else{
		echo '<a onclick="open_login_form()" class="split">Login</a>';
	}
	?>
</nav>