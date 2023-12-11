<?php
require_once '../control/public.php';

$url = @$_GET['url'];

if ($url == "cliente" || $url == "mecanico") {
    $nome = @$_POST['nome'];
    $cpf = @$_POST['cpf'];
    $telefone = @$_POST['telefone'];
    $endereco = @$_POST['endereco'];

    if ($url == "cliente") {
        $pagamento = @$_POST['pagamento'];
                
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($pagamento == "")) {
            header('Location: cliente/cadastro-cliente.php?result=erroInfo');
        } else {
            if ($pessoaControl->buscarPorCpf($cpf) != null) {
                header('Location: cliente/cadastro-cliente.php?result=erroPessoa');
            } else {
                $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                $clienteControl->cadastrar($cliente);
                header('Location: cliente/cadastro-cliente.php?result=sucesso');
            } 
        }
            
    } else {
        $salario = @$_POST['salario'];
        $cargo = @$_POST['cargo'];
        $especializacao = @$_POST['especializacao'];
            
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($salario == "") || ($cargo == "") || ($especializacao == "")) {
            header('Location: mecanico/cadastro-mecanico.php?result=erroInfo');
        } else {
            if ($pessoaControl->buscarPorCpf($cpf) != null) {
                header('Location: mecanico/cadastro-mecanico.php?result=erroPessoa');
            } else {
                $mecanico = new Mecanico($nome, $cpf, $telefone, $endereco, $salario, $cargo, $especializacao);
                $mecanicoControl->cadastrar($mecanico);
                header('Location: mecanico/cadastro-mecanico.php?result=sucesso');
            }
        }
    }

} else if ($url == "servico") {
    $tipo = @$_POST['tipo'];
    $valor = @$_POST['valor'];
    $tempoDuracao = @$_POST['tempoDuracao'];
    $cpfCliente = @$_POST['cpfCliente'];
    $cpfMecanico = @$_POST['cpfMecanico'];

    if (($tipo == "") || 
        ($valor == "") ||  
        ($tempoDuracao == "") ||
        ($cpfCliente == "") ||
        ($cpfMecanico == "")) {
        header('Location: servico/cadastro-servico.php?result=erroInfo');

    } else {
        $cliente = $clienteControl->buscarPorCpf($cpfCliente);
        $mecanico = $mecanicoControl->buscarPorCpf($cpfMecanico);

        if ($cliente == null || $mecanico == null) {
            header('Location: servico/cadastro-servico.php?result=erroPessoa');
        } else {
            $servico = new Servico($tipo, $valor, "", $tempoDuracao, $cliente, $mecanico);
            $servicoControl->cadastrar($servico);
            header('Location: servico/cadastro-servico.php?result=sucesso');
        }  
    }
} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>