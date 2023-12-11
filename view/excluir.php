<?php
require_once '../control/public.php';

$url = @$_GET['url'];
$id = @$_GET['id'];

if ($url == "cliente") {
    $cliente = $clienteControl->buscarPorId($id);
    if ($cliente != null) {
        if ($clienteControl->deletar($cliente) == true) {
            header('Location: cliente/listagem-cliente.php?resultExcluir=sucesso');
        } else {
            header('Location: cliente/listagem-cliente.php?resultExcluir=erroInfo');
        }
    } else {
        header('Location: cliente/listagem-cliente.php?resultExcluir=erroPessoa');
    }

} else if ($url == "mecanico") {
    $mecanico = $mecanicoControl->buscarPorId($id);
    if ($mecanico != null) {
        if ($mecanicoControl->deletar($mecanico) == true) {
            header('Location: mecanico/listagem-mecanico.php?resultExcluir=sucesso');
        } else {
            header('Location: mecanico/listagem-mecanico.php?resultExcluir=erroInfo');
        }
    } else {
        header('Location: mecanico/listagem-mecanico.php?resultExcluir=erroPessoa');
    }

} else if ($url == "servico") {
    $servico = $servicoControl->buscarPorId($id);
    if ($servico != null) {
        $servicoControl->deletar($servico);
        header('Location: servico/listagem-servico.php?resultExcluir=sucesso');
    } else {
        header('Location: servico/listagem-servico.php?resultExcluir=erroPessoa');
    }

} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>