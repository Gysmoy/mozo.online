var cart = [];

function addToCart(position, dataDish) {
    $(`[dish-id="${position}"] > [data-id="quantity"]`).text(dataDish.quantity).addClass('selected');
    $(`[dish-id="${position}"] > [data-id="remove"]`).addClass('selected');
    cart[position] = dataDish;
}

function removeFromCart(position) {
    $(`[dish-id="${position}"] > [data-id="quantity"]`).text(0).removeClass('selected');
    $(`[dish-id="${position}"] > [data-id="remove"]`).removeClass('selected');
    delete cart[position];
}

function clearShower() {
    $('#namePriceContainer tbody tr:nth-child(1)').attr('style', null);
    $('#name').text(null);
    $('#realPrice').text((0).toFixed(2));
    $('#quantity').val(0).attr('max', 0);
    $('#totalPrice').text((0).toFixed(2));
    $('#specification').val(null);
    $('#shower').attr('data-dish', null);
    $('#shower').parent().fadeOut();
}

$('#accept').click(function () {
    var dataDish = JSON.parse($('#shower').attr('data-dish'));
    var position = `${dataDish.idDish}-${dataDish.position}`;
    dataDish.quantity = parseInt($('#quantity').val());
    dataDish.specification = $('#specification').val();
    if (dataDish.quantity > 0) {
        addToCart(position, dataDish);
    } else {
        removeFromCart(position);
    }
    $('#shower').parent().fadeOut();
})
$('#cancel').click(function () {
    $('#namePriceContainer tbody tr:nth-child(1)').attr('style', null);
    $('#name').text(null);
    $('#realPrice').text((0).toFixed(2));
    $('#quantity').val(0).attr('max', 0);
    $('#totalPrice').text((0).toFixed(2));
    $('#specification').val(null);
    $('#shower').attr('data-dish', null);
    $('#shower').parent().fadeOut();
})