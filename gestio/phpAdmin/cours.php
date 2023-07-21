<style>
    @import url('css/coursesProf.css');
    @import url('css/info.css');
</style>
<div class="schedule">
      <div class="primary">
         <h1>Cours </h1>
         <a href="" id="historique">Historiques</a>

      </div>
      <div class="mybar"></div><br>

      <table>
          <tr class="table-header">
               <th>Nom Prof</th>
               <th>Prenom prof</th>
               <th>Nom Matiere</th>
               <th>Nom du PDF</th>
               <th>Date_envoie</th>
          </tr>
          <?php
                /*
                $bdd = new PDO('mysql:host=localhost;dbname=gestioDB','root','', array(PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION) );
                */
                $req = $bdd->query('SELECT p.nom_prof, p.prenom_prof ,m.id_mat ,m.nom_mat 
                                    FROM professeur p 
                                    INNER JOIN matiere m
                                    ON m.id_prof1= p.id_Prof');
                $cpt=0;
                while( $donne= $req->fetch()){
                    $req2=$bdd->prepare('SELECT  nom_cours, date_envoie FROM historique_cours  WHERE code_mat=?');
                   if( $req2->execute(array($donne['id_mat']))){
                      $donne2=$req2->fetch();
                           if(!empty($donne2['nom_cours'])){
                            
                   
            ?>

                    <tr>
                        <td <?php if($cpt==0){ echo 'style="background-color: rgba(79, 105, 129, 0.671); padding : 3px 3px 3px 3px ;"';}else{echo 'style="background-color: rgba(169, 137, 184, 0.671); padding : 3px 3px 3px 3px ;"';} ?> ><?php echo $donne['nom_prof']?></td>
                        <td <?php if($cpt==0){ echo 'style="background-color: rgba(79, 105, 129, 0.671); padding : 3px 3px 3px 3px ;"';}else{echo 'style="background-color: rgba(169, 137, 184, 0.671); padding : 3px 3px 3px 3px ;"';} ?> ><?php echo $donne['prenom_prof']?></td>
                        <td <?php if($cpt==0){ echo 'style="background-color: rgba(79, 105, 129, 0.671); padding : 3px 3px 3px 3px ;"';}else{echo 'style="background-color: rgba(169, 137, 184, 0.671); padding : 3px 3px 3px 3px ;"';} ?> ><?php echo $donne['nom_mat']?></td>
                        <td <?php if($cpt==0){ echo 'style="background-color: rgba(79, 105, 129, 0.671); padding : 3px 3px 3px 3px ;"';}else{echo 'style="background-color: rgba(169, 137, 184, 0.671); padding : 3px 3px 3px 3px ;"';} ?> ><?php echo $donne2['nom_cours']?></td>
                        <td <?php if($cpt==0){ echo 'style="background-color: rgba(79, 105, 129, 0.671); padding : 3px 3px 3px 3px ;"';}else{echo 'style="background-color: rgba(169, 137, 184, 0.671); padding : 3px 3px 3px 3px ;"';} ?> ><?php echo $donne2['date_envoie']?></td>
                    </tr>
                    
            <?php       
                    if($cpt==1){ $cpt=0; }else{$cpt=1;}
                    $cpt=1;
                        }
                    }
                }
              
            ?>
      </table>
     
</div>

 