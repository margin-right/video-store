<?php
    include 'database_con.php';

    if ($_POST['filters']) {
        include 'filters.php';
        
        $cards_get = mysqli_query($con, "SELECT count(*) FROM `cards` WHERE `memValue` IN ('$memValue_list') AND `techprocess` IN ('$techprocess_list') AND `bus` IN ('$bus_list') AND `chipCompany` IN ('$chipCompany_list') AND `RTX` IN ('$RTX') AND `spec` IN ('$specialise') AND `cost` BETWEEN $min_cost AND $max_cost");
    }else{
        $cards_get = mysqli_query($con, "SELECT count(*) FROM `cards`");
    }

    $cards_count = mysqli_fetch_row($cards_get);
    $pages_count = ceil($cards_count[0]/5);
    echo $pages_count;
?>