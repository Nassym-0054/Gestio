<style>
    @import url("css/schedule.css");
</style>
<?php
    /*
    $bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    */
    $req=$bdd->query('SELECT lien FROM historique_emploi_du_temps ORDER BY date_envoie DESC LIMIT 0,1');
    $link=$req->fetch();
    
?>
<div class="schedule">
    <div class="primary">
        <h1>Emploi du temps</h1>
    </div>
    <div class="mybar"></div><br>
    <div class="emploi">
        <iframe class="i-emploi"  src="<?php echo $link['lien']; ?>" alt="l'emploi du temps de la semaine" >
    <div>
</div>
<div class="more-emploi">
    <p>Voir les anciens emplois du temps</p>
</div>