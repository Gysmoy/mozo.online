function setMenu() {
    $('#menu').empty();
    menu.forEach(block => {
        var id = block.id;
        var name = block.name;
        $('#menu').append(`<option value="${id}" label="${name}">${name}</option>`)
    });
}