<style>
   @import url('css/professeur.css');
   @import url('css/info.css');
</style>
<div class="title" >Ajout d'un professeur </div>
<div class="mybar"></div><br>

<form class="form-ajout" action="traitementAdmin/insertProf.php" method="POST">
    <div class="title-info"> 
        Veuillez entrez les informations relatives au professeur en suivant le format
    </div>
    <div class="blocky">
        <div class="blocky1">
            <div class="name">Identifiant :</div><br/>
            <div class="name">Nom :</div><br/>
            <div class="name">Prenom :</div><br/>
            <div class="name">Email :</div><br/>
            <div class="name">Quota-Horaire :</div><br/>
            <div class="name">Mot de Passe :</div><br/>
            <div class="name">Confirmer le Mot de Passe :</div><br/>
            <div class="name">Code matière :</div><br/>
            <div class="name">Matiére :</div><br/>
        </div>

        <div class="blocky2">
            <input type="text" placeholder="Ex : PRF#027)" name="id">
            <input type="text" placeholder="Ex : AKOTENOU)" name="nom">
            <input type="text" placeholder="Ex : Généreux)" name="prenom">
            <input type="email" placeholder="Ex : support@gestio.com)" name="email">
            <input type="text" placeholder="" name="quota">
            <input type="text" placeholder="Aumoin un chiffre" name="pass1">
            <input type="text" placeholder="" name="pass2">
            <input type="text" placeholder="" name="code_mat">
            <input type="text" placeholder="" name="nom_mat">
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

     
