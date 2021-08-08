<?php
include_once '../../../assets/php/database.php';
include_once 'hasValue.php';

$data = array(
    'access' => false,
    'message' => ''
);

function userExists($username) {
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT
        `username`
        FROM `users`
        WHERE `username` = :username
        ');
    $query -> execute([
        ':username' => $username
    ]);
    $result = $query -> fetch(PDO::FETCH_ASSOC);
    return ($result) ? true: false;
}

if(
    empty($_POST)
) {
    $data['access'] = false;
    $data['message'] = 'El acceso a este archivo ha sido denegado';
} else if (
    !hasValue($_POST['username']) &&
    !hasValue($_POST['firstPassword']) &&
    !hasValue($_POST['secondPassword']) &&
    !hasValue($_POST['token'])
) {
    $data['access'] = false;
    $data['message'] = 'Complete todos los campos';
} else if (
    userExists($_POST['username'])
) {
    $data['access'] = false;
    $data['message'] = 'El usuario ' . $_POST['username'] . ' ya está en uso';
} else if (
    !filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)
) {
    $data['access'] = false;
    $data['message'] = 'Ingrese un correo en el campo de usuario';
} else if (
    $_POST['firstPassword'] != $_POST['secondPassword']
)
{
    $data['access'] = false;
    $data['message'] = 'Las contraseñas deben ser iguales';
} else if(
    $_POST['token'] != hash('sha256', 'Mozo' . $_POST['firstPassword'] . '2021' . $_POST['secondPassword'] . 'Online')
) {
    $data['access'] = false;
    $data['message'] = 'Token inválido, intente denuevo';
} else {
    try {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['firstPassword']);
        $idUser = hash('CRC32', $username);
        $idPage = substr($username, 0, strpos($username, '@'));

        // Creación de directorios de usuario
        $path = '..\\..\\..\\files\\' . $idUser . '\\';
        if (!file_exists($path . 'img\\')) {
            mkdir($path . 'img\\', 0777, true);
        }
        if (!file_exists($path . 'img\\dishes\\')) {
            mkdir($path . 'img\\dishes\\', 0777, true);
        }
        if (!file_exists($path . 'pending\\')) {
            mkdir($path . 'pending\\', 0777, true);
        }

        // Copiando los archivos por defecto
        copy('..\\..\\..\\files\\maindata\\config.json', $path . 'config.json');
        copy('..\\..\\..\\files\\maindata\\dishes.json', $path . 'dishes.json');
        copy('..\\..\\..\\files\\maindata\\background.jpg', $path . 'img\\background.jpg');
        copy('..\\..\\..\\files\\maindata\\default.jpg', $path . 'img\\default.jpg');
        copy('..\\..\\..\\files\\maindata\\logo.png', $path . 'img\\logo.png');
        
        // Creación del usuario en la BD
        $db = new Database();
        $query = $db -> connect() -> prepare('INSERT INTO `users`
            (`id`,`username`, `password`, `iduser`, `idPage`) VALUES
            (NULL, :username, :password, :idUser, :idPage)
        ');
        $result = $query -> execute([
            ':username' => $username,
            ':password' => $password,
            ':idUser' => $idUser,
            ':idPage' => $idPage
        ]);
        if ($result) {
            session_start();
            $_SESSION['access'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['idUser'] = $idUser;
            $_SESSION['idPage'] = $idPage;
            $data['access'] = true;
            $data['message'] = 'El usuario ha sido creado satisfactóriamente';
        } else {
            $data['access'] = false;
            $data['message'] = 'Ocurrió un error inesperado, inténtelo denuevo';
        }
    } catch (Exception $e) {
        $data['access'] = false;
        $data['message'] = 'Error: ' . $e -> getMessage();
    }
}

header('Content-type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>