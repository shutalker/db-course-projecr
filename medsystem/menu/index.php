<?php
    $started = session_start();
    $user = "all";
    include '../includes/redirect_to_auth.php';

    if(isset($_GET['out']) && $_GET['out'] == 1)
    {
        session_unset();
        session_destroy();
	    header('Location:../');
	    exit();
    }
    
    if(!isset($_GET['option']))
    {
        header('Location: ./main.php');
        exit();
    }

    switch($_GET['option'])
    {
        case "registrate": header("Location: ../registrator/index.php?option=$_GET[option]");
                           break;

        case "accounting": header("Location: ../technician/index.php?option=$_GET[option]");
                           break;
        
        default: header('Location: ./');
                 break;
    }
    
    exit();
?>
