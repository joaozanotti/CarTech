<?php
include '../../control/funcoes.php';
$msg = @$_GET['result'];

echo criaHeader("Serviços");
?>
<main class="d-flex flex-column align-items-center justify-content-center flex-grow-1 my-4">
    <h1 class="mb-3">Cadastrar serviços</h1>
    <form action="../cadastro.php?url=servico" method="post" class="w-25">
        <p>
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" id="tipo" name="tipo" class="form-control border border-secondary" placeholder="Digite o tipo..." required>
        </p>
        <p>
            <label for="valor" class="form-label">Valor:</label>
            <input type="number" id="valor" name="valor" class="form-control border border-secondary" placeholder="Digite o valor..." required>
        </p>
        <p>
            <label for="tempoDuracao" class="form-label">Tempo de duração:</label>
            <input type="text" id="tempoDuracao" name="tempoDuracao" class="form-control border border-secondary" placeholder="Digite o tempo de duração..." required>
        </p>
        <p>
            <label for="cpfCliente" class="form-label">CPF do cliente:</label>
            <input type="text" id="cpfCliente" name="cpfCliente" class="form-control border border-secondary" placeholder="Digite o CPF do cliente... (Mínimo 14 dígitos)" required>
        </p>
        <p>
            <label for="cpfMecanico" class="form-label">CPF do mecânico:</label>
            <input type="text" id="cpfMecanico" name="cpfMecanico" class="form-control border border-secondary" placeholder="Digite o CPF do mecânico... (Mínimo 14 dígitos)" required>
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
</main>
<?php
echo criaFooter();
?>