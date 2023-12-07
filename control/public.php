<?php
require_once '../model/Database.class.php';
require_once '../model/Cliente.class.php';
require_once '../model/Mecanico.class.php';
require_once '../model/Servico.class.php';
require_once '../control/ClienteControl.class.php';
require_once '../control/MecanicoControl.class.php';
require_once '../control/ServicoControl.class.php';

$db = new Database("localhost", "root", "", "mecanica");   
$clienteControl = new ClienteControl($db);
$mecanicoControl = new MecanicoControl($db);
$servicoControl = new ServicoControl($db, $clienteControl, $mecanicoControl);
?>