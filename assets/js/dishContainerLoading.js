function dishContainerLoading(cant = 4) {
    $('#dishes').empty();
    for (let i = 0; i < cant; i++) {
        $('#dishes').append(`
        <div class="dishContainer loading"><table><tbody><tr>
            <td><p>ㅤㅤㅤㅤㅤ</p></td>
            <td><button>ㅤㅤㅤ</button></td>
        </tr></tbody></table></div>
        `);
    }
}