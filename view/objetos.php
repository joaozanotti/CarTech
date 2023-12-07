<?php
require_once 'public.php';

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

/*
$servico = $servicoControl->buscarPorId(1);
print_r($servico->getData());
$servico->setData("");
print_r($servico->getData());
$servicoControl->atualizar($servico);
*/

/*
$cliente = $mecanicoControl->buscarPorCpf('999.888.777-6');
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

/* Atualizando
$mecanico = new Mecanico("Eduardo Janz", "666.777.888-99", "(11)96385-2741", "Rua São Paulo, São Paulo - SP", 6000, "Chefe", "Motor a diesel");
$mecanico->setId(4);

if ($mecanicoControl->atualizar($mecanico)) {
   echo "Mecânico atualizado com sucesso.";
} else {
   echo "Erro! Informações inválidas.";
}
*/

/* Deletando
$mecanico = $mecanicoControl->buscarPorId(12);
$mecanicoControl->deletar($mecanico);
*/


// echo "<br><br>";
// $mecanico = $mecanicoControl->buscarPorId(2);
// $mecanico->toPrint();

/*
$userControl = new UsuarioControl($db);

$resultados = $userControl->listar();

//echo count($resultados);

for($i =0; $i<count($resultados); $i++) {
   // print_r($resultados[$i]);
   echo $resultados[$i]["nome"];
}

$usuario = $userControl->buscarPorId(18);
$usuario->setSenha('3212');
$usuario->setNome('Zanotti');
$userControl->atualizar($usuario);
*/
?>