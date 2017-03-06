<?php
    $started = session_start();
    $user = "technician";
    include '../includes/redirect_to_auth.php';
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <title>Страница тех.сотрудника</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="../styles/style.css">
    </head>

    <body>
        <div class="global-wrapper">
            <div class="header-main-wrapper">
                <div class="header hf-bg brd">
                    <div class="positioner">
                        <div class="header-content clear">
                            <div class="header-content-left left-float">
                                <h2 class="hx">
				        		    Медицинская система <span class="version">v0.1 alfa</span>
				        	    </h2>
                            </div>
                            <div class="header-content-right right-float">
                                <div class="nav">
                                    <ul>
                                        <li>
                                            <span>&#8226&#8226&#8226</span>
                                            <ul class="hf-bg brd">
                                                <li>
                                                    <a class="nav-btn block" href="./tech_accounts_controller.php?tooption=1">Создание отчётов</a>
                                                </li>
                                                <li>
                                                    <a class="nav-btn block" href="./tech_accounts_controller.php?tomain=1">Главное меню</a>
                                                </li>
                                                <li>
                                                    <a class="nav-btn block" href="./tech_accounts_controller.php?out=1">Выход</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main">
                    <div class="main-content">
                        <?php
                            $count = $_GET['count']; 
                            $period = $_GET['period']; 
                            $attendences = $_SESSION['attendence'];
                        ?>
                        <div class="welcome-label">
				    	    <?php
                                if($count != 0)
				    		        echo "<h3 class='hx'>Отчёт уже создан!</h3>";
                                else
                                    echo "<h3 class='hx'>Отчёт успешно создан!</h3>";
				    	    ?>
				        </div>
                        <div class="main-content-center positioner nonoptlist">
                            <div class="content-window brd">
                                    <table class="account">
                                        <caption>
                                            Отчёт по посещаемости за
                                            <?php echo " $period:"; ?> 
                                        </caption>
                                        <tr>
                                            <td class="account-hdrs">
                                                Подразделение
                                            </td>
                                            <td class="account-hdrs">
                                                Количество специалистов
                                            </td>
                                            <td class="account-hdrs">
                                                Количество записавшихся на приём
                                            </td>
                                            <td class="account-hdrs">
                                                Количество посетивших приём
                                            </td>
                                            <td class="account-hdrs">
                                                Коэффициент посещаемости
                                            </td>
                                        </tr>
                                        <?php foreach($attendences as $attRow): ?>
                                        <tr>
                                            <td>
                                                <?php echo "$attRow[subd_name]"; ?>
                                            </td>
                                            <td>
                                                <?php echo "$attRow[subd_specs_amount]"; ?>
                                            </td>
                                            <td>
                                                <?php echo "$attRow[app_amount]"; ?>
                                            </td>
                                            <td>
                                                <?php echo "$attRow[att_amount]"; ?>
                                            </td>
                                            <td>
                                                <?php echo "$attRow[koeff]"; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer hf-bg brd">
            <div class="positioner">
                <div class="copyright clear">
                    <div class="bmstu">
                        <img src="../images/bmstu.png" alt="bmstu" width=80 height=100>                            
                    </div>
                    <div class="copyright-content">
                        <p>&#169 Шатунов А.Е.</p>
                        <p>Курсовая работа на тему: "Разработка информационной системы".</p>
                        <p>Выполнена под руководством к.т.н, доцента каф. РК6, Пивоваровой Н.В.</p>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </body>

</html>
