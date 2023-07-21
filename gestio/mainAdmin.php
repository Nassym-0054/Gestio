<?php
    session_start();
    $_SESSION['id']=1; /*quelle est la raison de la creation de cette session? by Redfox 30/06/20 11:37*/
    include('connexionDataBase.php');    
    
    $req = $bdd->query('SELECT img_logo, img_acceuil FROM profil_ecole ORDER BY id DESC');
    $data = $req->fetch();
    $req2 = $bdd->prepare('SELECT lien_photo FROM image_profil WHERE id_user=? ORDER BY date_enregistrement DESC');
    $req2->execute(array($_SESSION['id_admin']));
    $data2 = $req2->fetch();

    if(!isset($_SESSION['active']))
    {
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestio</title>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Feuille de style personnalise-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/framework.css">
    <!-- fichier bootstrap-->
    <link rel="stylesheet" href="boot/bootstrap.css">
    <!--<script src="boot/jquery.min.js"></script>
    <script src="boot/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-wrap">
       <div class="top-nav">
           <div class="logo">
               <i class="fa fa-google"></i>
               <span>ESTIO</span>
           </div>


           <div class="user-nav">
           <div class="user-box">
                    <div class="pt">
                        <img src="<?php if(empty($data2)){ echo 'img/logo4.jpeg'; }else{ echo $data2['lien_photo']; } ?>" alt="photo de profil utilisateur">
                    </div>
                    <div class="u-name-grade">
                        <p>@<?php echo $_SESSION['user_name']; ?></p>
                        <p>Professeur</p>
                    </div>
               </div>
               
               <div class="log">
                   <a href="#encreMenu" data-toggle="collapse"> <i class="fa fa-bars burger"></i> </a>
                    <!--<div class="logout bt-red">
                        <i class="fa fa-power-off"></i>
                        <div>Deconnexion</div>
                    </div>-->
                </div>
                
                <div class="logoUniversite">
                    <img src="img/logoifri.webp" alt="logo école">
               </div>
           </div>
       </div>



       <div class="core">

           <div class="left-nav">
                <?php $allow=0?>
                <ul>
                    <li><a href="mainAdmin.php?allow=1"><i class="fa fa-tachometer" name="dashbord"></i> Dashbord</a></li>
                    <li><a href="mainAdmin.php?allow=2"><i class="fa fa-users"></i> Etudiant</a></li>
                    <li><a href="mainAdmin.php?allow=3"><i class="fa fa-user"></i> Professeur</a></li>
                    <li><a href="mainAdmin.php?allow=4"><i class="fa fa-cog" name="acceuil"></i> Paramètres</a></li>
                    <li><?php include("php/deconnexion.php"); ?><li> 
                </ul>
           </div>         

           <div class="main-page">

                <div class="collapse menuDeroulant" id="encreMenu">
                    <?php $permis=0?>
                        <div class="lot1">
                            <a href="mainAdmin.php?allow=1"><p><i class="fa fa-tachometer" name="acceuil"></i> Dashbord</p></a> 
                            <a href="mainAdmin.php?allow=2"><p><i class="fa fa-users"></i> Etudiant</p></a>
                            <a href="mainAdmin.php?allow=3"><p><i class="fa fa-user"></i> Professeur</p></a>
                        </div>
                        <div class="lot2">
                            <a href="mainAdmin.php?allow=4"><p><i class="fa fa-cog"></i> Paramètres</p></a>
                            <li><?php include("php/deconnexion.php"); ?><li> 
                        </div>
                </div>

                <div class="main-dashboard">

                <div class="login-popup">
                    <div class="form-popup" id="popupForm">
                        <div action="/action_page.php" class="form-container">
                            <i class="fa fa-warning off"></i>
                            <h5> Deconnexion </h5>
                            <p>Êtes-vous sûr de vouloir vous déconnecter ?</p>
                            <div class="choice"> 
                                <form action="traitement/deconnexion.php" method="post">
                                    <input type="text" value="1" name="OUT" class="shadow-input"/>
                                    <input class="btn" onclick="closeForm()" type="submit" value="Oui" />
                                </form>
                                <form action="" method="post">
                                    <input type="text" value="0" name="OUT" class="shadow-input" />
                                    <input class="btn lastbtn" onclick="closeForm()" type="submit" value="Non" />
                                </from>
                            </div>
                        </div>
                    </div>
                </div>

                    <script>
                        function openForm() {
                            document.getElementById("popupForm").style.display="block";
                        }
                        
                        function closeForm() {
                            document.getElementById("popupForm").style.display="none";
                        }
                    </script>

                    <?php 
                    extract($_GET);
                    switch($allow)
                    {
                        case 1: include('phpAdmin/dashbord.php');
                            break;  
                        case 2: include('phpAdmin/etudiant.php');
                            break;
                        case 3: include('phpAdmin/professeur.php');
                            break;
                        case 4: include('phpAdmin/parametreAdmin.php');
                            break;
                        case 5: include('php/deconnexion.php');
                            break;
                        case 6: include('phpAdmin/historique.php');
                            break;
                        default: include('phpAdmin/dashbord.php');
                    }
                     
                    ?>
                </div>
           </div>
       </div> 
    </div>
</body>

</html> 
