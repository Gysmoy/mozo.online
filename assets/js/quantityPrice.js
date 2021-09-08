var dolar = 4.08;
$('#totalPrice').click(function () {
    if ($(this).hasClass('dolar')) {
        $(this).removeClass('dolar');
    } else {
        $(this).addClass('dolar');
    }
    $('#quantity').trigger('change');
})
$('#min').click(function () {
    var input = $('#quantity');
    var quantity = parseInt(input.val());

    input.val(quantity - 1);
    input.trigger('change');
})
$('#max').click(function () {
    var input = $('#quantity');
    var quantity = parseInt(input.val());

    input.val(quantity + 1);
    input.trigger('change');
})
$('#max5').click(function () {
    var input = $('#quantity');
    var quantity = parseInt(input.val());

    input.val(quantity + 5);
    input.trigger('change');
})
$('#cancel').click(function () {
    var input = $('#quantity');
    var textarea = $('#specification');

    input.val(0);
    input.trigger('change');
    textarea.val(null)
})
$('#quantity').on('focus', function () {
    $(this).select();
})
$('#quantity').on('change', function () {
    var quantity = parseInt($(this).val());
    var price = parseFloat($('#realPrice').text());
    var min = parseInt($(this).attr('min'));
    var max = parseInt($(this).attr('max'));
    if (quantity > max) {
        quantity = max;
    } else if (quantity < min) {
        quantity = min;
    } else if (isNaN(quantity)) {
        quantity = 0;
    }
    $(this).val(quantity);
    var totalPrice;
    if ($('#totalPrice').hasClass('dolar')) {
        totalPrice = (quantity * price) / dolar;
    } else {
        totalPrice = quantity * price;
    }

    $('#totalPrice').text(totalPrice.toFixed(2));
})