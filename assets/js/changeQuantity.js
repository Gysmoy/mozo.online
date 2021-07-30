$('.minus').click(function () {
    var input = $(this).parent().children('input');
    if (input.val() - 1 <= 0) {
        input.val(0);
    } else {
        input.val(parseInt(input.val()) - 1);
    }
    verifyInput(input);
    // Llamamos al carrito en cada acción
    carrito();
})

$('.plus').click(function () {
    var input = $(this).parent().children('input');
    if (parseInt(input.val()) + 1 >= parseInt(input.attr('max'))) {
        input.val(parseInt(input.attr('max')));
    } else {
        input.val(parseInt(input.val()) + 1);
    }

    verifyInput(input);
    // Llamamos al carrito en cada acción
    carrito();
})

$('input[type="number"]').on('change', function () {
    if ($(this).val() <= 0) {
        $(this).val(0);
    } else if ($(this).val() > parseInt($(this).attr('max'))) {
        $(this).val(parseInt($(this).attr('max')));
    }
    verifyInput($(this));
    // Llamamos al carrito en cada acción
    carrito();
})
function delCarrito(element) {
    var dataId = $(element).attr('data-id');
    var input = $(`[data-id="${dataId}"] input`);
    input.val(0);
    verifyInput(input);
    carrito();
};
function maxCarrito(element) {

}
function verifyInput(element) {
    if (element.val() > 0) {
        element.css({
            'background-color': 'var(--main-table-tbody-orderInput-border)',
            'color': '#fff'
        });
    } else {
        element.css({
            'background-color': '#fff',
            'color': '#000'
        });
    }
}