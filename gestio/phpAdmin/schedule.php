<style>
    @import url('css/coursesProf.css');
    @import url('css/info.css');
</style>
<div class="schedule">
      <div class="primary">
         <h1>Emploi du temps</h1>
         <a href="http://localhost/gestio/mainAdmin.php?allow=6" id="historique">Historiques</a>

      </div>
      <div class="mybar"></div><br>
      <p id="entete">Mettre le programme à disposition <br> des apprenants</p> 
      <form action="traitementAdmin/send_programme.php" method="POST" enctype="multipart/form-data" class="formCour">
            <p>Envoi de l'emploi du temps</p>
            <input type="file" name="cours"  > <br> 
            <div >
              <input type="submit" value="Envoyer" class="sub" /><i class="fa fa-send send"></i>
            </div>      
      </form>
</div>

<div class="info_block" id="envoyer"style="display:none;">
          Envoyer avec succes! <br>
          <span id="ok1">ok</span>
</div>
<div class="info_block" id="echec" style="display:none;">
          echec de l'envoie !
          verifier si il s'agit bien d'un pdf ! <br>
          <span id="ok2">ok</span>
    </div>

<?php $info=0; 
      extract($_GET);
      if($info==1){ 
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