<!DOCTYPE html>
<html id = 'reg-html'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reg.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="content/favicon.png" type="image/png">
    <script src="/scripts/jquery-3.6.0.min.js?antirtk=on"></script>
    <script src="/scripts/cookie_jquery.js?antirtk=on"></script>
    <title>Регистрация | VideoHall</title>
</head>
<body>
    <style>
        @media screen and (max-width: 1450px){
            .reg-home{
                display:none;
            }
        }
    </style>
    <a class="reg-home reg-h" href='/'>
        <img src="/content/logo.svg" id = 'reg-logo'>
        <h1 class = 'reg-text'>VideoHall</h1>
    </a>
    <div id = 'reg-wrapper'>
        <div id="reg-center-block">
            <div id = "reg-form">
                <div class="reg-h" id='reg-name'>
                    <h1 class = 'reg-text'>Регистрация</h1>
                </div>
                <div class="reg-inputs-block">
                    <label>Логин:</label><input class = 'reg-input' id="login">
                    <label>Пароль:</label><input type="password" class = 'reg-input' id="password">
                    <label>Повторите пароль:</label><input type="password" class = 'reg-input' id="password-confirm">
                </div>
                <button id = 'send_btn' onclick='reg_send()'>Создать аккаунт</button>
                <p id='error-block'></p>
            </div>
        </div>
    </div>

    <script src="/scripts/public_script.js?antirtk=on"></script>
    <script src="/scripts/registration.js?antirtk=on"></script>
</body>
</html>