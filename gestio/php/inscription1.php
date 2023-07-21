<?php 
       session_start();
       /*
       $bdd=new PDO('mysql:host=localhost;dbname=gestioDB','root','',array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
        */  
       $req=$bdd->prepare('SELECT matricule FROM etudiant WHERE matricule=?' );
                                   
       $req->execute(array($_POST['matricule']));
       $donne=$req->fetch();
       if(empty($donne['matricule'])){
        $req->closeCursor();
        header('Location: inscription.php');
       }
       
      $confirmcode=0;
       extract($_GET);
       if($confirmcode!=0){
             $_SESSION['code_confirmation']=$confirmcode;
         }
    
?>
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
            <form action="../traitement/inscription1.php" method="post"
            <?php
              //  $_POST['login_etudiant']=="Etudiant";
            ?>
            >
                <div class="formulaire">
                    <div class="group-1">

                        <h1>Inscription</h1>
                        <div class="bar"></div>

                        <!--<label for="username">Nom utilisateur</label>
                            <input type="text" name="" id="">-->
                        <label for="nom">Nom</label>
                        <input type="hidden" name="matricule" value="<?php echo $donne['matricule'];?>">
                            <input type="text" name="nom" id="nom" value="<?php echo $_POST['nom']; ?>" required>
                        <label for="prenom">Prenoms</label>
                            <input type="text" name="prenom" id="prenom" value="<?php echo $_POST['prenom']; ?>" required>
                        <label for="MotDePasse1">Choisissez un mot de passe</label>
                            <input type="password" name="pass1" id="MotDePasse1" required>
                        <label for="MotDePasse2">Confirmez le mot de passe</label>
                            <input type="password" name="pass2" id="MotDePasse2" required>
                        <label class="conf" for="confirmation" >Code de confirmation</label>
                            <input type="password" name="confirmation" id="confirmation" required>
                    </div>
                    <div class="group-2">
                        <p>Déjà un compte ? <a href="index.html">Connecter vous !</a></p>
                        <input  type="submit" value="Valider">
                    </div>
                </div>
                <script type="text/javascript">
                    function rand (max,min) {
                        min=Math.ceil(min);
                        max=Math.floor(max);
                        return Math.floor(Math.random() * (max-min +1) + min) ;
                    } 
                   var conf= rand(9000,1000),confirmation=document.getElementsByName('confirmation');
                   var xhr=new XMLHttpRequest();
                   xhr.open('GET','inscription1.php?confirmcode='+conf);
                   xhr.onreadystatechange=function(){
                        if(xhr.readyState==4 && xhr.status==200){
                          //lastnb=parseInt(basket.innerText);
                           confirmation.value=conf;
                            alert('le code de confirmation est '+conf);
                       
                        }
                    }
                    xhr.send(null);
                </script>
           
            </form>
            
           
        </div>
    </div>
</body>

div class="info_block" id="echec" style="display:none;">
          Veuillez bien renseignez les mot de passes <br> et le code de confirmation !
          <span id="ok1">ok</span>
</div>

<?php $error=0; 
        extract($_GET);
        if($error){ 
?> 
             <script type="text/javascript">
                var div=document.getElementById('echec');
                div.style.display="block";
                var ok=document.getElementById('ok1');
                ok.addEventListener('click',function(){
                    div.style.display="none";
                },false);
            </script>

            
<?php 
        }
       
?>
 