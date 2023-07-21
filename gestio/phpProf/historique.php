<style>
   @import url('css/historique.css'); 
</style>
<div class="schedule">
    <div id="return"><a href="http://localhost/gestio/mainProf.php?permis=2"> <i class="fa fa-angle-left angle-left fa-2x"></i></a></div>

<div id="historique-wrap"> 
            <div class="primary">
               <h1>Historique des PDF <br> envoyés</h1>
         </div>
         <div class="mybar"></div><br>

         <ul class="historique-ul">
             <?php
             /*
                  try{
                     $bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                   }catch(Exception $e){
                      die('ERREUR :'.$e->getMessage());
                   }
            */
                   $req=$bdd->prepare('SELECT nom_cours,date_envoie,paths FROM historique_cours WHERE code_mat=?');
                   $req->execute(array($_SESSION['code_mat']));
                   
                while($donne=$req->fetch()){
               ?>
                <a href="<?php echo $donne['paths'] ?>"><li> <span><?php echo $donne['nom_cours'] ?> </span> <span><?php echo $donne['date_envoie'] ?></span></li></a>

                <?php } ?>
         </ul>
         </div>

</div>
