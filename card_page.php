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
    <link rel="stylesheet" href="/styles/main_style.css">
    <link rel="stylesheet" href="/styles/product_page.css">
    <link rel="shortcut icon" href="/content/favicon.png" type="image/png">
    <script src="/scripts/jquery-3.6.0.min.js?antirtk=on"></script>
    <script src="/scripts/cookie_jquery.js?antirtk=on"></script>
    <title><?php echo $card['name'];?> | VideoHall | Магазин видеоадаптеров</title>
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
    <div id = 'product-wrapper'>
        <div class = 'main-block'>
            <div id="slider-wrap">
                <div class= 'slider-nav' id = 'slider-nav-left' onclick = 'prev_slide()'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="left-icon" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                    </svg>
                </div>
                <div class= 'slider-nav' id = 'slider-nav-right' onclick = 'next_slide()'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="right-icon" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                </div>
                <div id="slider">
                    <div class="slide-item">
                        <img class="slide-img" src="/content/cards/<?php echo $card['img']?>/slide3.png">   
                    </div>
                    <div class="slide-item">
                        <img class="slide-img" src="/content/cards/<?php echo $card['img']?>/icon.png">
                    </div>
                    <div class="slide-item">
                        <img class="slide-img" src="/content/cards/<?php echo $card['img']?>/slide2.png">
                    </div>
                    <div class="slide-item">
                        <img class="slide-img" src="/content/cards/<?php echo $card['img']?>/slide3.png">     
                    </div>
                    <div class="slide-item">
                        <img class="slide-img" src="/content/cards/<?php echo $card['img']?>/icon.png"> 
                    </div>
                </div>
            </div>
            <div class="right-info">
                <p class='card-name'><?php echo $card['name'];?></p>
                <p>Цена: <span style='font-weight:600'><?php echo $card['cost'];?> ₽</span> / шт.</p>
                <p>Наличие на складе: <span style='font-weight:600'><?php echo $card['stock'];?></span></p>
                <p>Гарантия: <span style='font-weight:600'><?php echo $card['garant'];?></span> мес.</p>
                <button class="in-cart-button" <?php echo 'onclick="cart_change('.$card['id'].',`add`)"'?>>В корзину</button>
            </div>

        </div>  
        <div class = 'main-block' style="padding-top:0">
            <div class = 'characteristics'>
                <h1 class = 'block-h1'>Характеристики:</h1>
                <p class = "block-h2">Общие параметры</p>
                <div class = "data-line">
                    <p class = "char-name">Серия:</p><p class = "char-data"><?php echo $card['series'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Год релиза:</p><p class = "char-data"><?php echo $card['year'];?></p>
                </div>
                <p class = "block-h2">Спецификации видеопамяти</p>
                <div class = "data-line">
                    <p class = "char-name">Объем видеопамяти:</p><p class = "char-data"><?php echo $card['memValue'];?> ГБ</p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Тип памяти:</p><p class = "char-data"><?php echo $card['memType'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Разрядность шины памяти:</p><p class = "char-data"><?php echo $card['bus'];?> бит</p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Максимальная пропускная способность памяти:</p><p class = "char-data"><?php echo $card['memSpeed'];?> Гбайт/сек</p>
                </div>
                <p class = "block-h2">Спецификации видеопроцессора</p>
                <div class = "data-line">
                    <p class = "char-name">Производитель графического процессора:</p><p class = "char-data"><?php echo $card['chipCompany'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Микроархитектура:</p><p class = "char-data"><?php echo $card['archect'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Техпроцесс:</p><p class = "char-data"><?php echo $card['techprocess'];?> нм</p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Штатная частота работы видеочипа:</p><p class = "char-data"><?php echo $card['minMHZ'];?> МГц</p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Турбочастота:</p><p class = "char-data"><?php echo $card['maxMHZ'];?> МГц</p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Шейдерные ALU:</p><p class = "char-data"><?php echo $card['ALU'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Поддержка трассировки лучей:</p><p class = "char-data"><?php echo $card['RTX'];?></p>
                </div>
                <p class = "block-h2">Вывод изображения</p>
                <div class = "data-line">
                    <p class = "char-name">Видеоразъемы:</p><p class = "char-data"><?php echo $card['ports'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Максимальное разрешение:</p><p class = "char-data"><?php echo $card['maxResolution'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Количество подключаемых одновременно мониторов:</p><p class = "char-data"><?php echo $card['displayCount'];?> шт</p>
                </div>
                <p class = "block-h2">Питание</p>
                <div class = "data-line">
                    <p class = "char-name">Необходимость дополнительного питания:</p><p class = "char-data"><?php echo $card['dopPower'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Разъемы дополнительного питания:</p><p class = "char-data"><?php echo $card['dopPowerPort'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Максимальное энергопотребление:</p><p class = "char-data"><?php echo $card['maxEnergy'];?> Вт</p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Рекомендуемый блок питания:</p><p class = "char-data"><?php echo $card['recommendedBlock'];?> Вт</p>
                </div>
                <p class = "block-h2">Система охлаждения</p>
                <div class = "data-line">
                    <p class = "char-name">Тип охлаждения:</p><p class = "char-data"><?php echo $card['coolingType'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Количество установленных вентиляторов:</p><p class = "char-data"><?php echo $card['fanCount'];?> шт</p>
                </div>
                <p class = "block-h2">Габариты</p>
                <div class = "data-line">
                    <p class = "char-name">Низкопрофильная карта:</p><p class = "char-data"><?php echo $card['lowProfile'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Количество занимаемых слотов расширения:</p><p class = "char-data"><?php echo $card['slotsCount'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Длина видеокарты:</p><p class = "char-data"><?php echo $card['length'];?> мм</p>
                </div>
                <p class = "block-h2">Дополнительно</p>
                <div class = "data-line">
                    <p class = "char-name">Комплектация:</p><p class = "char-data"><?php echo $card['complectation'];?></p>
                </div>
                <div class = "data-line">
                    <p class = "char-name">Подсветка элементов видеокарты:</p><p class = "char-data"><?php echo $card['light'];?></p>
                </div>
            </div>        
        </div>
    </div>
    <footer>

    </footer>
    <script src="/scripts/public_script.js?antirtk=on"></script>
    <script src="/scripts/product.js?antirtk=on"></script>
    <script src="/scripts/slider.js?antirtk=on"></script>
</body>
</html>
