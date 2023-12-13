<?php
// Requerindo as classes de control
require_once '../control/public.php';

// Recebendo os dados pelo GET
$url = @$_GET['url'];
$id = @$_GET['id'];

// Verificando o dado recebido pela url para realizar a função correta
if ($url == "cliente") {
    // Buscando o cliente a ser deletado pelo id
    $cliente = $clienteControl->buscarPorId($id);
    if ($cliente != null) {
        // Deletando o cliente
        if ($clienteControl->deletar($cliente) == true) {
            header('Location: cliente/listagem-cliente.php?resultExcluir=sucesso');
        } else {
            header('Location: cliente/listagem-cliente.php?resultExcluir=erroInfo');
        }
    } else {
        header('Location: cliente/listagem-cliente.php?resultExcluir=erroPessoa');
    }

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "mecanico") {
    // Buscando o mecânico a ser deletado pelo id
    $mecanico = $mecanicoControl->buscarPorId($id);
    if ($mecanico != null) {
        // Deletando o mecânico
        if ($mecanicoControl->deletar($mecanico) == true) {
            header('Location: mecanico/listagem-mecanico.php?resultExcluir=sucesso');
        } else {
            header('Location: mecanico/listagem-mecanico.php?resultExcluir=erroInfo');
        }
    } else {
        header('Location: mecanico/listagem-mecanico.php?resultExcluir=erroPessoa');
    }

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "servico") {
    // Buscando o serviço a ser deletado pelo id
    $servico = $servicoControl->buscarPorId($id);
    if ($servico != null) {
        // Deletando o serviço
        $servicoControl->deletar($servico);
        header('Location: servico/listagem-servico.php?resultExcluir=sucesso');
    } else {
        header('Location: servico/listagem-servico.php?resultExcluir=erroPessoa');
    }

// Verificando o dado recebido pela url para realizar a função correta
} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>