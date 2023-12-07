<?php
$urlMecanico = substr($_SERVER['PHP_SELF'], 41);

echo '<form action="../cadastro.php?url='.$urlMecanico.'" method="post">
        <h1>Cadastrar mecânicos</h1>
        <p>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </p>
        <p>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </p>
        <p>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </p>
        <p>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </p>
        <p>
            <label for="salario">Salário:</label>
            <input type="number" id="salario" name="salario" required>
        </p>
        <p>
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" required>
        </p>
        <p>
            <label for="especializacao">Especialização:</label>
            <input type="text" id="especializacao" name="especializacao" required>
        </p>

        <input type="submit" value="Cadastrar">
    </form>';
?>