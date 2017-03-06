<?php
    $started = session_start();
    $user = "technician";
    include '../includes/redirect_to_auth.php';
    
    include 'tech_redirect.php';
    
    if(!isset($_POST['send']))
    {
        header('Location: ./tech_forms.php');
        exit();
    }

    include '../includes/dbconnect.php';
    
    $weekNum = $_POST['selector2'];
    
    include 'try_sql.php';

    header("Location: ./tech_accounts_output1.php?period=$period&count=$count");

    exit();
?>
