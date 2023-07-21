<?php

      if(preg_match('#^[0-9]{8}$#',$_POST['matricule'])  and preg_match('#^[0-9]{8}$#',$_POST['telephone']) and preg_match('#^[0-9]{8}$#',$_POST['telephoneMaman']) and preg_match('#^[0-9]{8}$#',$_POST['telephonePapa'])){
            $sucess=0;
            include('../connexionDataBase.php');
            /*
            $serveur = "localhost";
            $login = "root";
            $passwd = "";
            $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
            $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            */

            $req=$bdd->prepare('INSERT INTO etudiant(matricule,nom_etu,prenoms_etu,sexe_etu,email_etu,num_tel,specialite_etu,niveau_etu_max,annee_universitaire,pays_origine,date_naiss,nom_papa,prenom_papa,num_tel_papa,nom_maman,prenom_maman,num_tel_maman,ville_origine)
               VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $req -> bindParam(1,$matricule);
            $req -> bindParam(2,$nom_etu);
            $req -> bindParam(3,$prenoms_etu);
            $req -> bindParam(4,$sexe_etu);
            /*J'aurais voulu faire un FILTER_SANITIZE_MAIL et un FILTER_VALIDATE_MAIL mais pas le temps*/
            $req -> bindParam(5,$email_etu);
            $req -> bindParam(6,$num_tel);
            $req -> bindParam(7,$specialite_etu);
            $req -> bindParam(8,$niveau_etu_max);
            $req -> bindParam(9,$annee_universitaire);
            $req -> bindParam(10,$pays_origine);
            $req -> bindParam(11,$date_naiss);
            $req -> bindParam(12,$nom_papa);
            $req -> bindParam(13,$prenom_papa);
            $req -> bindParam(14,$num_tel_papa);
            $req -> bindParam(15,$nom_maman);
            $req -> bindParam(17,$prenom_maman);
            $req -> bindParam(17,$num_tel_maman);
            $req -> bindParam(18,$ville_origine);
            $essai = $req->execute(array($_POST['matricule'],$_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['email'],$_POST['telephone'],$_POST['specialite'],$_POST['classe'],$_POST['annee'],$_POST['pays'],$_POST['dataNaissance'],$_POST['nomPapa'],$_POST['prenomPapa'],$_POST['telephonePapa'],$_POST['nomMaman'],$_POST['prenomMaman'],$_POST['telephoneMaman'],$_POST['ville']));
            $sucess=$essai;
            if($sucess==1){
               header('Location: ../mainAdmin.php?allow=2&&status=1');
            }
            else{
               header('Location: ../mainAdmin.php?allow=2&&status=0');/**a revoir */
            }

      }else{
         header('Location: ../mainAdmin.php?allow=2&&status=0');
      }
   
      
?>
