<?php
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

echo criaHeader("Serviços");

$vetServicos = $servicoControl->listarObj();
foreach ($vetServicos as $servico) {
   $servico->toPrint();
   echo "<br><br>";
}

echo criaFooter();
?>