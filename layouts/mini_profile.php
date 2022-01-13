<div id = "reg-form">
    <div id = "profile-h"><p>Профиль: <span><?php echo $user_result['login'];?></span></p><button id = 'logout-btn' onclick='logout()'>выйти</button></div>
    
    <div onclick = 'window_close("profile-wrapper")'>
        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="close-icon" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </div>
    <p class="cart-head" style="width:100%;margin-left:80px">Заказы:</p>
    <div id="cart-list-wrapper" style="height:300px">
        <div id="orders-list" style="padding:0">
            <?php 
                $token = $user_result['token'];
                $orders_items_get = mysqli_query($con, "SELECT * FROM `orders` WHERE `token` IN ('$token')");
                while($orders_list = mysqli_fetch_assoc($orders_items_get)){
                    echo '
                    <div class="cart-item order-item">
                    <img class="order-img" height="100%" src="/content/order-wait.png">
                    <div class="cart-item-info-block">
                        <p class="cart-item-name">Номер заказа: '.$orders_list['id'].'</p>
                        <p class="cart-item-cost">Финальная стоимость: <span>'.$orders_list['cost'].'</span> ₽</p>
                    </div>
                    <a id = "logout-btn" class="del-item" href = "/order-info?id='.$orders_list['id'].'">подробнее</a>
                    </div>
                    ';
                };
            ?>
        </div>
    </div>
      
</div>