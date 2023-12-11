<?php
include '../../control/funcoes.php';
echo criaHeader("Mecânicos", 2);
?>

<main class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="botoes text-center w-50">
        <h4>Selecione uma funcionalidade:</h4>
        <a href="./cadastro-mecanico.php" class="btn btn-secondary">Cadastrar mecânicos</a>
        <a href="./listagem-mecanico.php" class="btn btn-secondary">Listar mecânicos</a>
        <a href="./filtro-mecanico.php" class="btn btn-secondary">Filtrar mecânicos</a>
    </div>
    <div class="text-center w-50">
        <img src="../../img/logopreta.png" alt="Logo da CarTech" class="w-25">
    </div>
</main>

<?php
echo criaFooter();
?>