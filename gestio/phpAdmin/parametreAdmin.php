<style>
    @import url("css/parametre.css");
    @import url('css/info.css');
</style>

<div class="mynotes">

    <div class="primary">
        <h1>Paramètres de compte</h1>
        <div id="drop">
            <span id="boutton" class="otherOption"><i class="fa fa-ellipsis-h"></i></span>
            <ul id="drop-box">
                <li>@Options</li>
                <li><a href="#" onclick="openAndCloseForm('shadow-box1')">Modifier mot de passe</a> </li>
                <li><a href="#" onclick="openAndCloseForm('shadow-box2')">changer l'avatar</a></li>
                <li><a href="#" onclick="openAndCloseForm('shadow-box3')">Activer mode sombre#</a></li>
                <li><a href="#" onclick="openAndCloseForm('shadow-box4')">Désactiver mode sombr#</a></li>
            </ul>
        </div>
        <script>
            window.onload = function() {
                var bouton = document.getElementById('boutton');
                var SousMenu = document.getElementById('drop-box');
                bouton.onclick = function() {
                    if (SousMenu.style.display == "none") {
                        SousMenu.style.display = "inline";

                    } else {
                        SousMenu.style.display = "none";
                    }
                };
            };
        </script>

    </div>
    <div class="mybar"></div><br>

    <div class="list-news">
        <div class="option">
            <div class="sousOption" id="shadow-box1">
                <form action="" method="POST"></form>
                <form action="traitementAdmin/updatemdp.php" method="POST">
                    <label for="hold">ancien mot de passe</label>
                    <input class="input01" id="hold" type="password" name="lastpassword" placeholder="" required /><br />
                    <label for="new1">nouveau mot de passe</label>
                    <input class="input01" id="new1" type="password" name="newpasswordFirst" placeholder="" required /><br />
                    <label for="new2">confirmer mot de passe</label>
                    <input class="input01" id="new2" type="password" name="newpasswordSecond" placeholder="" required /><br />
                    <a href="#" class="go-back" onclick="openAndCloseForm('shadow-box1')"> <i class="fa fa-arrow-left"></i> </a>
                    <input type="submit" value="Valider" />
                </form>
            </div>
            <div class="sousOption" id="shadow-box2">
                <p>Changer votre photo de profil</p>
                <form action="traitementAdmin/defineProfilImage.php" method="POST" enctype="multipart/form-data">
                    <!--i doubd it-->
                    <input type="file" name="accountProfil" />
                    <a href="#" class="go-back gb1" onclick="openAndCloseForm('shadow-box2')"> <i class="fa fa-arrow-left"></i> </a>
                    <input class="gb1" type="submit" value="Valider" />
                </form>
            </div>
            <!---<div class="sousOption" id="shadow-box3">
                <p>test3</p>
            </div>
            <div class="sousOption" id="shadow-box4">
                <p>test4</p>
            </div>-->
        </div>
        <script>
            function openAndCloseForm(valeur_id) {
                if (document.getElementById(valeur_id).style.display == "none") {
                    document.getElementById(valeur_id).style.display = "block";
                    document.getElementById("drop-box").style.display = "none";
                } else {
                    document.getElementById(valeur_id).style.display = "none";
                }
            };
        </script>
        <div class="box"></div>
    </div>

    <div id="photoblock">
        <div id="boiteProfil">
            <a href="#"><i class="fa fa-camera camera"></i></a>
            <img id="photo" src="<?php if (empty($data2)) {
                                        echo 'img/logo4.jpeg';
                                    } else {
                                        echo $data2['lien_photo'];
                                    } ?>" alt="profil">
        </div>
    </div>
    <br />

    <p class="infotitle">Informations personnelles</p>
    <div class="etublock">
        <?php
        /*$bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $req=$bdd->query('SELECT p.nom_Prof,p.prenom_prof,p.id_Prof,p.quota_heure,p.email,m.nom_mat
                         FROM professeur p INNER JOIN matiere m
                         ON m.id_prof1=p.id_Prof
                         WHERE  m.id_mat=123');
           
            $donne=$req->fetch();*/
        /*
        $bdd = new PDO('mysql:host=localhost;dbname=gestioDB', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        */
        $req = $bdd->prepare('SELECT nom_admin,prenom_admin,id_admin,email_admin
                                FROM admin
                                WHERE id_admin=?');
        $req->execute(array($_SESSION['id_admin']));
        $donne = $req->fetch();
        ?>
        <?php /*var_dump($donne)*/ ?>
        <div>
            <p class="infouser">Identifiant: <?php echo $donne['id_admin'] ?></p>
            <p class="infouser">Nom: <?php echo $donne['nom_admin'] ?></p>
            <p class="infouser">Prenoms: <?php echo $donne['prenom_admin'] ?></p>
        </div>
        <div>
            <p class="infouser">email: <?php echo $donne['email_admin'] ?></p>
            <p class="infouser">Matière: <?php echo 'NEANT'; ?></p>
            <p class="infouser">Quota horaire: <?php echo 'NEANT'; ?></p>
        </div>
    </div> <br>
    <!--<p class="infotitle">Informations des parents</p>
        <div class="etublock">
            <div>
                <p class="infouser">Nom du père:</p>
                <p class="infouser">Prénom du père:</p>
                <p class="infouser">Numéros du père:</p>
            </div>
            <div>
                <p class="infouser">Nom du mère:</p>
                <p class="infouser">Prénom de la mère:</p>
                <p class="infouser">Numéros de la père:</p>
            </div>
        </div>-->
    <!--
        <form action="parametre-etu.php" method="POST">
-->
</div>

<!-- well done-->
<div class="info_block" id="good" style="display:none;">
    password reset successfully :) <br>
    <span id="ok1">ok</span>
</div>
<!-- by flob update-->
<div class="info_block" id="wrong" style="display:none;">
    something were wrong :( <br>
    <span id="ok2">ok</span>
</div>

<?php
if (isset($statut)) {
    if ($statut == 1) {
?>

        <script type="text/javascript">
            var div = document.getElementById('good');
            div.style.display = "block";
            var ok = document.getElementById('ok1');
            ok.addEventListener('click', function() {
                div.style.display = "none";
            }, false);
        </script>

    <?php
    } else {
    ?>

        <script type="text/javascript">
            var div = document.getElementById('wrong');
            div.style.display = "block";
            var ok = document.getElementById('ok2');
            ok.addEventListener('click', function() {
                div.style.display = "none";
                <?php unset($statut); /*essai qui n'a pas fonctionné */ ?>
            }, false);
        </script>

<?php
    }
}
?>