<!DOCTYPE html>
<html lang="ru">

    <head>
        <title>Вход в систему</title>
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
                        </div>
                    </div>
                </div>
                <div class="main">
                    <div class="main-content">
                        <div class="welcome-label">
                            <h3 class='hx'>Вход в систему</h3>
				        </div>
                        <?php if(isset($_GET['err'])):?>
                                <div class="content-window brd error">
                                    <p><?php echo "Ошибка! $_GET[err]";?></p>
                                </div>
                        <?php endif;?>
                        <div class="main-content-center positioner">
                            <div class="content-window brd form login">
                                <div class="positioner">
                                    <form action="index.php" method="POST">
                                        <div class="form-input">
                                            <label for="log">Логин:</label>
                                            <input id="log" type="text" name="username" required>
                                        </div>
                                        <div class="form-input">
                                            <label for="pswd">Пароль:</label>
                                            <input id="pswd" type="password" name="passwd" required>
                                        </div>
                                        <div class="form-buttons clear">
                                            <div class="submit-btn right-float">
                                                <input id="loginBtn" class="btn" type="submit" name="login" value="Вход">
                                            </div>
                                        </div>
                                    </form>
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
