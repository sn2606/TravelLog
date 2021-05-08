<?php
    require_once "functions.php";
    // destroy all sessions
    session_destroy();
    redirect_to("/index.html");