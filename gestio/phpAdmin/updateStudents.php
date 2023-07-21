<form action="mainAdmin.php?allow=2 && go=3" method="POST">
    <div class="boiteR">
        <p><span class="indicatif1">Rechercher un étudiant</span>
            <span>
                <input class="boiteRecherche" name="searchValue" type="search" placeholder="matricule" /> 
                <button type="submit" name="rechercher"> <img src="img/loupe.png" alt="icone de recherche"/> </button>
            <span>
        </p>
    </div><br/>
</form>

<div class="resultat">
    <?php
        if(isset($_POST['rechercher'])==false )
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
                $req=$bdd->prepare('SELECT * FROM etudiant WHERE matricule=?'); //on se connecte a la base et on recupere les info de l'etudiant
                $req->execute(array($_POST['searchValue']));
                $donne=$req->fetch();
                if(!empty($donne)){ // si se etudiant existe on peut le modifier 
                    include('phpAdmin/editStudent.php');
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