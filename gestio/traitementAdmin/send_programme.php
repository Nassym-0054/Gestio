<?php 
session_start();
       if(isset($_FILES['cours']) and $_FILES['cours']['error']==0){
               $infofile=pathinfo($_FILES['cours']['name']);
               if( $infofile['extension']=='pdf'){
                   move_uploaded_file($_FILES['cours']['tmp_name'],'schedule_sent/'.basename($_FILES['cours']['name']));
                   $path='traitementAdmin/schedule_sent/'.basename($_FILES['cours']['name']);
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
                  
                  $req=$bdd->prepare('INSERT INTO historique_emploi_du_temps (date_envoie,lien,nom_pdf) VALUES (NOW(), ?, ?)');
                  $req -> bindParam(2,$lien);
                  $req -> bindParam(3,$nom_pdf);
                  $req->execute(array($path, basename($_FILES['cours']['name']) ));
                  $req->closeCursor();
                  header('Location: ../mainAdmin.php?allow=1&&dash=4&&info=1');
                  
               }
               else{
                  header('Location: ../mainAdmin.php?allow=1&&dash=4&&info=2');
               }             
       }
       else{
         header('Location: ../mainAdmin.php?allow=1&&dash=4&&info=2');
               }
               
?>
