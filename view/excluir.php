<?php
require_once '../control/public.php';

$id = @$_GET['id'];

if (strpos($id, "cliente") !== false) {
    $id = substr($id, 7);
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

} else if (strpos($id, "mecanico") !== false) {
    $id = substr($id, 8);
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

} else if (strpos($id, "servico") !== false) {
    $id = substr($id, 7);
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