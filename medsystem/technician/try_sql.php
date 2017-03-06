<?php
    try
    {
        $sql_select = "SELECT *
                       FROM t_account
                       WHERE week_num = '$weekNum'";

        $result = $pdo->query($sql_select);
        $count = $result->rowcount();
    }
    catch(PDOException $e)
    {
        $output = $e->getMessage();
        header("Location: ./tech_forms.html?error=$output");
        exit();
    }

    if($count == 0)
    {
        try
        {
            $sql_call = "CALL attendence_stat('$weekNum')";
            $pdo->query($sql_call);
            $result = $pdo->query($sql_select);
        }
        catch(PDOException $e)
        {
            $output = $e->getMessage()  ;
            header("Location: ./tech_forms.html?error=$output");
            exit();
        }
    }
    
    $attendences = $result->fetchAll();
    $period = $attendences[0]['week_str'];
    $_SESSION['attendence'] = $attendences;
?>

