<?php
    session_start();

    if(isset($_POST['iduser'])and isset($_POST['pass'])){
        $_SESSION['id_prof']=htmlspecialchars($_POST['iduser']);
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
       
        $req=$bdd->prepare('SELECT user_pass FROM utilisateur WHERE id_prof=?');
        $req->execute(array($_POST['iduser']));
        $donne=$req->fetch();
        $req->closeCursor();

        if(!empty($donne)){
            //si on retrouve l'identifiant du prof on recupere en mm temps le code sa matiere
            
              $req=$bdd->prepare('SELECT id_mat,nom_mat FROM matiere WHERE id_prof1=?');
              $req->execute(array($_SESSION['id_prof']));
              $code=$req->fetch();
              $req->closeCursor();
              $_SESSION['code_mat']=$code['id_mat'];
              $_SESSION['nom_mat']=$code['nom_mat'];

            if(password_verify($_POST['pass'],$donne['user_pass'])){
                $req1=$bdd->prepare('SELECT nom_prof, prenom_prof FROM professeur WHERE id_Prof=?');
                $req1->execute(array($_POST['iduser']));
                $iden=$req1->fetch();
                $prof_name = $iden['prenom_prof'] . ' ' . $iden['nom_prof'];
                $_SESSION['user_name']=$prof_name;
                $_SESSION['active']='yes';
                header('Location: ../mainProf.php');
            }else{
             header('Location: ../index.php');
            }
        }else{
            header('Location: ../index.php');
            
        }
    }
    
?>