<?php
  session_start();
    
    
    $_POST['prenom']=htmlspecialchars($_POST['prenom']);
    $_POST['nom']=htmlspecialchars($_POST['nom']);
    $_POST['pass1']=htmlspecialchars($_POST['pass1']);
    $_POST['pass2']=htmlspecialchars($_POST['pass2']);
    if($_POST['pass1']==$_POST['pass2'] and $_POST['confirmation']==$_SESSION['code_confirmation'] and preg_match('#[0-9]+#',$_POST['pass1'])){ 
       
      include('../connexionDataBase.php');
       /*
      $serveur = "localhost";
      $login = "root";
      $passwd = "";
      $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
      $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      */

              $_POST['pass1']=password_hash( $_POST['pass1'],PASSWORD_DEFAULT);
              $req=$bdd->prepare('INSERT INTO utilisateur (user_pass,id_etu) VALUES (?,?)');
              $req -> bindParam(1, $user_pass);
              $req -> bindParam(2, $id_etu);
              $req->execute(array( $_POST['pass1'], $_POST['matricule']));
              $req->closeCursor();

              $_SESSION['matricule']=$_POST['matricule'];
              header('Location: ../main.php');
           
       

    }else{
        header('Location: ../php/inscription1.php?error=1');
    }
?>
<div></div> 
