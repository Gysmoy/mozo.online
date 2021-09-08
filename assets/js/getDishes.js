var dishes = {};

function listDishesId(dishes) {
    for (dish in dishes) {
        var option = `
        <option value="${dish}">${dishes[dish].name}</option>
        `;
        $('#platos').append(option);
    }
}
function listDishes(idDish) {
    $('#title').text(dishes[idDish].name);
    $('#dishes').empty();
    let i = 0;
    dishes[idDish].dishes.forEach(dish => {
        var position = i;
        var dataDish = JSON.stringify({
            'idDish': idDish,
            'position': position
        });
        var dishContainer = `
        <div class="dishContainer"
            data-dish='${dataDish}'
            dish-id="${idDish}-${position}"
            style="
                background: linear-gradient(to bottom,
                        rgba(20, 20, 20, 0.125) 40%,
                        rgba(20, 20, 20, 0.625)), url('${dish.image}');
                background-size: cover;
                background-position: center center;
            ">
            <button data-id="quantity" class="" title="Platos ordenados">0</button>
            <button data-id="remove" class="" title="Quitar" onclick="removeFromCart($(this).parent().attr('dish-id'))">X</button>
            <table onclick="openOrderer($(this).parent())">
                <tbody>
                    <tr>
                        <td>${dish.name}</td>
                        <td><button>${dish.price.toFixed(2)}</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        `;
        $('#dishes').append(dishContainer);
        i += 1;
    });
}

$.ajax({
    url: '/assets/php/getDishes.php',
    method: 'POST',
    data: {
        'idPage': idPage,
    },
    success: res => {
        if (res.status == 200) {
            listDishesId(res.data);
            dishes = res.data;
            listDishes($('#platos').val());
        } else {
            console.log(res.message);
            dishes = res.data;
        }
    }
})

$('#platos').change(function () {
    listDishes($(this).val());
})

function openOrderer(dishContainer) {
    var dataDish = $(dishContainer).data('dish');
    var idDish = dataDish.idDish;
    var position = dataDish.position;
    var dishContent = dishes[idDish].dishes[position];
    $('#shower').attr('data-dish', JSON.stringify(dataDish));
    $('#namePriceContainer tbody tr:nth-child(1)').css({
        'background': `linear-gradient(to bottom,
            rgba(20, 20, 20, 0.125) 40%,
            rgba(20, 20, 20, 0.625)), url('${dishContent.image}')`,
        'background-size': 'cover',
        'background-position': 'center center'
    });
    $('#name').text(dishContent.name);
    $('#realPrice').text(dishContent.price.toFixed(2));
    $('#quantity').attr('max', dishContent.stock);
    $('section').fadeIn();
}
