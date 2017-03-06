<?php
    $started = session_start();
    $user = "registrator";
    include '../includes/redirect_to_auth.php';

    $mode = $_GET['mode'];
    include 'reg_redirect.php';

    if(!isset($_POST['send']))
    {
        header("Location: ./reg_registrate_finish.php?mode=$mode");
        exit();
    }

    include '../includes/dbconnect.php';

    switch($mode)
    {
        case "todoc": $p_id = $_SESSION['p_id'];
                      $d_id = $_SESSION['d_id'];
                      $app_date = $_POST['appDay'];
                      break;

        case "ontime": $p_id = $_SESSION['p_id'];
                       $d_id = $_POST['appDoc'];
                       $app_date = $_SESSION['app_date'];
                       break;
        
    }

    $app_time = $_POST['appHour'].":".$_POST['appMinute'].":00";

    if(strtotime($app_date." ".$app_time) < strtotime(date('Y-m-d H:i:s')))
    {
        $output = "Ошибка при выборе уже прошедшей даты приёма!";
        header("Location: ./reg_registrate_finish.php?mode=$mode&error=$output");
        exit();
    }    

    include 'sql_check_appointment.php';

    try
    {
        $sql = "update appointment
                set pat_id = :pId
                where app_date = :appDate and app_time = :appTime and doc_id = :dId";
        $s = $pdo->prepare($sql);
        $s->bindValue(':pId', $p_id);
        $s->bindValue(':appDate', $app_date);
        $s->bindValue(':appTime', $app_time);
        $s->bindValue(':dId', $d_id);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $output = $e->getMessage();
        header("Location: ./reg_registrate_finish.php?mode=$mode&error=$output");
        exit();
    }
    
    header("Location: ./reg_registrate_finish.php?mode=$mode&success=1");
    exit();
?>
