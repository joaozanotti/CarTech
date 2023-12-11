<?php
include '../../control/funcoes.php';
echo criaHeader("Clientes", 1);
?>

<main class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="botoes text-center w-50">
        <h4>Selecione uma funcionalidade:</h4>
        <a href="./cadastro-cliente.php" class="btn btn-secondary">Cadastrar clientes</a>
        <a href="./listagem-cliente.php" class="btn btn-secondary">Listar clientes</a>
        <a href="./filtro-cliente.php" class="btn btn-secondary">Filtrar clientes</a>
    </div>
    <div class="text-center w-50">
        <img src="../../img/logopreta.png" alt="Logo da CarTech" class="w-25">
    </div>
</main>

<?php
echo criaFooter();
?>