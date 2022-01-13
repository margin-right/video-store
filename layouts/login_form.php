<div id = "reg-form">
    <div class="reg-h" id='reg-name'>
        <h1 class = 'reg-text'>Вход</h1>
    </div>
    <div onclick = 'window_close("profile-wrapper")'>
        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="close-icon" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
    </div>
    
    <div class="reg-inputs-block">
        <label>Логин:</label><input class = 'reg-input' id="login">
        <label>Пароль:</label><input type="password" class = 'reg-input' id="password">
    </div>
    <button id = 'send_btn' onclick='login_send()'>войти</button>
    <a href='/registration' id = 'send_btn' style = 'display: flex; align-items: center; justify-content:center;'>регистрация</a>
    <p id='error-block'></p>
</div>