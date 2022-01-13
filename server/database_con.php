<?php

    $ip = 'localhost';
    $name = 'root';
    $pass = '';
    $db = 'cards_shop';

    $con = mysqli_connect($ip, $name, $pass, $db);

    if ($con == false) {
        echo 'ошибка подключения к бд';
    }
    mysqli_set_charset($con, 'utf8');
?>