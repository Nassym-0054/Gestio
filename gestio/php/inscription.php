<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Ces trois balises meta *doivent* venir avant tout autre balise meta, c'est indispensable -->
    <title>gestio-inscription</title>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Feuille de style personnalise-->
    <link rel="stylesheet" href="../css/inscription.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
    <div class="container">
        
        <div class="entete-box">
            <i class="fa fa-google"></i>
            <span>ESTIO</span>
        </div>

        <div class="insc">
                <i class="fa fa-google"></i>
                <!-- <p>GESTIO</p> -->
                <!-- <br>
                <p>Gest.Io est une plateforme en ligne 
                    qui a pour but de faciliter la vie 
                    des étudiants, professeurs et 
                    membres de l'administration d'une 
                    école universitaire.
                </p> -->
        </div>

        <div class="box-insc">
            <!--<h1>Inscription</h1>
            <div class="bar"></div>-->
            <form action="inscription1.php" method="post">
                <div class="formulaire">
                    <div class="group-1">

                        <h1>Inscription</h1>
                        <div class="bar"></div>

                        <!--<label for="username">Nom utilisateur</label>
                            <input type="text" name="" id="">-->
                        <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" required>
                        <label for="prenom">Prenoms</label>
                            <input type="text" name="prenom" id="prenom" required>
                        <label for="matricule">Matricule</label>
                            <input type="text" name="matricule" id="matricule" required>
                    </div>
                    <div class="group-2">
                        <p>Déjà un compte ? <a href="../index.php">Connecter vous !</a></p>
                        <input  type="submit" value="Valider">
                    </div>
                </div>
            </form>
            
           
        </div>
    </div>
</body>
