<?php
    $started = session_start();
    $user = "all";
    include '../includes/redirect_to_auth.php';

    $user = $_SESSION['username'];
    
    switch($user)
    {
        case 'registrator': $name = 'регистратор';
                            break;

        case 'technician':  $name = 'технический сотрдник';
                            break;

        default: $name = 'пользователь';
                 break;
    }
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <title>Главное меню</title>
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
                                                    <a class="nav-btn nav-btn-only block" href="index.php?out=1">Выход</a>
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
                        <div class="welcome-label">
				    	    <?php
				    		    echo "<h3 class='hx'>Добро пожаловать, $name!</h3>";
				    	    ?>
				        </div>
                        <div class="main-content-center positioner">
                            <div class="content-window brd">
                                <div class="option-list">
                                    <ul id="optList">
                                        <?php if($user == 'registrator'):?>
                                            <?php include 'reg_menu.php'?>
                                        <?php endif;?>
                                        <?php if($user == 'technician'):?>
                                            <?php include 'tech_menu.php'?>
                                        <?php endif;?>
                                    </ul>
                                </div>
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
