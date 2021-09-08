<?php 

include_once 'assets/php/database.php';

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
        // Si el idPage no coincide se redirecciona a la Página principal
        header('location: index.php');
    }
};

if (isset($_GET['page'])) {
    $idUser = consultUser($_GET['page']);

    // Obtenemos la configuración según usuario
    $configPath = 'files/' . $idUser . '/config.json';
    $configData = file_get_contents($configPath);
    $config = json_decode($configData, true);

    // Obtenemos los platos según usuario
    $dishesPath = 'files/' . $idUser . '/dishes.json';
    $dishesData = file_get_contents($dishesPath);
    $dishes = json_decode($dishesData, true);

    // Obtención de imágenes generales
    $logoImagePath = 'files/' . $idUser . '/img/logo.png';
    if (file_exists($logoImagePath)) {
        $logoImage = $logoImagePath;
    } else {
        $logoImage = 'img/logo.png';
    }
    $backgroundImagePath = 'files/' . $idUser . '/img/background.jpg';
    if (file_exists($backgroundImagePath)) {
        $backgroundImage = $backgroundImagePath;
    } else {
        $backgroundImage = 'img/background.jpg';
    }
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/<?php echo $logoImage; ?>" type="image/png" />
        <title><?php echo $config['title']; ?></title>
        <style>
            <?php
            echo
            ':root {
        /* General */
        --general-background: ' . $config['general']['background'] . ';
        
        /* Header, Main, Footer */
        --hmf-background: ' . $config['hmf']['background'] . ';
        --hmf-shadow: ' . $config['hmf']['shadow'] . ';
        
        /* Header individuals */
        --header-logoShadow: ' . $config['header']['logoShadow'] . ';
        --header-button-shadow: ' . $config['header']['button']['shadow'] . ';
        --header-button-mainColor: ' . $config['header']['button']['mainColor'] . ';
        --header-button-contrastColor: ' . $config['header']['button']['contrastColor'] . ';

        /* Main individuals */
        --main-title-background: ' . $config['main']['title']['background'] . ';
        --main-title-color: ' . $config['main']['title']['color'] . ';
        --main-table-thead-background: ' . $config['main']['table']['thead']['background'] . ';
        --main-table-thead-color: ' . $config['main']['table']['thead']['color'] . ';
        --main-table-tbody-imgShadow: ' . $config['main']['table']['tbody']['imgShadow'] . ';
        --main-table-tbody-color: ' . $config['main']['table']['tbody']['color'] . ';
        --main-table-tbody-price-background: ' . $config['main']['table']['tbody']['price']['background'] . ';
        --main-table-tbody-price-color: ' . $config['main']['table']['tbody']['price']['color'] . ';
        --main-table-tbody-orderButton-background: ' . $config['main']['table']['tbody']['orderButton']['background'] . ';
        --main-table-tbody-orderButton-color: ' . $config['main']['table']['tbody']['orderButton']['color'] . ';
        --main-table-tbody-orderInput-border: ' . $config['main']['table']['tbody']['orderInput']['border'] . ';
        --main-table-tbody-orderInput-background: ' . $config['main']['table']['tbody']['orderInput']['background'] . ';
        --main-table-tbody-orderInput-color: ' . $config['main']['table']['tbody']['orderInput']['color'] . ';

        /* Carrito individuals */
        --carrito-title-background: ' . $config['carrito']['title']['background'] . ';
        --carrito-title-color: ' . $config['carrito']['title']['color'] . ';
        --carrito-table-thead-background: ' . $config['carrito']['table']['thead']['background'] . ';
        --carrito-table-thead-color: ' . $config['carrito']['table']['thead']['color'] . ';
        --carrito-table-tbody-color: ' . $config['carrito']['table']['tbody']['color'] . ';
        --carrito-table-tbody-price-background: ' . $config['carrito']['table']['tbody']['price']['background'] . ';
        --carrito-table-tbody-price-color: ' . $config['carrito']['table']['tbody']['price']['color'] . ';
    }';
            ?>
        </style>
        <link rel="stylesheet" href="/assets/css/style.css">
        <script type="text/javascript">
            var idPage = '<?php echo $_GET['page']; ?>';
        </script>
    </head>

    <body>
        <header>
            <style>
                header {
                    background-image: url(/<?php echo $backgroundImage; ?>);
                }
            </style>
            <img src="/<?php echo $logoImage; ?>" alt="Mozo en línea" id="logo" loading="lazy">
            <div>
                <select id="platos"></select>
                <button id="ordenar">Ordenar [<span id="total">S/ 00.00</span>]</button>
                <button id="btncarrito">🛒 [<span id="spancarrito">0</span>]</button>
            </div>
        </header>
        <main>
            <div id="title">Title Here</div>
            <div id="dishes"></div>
        </main>
        <section style="display: none;">
            <div id="shower">
                <table id="namePriceContainer">
                    <tbody>
                        <tr>
                            <td id="name"></td>
                            <td>
                                <p id="realPrice"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id="orderContainer">
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <button id="min">-</button>
                                    <input type="number" id="quantity" min="0" value="0" max="0">
                                    <button id="max">+</button>
                                    <button id="max5">+5</button>
                                </div>
                            </td>
                            <td>
                                <div id="totalPrice">0.00</div>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                                <textarea id="specification" placeholder="Especificaciones..."></textarea>
                            </td>
                            <td>
                                <button id="accept">Aceptar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button id="cancel">Cancelar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <footer>
            <ul>
                <li>Copyright &copy; Mozo en línea</li>
                <li>Version 1.0.0</li>
                <li>Powered by <a href="http://gysmoy.epizy.com" title="Carlos Manuel Gamboa Palomino y Ruth Najhely Gutierrez Castro">Gysmoy & Kizzi</a></li>
            </ul>
        </footer>
        <script type="text/javascript" src="/assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="/assets/js/getDishes.js"></script>
        <script type="text/javascript" src="/assets/js/quantityPrice.js"></script>
        <script type="text/javascript" src="/assets/js/addToCart.js"></script>
    </body>

    </html>

<?php
} else {
    include_once 'home/index.php';
}
?>