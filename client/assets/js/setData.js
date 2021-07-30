$('.btn-edit').click(function () {
    var data = JSON.parse($(this).attr('data-id'));
    var newData = prompt('Ingrese un texto nuevo:', $(data.id).text());
    if (newData) {
        runAjaxSet(data.function, newData);
    } else {
        console.log('Debe ingresar un dato...');
    }
})
$('#guardarGeneralConfig').click(function () {
    var primaryColor = $('#primaryColor').val();
    var carritoColor = $('#carritoColor').val();
    var letrasColor = $('#letrasColor').val();
    var letrasColorContrast = $('#letrasColorContrast').val();
    var priceColor = $('#priceColor').val();
    var priceColorCarrito = $('#priceColorCarrito').val();
    var func = 'setGeneralConfigColor';
    let newData = JSON.stringify({
        'primaryColor': primaryColor,
        'carritoColor': carritoColor,
        'letrasColor': letrasColor,
        'letrasColorContrast': letrasColorContrast,
        'priceColor': priceColor,
        'priceColorCarrito': priceColorCarrito
    });
    runAjax('set', func, newData);
})