<?php
    session_start();
    require_once __DIR__."/php/config.php";
    require_once DIR_UTIL."exerciseManagerDb.php";
    include DIR_UTIL."sessionUtil.php";

    #if(isLogged()){
    #    header('Location: ./php/esercizi.php');
    #    exit();
    #}

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Paolo Palumbo">
        <title>LiftLog</title>
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/loginForm.css">
        <link rel="stylesheet" href="css/alert.css">
        <script src="js/alertUtil.js"></script>
        <script src="js/loginUtil.js"></script>
        <script src="https://kit.fontawesome.com/65c740b968.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <?php include DIR_LAYOUT."navbar.php"; ?>
        </header>
        <?php include DIR_LAYOUT."login_form.php"; ?>

        <div class="main">
            <div class="background-benvenuto">
                <section class="benvenuto" id="benvenuto">
                    <div class="benvenuto">
                        <h2>
                            Are you ready to <br><b><em>get fit</em>, strong <br>& motivated!</b>
                        </h2>
                    </div>
                </section>
            </div>
            <section class="chisiamo" id="chisiamo">
                <h2>Chi siamo</h2>
                <div class="lista">
                    <?php
                        $result = getAllTrainers();
                        while($row = $result->fetch_assoc()){
                            echo '<div class="scheda">'
                                .'<img src="img/'.$row['immagine'].'" alt="">'
                                .'<div class="ruolo">'.$row['ruolo'].'</div>'
                                .$row['nome']
                            .'</div>';
                        }
                    ?>
                    
                    <!--<div class="scheda">
                        <img src="img/dipendenti/no-img.jpg" alt=""><br>
                        <div class="ruolo">Istruttore Box</div>
                        Pietro
                    </div>-->
                </div>
            </section>
            <div class="background-motivazione">
                <section class="motivazione" id="motivazione">
                    <h2>La Motivazione</h2>
                    <blockquote>
                        “La forza non viene dal vincere. Le tue lotte sviluppano la tua forza. Quando passi attraverso delle avversità e decidi di <em>non arrenderti, quella è la forza.</em>”
                    </blockquote>
                    <img src="img/schwarzenegger_signature.png" alt="Arnold Schwarzenegger">
                </section>
            </div>
            <section class="dovetrovarci" id="dovetrovarci">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2883.4872397234835!2d10.387733915835716!3d43.721204079119076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d5910b8d52aa55%3A0x2c745830e51b911d!2sUniversit%C3%A0%20di%20Pisa%20Scuola%20di%20Ingegneria!5e0!3m2!1sit!2sit!4v1572094777394!5m2!1sit!2sit"></iframe>
                </div>
                <div class="info">
                    <h2>Dove trovarci e come contattarci</h2>
                    <div class="tag">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                        <div class="content">
                            <h2>Indirizzo</h2>
                            Street number and town name 23
                        </div>
                    </div>
                    <div class="tag">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="content">
                            <h2>E-mail</h2>
                            info@liftlog.com
                        </div>
                    </div>
                    <div class="tag">
                        <i class="fa-solid fa-phone"></i>
                        <div class="content">
                            <h2>Telefono</h2>
                            425 521432
                        </div>
                    </div>
                </div>
            </section>
            <?php
				if (isset($_GET['errorMessage'])){
					echo '<div class="alert">'
                        .'<span class="closebtn" onclick="closeAlert(event)">&times;</span>  '
                        .'<strong>Attenzione!</strong> '. htmlspecialchars($_GET['errorMessage'])
                    .'</div>';
				}
			?>
            <footer>
                <a href="html/manuale.html">Manuale Utente</a>
            </footer>
        </div>
    </body>
</html>