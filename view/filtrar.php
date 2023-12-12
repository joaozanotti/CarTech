<?php
require_once '../control/public.php';
require_once '../control/funcoes.php';

$url = @$_GET['url'];
$id = @$_GET['id'];
$cpf = @$_POST['cpf'];

if ($url == "cliente") {
    echo criaHeader("Clientes", "Filtrar");

    if ($cpf == "" || strlen($cpf) != 14) {
        header('Location: cliente/filtro-cliente.php?result=erroInfo'); 
    } else {
        $cliente = $clienteControl->buscarPorCpf($cpf);

        if ($cliente == null) {
            header('Location: cliente/filtro-cliente.php?result=erroPessoa');

        } else {
            $vetClientes = $clienteControl->listarObj();
        }
    }
    
    echo criaFooter();

} else if ($url == "mecanico") {
    echo criaHeader("Mecânicos", "Filtrar");

    if ($cpf == "" || strlen($cpf) != 14) {
        header('Location: mecanico/filtro-mecanico.php?result=erroInfo'); 
    } else {
        $mecanico = $mecanicoControl->buscarPorCpf($cpf);

        if ($mecanico == null) {
            header('Location: mecanico/filtro-mecanico.php?result=erroPessoa');

        } else {
            $vetMecanicos = $mecanicoControl->listarObj();
        }
    }

    echo criaFooter();

} else {
    header('Location: cliente/gerenciar-cliente.php');
}