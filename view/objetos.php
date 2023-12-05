<?php
include "../model/Database.class.php";
include '../model/Cliente.class.php';
include '../model/Mecanico.class.php';
include '../control/ClienteControl.class.php';
include '../control/MecanicoControl.class.php';

$db = new Database("localhost", "root", "", "mecanica");   
$clienteControl = new ClienteControl($db);
$mecanicoControl = new MecanicoControl($db);

$cliente = $clienteControl->buscarPorId(1);
$cliente->toPrint();
echo "<br><br>";
$mecanico = $mecanicoControl->buscarPorId(2);
$mecanico->toPrint();

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