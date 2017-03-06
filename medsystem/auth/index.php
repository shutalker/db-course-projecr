<?php
    if(isset($_GET['error']))
    {
        header("Location: ./main.php?err=$_GET[error]");
	    exit();
    }

    if(!isset($_POST['login']))
    {
        header('Location: ./main.php');
	    exit();
    }
    else
    {
        $login = $_POST['username'];
        $password = $_POST['passwd'];
        $scrambled = md5($password);

        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;

        include '../includes/firstconnect.php';
        include '../includes/getrole.php';

        $_SESSION['username'] = $user['usr_role'];
        $_SESSION['userpswd'] = $user['usr_pswd'];

        header('Location: ../?login_successful=1');
        exit();
    }
?>
