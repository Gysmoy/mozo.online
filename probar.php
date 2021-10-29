<?php

$b64image = base64_encode(file_get_contents('http://34.102.135.155/pdfs/cotizacion/00009236'));

echo $b64image;

?>