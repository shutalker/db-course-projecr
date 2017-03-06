<?php
    $started = session_start();
    $user = "registrator";
    include '../includes/redirect_to_auth.php';

    if($_GET['mode'] == 'todoc')
        $include_file = 'reg_finish_to_doc.php'; 

    if($_GET['mode'] == 'ontime')
        $include_file = 'reg_finish_on_time.php'; 
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <title>Запись на приём</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="../styles/style.css">
        <script src="../scripts/selectorgenerator.js" defer></script>
        <script src="../scripts/tablegenerator.js" defer></script>
        <script src="../scripts/checkselectors.js" defer></script>
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
                                                    <a class="nav-btn block" href="./reg_registrate_continue.php?tooption=1">Регистрация на приём</a>
                                                </li>
                                                <li>
                                                    <a class="nav-btn block" href="./reg_registrate_continue.php?tomain=1">Главное меню</a>
                                                </li>
                                                <li>
                                                    <a class="nav-btn block" href="./reg_registrate_continue.php?out=1">Выход</a>
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
                    <?php include "$include_file";?>
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
