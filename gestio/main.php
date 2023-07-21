<?php
    session_start();
    include('connexionDataBase.php');
    
    $req = $bdd->query('SELECT img_logo, img_acceuil FROM profil_ecole ORDER BY id DESC');
    $data = $req->fetch();
    $req2 = $bdd->prepare('SELECT lien_photo FROM image_profil WHERE id_user=? ORDER BY date_enregistrement DESC');
    $req2->execute(array($_SESSION['matricule']));
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
    <!-- Ces trois balises meta *doivent* venir avant tout autre balise meta, c'est indispensable -->

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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif] --> 
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
                        <p>Etudiant</p>
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
                    <img src="<?php echo $data['img_logo']; ?>" alt="logo école">
               </div>
           </div>
       </div>



       <div class="core">
           
           <div class="left-nav">
                <?php $permis=0?>
                <ul>
                    <li><a href="main.php?permis=1"><i class="fa fa-home" name="acceuil"></i> Acceuil</a></li>
                    <li><a href="main.php?permis=2"><i class="fa fa-book"></i> Cours</a></li>
                    <li><a href="main.php?permis=3"><i class="fa fa-list"></i> Mes notes</a></li>
                    <li><a href="main.php?permis=4"><i class="fa fa-calendar"></i> Emploi du temps</a></li>
                    <li><a href="main.php?permis=5"><i class="fa fa-graduation-cap"></i> Offre de formation</a></li>
                    <li><a href="main.php?permis=6"><i class="fa fa-cog"></i> Paramètres</a></li>
                    <li><a href="main.php?permis=7"><i class="fa fa-users"></i> Forum</a></li>
                    <li><a href="main.php?permis=8"><i class="fa fa-question-circle"></i> Aide</a></li>
                    <li><?php include("php/deconnexion.php"); ?><li>
                </ul>
           </div>         

           <div class="main-page">
                <div class="collapse menuDeroulant" id="encreMenu">
                    <?php $permis=0?>
                        <div class="lot1">
                            <a href="main.php?permis=1"><p><i class="fa fa-home" name="acceuil"></i> Acceuil</p></a> 
                            <a href="main.php?permis=2"><p><i class="fa fa-book"></i> Cours</p></a>
                            <a href="main.php?permis=3"><p><i class="fa fa-list"></i> Mes notes</p></a>
                            <a href="main.php?permis=4"><p><i class="fa fa-calendar"></i> Emploi du temps</p></a>
                            <a href="main.php?permis=5"><p><i class="fa fa-graduation-cap"></i> Offre de formation</p></a>
                        </div>
                        <div class="lot2">
                            <a href="main.php?permis=6"><p><i class="fa fa-cog"></i> Paramètres</p></a>
                            <a href="main.php?permis=7"><p><i class="fa fa-users"></i> Forum</p></a>
                            <a href="main.php?permis=8"><p><i class="fa fa-question-circle"></i> Aide</p></a>
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
                    
                    switch($permis)
                    {
                        case 1: include('php/home.php');
                            break;  
                        case 2: include('php/cours.php');
                            break;
                        case 3: include('php/notes.php');
                            break;
                        case 4: include('php/schedule.php');
                            break;
                        case 5: include('php/formation.php');
                            break;
                        case 6: include('php/parametre-etu.php'); 
                            break;
                        case 7: include('php/forums.php'); 
                            break;
                        case 8: include('php/help.php'); 
                            break;
                        case 9: include('php/deconnexion.php');
                            break;
                        default: include('php/home.php');
                    }
                     
                    ?>
                </div>
           </div>
       </div> 
    </div>
</body>

</html>