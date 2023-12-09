<?php
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

echo criaHeader("Mecânicos");

$vetMecanicos = $mecanicoControl->listarObj();
foreach ($vetMecanicos as $mecanico) {
   $mecanico->toPrint();
   echo "<br><br>";
}

echo criaFooter();
?>