var title = '';
var username = '';
var idPage = '';

function reloadIframe(idPage) {
    $('#pageIframe').attr('src', `/?page=${idPage}`);
}
function getGeneralData(data) {
    if (data.status) {
        if (data.data.title != title) {
            title = data.data.title;
            $('#title').text(title);
        }
        if (data.data.username != username) {
            username = data.data.username;
            $('#username').text(username);
        }
        if (data.data.idPage != idPage) {
            idPage = data.data.idPage;
            $('#idPage').text(idPage);
        }
        reloadIframe(idPage);
    }
}
function getBasicConfig(data) {
    color = data.data;
    $('#primaryColor').val(color.primaryColor);
    $('#carritoColor').val(color.carritoColor);
    $('#letrasColor').val(color.letrasColor);
    $('#letrasColorContrast').val(color.letrasColorContrast);
    $('#priceColor').val(color.priceColor);
    $('#priceColorCarrito').val(color.priceColorCarrito);
}
function getAdvancedConfig() {
    
}
$(document).ready(function() {
    runAjaxGet('getGeneralData');
    runAjaxGet('getBasicConfig');
    runAjaxGet('getAdvancedConfig');
})
