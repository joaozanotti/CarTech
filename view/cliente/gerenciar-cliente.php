<?php
// Requerindo as funções de estruturação do html
include '../../control/funcoes.php';

// Criando o header
echo criaHeader("Clientes", 1);
?>

<!-- Criando o main -->
<main class="d-flex align-items-center justify-content-center flex-grow-1">
    <!-- Criando os botões de funcionalidade -->
    <div class="botoes text-center w-50">
        <h4>Selecione uma funcionalidade:</h4>
        <a href="./cadastro-cliente.php" class="btn btn-secondary">Cadastrar clientes</a>
        <a href="./listagem-cliente.php" class="btn btn-secondary">Listar clientes</a>
        <a href="./filtro-cliente.php" class="btn btn-secondary">Filtrar clientes</a>
    </div>
    <!-- Criando a logo -->
    <div class="text-center w-50">
        <img src="../../img/logopreta.png" alt="Logo da CarTech" class="w-25">
    </div>
</main>

<?php
// Criando o footer
echo criaFooter();
?>