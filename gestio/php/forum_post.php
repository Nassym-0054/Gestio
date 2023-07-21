<?php
session_start();
include('../connexionDataBase.php');
extract($_POST);
    if(isset($valider)){
        $req = $bdd->prepare('INSERT INTO forum(pseudo, message) VALUES (:pseudo, :message)');
        $req->execute([
            'pseudo' => $pseudo, 'message' => $mess]);
    }
    if(isset($_SESSION['id_prof'])){
        header('Location: ../mainProf.php?permis=7');
    }
    elseif(isset($_SESSION['matricule'])){
        header('Location: ../main.php?permis=7');
    }
    elseif(isset($_SESSION['id_admin'])){
        header('Location: ../mainAdmin.php?allow=1&&dash=2');
    }
