<?php
    session_start();
    if(isset($_FILES['accountProfil'])and $_FILES['accountProfil']['error']==0)
    {
        $info_img=pathinfo($_FILES['accountProfil']['name']);
        $our_extention = array('jpeg','JPEG','jpg','JPG','png','PNG','gif','GIF','webp','WEBP');
        if( in_array($info_img['extension'],  $our_extention) ){
            move_uploaded_file($_FILES['accountProfil']['tmp_name'], 'student_image/'.basename($_FILES['accountProfil']['name']) );
            $path='traitement/student_image/' . basename($_FILES['accountProfil']['name']);
            echo $path;
            echo $_SESSION['matricule'];
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
    $statut = $req->execute(array($path,$_SESSION['matricule']));
    
    if($statut){
        header('Location: ../main.php?permis=6&&status=1');
    }
    else{
        header('Location: ../main.php?permis=6&&status=0');
    }
?>  
