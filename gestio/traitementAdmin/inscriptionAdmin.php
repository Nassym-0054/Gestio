<?php
  session_start();
    
    
    $_POST['email']=htmlspecialchars($_POST['email']);
    $_POST['prenom']=htmlspecialchars($_POST['prenom']);
    $_POST['nom']=htmlspecialchars($_POST['nom']);
    $_POST['pass1']=htmlspecialchars($_POST['pass1']);
    $_POST['id_admin']=htmlspecialchars($_POST['id_admin']);
    if($_POST['pass1']==$_POST['pass2'] and $_POST['confirmation']==$_SESSION['code_confirmation'] and preg_match('#[0-9]+#',$_POST['pass1'])){ 
       
        $_SESSION['id_admin']=$_POST['id_admin'];
        if( preg_match('#^ADM\#[0-9]{3}$#',$_POST['id_admin'])){
            include('../connexionDataBase.php');
            /*
            $serveur = "localhost";
            $login = "root";
            $passwd = "";
            $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
            $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            */

              $req=$bdd->prepare('INSERT INTO `admin` (id_admin,nom_admin,prenom_admin,email_admin,fonction)
                                   VALUES (?,?,?,?,?) ');
              $req -> bindParam(1,$id_admin);
              $req -> bindParam(2,$nom_admin);
              $req -> bindParam(3,$prenom_admin);
              $req -> bindParam(4,$email_admin);
              $req -> bindParam(5,$fonction);
              $req->execute(array($_POST['id_admin'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['fonction']));
              $req->closeCursor();
              $_POST['pass1']=password_hash( $_POST['pass1'],PASSWORD_DEFAULT);
              $req=$bdd->prepare('INSERT INTO utilisateur (user_pass,id_admin) VALUES (?,?)');
              $req->execute(array( $_POST['pass1'], $_POST['id_admin']));
              $req->closeCursor();
              header('Location: ../mainAdmin.php');
           
        }else {
            header('Location: ../phpAdmin/inscriptionAdmin.php?error=1');
        }

    }else{
        header('Location: ../phpAdmin/inscriptionAdmin2.php?error=1');
    }
?>
<div></div>