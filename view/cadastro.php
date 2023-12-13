<?php
// Requerindo as classes de control
require_once '../control/public.php';

// Recebendo os dados pelo GET
$url = @$_GET['url'];

// Verificando o dado recebido pela url para realizar a função correta
if ($url == "cliente" || $url == "mecanico") {
    // Recebendo os dados pelo POST
    $nome = @$_POST['nome'];
    $cpf = @$_POST['cpf'];
    $telefone = @$_POST['telefone'];
    $endereco = @$_POST['endereco'];

    if ($url == "cliente") {
        // Recebendo os dados pelo POST
        $pagamento = @$_POST['pagamento'];
                
        // Verificando se os dados estão corretos
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($pagamento == "")) {
            header('Location: cliente/cadastro-cliente.php?result=erroInfo');
        } else {
            // Verificando se já não existe uma pessoa com o cpf do cliente a ser cadastrado
            if ($pessoaControl->buscarPorCpf($cpf) != null) {
                header('Location: cliente/cadastro-cliente.php?result=erroPessoa');
            } else {
                // Cadastrando o cliente
                $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                $clienteControl->cadastrar($cliente);
                header('Location: cliente/cadastro-cliente.php?result=sucesso');
            } 
        }
            
    } else {
        // Recebendo os dados pelo POST
        $salario = @$_POST['salario'];
        $cargo = @$_POST['cargo'];
        $especializacao = @$_POST['especializacao'];
            
        // Verificando se os dados estão corretos
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($salario == "") || ($cargo == "") || ($especializacao == "")) {
            header('Location: mecanico/cadastro-mecanico.php?result=erroInfo');
        } else {
            // Verificando se já não existe uma pessoa com o cpf do mecânico a ser cadastrado
            if ($pessoaControl->buscarPorCpf($cpf) != null) {
                header('Location: mecanico/cadastro-mecanico.php?result=erroPessoa');
            } else {
                // Cadastrando o mecânico
                $mecanico = new Mecanico($nome, $cpf, $telefone, $endereco, $salario, $cargo, $especializacao);
                $mecanicoControl->cadastrar($mecanico);
                header('Location: mecanico/cadastro-mecanico.php?result=sucesso');
            }
        }
    }

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "servico") {
    // Recebendo os dados pelo POST
    $tipo = @$_POST['tipo'];
    $valor = @$_POST['valor'];
    $tempoDuracao = @$_POST['tempoDuracao'];
    $cpfCliente = @$_POST['cpfCliente'];
    $cpfMecanico = @$_POST['cpfMecanico'];

    // Verificando se os dados estão corretos
    if (($tipo == "") || 
        ($valor == "") ||  
        ($tempoDuracao == "") ||
        ($cpfCliente == "") ||
        ($cpfMecanico == "")) {
        header('Location: servico/cadastro-servico.php?result=erroInfo');

    } else {
        // Buscando o cliente e o mecânico com o cpf que foi recebido
        $cliente = $clienteControl->buscarPorCpf($cpfCliente);
        $mecanico = $mecanicoControl->buscarPorCpf($cpfMecanico);

        // Verificando se o cliente e o mecânico existe
        if ($cliente == null || $mecanico == null) {
            header('Location: servico/cadastro-servico.php?result=erroPessoa');
        } else {
            // Cadastrando o serviço
            $servico = new Servico($tipo, $valor, "", $tempoDuracao, $cliente, $mecanico);
            $servicoControl->cadastrar($servico);
            header('Location: servico/cadastro-servico.php?result=sucesso');
        }  
    }

// Verificando o dado recebido pela url para realizar a função correta
} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>