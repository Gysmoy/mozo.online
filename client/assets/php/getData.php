<?php
session_start();
if ( !isset( $_SESSION['access'] ) ) {
    session_unset();
    session_destroy();
    header('location: /client/login.php');
}

function getGeneralData() {
    include_once '../../../assets/php/database.php';
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT username, idPage FROM users WHERE idUser = :idUser');
    $query -> execute([
        'idUser' => $_SESSION['idUser']
    ]);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    $configPath = file_get_contents('../../../files/' . $_SESSION['idUser'] . '/config.json');
    $config = json_decode($configPath, true);

    $data = array(
        'status' => true,
        'message' => 'Los datos han sido obtenidos sin errores',
        'data' => array(
            'title' => $config['title'],
            'username' => $row['username'],
            'idPage' => $row['idPage']
        )
    );
    return $data;
}

function getBasicConfig() {
    $colorPath = file_get_contents('../../../files/' . $_SESSION['idUser'] . '/config.json');
    $color = json_decode($colorPath, true);
    $data = array(
        'status' => true,
        'message' => 'Los datos han sido obtenidos sin errores',
        'data' => array(
            'primaryColor' => $color['main']['table']['thead']['background'],
            'carritoColor' => $color['carrito']['table']['thead']['background'],
            'letrasColor' => $color['main']['table']['tbody']['color'],
            'letrasColorContrast' => $color['main']['table']['thead']['color'],
            'priceColor' => $color['main']['table']['tbody']['price']['background'],
            'priceColorCarrito' => $color['carrito']['table']['tbody']['price']['background']
        )
    );
    return $data;
}

function getAdvancedConfig() {
    $colorPath = file_get_contents('../../../files/' . $_SESSION['idUser'] . '/config.json');
    $color = json_decode($colorPath, true);
    $data = array(
        'status' => true,
        'message' => 'Los datos han sido obtenidos sin errores',
        'data' => $color
    );
    return $data;
}

switch ($_POST['function']) {
    case 'getGeneralData':
        $data = getGeneralData();
        break;
    case 'getBasicConfig':
        $data = getBasicConfig();
        break;
    case 'getAdvancedConfig':
        $data = getBasicConfig();
        break;
    default:
        $data = array();
        break;
}

header('Content-type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>