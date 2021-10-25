function setMenu() {
    $('#menu').empty();
    for (const idMenu in menu) {
        var id = idMenu;
        var name = menu[idMenu].name;
        $('#menu').append(`<option value="${id}" label="${name}">${name}</option>`);
    }
    setDishes();
}

function setDishes() {
    var idMenu = $('#menu').val();
    $('#dishes').empty();
    $('#title').text(menu[idMenu].name);
    menu[idMenu].dishes.forEach(async dish =>{
        var dataDish = JSON.stringify(dish);
        var id = dish.id;
        var name = dish.name;
        var price = parseFloat(dish.price).toFixed(2);
        var stock = dish.stock;
        $('#dishes').append(`
            <div id="${id}" stock="${stock}" price="${price}" class="dishContainer" style="
                    background: linear-gradient(to bottom,
                        rgba(20, 20, 20, 0.125) 40%,
                        rgba(20, 20, 20, 0.625)), url(${await getImage(idMenu, id)});
                    background-size: cover;
                    background-position: center center;
                    display: none;
                " loading="lazy">
                <button data-id="quantity" class="" title="Platos ordenados">0</button>
                <button data-id="remove" class="" title="Quitar" onclick="removeFromCart($(this).parent().attr('dish-id'))">X</button>
                <table onclick="openOrderer($(this).parent())">
                    <tbody>
                        <tr>
                            <td>${name}</td>
                            <td><button>${price}</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        `);
        $(`#${id}`).show(250);
    })
}

$('#menu').change(setDishes);