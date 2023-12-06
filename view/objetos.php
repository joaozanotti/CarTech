<?php
include "../model/Database.class.php";
include '../model/Cliente.class.php';
include '../model/Mecanico.class.php';
include '../control/ClienteControl.class.php';
include '../control/MecanicoControl.class.php';

$db = new Database("localhost", "root", "", "mecanica");   
$clienteControl = new ClienteControl($db);
$mecanicoControl = new MecanicoControl($db);

$vetClientes = $clienteControl->listarObj();
foreach ($vetClientes as $cliente) {
   print_r($cliente);
   echo "<br><br>";
}

$vetMecanicos = $mecanicoControl->listarObj();
foreach ($vetMecanicos as $mecanico) {
   print_r($mecanico);
   echo "<br><br>";
}


$mecanico = new Mecanico("Eduardo Janz", "666.777.888-99", "(11)96385-2741", "Rua São Paulo, São Paulo - SP", 6000, "Chefe", "Motor a diesel");
$mecanico->setId(4);

if ($mecanicoControl->atualizar($mecanico)) {
   echo "Mecânico atualizado com sucesso.";
} else {
   echo "Erro! Informações inválidas.";
}


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