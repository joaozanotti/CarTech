<?php
$urlCliente = substr($_SERVER['PHP_SELF'], 40);

echo '<form action="../cadastro.php?url='.$urlCliente.'" method="post">
        <h1>Cadastrar clientes</h1>
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
            <label for="pagamento">Forma de pagamento preferencial:</label>
            <input type="text" id="pagamento" name="pagamento" required>
        </p>
        <p>
            <input type="submit" value="Cadastrar">
        </p>
    </form>';
?>