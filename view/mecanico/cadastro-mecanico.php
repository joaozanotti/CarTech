<?php
// Requerindo as funções de estruturação do html
include '../../control/funcoes.php';

// Recebendo a mensagem de resultado pelo GET
$msg = @$_GET['result'];

// Criando o header
echo criaHeader("Mecânicos");
?>

<!-- Criando o main -->
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
    <!-- Criando o formulário de cadastro -->
    <h1 class="mb-3">Cadastrar mecânicos</h1>
    <!-- Enviando uma url pelo link para selecionar a funcionalidade no outro arquivo -->
    <form action="../cadastro.php?url=mecanico" method="post" class="w-25">
        <p>
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control border border-secondary" placeholder="Digite o nome..." required>
        </p>
        <p>
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control border border-secondary" placeholder="Digite o CPF... (Apenas 14 dígitos)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
        </p>
        <p>
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control border border-secondary" placeholder="Digite o telefone... (Apenas 14 dígitos)" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" required>
        </p>
        <p>
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control border border-secondary" placeholder="Digite o endereço..." required>
        </p>
        <p>
            <label for="salario" class="form-label">Salário: R$</label>
            <input type="number" id="salario" name="salario" class="form-control border border-secondary" placeholder="Digite o salário..." required>
        </p>
        <p>
            <label for="cargo" class="form-label">Cargo:</label>
            <input type="text" id="cargo" name="cargo" class="form-control border border-secondary" placeholder="Digite o cargo..." required>
        </p>
        <p>
            <label for="especializacao" class="form-label">Especialização:</label>
            <input type="text" id="especializacao" name="especializacao" class="form-control border border-secondary" placeholder="Digite a especialização..." required>
        </p>
        <p class="d-flex justify-content-center mt-4">
            <input type="submit" value="Cadastrar" class="btn btn-dark mx-2 border border-dark border-2">
            <input type="reset" value="Limpar" class="btn btn-dark mx-2 border border-dark border-2">
        </p>
        <p>
            <?php
                // Exibindo as mensagens de resultado
                if ($msg == "erroInfo") {
                    echo "<p class='form-error'>Erro! Informações inválidas.</p>";
                } else if ($msg == "erroPessoa") {
                    echo "<p class='form-error'>Erro! Já existe uma pessoa com este CPF.</p>";
                } else if ($msg == "sucesso") {
                    echo "<p class='form-success'>Mecânico cadastrado com sucesso!</p>";
                }
            ?>
        </p>
    </form>
</main>

<?php
// Criando o footer
echo criaFooter();
?>