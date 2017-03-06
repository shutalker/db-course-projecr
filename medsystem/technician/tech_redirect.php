<?php    
    if(isset($_GET['out']) && $_GET['out'] == 1)
    {
	    	header('Location: ./index.php?out=1');
	    	exit();
    }

    if(isset($_GET['tomain']) && $_GET['tomain'] == 1)
    {
	    	header('Location: ./index.php?tomain=1');
	    	exit();
    }
    
    if(isset($_GET['tooption']) && $_GET['tooption'] == 1)
    {
	    	header('Location: ./tech_accounts_controller.php');
	    	exit();
    }
?>
