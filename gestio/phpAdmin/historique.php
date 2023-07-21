<style>
   @import url('css/historique.css'); 
</style>
<div class="schedule">
    <div id="return"><a href="http://localhost/gestio/mainAdmin.php?allow=1&&dash=4"> <i class="fa fa-angle-left angle-left fa-2x"></i></a></div>

<div id="historique-wrap"> 
            <div class="primary">
               <h1>Historique des emplois du temps <br> envoyés</h1>
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
                     $req=$bdd->query('SELECT lien, date_envoie, nom_pdf FROM historique_emploi_du_temps ORDER BY date_envoie DESC');
                     
                  while($donne=$req->fetch()){
            ?>
               <a href="<?php echo $donne['lien'] ?>"><li> <span><?php echo $donne['nom_pdf'] ?> </span> <span><?php echo $donne['date_envoie'] ?></span></li></a>

            <?php } ?>
         </ul>
         </div>

</div>
