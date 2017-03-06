<?php
    try
    {
        $sql = "select pat_id
                from appointment
                where app_date = '$app_date' and app_time = '$app_time' and doc_id = '$d_id'";
        $result = $pdo->query($sql);
        $patient = $result->fetch();
    }
    catch(PDOException $e)
    {
        $output = $e->getMessage();
        header("Location: ./reg_registrate_finish.php?mode=$mode&error=$output");
        exit();
    }

    if(!is_null($patient['pat_id']))
    {
        header("Location: ./reg_registrate_finish.php?mode=$mode&already_exists=1");
        exit();
    }
?>
