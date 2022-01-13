<?php
    include "database_con.php";

    switch ($_POST['method']) {
        case 'add':
            $token = $_COOKIE['token'];
            $cards_list = $_POST['cards'];
            $adres = $_POST['adres'];
            $phone = $_POST['phone'];
            $cost = 0;
            $cards_array = explode("~", $cards_list);

            $token = mysqli_real_escape_string($con, $token);
            $cards_list = mysqli_real_escape_string($con, $cards_list);
            $adres = mysqli_real_escape_string($con, $adres);
            $phone = mysqli_real_escape_string($con, $phone);

            if (preg_match("/([%\$#\<>*=&?]+)/", $adres)) {
                echo 'Недопустимые символы в адресе!';
                exit;
            }
            if (preg_match("/([%\$#\<>*=&?]+)/", $phone)) {
                echo 'Недопустимые символы в телефоне!';
                exit;
            }
            if (preg_match("/([%\$#\<>*=&?]+)/", $cards_list)) {
                echo 'cards error!';
                exit;
            }

            if ($token && $cards_list && $adres && $phone) {
                for ($i=0; $i < count($cards_array); $i++) { 
                    $id = $cards_array[$i];
                    $card_get = mysqli_query($con, "SELECT `cost` FROM `cards` WHERE `id`=$id");
                    $card_fetch = mysqli_fetch_assoc($card_get);
                    $cost += $card_fetch['cost'];
                }
            
                $send = mysqli_query($con, "INSERT INTO `orders` (`token`, `products`, `phone`, `adres`, `cost`) VALUES ('$token', '$cards_list', '$phone', '$adres', '$cost')");
                if($send){
                    echo 'success';
                }else{
                    echo 'error';
                }
            }else{
                if(!$cards_list) {
                    echo 'добавьте товары!';
                }else{
                    echo 'заполните все поля!';
                }
            } 
            break;
        case 'del':
            $order_id = $_POST['id'];
            $order_info_get = mysqli_query($con, "SELECT * FROM `orders` WHERE `id`='$order_id'");
            $order = mysqli_fetch_assoc($order_info_get);
            if($order['token'] == $_COOKIE['token']){
                $del = mysqli_query($con, "DELETE FROM `orders` WHERE `id`='$order_id'");
                echo 'success';
            }else{
                echo 'error';
            }
            break;
        
    }

    
?>