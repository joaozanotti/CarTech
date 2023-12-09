<?php
$path = __DIR__ . '/';

require_once $path . '../model/Database.class.php';
require_once $path . '../model/Cliente.class.php';
require_once $path . '../model/Mecanico.class.php';
require_once $path . '../model/Servico.class.php';
require_once $path . '../control/ClienteControl.class.php';
require_once $path . '../control/MecanicoControl.class.php';
require_once $path . '../control/ServicoControl.class.php';

$db = new Database("localhost", "root", "", "mecanica");   
$clienteControl = new ClienteControl($db);
$mecanicoControl = new MecanicoControl($db);
$servicoControl = new ServicoControl($db, $clienteControl, $mecanicoControl);
?>