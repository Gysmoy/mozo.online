<?php
session_start();
if(isset($_SESSION['access'])) {
    // Nothing to do
} else {
    session_unset();
    session_destroy();
    header('location: /client/login.php');
}
function setTitle($title) {
    $idUser = $_SESSION['idUser'];
    $configPath = '../../../files/' . $idUser . '/config.json';
    $configData = file_get_contents($configPath);
    $config = json_decode($configData, true);
    $config['title'] = $title;
    try {
        file_put_contents($configPath, json_encode($config));
        return json_encode(array(
            'status' => true,
            'message' => 'Se han guardado los cambios'
        ));
    } catch (Exception $e) {
        return json_encode(array(
            'status' => false,
            'message' => 'Error: ' . $e
        ));
    }
}
function setidPage($idPage) {
    include_once '../../../assets/php/database.php';
    $idUser = $_SESSION['idUser'];
    $db = new Database();
    $query = $db -> connect() -> prepare('UPDATE users SET idPage = :idPage WHERE idUser = :idUser');
    $result = $query -> execute([
        ':idPage' => $idPage,
        ':idUser' => $idUser
    ]);
    if ($result) {
        return json_encode(array(
            'status' => true,
            'message' => 'Se han guardado los cambios'
        ));
    } else {
        return json_encode(array(
            'status' => False,
            'message' => 'Hubo un error en los cambios'
        ));
    }
}
function setGeneralConfigColor($data) {
    $idUser = $_SESSION['idUser'];
    $configPath = '../../../files/' . $idUser . '/config.json';
    $configData = file_get_contents($configPath);
    $config = json_decode($configData, true);
    $data = json_decode($data, true);

    // Seteamos la configuración
    $config['header']['button']['mainColor'] = $data['primaryColor'];
    $config['main']['title']['background'] = $data['primaryColor'];
    $config['main']['table']['thead']['background'] = $data['primaryColor'];
    $config['main']['table']['tbody']['orderButton']['background'] = $data['primaryColor'];
    $config['main']['table']['tbody']['orderInput']['border'] = $data['primaryColor'];

    $config['carrito']['title']['background'] = $data['carritoColor'];
    $config['carrito']['table']['thead']['background'] = $data['carritoColor'];

    $config['main']['table']['tbody']['color'] = $data['letrasColor'];
    $config['main']['table']['tbody']['orderInput']['color'] = $data['letrasColor'];
    $config['carrito']['table']['tbody']['color'] = $data['letrasColor'];

    $config['header']['button']['contrastColor'] = $data['letrasColorContrast'];
    $config['main']['title']['color'] = $data['letrasColorContrast'];
    $config['main']['table']['thead']['color'] = $data['letrasColorContrast'];
    $config['main']['table']['tbody']['price']['color'] = $data['letrasColorContrast'];
    $config['main']['table']['tbody']['orderButton']['color'] = $data['letrasColorContrast'];
    $config['main']['table']['tbody']['orderInput']['background'] = $data['letrasColorContrast'];
    $config['carrito']['title']['color'] = $data['letrasColorContrast'];
    $config['carrito']['table']['thead']['color'] = $data['letrasColorContrast'];
    $config['carrito']['table']['tbody']['price']['color'] = $data['letrasColorContrast'];

    $config['main']['table']['tbody']['price']['background'] = $data['priceColor'];
    $config['carrito']['table']['tbody']['price']['background'] = $data['priceColorCarrito'];

    try {
        file_put_contents($configPath, json_encode($config));
        return json_encode(array(
            'status' => true,
            'message' => 'Se han guardado los cambios'
        ));
    } catch (Exception $e) {
        return json_encode(array(
            'status' => false,
            'message' => 'Error: ' . $e
        ));
    }
}
switch ($_POST['function']) {
    case 'setTitle':
        echo setTitle($_POST['data']);
        break;
    case 'setidPage':
        echo setidPage($_POST['data']);
        break;
    case 'setGeneralConfigColor':
        echo setGeneralConfigColor($_POST['data']);
        break;
    default:
        # code...
        break;
}
?>