<?php
// Requerindo as funções de estruturação do html
include '../../control/funcoes.php';

// Criando o header
echo criaHeader("Mecânicos", 2);
?>

<!-- Criando o main -->
<main class="d-flex align-items-center justify-content-center flex-grow-1">
    <!-- Criando os botões de funcionalidade -->
    <div class="botoes text-center w-50">
        <h4>Selecione uma funcionalidade:</h4>
        <a href="./cadastro-mecanico.php" class="btn btn-secondary">Cadastrar mecânicos</a>
        <a href="./listagem-mecanico.php" class="btn btn-secondary">Listar mecânicos</a>
        <a href="./filtro-mecanico.php" class="btn btn-secondary">Filtrar mecânicos</a>
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