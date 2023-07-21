 
<?php 
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
    $req = $bdd->prepare('DELETE FROM publication WHERE id_pub=?');
    $res = $req->execute(array($_POST['id_publication']));
    header('Location: mainAdmin.php?allow=1&&dash=1');

?>