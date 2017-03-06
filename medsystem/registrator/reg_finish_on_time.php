<?php
    $started = session_start();
    $user = "registrator";
    include '../includes/redirect_to_auth.php';

    include '../includes/dbconnect.php';

    try
    {
        $sql = "select doc_id, doc_name
                from doctor
                where sub_id = '$_SESSION[subd_id]' and fire_date is null";

        $result = $pdo->query($sql);
        $docs = $result->fetchAll();
    }
    catch(PDOxception $e)
    {
        $output = $e->getMessage();
        header("Location: ./reg_registrate_finish.php?mode=ontime&error=$output");
        exit();
    }
    
    $hour = 8;
    $minutes = array(0, 15, 30, 45);
    $dayNum = 0;
?> 

<div class="main-content clear">
    <div class="welcome-label">
        <h3 class='hx'>Регистрация пациента на удобное время</h3>
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
                    <p>Выберите врача для записи на приём и время приёма:</p>
                </div>
                <form action="./reg_registrate_continue.php?mode=ontime" onsubmit="return checkselector(this);" method="POST">
                    <div class="form-input clear">
                        <label for="appDocSelect">Выберите врача:</label>
                        <select id="appDocSelect" name="appDoc" onchange="showTable(2, this);" required>
                            <option disabled selected value="disabled">Врач</option>
                                <?php foreach($docs as $doc):?>
                                    <option value=<?php echo "$doc[doc_id]"; ?>>
                                        <?php echo "$doc[doc_name]";?>
                                    </option>
                                <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-input date-input app-date-input clear">
                        <label for="appTimeSelect">Укажите время:</label>
                        <select class="left-float" id="appTimeSelect" name="appHour" required>
                            <option disabled selected value="disabled">Часы</option>
                                <?php for($hour; $hour < 21; $hour++):?>
                                    <option value=<?php echo "$hour"; ?>>
                                        <?php echo "$hour";?>
                                    </option>
                                <?php endfor;?>
                        </select>
                        <select class="right-float" id="appTimeSelect" name="appMinute" required>
                            <option disabled selected value="disabled">Минуты</option>
                                <?php foreach($minutes as $minute):?>
                                    <option value=<?php echo "$minute"; ?>>
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
