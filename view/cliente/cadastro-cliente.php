<?php
include '../../control/funcoes.php';
$msg = @$_GET['result'];

echo criaHeader("Clientes");
?>
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
    <h1 class="mb-3">Cadastrar clientes</h1>
    <form action="../cadastro.php?url=cliente" method="post" class="w-25">
        <p>
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control border border-secondary" placeholder="Digite o nome..." required>
        </p>
        <p>
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control border border-secondary" placeholder="Digite o CPF... (Mínimo 14 dígitos)" required>
        </p>
        <p>
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control border border-secondary" placeholder="Digite o telefone... (Mínimo 14 dígitos)" required>
        </p>
        <p>
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" id="endereco" name="endereco" class="form-control border border-secondary" placeholder="Digite o endereço..." required>
        </p>
        <p>
            <label for="pagamento" class="form-label">Forma de pagamento preferencial:</label>
            <input type="text" id="pagamento" name="pagamento" class="form-control border border-secondary" placeholder="Digite a forma de pagamento..." required>
        </p>
        <p class="d-flex justify-content-center mt-4">
            <input type="submit" value="Cadastrar" class="btn btn-dark mx-2 border border-dark border-2">
            <input type="reset" value="Limpar" class="btn btn-dark mx-2 border border-dark border-2">
        </p>
        <p>
            <?php
                if ($msg == "erroInfo") {
                    echo "<p class='form-error'>Erro! Informações inválidas.</p>";
                } else if ($msg == "erroPessoa") {
                    echo "<p class='form-error'>Erro! Já existe uma pessoa com este CPF.</p>";
                } else if ($msg == "sucesso") {
                    echo "<p class='form-success'>Cliente cadastrado com sucesso!</p>";
                }
            ?>
        </p>
    </form>
</main>
    
<?php
echo criaFooter();
?>