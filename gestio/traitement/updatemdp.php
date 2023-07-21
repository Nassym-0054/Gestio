<?php
    session_start();
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

    if(isset($_POST['lastpassword']) and isset($_POST['newpasswordFirst']) and isset($_POST['newpasswordSecond']))
    {
        $_POST['lastpassword']=htmlspecialchars($_POST['lastpassword']);
        $_POST['newpasswordFirst']=htmlspecialchars($_POST['newpasswordFirst']);
        $_POST['newpasswordSecond']=htmlspecialchars($_POST['newpasswordSecond']);

        $req=$bdd->prepare('SELECT user_pass FROM utilisateur WHERE id_etu=?');
        $req->execute(array($_SESSION['matricule']));
        $donne=$req->fetch();
        $req->closeCursor();
        

        if(!empty($donne))
        {
            if(password_verify($_POST['lastpassword'], $donne['user_pass']) and $_POST['newpasswordFirst']=$_POST['newpasswordSecond'])
            {
                $pass=password_hash($_POST['newpasswordSecond'], PASSWORD_DEFAULT);
                $req1=$bdd->prepare('UPDATE utilisateur SET user_pass=? WHERE id_etu= ?');
                $req1->execute(array($pass,$_SESSION['matricule']));
                header('Location: ../main.php?permis=6&&statut=1');
                //echo '1';
            }
            else
            {
                header('Location: ../mainProf.php?permis=6&&statut=0');
               // echo '0';
            }
        }
        
    }
    

?> 
 
