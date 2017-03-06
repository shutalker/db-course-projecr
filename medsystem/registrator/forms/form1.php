<?php
    include '../../includes/dbconnect.php';
    try
    {
        $sql = "select sub_id, sub_name
                from doctor_subdivision";
        $result = $pdo->query($sql);
    }
    catch(PDOException $e)
    {
        $output = $e->getMessage();
        header("Location: ./reg_forms.html?error=$output");
        exit();
    }
    $subdivs = $result->fetchAll();
?>

<div class="positioner">
    <div class="form-name">
        <p>Регистрация пациента на приём</p>
    </div>
    <form action="./reg_registrate_controller.php" onsubmit="return checkselector(this);" method="POST">
        <input type="hidden" name="formNum" value="1">
        <div class="form-input">
            <label for="pid">Введите id пациента:</label>
            <input id="pid" type="text" name="patId" pattern="^[0-9]+$" required>
        </div>
        <div class="form-input">
            <label for="subdName">Выберите подразделение:</label>
            <select id="subdName" onchange="createSelector(this, 1)" name="subd" required>
                <option disabled selected value="disabled">Подразделение</option>
                <?php foreach($subdivs as $subdiv):?>
                <option value=<?php echo "$subdiv[sub_id]";?>>
                    <?php echo "$subdiv[sub_name]";?>
                </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-buttons clear">
            <div class="clear-btn left-float">
                <input class="btn" type="reset" name="erase" value="Очистить">
            </div>
            <div class="submit-btn right-float">
                <input class="btn" type="submit" name="send" value="Далее">
            </div>
        </div>
    </form>
</div>
