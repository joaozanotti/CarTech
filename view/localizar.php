<?php
require_once '../control/public.php';

$id = @$_GET['id'];

if (strpos($id, "cliente") !== false) {
    $id = substr($id, 7);

} else if (strpos($id, "mecanico") !== false) {
    $id = substr($id, 8);

} else if (strpos($id, "servico") !== false) {
    $id = substr($id, 7);

} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>