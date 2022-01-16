<?php
    include 'database_con.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    if (preg_match("/([%\$#\<>*=&?]+)/", $login)) {
        echo 'Недопустимые символы в логине!';
        exit;
    }
    if (preg_match("/([%\$#\<>*=&?]+)/", $password)) {
        echo 'Недопустимые символы в пароле!';
        exit;
    }
    if (strlen($login) >16) {
        echo 'Слишком длинный логин, максимум 16 символов!';
        exit;
    }
    if (strlen($login) < 5) {
        echo 'Слишком короткий логин, минимум 5 символов!';
        exit;
    }
    if (strlen($password) > 32) {
        echo 'Слишком длинный пароль, максимум 32 символа!';
        exit;
    }
    if (strlen($password) < 6) {
        echo 'Слишком короткий пароль, минимум 6 символов!';
        exit;
    }
    $user_check = mysqli_query($con, "SELECT `login` FROM `users` WHERE `login`='$login'");
    if (mysqli_fetch_assoc($user_check)) {
        echo 'Логин уже занят!';
        exit;
    }

    $login = mysqli_real_escape_string($con, $login);
    $password = mysqli_real_escape_string($con, $password);
    $password_h = password_hash($password, PASSWORD_DEFAULT);
    $token = hash('ripemd160',substr(str_shuffle($chars),0,32));

    $send = mysqli_query($con, "INSERT INTO `users` (`login`, `password`, `token`, `cart`) VALUES ('$login', '$password_h', '$token', '')");
    setcookie('token', $token, time()+31536000, '/');
    echo 'success';

?>