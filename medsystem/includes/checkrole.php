<?php
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        header('Location: ./redirect_to_auth.php');
        exit();
    }
?>
