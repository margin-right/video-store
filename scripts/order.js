button_effect_load();
function order_add(){
    $.post("/server/orders_control.php", {cards:cards_list, phone: $id('phone-input').value, adres: $id('adres-input').value ,method:'add'}, function(data){
        if (data == 'success') {
            window.location.replace('/');
        }else{
            $id('error-block').innerHTML = data;
        }
    },"text");
}
function order_del(id){
    $.post("/server/orders_control.php", {id:id ,method:'del'}, function(data){
        console.log(data);
        if (data == 'success') {
            window.location.replace('/');
        }else{
            $id('error-block').innerHTML = data;
        }
    },"text");
}