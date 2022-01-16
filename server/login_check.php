<?php
    if ($_COOKIE['token']) {
        $token = $_COOKIE['token'];
        if (preg_match("/([\\<$#%>*.!=]+)/", $token)) {
            exit;
        }
        $valid_token_check = mysqli_query($con, "SELECT * FROM `users` WHERE token='$token'");
        $user_result = mysqli_fetch_assoc($valid_token_check);
        if ($user_result){
            $login_status = true;
        }
        else{
            $login_status = false;
        }
    }else{
        $login_status = false;
    }
?>