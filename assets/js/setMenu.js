function setMenu() {
    $('#menu').empty();
    for (const idMenu in menu) {
        var id = idMenu;
        var name = menu[idMenu].name;
        $('#menu').append(`<option value="${id}" label="${name}">${name}</option>`);
    }
    setDishes();
}

async function setDishes() {
    var idMenu = $('#menu').val();
    dishContainerLoading();
    $('#title').text(menu[idMenu].name);
    var template = {};
    var IDs = [];
    await menu[idMenu].dishes.forEach(async dish => {
        var id = dish.id;
        var name = dish.name;
        var price = parseFloat(dish.price).toFixed(2);
        var stock = dish.actualStock;
        template[id] = `
            <div id="${id}" stock="${stock}" price="${price}" class="dishContainer" style="
                    background: linear-gradient(to bottom,
                        rgba(20, 20, 20, 0.125) 40%,
                        rgba(20, 20, 20, 0.625)), url(${await getImage(idMenu, id)});
                    background-size: cover;
                    background-position: center center;
                    display: none;
                ">
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
        `;
        IDs.push(id);
    })
    showContainers(IDs, template);
}

function showContainers(IDs, template) {
    $('#dishes').empty();
    console.log(IDs);
    var i = 0;
    IDs.forEach(id => {
        var time = i * 250;
        console.log(id);
        $('#dishes').append(template[id]);
        setTimeout(() => {
            $(`[id="${id}"]`).show(250);
        }, time);
        i++;
    })
}

$('#menu').change(setDishes);