<?php

$tokenResponse = file_get_contents('http://34.102.135.155/mapfre/tokenEquifax');

$tokenData = json_decode($tokenResponse, true);

$tokenEquifax = $tokenData['token'];

$datos_post = json_encode(
    array(
        'tipoDocumento' => 'DNI',
        'codigoDocumento' => '72941485'
    )
);

$opciones = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => [
            'authorization: ' . $tokenEquifax,
            'content-type: application/json;charset=UTF-8'
        ],
        'content' => $datos_post
    )
);

$contexto = stream_context_create($opciones);

$resultado = file_get_contents('https://oim.mapfre.com.pe/oim_polizas/api/form/person/equifax', false, $contexto);

$res = json_decode($resultado, true);

if( $res['OperationCode'] == 200) {
    $data = [
        'tipoDoc' => $res['Data']['TipoDocumento'],
        'numDoc' => $res['Data']['CodigoDocumento'],
        'apePater' => $res['Data']['ApellidoPaterno'],
        'apeMater' => $res['Data']['ApellidoMaterno'],
        'nombre' => $res['Data']['Nombre'],
        'fNac' => date($res['Data']['FechaNacimiento']),
        'sexo' => ($res['Data']['Sexo'] == '0') ? 'F': 'M'
    ];
} else {
    $data = array();
}

$data = [
    'status' => $res['OperationCode'],
    'message' => $res['Message'],
    'data' => $data
];

header('Content-type: text/javascript');

print_r($res);
//echo json_encode($data, JSON_PRETTY_PRINT);

?>