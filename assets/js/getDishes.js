$.ajax({
    url: '/assets/php/getDishes.php',
    method: 'POST',
    data: {
        'type': 'fetchAll',
        'id': null
    },
    success: response => {
        
    }
})