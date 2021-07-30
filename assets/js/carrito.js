let carritoLista;

function pintarCarrito() {
    var template;
    var total = 0;
    var spancarrito = carritoLista.length;
    $('#spancarrito').html(spancarrito);
    if (spancarrito > 0) {
        carritoLista.forEach(plato => {
            var dataId = plato.dataId;
            var nombre = plato.nombre;
            var precio = plato.precio.toFixed(2);
            var cantidad = plato.cantidad;
            var subtotal = (plato.precio * plato.cantidad).toFixed(2);
            total += parseFloat(subtotal);
            template += `
        <tr>
            <td>${nombre} <span class="delCarrito" onclick="delCarrito(this)" data-id="${dataId}">Quitar</span></td>
            <td><p>${precio}</p></td>
            <td width="1%">
                <div class="maxCarrito" data-id="${dataId}">+</div>
                <div class="cantCarrito">${cantidad}</div>
                <div class="minCarrito" data-id="${dataId}">-</div>
            </td>
            <td><p>${subtotal}</p></td>
        </tr>
        `;
        })
    } else {
        $('main').css({
            'border-color': 'var(--main-title-background)',
        });
        $('main > div').hide();
        $('#' + $('#platos').val()).fadeIn();
    }
    $('#divcarrito table tbody').html(template);
    $('#total').html(`S/ ${total.toFixed(2)}`);
}

function carrito() {
    carritoLista = [];
    let platos = $('main > div').toArray();
    // Quitamos el carrito de la lista de platos
    platos.pop();
    platos.forEach(div => {
        let tr = Array.from(div.children[1].children[1].children);
        tr.forEach(plato => {
            var data = Array.from(plato.children);
            var cantidad = parseInt($(Array.from(data[3].children)[1]).val());
            if (cantidad > 0) {
                var dataId = $(plato).attr('data-id');
                var nombre = $(data[1]).html();
                var precio = parseFloat($(data[2].children[0]).html());

                // Agregamos el plato al carrito
                carritoLista.push({
                    'dataId': dataId,
                    'nombre': nombre,
                    'cantidad': cantidad,
                    'precio': precio
                })
            } else {
                // NTD
            }
        });
    });
    if (carritoLista.length > 0) {
        $('#btncarrito').fadeIn();
    } else {
        $('#btncarrito').fadeOut();
    }
    pintarCarrito();
}

$('#ordenar').click(function () {
    if (carritoLista.length > 0) {
        var carta = JSON.stringify(carritoLista);
        $('#carta').val(carta);
        $('#carta').parent().submit();
    } else {
        alert('¡Debes ordenar algo primero!');
    }
});

$(document).ready(carrito);