<?php
    /*
    try{
        $bdd= new PDO ('mysql:host=localhost;dbname=gestioDB','root','',array(PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
    }catch(Exception $e ){
        die('ERROR :'.$e->getMessage());
    }
    */
?>
<style>
    @import url('css/notesProf.css');
    @import url('css/info.css');
</style>

<div class="schedule">
        <div class="primary">
            <h1>Notes des etudiants</h1>
        </div>
        <div class="mybar"></div><br>

        <form action="traitementProf/notes.php" method="POST">
            <table class="tableNote">
                <thead >
                    <tr >
                        <th class="Stitre Stitre1" colspan="6">semestre 1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="Stitre">Matricule</td>
                        <td class="Stitre">Nom</td>
                        <td class="Stitre">Prénoms</td>
                        <td class="Stitre special">Note1</td>
                        <td class="Stitre special">Note2</td>
                        <td class="Stitre">Moyenne</td>
                    </tr>

                    <?php 
                    $req=$bdd->query('SELECT matricule , nom_etu , prenoms_etu  FROM etudiant');
                    $req2=$bdd->prepare('SELECT note1, note2, moyenne FROM evaluation WHERE code_mat=? AND matricule=?');
                    while($donne=$req->fetch()){
                        $req2->execute(array($_SESSION['code_mat'], $donne['matricule'] ));
                        $donne2=$req2->fetch();
                    ?>
                        <tr>
                            <td><?php echo $donne['matricule']?></td>
                            <td><?php echo $donne['nom_etu'] ?></td>
                            <td><?php echo $donne['prenoms_etu'] ?></td>
                            <td><input type="text" value="<?php if(!empty($donne2['note1'])){echo $donne2['note1'];} ?>" name="<?php echo $donne['matricule'];?>_note1"></td>
                            <td><input type="text" value="<?php if(!empty($donne2['note2'])){echo $donne2['note2'];} ?>" name="<?php echo $donne['matricule'];?>_note2"></td>
                            <td><input type="text" value="<?php if(!empty($donne2['moyenne'])){echo $donne2['moyenne'];} ?>" name="<?php echo $donne['matricule'];?>_moyenne"></td>
                        </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
            </table>
            <input type="submit" value="Enregistrez !">
        </form>
</div>


<div class="info_block" id="register" style="display:none;">
          Notes Enregistrées avec succes! <br>
          <span id="ok1">ok</span>
</div>

<?php $info=0; 
      extract($_GET);
      if($info==1){ 
?> 
      <script type="text/javascript">
               var div=document.getElementById('register');
               div.style.display="block";
                var ok=document.getElementById('ok1');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
             
      </script>
    <?php 
}
?> 