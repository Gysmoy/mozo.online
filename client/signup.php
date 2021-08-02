<?php
session_start();
if (isset($_SESSION['rol'])) {
    header('location: index.php');
} else {
    // Nothing to do
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mozo en línea | Registro</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/png" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="form">
        <img src="../img/logo.png" alt="">
        <form autocomplete="off">
            <div class="title">Regístrese para obtener una cuenta</div>
            <div class="message">Message here</div>
            <div class="username">
                <label for="username">Correo de usuario</label>
                <input type="text" id="username" placeholder="correo@ejemplo.com" required>
            </div>
            <div class="password">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Ingrese su contraseña">
            </div>
            <div class="password">
                <label for="confirmpassword">Confirmar contraseña</label>
                <input type="password" id="confirmpassword" placeholder="Confirme su contraseña">
            </div>
            <div class="button">
                <input type="submit" value="Crear una cuenta nueva">
            </div>
        </form>
        <div class="dha">
            ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
        </div>
    </div>
    <script src="../assets/js/noInspect.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/sha256.js"></script>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/signup.js"></script>
</body>

</html>