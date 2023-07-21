 
<?php
    session_start();

    if(isset($_POST['matricule'])and isset($_POST['pass'])){
        $_SESSION['matricule']=htmlspecialchars($_POST['matricule']);
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
       
        $req=$bdd->prepare('SELECT user_pass FROM utilisateur WHERE id_etu=?');
        $req->execute(array($_POST['matricule']));
        $donne=$req->fetch();
        $req->closeCursor();

        if(!empty($donne)){
            //si on retrouve le matricule de l'etudiant on verifie son mot de passe et on conserve son matricule     
            
            if(password_verify($_POST['pass'],$donne['user_pass'])){
                $_SESSION['matricule']=$_POST['matricule'];
                /*ceci est pour recuperer le nom  de l'etidiant*/
                $req1=$bdd->prepare('SELECT nom_etu, prenoms_etu FROM etudiant WHERE matricule=?');
                $req1->execute(array($_POST['matricule']));
                $iden=$req1->fetch();
                $etu_name = $iden['prenoms_etu'] . ' ' . $iden['nom_etu'];
                $_SESSION['user_name']=$etu_name;
                $_SESSION['pseudo']=$_SESSION['user_name'];
                $_SESSION['active']='yes';
                /* */
                header('Location: ../main.php');
            }else{
             header('Location: ../index.php');
            }
        }else{
            header('Location: ../index.php');
        }
    }
    
?>