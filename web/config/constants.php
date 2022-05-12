<?php

    //Start session
    session_start();

    define('SITEURL','http://localhost/6083_project/web/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'xz3343vc2124mka7840');
    //Execute query and save into database
    //Database connection:
    $CONN= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($db));
    //Select database:
    $DB_SELECT = mysqli_select_db($CONN, DB_NAME) or die(mysqli_error($db));
?>