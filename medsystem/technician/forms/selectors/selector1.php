<?php

    include '../../../includes/dbconnect.php';

    try
    {
        $month = $_GET['val'];
        $sql = "select w_id, w_begin, w_end
                from weeks
                where month(w_begin)='$month' or month(w_end)='$month'";
        $result = $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = $e->getMessage();
        header("Location: $_SERVER[DOCUMENT_ROOT]/medsystem2/includes/error.php?error=$output");
        exit();
    }

    $weeks = $result->fetchAll();

?>

    <select name="selector2" required>
        <option disabled selected value="disabled">Период</option>
        <?php foreach($weeks as $week):?>
            <option value=<?php echo "$week[w_id]"; ?>>
                <?php echo "$week[w_begin] - $week[w_end]";?>
            </option>
        <?php endforeach;?>
    </select>
