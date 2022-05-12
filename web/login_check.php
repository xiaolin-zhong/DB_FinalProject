<?php

    if(!isset($_SESSION['login'])) {
        $_SESSION['not_login'] = "Please login to access the admin panel.";
        header('location:'.SITEURL.'admin/login.php');
    }

?>