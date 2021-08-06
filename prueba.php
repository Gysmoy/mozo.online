<?php

session_start();

$path = getcwd() . '/files/' . $_SESSION['idUser'] . '/pending';

$data = scandir($path);

header('Content-type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);

?>