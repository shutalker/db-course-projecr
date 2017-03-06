<?php
    $started = session_start();
    $user = "technician";
    include '../includes/redirect_to_auth.php';
?>

<!DOCTYPE html>
<html lang="ru">

    <head>
        <title>Запись на приём</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="../styles/style.css">
        <script src="../scripts/formgenerator.js" defer></script>
        <script src="../scripts/selectorgenerator.js" defer></script>
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
                    <div class="main-content clear">
                        <div class="welcome-label">
				            <h3 class='hx'>Создание отчётов</h3>
				        </div>
                        <div class="main-content-left left-float">
                            <div class="content-window brd">
                                <div class="option-list">
                                    <ul id="optList">
                                        <li>
                                            <span id="1" class="btn opt-btn">Отчёт по посещаемости</span>
                                        </li>
                                        <li>
                                            <span id="2" class="btn">Другой отчет</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="formWindow" class="main-content-right right-float">
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
