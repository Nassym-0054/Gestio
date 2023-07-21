<?php
    session_start();
    $_SESSION['id']=1; /*quelle est la raison de la creation de cette session? by Redfox 30/06/20 11:37*/
?>

<!DOCTYPE html>
<html lang="en">
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
    <script src="boot/jquery.min.js"></script>
    <script src="boot/bootstrap.min.js"></script>
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
                        <img src="img/pt.jpg" alt="photo de profil utilisateur">
                    </div>
                    <div class="u-name-grade">
                        <p>@sannykhaled</p>
                        <p>Administrateur</p>
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
                    <li><a href="mainAdmin.php?allow=3"><i class="fa fa-user-o"></i> Professeur</a></li>
                    <li><a href="mainAdmin.php?allow=4"><i class="fa fa-cog" name="acceuil"></i> Paramètres</a></li>
                    <li><a href="mainAdmin.php?allow=5"><i class="fa fa-power-off" name="acceuil"></i> Deconnexion</a></li>
                </ul>
           </div>         

           <div class="main-page">

                <div class="collapse menuDeroulant" id="encreMenu">
                    <?php $permis=0?>
                        <div class="lot1">
                            <a href="mainAdmin.php?allow=1"><p><i class="fa fa-tachometer" name="acceuil"></i> Dashbord</p></a> 
                            <a href="mainAdmin.php?allow=2"><p><i class="fa fa-users"></i> Etudiant</p></a>
                            <a href="mainAdmin.php?allow=3"><p><i class="fa fa-user-o"></i> Professeur</p></a>
                        </div>
                        <div class="lot2">
                            <a href="mainAdmin.php?allow=4"><p><i class="fa fa-cog"></i> Paramètres</p></a>
                            <a href="mainAdmin.php?allow=5"><p><i class="fa fa-power-off"></i> Deconnexion</p></a>
                        </div>
                </div>

                <div class="main-dashboard">
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
                        case 4: include('phpAdmin/parametres.php');
                            break;
                        case 5: include('php/deconnexion.php');
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
