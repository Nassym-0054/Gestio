<?php

if( preg_match('#^PRF\#[0-9]{3}$#',$_POST['id']) and preg_match('#^[0-9]{2}$#',$_POST['quota']) and  preg_match('#^[0-9]+$#',$_POST['code_mat']) ){
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
         // on change la valeur de id_prof dans emploi_du_temps 
            /*$req=$bdd->prepare('UPDATE emploi_du_temps SET id_Prof=? WHERE id_Prof=?');
            $req->execute(array($_POST['id'],$_POST['id']));
            $req->closeCursor(); */


         // on change les info du prof dans la table professeur
            $req=$bdd->prepare('UPDATE professeur SET nom_prof=? ,prenom_prof=?,email=?,quota_heure=? WHERE id_Prof=?');
            $req->execute(array($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['quota'],$_POST['id']));
            $req->closeCursor();

         //on change le mot de pass dans la table utilisateur pour le pemmttre d'ouvrir une session  
            /*$_POST['pass1']=password_hash($_POST['pass1'],PASSWORD_DEFAULT);
            $req=$bdd->prepare('UPDATE utilisateur SET user_pass=? ,id_prof=? WHERE id_prof=?');
            $req->execute(array($_POST['pass1'],$_POST['id'],$_POST['id']));
            header('Location: ../mainAdmin.php?allow=3&&info=2');*/

         // on change dans la table matiére le nom de l'matiére le code de la matiére et l'id du prof qui s'en occupe
         $req=$bdd->prepare('UPDATE matiere SET id_mat=? ,nom_mat=? WHERE id_Prof1=?');
         $req->execute(array($_POST['code_mat'],$_POST['nom_mat'],$_POST['id'] ));
         $req->closeCursor();

         /* je veux faire remarquer que  ce code permet de tout modifier sauf l'id du prof ! 
         Si on essaie de modifier l'id du prof les modification ne s'effectue pas ! 
         Ses ligne de étais a la base conçut pour modifier l'id du prof mais il me faudrais l'ancien id et il me faudrais 
         donc ajout des input hidden pour me le communiquer ce qui aurais donner du travail */
         header('Location: ../mainAdmin.php?allow=3&&info=2');

   }else{
      header('Location: ../mainAdmin.php?allow=3&&mod=1&&error=1');
    }
?>
