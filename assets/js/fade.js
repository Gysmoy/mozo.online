$('#platos').on('change', function () {
    $('main > div').hide();
    $('#' + this.value).fadeIn();
})

$('#btncarrito').click(function () {
    if ($('#divcarrito').is(':visible')) {
        $('main > div').hide();
        $('#btncarrito').html(`🛒 [<span id="spancarrito">${carritoLista.length}</span>]`);
        $('#' + $('#platos').val()).fadeIn();
        $('main').css({
            'border-color': 'var(--main-title-background)',
        });
        $('#ordenar').hide();
        $('#platos').fadeIn();
    } else {
        $('main > div').hide();
        $('#btncarrito').html('Volver');
        $('#divcarrito').fadeIn();
        $('main').css({
            'border-color': 'var(--carrito-title-background)',
        });
        $('#ordenar').fadeIn();
        $('#platos').hide();
    }
})

$('main').ready(function(){
    $('main > div').hide();
    $('#' + $('#platos').val()).fadeIn();
})

$('#cancel').click(event => {
    $('#shower').fadeOut();
    $('#shower img').attr('src', '/files/maindata/default.jpg');
    $('#shower h2').text(null);
    $('#order input').val(0);
    $('#accept span').text('0.00');
})

$('fieldset').click(event => {
    $('#shower').fadeIn();
})