<?php
session_start();

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header('location: login.php');
}

if(isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    // Nothing to do
}
?>

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/png" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="form">
        <img src="../img/logo.png" alt="">
        <form autocomplete="off">
            <div class="title">Ingrese a su cuenta</div>
            <div class="message">Message here</div>
            <div class="username">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" placeholder="Ingrese su usuario" required>
            </div>
            <div class="password">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="button">
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
        <div class="dha">
            ¿Aún no tienes una cuenta? <a href="signup.php">Registrate</a>
        </div>
    </div>
    <script src="../assets/js/noInspect.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/sha256.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>