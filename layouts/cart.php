<div class="front-window" id="cart-wrapper">
    <div id="cart-block">
        <p class="cart-head">Корзина:</p>
        <div onclick = 'window_close("cart-wrapper")'>
            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="close-icon" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </div>
        <div id="cart-list-wrapper">
            <div id="cart-list">
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
                        <div class="cart-item">
                        <img class="cart-img" height="100%" src="/content/cards/'.$cart_list['img'].'/icon.png">
                        <div class="cart-item-info-block">
                            <p class="cart-item-name">'.$cart_list['name'].'</p>
                            <p class="cart-item-cost">Цена: <span>'.$cart_list['cost'].'</span> ₽</p>
                        </div>
                        <button id = "logout-btn" class="del-item" onclick="cart_change('.$cart_list['id'].',`del`)">удалить</button>
                        </div>
                        ';
                    };
                ?>
            </div>
        </div>
        <div id="cart-footer">
            <p id="cart-sum">Сумма: <span id="cart-cost"><?php echo $total_cost;?></span> ₽</p>
            <a id = "logout-btn" class="del-item" href="/order" style="bottom:10px">заказать</a>
        </div>
    </div>
</div>