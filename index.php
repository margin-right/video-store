<?php 
    include "server/database_con.php";
    include "server/login_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/slider.css">
    <link rel="stylesheet" href="/styles/reg.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" media="(max-width: 1200px)" href="/styles/main_mobile.css">
    <link rel="shortcut icon" href="content/favicon.png" type="image/png">
    <script src="scripts/jquery-3.6.0.min.js?antirtk=on"></script>
    <script src="/scripts/cookie_jquery.js?antirtk=on"></script>
    <title>VideoHall | Магазин видеоадаптеров</title>
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
    <div id = 'main-wrapper'>
        <div class="first-block">
            <div id="main-menu">
                <a class = 'menu-item' href = "/catalog?filter_id=for-game">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="menu-icon" viewBox="0 0 16 16">
                        <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
                        <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/>
                    </svg>
                    <p class = "menu-text">Игровые</p>
                </a>
                <a class = 'menu-item' href = "/catalog?filter_id=for-office">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="menu-icon" viewBox="0 0 16 16">
                        <path d="M4.879 4.515a.5.5 0 0 1 .606.364l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 7.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 0 1 .364-.606z"/>
                        <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                    </svg>
                    <p class = "menu-text">Для офиса</p>
                </a>
                <a class = 'menu-item' href = "/catalog?filter_id=RTXon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="menu-icon" viewBox="0 0 16 16">
                        <path d="M8 3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 3zm8 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zm-13.5.5a.5.5 0 0 0 0-1h-2a.5.5 0 0 0 0 1h2zm11.157-6.157a.5.5 0 0 1 0 .707l-1.414 1.414a.5.5 0 1 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm-9.9 2.121a.5.5 0 0 0 .707-.707L3.05 5.343a.5.5 0 1 0-.707.707l1.414 1.414zM8 7a4 4 0 0 0-4 4 .5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5 4 4 0 0 0-4-4zm0 1a3 3 0 0 1 2.959 2.5H5.04A3 3 0 0 1 8 8z"/>
                    </svg>
                    <p class = "menu-text">Для лучей</p>
                </a>
                <a class = 'menu-item' href = "/catalog?filter_id=prof">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="menu-icon" viewBox="0 0 16 16">
                        <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z"/>
                    </svg>
                    <p class = "menu-text">Профессиональные</p>
                </a>
                <div class = 'menu-item'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="menu-icon" viewBox="0 0 16 16">
                        <path d="M8 15V1h6a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H8zm6 1a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12z"/>
                    </svg>
                    <p class = "menu-text">Низкопрофильные</p>
                </div>
            </div>
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
                    <div class="slide-item" style = 'background-image:url(content/slide3.png)'>
                        <div class = "slide-cover">
                            <h1 class = "slide-h">Широчайший выбор и возможность оптовой закупки</h1>
                        </div>    
                    </div>
                    <div class="slide-item" style = 'background-image:url(content/slide1.png)'>
                        <div class = "slide-cover">
                            <h1 class = "slide-h">Референсные карты от производителей чипов</h1>
                        </div>   
                    </div>
                    <div class="slide-item" style = 'background-image:url(content/slide2.png)'>
                        <div class = "slide-cover">
                            <h1 class = "slide-h">Видеокарты от сертифицированных вендоров</h1>
                        </div>
                    </div>
                    <div class="slide-item" style = 'background-image:url(content/slide3.png)'>
                        <div class = "slide-cover">
                            <h1 class = "slide-h">Широчайший выбор и возможность оптовой закупки</h1>
                        </div>       
                    </div>
                    <div class="slide-item" style = 'background-image:url(content/slide1.png)'>
                        <div class = "slide-cover">
                            <h1 class = "slide-h">Референсные карты от производителей чипов</h1>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <div class = 'block-main'>
            <div class = 'block-name-line'>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-cpu-fill" viewBox="0 0 16 16">
                    <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                    <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5z"/>
                </svg>
                <h1 class = 'block-name'>Производители графических процессоров</h1>
            </div>
            <div id='company-select-block'>
                <a class = 'company-select amd-select' href = "/catalog?filter_id=AMD">
                    <img class = 'company-logo-img' src="content/amd_logo.png">
                </a>
                <a class = 'company-select nvidia-select' href = "/catalog?filter_id=Nvidia">
                    <img class = 'company-logo-img' src="content/nvidia_logo.png">
                </a>
            </div>
        </div>

        <div class = 'block-main'>
            <div class = 'block-name-line'>
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-fan" viewBox="0 0 16 16">
                    <path d="M10 3c0 1.313-.304 2.508-.8 3.4a1.991 1.991 0 0 0-1.484-.38c-.28-.982-.91-2.04-1.838-2.969a8.368 8.368 0 0 0-.491-.454A5.976 5.976 0 0 1 8 2c.691 0 1.355.117 1.973.332.018.219.027.442.027.668Zm0 5c0 .073-.004.146-.012.217 1.018-.019 2.2-.353 3.331-1.006a8.39 8.39 0 0 0 .57-.361 6.004 6.004 0 0 0-2.53-3.823 9.02 9.02 0 0 1-.145.64c-.34 1.269-.944 2.346-1.656 3.079.277.343.442.78.442 1.254Zm-.137.728a2.007 2.007 0 0 1-1.07 1.109c.525.87 1.405 1.725 2.535 2.377.2.116.402.222.605.317a5.986 5.986 0 0 0 2.053-4.111c-.208.073-.421.14-.641.199-1.264.339-2.493.356-3.482.11ZM8 10c-.45 0-.866-.149-1.2-.4-.494.89-.796 2.082-.796 3.391 0 .23.01.457.027.678A5.99 5.99 0 0 0 8 14c.94 0 1.83-.216 2.623-.602a8.359 8.359 0 0 1-.497-.458c-.925-.926-1.555-1.981-1.836-2.96-.094.013-.191.02-.29.02ZM6 8c0-.08.005-.16.014-.239-1.02.017-2.205.351-3.34 1.007a8.366 8.366 0 0 0-.568.359 6.003 6.003 0 0 0 2.525 3.839 8.37 8.37 0 0 1 .148-.653c.34-1.267.94-2.342 1.65-3.075A1.988 1.988 0 0 1 6 8Zm-3.347-.632c1.267-.34 2.498-.355 3.488-.107.196-.494.583-.89 1.07-1.1-.524-.874-1.406-1.733-2.541-2.388a8.363 8.363 0 0 0-.594-.312 5.987 5.987 0 0 0-2.06 4.106c.206-.074.418-.14.637-.199ZM8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"/>
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14Zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16Z"/>
                </svg>
                <h1 class = 'block-name'>Официальные вендоры</h1>
            </div>
            <div id='vendor-block'>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/gigabyte_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/msi_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/palit_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/asus_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/evga_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/asrock_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/inno3d_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/sapphire_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/kfa2_logo.png">
                </div>
                <div class="vendor-item">
                    <img class = "vendor-logo-img" src="content/vendors/powercolor_logo.png">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div id = 'footer-left'>

        </div>
    </footer>
    <script src="scripts/slider.js"></script>
    <script src="scripts/public_script.js"></script>
    <script src="scripts/main_script.js"></script>
</body>
</html>
