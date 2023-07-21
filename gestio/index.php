<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Ces trois balises meta *doivent* venir avant tout autre balise meta, c'est indispensable -->

    <title>gestio-acceuil</title>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Feuille de style personnalise-->
    <link rel="stylesheet" href="css/style2.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container">
        
        <div class="entete_logo">
            <i class="fa fa-google"></i>
            <span>ESTIO</span>
        </div>
        <div class="desc">
            <div class="e">
                <i class="fa fa-google"></i><br>
                <h1>GESTIO</GESTIO></h1><br>
                <p>Gest.Io est une plateforme en ligne 
                    qui a pour but de faciliter la vie 
                    des étudiants, professeurs et 
                    membres de l'administration d'une 
                    école universitaire.
                </p>
            </div>
        </div>

        <div class="log">
            <i class="fa fa-google"></i>
            
            <span>ESTIO</span>
            <h3>BIENVENUE</h3>
            <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p> -->
            <?php
                if( isset($_POST['login_etudiant'])==false AND isset($_POST['login_professeur'])==false AND isset($_POST['login_administration'])==false )
                {
                    include('php/etuProfAdmin.php');
                }
                elseif(isset($_POST['login_etudiant']) AND $_POST['login_etudiant']=="Etudiant")
                {
                    /*echo 'youpi f1rst 5tep 1s d0n3';*/
                    include('php/connexionEtudiant.php');
                }
                elseif(isset($_POST['login_professeur']) AND $_POST['login_professeur']=="Professeur")
                {
                    /*echo 'youpi s2c0nd 5tep 1s d0n3';*/
                    include('php/connexionProf.php');
                }
                elseif(isset($_POST['login_administration']) AND $_POST['login_administration']=="Administration")
                {
                    /*echo 'youpi f1rd 5tep 1s d0n3';*/
                    include('php/connexionAdmin.php');
                }
            ?>
        </div>
    </div>
</body>

</html>