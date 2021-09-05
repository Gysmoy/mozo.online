<?php

// Necesitamos el conector a la BD
include_once 'database.php';

function consultUser($user)
{
    $db = new Database();
    $query = $db->connect()->prepare('SELECT `idUser` FROM `users` WHERE idPage = :idPage');
    $query->execute([
        ':idPage' => $user
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result['idUser'];
    } else {
        return false;
    }
};

if (isset($_POST['idPage'])) {
    $idUser = consultUser($_POST['idPage']);
    if ($idUser) {
        $dishesPath = '../../files/' . $idUser . '/dishes.json';
        $dishesData = file_get_contents($dishesPath);
        $dishes = json_decode($dishesData, true);

        $data = [
            'status' => 200,
            'message' => 'Los datos se han obtenido sin errores',
            'data' => $dishes
        ];
    } else {
        $data = [
            'status' => 400,
            'message' => 'Esta página no está registrada en nuestra BD',
            'data' => []
        ];
    }

    header('Content-type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
}