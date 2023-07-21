<style>
    @import url("css/parametre.css");
    @import url("css/notes.css");
</style>
        
        <p class="infotitle mod">Suspression</p>
        <form action="traitementAdmin/supEtu.php" method="post">
            <div class="blockDelete">
                <input type="text" value="<?php echo $donne['matricule']?>" name="matricule_etu" style="display: none;"/>
                <p><span>Matricule : <?php echo $donne['matricule']?> </span> <input class="bouton" type="submit" value="Supprimer"/></p>
            </div><br>
        </form>
        <p class="infotitle mod">Mise à jour</p>
        <form action="traitementAdmin/modifEtu.php" method="post">
            <div class="etublock">
                    <div>
                        <input type="text" class="userInfo1" placeholder="nom" value="<?php echo $donne['nom_etu']?>" name="nom"/>
                        <input type="text" class="userInfo1" placeholder="prénom" value="<?php echo $donne['prenoms_etu']?>" name="prenom"/>
                        <input type="text" class="userInfo1" placeholder="matricule" value="<?php echo $donne['matricule']?>" name="matricule"/>
                        <input type="email" class="userInfo1" placeholder="email" value="<?php echo $donne['email_etu']?>" name="email"/>
                        <input type="tel" class="userInfo1" placeholder="téléphone" value="<?php echo $donne['num_tel']?>" name="telephone"/>
                        <select name="specialite">
                            <option value="Génie logiciel" <?php if($donne['specialite_etu']=='Génie logiciel'){ echo 'selected'; } ?> >Génie logiciel</option>
                            <option value="Sécurité informatique" <?php if($donne['specialite_etu']=='Sécurité informatique'){ echo 'selected'; } ?> >Sécurité informatique</option>
                            <option value="Internet et multimédia" <?php if($donne['specialite_etu']=='Internet et multimédia'){ echo 'selected'; } ?> >Internet et multimédia</option>
                        </select><br/>
                        <select name="classe">
                            <option value="Licence 1" <?php if($donne['specialite_etu']=='Génie logiciel'){ echo 'Licence 1'; } ?> >Licence 1</option>
                            <option value="Licence 2" <?php if($donne['specialite_etu']=='Génie logiciel'){ echo 'Licence 2'; } ?> >Licence 2</option>
                            <option value="Licence 3" <?php if($donne['specialite_etu']=='Génie logiciel'){ echo 'Licence 3'; } ?> >Licence 3</option>
                            <option value="Licence 4" <?php if($donne['specialite_etu']=='Génie logiciel'){ echo 'Licence 4'; } ?> >Master 1</option>
                            <option value="Licence 5" <?php if($donne['specialite_etu']=='Génie logiciel'){ echo 'Licence 5'; } ?> >Master 2</option>
                        </select><br/>
                        <input required type="text" class="userInfo1" placeholder="date de naissance" value="<?php echo $donne['date_naiss']?>" name="dataNaissance" /><br/>
                        <input type="text" class="userInfo1" placeholder="pays origine" value="<?php echo $donne['pays_origine']?>" name="pays"/>
                        <input type="text" class="userInfo1" placeholder="viille" value="<?php echo $donne['ville_origine']?>" name="ville" />
                        <p class="userInfo2">
                            <label for="sexe1">Homme : </label><input id="sexe1" type="radio" name="sexe" value="homme" <?php if($donne['sexe_etu']=='homme'){ echo 'checked'; } ?> />
                            <label for="sexe2">Femme : </label><input id="sexe2" type="radio" name="sexe" value="femme" <?php if($donne['sexe_etu']=='femme'){ echo 'checked'; } ?> />
                        </p>
                    </div>
                    <div>
                        <input type="text" class="userInfo1" placeholder="nom père" value="<?php echo $donne['nom_papa']?>" name="nomPapa" />
                        <input type="text" class="userInfo1" placeholder="prénom père" value="<?php echo $donne['prenom_papa']?>" name="prenomPapa"/>
                        <input type="tel" class="userInfo1" placeholder="num père" value="<?php echo $donne['num_tel_papa']?>" name="telephonePapa"/>
                        <input type="text" class="userInfo1" placeholder="nom mère" value="<?php echo $donne['nom_maman']?>" name="nomMaman"/>
                        <input type="text" class="userInfo1" placeholder="prénom mère" value="<?php echo $donne['prenom_maman']?>" name="prenomMaman"/>
                        <input type="tel" class="userInfo1" placeholder="num mère" value="<?php echo $donne['num_tel_maman']?>" name="telephoneMaman"/>
                        <input class="bouton bt send-bt" type="submit" value="Mettre à jour"/>
                    </div>
            </div> <br>
        </form>
        
       
        
        <!-- Modification :
            ===============
            Ajout des variable php en place holder 
            et Ajout d'un <form></form> pour transmettre les modifications effectuer sur l'etudiant
        aussi l'emploi du value est necessaire pour que lorsqu'on ne modifie pas une entrer celle si puisse 
        toujour savoir sa valeur et ne creer pas de case vise dans la table -->
