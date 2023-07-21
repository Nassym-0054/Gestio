<style>
    @import url('css/pubProf.css');
    @import url('css/info.css');
</style>

<form action="traitementAdmin/del-publication.php" method="post" class="boitePub boitePub2">
    <div class="boitePub">
    <div class="boite1">
        <div class="lien lien2" >
            <p><label for="titrePub">Titre Publication</label> <input name="titrePub" id="titrePub" type="text"/></p>
            <p><label for="message">Nom publicateur</label> <input type="text"  id="message" name="message"></p>
            <div class="envoyer">
                <input type="submit" value="Publier"/>
            </div>
        </div>
        <!--div class="zoneDeTexte">
            
            <br/>
            
        </div>
        <div class="zoneDeTexte shadowZone">
            <input  placeholder="Titre" name="TitrePub" id="titrePub" type="text"/>
            <br/>
            <textarea  placeholder="Message" name="Message" id="message" rows="10" cols="15"></textarea>
        </div-->
    </div>
    </div>
    
</form>


<div class="info_block" id="envoyer"style="display:none;">
         Publication faite avec succes! <br>
          <span id="ok1">ok</span>
</div>
<div class="info_block" id="echec" style="display:none;">
         Veuillez bien renseiller les champs !
          <br>
          <span id="ok2">ok</span>
    </div>

<?php $info=0; 
      extract($_GET);
      if($info==1 ){ 
?> 
      <script type="text/javascript">
               var div=document.getElementById('envoyer');
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
         var div=document.getElementById('echec');
         div.style.display="block";
          var ok=document.getElementById('ok2');
          ok.addEventListener('click',function(){
              div.style.display="none";
          },false);
       
</script>
<?php
}
?> 
