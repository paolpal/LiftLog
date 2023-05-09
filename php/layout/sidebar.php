<!-- sidebar -->
<?php 
    require_once __DIR__."/../config.php";
    include_once DIR_UTIL."sessionUtil.php";
?>
<aside>
    <a href="esercizi.php">Esercizi</a>
    <a href="clienti.php"><?php
    if(isTrainer()) echo "Utenti";
    else echo "Profilo";
    ?></a>
    <a href="schede.php">Schede</a>
</aside>