<?php
    include 'database_con.php';
    $id = $_POST['card_id'];
    $token = $_COOKIE['token'];
    
    $token = mysqli_real_escape_string($con, $token);
    if (preg_match("/[^0-9]/", $id)) {
        exit;
    }
    $user_cart_get = mysqli_query($con, "SELECT `cart` FROM `users` WHERE token='$token'");
    $user_cart = mysqli_fetch_assoc($user_cart_get);
    $cards_id_list = '';
    $cart_for_update = '';
    switch ($_POST['function']) {
        case 'add':
            $new_cart = $user_cart['cart']."~".$id;
            $cards_id_arr = explode('~', $new_cart);
            
            for ($i=0; $i < count($cards_id_arr); $i++) { 
                $cards_id_list = $cards_id_list."','".$cards_id_arr[$i];
                if($cards_id_arr[$i] != $id && $cards_id_arr[$i] != ''){
                    $cart_for_update = $cart_for_update.$cards_id_arr[$i]."~";
                }
            }
            $cart_for_update = $cart_for_update.$id;
            break;
        case 'del':
            $cards_id_arr = explode('~', $user_cart['cart']);
            $cards_id_list = '';
            $cart_for_update = '';
            for ($i=0; $i < count($cards_id_arr); $i++){ 
                if($cards_id_arr[$i] != $id && $cards_id_arr[$i] != ''){
                    $cards_id_list = $cards_id_list.$cards_id_arr[$i]."','";
                    $cart_for_update = $cart_for_update.$cards_id_arr[$i]."~";
                }
            }
            break;
    };

    $cart_send = mysqli_query($con, "UPDATE `users` SET `cart`='$cart_for_update' WHERE `token`='$token'");
    $cards = array();
    $card_id = 0;
    $cards_get = mysqli_query($con, "SELECT * FROM `cards` WHERE `id` IN ('$cards_id_list')");
    while($card = mysqli_fetch_assoc($cards_get)){
        $cards[$card_id] = $card;
        $card_id++;
    }
    echo json_encode($cards);

    
?>