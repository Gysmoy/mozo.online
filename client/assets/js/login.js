$('form').submit(e => {
    e.preventDefault();
    var username = $('#username').val();
    var password = $('#password').val();
    var tokenBruto = `Mozo${password}Online`;
    var token = sha256(tokenBruto);
    console.log(token);
    $.ajax({
        url: 'assets/php/loginAPI.php',
        type: 'POST',
        data: {
            'token': token,
            'username': username,
            'password': password
        },
        success: response => {
            var data = JSON.parse(response);
            $('.message').text(data.message);
            $('.message').fadeIn();
            if (data.access) {
                $('.message').removeClass('danger').addClass('success');
                location.href = './';
            } else {
                $('.message').removeClass('success').addClass('danger');
            }
        },
        complete: function() {
            setTimeout(function() {
                $('.message').fadeOut();
            }, 2500);
        }
    })
})