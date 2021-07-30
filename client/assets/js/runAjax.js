function runAjaxGet(func) {
    $.ajax({
        url: 'assets/php/getData.php',
        type: 'POST',
        data: {
            'function': func
        },
        success: response => {
            data = response;
            runFunction(func, data);
        },
        error: errorThrown => {
            console.log(`Error: ${errorThrown}`)
        }
    });
}
function runAjaxSet(func, newData) {
    $.ajax({
        url: 'assets/php/setData.php',
        type: 'POST',
        data: {
            'function': func,
            'data': newData
        },
        success: response => {
            data = JSON.parse(response);
            runAjaxGet(`get${func}`);
        },
        error: errorThrown => {
            console.log(`Error: ${errorThrown}`);
        }
    });
}