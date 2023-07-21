
<?php
    session_start();
    
    if(isset($_POST['OUT']) AND $_POST['OUT']=="1")
    {
        $_SESSION['active'] = "no";
        /*echo $_SESSION['active'];*/
        session_destroy();
        header('Location: ../index.php');
        exit();
    }
    else
    {
        header('Location: ../main.php');
    }
?> 
