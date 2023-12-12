<?php
require_once '../../control/funcoes.php';
require_once '../../control/public.php';
$msg = @$_GET['result'];

echo criaHeader("Serviços");
?>
<main class="d-flex align-items-center justify-content-around flex-grow-1 my-4">
    <div class="listagem ms-5">
        <div class="clientes d-flex flex-column align-items-center mb-4">
        <h2 class="mb-4">Clientes cadastrados</h2>
            <?php
                $vetClientes = $clienteControl->listarObj();

                if ($vetClientes != null) {
                    echo '<table class="table table-bordered table-striped table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Pref. Pagamento</th>
                        </tr>
                    </thead>
                    <tbody>';
        
                    
                    foreach ($vetClientes as $cliente) {
                    echo '<tr>
                            <td>'.$cliente->getNome().'</td>
                            <td>'.$cliente->getCpf().'</td>
                            <td>'.$cliente->getPagamento().'</td>
                        </tr>';
                    }

                    echo '</tbody>
                    </table>';

                } else {
                    echo '<p>Nenhum cliente encontrado.</p>';
                }
            ?>
        </div>
        <div class="mecanicos d-flex flex-column align-items-center mt-4">
            <h2 class="mb-4">Mecânicos cadastrados</h2>
            <?php
                $vetMecanicos = $mecanicoControl->listarObj();

                if ($vetMecanicos != null) {
                    echo '<table class="table table-bordered table-striped table-hover text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Cargo</th>
                                    <th>Especialização</th>
                                </tr>
                            </thead>
                            <tbody>';

                    foreach ($vetMecanicos as $mecanico) {
                        echo '<tr>
                                <td>'.$mecanico->getNome().'</td>
                                <td>'.$mecanico->getCpf().'</td>
                                <td>'.$mecanico->getCargo().'</td>
                                <td>'.$mecanico->getEspecializacao().'</td>
                            </tr>';
                    }

                    echo '</tbody>
                    </table>';

                } else {
                    echo '<p>Nenhum mecânico encontrado.</p>';
                }
            ?>  
        </div>
    </div>
    <div class="formulario me-5 d-flex flex-column align-items-center">
        <h1 class="mb-3 me-5">Cadastrar serviços</h1>
        <form action="../cadastro.php?url=servico" method="post" class="w-100 me-5">
            <p>
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="text" id="tipo" name="tipo" class="form-control border border-secondary" placeholder="Digite o tipo..." required>
            </p>
            <p>
                <label for="valor" class="form-label">Valor: R$</label>
                <input type="number" step="0.01" id="valor" name="valor" class="form-control border border-secondary" placeholder="Digite o valor..." required>
            </p>
            <p>
                <label for="tempoDuracao" class="form-label">Tempo de duração:</label>
                <input type="text" id="tempoDuracao" name="tempoDuracao" class="form-control border border-secondary" placeholder="Digite o tempo de duração..." required>
            </p>
            <p>
                <label for="cpfCliente" class="form-label">CPF do cliente:</label>
                <input type="text" id="cpfCliente" name="cpfCliente" class="form-control border border-secondary" placeholder="Digite o CPF do cliente... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
            </p>
            <p>
                <label for="cpfMecanico" class="form-label">CPF do mecânico:</label>
                <input type="text" id="cpfMecanico" name="cpfMecanico" class="form-control border border-secondary" placeholder="Digite o CPF do mecânico... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
            </p>
            <p class="d-flex justify-content-center mt-4">
                <input type="submit" value="Cadastrar" class="btn btn-dark mx-2 border border-dark border-2">
                <input type="reset" value="Limpar" class="btn btn-dark mx-2 border border-dark border-2">
            </p>
            <p>
                <?php
                    if ($msg == "erroInfo") {
                        echo "<p class='form-error'>Erro! Informações do serviço inválidas.</p>";
                    } else if ($msg == "erroPessoa") {
                        echo "<p class='form-error'>Erro! CPF do cliente ou do mecânico inválido(s).</p>";
                    } else if ($msg == "sucesso") {
                        echo "<p class='form-success'>Serviço cadastrado com sucesso!</p>";
                    }
                ?>
            </p>
        </form>
    </div>
</main>
<?php
echo criaFooter();
?>