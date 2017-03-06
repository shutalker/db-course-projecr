<?php
    $started = session_start();
    $user = "technician";
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

    if($_GET['option'] == 'accounting')
    {
	    header('Location: ./tech_accounts_controller.php');
	    exit();
    }
?>
