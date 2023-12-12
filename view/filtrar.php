<?php
require_once '../control/public.php';
require_once '../control/funcoes.php';

$url = @$_GET['url'];
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
            $vetServicos = $servicoControl->listarObj();

            $servicosCliente = array();
            foreach ($vetServicos as $servico) {
                if ($cliente->getId() == $servico->getCliente()->getId()) {
                    array_push($servicosCliente, $servico);
                }
            }

            if (count($servicosCliente) == 0) {
                header('Location: cliente/filtro-cliente.php?result=erroServico');

            } else {
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

} else if ($url == "mecanico") {
    echo criaHeader("Mecânicos", "Filtrar");

    if ($cpf == "" || strlen($cpf) != 14) {
        header('Location: mecanico/filtro-mecanico.php?result=erroInfo'); 
    } else {
        $mecanico = $mecanicoControl->buscarPorCpf($cpf);

        if ($mecanico == null) {
            header('Location: mecanico/filtro-mecanico.php?result=erroPessoa');

        } else {
            $vetServicos = $servicoControl->listarObj();

            $servicosMecanico = array();
            foreach ($vetServicos as $servico) {
                if ($mecanico->getId() == $servico->getMecanico()->getId()) {
                    array_push($servicosMecanico, $servico);
                }
            }

            if (count($servicosMecanico) == 0) {
                header('Location: mecanico/filtro-mecanico.php?result=erroServico');

            } else {
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

} else {
    header('Location: cliente/gerenciar-cliente.php');
}