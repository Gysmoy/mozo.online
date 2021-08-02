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
        $data = array(
            'status' => true,
            'message' => 'Se han guardado los cambios'
        );
    } catch (Exception $e) {
        $data = array(
            'status' => false,
            'message' => 'Error: ' . $e
        );
    }
    return $data;
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
        $data = array(
            'status' => true,
            'message' => 'Se han guardado los cambios'
        );
    } else {
        $data = array(
            'status' => False,
            'message' => 'Hubo un error en los cambios'
        );
    }
    return $data;
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
        $data = array(
            'status' => true,
            'message' => 'Se han guardado los cambios'
        );
    } catch (Exception $e) {
        $data = array(
            'status' => false,
            'message' => 'Error: ' . $e
        );
    }
}

switch ($_POST['function']) {
    case 'setTitle':
        $data = setTitle($_POST['data']);
        break;
    case 'setidPage':
        $data = setidPage($_POST['data']);
        break;
    case 'setGeneralConfigColor':
        $data = setGeneralConfigColor($_POST['data']);
        break;
    default:
        $data = array();
        break;
}

header('Content-type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>