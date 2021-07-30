<?php
include_once '../../../assets/php/database.php';

$html = '
Ups, no deberias estar aquí...
<script>
    setTimeout(() => {
        location.href = "/";
    }, 1000);
</script>
';

if (!empty($_POST)) {
    if(isset($_POST['username']) || isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        $token = $_POST['token'];
        $tokenBrutoServer = 'Mozo' . $_POST['password'] . 'Online';
        $tokenServer = hash('sha256', $tokenBrutoServer);
        if ($token === $tokenServer) {
            $db = new Database();
            $query = $db -> connect() -> prepare('SELECT
                `username`, `idUser`, `idPage`
                FROM `users`
                WHERE `username` = :username
                AND `password` = :password
                ');
            $query -> execute([
                ':username' => $username,
                ':password' => $password
            ]);
            $result = $query -> fetch(PDO::FETCH_ASSOC);
            if ($result) {
                session_start();
                $_SESSION['access'] = true;
                $_SESSION['username'] = $result['username'];
                $_SESSION['idUser'] = $result['idUser'];
                $_SESSION['idPage'] = $result['idPage'];
                $data = array(
                    'access' => true,
                    'message' => 'Bienvenido @' . $result['username']
                );
            } else {
                $data = array(
                    'access' => false,
                    'message' => 'Credenciales incorrectas'
                );
            }
        } else {
            $data = array(
                'access' => false,
                'message' => 'Token inválido'
            );
        }
        
    } else {
        $data = array(
            'access' => false,
            'message' => 'Completa todos los campos'
        );
    }
    header('Content-type: text/javascript');
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    echo $html;
}
?>