<?php  session_start(); ?>
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
<style>
    @import url('../css/info.css');
</style>
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
            <form action="../traitementAdmin/inscriptionAdmin.php" method="post" s>
                <div class="formulaire">
                    <div class="group-1">
                  
                        <h1>Inscription</h1>
                        <div class="bar"></div>

                        <input type="hidden" name="id_admin" value="<?php echo $_POST['id_admin']; ?>">
                        <input type="hidden" name="nom"  value="<?php echo $_POST['nom']; ?>" >
                        <input type="hidden" name="prenom"  value="<?php echo $_POST['prenom']; ?>" >
                        <input type="hidden" name="email"  value="<?php echo $_POST['email']; ?>">
                        <?php $confirmcode=0;
                              extract($_GET);
                              if($confirmcode!=0){
                              $_SESSION['code_confirmation']=$confirmcode;
                              }?>
                            
                        <label for="pass2">Votre fonction</label>
                            <select name="fonction" id="fonction" required>
                                  <option value="Directeur">Directeur</option>
                                  <option value="Directeur ajoint">Directeur ajoint</option>
                                  <option value="Sécrétaire générale">Sécrétaire générale</option>
                                  <option value="Comptable">Comptable</option>
                                  <option value="Chef Scolarité">Chef Scolarité</option>
                            </select>
                        <label for="pass1">Choisissez un mot de passe</label>
                            <input type="password" name="pass1" id="pass1" required>
                            <span>Un bon mot de passe contient au moins 1 chiffre</span>
                        <label for="pass2">Confirmez le mot de passe</label>
                            <input type="password" name="pass2" id="pass2" required>
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
                   xhr.open('GET','inscriptionAdmin2.php?confirmcode='+conf);
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


<div class="info_block" id="echec" style="display:none;">
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
         