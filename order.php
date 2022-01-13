<?php 
    include "server/database_con.php";
    include "server/login_check.php";
    $card_name = trim($_GET['id']);
    $cards_get = mysqli_query($con, "SELECT * FROM `cards` WHERE `linkName` IN ('$card_name')");
    $card = mysqli_fetch_assoc($cards_get);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/slider.css">
    <link rel="stylesheet" href="/styles/reg.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/order.css">
    <link rel="shortcut icon" href="/content/favicon.png" type="image/png">
    <script src="/scripts/jquery-3.6.0.min.js?antirtk=on"></script>
    <script src="/scripts/cookie_jquery.js?antirtk=on"></script>
    <title>Оформление заказа | VideoHall | Магазин видеоадаптеров</title>
</head>
<body>
    <div class="front-window" id="profile-wrapper">
        <?php
            if($login_status == true){
                include 'layouts/mini_profile.php';
            }else{
                include 'layouts/login_form.php';
            }
        ?>
    </div>
    <?php
        if($login_status == true){
            include 'layouts/cart.php';
        }
    ?>
    <header id="head">
        <div id = 'head-content'>
            <a href='/' id="logo-block">
                <img src="/content/logo.svg" id = 'logo'>
                <p class="top-name" id='full-name'>VideoHall</p>
                <p class="top-name" id='short-name'>VH</p>
            </a>
            <div id = 'navigate-block'>
                <a class="header-btn" href = '/catalog'>
                    <p class = 'menu-text'>Каталог</p>
                </a>
                <?php
                    if($login_status == true){
                        echo '
                        <div class="header-btn" id = "cart-open" onclick = "open_cart()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon" viewBox="0 0 16 16">
                                <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                            </svg>
                        </div>
                        ';
                    }
                ?>
                <div class="header-btn" id = "profile-open" onclick = 'open_profile()'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="black" class="icon" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </div>
            </div>    
        </div>
    </header>
    <div id = 'order-wrapper'>
        <h1 class='order-h'>Оформление заказа</h1>
        <div class='products-list'>
            <div id="cart-list-wrapper">
                <div id="cart-list" style="padding:0">
                    <?php 
                        $cards_id_arr = explode('~', $user_result['cart']);
                        $cards_id_list = '';
                        for ($i=0; $i < count($cards_id_arr); $i++) { 
                            $cards_id_list = $cards_id_list."','".$cards_id_arr[$i];
                        }
                        $cart_items_get = mysqli_query($con, "SELECT * FROM `cards` WHERE `id` IN ('$cards_id_list')");
                        $total_cost = 0;
                        while($cart_list = mysqli_fetch_assoc($cart_items_get)){
                            $total_cost += $cart_list['cost'];
                            echo '
                            <div class="cart-item order-item">
                            <img class="cart-img" height="100%" src="/content/cards/'.$cart_list['img'].'/icon.png">
                            <div class="cart-item-info-block">
                                <p class="cart-item-name">'.$cart_list['name'].'</p>
                                <p class="cart-item-cost">Цена: <span>'.$cart_list['cost'].'</span> ₽</p>
                            </div>
                            </div>
                            ';
                        };
                    ?>
                </div>
            </div>
        </div>
        <script>let cards_list = '<?php echo $user_result['cart'];?>';</script>
        <p id="order-sum">Сумма: <span id="cart-cost"><?php echo $total_cost;?></span> ₽</p>
        <h1 class='order-h'>Контактные данные</h1>
        <div class="person-info-block">
            <div id="phone-block"><span id="phone-span">+7</span><input type="text" placeholder="Номер телефона" class="person-input" maxlength="10" id="phone-input"></div><input type="text" placeholder="Полный адрес" class="person-input" id="adres-input">
        </div>
        <button class="in-cart-button" onclick="order_add()">Заказать</button>
        <p id='error-block' style="margin-left:30px"></p>
    </div>
    <footer>

    </footer>
    <script src="/scripts/public_script.js?antirtk=on"></script>
    <script src="/scripts/order.js?antirtk=on"></script>
</body>
</html>
