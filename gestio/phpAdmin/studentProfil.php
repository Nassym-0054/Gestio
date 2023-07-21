<form action="mainAdmin.php?allow=2 && go=2" method="POST">
    <div class="boiteR">
        <p><span class="indicatif1">Rechercher un étudiant</span>
            <span>
           
                <input class="boiteRecherche" name="searchValue" type="search" placeholder="matricule"/> 
                <button type="submit" name="rechercher"> <img src="img/loupe.png" alt="icone de recherche"/> </button>
              
            <span>
        </p>
    </div><br/>
</form>

<div class="resultat">
    <?php
        if(isset($_POST['rechercher'])==false)
        {
            include('phpAdmin/aucunResultat.php');
        }
        else
        { 
            if(isset($_POST['searchValue'])){
                /*
                try{
                    $bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }catch(Exception $e){
                    die('ERREUR :'.$e->getMessage());
                }
                */
                $req=$bdd->prepare('SELECT * FROM etudiant WHERE matricule=?');
                $req1=$bdd->prepare('SELECT LENGTH(email_etu) AS longeur_mail FROM etudiant WHERE matricule=?');
                $req->execute(array($_POST['searchValue']));
                $req1->execute(array($_POST['searchValue']));
                $donne1=$req1->fetch();
                $donne=$req->fetch();
                if(!empty($donne)){
                    include('phpAdmin/resultat.php');
                }
                else
                {
                    include('phpAdmin/aucunResultat.php');
                }
            }
        }     
        //condition du resultat
    ?>
</div>


