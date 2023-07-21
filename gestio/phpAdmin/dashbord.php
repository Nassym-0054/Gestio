<style>
    @import url('css/dashbord.css');
</style>
<body>
   <?php 
        $dash=0;
        extract($_GET);
        switch($dash)
        {
            case 1: include('phpAdmin/acceuil.php');
                break;
            case 2: include('php/forums.php');
                break;
            case 3: include('phpAdmin/personnalisation.php');
                break;
            case 4: include('phpAdmin/schedule.php');
                break;
            case 5: include('phpAdmin/cours.php');
                break;
            case 6: include('phpAdmin/publicationAdmin.php');
                break;
            case 7: include('php/help.php');
                break;
            case 8: include('phpAdmin/visite.php');
                break;
            default: include('phpAdmin/dashbordOption.php');   
        }
        
   ?>  
</body>