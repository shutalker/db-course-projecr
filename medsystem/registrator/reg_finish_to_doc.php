<?php
    $started = session_start();
    $user = "registrator";
    include '../includes/redirect_to_auth.php';

    $count = 1;
    $months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", 
                    "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
    $hour = 8;
    $minutes = array(0, 15, 30, 45);
    $dayNum = 0;

?> 

<div class="main-content clear">
    <div class="welcome-label">
        <h3 class='hx'>Регистрация пациента к врачу</h3>
    </div>
    <?php if(isset($_GET['error'])):?>
        <div class="content-window brd error">
            <p>Ошибка: <?php echo $_GET['error'];?></p>
        </div>
    <?php endif;?>
    <div class="main-content-left left-float">
        <div class="content-window brd">
            <div class="positioner">
                <div class="form-name">
                    <p>Укажите дату и время приёма:</p>
                </div>
                <form action="./reg_registrate_continue.php?mode=todoc" onsubmit="return checkselector(this);" method="POST">
                    <div class="form-input clear">
                        <label for="appDateSelect">Укажите дату:</label>
                        <select id="appDateSelect" class="left-float" name="appMonth" onchange="createSelector(this, 2);" value="disabled" required>
                            <option disabled selected value="disabled">Месяц</option>
                                <?php foreach($months as $month):?>
                                    <option value=<?php echo "$count";?>>
                                        <?php echo "$month";?>
                                    </option>
                                <?php $count++; endforeach;?>
                        </select>
                    </div>
                    <div class="form-input date-input app-date-input clear">
                        <label for="appTimeSelect">Укажите время:</label>
                        <select id="appTimeSelect" class="left-float" name="appHour" required>
                            <option disabled selected value="disabled">Часы</option>
                                <?php for($hour; $hour < 21; $hour++):?>
                                    <option value=<?php echo "$hour";?>>
                                        <?php echo "$hour";?>
                                    </option>
                                <?php endfor;?>
                        </select>
                        <select class="right-float" name="appMinute" required>
                            <option disabled selected value="disabled" >Минуты</option>
                                <?php foreach($minutes as $minute):?>
                                    <option value=<?php echo "$minute";?>>
                                        <?php echo "$minute";?>
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
                <?php if(isset($_GET['success']) && $_GET['success'] == 1):?>
                    <p class="message">Пациент успешно зарегестрирован на приём!</p>
                <?php endif;?>
                <?php if(isset($_GET['already_exists']) && $_GET['already_exists'] == 1):?>
                    <p class="message">На выбранное время уже назначен другой приём!</p>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div id="formWindow" class="main-content-right right-float">
    </div>
</div>
