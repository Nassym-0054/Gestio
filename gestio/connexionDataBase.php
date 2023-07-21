<?php
    $serveur = "localhost";
    $login = "root";
    $passwd = "";
    $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
