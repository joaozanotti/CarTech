<?php
require_once '../control/public.php';

$url = @$_GET['url'];
$id = @$_GET['id'];

if ($url == "cliente" || $url == "mecanico") {
    $nome = @$_POST['nome'];
    $cpf = @$_POST['cpf'];
    $telefone = @$_POST['telefone'];
    $endereco = @$_POST['endereco'];

    $vetPessoas = $pessoaControl->listarObj();
    foreach ($vetPessoas as $pessoa) {
        if ($pessoa->getCpf() == $cpf) {
            $pessoaBuscaCpf = $pessoa;
        }
    }

    if ($url == "cliente") {
        $pagamento = @$_POST['pagamento'];
                
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($pagamento == "")) {
            header('Location: localizar.php?url=cliente&id='.$id.'&resultCliente=erroInfo');

        } else {
            $clienteBuscaId = $clienteControl->buscarPorId($id);
            
            if ($pessoaBuscaCpf != null) {
                if ($pessoaBuscaCpf->getCpf() == $clienteBuscaId->getCpf()) {
                    $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                    $cliente->setId($id);
                    $clienteControl->atualizar($cliente);
                    header('Location: cliente/listagem-cliente.php?resultEditar=sucesso');
                } else {
                    header('Location: localizar.php?url=cliente&id='.$id.'&resultCliente=erroPessoa');
                } 

            } else {
                $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                $cliente->setId($id);
                $clienteControl->atualizar($cliente);
                header('Location: cliente/listagem-cliente.php?resultEditar=sucesso');
            }
        }
    } else {
        $salario = @$_POST['salario'];
        $cargo = @$_POST['cargo'];
        $especializacao = @$_POST['especializacao'];
            
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($salario == "") || ($cargo == "") || ($especializacao == "")) {
            header('Location: localizar.php?url=mecanico&id='.$id.'&resultMecanico=erroInfo');

        } else {
            $mecanicoBuscaId = $mecanicoControl->buscarPorId($id);

            if ($pessoaBuscaCpf != null) {
                if ($pessoaBuscaCpf->getCpf() == $mecanicoBuscaId->getCpf()) {
                    $mecanico = new Mecanico($nome, $cpf, $telefone, $endereco, $salario, $cargo, $especializacao);
                    $mecanico->setId($id);
                    $mecanicoControl->atualizar($mecanico);
                    header('Location: mecanico/listagem-mecanico.php?resultEditar=sucesso');
                } else {
                    header('Location: localizar.php?url=mecanico&id='.$id.'&resultMecanico=erroPessoa');
                }
            } else {
                $mecanico = new Mecanico($nome, $cpf, $telefone, $endereco, $salario, $cargo, $especializacao);
                $mecanico->setId($id);
                $mecanicoControl->atualizar($mecanico);
                header('Location: mecanico/listagem-mecanico.php?resultEditar=sucesso');
            }
        }
    }

} else if ($url == "servico") {
    $tipo = @$_POST['tipo'];
    $valor = @$_POST['valor'];
    $dataHora = @$_POST['dataHora'];
    $tempoDuracao = @$_POST['tempoDuracao'];
    $cpfCliente = @$_POST['cpfCliente'];
    $cpfMecanico = @$_POST['cpfMecanico'];

    if (($tipo == "") ||
        ($valor == "") ||
        ($dataHora == "") ||
        ($tempoDuracao == "") ||
        ($cpfCliente == "") ||
        ($cpfMecanico == "")) {
        header('Location: localizar.php?url=servico&id='.$id.'&resultServico=erroInfo');

    } else {
        $cliente = $clienteControl->buscarPorCpf($cpfCliente);
        $mecanico = $mecanicoControl->buscarPorCpf($cpfMecanico);

        if ($cliente == null || $mecanico == null) {
            header('Location: localizar.php?url=servico&id='.$id.'&resultServico=erroPessoa');
        } else {
            $servico = new Servico($tipo, $valor, $dataHora, $tempoDuracao, $cliente, $mecanico);
            $servico->setId($id);
            $servicoControl->atualizar($servico);
            header('Location: servico/listagem-servico.php?resultEditar=sucesso');
        }  
    }
} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>