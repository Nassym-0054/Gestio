<style>
    @import url("css/parametre.css");
    @import url("css/notes.css");
</style>

<div id="photoblock">
            <div id="boiteProfil">
                <!--CE DOIT EST EXCLUSIVEMENT RESERVER A L'ETUDIANT ! merd eun peu de respect-->
                <!-- <a href="#" class="camerap"><i class="fa fa-camera camera"></i></a>-->
                <img id="photo" src="img/pt.jpg" alt="profil">
            </div>
        </div>
        <br/>

       <p class="infotitle mod">Informations personnelles</p>
       <div class="etublock">
            <div>
                <p class="infouser">Nom: <?php echo $donne['nom_etu'];?></p>
                <p class="infouser">Prenoms: <?php echo $donne['prenoms_etu'];?></p>
                <p class="infouser">Sexe: <?php echo $donne['sexe_etu'];?></p>
                <p class="infouser">Matricule: <?php echo $donne['matricule'];?></p>
                <?php
                    /**ceci est fait pour contenir les mail trop long dans la boite d'affichage */
                    if( $donne1['longeur_mail'] > 25){
                        echo '<p class="infouser"><span>' . $donne["email_etu"] . '</span></p>'; 
                    }
                    else{
                        echo '<p class="infouser">email: <span>' . $donne["email_etu"] . '</span></p>'; 
                    }
                ?>
                <p class="infouser">numéro: <?php echo $donne['num_tel'];?></p>
            </div>
            <div>
                <p class="infouser">Spécialité: <?php echo $donne['specialite_etu'];?></p>
                <p class="infouser">Niveau:  <?php echo $donne['niveau_etu_max'];?></p>
                <p class="infouser">Pays d'origine: <?php echo $donne['pays_origine'];?></p>
                <p class="infouser">Ville d'origine: <?php echo $donne['ville_origine'];?></p>
                <p class="infouser">Date de naissance: <?php echo $donne['date_naiss'];?></p>
                <!--<p class="infouser">Annee du BAC:</p>-->
            </div>
        </div> <br>
        <p class="infotitle mod">Informations des parents</p>
        <div class="etublock">
            <div>
                <p class="infouser">Nom du père : <?php echo $donne['nom_papa']?></p>
                <p class="infouser">Prénom du père: <?php echo $donne['prenom_papa']?></p>
                <p class="infouser">Numéros du père: <?php echo $donne['num_tel_papa']?></p>
            </div>
            <div>
                <p class="infouser">Nom du mère: <?php echo $donne['nom_maman']?></p>
                <p class="infouser">Prénom de la mère: <?php echo $donne['prenom_maman']?></p>
                <p class="infouser">Numéros de la père: <?php echo $donne['num_tel_maman']?></p>
            </div>
        </div><br/>
        <p class="infotitle mod">Notes de l'étudiants</p>
        <div class="boiteNotes">
            <?php 
                include('php/notes.php');
            ?>
        </div>
        
