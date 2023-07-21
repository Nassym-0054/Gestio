<style>
    @import url('css/professeur.css');
</style>
<div class="title" >Modifier les informations d'un prof </div>
<div class="mybar"></div><br>

<form class="form-ajout" action="traitementAdmin/modifProf.php" method="POST">
    <div class="title-info"> 
        Veuillez entrez les nouvelles informations relatives au professeur en suivant le format
    </div>
    <div class="blocky">
        <div class="blocky1">
            <div class="name">Identifiant :</div><br/>
            <div class="name">Nom :</div><br/>
            <div class="name">Prenom :</div><br/>
            <div class="name">Email :</div><br/>
            <div class="name">Quota-Horaire :</div><br/>
            <div class="name">Code matiére :</div><br/>
            <div class="name">Matiére :</div><br/>
        </div>
        <div class="blocky2">
            <input type="text" value="<?php echo $_POST['id_Prof'] ;?>" name="id">
            <input type="text" value="<?php echo $_POST['nom_prof'] ;?>" name="nom">
            <input type="text" value="<?php echo $_POST['prenom_prof'] ;?>" name="prenom">
            <input type="text" value="<?php echo $_POST['email'] ;?>" name="email">
            <input type="text" value="<?php echo $_POST['quota_heure'] ;?>" placeholder="" name="quota">
            <input type="text" value="<?php echo $_POST['id_mat'] ;?>" placeholder="" name="code_mat">
            <input type="text" value="<?php echo $_POST['nom_mat'] ;?>" placeholder="" name="nom_mat">
         </div>
    </div>
    <input class="sub-button" type="submit" value="Valider">
    
</form>
<div class="info_block" id="error"style="display:none;">
       Veuillze bien renseigner <br> les champs
        <span id="ok1">ok</span>
</div>

<?php $error=0; 
      extract($_GET);
      if($error){ 
?> 
      <script type="text/javascript">
               var div=document.getElementById('error');
               div.style.display="block";
                var ok=document.getElementById('ok1');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
             
      </script>
<?php 
}

?>
