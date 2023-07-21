<?php
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
      $req=$bdd->prepare('DELETE  FROM utilisateur WHERE id_prof=?');
      $req->execute(array($_POST['id_Prof']));
      $req->closeCursor(); 
      
      $req=$bdd->prepare('DELETE  FROM professeur WHERE id_Prof=?');
      $req->execute(array($_POST['id_Prof']));
      $req->closeCursor();

      $req=$bdd->prepare('DELETE  FROM emploi_du_temps WHERE id_Prof=?');
      $req->execute(array($_POST['id_Prof']));
      $req->closeCursor();

      $req=$bdd->prepare('DELETE  FROM matiere WHERE id_prof1=?');
      $req->execute(array($_POST['id_Prof']));
      $req->closeCursor();

      header('Location: ../mainAdmin.php?allow=3&&info=1');
    
?>