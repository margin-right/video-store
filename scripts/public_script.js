window.onload = async function () {
    
}

function $class(name){return document.getElementsByClassName(name)}
function $id(name){return document.getElementById(name)}

function login_send(){
    if ($id('password').value != '' && $id('login').value != '') {
        $.ajax({
            type: "POST",
            url: "/server/login.php",
            dataType: 'text',
            data:{"login": $id('login').value, "password": $id('password').value},
            success: function(data) {
                if (data == 'success') {
                    window.location.reload();
                }else{
                    $id('error-block').innerHTML=data;
                }
            }
        })
    }
}
function logout(){  
    $.cookie('token', '', { expires: -1, path: '/'});
    window.location.reload();
}

function open_profile(){
    $id('profile-wrapper').style.visibility = 'visible';
    $id('profile-wrapper').style.opacity = '1';
}

function window_close(window_id){
    $id(window_id).style.opacity = '0';
    $id(window_id).style.visibility = 'hidden';
}
function open_cart(){
    $id('cart-wrapper').style.opacity = '1';
    $id('cart-wrapper').style.visibility = 'visible';
}

function cart_change(id,method){
    $.post("/server/cart_control.php", {card_id: id, function: method}, function(data){
        console.log(data);
        cart_constructor(data);
    },"json");
}

function cart_constructor(cards_arr){
    $id('cart-list').innerHTML = '';
    let total_cost = 0;
    cards_arr.forEach(element => {
        total_cost += parseInt(element['cost']);
        $id('cart-list').innerHTML += `
            <div class="cart-item">
            <img class="cart-img" height="100%" src="/content/cards/${element['img']}/icon.png">
            <div class="cart-item-info-block">
                <p class="cart-item-name">${element['name']}</p>
                <p class="cart-item-cost">Цена: <span>${element['cost']}</span> ₽</p>
            </div>
            <button id = "logout-btn" class="del-item" onclick="cart_change(${element['id']},'del')">удалить</button>
            </div>
        
        `;  
    });
    $id('cart-cost').innerHTML = total_cost;
}

function button_effect_load(){
    $('.in-cart-button').on('click', function(){
        $(this).css({backgroundColor: "#dd0000",color:"white"});
        setTimeout(()=>{$(this).css({backgroundColor: "var(--body-color)", color:"black"})},200);
    })
}