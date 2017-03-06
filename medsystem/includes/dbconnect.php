<?php

    try
    {
        if(!$started)
            session_start();
        $pdo = new PDO('mysql:host=localhost; dbname=medsystem', $_SESSION['username'], $_SESSION['userpswd']);
        $sql = "SET NAMES 'utf8'";
        $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = "Невозможно подключиться к базе данных: ".$e->getMessage();
        header("Location: $_SERVER[HTTP_REFERER]?error=$output");
        exit();
    }

?>
