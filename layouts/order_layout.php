<div id = 'order-wrapper'>
    <h1 class='order-h'>Информация о заказе</h1>
    <div class='products-list'>
        <div id="cart-list-wrapper">
            <div id="cart-list" style="padding:0">
                <?php 
                    $order_id = $_GET['id'];
                    $order_info_get = mysqli_query($con, "SELECT * FROM `orders` WHERE `id`='$order_id'");
                    $order = mysqli_fetch_assoc($order_info_get);
                    $cards_id_arr = explode('~', $order['products']);
                    $cards_id_list = '';
                    for ($i=0; $i < count($cards_id_arr); $i++) { 
                        $cards_id_list = $cards_id_list."','".$cards_id_arr[$i];
                    }
                    $cart_items_get = mysqli_query($con, "SELECT * FROM `cards` WHERE `id` IN ('$cards_id_list')");
                    while($cart_list = mysqli_fetch_assoc($cart_items_get)){
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
    <p id="order-sum">Сумма: <span id="cart-cost"><?php echo $order['cost']?></span> ₽</p>
    <h1 class='order-h'>Контактные данные</h1>
    <div class="person-info-block person-info-ordered">
        <h3>Номер телефона:</h2>
        <div id="phone-block"><span id="phone-span">+7<?php echo $order['phone'];?></div>
        <h3>Адрес:</h2>
        <p><?php echo $order['adres'];?></p>
    </div>
    <button class="in-cart-button" onclick="order_del(<?php echo $order['id'];?>)">Отменить</button>
    <p id='error-block' style="margin-left:30px"></p>
</div>