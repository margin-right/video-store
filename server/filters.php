<?php   
    $filters = $_POST['filters'];
    if ($filters['memVal'] != '') {
        $memValue_list = substr($filters['memVal'], 0 ,-3);
    }else{
        $memValue_list = "2','4','6','8";
    }
    if ($filters['techproc'] != '') {
        $techprocess_list = substr($filters['techproc'], 0 ,-3);
    }else{
        $techprocess_list = "7','8','12','28";
    }
    if ($filters['bus'] != '') {
        $bus_list = substr($filters['bus'], 0 ,-3);
    }else{
        $bus_list = "64','128','192','256";
    }
    if ($filters['chipCompany'] != '') {
        $chipCompany_list = substr($filters['chipCompany'], 0 ,-3);
    }else{
        $chipCompany_list = "AMD','Nvidia";
    }
    if ($filters['max_cost'] != '') {
        $max_cost = $filters['max_cost'];
    }else{
        $max_cost = 9999999;
    }
    if ($filters['min_cost'] != '') {
        $min_cost = $filters['min_cost'];
    }else{
        $min_cost = 0;
    }
    if ($filters['rtx'] != '') {
        $RTX = substr($filters['rtx'], 0 ,-3);
    }else{
        $RTX = "да','нет";
    }
    if ($filters['specialise'] != '') {
        $specialise = substr($filters['specialise'], 0 ,-3);
    }else{
        $specialise = "for-game','for-office','prof";
    }

?>