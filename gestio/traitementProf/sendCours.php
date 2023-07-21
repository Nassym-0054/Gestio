<?php 
session_start();
       if(isset($_FILES['cours']) and $_FILES['cours']['error']==0){
               $infofile=pathinfo($_FILES['cours']['name']);
               if( $infofile['extension']=='pdf'){
                   move_uploaded_file($_FILES['cours']['tmp_name'],'coursended/'.basename($_FILES['cours']['name']));
                   $path='traitementProf/coursended/'.basename($_FILES['cours']['name']);

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
                  
                  $req=$bdd->prepare('INSERT INTO historique_cours (nom_cours,date_envoie,paths,code_mat) VALUES (?,NOW(),?,?)');
                  $req -> binParam(1, $nom_cours);
                  $req -> binParam(3, $paths);
                  $req -> binParam(4, $code_mat);
                  $req->execute(array(basename($_FILES['cours']['name']),$path,$_SESSION['code_mat']));
                  $req->closeCursor();
                  header('Location: ../mainProf.php?permis=2&&info=1');
                  
               }
               else{
                header('Location: ../mainProf.php?permis=2&&info=2');
               }             
       }
       else{
        header('Location: ../mainProf.php?permis=2&&info=2');
               }
               
?>
