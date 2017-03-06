<?php	
    if(!isset($_GET['login_successful']))
    {
	    header('Location: ./auth');
	    exit();
    }
    else if($_GET['login_successful'] == 1)
    {
        header('Location: ./menu');
        exit();
    }
?>
