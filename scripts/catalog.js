let current_page = 1;
let global_filters;

window.onload = ()=>{
    $class('page-num')[current_page-1].style.color = 'white';
    $class('page-num')[current_page-1].style.background = 'var(--light-color)';
    filter_data_constructor();
}

async function loadpage(page_num, filters_obj){
    await $.post("/server/products_load.php", {page:page_num, filters: filters_obj}, function(data){
        constructor(data);
        pages_constructor();
        current_page = page_num;
    },"json");
    $(".price-info-icon").on('mouseenter', function(){
        $(this).closest(".price-info").next('.more-info-block').fadeIn(100);
    });
    $(".price-info-icon").on('mouseleave', function(){
        $(".more-info-block").fadeOut(100);
    })
    button_effect_load();
}
async function pages_constructor(){
    await $.post("/server/pages_update.php", {filters: global_filters}, function(data){
        $id('pages-list').innerHTML = '';
        if (data == 0) {
            $id('not-found').style.display = "flex";
        }else{
            $id('not-found').style.display = "none";
            for (let i = 1; i <= data; i++) {
                $id('pages-list').innerHTML += `<a class = 'page-num' href='#' onclick = 'loadpage(${i}, global_filters)'>${i}</a>`;
            }
        } 
    });
    $class('page-num')[current_page-1].style.color = 'white';
    $class('page-num')[current_page-1].style.background = 'var(--light-color)';
}
function constructor(json){
    $id('list-content').innerHTML = '';
    json.forEach(element => {
        $id('list-content').innerHTML +=`
            <div class="product-item">
            <img class ="product-icon" src="/content/cards/${element['img']}/icon.png">
            <div class = "product-info">
                <a class = "product-link" href="/catalog/${element['linkName']}"><h1 class = "product-name">${element['name']}</h1></a>
                <div class="short-description">
                    <p class="process-inf">Техпроцесс: ${element['techprocess']} нм</p>
                    <p class="mhz-inf">Частота работы видеочипа: ${element['minMHZ']}-${element['maxMHZ']} МГц</p>
                    <p class="mem-inf">Видеопамять: ${element['memValue']} ГБ</p>
                    <p class="bus-inf">Шина памяти: ${element['bus']} бит</p>
                </div>
                <div class = "price-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="price-info-icon" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                    <span>${element['cost']}</span> ₽
                    
                </div>
                <div class="more-info-block"><p class = "price-text">Розничная цена</p></div>
                <button class="in-cart-button" onclick="cart_change(${element['id']},'add')">В корзину</button>
            </div>
            </div>
        `
    });
}

$('#product-list').ready(function(){
    $(".price-info-icon").on('mouseenter', function(){
        $(this).closest(".price-info").next('.more-info-block').fadeIn(100);
    });
    $(".price-info-icon").on('mouseleave', function(){
        $(".more-info-block").fadeOut(100);
    })
});



//фильтры
function filter_data_constructor(){
    let mem_filters = '';
    let techproc_filters = '';
    let bus_filters = '';
    let chipCompany = '';
    let rtx = '';
    let specialise = '';
    let min_cost = $class('price-filter-input')[0].value;
    let max_cost = $class('price-filter-input')[1].value;   


    if ($id('AMD').checked == true) {
        chipCompany += "AMD','";
    }
    if ($id('Nvidia').checked == true) {
        chipCompany += "Nvidia','";
    }
    if ($id('2gb').checked == true) {
        mem_filters += "2','";
    }
    if ($id('4gb').checked == true) {
        mem_filters += "4','";
    }
    if ($id('6gb').checked == true) {
        mem_filters += "6','";
    }
    if ($id('8gb').checked == true) {
        mem_filters += "8','";
    }
    if ($id('7nm').checked == true) {
        techproc_filters += "7','";
    }
    if ($id('8nm').checked == true) {
        techproc_filters += "8','";
    }
    if ($id('12nm').checked == true) {
        techproc_filters += "12','";
    }
    if ($id('28nm').checked == true) {
        techproc_filters += "28','";
    }
    if ($id('bus64').checked == true) {
        bus_filters += "64','";
    }
    if ($id('bus128').checked == true) {
        bus_filters += "128','";
    }
    if ($id('bus192').checked == true) {
        bus_filters += "192','";
    }
    if ($id('bus256').checked == true) {
        bus_filters += "256','";
    }
    if ($id('RTXon').checked == true) {
        rtx += "да','";
    }
    if ($id('RTXoff').checked == true) {
        rtx += "нет','";
    }
    if ($id('for-game').checked == true) {
        specialise += "for-game','";
    }
    if ($id('for-office').checked == true) {
        specialise += "for-office','";
    }
    if ($id('prof').checked == true) {
        specialise += "prof','";
    }
    global_filters = {memVal: mem_filters, techproc: techproc_filters, bus: bus_filters, min_cost: min_cost, max_cost:max_cost, chipCompany:chipCompany, rtx:rtx, specialise:specialise};

    loadpage(1,global_filters);   
}


