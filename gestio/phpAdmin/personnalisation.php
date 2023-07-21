<style>
    @import url('css/info.css');
</style>
<div class="custom-box">
    <form action="traitementAdmin/schoolRegister.php" enctype="multipart/form-data" method="POST">
        <div >
           <p> <label for="universityName"> Nom de l'université : </label>
            <input class="yogot1 put" type="text" name="universityName" id="universityName" required> </p>
            
            <p><label for="schoolName"> Nom de l'école : </label>
            <input class="yogot2 put put2" type="text" name="schoolName" id="schoolName" required> </p>
            
            <p> <label for="imageAcceuil">Définir l'image d'acceuil :</label>
            <input class="fileSelector1" type="file" name="img_acceuil" id="imageAcceuil" required> </p>
            
            <p> <label for="logo">Définir le logo de l'école :</label>
            <input class="fileSelector2" type="file" name="img_logo" id="logo" required><br>
            <input class="class-send" type="submit" value="Valider"> </p>
            
            
       </div>
       
    </form>
</div>

    <!-- by flob -->
    <div class="info_block" id="succes" style="display:none;">
            Enregistrer avec succes! <br>
            <span id="ok">ok</span>
    </div>

    <div class="info_block" id="echec" style="display:none;">
          Echec de l'enregistrement! <br>
          <span id="ok1">ok</span>
    </div>

    <?php $status=0; 
        extract($_GET);
        if($status==1){ 
?> 
            <script type="text/javascript">
                var div=document.getElementById('succes');
                div.style.display="block";
                var ok=document.getElementById('ok');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
            </script>
<?php 
        }
        else if($status==2){
?>
            <script type="text/javascript">
                var div=document.getElementById('echec');
                div.style.display="block";
                var ok=document.getElementById('ok1');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
            </script>
<?php
        }
?>

