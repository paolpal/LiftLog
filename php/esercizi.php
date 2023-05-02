<?php
    require_once __DIR__."/config.php";
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Paolo Palumbo">
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/searchbar.css">
        <link rel="stylesheet" href="../css/sidebar.css">
        <link rel="stylesheet" href="../css/master.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/login_form.css">
        <link rel="stylesheet" href="../css/exercise_card.css">
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/ajax/ExerciseLoader.js"></script>
		<script type="text/javascript" src="./../js/ajax/ExerciseDashboard.js"></script>		
        <script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
    </head>
    <body onload="ExerciseLoader.search('')">
        <header>
            <?php include DIR_LAYOUT."navbar.php"; ?>
        </header>
        <div class="main">
            <?php include DIR_LAYOUT."sidebar.php"; ?>
            <div class="page">
                <div class="searchContainer">
                    <div class="search">
                        <input type="text" placeholder="Ricerca.." name="search2" onkeyup="ExerciseLoader.search(this.value)">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="deck" id="exerciseDashboard">
                    
                    <!--<div class="excard">
                        <img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
                        <div>
                            <h4>Esercizio</h4>
                            <p>Descrizione</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </body>
</html>