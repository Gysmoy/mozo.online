$('form').submit(e => {
    e.preventDefault();
    var username = $('#username').val();
    var firstPassword = $('#password').val();
    var secondPassword = $('#confirmpassword').val();
    var tokenBruto = `Mozo${firstPassword}2021${secondPassword}Online`;
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
            var data = response;
            $('.message').text(data.message);
            $('.message').fadeIn();
            if (data.access === true) {
                $('.message').removeClass('danger').addClass('success');
                alert(`Bienvenido, el usuario ${username} ha sido creado correctamente!`)
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