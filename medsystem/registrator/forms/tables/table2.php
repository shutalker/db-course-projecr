<?php   
    $started = session_start(); 
    include '../../../includes/dbconnect.php';

    try
    {
        $doc = $_GET['val'];

        $sql = "select sub_name
                from doctor_subdivision
                where sub_id = '$_SESSION[subd_id]'";

        $result = $pdo->query($sql);
        $subd = $result->fetch();
        
        $sql = "select app_time t
                from appointment
                where doc_id = '$doc' and app_date = '$_SESSION[app_date]' and pat_id is null";

        $result = $pdo->query($sql);
        $count = $result->rowcount();
        $appointments = $result->fetchAll();
        
    }
    catch(PDOxception $e)
    {
        $output = $e->getMessage();
        header("Location: ./reg_registrate_finish.php?mode=ontime&error=$output");
        exit();
    }
?>

<div class="positioner">
    <table class="account">
        <caption>
            Расписание приёма. Подразделение:
            <?php echo " $subd[sub_name]"; ?> 
        </caption>
        <tr>
            <td class="account-hdrs">
                Время приёма
            </td>
        </tr>
        <?php if($count > 0):?>
            <?php foreach($appointments as $appointment):?>
                <tr>
                    <td>
                        <?php echo "$appointment[t]"; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php else:?>
            <tr>
                <td>
                    <?php echo "Выбрана прошедшая дата приёма!"; ?>
                </td>
            </tr>
        <?php endif;?>
    </table>
</div>
