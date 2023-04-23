<?php
    require_once __DIR__."/php/config.php";
?>

<!-- https://jevelin.shufflehound.com/home/home-fitness/ -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Paolo Palumbo">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/header.css">
    </head>
    <body>
        <?php
            include DIR_LAYOUT."header.php";
        ?>
        <nav>
            <a href="#benvenuto">Home</a>
            <a href="#chisiamo">Chi siamo</a>
            <a href="#dovetrovarci">Dove trovarci</a>
            <a href="" class="split">Login</a>
        </nav>
        <section class="benvenuto" id="benvenuto">
            <article class="benvenuto">
                Are you ready to <br><b><em>get fit</em>, strong <br>& motivated!</b>
            </article>
        </section>
        <section class="chisiamo" id="chisiamo">
        <h1>Chi siamo</h1>
        <div class="lista">
            <div class="scheda">
                <img src="img/no-img.jpg" alt=""><br>
                Pietro
            </div>
            <div class="scheda">
                <img src="img/no-img.jpg" alt=""><br>
                Pietro
            </div>
            <div class="scheda">
                <img src="img/no-img.jpg" alt=""><br>
                Pietro
            </div>
            <div class="scheda">
                <img src="img/no-img.jpg" alt=""><br>
                Pietro
            </div>
            <div class="scheda">
                <img src="img/no-img.jpg" alt=""><br>
                Pietro
            </div>
            <div class="scheda">
                <img src="img/no-img.jpg" alt=""><br>
                Pietro
            </div>
        </div>
        </section>
        <section class="dovetrovarci" id="dovetrovarci">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2883.4872397234835!2d10.387733915835716!3d43.721204079119076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d5910b8d52aa55%3A0x2c745830e51b911d!2sUniversit%C3%A0%20di%20Pisa%20Scuola%20di%20Ingegneria!5e0!3m2!1sit!2sit!4v1572094777394!5m2!1sit!2sit"></iframe>
            </div>
            <div class="info">
                <h1>Dove trovarci e come contattarci</h1>
                <div>Street number and town name 23</div>
                <div>info@liftlog.com</div>
                <div>425 521432</div>
            </div>
        </section>
    </body>
</html>