<?php
    include('../connexionDataBase.php');    
    /*
    try{
        $serveur = "localhost";
        $login = "root";
        $passwd = "";
        $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e){
        die('ERREUR :'. $e->getMessage());
    }
    */

    $req=$bdd->prepare('DELETE FROM evaluation WHERE matricule=? ');
    $res=$req->execute(array($_POST['matricule_etu']));

    $req=$bdd->prepare('DELETE FROM etudiant WHERE matricule=? ');
    $res=$req->execute(array($_POST['matricule_etu']));
    if($res==1){
        header('Location: ../mainAdmin.php?allow=2&&go=3&&status=1');
    }
    else{
        header('Location: ../mainAdmin.php?allow=2&&go=3&&status=0');
    }

     
?>
