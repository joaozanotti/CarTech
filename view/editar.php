<?php
require_once '../control/public.php';

$id = @$_GET['id'];

if (strpos($id, "cliente") !== false || strpos($id, "mecanico") !== false) {
    $nome = @$_POST['nome'];
    $cpf = @$_POST['cpf'];
    $telefone = @$_POST['telefone'];
    $endereco = @$_POST['endereco'];

    if (strpos($id, "cliente") !== false) {
        $id = substr($id, 7);
        $pagamento = @$_POST['pagamento'];
                
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($pagamento == "")) {
            header('Location: localizar.php?id=cliente'.$id.'&resultCliente=erroInfo');

        } else {
            $clienteBusca = $clienteControl->buscarPorId($id);
            
            if ($clienteBusca != null) {
                if ($clienteBusca->getCpf() == $cpf) {
                    $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                    $cliente->setId($id);
                    $clienteControl->cadastrar($cliente);
                    header('Location: cliente/listagem-cliente.php?resultEditar=sucesso');
                } else {
                    header('Location: localizar.php?id=cliente'.$id.'&resultCliente=erroPessoa');
                } 

            } else {
                $cliente = new Cliente($nome, $cpf, $telefone, $endereco, $pagamento);
                $cliente->setId($id);
                $clienteControl->cadastrar($cliente);
                header('Location: cliente/listagem-cliente.php?resultEditar=sucesso');
            }
        }
    }
}
    /* else {
        $salario = @$_POST['salario'];
        $cargo = @$_POST['cargo'];
        $especializacao = @$_POST['especializacao'];
            
        if (($nome == "") || ($cpf == "" || strlen($cpf) != 14) || ($telefone == "" || strlen($telefone) != 14) || ($endereco == "") || ($salario == "") || ($cargo == "") || ($especializacao == "")) {
            header('Location: mecanico/cadastro-mecanico.php?result=erroInfo');
        } else {
            if ($mecanicoControl->buscarPorCpf($cpf) != null) {
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
*/
?>