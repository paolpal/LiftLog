<?php
    require_once __DIR__."/config.php";
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
    <body>
        <?php
            include DIR_LAYOUT."header.php";
            include DIR_LAYOUT."navbar.php";
            include DIR_LAYOUT."sidebar.php";
        ?>
        <div class="page">
            <div>
                <div class="search">
                    <input type="text" placeholder="Ricerca.." name="search2" onkeyup="ExerciseLoader.search(this.value)">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="deck" id="exerciseDashboard">
                <?php
                    /*$result = getAllExcercises();
                    while($row = $result->fetch_assoc()){
                        #echo $row['nome']. " "; 
                        #echo $row['parte_del_corpo'] . "<br>"; 

                        echo '<div class="excard">'
                            .'<img src="../img/'.$row['immagine'].'" alt="">'
                            .'<div>'
                                .'<h4><b>'.$row['nome'].'</b></h4>'
                               .'<p>'.$row['descrizione'].'</p>'
                            .'</div>'
                        .'</div>';
                    }*/
                    #echo "<br>";
                ?>
                
                <!--<div class="excard">
                    <img src="../img/esercizi/addominali/abdominal_crunch.png" alt="">
                    <div>
                        <h4><b>Esercizio</b></h4>
                        <p>Descrizione</p>
                    </div>
                </div>-->
            </div>
        </div>
    </body>
</html>