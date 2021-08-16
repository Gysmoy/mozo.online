<?php
$code = $_SERVER['REDIRECT_STATUS'];
$codes = array(
    403 => 'Lo sentimos, se le ha denegado el acceso a este contenido!',
    404 => 'La URL solicitada ' . $_SERVER['REQUEST_URI'] . ' no ha sido encontrada en este servidor',
    500 => 'Ha ocurrido un error de servidor interno, intentelo denuevo mas tarde'
);
$source_url = 'http' . ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (array_key_exists($code, $codes) && is_numeric($code)) {
    $codeMsg = $codes[$code];
} else {
    $codeMsg = 'Error desconocido';
}
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <title>Mozo en línea | Error</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/client/assets/css/main.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        section {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>

<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <section>
                    <header class="main">
                        <h1>Mozo en línea<span class="icon solid fa-exclamation"></span></h1>
                        <h2 id="content">Error <?php echo $code; ?></h2>
                        <p><b><?php echo $codeMsg; ?></b></p>
                        <a href="/" class="button primary icon solid fa-home">Ir a inicio</a></li>

                    </header>
                </section>
            </div>
        </div>
    </div>

    </div>

</body>

</html>