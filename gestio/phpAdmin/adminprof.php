 
<style>
    @import url('css/professeur.css');
    @import url('css/info.css');
    
</style>

<div>
    <h3 >Administration des Professeurs</h3>
</div><br/>
<a class="add-prof" href="http://localhost/gestio/mainAdmin.php?allow=3&&mod=1">
    Ajouter un professeur
</a>
<div class="info-prof"><br/>
    <h4>Liste des Professeurs enregistrés</h4><br/>
</div>
<div class="tableau">
    <p>
<table>
    <tr>
        <th>idProf</th>
        <th>Nom du Professeur</th>
        <th>Prenom du Professeur</th>
        <th>Email</th>
        <th>Quota Horaire</th>
        <th>idMat</th>
        <th>Matière</th>
        <th>Action</th>
    </tr>

    <?php 
    /*
        try{
            $bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
            die('ERREUR :'.$e->getMessage());
        }
    */
          $req=$bdd->query('SELECT COUNT(*) AS nb_prof FROM professeur');
          $nbProf=$req->fetch();
          $req->closeCursor();
          $req=$bdd->query('SELECT * FROM professeur WHERE 1');
          
          
         for($i= 0; $i < $nbProf['nb_prof']; $i++) {
             $prof=$req->fetch();
             $req1=$bdd->prepare('SELECT id_mat, nom_mat FROM matiere WHERE id_prof1=?');
             $req1->execute(array($prof['id_Prof']));
             $donnee=$req1->fetch();
    ?>
            <tr>
                <td><?php echo $prof['id_Prof'] ;?></td>
                <td><?php echo $prof['nom_prof'] ;?></td>
                <td><?php echo $prof['prenom_prof'] ?></td>
                <td><span style="width: 12em; word-wrap: break-word;"><?php echo $prof['email'] ;?></span></td>
                <td><?php echo $prof['quota_heure'] ;?></td>
                <td><?php echo $donnee['id_mat'] ;?></td>
                <td><?php echo $donnee['nom_mat'] ;?></td>
                <td >
                    <form action="mainAdmin.php?allow=3&&mod=2" method="post">
                        <input type="hidden" value="<?php echo $prof['id_Prof'] ;?>" name="id_Prof">
                        <input type="hidden" value="<?php echo $prof['nom_prof'] ;?>" name="nom_prof">
                        <input type="hidden" value="<?php echo $prof['quota_heure'] ;?>" name="quota_heure">
                        <input type="hidden" value="<?php echo $prof['email'] ;?>" name="email">
                        <input type="hidden" value="<?php echo $prof['prenom_prof'] ;?>" name="prenom_prof">
                        <input type="hidden" value="<?php echo $donnee['id_mat'] ;?>" name="id_mat">
                        <input type="hidden" value="<?php echo $donnee['nom_mat'] ;?>" name="nom_mat">
                        <i class="fa fa-edit"> </i><input class="sup-mod" type="submit" value="Modifier">
                    </form>
                        
                    <form action="traitementAdmin/deleteProf.php" method="post">
                        <input type="hidden" value="<?php echo $prof['id_Prof'] ;?>" name="id_Prof">
                        <i class="fa fa-trash"> </i><input class="sup-mod" type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
    <?php 
         }
    ?>

</table>
</p>

</div>

<!-- by flob delete -->
    <div class="info_block" id="supprimer"style="display:none;">
          suprimer avec succes! <br>
          <span id="ok1">ok</span>
    </div>
<!-- by flob update-->
    <div class="info_block" id="modifier" style="display:none;">
          modifier avec succes! <br>
          <span id="ok2">ok</span>
    </div>

    <!-- by flob register-->
    <div class="info_block" id="register" style="display:none;">
            Enregistrer avec succes! <br>
            <span id="ok">ok</span>
    </div>
    <?php $info=0; 
      extract($_GET);
      if($info==1){ 
?> 
      <script type="text/javascript">
               var div=document.getElementById('supprimer');
               div.style.display="block";
                var ok=document.getElementById('ok1');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
             
      </script>
    <?php 
}else if($info==2){

?>
<script type="text/javascript">
         var div=document.getElementById('modifier');
         div.style.display="block";
          var ok=document.getElementById('ok2');
          ok.addEventListener('click',function(){
              div.style.display="none";
          },false);
       
</script>
<?php
}else if($info==3){ 
?> 
 <script type="text/javascript">
               var div=document.getElementById('register');
               div.style.display="block";
                var ok=document.getElementById('ok');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
 </script>
 <?php 
      }
?>