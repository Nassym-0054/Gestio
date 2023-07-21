<?php 
    if(isset($_FILES['img_acceuil']) and isset($_FILES['img_logo']) and $_FILES['img_acceuil']['error']==0 and $_FILES['img_logo']['error']==0){
        $info_img1=pathinfo($_FILES['img_acceuil']['name']);
        $info_img2=pathinfo($_FILES['img_logo']['name']);
        $our_extention = array('jpeg','jpg','png','gif','webp');
        if( in_array($info_img1['extension'],  $our_extention) and in_array($info_img2['extension'],  $our_extention) ){
            move_uploaded_file($_FILES['img_acceuil']['tmp_name'], 'img_profil/'.basename($_FILES['img_acceuil']['name']) );
            move_uploaded_file($_FILES['img_logo']['tmp_name'], 'img_profil/'. basename($_FILES['img_logo']['name']) );
            $path1='traitementAdmin/img_profil/' . basename($_FILES['img_acceuil']['name']);
            $path2='traitementAdmin/img_profil/' . basename($_FILES['img_logo']['name']);
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
    $req = $bdd->prepare('INSERT INTO profil_ecole(nom_ecole, nom_universite, img_logo, img_acceuil) VALUES(?,?,?,?)');
    $req -> bindParam(1,$nom_ecole);
    $req -> bindParam(2,$nom_universite);
    $req -> bindParam(3,$img_logo);
    $req -> bindParam(4,$img_acceuil);
    $statut = $req->execute(array($_POST['universityName'], $_POST['schoolName'], $path2, $path1 ));
    
    if($statut){
        header('Location: ../mainAdmin.php?allow=1&&dash=3&&status=1');
    }
    else{
        header('Location: ../mainAdmin.php?allow=1&&dash=3&&status=2');
    }
?> 
