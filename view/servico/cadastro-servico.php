<?php
$msg = @$_GET['result'];

echo '<form action="../cadastro.php?url=servico" method="post">
        <h1>Cadastrar serviços</h1>
        <p>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>
        </p>
        <p>
            <label for="valor">Valor:</label>
            <input type="number" id="valor" name="valor" required>
        </p>
        <p>
            <label for="tempoDuracao">Tempo de duração:</label>
            <input type="text" id="tempoDuracao" name="tempoDuracao" required>
        </p>
        <p>
            <label for="cpfCliente">CPF do cliente:</label>
            <input type="text" id="cpfCliente" name="cpfCliente" required>
        </p>
        <p>
            <label for="cpfMecanico">CPF do mecânico:</label>
            <input type="text" id="cpfMecanico" name="cpfMecanico" required>
        </p>

        <input type="submit" value="Cadastrar">
    </form>';
    if ($msg == "erroInfo") {
        echo "Erro! Informações do serviço inválidas.";
    } else if ($msg == "erroPessoa") {
        echo "Erro! CPF do cliente ou do mecânico inválido(s).";
    } else if ($msg == "sucesso") {
        echo "Serviço cadastrado com sucesso!";
    }
?>