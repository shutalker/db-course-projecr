<?php
    if(!isset($_SESSION['username']) || ($user != "all" && $_SESSION['username'] != $user))
    {
        session_unset();
        session_destroy();
        header("Location: http://$_SERVER[SERVER_NAME]/medsystem/includes/redirect_error.html");
        exit();
    }
?>
