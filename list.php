<?php 
    include "server/database_con.php";
    include "server/login_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/slider.css">
    <link rel="stylesheet" href="/styles/reg.css">
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="/styles/catalog.css">
    <link rel="stylesheet" href="/styles/main_style.css">
    <link rel="stylesheet" media="(max-width: 1210px)" href="/styles/catalog_mobile.css">
    <link rel="shortcut icon" href="content/favicon.png" type="image/png">
    <script src="/scripts/jquery-3.6.0.min.js?antirtk=on"></script>
    <script src="/scripts/cookie_jquery.js?antirtk=on"></script>
    <title>Каталог | VideoHall | Магазин видеоадаптеров</title>
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
                <img src="content/logo.svg" id = 'logo'>
                <p class="top-name" id='full-name'>VideoHall</p>
                <p class="top-name" id='short-name'>VH</p>
            </a>
            <div id = 'navigate-block'>
                <div class="header-btn" id = 'filters-show-button'>
                    <p class = 'menu-text'>Фильтры</p>
                </div>
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
    <div id = 'catalog-wrapper'>
        <div class="first-block">
            <div id="filter-menu">
                <div class = 'filter-block'>
                    <p class = "filter-name">Цена:</p>
                    <div class="price-filter-inputs-block">
                        <input type="number" class="price-filter-input" placeholder = "от"> - <input type="number" class="price-filter-input" placeholder = "до"> ₽
                    </div>
                </div>
                <div class = 'filter-block'>
                    <p class = "filter-name">Производитель видеопроцессора:</p>
                    <div class="checkbox-list">
                        <label class = "checkbox-block" for="AMD">
                            <input id='AMD' type="checkbox" class="filter-checkbox"><span>AMD</span>
                        </label>
                        <label class = "checkbox-block" for="Nvidia">
                            <input id='Nvidia' type="checkbox" class="filter-checkbox"><span>Nvidia</span>
                        </label>                     
                    </div>
                </div>
                <div class = 'filter-block'>
                    <p class = "filter-name">Техпроцесс:</p>
                    <div class="checkbox-list">
                        <label class = "checkbox-block" for="7nm">
                            <input id='7nm' type="checkbox" class="filter-checkbox"><span>7 нанометров</span>
                        </label>
                        <label class = "checkbox-block" for="8nm">
                            <input id='8nm' type="checkbox" class="filter-checkbox"><span> 8 нанометров</span>
                        </label>
                        <label class = "checkbox-block" for="12nm">
                            <input id='12nm' type="checkbox" class="filter-checkbox"><span> 12 нанометров</span>
                        </label>
                        <label class = "checkbox-block" for="28nm">
                            <input id='28nm' type="checkbox" class="filter-checkbox"><span> 28 нанометров</span>
                        </label>                      
                    </div>
                </div>
                <div class = 'filter-block'>
                    <p class = "filter-name">Объем видеопамяти:</p>
                    <div class="checkbox-list">
                        <label class = "checkbox-block" for="2gb">
                            <input id='2gb' type="checkbox" class="filter-checkbox"><span>2 ГБ</span>
                        </label>
                        <label class = "checkbox-block" for="4gb">
                            <input id='4gb' type="checkbox" class="filter-checkbox"><span> 4 ГБ</span>
                        </label>
                        <label class = "checkbox-block" for="6gb">
                            <input id='6gb' type="checkbox" class="filter-checkbox"><span>6 ГБ</span>
                        </label>    
                        <label class = "checkbox-block" for="8gb">
                            <input id='8gb' type="checkbox" class="filter-checkbox"><span>8 ГБ</span>
                        </label>                      
                    </div>
                </div>
                <div class = 'filter-block'>
                    <p class = "filter-name">Разрядность шины памяти:</p>
                    <div class="checkbox-list">
                        <label class = "checkbox-block" for="bus64">
                            <input id='bus64' type="checkbox" class="filter-checkbox"><span>64 бит</span>
                        </label>    
                        <label class = "checkbox-block" for="bus128">
                            <input id='bus128' type="checkbox" class="filter-checkbox"><span>128 бит</span>
                        </label>
                        <label class = "checkbox-block" for="bus192">
                            <input id='bus192' type="checkbox" class="filter-checkbox"><span> 192 бит</span>
                        </label>
                        <label class = "checkbox-block" for="bus256">
                            <input id='bus256' type="checkbox" class="filter-checkbox"><span>256 бит</span>
                        </label>                      
                    </div>
                </div>
                <div class = 'filter-block'>
                    <p class = "filter-name">Поддержка трассировки лучей:</p>
                    <div class="checkbox-list">
                        <label class = "checkbox-block" for="RTXon">
                            <input id='RTXon' type="checkbox" class="filter-checkbox"><span>да</span>
                        </label>    
                        <label class = "checkbox-block" for="RTXoff">
                            <input id='RTXoff' type="checkbox" class="filter-checkbox"><span>нет</span>
                        </label>                  
                    </div>
                </div>
                <div class = 'filter-block'>
                    <p class = "filter-name">Область применения:</p>
                    <div class="checkbox-list">
                        <label class = "checkbox-block" for="for-game">
                            <input id='for-game' type="checkbox" class="filter-checkbox"><span>Игровая</span>
                        </label>    
                        <label class = "checkbox-block" for="for-office">
                            <input id='for-office' type="checkbox" class="filter-checkbox"><span>Для офиса</span>
                        </label>     
                        <label class = "checkbox-block" for="prof">
                            <input id='prof' type="checkbox" class="filter-checkbox"><span>Профессиональная</span>
                        </label>                
                    </div>
                </div>
                <button id = "filters-submit" onclick = "filter_data_constructor()">Применить</button>
            </div>
            <?php 
                if ($_GET['filter_id']) {
                    echo "
                        <script>
                            document.getElementById('".$_GET['filter_id']."').checked = true;
                        </script>
                    ";
                }
            ?>
            
            <div id = "product-list">
                <div id='not-found'>
                    <img id="not-found-img" src="content/product_not_found.png">
                    <p>По выбранным фильтрам ничего не найдено</p>
                </div>
                <div id="list-content">
                
                <?php
                    
                    $cards_get = mysqli_query($con, "SELECT * FROM `cards` ORDER BY `id` LIMIT 0,5");  
                    $cards_count_get = mysqli_query($con, "SELECT count(*) FROM `cards`");  

                    
                    
                    while($card = mysqli_fetch_assoc($cards_get)){
                        echo '
                        <div class="product-item">
                        <img class ="product-icon" src="/content/cards/'.$card['img'].'/icon.png">
                        <div class = "product-info">
                            <a class = "product-link" href="/catalog/'.$card['linkName'].'"><h1 class = "product-name">'.$card['name'].'</h1></a>
                            <div class="short-description">
                                <p class="process-inf">Техпроцесс: '.$card['techprocess'].' нм</p>
                                <p class="mhz-inf">Частота работы видеочипа: '.$card['minMHZ'].'-'.$card['maxMHZ'].' МГц</p>
                                <p class="mem-inf">Видеопамять: '.$card['memValue'].' ГБ</p>
                                <p class="bus-inf">Шина памяти: '.$card['bus'].' бит</p>
                            </div>
                            <div class = "price-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="price-info-icon" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                <span>'.$card['cost'].'</span> ₽
                                
                            </div>
                            <div class="more-info-block"><p class = "price-text">Розничная цена</p></div>
                            <button class="in-cart-button" onclick="cart_change('.$card['id'].',"add")">В корзину</button>
                        </div>
                        </div>
                        ';
                    }
                ?>
                </div>
                <div id="pages-list">
                    <?php
                        $cards_count = mysqli_fetch_row($cards_count_get);
                        $pages_count = ceil($cards_count[0]/5);
                        for ($i=1; $i <= $pages_count; $i++) { 
                            echo "<a class = 'page-num' href='#' onclick = 'loadpage(".$i.", global_filters)'>".$i."</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <footer>

    </footer>
    <script src="/scripts/public_script.js?antirtk=on"></script>
    <script src="/scripts/catalog.js?antirtk=on"></script>
    <script src="/scripts/main_script.js?antirtk=on"></script>
</body>
</html>
