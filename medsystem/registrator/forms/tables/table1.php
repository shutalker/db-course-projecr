<?php
    $started = session_start();
    include '../../../includes/dbconnect.php';
    try
    {
        $rowsNum = -1;
        $pastDate = 0;
        $appDate = $_GET['val'];
        if(strtotime($appDate) < strtotime(date('Y-m-d')))
        {
            $pastDate = 1;
        }
        else
        {
            $sql = "select app_date d, app_time t
                    from appointment
                    where doc_id = '$_SESSION[d_id]' and date(app_date) = '$appDate'
                    and pat_id is null";

            $result = $pdo->query($sql);
            $rowsNum = $result->rowcount();
            $appDates = $result->fetchAll();

        }
        $sql = "select doc_name
                from doctor
                where doc_id = '$_SESSION[d_id]'";

        $result = $pdo->query($sql);
        $doc = $result->fetch();
    }
    catch(PDOxception $e)
    {
        $output = $e->getMessage();
        header("Location: ./reg_registrate_finish.php?mode=todoc&error=$output");
        exit();
    }
?>

<div class="positioner">
    <table class="account">
        <caption>
            Расписание приёма. Врач:
            <?php echo " $doc[doc_name]"; ?> 
        </caption>
        <tr>
            <td class="account-hdrs">
                День приёма 
            </td>
            <td class="account-hdrs">
                Время приёма
            </td>
        </tr>
        <?php if($pastDate == 1):?>
            <tr>
                <td colspan="2">Выбрана прошедшая дата</td>
            </tr>
        <?php elseif($rowsNum == 0):?>
            <tr>
                <td colspan="2">Нет достуных записей на приём</td>
            </tr>
        <?php else:?>
            <?php foreach($appDates as $appDate):?>
                <tr>
                    <td>
                        <?php echo "$appDate[d]"; ?>
                    </td>
                    <td>
                        <?php echo "$appDate[t]"; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
    </table>
</div>
