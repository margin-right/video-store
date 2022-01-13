<?php

    include 'database_con.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    if (preg_match("/([%\$#\<>*=&?]+)/", $login)) {
        echo 'Недопустимые символы в логине!';
        exit;
    }
    if (preg_match("/([%\$#\<>*=&?]+)/", $password)) {
        echo 'Недопустимые символы в пароле!';
        exit;
    }

    $user_request = mysqli_query($con, "SELECT * FROM `users` WHERE `login` IN ('$login')");
    $user = mysqli_fetch_assoc($user_request);
    if(password_verify($password, $user['password'])){
        setcookie('token', $user['token'], time()+31536000, '/');
        echo 'success';
    }else{
        echo 'не верный логин или пароль';
    }

    
?>