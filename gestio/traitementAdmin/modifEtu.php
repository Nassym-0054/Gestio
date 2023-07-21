<?php
 
 if(preg_match('#^[0-9]{8}$#',$_POST['matricule'])  and preg_match('#^[0-9]{8}$#',$_POST['telephone']) and preg_match('#^[0-9]{8}$#',$_POST['telephoneMaman']) and preg_match('#^[0-9]{8}$#',$_POST['telephonePapa'])){
  echo $_POST['matricule'];
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

            $req=$bdd->prepare('UPDATE etudiant SET matricule=?,nom_etu=?,prenoms_etu=?,sexe_etu=?,email_etu=?,num_tel=?,specialite_etu=?,niveau_etu_max=?,pays_origine=?,date_naiss=?,nom_papa=?,prenom_papa=?,num_tel_papa=?,nom_maman=?,prenom_maman=?,num_tel_maman=?,ville_origine=?
            WHERE matricule=?');
            $bol=$req->execute(array($_POST['matricule'],$_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['email'],$_POST['telephone'],$_POST['specialite'],$_POST['classe'],$_POST['pays'],$_POST['dataNaissance'],$_POST['nomPapa'],$_POST['prenomPapa'],$_POST['telephonePapa'],$_POST['nomMaman'],$_POST['prenomMaman'],$_POST['telephoneMaman'],$_POST['ville'],$_POST['matricule']));
            
            if($bol){
               echo "ok ";
            }
            header('Location: ../mainAdmin.php?allow=2&&go=3&&status=1');
   }else{ echo $_POST['matricule'];
     // header('Location: ../mainAdmin.php?allow=2&&go=3&&status=0');
   }
     
?>
