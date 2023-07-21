<?php
    $mod = 0;
    extract($_GET);
    switch($mod)
    {
        case 1:
            include('phpAdmin/ajoutprof.php');
            break;
        case 2:
            include('phpAdmin/modprof.php');
            break;
        default:
            include('phpAdmin/adminprof.php');
            break;
    }
?>
