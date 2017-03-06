<?php
    $weekNum = $_GET['val'] - 1;
    $year = getdate(strtotime(date('Y-m-d')))['year'];
    $delta = 0;
    $firstDayInJanuary = date_create_from_format('Y-m-d', date('Y-m-d', strtotime($year . '-01-01')));
    $structFirstDayInJanuary = getdate(strtotime(date_format($firstDayInJanuary, 'Y-m-d')));
    $dayInWeek = $structFirstDayInJanuary['wday'];

    while($dayInWeek <= 6)
    {
        date_modify($firstDayInJanuary, '+1 day');
        $dayInWeek++;
        $delta++;
    }

    if($weekNum == 0)
    {
        $firstDay = date_create_from_format('Y-m-d', date('Y-m-d', strtotime($year . '-01-01')));
    }
    else
    {
        $firstDay = date_create_from_format('Y-m-d', date('Y-m-d', ($weekNum - 1) * 7 * 86400 + ($delta + 1) * 86400 + strtotime($year . '-01-01')));
    }
    $lastDay = date_create_from_format('Y-m-d', date_format($firstDay, 'Y-m-d'));

    do
    {
        date_modify($lastDay, '+1 day');
        $structLastDay = getdate(strtotime(date_format($lastDay, 'Y-m-d')));
        $weekDayOfLastDay = $structLastDay['wday'];
        $yearOfLastDay = $structLastDay['year'];
        if($yearOfLastDay != $year) 
        {
            date_modify($lastDay, '-1 day');
            break;
        }
    }
    while($weekDayOfLastDay != 0);

    $days = array();

    while(strtotime(date_format($firstDay, 'Y-m-d')) <= strtotime(date_format($lastDay, 'Y-m-d')))
    {
        array_push($days, date_format($firstDay, 'Y-m-d'));
        date_modify($firstDay, '+1 day');
    }
    session_start(); 
    if(!isset($_SESSION['noTableShow']))
    {
        $flag = 1;
    }
    else
    {
        $flag = 0;
        unset($_SESSION['noTableShow']);
    }      
?>

    <select name="appDay" <?php if($flag){echo 'onchange="showTable(1, this);"';}?> required>
        <option disabled selected value="disabled">День недели:</option>
        <?php foreach($days as $day):?>
            <option value=<?php echo $day; ?>>
                <?php echo $day;?>
            </option>
        <?php endforeach;?>
    </select>
