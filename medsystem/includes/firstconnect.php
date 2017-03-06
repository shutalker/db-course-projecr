<?php
    try
    {
        $pdo = new PDO('mysql:host=localhost; dbname=medsystem', $login, $password);
        $sql = "SET NAMES 'utf8'";
        $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = "Невозможно подключиться к базе данных: ".$e->getMessage();
        header("Location: $_SERVER[HTTP_REFER]?error=$output");
        exit();
    }
?>
