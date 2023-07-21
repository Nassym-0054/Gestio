<?php
    session_start();
    if(isset($_FILES['accountProfil'])and $_FILES['accountProfil']['error']==0)
    {
        $info_img=pathinfo($_FILES['accountProfil']['name']);
        $our_extention = array('jpeg','JPEG','jpg','JPG','png','PNG','gif','GIF','webp','WEBP');
        if( in_array($info_img['extension'],  $our_extention) ){
            move_uploaded_file($_FILES['accountProfil']['tmp_name'], 'prof_image/'.basename($_FILES['accountProfil']['name']) );
            $path='traitementProf/prof_image/' . basename($_FILES['accountProfil']['name']);
            echo $path;
            echo $_SESSION['id_prof'];
        }
    }
    include('../connexionDataBase.php');
    /*
    $serveur = "localhost";
    $login = "root";
    $passwd = "";
    $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    */
    $req = $bdd->prepare('INSERT INTO image_profil(lien_photo, id_user, date_enregistrement) VALUES(?,?,NOW())');
    $req -> bindParm(1,$lien_photo);
    $req -> bindParam(2,$id_user);
    $statut = $req->execute(array($path,$_SESSION['id_prof']));
    
    if($statut){
        header('Location: ../mainProf.php?permis=6&&status=1');
    }
    else{
        header('Location: ../mainProf.php?permis=6&&status=0');
    }
?> 
 
