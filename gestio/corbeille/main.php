<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Ces trois balises meta *doivent* venir avant tout autre balise meta, c'est indispensable -->

    <title>TITLE</title>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Feuille de style personnalise-->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/framework.css">

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
                        <img src="img/pt.jpg" alt="">
                    </div>
                    <div class="u-name-grade">
                        <p>@sannykhaled</p>
                        <p>Etudiant</p>
                    </div>
               </div>
               <div class="log">
                   <i class="fa fa-bars burger"></i>
                    <div class="logout bt-red">
                        <i class="fa fa-power-off"></i>
                        <div>Deconnexion</div>
                    </div>
                </div>
           </div>
       </div>



       <div class="core">
           <div class="left-nav">
               <ul>
                   <li><a href="#"><i class="fa fa-home"></i> Acceuil</a></li>
                   <li><a href="#"><i class="fa fa-book"></i> Cours</a></li>
                   <li><a href="#"><i class="fa fa-list"></i> Mes notes</a></li>
                   <li><a href="#"><i class="fa fa-calendar"></i> Emploi du temps</a></li>
                   <li><a href="#"><i class="fa fa-question-circle"></i> Aide</a></li>
               </ul>
           </div>
           <div class="main-page">
                <div class="main-dashboard">
                    <?php include('php/home.php'); ?> <!--ok-->
                    <?php //include('php/mynotes.php'); ?> <!---->
                    <br>
                    <?php //include('php/schedule.php'); ?> <!--ok-->
                    <?php //include('php/formation.php'); ?> <!---->
                    <?php //include('php/cours-etu.php'); ?> <!---->
                    <?php //include('php/cours.php'); ?> <!--ok-->
                    <?php //include('php/pres-prof.php'); ?> <!---->
                    <?php //include('php/pres-etu.php'); ?> <!---->
                    <?php //include('php/calendar.php'); ?> <!---->
                    <?php //include('php/help.php'); ?> <!---->

                    <?php //include('php/edit-home.php'); ?>
                    <?php //include('php/edit-schedule.php'); ?>
                    <?php //include('php/edit-notes'); ?>
                    <?php //include('php/edit-formation'); ?>
                    <!-- OTHERS ... -->
                </div>
           </div>
       </div> 
    </div>
</body>

</html>