<?php
// Definindo o caminho para todas as classes serem requeridas corretamente
$path = __DIR__ . '/';

// Requerindo todas as classes
require_once $path . '../model/Database.class.php';
require_once $path . '../model/Cliente.class.php';
require_once $path . '../model/Mecanico.class.php';
require_once $path . '../model/Servico.class.php';
require_once $path . '../control/PessoaControl.class.php';
require_once $path . '../control/ClienteControl.class.php';
require_once $path . '../control/MecanicoControl.class.php';
require_once $path . '../control/ServicoControl.class.php';

// Criando a database e todos as classes de control
$db = new Database("localhost", "root", "", "mecanica");   
$pessoaControl = new PessoaControl($db);
$clienteControl = new ClienteControl($db);
$mecanicoControl = new MecanicoControl($db);
$servicoControl = new ServicoControl($db, $clienteControl, $mecanicoControl);
?>