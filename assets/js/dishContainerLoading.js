function dishContainerLoading() {
    $('#dishes').empty();
    for (let i = 0; i < 4; i++) {
        $('#dishes').append(`
        <div class="dishContainer loading"><table><tbody><tr>
            <td><p>ㅤㅤㅤㅤㅤ</p></td>
            <td><button>ㅤㅤㅤ</button></td>
        </tr></tbody></table></div>
        `);
    }
}