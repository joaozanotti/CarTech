<?php
// Requerindo as classes de control
require_once '../control/public.php';

// Recebendo os dados pelo GET
$url = @$_GET['url'];
$id = @$_GET['id'];

// Verificando o dado recebido pela url para realizar a função correta
if ($url == "cliente" || $url == "mecanico") {
    // Recebendo os dados pelo POST
    $nome = @$_POST['nome'];
    $cpf = @$_POST['cpf'];
    $telefone = @$_POST['telefone'];
    $endereco = @$_POST['endereco'];

    // Verificando se existe uma pessoa com o cpf do cliente a ser editado
    $vetPessoas = $pessoaControl->listarObj();
    foreach ($vetPessoas as $pessoa) {
        if ($pessoa->getCpf() == $cpf) {
            $pessoaBuscaCpf = $pessoa;
        }
    }

    if ($url == "cliente") {
        $pagamento = @$_POST['pagamento'];
               
        // Verificando se os dados estão corretos
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($pagamento == "")) {
            header('Location: localizar.php?url=cliente&id='.$id.'&resultCliente=erroInfo');

        } else {
            // Buscando o cliente com o id que foi recebido
            $clienteBuscaId = $clienteControl->buscarPorId($id);
            
            if ($pessoaBuscaCpf != null) {
                // Verificando se o cpf que foi recebido é o mesmo do cliente que estou tentando editar
                if ($pessoaBuscaCpf->getCpf() == $clienteBuscaId->getCpf()) {
                    // Cadastrando o cliente
                    $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                    $cliente->setId($id);
                    $clienteControl->atualizar($cliente);
                    header('Location: cliente/listagem-cliente.php?resultEditar=sucesso');
                } else {
                    header('Location: localizar.php?url=cliente&id='.$id.'&resultCliente=erroPessoa');
                } 

            } else {
                // Cadastrando o cliente
                $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                $cliente->setId($id);
                $clienteControl->atualizar($cliente);
                header('Location: cliente/listagem-cliente.php?resultEditar=sucesso');
            }
        }
    } else {
        // Recebendo os dados pelo POST
        $salario = @$_POST['salario'];
        $cargo = @$_POST['cargo'];
        $especializacao = @$_POST['especializacao'];
            
        // Verificando se os dados estão corretos
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($salario == "") || ($cargo == "") || ($especializacao == "")) {
            header('Location: localizar.php?url=mecanico&id='.$id.'&resultMecanico=erroInfo');

        } else {
            // Buscando o mecânico com o id que foi recebido
            $mecanicoBuscaId = $mecanicoControl->buscarPorId($id);

            if ($pessoaBuscaCpf != null) {
                // Verificando se o cpf que foi recebido é o mesmo do mecânico que estou tentando editar
                if ($pessoaBuscaCpf->getCpf() == $mecanicoBuscaId->getCpf()) {
                    // Cadastrando o mecânico
                    $mecanico = new Mecanico($nome, $cpf, $telefone, $endereco, $salario, $cargo, $especializacao);
                    $mecanico->setId($id);
                    $mecanicoControl->atualizar($mecanico);
                    header('Location: mecanico/listagem-mecanico.php?resultEditar=sucesso');
                } else {
                    header('Location: localizar.php?url=mecanico&id='.$id.'&resultMecanico=erroPessoa');
                }
            } else {
                // Cadastrando o mecânico
                $mecanico = new Mecanico($nome, $cpf, $telefone, $endereco, $salario, $cargo, $especializacao);
                $mecanico->setId($id);
                $mecanicoControl->atualizar($mecanico);
                header('Location: mecanico/listagem-mecanico.php?resultEditar=sucesso');
            }
        }
    }

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "servico") {
    // Recebendo os dados pelo POST
    $tipo = @$_POST['tipo'];
    $valor = @$_POST['valor'];
    $dataHora = @$_POST['dataHora'];
    $tempoDuracao = @$_POST['tempoDuracao'];
    $cpfCliente = @$_POST['cpfCliente'];
    $cpfMecanico = @$_POST['cpfMecanico'];

    // Verificando se os dados estão corretos
    if (($tipo == "") ||
        ($valor == "") ||
        ($dataHora == "") ||
        ($tempoDuracao == "") ||
        ($cpfCliente == "") ||
        ($cpfMecanico == "")) {
        header('Location: localizar.php?url=servico&id='.$id.'&resultServico=erroInfo');

    } else {
        // Buscando o cliente e o mecânico com o cpf que foi recebido
        $cliente = $clienteControl->buscarPorCpf($cpfCliente);
        $mecanico = $mecanicoControl->buscarPorCpf($cpfMecanico);

        // Verificando se o cliente e o mecânico existe
        if ($cliente == null || $mecanico == null) {
            header('Location: localizar.php?url=servico&id='.$id.'&resultServico=erroPessoa');
        } else {
            // Cadastrando o serviço
            $servico = new Servico($tipo, $valor, $dataHora, $tempoDuracao, $cliente, $mecanico);
            $servico->setId($id);
            $servicoControl->atualizar($servico);
            header('Location: servico/listagem-servico.php?resultEditar=sucesso');
        }  
    }

// Verificando o dado recebido pela url para realizar a função correta
} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>