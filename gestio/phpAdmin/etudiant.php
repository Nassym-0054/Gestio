<style>
    @import url('css/etudiant.css'); 
</style> 
<body>
    <div class="mainEtu">
        <div class="menu">
            <?php $go=1?>
            <a href="mainAdmin.php?allow=2 && go=1" title="Enregistrer un étudiant"> <div class="optionMenu"><i class="fa fa-save confIcon"></i> </div> </a>
            <a href="mainAdmin.php?allow=2 && go=2" title="Rechercher un étudiant"> <div class="optionMenu"><i class="fa fa-user-o"></i> </div> </a>
            <a href="mainAdmin.php?allow=2 && go=3" title="Mettre a jour le statut d'un étudiant"> <div class="optionMenu"><i class="fa fa-edit"> <!--trash-o--> </i> </div> </a>
            <?php if(isset($_GET['status']) and $_GET['status']==1 ){  echo '<a title="enregistrement bien effectué"> <div class="optionMenu" style="background-color: green;"><i class="fa fa-valider"></i> </div> </a>'; } ?>
            <?php if(isset($_GET['status']) and $_GET['status']==0 ){  echo '<a title="enregistrement non effectué"> <div class="optionMenu" style="background-color: red;"><i class="fa fa-question"></i> </div> </a>'; } ?>

        </div>
        <br/>  <!-- mainAdmin -->
        <div class="corpDePage">
            <?php 
                extract($_GET);
                switch($go)
                {
                    case 1: include('phpAdmin/studentRegister.php');
                        break;
                    case 2: include('phpAdmin/studentProfil.php');
                        break;
                    case 3: include('phpAdmin/updateStudents.php');
                        break;
                    default: include('phpAdmin/studentRegister.php');
                }
            ?>
        <br/><br/>
        </div>
    </div>
</body>