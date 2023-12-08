<?php
require_once '../control/public.php';

$vetClientes = $clienteControl->listarObj();
foreach ($vetClientes as $cliente) {
   $cliente->toPrint();
   echo "<br><br>";
}
echo "<hr>";
$vetMecanicos = $mecanicoControl->listarObj();
foreach ($vetMecanicos as $mecanico) {
   $mecanico->toPrint();
   echo "<br><br>";
}
echo "<hr>";
$vetServicos = $servicoControl->listarObj();
foreach ($vetServicos as $servico) {
   $servico->toPrint();
   echo "<br><br>";
}

/* Deletando
$mecanico = $mecanicoControl->buscarPorId(2);
print_r($mecanico);
*/

/* Atualizando serviço
$servico = $servicoControl->buscarPorId(1);
print_r($servico->getData());
$servico->setData("");
print_r($servico->getData());
$servicoControl->atualizar($servico);
*/

/* Buscando por CPF
$cliente = $mecanicoControl->buscarPorCpf('999.888.777-66');
print_r($cliente);
if ($cliente == null) {
   echo "falha";
} else {
   echo "sucesso";
}
*/

/*
$mecanico = $mecanicoControl->buscarPorId(2);
print_r($mecanico);
$servico = new Servico("Troca de óleo", 200.00, "", "30min", $cliente, $mecanico);
print_r($servico);

if ($servicoControl->cadastrar($servico)) {
   echo "cu";
} else {
   echo "pau";
}
*/

/* Atualizando mecânico
$mecanico = new Mecanico("Eduardo Janz", "666.777.888-99", "(11)96385-2741", "Rua São Paulo, São Paulo - SP", 6000, "Chefe", "Motor a diesel");
$mecanico->setId(4);

if ($mecanicoControl->atualizar($mecanico)) {
   echo "Mecânico atualizado com sucesso.";
} else {
   echo "Erro! Informações inválidas.";
}
*/
?>