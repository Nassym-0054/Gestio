<?php
if($_POST['pass1']==$_POST['pass2']){
      if(preg_match('#[0-9]+#',$_POST['pass1']) and preg_match('#^PRF\#[0-9]{3}$#',$_POST['id']) and preg_match('#^[0-9]{2}$#',$_POST['quota']) and  preg_match('#^[0-9]+$#',$_POST['code_mat']) ){
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

            /*
                id_prof etant une clé etrangére de emploi_du temps et utilisateur il faut l'ajouté automatiquement 
                si non il y a erreur et aussi l'ordre d'ajout est important
            */ 

            // on insere id_prof dans emploi_du_temps 
              $req=$bdd->prepare('INSERT INTO emploi_du_temps(id_Prof) VALUE (?)');
              $req -> bindParam(1,$id_prof);
              $req->execute(array($_POST['id']));
              $req->closeCursor(); 

            // on insere les info du prof dans la table professeur
              $req=$bdd->prepare('INSERT INTO professeur(id_Prof,nom_prof,prenom_prof,email,quota_heure)
                                  VALUES (?,?,?,?,?)');
              $req -> bindParam(1,$id_prof);
              $req -> bindParam(2,$nom_prof);
              $req -> bindParam(3,$prenoms_prof);
              $req -> bindParam(4,$email);
              $req -> bindParam(5,$quota_heure);
              $req->execute(array($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['quota']));
              $req->closeCursor();

            //on insere l'id du prof et son mot de pass dans la table utilisateur pour le pemmttre d'ouvrir une session
              
              $_POST['pass1']=password_hash($_POST['pass1'],PASSWORD_DEFAULT);

              $req=$bdd->prepare('INSERT INTO utilisateur(user_pass,id_prof)
                                  VALUES (?,?)');
              $req -> bindParam(1,$user_pass);
              $req -> bindParam(2,$id_prof);
              $req->execute(array($_POST['pass1'],$_POST['id']));
              $req->closeCursor();

              // on insere dans la table matiére le nom de l'matiére le code de la matiére et l'id du prof qui s'en occupe
              $req=$bdd->prepare('INSERT INTO matiere (id_mat,nom_mat,id_prof1) VALUE (?,?,?)');
              $req -> bindParam(1,$id_mat);
              $req -> bindParam(2,$nom_mat);
              $req -> bindParam(3,$id_prof1);
              $req->execute(array($_POST['code_mat'],$_POST['nom_mat'],$_POST['id']));
              $req->closeCursor();
              
              header('Location: ../mainAdmin.php?allow=3&&info=3');
        }else{
          header('Location: ../mainAdmin.php?allow=3&&mod=1&&error=1');
        } 
            }else{
              header('Location: ../mainAdmin.php?allow=3&&mod=1&&error=1');
            }
?>
