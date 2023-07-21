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
            $req -> binParam(1, $titre_pub);
            $req -> binParam(2, $messages);
            $req -> binParam(4, $id_publisher);
            if( $req->execute(array($_POST['titrePub'],$_POST['message'],$_SESSION['id_prof']))){
            $req->closeCursor();
            header('Location: ../mainProf.php?permis=5&&info=1');
            }else{
            header('Location: ../mainProf.php?permis=5&&info=2');
            }
       
       

    }

    
?>