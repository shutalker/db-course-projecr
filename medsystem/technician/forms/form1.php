<?php
    
    $count = 1;
    $months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", 
                    "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
?>

<div class="positioner">
    <div class="form-name">
        <p>Отчёт по посещаемости</p>
    </div>
    <form action="./tech_accounts_controller.php" onsubmit="return checkselector(this);" method="POST">
        <input type="hidden" name="formNum" value="1">
        <div class="form-input">
            <label for="s1">Выберите период, за который создаётся отчет:</label>
            <select id="s1" onchange="createSelector(this, 1)" required>
                <option disabled selected value="disabled">Месяц</option>
                <?php foreach($months as $month):?>
                <option value=<?php echo "$count"; ?>>
                     <?php echo "$month";?>
                </option>
                <?php $count++; ?>
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
