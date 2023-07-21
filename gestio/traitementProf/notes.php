<?php 
$i=0;
  session_start(); // pour pouvoir utilise $_SESSION['code_mat'];
  include('../connexionDataBase.php');
/*
try{
    $serveur = "localhost";
    $login = "root";
    $passwd = "";
    $bdd = new PDO("mysql:host=$serveur;dbname=gestioDB",$login,$passwd);
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e ){
    die('ERROR :'.$e->getMessage());
}
*/

$req=$bdd->query('SELECT matricule FROM etudiant');
$req3=$bdd->prepare('SELECT code_mat FROM evaluation WHERE code_mat=?');
$req3->execute(array($_SESSION['code_mat']));
$ans_req3=$req3->fetch();
echo $ans_req3;
echo $_SESSION['code_mat'];
                  
                  
while($donne=$req->fetch()){
    if(!empty($ans_req3)){
        $req2=$bdd->prepare('UPDATE evaluation SET note1=?,code_mat=?,matricule=?,note2=?,moyenne=? WHERE code_mat=? AND matricule=?');
        $req2->execute(array($_POST[$donne['matricule'] . '_note1'],$_SESSION['code_mat'],$donne['matricule'],$_POST[$donne['matricule'].'_note2'],$_POST[$donne['matricule'].'_moyenne'],$_SESSION['code_mat'],$donne['matricule']));
        $req2->closeCursor();
    }
    else{
        $req2=$bdd->prepare('INSERT INTO evaluation (note1,code_mat,matricule,note2,moyenne) VALUES (?,?,?,?,?)');
        $req2 -> binParam(1, $note1);
        $req2 -> binParam(2, $code_mat, PDO::PARAM_INT);
        $req2 -> binParam(3, $matricule, PDO::PARAM_INT);
        $req2 -> binParam(4, $note2);
        $req2 -> binParam(5, $moyenne);
        $req2->execute(array($_POST[$donne['matricule'] . '_note1'],$_SESSION['code_mat'],$donne['matricule'],$_POST[$donne['matricule'].'_note2'],$_POST[$donne['matricule'].'_moyenne']));
        $req2->closeCursor();
    }

    /*office de test
    echo '<br/>test'.$i . '<br/>';
    echo $_SESSION['code_mat'] .' '. $donne['matricule'] .' '. $_POST[$donne['matricule'].'_note2'] .' '. $_POST[$donne['matricule'] . '_note1'] .' '. $_POST[$donne['matricule'].'_moyenne'];
    $i++;*/
    
    }
    $req->closeCursor();

    header('Location: ../mainProf.php?permis=3&&info=1');
?>