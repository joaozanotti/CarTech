<?php
$url = $_GET['url'];

if (strpos($url, "cliente") > 0) {
    echo 'veio do cliente';
} else if (strpos($url, "mecanico") > 0) {
    echo 'veio do mecanico';
} else if (strpos($url, "servico")) {
    echo 'veio do servico';
}
?>