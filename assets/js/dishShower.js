async function openOrderer(dishContainer) {
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

    $('#shower').parent().fadeIn();
}

$('#cancel').click(event => {
    $('#shower').parent().fadeOut();
    $('#shower h2').text(null);
    $('#order input').val(0);
    $('#accept span').text('0.00');
})