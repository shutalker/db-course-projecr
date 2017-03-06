<?php

    include '../../../includes/dbconnect.php';

    try
    {
        $subId = $_GET['val'];
        $sql = "select doc_id, doc_name
                from doctor
                where sub_id = '$subId'";
        $result = $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = "Ошибка выполнения запроса: ".$e->getMessage();
        header("Location: ./reg_registrate_controller.php?error='$output'");
        exit();
    }

    $docs = $result->fetchAll();

?>

    <select id="doc" name="docSelector" required>
        <option disabled selected value="disabled">Ф.И.О. врача</option>
        <?php foreach($docs as $doc):?>
            <option value=<?php echo "$doc[doc_id]"; ?>>
                <?php echo "$doc[doc_name]";?>
            </option>
        <?php endforeach;?>
    </select>
