<?php

    include '../../../includes/dbconnect.php';

    try
    {
        $monthNum = $_GET['val'];
        $sql = "select w_id, w_begin, w_end
                from weeks
                where month(w_begin) = '$monthNum' or month(w_end) = '$monthNum'";
        $result = $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = "Ошибка выполнения запроса: ".$e->getMessage();
        header("Location: ./reg_registrate_finish.php?mode=todoc&error='$output'");
        exit();
    }

    $weeks = $result->fetchAll();
?>

    <select  name="appMonthPeriod" onchange="createSelector(this, 3);" required>
        <option disabled selected value="disabled">Неделя:</option>
        <?php foreach($weeks as $week):?>
            <option value=<?php echo "$week[w_id]"; ?>>
                <?php echo "$week[w_begin] - $week[w_end]";?>
            </option>
        <?php endforeach;?>
    </select>
