<?php

    session_start();
    session_destroy();
    header('location:client_login.html');

?>