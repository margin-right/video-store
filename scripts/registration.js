function reg_send() {
    if ($id('password').value == $id('password-confirm').value) {
        $.ajax({
            type: "POST",
            url: "/server/registr.php",
            dataType: 'text',
            data:{"login": $id('login').value, "password": $id('password').value},
            success: function(data) {
                if(data == 'success'){
                    window.location.replace('/');
                }
                $id('error-block').innerHTML=data;
            }
        })
    }
}