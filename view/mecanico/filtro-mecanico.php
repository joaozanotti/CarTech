<?php
// Requerindo as funções de estruturação do html e as classes de control
require_once '../../control/public.php';
require_once '../../control/funcoes.php';

// Recebendo a mensagem de resultado pelo GET
$msg = @$_GET['result'];

// Criando o header
echo criaHeader("Mecânicos");
?>

<!-- Criando o main -->
<main class="d-flex align-items-center justify-content-around flex-grow-1 my-4">
    <div class="listagem ms-5">
        <!-- Listando os mecânicos que estão cadastrados -->
        <div class="mecanicos d-flex flex-column align-items-center mb-4">
        <h2 class="mb-4">Mecânicos cadastrados</h2>
            <?php
                // Buscando os dados de todos os mecânicos
                $vetMecanicos = $mecanicoControl->listarObj();

                // Verificando se existem mecânicos cadastrados
                if ($vetMecanicos != null) {
                    // Exibindo os dados dos mecânicos
                    echo '<table class="table table-bordered table-striped table-hover text-center align-middle">
                    <thead class="table-dark align-middle">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                        </tr>
                    </thead>
                    <tbody>';
        
                    
                    foreach ($vetMecanicos as $mecanico) {
                    echo '<tr>
                            <td>'.$mecanico->getNome().'</td>
                            <td>'.$mecanico->getCpf().'</td>
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
    <div class="formulario d-flex flex-column align-items-center">
        <!-- Criando o formulário de cadastro -->
        <h1 class="mb-3 text-center w-75">Filtrar serviços dos mecânicos</h1>
        <!-- Enviando uma url pelo link para selecionar a funcionalidade no outro arquivo -->
        <form action="../filtrar.php?url=mecanico" method="post" class="w-75">
            <p class="d-flex flex-column align-items-center">
                <label for="cpf" class="form-label align-self-start">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control border border-secondary" placeholder="Digite o CPF... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
            </p>
            <p class="d-flex justify-content-center mt-4">
                <input type="submit" value="Pesquisar" class="btn btn-dark mx-2 border border-dark border-2">
                <input type="reset" value="Limpar" class="btn btn-dark mx-2 border border-dark border-2">
            </p>
            <p>
                <?php
                    // Exibindo as mensagens de resultado
                    if ($msg == "erroInfo") {
                        echo "<p class='form-error'>Erro! CPF do mecânico inválido.</p>";
                    } else if ($msg == "erroPessoa") {
                        echo "<p class='form-error'>Mecânico não encontrado.</p>";
                    } else if ($msg == "erroServico") {
                        echo "<p class='form-error'>Este mecânico não realizou nenhum serviço.</p>";
                    }
                ?>
            </p>
        </form>
    </div>
</main>

<?php
// Criando o footer
echo criaFooter();
?>