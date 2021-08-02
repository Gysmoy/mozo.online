$('form').submit(e => {
    e.preventDefault();
    var username = $('#username').val();
    var firstPassword = $('#password').val();
    var secondPassword = $('#confirmpassword').val();
    var tokenBruto = `Mozo${password}Online`;
    var token = sha256(tokenBruto);
    console.log(token);
    $.ajax({
        url: 'assets/php/signupAPI.php',
        type: 'POST',
        data: {
            'token': token,
            'username': username,
            'firstPassword': firstPassword,
            'secondPassword': secondPassword
        },
        success: response => {
            var data = JSON.parse(response);
            $('.message').text(data.message);
            $('.message').fadeIn();
            if (data.access) {
                $('.message').removeClass('danger').addClass('success');
                location.href = 'index.php';
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