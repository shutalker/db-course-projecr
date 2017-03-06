<?php    
    $started = session_start();
    $user = "registrator";
    include '../includes/redirect_to_auth.php';

    if(isset($_GET['out']) && $_GET['out'] == 1)
    {
        session_unset();
        session_destroy();
	    header('Location: ../');
	    exit();
    }

    if(isset($_GET['tomain']) && $_GET['tomain'] == 1)
    {
	    	header('Location: ../menu');
	    	exit();
    }
    
    
    if(!isset($_GET['option']) || $_GET['option'] == NULL)
    {
	    header('Location: ../menu');
	    exit();
    }

    if($_GET['option'] == 'registrate')
    {
	    header('Location: ./reg_registrate_controller.php');
	    exit();
    }
?>
