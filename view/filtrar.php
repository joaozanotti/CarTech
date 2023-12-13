<?php
// Requerindo as funções de estruturação do html e as classes de control
require_once '../control/public.php';
require_once '../control/funcoes.php';

// Recebendo os dados pelo GET e POST
$url = @$_GET['url'];
$cpf = @$_POST['cpf'];

// Verificando o dado recebido pela url para realizar a função correta
if ($url == "cliente") {
    echo criaHeader("Clientes", "Filtrar");

    // Verificando se o dado está correto
    if ($cpf == "" || strlen($cpf) != 14) {
        header('Location: cliente/filtro-cliente.php?result=erroInfo'); 
    } else {
        // Buscando o cliente com o cpf que foi recebido
        $cliente = $clienteControl->buscarPorCpf($cpf);

        // Verificando se o cliente existe
        if ($cliente == null) {
            header('Location: cliente/filtro-cliente.php?result=erroPessoa');

        } else {
            // Buscando os dados de todos os serviços
            $vetServicos = $servicoControl->listarObj();

            // Verificando se o id do cliente que foi buscado é igual ao id do cliente que está no serviço
            $servicosCliente = array();
            foreach ($vetServicos as $servico) {
                if ($cliente->getId() == $servico->getCliente()->getId()) {
                    // Guardando o serviço em um vetor
                    array_push($servicosCliente, $servico);
                }
            }

            // Verificando se existem serviços para aquele cliente
            if (count($servicosCliente) == 0) {
                header('Location: cliente/filtro-cliente.php?result=erroServico');

            } else {
                // Exibindo os serviços
                echo '<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
                        <h2 class="mb-4">Serviços solicitados por '.$cliente->getNome().'</h2>
                        <table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
                            <thead class="table-dark align-middle">
                                <tr>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Data e Hora</th>
                                    <th>Tempo de Duração</th>
                                    <th>Cliente Atendido</th>
                                    <th>Mecânico Responsável</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>';

                foreach ($servicosCliente as $servico) {
                    $dataHora = date('d/m/Y H:i:s', strtotime($servico->getData()));
                    echo '<tr>
                            <td>'.$servico->getTipo().'</td>
                            <td>R$'.$servico->getValor().'</td>
                            <td>'.$dataHora.'</td>
                            <td>'.$servico->getTempo().'</td>
                            <td>'.$servico->getCliente()->getNome().'</td>
                            <td>'.$servico->getMecanico()->getNome().'</td>
                            <td>
                                <a href="localizar.php?url=servico&id='.$servico->getId().'" class="btn btn-primary">Editar</a>
                                <a href="excluir.php?url=servico&id='.$servico->getId().'" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>';
                }   
            
                echo '</tbody>
                    </table>
                </main>';
            }
        }
    }
    
    echo criaFooter();

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "mecanico") {
    echo criaHeader("Mecânicos", "Filtrar");

    // Verificando se o dado está correto
    if ($cpf == "" || strlen($cpf) != 14) {
        header('Location: mecanico/filtro-mecanico.php?result=erroInfo'); 
    } else {
        // Buscando o mecânico com o cpf que foi recebido
        $mecanico = $mecanicoControl->buscarPorCpf($cpf);

        // Verificando se o mecânico existe
        if ($mecanico == null) {
            header('Location: mecanico/filtro-mecanico.php?result=erroPessoa');

        } else {
            // Buscando os dados de todos os serviços
            $vetServicos = $servicoControl->listarObj();

            // Verificando se o id do mecânico que foi buscado é igual ao id do mecânico que está no serviço
            $servicosMecanico = array();
            foreach ($vetServicos as $servico) {
                if ($mecanico->getId() == $servico->getMecanico()->getId()) {
                    // Guardando o serviço em um vetor
                    array_push($servicosMecanico, $servico);
                }
            }

            // Verificando se existem serviços para aquele mecânico
            if (count($servicosMecanico) == 0) {
                header('Location: mecanico/filtro-mecanico.php?result=erroServico');

            } else {
                // Exibindo os serviços
                echo '<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
                        <h2 class="mb-4">Serviços realizados por '.$mecanico->getNome().'</h2>
                        <table class="table table-bordered table-striped table-hover text-center align-middle" style="width: 90%;">
                            <thead class="table-dark align-middle">
                                <tr>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Data e Hora</th>
                                    <th>Tempo de Duração</th>
                                    <th>Cliente Atendido</th>
                                    <th>Mecânico Responsável</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>';

                foreach ($servicosMecanico as $servico) {
                    $dataHora = date('d/m/Y H:i:s', strtotime($servico->getData()));
                    echo '<tr>
                            <td>'.$servico->getTipo().'</td>
                            <td>R$'.$servico->getValor().'</td>
                            <td>'.$dataHora.'</td>
                            <td>'.$servico->getTempo().'</td>
                            <td>'.$servico->getCliente()->getNome().'</td>
                            <td>'.$servico->getMecanico()->getNome().'</td>
                            <td>
                                <a href="localizar.php?url=servico&id='.$servico->getId().'" class="btn btn-primary">Editar</a>
                                <a href="excluir.php?url=servico&id='.$servico->getId().'" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>';
                }   
            
                echo '</tbody>
                    </table>
                </main>';
                }   
        }
    }

    echo criaFooter();

// Verificando o dado recebido pela url para realizar a função correta
} else {
    header('Location: cliente/gerenciar-cliente.php');
}