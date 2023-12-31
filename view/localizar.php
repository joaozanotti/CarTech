<?php
// Requerindo as funções de estruturação do html e as classes de control
require_once '../control/public.php';
require_once '../control/funcoes.php';

// Recebendo os dados pelo GET
$url = @$_GET['url'];
$id = @$_GET['id'];

// Recebendo as mensagens de retorno pelo GET
$msgCliente = @$_GET['resultCliente'];
$msgMecanico = @$_GET['resultMecanico'];
$msgServico = @$_GET['resultServico'];

// Verificando o dado recebido pela url para realizar a função correta
if ($url == "cliente") {
    // Verificando se o cliente existe
    $cliente = $clienteControl->buscarPorId($id);
    if ($cliente != null) {
        // Criando o header
        echo criaHeader("Clientes", "Editar");
        ?>

        <!-- Criando o main -->
        <main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
            <!-- Criando o formulário de edição -->
            <h1 class="mb-3">Editar clientes</h1>
            <?php
                // Enviando uma url e um id pelo link para selecionar a funcionalidade no outro arquivo 
                echo '<form action="editar.php?url=cliente&id='.$cliente->getId().'" method="post" class="w-25">' ?>
                <p>
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control border border-secondary" placeholder="Digite o nome..." value="<?php echo $cliente->getNome() ?>" required>
                </p>
                <p>
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control border border-secondary" placeholder="Digite o CPF... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo $cliente->getCpf() ?>" required>
                </p>
                <p>
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" class="form-control border border-secondary" placeholder="Digite o telefone... (Apenas 14 dígitos)" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" value="<?php echo $cliente->getTelefone() ?>" required>
                </p>
                <p>
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" class="form-control border border-secondary" placeholder="Digite o endereço..." value="<?php echo $cliente->getEndereco() ?>" required>
                </p>
                <p>
                    <label for="pagamento" class="form-label">Forma de pagamento preferencial:</label>
                    <input type="text" id="pagamento" name="pagamento" class="form-control border border-secondary" placeholder="Digite a forma de pagamento..." value="<?php echo $cliente->getPagamento() ?>" required>
                </p>
                <p class="d-flex justify-content-center mt-4">
                    <input type="submit" value="Editar" class="btn btn-dark mx-2 border border-dark border-2">
                    <input type="reset" value="Resetar" class="btn btn-dark mx-2 border border-dark border-2">
                </p>
                <p>
                    <?php
                        // Exibindo as mensagens de resultado
                        if ($msgCliente == "erroInfo") {
                            echo "<p class='form-error'>Erro! Informações inválidas.</p>";
                        } else if ($msgCliente == "erroPessoa") {
                            echo "<p class='form-error'>Erro! Já existe uma pessoa com este CPF.</p>";
                        }
                    ?>
                </p>
            </form>
        </main>

        <?php
        // Criando o footer
        echo criaFooter();
    }

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "mecanico") {
    // Verificando se o mecânico existe
    $mecanico = $mecanicoControl->buscarPorId($id);
    if ($mecanico != null) {
        // Criando o header
        echo criaHeader("Mecânicos", "Editar");
        ?>

        <!-- Criando o main -->
        <main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
            <!-- Criando o formulário de edição -->
            <h1 class="mb-3">Editar mecânicos</h1>
            <?php
                // Enviando uma url e um id pelo link para selecionar a funcionalidade no outro arquivo 
                echo '<form action="editar.php?url=mecanico&id='.$mecanico->getId().'" method="post" class="w-25">' ?>
                <p>
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control border border-secondary" placeholder="Digite o nome..." value="<?php echo $mecanico->getNome() ?>" required>
                </p>
                <p>
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control border border-secondary" placeholder="Digite o CPF... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo $mecanico->getCpf() ?>" required>
                </p>
                <p>
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" class="form-control border border-secondary" placeholder="Digite o telefone... (Apenas 14 dígitos)" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" value="<?php echo $mecanico->getTelefone() ?>" required>
                </p>
                <p>
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" class="form-control border border-secondary" placeholder="Digite o endereço..." value="<?php echo $mecanico->getEndereco() ?>" required>
                </p>
                <p>
                    <label for="salario" class="form-label">Salário: R$</label>
                    <input type="number" id="salario" name="salario" class="form-control border border-secondary" placeholder="Digite o salário..." value="<?php echo $mecanico->getSalario() ?>" required>
                </p>
                <p>
                    <label for="cargo" class="form-label">Cargo:</label>
                    <input type="text" id="cargo" name="cargo" class="form-control border border-secondary" placeholder="Digite o cargo..." value="<?php echo $mecanico->getCargo() ?>" required>
                </p>
                <p>
                    <label for="especializacao" class="form-label">Especialização:</label>
                    <input type="text" id="especializacao" name="especializacao" class="form-control border border-secondary" placeholder="Digite a especialização..." value="<?php echo $mecanico->getEspecializacao() ?>" required>
                </p>
                <p class="d-flex justify-content-center mt-4">
                    <input type="submit" value="Editar" class="btn btn-dark mx-2 border border-dark border-2">
                    <input type="reset" value="Resetar" class="btn btn-dark mx-2 border border-dark border-2">
                </p>
                <p>
                    <?php
                        // Exibindo as mensagens de resultado
                        if ($msgMecanico == "erroInfo") {
                            echo "<p class='form-error'>Erro! Informações inválidas.</p>";
                        } else if ($msgMecanico == "erroPessoa") {
                            echo "<p class='form-error'>Erro! Já existe uma pessoa com este CPF.</p>";
                        }
                    ?>
                </p>
            </form>
        </main>

        <?php
        // Criando o footer
        echo criaFooter();
    }

// Verificando o dado recebido pela url para realizar a função correta
} else if ($url == "servico") {
    // Verificando se o serviço existe
    $servico = $servicoControl->buscarPorId($id);
    if ($servico != null) {
        // Criando o header
        echo criaHeader("Serviços", "Editar");
        ?>

        <!-- Criando o main -->
        <main class="d-flex align-items-center justify-content-around flex-grow-1 my-4">
            <div class="listagem ms-5">
                <!-- Listando os clientes que estão cadastrados -->
                <div class="clientes d-flex flex-column align-items-center mb-4">
                <h2 class="mb-4">Clientes cadastrados</h2>
                <table class="table table-bordered table-striped table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Pref. Pagamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Buscando os dados de todos os clientes
                            $vetClientes = $clienteControl->listarObj();
                            foreach ($vetClientes as $cliente) {
                                // Exibindo os dados dos clientes
                                echo '<tr>
                                        <td>'.$cliente->getNome().'</td>
                                        <td>'.$cliente->getCpf().'</td>
                                        <td>'.$cliente->getPagamento().'</td>
                                    </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                </div>
                <div class="mecanicos d-flex flex-column align-items-center mt-4">
                    <!-- Listando os mecânicos que estão cadastrados -->
                    <h2 class="mb-4">Mecânicos cadastrados</h2>
                    <table class="table table-bordered table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Cargo</th>
                                <th>Especialização</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Buscando os dados de todos os mecânicos
                                $vetMecanicos = $mecanicoControl->listarObj();
                                foreach ($vetMecanicos as $mecanico) {
                                    // Exibindo os dados dos mecânicos
                                    echo '<tr>
                                            <td>'.$mecanico->getNome().'</td>
                                            <td>'.$mecanico->getCpf().'</td>
                                            <td>'.$mecanico->getCargo().'</td>
                                            <td>'.$mecanico->getEspecializacao().'</td>
                                        </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="formulario me-5 d-flex flex-column align-items-center">
                <!-- Criando o formulário de edição -->
                <h1 class="mb-3 me-5">Editar serviços</h1>
                <?php 
                    // Enviando uma url e um id pelo link para selecionar a funcionalidade no outro arquivo
                    echo '<form action="editar.php?url=servico&id='.$servico->getId().'" method="post" class="w-100 me-5">' ?>
                    <p>
                        <label for="tipo" class="form-label">Tipo:</label>
                        <input type="text" id="tipo" name="tipo" class="form-control border border-secondary" placeholder="Digite o tipo..." value="<?php echo $servico->getTipo() ?>" required>
                    </p>
                    <p>
                        <label for="valor" class="form-label">Valor: R$</label>
                        <input type="number" step="0.01" id="valor" name="valor" class="form-control border border-secondary" placeholder="Digite o valor..." value="<?php echo $servico->getValor() ?>" required>
                    </p>
                    <p>
                        <label for="dataHora" class="form-label">Data e hora:</label>
                        <input type="datetime-local" id="dataHora" name="dataHora" class="form-control border border-secondary" placeholder="Digite o tempo de duração..." value="<?php echo $servico->getData() ?>" required>
                    </p>
                    <p>
                        <label for="tempoDuracao" class="form-label">Tempo de duração:</label>
                        <input type="text" id="tempoDuracao" name="tempoDuracao" class="form-control border border-secondary" placeholder="Digite o tempo de duração..." value="<?php echo $servico->getTempo() ?>" required>
                    </p>
                    <p>
                        <label for="cpfCliente" class="form-label">CPF do cliente:</label>
                        <input type="text" id="cpfCliente" name="cpfCliente" class="form-control border border-secondary" placeholder="Digite o CPF do cliente... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo $servico->getCliente()->getCpf() ?>" required>
                    </p>
                    <p>
                        <label for="cpfMecanico" class="form-label">CPF do mecânico:</label>
                        <input type="text" id="cpfMecanico" name="cpfMecanico" class="form-control border border-secondary" placeholder="Digite o CPF do mecânico... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo $servico->getMecanico()->getCpf() ?>" required>
                    </p>
                    <p class="d-flex justify-content-center mt-4">
                        <input type="submit" value="Editar" class="btn btn-dark mx-2 border border-dark border-2">
                        <input type="reset" value="Resetar" class="btn btn-dark mx-2 border border-dark border-2">
                    </p>
                    <p>
                        <?php
                            // Exibindo as mensagens de resultado
                            if ($msgServico == "erroInfo") {
                                echo "<p class='form-error'>Erro! Informações do serviço inválidas.</p>";
                            } else if ($msgServico == "erroPessoa") {
                                echo "<p class='form-error'>Erro! CPF do cliente ou do mecânico inválido(s).</p>";
                            }
                        ?>
                    </p>
                </form>
            </div>
        </main>

        <?php
        // Criando o footer
        echo criaFooter();
    }

// Verificando o dado recebido pela url para realizar a função correta
} else {
    header('Location: cliente/gerenciar-cliente.php');
}
?>