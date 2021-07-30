<?php
if(isset($_POST['carta'])){
    $carta = json_decode($_POST['carta'], true);
} else {
    $carta = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/png" />
    <title>Mozo en línea | Carta</title>
    <link rel="stylesheet" href="assets/css/carta.css">
</head>
<body>
    <header>
        <h1>Mozo en línea | Carta</h1>
    </header>
    <main>
        <div id="carta">
            <div>
                <p>Restaurante E.I.R.L</p>
                <p>LOCAL: JR. 28 DE JULIO 236 URB CERCADO</p>
                <p>DEPARTAMENTO - PROVINCIA - DISTRITO</p>
                <p>RUC: 00000000000</p>
            </div>
            <div>
                <p>MOZO EN LÍNEA</p>
                <p>OPERACIÓN: 00000000</p>
                <p>FECHA EMISIÓN: <?php echo date("d/m/Y H:i:s")?></p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>CANT</th>
                        <th width="100%">DESCRIPCIÓN</th>
                        <th>P.U.</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                foreach($carta as $plato) {
                    $cantidad = $plato['cantidad'];
                    $descripcion = $plato['nombre'];
                    $precio = number_format($plato['precio'], 2);
                    $subtotal = number_format($cantidad * $precio, 2);
                    $total += $subtotal;
                    echo "
                    <tr>
                        <td>$cantidad</td>
                        <td>$descripcion</td>
                        <td>$precio</td>
                        <td>$subtotal</td>
                    </tr>
                    ";
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td><p><?php echo number_format($total, 2)?></p></td>
                    </tr>
                </tfoot>
            </table>
            <section>
                <?php echo number_format($total, 2)?>
            </section>
            <div>
                <?php
                $url = 'http://mozo.online/?page=' . $_GET['page'];
                $qrcode = 'https://api.qrserver.com/v1/create-qr-code/?data=' . $url;
                ?>
                <p>Puede realizar un nuevo pedido en:</p>
                <img src="<?php echo $qrcode?>" alt="" width="150px">
                <p><?php echo $url; ?></p>
                <p>¡GRACIAS POR PREFERIRNOS!</p>
            </div>
        </div>
        <div>
            <button id="descargar">Descargar Carta</button>
            <button id="openwa">Abrir WhatsApp</button>
        </div>
    </main>
</body>
</html>