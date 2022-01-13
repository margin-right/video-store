<?php

    include 'database_con.php';

    $page = ($_POST['page'] - 1) * 5;
    $page = mysqli_real_escape_string($con, $page);
    $cards = array();
    $card_id = 0;

    if ($_POST['filters']) {
        include 'filters.php';
        
        $cards_get = mysqli_query($con, "SELECT * FROM `cards` WHERE `memValue` IN ('$memValue_list') AND `techprocess` IN ('$techprocess_list') AND `bus` IN ('$bus_list') AND `chipCompany` IN ('$chipCompany_list') AND `RTX` IN ('$RTX') AND `spec` IN ('$specialise') AND `cost` BETWEEN $min_cost AND $max_cost ORDER BY `id` LIMIT $page,5");
    }else{
        $cards_get = mysqli_query($con, "SELECT * FROM `cards` ORDER BY `id` LIMIT $page,5");
    }

    while($card = mysqli_fetch_assoc($cards_get)){
        $cards[$card_id] = $card;
        $card_id++;
    }
    echo json_encode($cards);
?>