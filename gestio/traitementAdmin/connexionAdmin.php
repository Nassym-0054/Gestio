<?php
     session_start();

    if(isset($_POST['id_admin'])and isset($_POST['pass'])){
        $_SESSION['id_admin']=htmlspecialchars($_POST['id_admin']);
        $_POST['pass']=htmlspecialchars($_POST['pass']);
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

        $req=$bdd->prepare('SELECT user_pass FROM utilisateur WHERE id_admin=?');
        $req->execute(array($_POST['id_admin']));
        $donne=$req->fetch();
        $req->closeCursor();

        if(!empty($donne)){
           

            if(password_verify($_POST['pass'],$donne['user_pass'])){
                /*ceci est pour recuperer le nom  de l'admin*/
                $req1=$bdd->prepare('SELECT nom_admin, prenom_admin FROM `admin` WHERE id_admin=?');
                $req1->execute(array($_POST['id_admin']));
                $iden=$req1->fetch();
                $admin_name = $iden['prenom_admin'] . ' ' . $iden['nom_admin'];
                $_SESSION['user_name']=$admin_name;
                $_SESSION['active']='yes';
                /* */
                header('Location: ../mainAdmin.php');
            }else{
             header('Location: ../index.php');
            }
        }else{
            header('Location: ../index.php');
        }
    }
    
?>