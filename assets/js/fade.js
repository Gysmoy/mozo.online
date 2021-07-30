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