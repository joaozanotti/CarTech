<?php
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

echo criaHeader("Clientes");

$vetClientes = $clienteControl->listarObj();
foreach ($vetClientes as $cliente) {
   $cliente->toPrint();
   echo "<br><br>";
}

echo criaFooter();
?>