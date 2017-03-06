<?php
    try
    {
        $sql = "select usr_role, usr_pswd
                from user_role
                where login = '$login'";
        $result = $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = "Ошибка выполнения запроса: ".$e->getMessage();
        header("Location: ./error.php?error='$output'");
        exit();
    }

    if($result->rowcount() > 0)
        $user = $result->fetch();
    else
    {
        $output = "Пользователь '$login' не найден";
        header("Location: ./error.php?error='$output'");
        exit();
    }
?>
