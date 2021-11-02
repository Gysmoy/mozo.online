function openOrderer(dishContainer) {
    var id = dishContainer.attr('id');
    var name = dishContainer.attr('name');
    var price = parseFloat(dishContainer.attr('price'));
    var stock = parseInt(dishContainer.attr('stock'));
    const image = dishContainer.attr('img');

    $('#namePriceContainer tbody tr:nth-child(1)').css({
        'background': `linear-gradient(to bottom,
            rgba(20, 20, 20, 0.125) 40%,
            rgba(20, 20, 20, 0.625)), url('${image}')`,
        'background-size': 'cover',
        'background-position': 'center center'
    });
    $('#shower').attr('data-id', id);
    $('#name').text(name);
    $('#realPrice').text(price.toFixed(2));
    $('#quantity').attr('max', stock);
    $('#maximun').val(stock)

    $('#shower').parent().fadeIn();
}

function quantity(op = 'increase') {
    var value = parseInt($('#quantity').val());
    switch (op) {
        case 'decrease':
            value--;
            break;
    
        default:
            value++;
            break;
    }
    $('#quantity').val(value);
    validateStock();
}

function validateStock() {
    var value = parseInt($('#quantity').val());
    var max = parseInt($('#maximun').val());
    value = isNaN(value) ? 0: value;
    value = value < 0 ? 0: (value > max ? max: value);
    $('#quantity').val(value);
}
$('#min').click(function(){quantity('decrease')});
$('#max').click(function(){quantity('increase')});
$('#maximun').click(function() {
    var max = $(this).val();
    $('#quantity').val(max);
    validateStock();
})
$('#quantity').change(validateStock);

$('#cancel').click(event => {
    $('#shower').parent().fadeOut();
    $('#shower h2').text(null);
    $('#order input').val(0);
    $('#accept span').text('0.00');
})