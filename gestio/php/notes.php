<?php 
$mat=13384921;
/*
$bdd = new PDO('mysql:host=localhost;dbname=gestioDB','root','', array(PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION) );
*/
$req=$bdd->prepare('SELECT code_mat,note1,note2,moyenne
                    FROM evaluation             
                    WHERE matricule= ? 
                    ORDER BY code_mat ');
    $req->execute(array($_SESSION['matricule']));
?>

<style>
    @import url("css/notes.css");
</style>
<div class="primary">
    <h1>Mes notes</h1>
</div>
<div class="mybar"></div><br>

<table>
    <tr>
        <td class="Stitre Stitre1" colspan="5">Semestre 1</td>
    </tr>
    <tr class="Stitre">
        <td>UE</td>
        <td>ECU</td>
        <td>Note 1</td>
        <td>Note 2</td>
        <td>Moyenne</td>

    </tr>
<!--Debut UE && ECU-->
    
       
        <tr>
           
            <td rowspan="6">Mathematiques générales</td>
            <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Analyse';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
            <td rowspan="6"><?php if(!empty($donne['moyenne'])){echo $donne['moyenne'];}else{echo '--';}?></td>
        </tr>
        

    <tr>
            <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'probabilité';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Algebre Matricielle';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Algebre de bool';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Numeration';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Quatre operation';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>



<!--Fin UE && ECU-->

<!--Debut UE && ECU-->
<tr>
        <td rowspan="5">Physiques quantiques</td>
        <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Theori des graphes';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
            <td rowspan="5"><?php if(!empty($donne['moyenne'])){echo $donne['moyenne'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo ' Cinematique';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Dynamique';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
    <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Theorie des meme';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
    <tr>
           <?php $donne=$req->fetch() ;?>
            <td><?php if(!empty($donne2['nom_mat'])){echo $donne2['nom_mat'];}else{ echo 'Relativité';}?></td>
            <td><?php if(!empty($donne['note1'])){echo $donne['note1'];}else{echo '--';}?></td>
            <td><?php if(!empty($donne['note2'])){echo $donne['note2'];}else{echo '--';}?></td>
    </tr>
<!--Fin UE && ECU-->

<!--Debut UE && ECU-->
<tr>
        <td rowspan="5">Chimie élémentaire</td>
        <td>Analyse</td>
        <td>--</td>
        <td>--</td>
        <td rowspan="5">--</td>
    </tr>
    <tr>
        <td>Chimie medicale</td>
        <td>--</td>
        <td>--</td>
    </tr>
    <tr>
        <td>Anatomie générale</td>
        <td>--</td>
        <td>--</td>
    </tr>
    <tr>
        <td>Chimie organique</td>
        <td>--</td>
        <td>--</td>
    </tr>
    <tr>
        <td>Radioactivité et fusion nucleaire</td>
        <td>--</td>
        <td>--</td>
    </tr>
<!--Fin UE && ECU-->
</table>