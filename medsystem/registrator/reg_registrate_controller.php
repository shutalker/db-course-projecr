<?php    
    $started = session_start();
    $user = "registrator";
    include '../includes/redirect_to_auth.php';

    include 'reg_redirect.php';
   
    if(!isset($_POST['send']))
    {
        header('Location: ./reg_forms.php');
        exit();
    }    
    
    switch($_POST['formNum'])
    {
        case 1: $_SESSION['p_id'] = $_POST['patId'];
                $_SESSION['d_id'] = $_POST['docSelector'];
                header('Location: ./reg_registrate_continue.php?mode=todoc');
                break;

        case 2: $_SESSION['p_id'] = $_POST['patId'];
                $_SESSION['subd_id'] = $_POST['subd'];
                $_SESSION['app_date'] = $_POST['appDay'];
                header('Location: ./reg_registrate_continue.php?mode=ontime');
                break;

        default: break;
    }

    exit();
?>
