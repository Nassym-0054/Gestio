<?php 
    session_start();
    include('../connexionDataBase.php');
    /*
    try{
        $serveur = "localhost";
        $login = "root";
        $passwd = "";
        $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
         die('ERREUR :'.$e->getMessage());
    }
    */

    if(isset($_POST['titrePub']) and isset($_POST['message'])  ){

        $_POST['titrePub']=htmlspecialchars($_POST['titrePub']);
        $_POST['message']=htmlspecialchars($_POST['message']);

        $req=$bdd->prepare('INSERT INTO publication (titre_pub,messages,date_envoie,id_publisher)
        VALUES (?,?,NOW(),?)');
        $req -> bindParam(1,$titre_pub);
        $req -> bindParam(2,$messages);
        $req -> bindParam(4,$id_publisher);
        if( $req->execute(array($_POST['titrePub'],$_POST['message'],$_SESSION['id_admin']))){
            $req->closeCursor();
            header('Location: ../mainAdmin.php?allow=1&&dash=6&&info=1');
        }
        else
        {
            header('Location: ../mainAdmin.php?allow=1&&dash=6&&info=2');
        }
    }
?>