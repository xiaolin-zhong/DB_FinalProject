<?php


$CONN= mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
//Select database:
$DB_SELECT = mysqli_select_db($CONN,'xz3343vc2124mka7840') or die(mysqli_error($db));
?>