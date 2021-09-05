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
        <div class="dishContainer" data-dish='${dataDish}' onclick="openOrderer(this)">
            <button data-id="quantity" class="" title="Platos ordenados">0</button>
            <button data-id="remove" class="" title="Quitar">X</button>
            <table>
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

function openOrderer(dishContainer) {
    var dataDish = $(dishContainer).data('dish');
    var idDish = dataDish.idDish;
    var position = dataDish.position;
    var dishContent = dishes[idDish].dishes[position];
    console.log(dishContent);
}