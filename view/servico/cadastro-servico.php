<?php
$urlServico = substr($_SERVER['PHP_SELF'], 40);

echo '<form action="../cadastro.php?url='.$urlServico.'" method="post">
        <h1>Cadastrar serviços</h1>
        <p>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>
        </p>
        <p>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" required>
        </p>
        <p>
            <label for="dataHora">Data e hora:</label>
            <input type="text" id="dataHora" name="dataHora" required>
        </p>
        <p>
            <label for="tempoDuracao">Tempo de duração:</label>
            <input type="text" id="tempoDuracao" name="tempoDuracao" required>
        </p>
        <p>
            <label for="cpfCliente">CPF do cliente:</label>
            <input type="number" id="cpfCliente" name="cpfCliente" required>
        </p>
        <p>
            <label for="cpfMecanico">CPF do mecânico:</label>
            <input type="text" id="cpfMecanico" name="cpfMecanico" required>
        </p>

        <input type="submit" value="Cadastrar">
    </form>';
?>